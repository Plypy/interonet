package org.interonet.ldm.Core;

import org.interonet.ldm.ConfigurationCenter.ConfigurationCenter;
import org.interonet.ldm.ConfigurationCenter.IConfigurationCenter;
import org.interonet.ldm.PowerManager.PowerManager;
import org.interonet.ldm.SwitchManager.ISwitchManager;
import org.interonet.ldm.SwitchManager.SwitchManager;
import org.interonet.ldm.TopologyTransformer.TopologyTransformer;
import org.interonet.ldm.VMM.IVMManager;
import org.interonet.ldm.VMM.VMManager;

import java.io.IOException;

public class LDMCore {
    @SuppressWarnings("FieldCanBeLocal")
    private LDMAgent ldmAgent;
    @SuppressWarnings("FieldCanBeLocal")
    private PowerManager powerManager;
    private ISwitchManager switchManager;
    private IConfigurationCenter configurationCenter;
    private IVMManager vMManager;

    private TopologyTransformer topologyTransformer;

    public void start() {
        ldmAgent = new LDMAgent(this);

        // PowerManager
        powerManager = new PowerManager();

        // ConfigurationCenter initiation.
        configurationCenter = new ConfigurationCenter(this);

        // SwitchManager initiation.
        switchManager = new SwitchManager(this);

        // VMManager initiation
        vMManager = new VMManager();

        try {
            topologyTransformer = new TopologyTransformer();
        } catch (Exception e) {
            e.printStackTrace();
        }

    }

    public LDMAgent getAgent() {
        return ldmAgent;
    }

    public String powerOnVM(Integer vmID) {
        return vMManager.powerOnVM(vmID);
    }

    public String powerOffVM(Integer vmID) {
        return vMManager.powerOffVM(vmID);

    }


    public String powerOnSwitch(Integer switchID) {
        String powerOnSwitchResult = "failure";
        byte buff[] = {(byte) 0x55, (byte) 0x01, (byte) 0x12, (byte) 0x00,
                (byte) 0x00, (byte) 0x00, (byte) 0x00, (byte) 0x00};
        int ID = switchID;
        byte openWayy = (byte) ID;
        powerManager.CreateSendCommand(buff, openWayy, true);
        int sendStatement = powerManager.senBufWithSocket("10.0.0.2", 3000, buff, 8);
        if (sendStatement == 0) powerOnSwitchResult = "success";
        return powerOnSwitchResult;
    }


    public String powerOffSwitch(Integer switchID) {
        String powerOffSwitchResult = "failure";
        byte buff[] = {(byte) 0x55, (byte) 0x01, (byte) 0x12, (byte) 0x00,
                (byte) 0x00, (byte) 0x00, (byte) 0x00, (byte) 0x00};
        int ID = switchID;
        byte closeWayy = (byte) ID;
        powerManager.CreateSendCommand(buff, closeWayy, false);
        int sendStatement = powerManager.senBufWithSocket("10.0.0.2", 3000, buff, 8);
        if (sendStatement == 0) powerOffSwitchResult = "success";
        return powerOffSwitchResult;
    }

    public void addSwitchConf(Integer switchID, String controllerIP, int controllerPort) throws IOException, InterruptedException {
        switchManager.changeConnectionPropertyFromNFS(switchID, controllerIP, controllerPort);
    }

    public void addSwitchConf(String type, Integer switchID, String controllerIP, int controllerPort) throws IOException, InterruptedException {
        switchManager.changeConnectionPropertyFromNFS(type, switchID, controllerIP, controllerPort);
    }

    public IConfigurationCenter getConfigurationCenter() {
        return configurationCenter;
    }

    public void resetSwitchConf(Integer switchID) throws IOException, InterruptedException {
        switchManager.resetSwitchConf(switchID);
    }

    public void createTunnelSW2SW(int switchPortPeer, int peerSwitchPortPeer) throws Exception {
        topologyTransformer.createTunnelSW2SW(switchPortPeer, peerSwitchPortPeer);
    }

    public void createTunnelSW2VM(int switchPortPeeronTT, int vmID) throws Exception {
        topologyTransformer.createTunnelSW2VM(switchPortPeeronTT, vmID);
    }

    public void deleteTunnelSW2SW(int switchPortPeeronTT, int athrSwitchPortPeeronTT) throws Exception {
        topologyTransformer.deleteTunnelSW2SW(switchPortPeeronTT, athrSwitchPortPeeronTT);
    }

    public void deleteTunnelSW2VM(int switchPortPeeronTT, int vmID) throws Exception {
        topologyTransformer.deleteTunnelSW2VM(switchPortPeeronTT, vmID);
    }
}

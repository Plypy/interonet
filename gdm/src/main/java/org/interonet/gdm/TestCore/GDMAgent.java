package org.interonet.gdm.TestCore;

import org.interonet.gdm.AuthenticationCenter.AuthToken;
import org.interonet.gdm.AuthenticationCenter.IAuthTokenManager;

import java.util.Map;

public class GDMAgent implements IGDMAgent {
    GDMCore gdmCore;

    public GDMAgent(GDMCore gdmCore) {
        this.gdmCore = gdmCore;
    }

    @Override
    public AuthToken authenticateUser(String username, String password) {
        return gdmCore.authenticateUser(username, password);
    }

    @Override
    public String getSwitchesUsageStatus(AuthToken authToken) {
        return gdmCore.getSwitchesUsageStatus(authToken);
    }

    @Override
    public String getVmsUsageStatus(AuthToken authToken) {
        return gdmCore.getVmsUsageStatus(authToken);
    }


    @Override
    public Boolean orderSlice(AuthToken authToken, int swichesNum, int vmsNum, String beginTime, String endTime,
                              Map<String, String> topology,
                              Map<String, String> switchConf,
                              String controllerIP, int controllerPort) {
        return gdmCore.orderSlice(authToken, swichesNum, vmsNum, beginTime, endTime, topology, switchConf, controllerIP, controllerPort);
    }

    @Override
    public String getOrdersList(AuthToken authToken) {
        return gdmCore.getOrdersIDList(authToken);
    }

    @Override
    public String getOrderInfoByID(AuthToken authToken, String orderID) {
        return gdmCore.getOrderInfoByID(authToken, orderID);
    }

    @Override
    public String deleteOrderByID(AuthToken authToken, String orderID) {
        return gdmCore.deleteOrderByID(authToken, orderID);
    }

    @Override
    public String getRunningSlice(AuthToken authToken) {
        return gdmCore.getRunningSliceIDsList(authToken);
    }

    @Override
    public IAuthTokenManager getAuthTokenManager() {
        return gdmCore.getAuthTokenManager();
    }

//    public String stopRunningSliceByID(AuthToken authToken, String orderID) {
//        return gdmCore.stopRunningSliceByID(authToken, orderID);
//    }
}
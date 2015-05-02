<?php
include(dirname(__FILE__) . "/jsonrpcphp/jsonRPCClient.php");

//$client = new jsonRPCClient("http://202.117.15.80:8080/abc");
$client = new jsonRPCClient("http://127.0.0.1:8080/");
$authToken = $_COOKIE["authToken"];
$response = $client->__call("getSwitchesUsageStatus",array($authToken));
$response2 = $client->__call("getVMsUsageStatus",array($authToken));
setcookie("SwitchesUsageStatus",$response);
setcookie("VMsUsageStatus",$response2);
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Create</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="css/print.css" rel="stylesheet" type="text/css" media="print"/>
    <link href="css/bootstrap.css" rel="stylesheet" media="screen"/>
    <link href="css/floatMenu.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/demo.css"/>


</head>
<body>
<div class="modal2 fade" id="CheckSwitchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog2">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" >Switch State Time bar</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-1">00:00</div>

                    <div class="col-xs-9"></div>

                    <div class="col-xs-1">24:00</div>

                </div>
                <div class="row">


                        <div class="col-xs-1">Switch0</div>
                        <div class="col-xs-10">
                            <div id="s0Div" class="timeWidth"></div>
                        </div>




                </div>
                <br/>

                <div class="row">


                        <div class="col-xs-1">Switch1</div>
                        <div class="col-xs-10">
                            <div id="s1Div" class="timeWidth"></div>
                        </div>




                </div>
                <br/>

                <div class="row">


                        <div class="col-xs-1">Switch2</div>
                        <div class="col-xs-10">
                            <div id="s2Div" class="timeWidth"></div>


                    </div>


                </div>
                <br/>

                <div class="row">


                    <div class="col-xs-1">Switch3</div>
                    <div class="col-xs-10">
                        <div id="s3Div" class="timeWidth"></div>


                </div>


            </div>



            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal2 fade" id="CheckVMModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog2">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" >VM State Time Bar</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-1">00:00</div>
                    <div class="col-xs-9"></div>
                    <div class="col-xs-1">24:00</div>

                </div>
                <div class="row">


                    <div class="col-xs-1">VM0</div>
                    <div class="col-xs-10">
                        <div id="h0Div" class="timeWidth"></div>
                    </div>




                </div>
                <br/>
                <div class="row">


                    <div class="col-xs-1">VM1</div>
                    <div class="col-xs-10">
                        <div id="h1Div" class="timeWidth"></div>
                    </div>




                </div>
                <br/>
                <div class="row">


                    <div class="col-xs-1">VM2</div>
                    <div class="col-xs-10">
                        <div id="h2Div" class="timeWidth"></div>


                    </div>


                </div>
                <br/>
                <div class="row">


                    <div class="col-xs-1">VM3</div>
                    <div class="col-xs-10">
                        <div id="h3Div" class="timeWidth"></div>


                    </div>


                </div>
                <br/>
                <div class="row">


                    <div class="col-xs-1">VM4</div>
                    <div class="col-xs-10">
                        <div id="h4Div" class="timeWidth"></div>


                    </div>


                </div> <br/>
                <div class="row">


                    <div class="col-xs-1">VM5</div>
                    <div class="col-xs-10">
                        <div id="h5Div" class="timeWidth"></div>


                    </div>


                </div> <br/>
                <div class="row">


                    <div class="col-xs-1">VM6</div>
                    <div class="col-xs-10">
                        <div id="h6Div" class="timeWidth"></div>


                    </div>


                </div> <br/>
                <div class="row">


                    <div class="col-xs-1">VM7</div>
                    <div class="col-xs-10">
                        <div id="h7Div" class="timeWidth"></div>


                    </div>


                </div>


            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="wrapper">
    <!-- start header -->
    <div id="header">
        <div class="header-content">
            <div class="topnavbar clearfix">
                <span class="alignright">
                    <a id="user" class="padding-left" href="index.html" title="Logout"></a>
                    <a class="padding-left" href="index.html" title="Logout" onclick="delCookie('authToken')">Logout</a>
                </span>
            </div>
        </div>


    </div>
    <!-- start content -->
    <div id="container2" class="clearfix">
        <div class="content">
            <div class="col1-4">

                <div id="floatMenu">

                    <ul class="nav nav-pills nav-stacked text-center">

                        <li class="active"><a href="#">CREATE</a>
                            <ul class="nav nav-pills nav-stacked ">
                                <li><a class="second" href="#Number">Number</a></li>
                                <li><a class="second" href="#Time">Time</a></li>
                                <li><a class="second" href="#Configure">Configure</a></li>
                                <li><a class="second" href="#Controller">Controller</a></li>
                                <li><a class="second" href="#Topology">Topology</a></li>

                            </ul>
                        </li>
                        <li class="first"><a href="Check.php">CHECK</a>

                        </li>
                        <li><a class="first" href="#">UPDATE</a></li>
                    </ul>
                </div>
            </div>


            <div class="col3-4 last">
                <div class="context">
                    <form class="form-horizontal" method="post" action="Order.php"
                          enctype="multipart/form-data">

                                    <div id="Number" class="part Number">
                                        <h2>
                                            Number
                                        </h2>

                                        <div class="row">
                                            <div class="col-xs-2"></div>
                                            <div class="col-xs-1">
                                                <label class="control-label" for="inputSwitch">Switch</label>
                                            </div>
                                            <div class="col-xs-2">
                                                <select id="inputSwitch" name="SwitchNum" class="form-control">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-1">
                                                <label class="control-label" for="inputVM">VM</label>
                                            </div>
                                            <div class="col-xs-2">
                                                <select id="inputVM" name="VMNum" class="form-control">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div id="Time" class="part">

                                        <div class="btn-group pull-right">
                                            <ul class="nav nav-pills">
                                                <li role="presentation"><a id="CheckSwitchButton" href="#">Check Switch State</a></li>
                                                <li role="presentation"><a id="CheckVMButton" href="#">Check VM State</a></li>
                                            </ul>

                                        </div>

                                        <h2>Time</h2>

                                        <div class="row">
                                            <div class="col-xs-2"></div>
                                            <div class="col-xs-1">
                                                <label class="control-label ">Start</label>
                                            </div>

                                            <div class="col-xs-2">
                                                <select id="inputStartHour" name="StartTimeHour"
                                                        class="form-control input-sm">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                </select>

                                            </div>
                                            <div class="col-xs-less">hour</div>
                                            <div class="col-xs-2">
                                                <select id="inputStartMinute" name="StartTimeMinute"
                                                        class="form-control input-sm">
                                                    <option value="00">00</option>
                                                    <option value="05">05</option>
                                                    <option value="10">10</option>
                                                    <option value="15">15</option>
                                                    <option value="20">20</option>
                                                    <option value="25">25</option>
                                                    <option value="30">30</option>
                                                    <option value="35">35</option>
                                                    <option value="40">40</option>
                                                    <option value="45">45</option>
                                                    <option value="50">50</option>
                                                    <option value="55">55</option>

                                                </select>

                                            </div>
                                            <div class="col-xs-less">min</div>


                                        </div>
                                        <br/>

                                        <div class="row">
                                            <div class="col-xs-2"></div>
                                            <div class="col-xs-1">
                                                <label class="control-label ">End</label>
                                            </div>

                                            <div class="col-xs-2">
                                                <select id="inputEndHour" name="EndTimeHour"
                                                        class="form-control input-sm">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                </select>

                                            </div>
                                            <div class="col-xs-less">hour</div>
                                            <div class="col-xs-2">
                                                <select id="inputEndMinute" name="EndTimeMinute"
                                                        class="form-control input-sm">
                                                    <option value="00">00</option>
                                                    <option value="05">05</option>
                                                    <option value="10">10</option>
                                                    <option value="15">15</option>
                                                    <option value="20">20</option>
                                                    <option value="25">25</option>
                                                    <option value="30">30</option>
                                                    <option value="35">35</option>
                                                    <option value="40">40</option>
                                                    <option value="45">45</option>
                                                    <option value="50">50</option>
                                                    <option value="55">55</option>

                                                </select>

                                            </div>
                                            <div class="col-xs-less">min</div>


                                        </div>

                                    </div>
                                    <div id="Configure" class="part">
                                        <h2>Switch Configure</h2>


                                    </div>
                                    <div id="Controller" class="part">
                                        <h2>Controller</h2>

                                        <div class="row">
                                            <div class="col-xs-3"></div>
                                            <div class="col-xs-1">
                                                <label class="control-label" for="inputIP">IP</label>
                                            </div>
                                            <div class="col-xs-3">
                                                <input id="inputIP" name="IP" class="form-control"/>
                                            </div>
                                        </div>
                                        <br/>

                                        <div class="row">
                                            <div class="col-xs-3"></div>
                                            <div class="col-xs-1">
                                                <label class="control-label" for="inputPort">Port</label>
                                            </div>
                                            <div class="col-xs-3">
                                                <input id="inputPort" name="Port" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="Topology" class="part">
                                        <h2>Topology</h2>
                                        <div class="row">
                                            <div class="col-xs-2"></div>
                                            <div class="col-xs-2">
                                                <button type="button" id="CreateTopology" class="btn btn-primary btn-lg " >Create Topology</button>
                                            </div>
                                            <div class="col-xs-1"></div>
                                            <div class="col-xs-2">
                                                <button type="button" id="CheckTopology" class="btn btn-primary  btn-lg" >Check Topology</button>
                                            </div>
                                        </div>
                                    </div>


                                         <div class="part2" id="Order">
                                          <button class="btn btn-lg btn-primary">Order</button>
                                         </div>
                      <!-- <button type="button" id="test">a1</button -->

                    </form>

                </div>


            </div>


        </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="m">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Create Topology</h4>
            </div>
            <div class="modal-body">
                <div id="modelType">
                    <div class="demo flowchart-demo" id="flowchart-demo">
                    </div>
                </div>


            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal"  >Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="SaveChanges">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery-2.1.3.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src ="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/jquery.organicTabs.js" type="text/javascript"></script>
<script src="layer-master/layer.js" type="text/javascript"></script>

<script src="lib/jsBezier-0.6.js"></script>
<!-- event adapter -->
<script src="lib/mottle-0.5.js"></script>
<!-- geometry functions -->
<script src="lib/biltong-0.2.js"></script>
<!-- drag -->
<script src="lib/katavorio-0.6.js"></script>
<!-- jsplumb util -->
<script src="src/util.js"></script>
<script src="src/browser-util.js"></script>
<!-- base DOM adapter -->
<script src="src/dom-adapter.js"></script>
<!-- main jsplumb engine -->
<script src="src/jsPlumb.js"></script>
<script src="src/overlay-component.js"></script>
<!-- endpoint -->
<script src="src/endpoint.js"></script>
<!-- connection -->
<script src="src/connection.js"></script>
<!-- anchors -->
<script src="src/anchors.js"></script>
<!-- connectors, endpoint and overlays  -->
<script src="src/defaults.js"></script>
<!-- bezier connectors -->
<script src="src/connectors-bezier.js"></script>
<!-- state machine connectors -->
<script src="src/connectors-statemachine.js"></script>
<!-- flowchart connectors -->
<script src="src/connectors-flowchart.js"></script>
<script src="src/connector-editors.js"></script>
<!-- SVG renderer -->
<script src="src/renderers-svg.js"></script>
<!-- vml renderer -->
<script src="src/renderers-vml.js"></script>
<!-- no library jsPlumb adapter -->
<script src="src/base-library-adapter.js"></script>
<script src="src/dom.jsPlumb.js"></script>
<script type="text/javascript">
    $(function () {

        $("#tab-one").organicTabs();

    });

</script>


<script src="js/deleteCookie.js" type="text/javascript"></script>
<script type="text/javascript">
    var name = "#floatMenu";
    var menuYloc = null;
    $(document).ready(function () {
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
        var Topology = "";

        //显示交换机状态
        var SwitchesUsageStatus = eval('(' + getCookie("SwitchesUsageStatus") + ')');
        var SwitchesUsageStatusLength = 0;
        for(var slength in SwitchesUsageStatus)
        {
            SwitchesUsageStatusLength++;
        }

        for(var m=0; m < SwitchesUsageStatusLength; m++)
        {
            for(var n=0; n <SwitchesUsageStatus[m].length; n++)
            {
                var startTime =SwitchesUsageStatus[m][n].start;
                var endTime =SwitchesUsageStatus[m][n].end;
                var startPoint = parseInt((parseInt(startTime.substr(0,2))*60+parseInt(startTime.substr(3,5)))/2);
                var endPoint = parseInt((parseInt(endTime.substr(0,2))*60+parseInt(endTime.substr(3,5)))/2);
                var timeSwitchBlock = "<div class='timeBlock' id='"+"s"+m+"n"+n+"' data-toggle='tooltip' data-placement='top' title='"+startTime+"~"+endTime+"'></div>";
                var sDivID = "#s"+m+"Div";
                $(sDivID).append(timeSwitchBlock);
                var SwitchBlockID = "#s"+m+"n"+n;
                $(SwitchBlockID).css({"left":startPoint,"width":endPoint-startPoint});
            }
        }

        //显示虚拟机状态
        var VMsUsageStatus = eval('(' + getCookie("VMsUsageStatus") + ')');
        var VMsUsageStatusLength = 0;
        for(var hlength in VMsUsageStatus)
        {
            VMsUsageStatusLength++;
        }
        for( m=0; m < VMsUsageStatusLength; m++)
        {
            for( n=0; n <VMsUsageStatus[m].length; n++)
            {
                startTime =VMsUsageStatus[m][n].start;
                endTime =VMsUsageStatus[m][n].end;
                startPoint = parseInt((parseInt(startTime.substr(0,2))*60+parseInt(startTime.substr(3,5)))/2);
                endPoint = parseInt((parseInt(endTime.substr(0,2))*60+parseInt(endTime.substr(3,5)))/2);
                timeSwitchBlock = "<div class='timeBlock' id='"+"h"+m+"n"+n+"' data-toggle='tooltip' data-placement='top' title='"+startTime+"~"+endTime+"''></div>";
                var hDivID = "#h"+m+"Div";
                $(hDivID).append(timeSwitchBlock);
                var VMBlockID = "#h"+m+"n"+n;
                $(VMBlockID).css({"left":startPoint,"width":endPoint-startPoint});
            }

        }




//        var test = "<div class='timeBlock' data-toggle='tooltip' data-placement='top' title='Tooltip on left'></div>";
//        $("#s0Div").append(test);


  //滚动导航栏
        menuYloc = parseInt($(name).css("top").substring(0, $(name).css("top").indexOf("px")));
        $(window).scroll(function () {
            offset = menuYloc + $(document).scrollTop() + "px";
            $(name).animate({top: offset}, {duration: 500, queue: false});
        });

        //设置标题栏用户名
        $("#user").text(getCookie("username"));
        //设置Switch configure
        $("#inputSwitch").blur(function () {
            var SwitchNum = parseInt($("#inputSwitch").val());
            var VMNum = parseInt($("#inputVM").val());
            var SwitchNumNow = $("#Configure").find("label").size();
            if (SwitchNum > SwitchNumNow) {
                for (var i = SwitchNumNow; i < SwitchNum; i++) {
                    var row = "<div class='row' id='" + "row" + i + "'></div>";
                    var br = "<br id='" + "br" + i + "' />";
                    $("#Configure").append(row, br);
                    var col1 = "<div  class='col-xs-2'></div>";
                    var col2 = "<div id='" + "s" + i + "Col2" + "' class='col-xs-1'></div>";
                    var col3 = "<div id='" + "s" + i + "Col3" + "' class='col-xs-more'></div>";
                    var col4 = "<div id='" + "s" + i + "Col4" + "' class='col-xs-2'></div>"
                    var rowID = "#row" + i;
                    $(rowID).append(col1, col2, col3, col4);
                    var label = "<label class='" + "control-label'>" + "s" + i + "</label>";
                    var inputRadio1 = "<input type='radio' name='" + "OF" + i + "' value='OF1.0'/>OF1.0";
                    var inputRadio2 = "<input type='radio' name='" + "OF" + i + "' value='OF1.3' checked='checked'/>OF1.3";
                    var inputFile = "<input type='file' name='" + "file" + i + "'/>";
                    var col2ID = "#s" + i + "Col2";
                    var col3ID = "#s" + i + "Col3";
                    var col4ID = "#s" + i + "Col4";
                    $(col2ID).append(label);
                    $(col3ID).append(inputRadio1, inputRadio2);
                    $(col4ID).append(inputFile);

                    //$(labelID).css("background-color","red");
                }
            }
            else {
                for (i = SwitchNum; i < SwitchNumNow; i++) {
                    rowID = "#row" + i;
                    var brID = "#br" + i;
                    $(rowID).remove();
                    $(brID).remove();
                }
            }




        });
        //设置Topology
        $("#CreateTopology").click(function(){

            $("#flowchart-demo").empty();
            var SwitchNum = parseInt($("#inputSwitch").val());
            var VMNum = parseInt($("#inputVM").val());
            for (var i = 0; i < SwitchNum; i++) {
                var Switch = "<div class='window switch' id='s" + i + "' ><strong>s" + i + "</strong></div>";
                $("#flowchart-demo").append(Switch);
                var space = (800-60*SwitchNum)/(SwitchNum+1);
                var sID = "#s"+i ;
                var left = 60*i+(i+1)*space;
                $(sID).css("left", left );
            }
            for (var j = 0; j < VMNum; j++) {
                var host = "<div class='window host' id='" + "h" + j + "'><strong>" + "v" + j + "</strong></div>";
                $("#flowchart-demo").append(host);
                space = (800-60*VMNum)/(VMNum+1);
                var hID = "#h"+j ;
                left = 60*j+(j+1)*space;
                $(hID).css("left", left );
            }

            $('#myModal').modal('toggle');
            $("#CreateTopology").text("ReCreate Topology");


            jsPlumb.ready(function () {

                var instance = jsPlumb.getInstance({

                    DragOptions: {cursor: 'pointer', zIndex: 2000},
                    ConnectionOverlays: [],
                    Container: "flowchart-demo"
                });

                var basicType = {
                    connector: "StateMachine",
                    paintStyle: {strokeStyle: "red", lineWidth: 4},
                    hoverPaintStyle: {strokeStyle: "blue"},
                    overlays: [
                        "Arrow"
                    ]
                };
                instance.registerConnectionType("basic", basicType);


                var connectorPaintStyle = {
                            lineWidth: 2, strokeStyle: "#61B7CF", joinstyle: "round",
                            outlineColor: "white",
                            outlineWidth: 2
                        },

                        connectorHoverStyle = {
                            lineWidth: 4,
                            strokeStyle: "#216477",
                            outlineWidth: 2,
                            outlineColor: "white"
                        },
                        endpointHoverStyle = {
                            fillStyle: "#216477",
                            strokeStyle: "#216477"
                        },

                        firstEndpoint = {
                            endpoint: "Dot",
                            paintStyle: {
                                strokeStyle: "#000000",  // endpoint color
                                fillStyle: "transparent",
                                radius: 5,
                                lineWidth: 2
                            },
                            isSource: true,
                            isTarget: true,
                            connector: ["StateMachine", {curviness: 20}],
                            connectorStyle: {
                                strokeStyle: "#5c96bc",
                                lineWidth: 2,
                                outlineColor: "transparent",
                                outlineWidth: 4
                            },
                            hoverPaintStyle: endpointHoverStyle,
                            connectorHoverStyle: connectorHoverStyle,
                            dragOptions: {},
                            overlays: [
                                ["Label", {
                                    location: [0.5, 1.5],
                                    label: "eth0",
                                    cssClass: "endpointSourceLabel"
                                }]
                            ]
                        },
                        secondEndpoint = {
                            endpoint: "Dot",
                            paintStyle: {
                                strokeStyle: "#000000",  // endpoint color
                                fillStyle: "transparent",
                                radius: 5,
                                lineWidth: 2
                            },
                            isSource: true,
                            isTarget: true,
                            connector: ["StateMachine", {curviness: 20}],
                            connectorStyle: {
                                strokeStyle: "#5c96bc",
                                lineWidth: 2,
                                outlineColor: "transparent",
                                outlineWidth: 4
                            },
                            hoverPaintStyle: endpointHoverStyle,
                            connectorHoverStyle: connectorHoverStyle,
                            dragOptions: {},
                            overlays: [
                                ["Label", {
                                    location: [0.5, 1.5],
                                    label: "eth1",
                                    cssClass: "endpointSourceLabel"
                                }]
                            ]
                        },
                        thirdEndpoint = {
                            endpoint: "Dot",
                            paintStyle: {
                                strokeStyle: "#000000",  // endpoint color
                                fillStyle: "transparent",
                                radius: 5,
                                lineWidth: 2
                            },
                            isSource: true,
                            isTarget: true,
                            connector: ["StateMachine", {curviness: 20}],
                            connectorStyle: {
                                strokeStyle: "#5c96bc",
                                lineWidth: 2,
                                outlineColor: "transparent",
                                outlineWidth: 4
                            },
                            hoverPaintStyle: endpointHoverStyle,
                            connectorHoverStyle: connectorHoverStyle,
                            dragOptions: {},
                            overlays: [
                                ["Label", {
                                    location: [0.5, 1.5],
                                    label: "eth2",
                                    cssClass: "endpointSourceLabel"
                                }]
                            ]
                        },
                        fourthEndpoint = {
                            endpoint: "Dot",
                            paintStyle: {
                                strokeStyle: "#000000",  // endpoint color
                                fillStyle: "transparent",
                                radius: 5,
                                lineWidth: 2
                            },
                            isSource: true,
                            isTarget: true,
                            connector: ["StateMachine", {curviness: 20}],
                            connectorStyle: {
                                strokeStyle: "#5c96bc",
                                lineWidth: 2,
                                outlineColor: "transparent",
                                outlineWidth: 4
                            },
                            hoverPaintStyle: endpointHoverStyle,
                            connectorHoverStyle: connectorHoverStyle,
                            dragOptions: {},
                            overlays: [
                                ["Label", {
                                    location: [0.5, 1.5],
                                    label: "eth3",
                                    cssClass: "endpointSourceLabel"
                                }]
                            ]
                        },

                        init = function (connection) {
                            connection.getOverlay("label").setLabel(connection.sourceId.substring(15) + "-" + connection.targetId.substring(15));
                        };
                var addSwitchEndpoints = function (toId, Anthors) {
                    var Endpoints = new Array(firstEndpoint, secondEndpoint, thirdEndpoint, fourthEndpoint);
                    for (var i = 0; i < Anthors.length; i++) {
                        var uuid = toId + ":" + i;
                        instance.addEndpoint(toId, Endpoints[i], {
                            anchor: Anthors[i], uuid: uuid
                        });
                    }
                };
                var addVMEndpoints = function (toId, Anthors) {
                    for (var j = 0; j < Anthors.length; j++) {
                        var uuid = toId + ":" + j;
                        instance.addEndpoint(toId, firstEndpoint, {
                            anchor: Anthors[j], uuid: uuid
                        });
                    }
                };


                instance.batch(function () {
                    for (var i = 0; i < SwitchNum; i++) {
                        var Switch = "s" + i;
                        addSwitchEndpoints(Switch, ["TopCenter", "LeftMiddle", "BottomCenter", "RightMiddle"])
                    }
                    for (var j = 0; j < VMNum; j++) {
                        var VM = "h" + j;
                        addVMEndpoints(VM, ["TopCenter"])
                    }


                    instance.bind("connection", function (connInfo, originalEvent) {
                        init(connInfo.connection);
                    });


                    instance.draggable(jsPlumb.getSelector(".flowchart-demo .window"), {grid: [20, 20]});


                    instance.bind("click", function (c) {
                        instance.detach(c);
                    });


                    instance.bind("connectionDrag", function (connection) {
                        console.log("connection " + connection.id + " is being dragged. suspendedElement is ", connection.suspendedElement, " of type ", connection.suspendedElementType);
                    });

                    instance.bind("connectionDragStop", function (connection) {
                        console.log("connection " + connection.id + " was dragged");
                    });

                    instance.bind("connectionMoved", function (params) {
                        console.log("connection " + params.connection.id + " was moved");
                    });
                });

                jsPlumb.fire("jsPlumbDemoLoaded", instance);

                $("#SaveChanges").click(function(){
                   //document.cookie = "Topology" + " = " + "" + ";";
                    Topology = "{";
                    var connect = instance.getAllConnections();
                    for (var k = 0; k < connect.length; k++) {
                        var line = connect[k].endpoints;
                        var start,end;
                        if(line[0].getUuid().substr(0,1) == "h")
                        {
                            start = line[0].getUuid();
                            end = line[1].getUuid();
                        }
                        else
                        {
                            start = line[1].getUuid();
                            end = line[0].getUuid();
                        }

                        Topology = Topology + "\"" + start + "\":" + "\"" + end + "\"";
                        if (k < connect.length - 1)
                            Topology = Topology + ",";
                        else Topology = Topology + "}";
                    }

                    document.cookie = "Topology" + " = " + Topology + ";";



                });
            });
        });
        //查看topology
        $("#CheckTopology").click(function(){
            $('#myModal').modal('show');
        });
        //查看交换机状态
        $("#CheckSwitchButton").click(function(){
            var width = $(window).width()/2;
            $(".modal-dialog2").css("marginLeft",width-420);
            $("#CheckSwitchModal").modal("toggle");
        });
        $("#CheckVMButton").click(function(){
            var width = $(window).width()/2;
            $(".modal-dialog2").css("marginLeft",width-420);
            $("#CheckVMModal").modal("toggle");
        });

        $("#test").click(function(){
//         layer.tips('默认就是向右的', '#test',{
//                tips: [4, '#000000'],
//                time: 400
//            });
//            layer.alert('text', {icon: 1});
        });




//        $("#Order").click(function(){

//        });

    })
</script>
</body>
</html>
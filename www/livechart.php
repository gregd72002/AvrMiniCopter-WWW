<!doctype html>
<?php
session_start();
@include "rpi_ip.php";
?>
<html>
<head>
  <title>Live charting</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="jquery/jquery.mobile-1.4.3.min.css" />
  <script src="jquery/jquery-1.11.1.min.js"></script>
  <script src="jquery/jquery.mobile-1.4.3.min.js"></script>
  <script src="websockify/util.js"></script>
  <script src="websockify/base64.js"></script>
  <script src="websockify/websock.js"></script>
  <script src="canvasjs/jquery.canvasjs.min.js"></script>
  <script src="routines.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        ws = new Websock();
        var lip = '<?php echo $host ?>';
	console.log(lip);
        ws.open("ws://"+lip+":8888");
	ws.on('message',lc_ws_recv);
	ws.on('error',lc_ws_err);
	statusDiv.text("Select log type on the right");
    });
</script>
</head>
<body>

<div data-role="page" id="wsdebug">
<div data-role="header">
<a href="index.php" data-ajax="false" data-rel="back" data-transition="slide" class="ui-btn ui-corner-all ui-btn-inline">Go Back</a>
<h1>Live charting</h1>
</div>

<div role="main" class="ui-content">
<div id="status">
Status...
</div>
<div style="float: left;width: 86%;height: 400px;" id="chart">
</div>
<div style="float: left;width: 12%;margin-left:20px;height:400px;">
<button id="btnoff">Off</button>
<button id="btnaccel">Accel</button>
<button id="btngyro">Gyro</button>
<button id="btnquat">Quaternions</button>
<button id="btnalt">Altitude</button>
</div>
<div style="float: left;width: 86%;height: 400px;" id="chart1">
</div>
</div>
</div>

<script>
var statusDiv = $("div#status");
$( "#btnoff" ).click(function(){changeChart(0);});
$( "#btnaccel" ).click(function(){changeChart(1);});
$( "#btngyro" ).click(function(){changeChart(2);});
$( "#btnquat" ).click(function(){changeChart(3);});
$( "#btnalt" ).click(function(){changeChart(4);});

function changeChart(x) {
	if (chart) delete chart;
	if (chart1) delete chart1;
	$( "#chart" ).empty();
	$( "#chart1" ).empty();
	chart = null;
	chart1 = null;
	switch(x) {
		case 0: 
			ws_send(2,0);
			chart_dummy();
			break;
		case 1:
			ws_send(2,1);
			chart_accel();
			break;
		case 2:
			ws_send(2,2);
			chart_gyro();
			break;
		case 3:
			ws_send(2,3);
			chart_quat();
			break;
		case 4:
			ws_send(2,4);
			chart_alt();
			break;
	}	
}

setInterval(function(){if (chart!=null) chart.render(); if (chart1!=null) chart1.render()}, 50); 

var dataLength = 500;
var xVal = 0;
var dps = [], dps1 = [];
var chart = null,chart1 = null;
var msg_handler = function() {};
var packet = [];

function chart_dummy() {
}

function chart_alt() {
	dps = [[],[],[]];
	packet = [0,0,0];
	xVal = 0;

	chart = new CanvasJS.Chart("chart", {
	 animationEnabled: false,
	exportEnabled: true,
      title:{
        text: "Altitude"              
      },
      legend: default_legend, 
      data: [//array of dataSeries              
        {
         type: "line",
	 markerType: "line",
	 dataPoints: dps[0],
	showInLegend: true,
	name: 'Altitude target [cm]'
       },
        {
         type: "line",
	 markerType: "line",
         dataPoints: dps[1],
	showInLegend: true,
	name: 'Current Altitude [cm]'
       },
        {
         type: "line",
	 markerType: "line",
         dataPoints: dps[2],
	showInLegend: true,
	name: 'Current speed [cm/s]'
       }
       ]
     });

    msg_handler = chart_alt_handler;
}

function chart_alt_handler(t, v) {
	if (t>=18 && t<=20) {
		packet[t-18] = v;

		if (t==18) {
			add_packet();
		}
	}
}

function chart_accel() {
	dps = [[],[],[],[],[],[]];
	packet = [0,0,0,0,0,0];
	xVal = 0;

	chart = new CanvasJS.Chart("chart", {
	 animationEnabled: false,
	exportEnabled: true,
      title:{
        text: "Accelerometer"              
      },
      legend: default_legend, 
      data: [//array of dataSeries              
        {
         type: "line",
	 markerType: "line",
	 dataPoints: dps[0],
	showInLegend: true,
	name: 'Max X'
       },
        {
         type: "line",
	 markerType: "line",
         dataPoints: dps[1],
	showInLegend: true,
	name: 'Max Y'
       },
        {
         type: "line",
	 markerType: "line",
         dataPoints: dps[2],
	showInLegend: true,
	name: 'Max Z'
       },
        {
         type: "line",
	 markerType: "line",
         dataPoints: dps[3],
	showInLegend: true,
	name: 'Min X'
       },
        {
         type: "line",
	 markerType: "line",
         dataPoints: dps[4],
	showInLegend: true,
	name: 'Min Y'
       },
        {
         type: "line",
	 markerType: "line",
         dataPoints: dps[5],
	showInLegend: true,
	name: 'Min Z'
       },
       ]
     });

    msg_handler = chart_accel_handler;
}

function chart_accel_handler(t, v) {
	if (t>=12 && t<=17) {
		packet[t-12] = v/1000;

		if (t==12) {
			add_packet();
		}
	}
}

function chart_quat_handler(t, v) {
	if (t>=4 && t<=7) {
		packet[t-4] = v/100;

		if (t==4) {
			add_packet();
		}
	} else if (t>=8 && t<=11) {
		packet[t-4] = v;
	}
}

function _chart_motor() {
	chart1 = new CanvasJS.Chart("chart1", {
	 animationEnabled: false,
	exportEnabled: true,
      title:{
        text: "Motors PWM"              
      },
      legend: default_legend, 
      data: [//array of dataSeries              
        {
         type: "line",
	 markerType: "line",
	 dataPoints: dps[4],
	showInLegend: true,
	name: 'Yaw'
       },
        {
         type: "line",
	 markerType: "line",
         dataPoints: dps[5],
	showInLegend: true,
	name: 'Pitch'
       },
        {
         type: "line",
	 markerType: "line",
         dataPoints: dps[6],
	showInLegend: true,
	name: 'Roll'
       },
        {
         type: "line",
	 markerType: "line",
         dataPoints: dps[7],
	showInLegend: true,
	name: 'Yaw Target'
       }
       ]
     });
}

function chart_quat() {
	dps = [[],[],[],[],[],[],[],[]];
	packet = [0,0,0,0,0,0,0,0];
	xVal = 0;

	chart = new CanvasJS.Chart("chart", {
	 animationEnabled: false,
	exportEnabled: true,
      title:{
        text: "Quaternions"              
      },
      legend: default_legend, 
      data: [//array of dataSeries              
        {
         type: "line",
	 markerType: "line",
	 dataPoints: dps[0],
	showInLegend: true,
	name: 'Yaw'
       },
        {
         type: "line",
	 markerType: "line",
         dataPoints: dps[1],
	showInLegend: true,
	name: 'Pitch'
       },
        {
         type: "line",
	 markerType: "line",
         dataPoints: dps[2],
	showInLegend: true,
	name: 'Roll'
       },
        {
         type: "line",
	 markerType: "line",
         dataPoints: dps[3],
	showInLegend: true,
	name: 'Yaw Target'
       }
       ]
     });

	_chart_motor();

    msg_handler = chart_quat_handler;

}

function chart_quat_handler(t, v) {
	if (t>=4 && t<=7) {
		packet[t-4] = v/100;

		if (t==4) {
			add_packet();
		}
	} else if (t>=8 && t<=11) {
		packet[t-4] = v;
	}
}


function chart_gyro() {
	dps = [[],[],[],[],[],[],[]];
	packet = [0,0,0,0,0,0,0];
	xVal = 0;

	chart = new CanvasJS.Chart("chart", {
	 animationEnabled: false,
	exportEnabled: true,
      title:{
        text: "Gyroscope"              
      },
      legend: default_legend, 
      data: [//array of dataSeries              
        {
         type: "line",
	 markerType: "line",
	 dataPoints: dps[0],
	showInLegend: true,
	name: 'Yaw'
       },
        {
         type: "line",
	 markerType: "line",
         dataPoints: dps[1],
	showInLegend: true,
	name: 'Pitch'
       },
        {
         type: "line",
	 markerType: "line",
         dataPoints: dps[2],
	showInLegend: true,
	name: 'Roll'
       }
       ]
     });

	_chart_motor();

    msg_handler = chart_gyro_handler;
}

function chart_gyro_handler(t, v) {
	if (t>=1 && t<=3) {
		packet[t-1] = v/100;

		if (t==1) {
			add_packet();
		}
	} else if (t>=8 && t<=11) {
		packet[t-5] = v;
	}
}

default_legend = {
	cursor: "pointer",
	itemclick: function (e) {
		if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
			e.dataSeries.visible = false;
		} else {
			e.dataSeries.visible = true;
		}
		chart.render();
	}
}

function add_packet() {
	xVal++;
	for (var i=0;i<packet.length;i++)
		dps[i].push({'x':xVal, 'y':packet[i]});
	if (dps[0].length > dataLength) {
		for (var i=0;i<packet.length;i++)
		dps[i].shift();
	}
}

function lc_ws_recv() {
	var data = ws_recv();
	if (data.err !== undefined) {
		statusDiv.text(data.err);
		return;
	}
	if (data.msg !== undefined) {
		statusDiv.text(data.err);
		return;
	}
	for (var i=0;i<data.data.length;i++) {
		msg_handler(data.data[i].t,data.data[i].v);
	}
}

function lc_ws_err() {
	statusDiv.text("WS Error");
	console.log('WS Error: ',arguments);
}

function clearStatus() {
	statusDiv.text("");
}


</script>
</body>
</html>

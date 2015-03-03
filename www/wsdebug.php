<!doctype html>
<?php
session_start();
@include "rpi_ip.php";
?>
<html>
<head>
  <title>WS Debug</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="jquery/jquery.mobile-1.4.3.min.css" />
  <script src="jquery/jquery-1.11.1.min.js"></script>
  <script src="jquery/jquery.mobile-1.4.3.min.js"></script>
  <script src="websockify/util.js"></script>
  <script src="websockify/base64.js"></script>
  <script src="websockify/websock.js"></script>
  <script src="routines.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        ws = new Websock();
        var lip = '<?php echo $host; ?>';
	console.log(lip);
	ws.on('error',debug_ws_err);
	ws.on('open',ws_init);
        ws.open("ws://"+lip+":8888");
	debug_start_ws();
    });
</script>
</head>
<body>

<div data-role="page" id="wsdebug">
<div data-role="header">
<a href="index.php" data-ajax="false" data-rel="back" data-transition="slide" class="ui-btn ui-corner-all ui-btn-inline">Go Back</a>
<h1>WS Debug</h1>
</div>

<div role="main" class="ui-content">

<div data-role="collapsible" data-collapsed="true">
<h3>Help</h3>
<pre>
<?php
@include "debug_help.txt";
?>
</pre>
</div>
<div style="float: left;width: 48%;height: 400px;">
<textarea name="textarea" id="cmd" data-role="none" style="margin-top: 13px; width: 100%;height: 300px; font-family:Consolas,Monaco,Lucida Console,Liberation Mono,DejaVu Sans Mono,Bitstream Vera Sans Mono,Courier New, monospace; overflow: scroll;"></textarea>
<button id="sendCmd">Send</button>
<div id="status">
</div>
</div>
<div style="float: left;width: 48%;margin-left:20px;height:450px;">
<pre id="debugView" style="width: 100%;height:300px;overflow: scroll; border-style:solid; border-width: 1px;">
</pre>
<button id="toggleDebug">Pause</button>
Filter: <input data-role="none" style="width: 200px" type="text" name="filter" id="filter" value="255 254 253 252"/>
<button data-role="none" id="btnfilter">Apply</button>
<button data-role="none" id="btnfilterclear">Clear</button>
</div>
</div>
</div>

<script>
var BUF_SIZE = 20;
var buf_lines = 0;
var pause = 0;
var pause_x = 0;
var filter = ['255', '254', '253', '252'];

function debug_ws_recv() {
	var data = ws_recv();
	if (data.err !== undefined) {
		addLineToDebug(data.err);
		return;
	}
	if (data.msg) {
		addLineToDebug(data.err);
		return;
	}
	for (var i=0;i<data.data.length;i++) {
		addToDebug(0,data.data[i].c,data.data[i].t,data.data[i].v);
	
	}
}

function debug_ws_err() {
	addLineToDebug('WS Error');
	console.log('WS Error: ',arguments);
}

function debug_ws_send(c,t,v) {
	ws_send(c,t,v);
}

function isInt(value) {

    var er = /^-?[0-9]+$/;

    return er.test(value);
}

var statusDiv = $("div#status");
function clearStatus() {
	statusDiv.text("");
}

function debug_start_ws() {
	ws.on('message',debug_ws_recv);
}

function debug_pause_ws() {
	ws.on('message',function(){ws.rQshiftBytes(ws.rQlen())});
}

$( "#btnfilterclear" ).click(function(){
	$("input#filter").val("");
	filter = [];
	return false;
});

$( "#btnfilter" ).click(function(){
	var c = $("input#filter").val();
	filter = c.trim().replace(/\s+/g, ' ').split(' ');
	if (filter[0] == "") filter = [];
	return false;
});

$( "#sendCmd" ).click(function(){
		var d = [];
		var c = $("textarea#cmd").val();
		var err = 0;
		c = c.split("\n");
		//validate
		for (var i=0;i<c.length;i++) {
			var tmp = c[i].trim().replace(/\s+/g, ' ').split(' ');
			if ((typeof tmp[0] == 'undefined') || (typeof tmp[1] == 'undefined')) {
				statusDiv.text("Error parsing line: "+i);
				setTimeout(clearStatus,3000);
				return false;
			} else if (isInt(tmp[0]) &&  isInt(tmp[1]) && isInt(tmp[2])) {
				d.push({"c": tmp[0], "t": tmp[1], "v": tmp[2]});
			} else if (isInt(tmp[0]) &&  isInt(tmp[1])) {
				d.push({"c": 0, "t": tmp[0], "v": tmp[1]});
			} else {
				statusDiv.text("Error parsing int on line: "+i);
				setTimeout(clearStatus,3000);
				return false;
			}
		}

		//populate debug
		for (var i=0;i<d.length;i++) {
			addToDebug(1,d[i].c,d[i].t,d[i].v);
			debug_ws_send(d[i].c,d[i].t,d[i].v)
		}

		$("textarea#cmd").val("");
		return false;
});

$( "#toggleDebug" ).click(function(){
	if (!pause) {
                        $("button#toggleDebug").html("Start");  
                        debug_pause_ws();
			pause = 1;
	} else {
                        $("button#toggleDebug").html("Pause");  
                        debug_start_ws();
			pause = 0;
	}
		return false;
	});

var pre = $("pre#debugView");

function addLineToDebug(l) {
	if (buf_lines==BUF_SIZE) {
		var str = pre.text();
		pre.text(str.substring(str.indexOf("\n") + 1));
	} else {
		buf_lines++;
	}
	pre.append(l+"\n");
	pre.scrollTop( pre.prop("scrollHeight") );
}

function addToDebug(s, c, t ,v) {
	t=""+t;
	if (s == 0)
		if (filter.length>0)
			if ($.inArray(t,filter)==-1) return;
	if (s==0) 
		addLineToDebug(">> "+c+" "+t+" "+v);
	else 
		addLineToDebug(""+c+" "+t+" "+v);
}

</script>
</body>
</html>

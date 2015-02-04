<!doctype html>
<?php
session_start();
@include "load_wifi.php";
?>
<html>
<head>
  <title>Wifi Settings</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="jquery/jquery.mobile-1.4.3.min.css" />
  <link rel="stylesheet" href="js/jquery-linedtextarea.css" />
  <script src="jquery/jquery-1.11.1.min.js"></script>
  <script src="jquery/jquery.mobile-1.4.3.min.js"></script>
  <script src="js/jquery-linedtextarea.js"></script>
  <script src="routines.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
	$(".lined").linedtextarea(
		{selectedLine: 1}
	);
	wifi_load();
    });
</script>
</head>
<body>

<div data-role="page" id="wifisettings">
<div data-role="header">
<a href="index.php" data-ajax="false" data-rel="back" data-transition="slide" class="ui-btn ui-corner-all ui-btn-inline">Go Back</a>
<h1>Wifi</h1>
</div>

<div role="main" class="ui-content">
<div data-role="collapsible" data-collapsed="true">
<h3>Help</h3>
<pre>
- you will need to reboot to apply changes
- when using quotes use double quotes only

Wifi.sh script is run ones on every boot.
By default, the wifi.sh script tries to connect to existing network.
If this fails an ad-hoc network is created RpiCopter with Key 01234
</pre>
</div>
<div style="width: 95%; margin: auto;">
<div style="width: 100%;height:340px;margin-bottom: 20px;">
wifi.sh:
<textarea class="lined" name="textarea" id="wifish" data-role="none" style="margin-top: 13px; width: 100%;height: 300px; font-family:Consolas,Monaco,Lucida Console,Liberation Mono,DejaVu Sans Mono,Bitstream Vera Sans Mono,Courier New, monospace; overflow: scroll;"></textarea>
</div>
<div style="width: 100%;height: 340px;margin-bottom: 20px;">
wpa_supplicant.conf:
<textarea class="lined" name="textarea" id="wpas" data-role="none" style="margin-top: 13px; width: 100%;height: 300px; font-family:Consolas,Monaco,Lucida Console,Liberation Mono,DejaVu Sans Mono,Bitstream Vera Sans Mono,Courier New, monospace; overflow: scroll;"></textarea>
</div>
<div style="width: 100%;height:340px;">
hostapd.conf:
<textarea class="lined" name="textarea" id="hostap" data-role="none" style="margin-top: 13px; width: 100%;height: 300px; font-family:Consolas,Monaco,Lucida Console,Liberation Mono,DejaVu Sans Mono,Bitstream Vera Sans Mono,Courier New, monospace; overflow: scroll;"></textarea>
</div>
</div>
<div style="margin-top:30px;">
<button style="width: 150px; margin: auto" id="sendWIFI">Save</button>
<button style="width: 150px; margin: auto" id="reboot">Reboot</button>
<div style="width: 150px; margin: auto" id="status">
</div>
</div>

<script>
var statusDiv = $("div#status");
function clearStatus() {
	statusDiv.text("");
}
$( "#reboot" ).click(function(){
	$.ajax({
    url: 'reboot.php',
    type: 'POST',
    data: { },
    success: function(result) {
	statusDiv.text("Rebooting...");
    },
    error: function(result) {
	statusDiv.text("Error rebooting!");
    }
});
	return false;
});

$( "#sendWIFI" ).click(function(){
	var wpas = $("textarea#wpas").val();
	var wifi = $("textarea#wifish").val();
	var hostap = $("textarea#hostap").val();
	console.log(wpas,wifi,hostap);
$.ajax({
    url: 'save_wifi.php',
    type: 'POST',
    data: { data1: wpas, data2: wifi, data3: hostap },
    success: function(result) {
	statusDiv.text("Saved.");
	setTimeout(clearStatus,3000);
	
    },
    error: function(result) {
	statusDiv.text("Error!");
	setTimeout(clearStatus,3000);
    }
});
	return false;
});

function wifi_load() {
	var wpas = <?php echo $wpasupplicant; ?>;
	var wifi = <?php echo $wifish; ?>;
	var hostap = <?php echo $hostap; ?>;
	
	
	$("textarea#wpas").val(wpas);
	$("textarea#wifish").val(wifi);
	$("textarea#hostap").val(hostap);
}

</script>
</body>
</html>

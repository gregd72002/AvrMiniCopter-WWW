<!doctype html>
<?php
session_start();
@include "load.php";
?>
<html>
<head>
  <title>AvrMiniCopter</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="jquery/jquery.mobile-1.4.3.min.css" />
  <script src="jquery/jquery-1.11.1.min.js"></script>
  <script src="jquery/jquery.mobile-1.4.3.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(window).bind('hashchange', function() {
            var hash = window.location.hash.substring(1);
            $.get('save.php', { tag: hash },
                function(data) { $('#tag').html(data); }
            );
        });
    });
</script>

</head>
<body>
<form data-ajax="false" method="post" action="save.php">
  <div data-role="page" id="mainmenu">
    <div data-role="header">
      <h1>Main menu</h1>
    </div>
    <div role="main" class="ui-content">
      <a data-ajax="false" href="#pid" data-transition="slide" class="ui-btn ui-corner-all">PIDs</a>
      <a data-ajax="false" href="#esc" data-transition="slide" class="ui-btn ui-corner-all">ESC</a>
      <a data-ajax="false" href="#other" data-transition="slide" class="ui-btn ui-corner-all">Other</a>
      <a data-ajax="false" href="#logs" data-transition="slide" class="ui-btn ui-corner-all">Logs</a>
      <a data-ajax="false" href="#camera" data-transition="slide" class="ui-btn ui-corner-all">Camera</a>
      <a data-ajax="false" href="wsdebug.php" data-transition="slide" class="ui-btn ui-corner-all">WebSock Debug</a>
      <a data-ajax="false" href="livechart.php" data-transition="slide" class="ui-btn ui-corner-all">Live Charts</a>
      <a data-ajax="false" href="wifi.php" data-transition="slide" class="ui-btn ui-corner-all">Wifi Settings</a>
<?php
$addons_dir = 'addons/';
$files = glob($addons_dir.'cfg_*.php', GLOB_BRACE);
foreach($files as $file) {
  //do your work here
  @include $file;
  $n = substr($file, 11);
  $n = substr($n, 0, strpos($n, '.'));
  
  $dst = ${$n."_HREF"};
  $name = ${$n."_NAME"};

  echo '<a data-ajax="false" href="'.$addons_dir.$dst.'" data-transition="slide" class="ui-btn ui-corner-all">'.$name.'</a>';
}
?>
<div data-role="collapsible" data-collapsed="true">
<h3>Config view</h3>
<pre>
<?php
readfile($config_path."rpicopter.config");
?>
</pre>
</div>
    </div>
  </div>
<?php
@include "pid.php";
@include "esc.php";
@include "other.php";
@include "camera.php";
@include "log.php";
?>
</form>
</body>
</html>

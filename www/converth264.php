<?php
error_reporting(E_ALL);
ini_set('display_errors', True);
@include_once("config.php");
$f = $_GET['f'];
$f = substr($f, 0, -5);
$ret = shell_exec('sh /var/www/shell/converth264.sh '.$cam_path.$f);

//echo $ret;

header('Location: index.php#camera');

exit(0);

?>

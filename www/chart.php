<?php
error_reporting(E_ALL);
ini_set('display_errors', True);
@include('config.php');
$f = $_GET['f'];
$t = $_GET['t'];
shell_exec('rm '.$log_path.'chart.png');
shell_exec('sh /var/www/shell/t'.$t.'chart.sh '.$log_path.$f.' '.$log_path.'chart.png');

header('Content-type: image/png');

readfile($log_path.'chart.png');
exit(0);

?>

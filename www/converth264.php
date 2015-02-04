<?php
error_reporting(E_ALL);
ini_set('display_errors', True);
@include('config.php');
$f = $_GET['f'];
$ret = shell_exec('sh /var/www/shell/converth264.sh '.$log_path.$f);

echo $ret;

header('Location: index.php#camera');

exit(0);

?>

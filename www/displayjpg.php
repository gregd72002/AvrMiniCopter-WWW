<?php
@include_once("config.php");
$f = $_GET['f'];

header('Content-type: image/jpeg');

readfile($log_path.$f);
exit(0);

?>

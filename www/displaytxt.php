<?php
@include_once("config.php");
$f = $_GET['f'];
ini_set('auto_detect_line_endings',true);

header('Content-Type: text/csv');
readfile($log_path.$f);

exit(0);

?>

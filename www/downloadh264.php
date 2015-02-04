<?php
@include('config.php');
$f = $_GET['f'];

header('Content-type: video/h264');
header('Content-Disposition: attachment; filename='.$f);

readfile($log_path.$f);
exit(0);

?>

<?php
@include_once('config.php');
$f = $_GET['f'];

header('Content-type: video/h264');
header('Content-Disposition: attachment; filename='.$f);
header("Content-length: ".filesize($cam_path.$f));

readfile_chunked($cam_path.$f);
exit(0);

?>

<?php
@include('config.php');
$f = $_GET['f'];

header('Content-type: video/h264');
header('Content-Disposition: attachment; filename='.$f);

readfile($cam_path.$f);
exit(0);

?>

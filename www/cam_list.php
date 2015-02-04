<ul data-role="listview">
<?php
@include("config.php");

$d = [];
$files = glob($cam_path.'*.jpg');
for ($i=0;$i<count($files);$i++) {
        $fs = filesize($files[$i]);
        $time = time() - filemtime($files[$i]);
        array_push($d,array($time,$fs,basename($files[$i]),0));
}

$files = glob($cam_path.'*.h264');
for ($i=0;$i<count($files);$i++) {
        $fs = filesize($files[$i]);
        $time = time() - filemtime($files[$i]);
        array_push($d,array($time,$fs,basename($files[$i]),1));
}

$files = glob($cam_path.'*.mp4');
for ($i=0;$i<count($files);$i++) {
        $fs = filesize($files[$i]);
        $time = time() - filemtime($files[$i]);
        array_push($d,array($time,$fs,basename($files[$i]),2));
}

function cam_cmp($a, $b) {
        if ($a[0]<$b[0]) return -1;
        if ($a[0]==$b[0]) return 0;
        if ($a[0]>$b[0]) return 1;

}
usort($d, 'cam_cmp');

for ($i=0;$i<count($d);$i++) {
	if ($d[$i][3]==0) {
		echo "<li><a data-ajax='false' href='displayjpg.php?f=".$d[$i][2]."'> ".$d[$i][2]." </a></li>";
	}
	else { 
		echo "<li><a data-ajax='true' data-transition='slide' href='cam_select.php?t=".$d[$i][3]."&f=".$d[$i][2]."&hash=".$page_id."'>  ".$d[$i][2]." (". $d[$i][1].")  </a></li>";
	}

}

?>
</ul>

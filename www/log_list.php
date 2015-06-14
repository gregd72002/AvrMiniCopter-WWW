<ul data-role="listview">
<?php
@include_once("config.php");
function substrAfter($str, $last) {
        return substr( $str, strrpos( $str, $last )+2 );
}

$d = [];
$files = glob($log_path.'*.log');
for ($i=0;$i<count($files);$i++) {
        $fs = filesize($files[$i]);
        $time = time() - filemtime($files[$i]);
        $bname = basename($files[$i]);
        $l_type = substrAfter(basename($bname,'.log'),'.t');
        array_push($d,array($time,$fs,$bname,$l_type));
}

function log_cmp($a, $b) {
        if ($a[0]<$b[0]) return -1;
        if ($a[0]==$b[0]) return 0;
        if ($a[0]>$b[0]) return 1;

}

usort($d, 'log_cmp');

for ($i=0;$i<count($d);$i++) {
	echo "<li><a data-ajax='true' data-transition='slide' href='log_select.php?t=".$d[$i][3]."&f=".$d[$i][2]."'>  ".$d[$i][2]." (". $d[$i][1].")  </a></li>";

}

?>
</ul>

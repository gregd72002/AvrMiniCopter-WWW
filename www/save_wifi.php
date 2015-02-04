<?php
$wpa = $_POST['data1'];
$wifi = $_POST['data2'];
$hostap = $_POST['data3'];

if ($wpa == '') exit(0);
if ($wifi == '') exit(0);
if ($hostap == '') exit(0);

$handle = fopen("/etc/wpa_supplicant.conf", "w");
fprintf($handle,$wpa);
fclose($handle); 

$handle = fopen("/usr/local/bin/wifi.sh", "w");
fprintf($handle,$wifi);
fclose($handle); 

$handle = fopen("/etc/hostapd.conf", "w");
fprintf($handle,$hostap);
fclose($handle); 

?>


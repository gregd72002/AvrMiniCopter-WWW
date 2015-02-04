<?php
error_reporting(E_ALL);
ini_set('display_errors', True);

$wpasupplicant = file_get_contents("/etc/wpa_supplicant.conf");
$wpasupplicant = json_encode($wpasupplicant);

$wifish = file_get_contents("/usr/local/bin/wifi.sh");
$wifish = json_encode($wifish);

$hostap = file_get_contents("/etc/hostapd.conf");
$hostap = json_encode($hostap);

?>

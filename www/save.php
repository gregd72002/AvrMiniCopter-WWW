<?php
session_start();
@include("load.php");

if (isset($_GET['tag'])) {
	$hash = $_GET['tag'];
	$_SESSION['hash']=$hash;
	exit(0);
}

/*
if ($_POST['cmd']!='') {
header('Location: '.$_SERVER['HTTP_REFERER'].'#'.$_POST['hash']);
exit(0);
}
*/

$c[0][0] = $_POST['throttle_0'];
$c[0][1] = $_POST['throttle_1'];

$c[1][0] = $_POST['pidr_y_0']; 
$c[1][1] = $_POST['pidr_y_1']; 
$c[1][2] = $_POST['pidr_y_2']; 
$c[1][3] = $_POST['pidr_y_3']; 
$c[1][4] = $_POST['pidr_y_4']; 

$c[2][0] = $_POST['pidr_p_0']; 
$c[2][1] = $_POST['pidr_p_1']; 
$c[2][2] = $_POST['pidr_p_2']; 
$c[2][3] = $_POST['pidr_p_3']; 
$c[2][4] = $_POST['pidr_p_4']; 
$c[3][0] = $_POST['pidr_p_0']; 
$c[3][1] = $_POST['pidr_p_1']; 
$c[3][2] = $_POST['pidr_p_2']; 
$c[3][3] = $_POST['pidr_p_3']; 
$c[3][4] = $_POST['pidr_p_4']; 

$c[4][0] = $_POST['pids_y_0']; 
$c[4][1] = $_POST['pids_y_1']; 
$c[4][2] = $_POST['pids_y_2']; 
$c[4][3] = $_POST['pids_y_3']; 
$c[4][4] = $_POST['pids_y_4']; 

$c[5][0] = $_POST['pids_p_0']; 
$c[5][1] = $_POST['pids_p_1']; 
$c[5][2] = $_POST['pids_p_2']; 
$c[5][3] = $_POST['pids_p_3']; 
$c[5][4] = $_POST['pids_p_4']; 

$c[6][0] = $_POST['pids_p_0']; 
$c[6][1] = $_POST['pids_p_1']; 
$c[6][2] = $_POST['pids_p_2']; 
$c[6][3] = $_POST['pids_p_3']; 
$c[6][4] = $_POST['pids_p_4']; 

$c[7][0] = $_POST['pid_alt_0']; 
$c[7][1] = $_POST['pid_alt_1']; 
$c[7][2] = $_POST['pid_alt_2']; 
$c[7][3] = $_POST['pid_alt_3']; 
$c[7][4] = $_POST['pid_alt_4']; 

$c[8][0] = $_POST['pid_vz_0']; 
$c[8][1] = $_POST['pid_vz_1']; 
$c[8][2] = $_POST['pid_vz_2']; 
$c[8][3] = $_POST['pid_vz_3']; 
$c[8][4] = $_POST['pid_vz_4']; 

$c[9][0] = $_POST['pid_accel_0']; 
$c[9][1] = $_POST['pid_accel_1']; 
$c[9][2] = $_POST['pid_accel_2']; 
$c[9][3] = $_POST['pid_accel_3']; 
$c[9][4] = $_POST['pid_accel_4']; 

$c[10][0] = $_POST['acro_p'];
$c[10][1] = $_POST['baro_f'];

$c[11][0] = $_POST['motor_pin_0'];
$c[11][1] = $_POST['motor_pin_1'];
$c[11][2] = $_POST['motor_pin_2'];
$c[11][3] = $_POST['motor_pin_3'];

$c[12][0] = $_POST['mpu_addr'];
$c[12][1] = $_POST['mpu_pos'];
$c[12][2] = $_POST['mpu_reset'];

for ($i=0;$i<count($c);$i++) {                    
    for ($j=0;$j<count($c[$i]);$j++)       
	if (is_numeric($c[$i][$j])==FALSE) {
		echo $i." ".$j." ".$c[$i][$j]."\n";
		die("Variable incorrect. Will NOT save.");
		exit(0);
	} 
}

$handle = fopen($config_path."rpicopter.config", "w");
for ($i=0;$i<count($c);$i++) {                    
    for ($j=0;$j<count($c[$i]);$j++)       
        fprintf($handle,"%s\t",$c[$i][$j]);
    fprintf($handle,"\n");
}                                   
                                    
fclose($handle); 


shell_exec("/usr/local/bin/avrspi_cmd -t 0 -v 1");

header('Location: '.$_SERVER['HTTP_REFERER'] . '#' . $_SESSION['hash']);
?>

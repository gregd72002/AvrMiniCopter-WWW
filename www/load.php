<?php
error_reporting(E_ALL);
ini_set('display_errors', True);
@include "config.php";
$f = $config_path.'rpicopter.config';
$c = [];

function csv_to_array($filename='', $delimiter=',')
{
    if(!file_exists($filename) || !is_readable($filename))
        return FALSE;

    $data = array();
    if (($handle = fopen($filename, 'r')) !== FALSE)
    {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
        {
		if ($row[count($row)-1]=="") array_pop($row);
		array_push($data,$row);
        }
        fclose($handle);
    }
    return $data;
}

$c = csv_to_array($f,"\t");

$throttle = $c[0];

$pidr_y = $c[1];
$pidr_p = $c[2];
$pidr_r = $c[3];

$pids_y = $c[4];
$pids_p = $c[5];
$pids_r = $c[6];

$pid_alt = $c[7];
$pid_vz = $c[8];
$pid_accel = $c[9];

$acro_p = $c[10][0];

$baro_f = $c[10][1];

$motor_pin = $c[11];

$mpu_addr = $c[12][0];
$mpu_pos = $c[12][1];
$mpu_reset = $c[12][2];


?>

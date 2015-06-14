<?php
$config_path = '/etc/avrminicopter/';
$log_path = '/rpicopter/log/';
$cam_path = '/rpicopter/cam/';
$tmp_path = '/rpicopter/tmp/';

function readfile_chunked ($filename) {
    $chunksize = 1*(1024*1024); // how many bytes per chunk
    $buffer = '';
    $handle = fopen($filename, 'rb');
    if ($handle === false) {
        return false;
    }
    while (!feof($handle)) {
        $buffer = fread($handle, $chunksize);
        print $buffer;
    }
    return fclose($handle);
}

?>

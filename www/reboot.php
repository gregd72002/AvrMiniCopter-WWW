<?php
$cmd="/bin/sync";                                                                    
$out = exec($cmd,$ret);

$cmd="/sbin/reboot";                                                                    
$out = exec($cmd,$ret);
?>


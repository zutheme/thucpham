<?php 
$msg = json_decode(file_get_contents('php://input'), true);

file_put_contents('./logs_voi.txt', date("d/m/Y H:i:s",time()).": ".print_r($msg, TRUE)."\n", FILE_APPEND | LOCK_EX);

?>
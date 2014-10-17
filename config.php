<?php
$condb = new mysqli("localhost","root","","blog") or die ("not connect");

    if($condb->connect_error)
    {
    die('Connect Error:'.$condb->connect_error);
    } 

$condb->query("set character_set_server='utf8'");
$condb->query("set names 'utf8'");
?>

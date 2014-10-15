<?php
$condb = new mysqli("localhost","root","") or die ("not connect");
$seldb = $condb->select_db("blog",$condb) or die ("nooo icant con");

$condb-query("set character_set_server='utf8'");
$condb-query("set names 'utf8'");
?>

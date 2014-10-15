<?php
$condb = mysql_connect("localhost","root","") or die ("not connect");
$seldb = mysql_select_db("blog",$condb) or die ("nooo icant con");

mysql_query("set character_set_server='utf8'");
mysql_query("set names 'utf8'");
?>
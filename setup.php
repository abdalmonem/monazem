<?php
include("config.php");
	
$sql = 'CREATE Database test_db';
$retval = mysql_query( $sql, $condb );
if(! $retval )
{
  die('Could not create database: ' . mysql_error());
}
echo "Database test_db created successfully\n";
mysql_close($condb);

?>
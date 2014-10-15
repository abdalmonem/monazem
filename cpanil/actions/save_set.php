<?php
SESSION_START();
$sid = @$_SESSION['sid'];

include("../../config.php");
///print_r($_POST);
if(isset($_POST["author"])){
$author_info = $_POST['author'];
mysql_query("UPDATE blog_users SET about='$author_info' ");
echo"تم الحفظ";
}


if(isset($_POST["type"])){

$f = $_POST["type"];
$v = $_POST["val"];


if($f=="blog_name"){mysql_query("UPDATE setting SET blog_name='$v' "); echo"تم الحفظ";}else
if($f=="description"){mysql_query("UPDATE setting SET description='$v' "); echo"تم الحفظ";}else


//////////////////////// personal user settings ////////////////////////////////
if($f=="myname"){mysql_query("UPDATE blog_users SET name='$v' WHERE id=$sid "); echo"$sid تم الحفظ";}else


if($f=="blog_state" OR $f=="register_available" OR $f=="allow_to_msg" OR $f=="allow_comments" OR $f=="check_comments"){$q1 = mysql_query("SELECT $f from setting"); $q2 = mysql_fetch_array($q1); $q3 = $q2[$f];
if($q3=="0"){$OnOFF="1";}else{$OnOFF="0";} mysql_query("UPDATE setting SET $f='$OnOFF' ");echo"تم الحفظ"; }

}else if(isset($_POST["delet_user"])){
$gid = $_POST["delet_user"];
mysql_query("DELETE FROM blog_users WHERE id='$gid'");
mysql_query("UPDATE topics SET author='0' WHERE topic='$gid' ");
}

else if(isset($_POST["block_user"])){
$gid = $_POST["block_user"];
mysql_query("UPDATE blog_users SET state='3' WHERE id='$gid' ");
}

?>
<?php
SESSION_START();
include "../../config.php";
$d = time();
$sid = @$_SESSION['sid'];
$sem = @$_SESSION['semail'];


//// 0 = post on    line
//// 1 = post off   line
//// 2 = post need  confirm
//// 3 = post in    recicle
//// 4 = post have  proplem
//// 5 = post in    darf
$thumb = $_POST["thumb"];
$type  = $_POST["type"];

if(isset($_POST["topic"])){
if(isset($_POST["action"])){
if($_POST["action"]=="new"){$action="new";}else if($_POST["action"]=="edit"){$action="edit";}else{$action="new";}
}


if($_POST["action"]=="new"){
$gid = $_POST["gid"];

$po    = htmlspecialchars($_POST["topic"]);
$post  = htmlspecialchars($_POST["topic"]);
$catg  = $_POST["cat"];
$title = strip_tags($_POST["title"]);
$state = $_POST["state"];


if(isset($gid)){
$q1 = mysql_query("SELECT * FROM topics WHERE date='$gid' && author='$sid'");
echo mysql_num_rows($q1);
if(mysql_num_rows($q1)>0){
$up1 = mysql_query("update topics SET 
post='$post',
title='$title',
cat='$catg',
thumb='$thumb',
type='$type'
WHERE date='$gid'
");
}else{
mysql_query("INSERT INTO topics 
(post,title,cat,date,thumb,author,status,type)
VALUES
('$po','$title','$catg','$gid','$thumb','$sid','$state','$type')
");

}

}



}

if($_POST["action"]=="edit"){
$gid = $_POST["gid"];
$po = htmlspecialchars($_POST["topic"]);

$post  = htmlspecialchars($_POST["topic"]);
$catg  = $_POST["cat"];
$title = $_POST["title"];
if(!empty($catg) & !empty($tite) & !empty($post) & !empty($thumb)){$state = "0";}else{$state = "4";}
$q1 = mysql_query("update topics Set
post='$po',
title='$title',
cat='$catg',
thumb='$thumb',
type='$type'
WHERE id='$gid'
");

}










}

else if(isset($_POST["puse_post"])){
$gid = $_POST["puse_post"];

$q1 = mysql_query("SELECT status FROM topics WHERE id='$gid' ");
$q2 = mysql_fetch_array($q1);
$st = $q2["status"];
if($st==1 OR $st==2){$puse_or_play = 0;}else if($st==0){$puse_or_play = 1;}
mysql_query("UPDATE topics SET status='$puse_or_play' WHERE id='$gid' ");
}

else if(isset($_POST["delete_post"])){
$gid = $_POST["delete_post"];
mysql_query("UPDATE topics SET status='3' WHERE id='$gid' ");
}

else if(isset($_POST["delete_post_From_repin"])){
$gid = $_POST["delete_post_From_repin"];
mysql_query("DELETE FROM topics WHERE id='$gid' && status='3'");
mysql_query("DELETE FROM comments WHERE topic='$gid' ");
}

else if(isset($_POST["replyid"]) &&  isset($_POST["replycomment"])){
$gid = $_POST["replyid"];
$rep = $_POST["replycomment"];
mysql_query("update comments SET reply='$rep' WHERE id='$gid' ");
}

else if(isset($_POST["fav_post"]) &&  isset($_POST["fav_link"])){
$gid = $_POST["fav_post"];
$val = $_POST["fav_link"];
mysql_query("UPDATE topics SET premium='$val' WHERE id='$gid' ");
}
?>

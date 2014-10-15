<?php 
SESSION_START();
include("config.php");
$d = time();


if(isset($_GET["comment"])&isset($_GET["name"])&isset($_GET["email"])&isset($_GET["topic"])
 & !empty($_GET["name"]) & !empty($_GET["email"]) & !empty($_GET["comment"]) & !empty($_GET["topic"])){
 
$name    = $_GET["name"];
$email   = $_GET["email"];
$comment = $_GET["comment"];
$topic   = $_GET["topic"];

$q1 = mysql_query("SELECT check_comments from setting"); $q2 = mysql_fetch_array($q1); $q3 = $q2["check_comments"];

if($q3=="0"){
mysql_query("INSERT INTO comments (name,email,comment,topic,date,state) VALUES('$name','$email','$comment','$topic','$d','0')");
mysql_query("UPDATE topics SET comnum=comnum+1 WHERE id='$topic' ");
$gravatar_link = 'http://www.gravatar.com/avatar/' . md5($email) . '?s=150';
  
		echo"
		<style>
		.complete_com{ margin:80px auto;color:#000;font-size:16px;width:auto;height:56px;text-align:center; }
		</style>
		<div class='comments_cell' style='display:none;' id='$d'>
		<div class='comments_cell_thumb' style='background-image:url($gravatar_link);'></div>
		<div class='comments_cell_name'>$name  <div class='posts_box_post_cell_detils_since'>منذ ثوان</div> </div>
		<div class='comments_cell_comment'>$comment</div>
		</div>
		<script>
		$('#$d').fadeIn(1400);
		$('.add_comments_cell').html(' ');
		$('.add_comments_cell').animate({height:'0px'},100);
		$('.add_comments_cell').animate({height:'150px'},100);
		$('.add_comments_cell').html('<div class=complete_com>تم نشر التعليق ... سيتم الرد عليك في اقرب  فرصة ممكنة , كن علي اتصال ولا تنقطع !! </div>');
		</script>
		";
}else{
mysql_query("INSERT INTO comments (name,email,comment,topic,date,state) VALUES('$name','$email','$comment','$topic','$d','1')");
mysql_query("UPDATE topics SET comnum=comnum+1 WHERE id='$topic' ");
$gravatar_link = 'http://www.gravatar.com/avatar/' . md5($email) . '?s=150';
  
		echo"
		<style>
		.complete_com{ margin:80px auto;color:#000;font-size:20px;width:auto;height:56px;text-align:center; }
		</style>
		<script>
		$('#$d').fadeIn(1400);
		$('.add_comments_cell').html(' ');
		$('.add_comments_cell').animate({height:'0px'},100);
		$('.add_comments_cell').animate({height:'150px'},100);
		$('.add_comments_cell').html('<div class=complete_com>تم ارسال تعليقك للمراجعة , شكرا لك !!</div>');
		</script>
		";
}


}

?>
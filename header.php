<?php
SESSION_START();
include "config.php";
include("classes/blog_setting.php"); $allset = new allset(); $allset->bs();
$sid = @$_SESSION['sid'];
$sem = @$_SESSION['semail'];

echo '
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" href="style.css" type="text/css" />
<script type="text/javascript" src="jq.js"></script>
<link href="http://fonts.googleapis.com/earlyaccess/droidarabickufi.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div style="z-index:1020; position:fixed">

<div class="logheader black_link">

<a href="index.php">
<div class="hh1">
<img src="logo1.png" width="50px"; style="float:left;">
'.$allset->blog_name.'
</a>
<span style="width:200px;color:#999;margin-left:10px;position:absolute;font-size:12px;">
'.$allset->description.'
</span>
</div>

';

 if($allset->blog_state=="1"){
echo"
<head>
</head>
<div class='blog_errors'>
<div class='blog_errors_title'>مغلق مؤقتا</div>
<p>
نيابة عن كل طاقم العمل اعتذر لك , نحن متوقفين مؤقتا للقيام بعمليات صيانة .. سيرجع الموقع للعمل في فترة قصيرة </p>
</div>
";
die();
}

///طريقة رصف الرابط : echo $allset->blog_links("para1","ar","id","title");

include("classes/get_class.php");
$Get_class = new GetClass(); 


echo'<div class="catog white_link">';

if(isset($sid)){
echo'
<div class="acount_box">
<div class="acount_box_thumb"></div>
<div class="acount_box_info_box">عبدالمنعم حموده
</br>

<img src="img/notif.png" />
<img src="img/message.png" />
<img src="img/set.png" />

</div>
</div>
';
}

//// الاقسام الظاهرة
$Get_class->ca("*","id!='' ORDER By rank DESC LIMIT 0,3");
foreach($Get_class->CatsArray as $key=>$value){
$cat_id = $value["id"];
$cat_title = $value["title"];
echo'
<a href= "'.$allset->blog_cat_links("ar",$cat_id,$cat_title).'"><div class="catog_cell">'.$value["title"].'</div> </a>
';
}

/// الاقسام المخفية
echo'<div class="catog_cell" id="show_all_cats" style="width:25px;"><img src="img/down_tringle.png" style="width:22px;float:left;margin:14px 0px;"/></div>
<div class="hidden_nav" id="show_hidden_nav">
';

$Get_class->ca("*","id!='' ORDER By rank DESC LIMIT 3,40");
foreach($Get_class->CatsArray as $key=>$value){
$cat_id = $value["id"];
$cat_title = $value["title"];
echo'<a href= "Category/ar/'.$cat_id.'/'.$cat_title.'"><div class="hidden_nav_cell">'.$value["title"].'</div></a>';
}

echo"</div>";

echo'
<script>
$("#show_all_cats").click(function(){
$("#show_hidden_nav").animate({height:"toggle"},150);

});
</script>
';


echo'
</div>
</div>
</div>';


echo'
<div class="navbar">
<a href="index.php" ><div class="navbar_cell">الرئيسية </div></a>
<div class="navbar_cell">من نحن</div>
<div class="navbar_cell">راسلنا</div>
<div class="navbar_cell" id="navbadr_cell" >الشروط والتراخيص</div>

<div class="search_box">
<input type="text" id="search_box_inpt" class="search_box_text"/>
<button class="search_box_button" ><img src="img/search.png" style="width:20px;"/></button>

<div class="search_outo_comp_box">
<div id="search_key_show" style="color:#ccc;height:40px;margin:1%;line-height:40px;"></div>
<div id="search_result" ></div>

</div>

</div>

<script>
$("#search_box_inpt").keyup(function(){
serch_key_world = $(this).val();
	if(serch_key_world !=="" ){
	$(".search_outo_comp_box").fadeIn();
	$("#search_key_show").html(" يبحث عن :"+serch_key_world);
	$.get("search.php?serch_key_world="+serch_key_world,function(searchdata){
	$("#search_result").html(searchdata);
	});
}else{
	$(".search_outo_comp_box").fadeOut();
}

$(".search_outo_comp_box").mouseleave(function(){ $(".search_outo_comp_box").fadeOut(); });

});

</script>

</div>
';

if(isset($_GET["utm_source"])){echo"
<div class='white_link' id='mustaads' style='width:100%;height:80px;padding:5px;background:#C3C3C3;position:fixed;bottom:-300px;border-top:2px solid #EECDB9;direction:rtl;'>
<img src='musta.png' style='float:right;margin:-170px 100px'/>
<button id='nothanksclosemustaadd' style='float:left;width:90px;height:40px;background:#9B9B9B;border:0px;margin:20px;' >لا شكرا</button>
<a id='yesclickedmustaads'href='https://arabia.io/monazem' target='_blank'><button style='float:left;width:90px;height:40px;background:#508FCB;border:0px;margin:20px;color:#fff;' >حسناَ</button></a>
<div style='font-size:12px;color:#000;width:650px;margin:5px auto;'>
مرحبا ادعي مصطفي وانا المسؤل عن السيو علي مُنظِم , نعرض عليك هذه الرسالة بعتبارك قادماَ من مجتمع اريبيا اي او
</div>
<div style='width:650px;margin:5px auto;'>
مُنظِم هو مشروع ويب غير ربحي
 , لا يزال في مرحلة التطوير ..
تابع مجتمعنا علي 
اريبيا I/O
</div>
</div>
<script>
$('#nothanksclosemustaadd,#yesclickedmustaads').click(function(){
$('#mustaads').animate({bottom:'-300px'},922);
});

$(document).ready(function(){
setInterval(function(){
$('#mustaads').animate({bottom:'0px'},922);
},40000);
});
</script>
";}
?>





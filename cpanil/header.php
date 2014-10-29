<?php
ob_start();
SESSION_START();
$sid = @$_SESSION['sid'];
$sem = @$_SESSION['semail'];
include "../config.php";
include("../classes/get_class.php");
$Get_class = new GetClass(); 
header("Content-Type: text/html;charset=\"utf-8\"")
include("../classes/blog_setting.php");
$allset=new allset(); 
$allset->bs();
$allset->user_set();

echo '
<!DOCTYPE html>
<html>
<head>
<title>'.$allset->blog_name.'</title>
<script src="../classes/buttons.js" ></script>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="../style.css" type="text/css" />
<script type="text/javascript" src="../jq.js"></script>
</head>
<body>
<div style="z-index:1020; position:fixed">

<div class="logheader">

<div class="hh1">
<img src="../logo1.png" width="50px"; style="float:left;">
'.$allset->blog_name.'
</div>

<div class="catog">
<div class="acount_box">
<div class="acount_box_thumb"></div>
<div class="acount_box_info_box">عبدالمنعم حموده
</br>

<img id="notifbut" action="notif" src="../img/notif.png" />
<img id="mesbut" action="mess" src="../img/message.png" />
<img id="setbut" action="set" src="../img/set.png" />
</div>
</div>


<div class="black_light_box" id="nofi_ligt_box">
<div class="speedmenu" >
<div class="logading" style="margin:300px auto;"></div>
</div>
</div>

<script>
$("#notifbut,#mesbut,#setbut").click(function(){
var acti = $(this).attr("action");
$("#nofi_ligt_box").fadeIn(100);
$(".speedmenu").animate({right:"toggle"},100);

$.post("fast_menu_bar.php",{type:acti},function(data){ $(".speedmenu").html(data);});

});


$("#nofi_ligt_box").click(function(){

$(".speedmenu").animate({right:"toggle"},100);
$("#nofi_ligt_box").fadeOut(300);
$(".speedmenu").html("<div class=logading style=margin:300px auto;></div>");

}).children().click(function(e) {
  return false;
});
</script>



<a href="new.php"><div class="catog_cell">تدوينة جديدة</div></div></a>
<a href="posts.php"><div class="catog_cell">تدويناتي</div></a>
<div class="catog_cell">اعدادات حساب</div>
<a href="comments.php"><div class="catog_cell">التعليقات</div></a>
';

if($allset->usRank=="0"){
echo'
<div class="catog_cell" id="show_all_cats" style="width:25px;"><img src="../img/down_tringle.png" style="width:22px;float:left;margin:14px 0px;"/>
<div class="hidden_nav" id="show_hidden_nav">
<a href="cats.php"><div class="hidden_nav_cell">ادارة تصنيفات</div></a>
<div class="hidden_nav_cell">الرسائل</div>
<a href="set.php?author"><div class="hidden_nav_cell">معلوماتي</div></a>
<div class="hidden_nav_cell">مواضيع المميزة</div>
<a href="posts.php?type=recyclebin" ><div class="hidden_nav_cell">سلة المحذوفات</div></a>
<a href="posts.php?type=recyclebin" ><div class="hidden_nav_cell">الاعدادات العامة</div></a>
<a href="posts.php?type=recyclebin" ><div class="hidden_nav_cell">الاعدادات المتقدمة</div></a>
<a href="users.php?type=recyclebin" ><div class="hidden_nav_cell">ادارة الاعضاء</div></a>
<a href="posts.php?type=recyclebin" ><div class="hidden_nav_cell">التصريحات</div></a>
</div>
</div>
<script>
$("#show_all_cats").click(function(){
$("#show_hidden_nav").animate({height:"toggle"},150);

});
</script>
';
}

echo'
</div>


</div>
</div>
';

/// notifcation bar

echo'
<div class="black_light_box" id="adding_new_post">
<div class="notification_bar">
انتظر رجاء , يجري اضافة موضوعك الان ...
</div>
</div>

<div class="save_notic" >تم الحفظ بنجاح</div>
';

echo"<div class='hide' style='display:none;'></div>";


include("../classes/buttons.php");
?>

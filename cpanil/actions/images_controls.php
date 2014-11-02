<?php
SESSION_START();

include "../../config.php";
$d = time();
$rand_image_title = $d.rand("1","9999").".png";
$image_title_withou_extintion = $d.rand("1","9999");
$sid = @$_SESSION['sid'];
$sem = @$_SESSION['semail'];




$year  = date('Y', $d);
$month = date('m', $d);
$day   = date('d', $d);



if(isset($_POST["get_img_to_tobic"])){

if(!file_exists("../../images/$year")){
mkdir("../../images/$year");
}
if(!file_exists("../../images/$year/$month")){
mkdir("../../images/$year/$month");
}
if(!file_exists("../../images/$year/$month/$day")){
mkdir("../../images/$year/$month/$day");
}

if(isset($_POST["action"]) & $_POST["action"]=="tobicimg_fromurl"){
$Image_Link = $_POST["get_img_to_tobic"];
$full_copy_url = "images/".$year."/".$month."/".$day."/".$rand_image_title;
if (!copy($Image_Link,"../../".$full_copy_url)) {
$rand = rand("465","500").$d;
echo"
<div id='$rand' class='image_cell'>
<div id='loading_img' style='width:300px;height:80px;line-height:40px;margin:30px auto;'>
اخفقت عملية سحب الصورة الي السيرفر
, تاكد من رابط الصورة
(انقر هنا لاذالة هذه الرسالة)
</div></div>
<script>$('#$d').click(function(){ $(this).remove(); });</script>
";
}else{
echo"$full_copy_url
";
}
}
}



if(isset($_GET["action"]) && $_GET["action"]=="tobicimg"){
$formname_attr = $_GET["form_name_attr"];

if(!file_exists("../../images/$year")){
mkdir("../../images/$year");
}
if(!file_exists("../../images/$year/$month")){
mkdir("../../images/$year/$month");
}
if(!file_exists("../../images/$year/$month/$day")){
mkdir("../../images/$year/$month/$day");
}


$filename = "../../images/".$year."/".$month."/".$day."/".$image_title_withou_extintion.str_replace(" ", "_",$_FILES[$formname_attr]["name"]);
if(move_uploaded_file($_FILES[$formname_attr]["tmp_name"],$filename)){
echo "images/".$year."/".$month."/".$day."/".$image_title_withou_extintion.str_replace(" ", "_",$_FILES[$formname_attr]["name"]);
}
}


 if(isset($_POST["remove_img_from_topic"])){
 $formname_attr = $_GET["form_name_attr"];
$remove_img_link = $_POST["remove_img_from_topic"];
unlink("../".$remove_img_link);
}


if(isset($_GET["action"]) && $_GET["action"]=="changethumb"){
$formname_attr = $_GET["form_name_attr"];


if(!file_exists("../../thumbs/$year")){
mkdir("../../thumbs/$year");
}
if(!file_exists("../../thumbs/$year/$month")){
mkdir("../../thumbs/$year/$month");
}

@unlink("../../".$_GET["old_thumb"]);


$filename = "thumbs/".$year."/".$month."/".$image_title_withou_extintion.str_replace(" ", "_",$_FILES[$formname_attr]["name"]);
if(move_uploaded_file($_FILES[$formname_attr]["tmp_name"],"../../".$filename)){
echo $filename;
}
}


?>
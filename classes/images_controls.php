<?php
SESSION_START();
include "../config.php";
$d = time();
$sid = @$_SESSION['sid'];
$sem = @$_SESSION['semail'];




$year  = date('Y', $d);
$month = date('m', $d);
$day   = date('d', $d);

if(!file_exists("../images/$year")){
mkdir("../images/$year");
}
if(!file_exists("../images/$year/$month")){
mkdir("../images/$year/$month");
}
if(!file_exists("../images/$year/$month/$day")){
mkdir("../images/$year/$month/$day");
}




if(isset($_POST["get_img_to_tobic"])){
$Image_Link = $_POST["get_img_to_tobic"];
$rand_image_title = $d.rand("1","9999").".png";
$full_copy_url = "images/".$year."/".$month."/".$day."/".$rand_image_title;
if (!copy($Image_Link,"../".$full_copy_url)){ 
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
echo" $full_copy_url
";
}
}


?>
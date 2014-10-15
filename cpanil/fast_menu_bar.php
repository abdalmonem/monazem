<?php
include("../config.php");
if(isset($_POST["type"])){
if($_POST["type"]=="notif"){
echo'
<div class="speedmenu_title">الاشعارات</div>
<div class="speedmenu_body">
<div class="speedmenu_cel">هنالك تعليق جديد علي موضوعك : كيف تجعل واجهات الاستخدام , انقر هنا للرد عليه</div>
<div class="speedmenu_cel">هنالك تعليق جديد علي موضوعك : كيف تجعل واجهات الاستخدام , انقر هنا للرد عليه</div>
<div class="speedmenu_cel">هنالك تعليق جديد علي موضوعك : كيف تجعل واجهات الاستخدام , انقر هنا للرد عليه</div>
<div class="speedmenu_cel">هنالك تعليق جديد علي موضوعك : كيف تجعل واجهات الاستخدام , انقر هنا للرد عليه</div>
</div>
';
}




if($_POST["type"]=="set"){
echo'
<div class="speedmenu_title" style="border-bottom:3px solid #FCD208; color:#FCD208;" >الاعدادات</div>
<div class="speedmenu_body">

<div class="speedmenu_set_detils_cell">
<div class="speedmenu_set_detils_cell_thumb"></div>
<p style="font-size:18px;margin:0px auto;color:#f0f0f0;" >abmjndf mdkf m</p>
</div>

<div class="speedmenu_set_cel">
<div class="speedmenu_set_cel_title">الاسم</div>
<input type="text"  id="name" class="speedmenu_set_cel_input" />
<script>fast_save_setting_fast_menu("#name","actions/save_set.php","myname");</script>
</div>

<div class="speedmenu_set_cel">
<div class="speedmenu_set_cel_title">البريد الالكتروني</div>
<input type="text" class="speedmenu_set_cel_input" />
</div>

<div class="speedmenu_set_cel">
<div class="speedmenu_set_cel_title">نبذة عنك</div>
<textarea class="speedmenu_set_cel_input" style="height:120px;"></textarea>
</div>

<div class="speedmenu_set_cel">
<button  class="speedmenu_save_button">حفظ</button>
</div>


</div>

';
}




if($_POST["type"]=="mess"){
echo'
<div class="speedmenu_title" style="border-bottom:3px solid #4CB848; color:#4CB848;">الرسائل</div>
<div class="speedmenu_body">
<div class="speedmenu_cel">هنالك تعليق جديد علي موضوعك : كيف تجعل واجهات الاستخدام , انقر هنا للرد عليه</div>
<div class="speedmenu_cel">هنالك تعليق جديد علي موضوعك : كيف تجعل واجهات الاستخدام , انقر هنا للرد عليه</div>
<div class="speedmenu_cel">هنالك تعليق جديد علي موضوعك : كيف تجعل واجهات الاستخدام , انقر هنا للرد عليه</div>
<div class="speedmenu_cel">هنالك تعليق جديد علي موضوعك : كيف تجعل واجهات الاستخدام , انقر هنا للرد عليه</div>
</div>
';
}





}
?>

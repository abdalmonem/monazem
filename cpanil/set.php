<?php
include("header.php");
echo'
<head>
</head>';
if($allset->usRank!=="1"){
echo'
<div class="navbar">
<a href="?set=myid" ><div class="navbar_cell">اعدادات العامة</div></a>
<a href="?set=acount" ><div class="navbar_cell">اعدادات الحساب</div></a>
<a href="?set=myid" ><div class="navbar_cell">ادارة الاعضاء</div></a>
<a href="?set=permission" ><div class="navbar_cell">ادارة التصايح</div></a>
<a href="?set=author" ><div class="navbar_cell">ملفي التعريفي</div></a>
';
}

echo'
</div>
';

if(isset($_GET["set"])){
if($allset->usRank=="1" & $_GET["set"] !=="acount" ){ header("location:set.php?set=acount"); }


if($_GET["set"]=="hhh"){
echo"
<div class='big_notifbar'><img src='../img/telhemyourinfo.png' style='float:right;height:70px;margin:20px;' />
مرحبا !! </br>
قم بتعريف نفسك للقراء , فهم يشعرون بالثقا اذا وجدو صورتك او معلومات تتحدث عنك ... رجاء لا تخذلهم
<span style='color:#222;font-size:16px;'>ستظهر هذه السيرة علي الجانب الايسر من المقال</span>
</br><span style='color:#222;font-size:16px;'>نحن نستخدم خدمة <a href='http://www.gravatar.com'> gravatar</a> بالنسبة للصور الشخصية</span>
</div>

<textarea class='author_textarea' id='about_form' placeholder='اكتب موجز مختصر لا يزيد عن الـ 400 حرف'></textarea>
<button class='author_save' id='save_author_data'>حفظ</button>

<script>
$('#save_author_data').click(function(){
$('#save_author_data').html('انتظر !!');
about_form = $('#about_form').val();
$.post('actions/save_set.php',{author:about_form},function(data){
$('#save_author_data').html(data).delay('slow');
$('#save_author_data').html('حفظ');
});
});
</script>
";
}else if($_GET["set"]=="author"){


echo"
<div class='set_form_box' >

<p>
قم بكتابة نبذة عن نفسك هنا 
</br>
هذا التعريف سيظهر بالجانب الايسر لمقالاتك
</p>

<textarea class='set_form_input' id='about' style='height:130px;'></textarea>
<button class='author_save' id='save_author_data' >حفظ</button>

</div>

<div class='set_form_box' style='border:0';>
معاينة

<div style='width:320px;margin:10px auto;'>
<div class='auther_box'>
<div class='auther_box_thumb'></div>
<div class='auther_box_name'>اسمك<img src='../img/author.png' /> </div>
<div class='auther_box_about'>هنا مثال للنص الذي يظهر بالجانب الايمن للموضوعات الخاصة بك</div>
</div>
</div>

<script>
$('#name').keyup(function(){ name = $('#name').val(); $('.auther_box_name').html(name); });
$('#email').mouseout(function(){ email = $('#email').val(); $('.auther_box_name').html(name); });
$('#about').keypress(function(){ about = $('#about').val(); $('.auther_box_about').html(about); });
</script>

</div>
";
}
else if($_GET["set"]=="acount"){


echo"
<div class='set_form_box' >

<div class='line' >اعدادات الحساب<img src='../img/user.png' style='width:20px;margin:4px;'/> </div>

<div class='set_form_cell'>
<div class='set_form_input_title'>الاسم</div>
<input type='text' id='name' class='set_form_input' />
</div>

<div class='set_form_cell'>
<div class='set_form_input_title'>البريد الالكتروني</div>
<input type='text' id='name' class='set_form_input' />
</div>

<div class='set_form_cell' style='height:150px;'>
<div class='set_form_input_title'>نبذة عنك</div>
<textarea class='set_form_input' style='height:120px;'></textarea>
</div>

<div class='set_form_input_title' style='text-align:right;border-bottom:0px;height:50px;float:none;color:#EF6655;'>تغيير كلمة السر</div>

<div style='display:none;'>

<div class='set_form_cell'>
<div class='set_form_input_title'>تغيير كلمة السر</div>
<input type='password' id='name' class='set_form_input' />
</div>

<div class='set_form_cell'>
<div class='set_form_input_title'>اعد كلمة السر</div>
<input type='password' id='name' class='set_form_input' />
</div>

</div>




<button class='author_save' id='save_author_data' >حفظ الاعدادات</button>

</div>


</div>
";
}else if($_GET["set"]=="permission"){


echo"
<div class='set_form_box' >


<div class='line' >الاعدادات العامة<img src='../img/set.png' style='width:20px;margin:4px;'/> </div>

<div class='set_form_cell'>
<div class='set_form_input_title'>اسم المدونة</div>
<input type='text' id='name44' class='set_form_input' placeholder='اكتب اسم المدونة واضغط علي زر انتر' value='$allset->blog_name'/>
</div>
<script>fast_save_form('#name44','actions/save_set.php','blog_name');</script>



<div class='set_form_cell'>
<div class='set_form_input_title'>وصف المدونة</div>
<input type='text' id='description' class='set_form_input' placeholder='اكتب وصف قصير 21 حرف بحد اقصي' value='$allset->description'/>
</div>
<script>fast_save_form('#description','actions/save_set.php','description');</script>
";

echo On_Off_Function("حالة المدونة",$allset->blog_state,"blog_state");
echo On_Off_Function("السماح بالتسجيل",$allset->register_available,"register_available");

echo"<div class='line' >التسجيل والعضويات<img src='../img/user.png' style='width:20px;margin:4px;'/> </div>";
echo On_Off_Function("مراجعة العضويات قبل قبولها",$allset->register_available,"register_available");
echo On_Off_Function("مراجعة المواضيع قبل نشرها",$allset->register_available,"register_available");

echo"<div class='line' >التعليقات و المراسلة <img src='../img/comment.png' style='width:20px;margin:4px;'/> </div>";
echo On_Off_Function("استقبال رسائل",$allset->allow_to_msg,"allow_to_msg");
echo On_Off_Function("السماح بالتعليقات",$allset->allow_comments,"allow_comments");
echo On_Off_Function("الاشراف علي التعليقات",$allset->check_comments,"check_comments");


echo"

</br>

<div class='line' >اعدادات المطورين<img src='../img/set.png' style='width:20px;margin:4px;'/> </div>

<div class='set_form_cell'>
<div class='set_form_input_title'>تشغيل دليل الدخول</div>
<div class='on_of' id='trail'>
<div class='on_of_state' id='trail_sta'>ايقاف</div>
<div class='on_of_button' id='trail_but'>||||</div>
</div>
<script>on_of_button('#trail','#trail_but','#trail_sta','ايقاف','تشغيل');</script>
</div>

<div class='set_form_cell'>
<div class='set_form_input_title'>تسجيل محاولات الاختراق</div>
<div class='on_of' id='trail'>
<div class='on_of_state' id='trail_sta'>ايقاف</div>
<div class='on_of_button' id='trail_but'>||||</div>
</div>
<script>on_of_button('#trail','#trail_but','#trail_sta','ايقاف','تشغيل');</script>
</div>




</div>


";
}

}

?>
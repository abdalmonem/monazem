<?php
include("header.php");
echo'<div class="admin_body">';

echo'
<div class="navbar">
<a href="?users=all" ><div class="navbar_cell">جميع الاعضاء</div></a>
<a href="?users=draft" ><div class="navbar_cell">المساهمين</div></a>
<a href="?users=posted" ><div class="navbar_cell">المدراء</div></a>
<a href="?users=blocking" ><div class="navbar_cell">المحظورين</div></a>
<a href="?users=pending" ><div class="navbar_cell">طلبات معلقة</div></a>
</div>
';
//// نشر موضوع جديد


echo"
<div class='table_frame' style='width:98%;min-height:200px;margin:80px 1%;line-height:50px;' >
<div class='table_row' >
<div class='table_row_cell' style='width:80px;border:0;'>رقم العضو</div>
<div class='table_row_cell' style='width:250px;'>الاسم</div>
<div class='table_row_cell' style='width:250px;'>البريد</div>
<div class='table_row_cell' style='width:120px;'>تاريخ التسجيل</div>
<div class='table_row_cell' style='width:120px;'>عدد المواضيع</div>
<div class='table_row_cell' style='width:80px;'>اخر ظهور</div>
<div class='table_row_cell' style='width:80px;'>الرتبة</div>
<div class='table_row_cell' style='width:250px;'>اجراء</div>
</div>";

if(isset($_GET["users"])){
$order = $_GET["users"];
if($order=="all"){$Get_class->us("*","id!='0' order by id ASC limit 10");}
else if($order=="blocking"){$Get_class->us("*","id!='0' order by id ASC limit 10");}

foreach($Get_class->UsersArray as $key=>$gtusers2){
$id        = $gtusers2["id"];
$name      = $gtusers2["name"];
$email     = $gtusers2["email"];
$date      = $gtusers2["date"];
$rank      = $gtusers2["rank"];
$last_look = $gtusers2["last_look"];
$topic_num = $gtusers2["topic_num"];


echo"
<div class='table_row' id='row-$id'>
<div class='table_row_cell' style='width:80px;border:0;'>$id</div>
<div class='table_row_cell' style='width:250px;'>$name</div>
<div class='table_row_cell' style='width:250px;'>$email</div>
<div class='table_row_cell' style='width:120px;'>$date</div>
<div class='table_row_cell' style='width:120px;'>عدد المواضيع</div>
<div class='table_row_cell' style='width:80px;'>$last_look</div>
<div class='table_row_cell' style='width:80px;'>$rank</div>
<div class='table_row_cell' style='width:250px;'>
<div style='float:left;width:60px;height:100%;' id='st-ifd'> <img src='../img/eadit.png' style='margin:13px 0px;width:20px;float:right;'/></div>
<div style='float:left;width:60px;height:100%;' id='bl-$id'> <img src='../img/block.png' style='margin:13px 0px;width:20px;float:right;'/></div>
<div style='float:left;width:60px;height:100%;' id='de-$id'> <img src='../img/delete.png' style='margin:13px 0px;width:20px;float:right;'/></div>
<div style='float:left;width:60px;height:100%;' id='de'> <img src='../img/king.png' style='margin:13px 0px;width:20px;float:right;'/></div>
</div>
</div>";
echo confirm_table_Function("bl-$id","block",$id,"هل ترغب بحظر $name ؟","حظر","لا",
"فليكن بمعلومك : ان حظر $name يجعله لا يستطيع الوصول للوحة التحكم نهائيا مع الحفاظ علي مشاركاته و ملفه الشخصي وكامل تحركاته"
,"actions/save_set.php","block_user","$id");


echo confirm_table_Function("de-$id","delet",$id,"هل ترغب باذالة $name نهائيا ؟","اذالة نهائيا",
"تراجع","ملاحظة : هذا الاجراء لا يمكن التراجع عنه","actions/save_set.php","delet_user","$id");


echo"
<script>
$('#st-$id').click(function(){
$.post('actions/save_post.php',{puse_post:'$id'},function(data){ $('#row-$id').slideUp(); });
});

		
</script>
";

}

}
echo"
</div>
";




?>

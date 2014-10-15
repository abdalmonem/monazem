<?php
include("header.php");
echo'<div class="admin_body">
<script type="text/javascript" src="jqui.js"></script>
';


$d = time();
//// add new cat
echo"<div class='add_cat_cell'>
<p>اضف تصنيف جديد</p>

<div class='add_cat_box'>
<form action=''method='post'>
<input type='text' class='add_cat_box_input' name='new_cat'/>
<input type='submit' class='add_cat_box_submit' id='add_cat_box_submit' value='اضافة' id='submit_cat'/>
</form>
</div>
</div>
";


echo"
<div class='table_frame' style='width:98%;min-height:200px;margin:10px 1%;line-height:50px;' >
<div class='table_row' id='table_head'>
<div class='table_row_cell' style='width:80px;border:0;'>رقم التصنيف</div>
<div class='table_row_cell' style='width:300px;'>عنوان التصنيف</div>
<div class='table_row_cell' style='width:250px;'>عدد المواضيع</div>
<div class='table_row_cell' style='width:180px;'>اخر موضوع اضيف</div>
<div class='table_row_cell' style='width:80px;'>اجراء</div>
</div>
<span id='table_frame' >
";



if(isset($_POST["new_cat"])){
$get_cat_num = mysql_query("SELECT * FROM cats order by id Desc");
$new_cat = $_POST["new_cat"];
$new_rank = mysql_num_rows($get_cat_num)+1;
mysql_query("
INSERT INTO cats 
(title,postsnumber,last_update,rank)
value
('$new_cat','0','$d','$new_rank')
");
}

$get_cat = mysql_query("SELECT * FROM cats order by id Desc");
while( $get_cat2 = mysql_fetch_array($get_cat)){
$cat_id    = $get_cat2["id"];
$cat_title = $get_cat2["title"];
$cat_num    = $get_cat2["postsnumber"];
$cat_rank  = $get_cat2["rank"];
$cat_laup  = $get_cat2["last_update"];

echo"
<div class='table_row' id='$cat_id-table_row' >
<div class='table_row_cell' style='width:80px;border:0;'>$cat_id</div>
<div class='table_row_cell' style='width:300px;' id='edit_cat_name_$cat_id' >$cat_title</div>
<div class='table_row_cell' style='width:250px;'> $cat_num </div>
<div class='table_row_cell' style='width:180px;'>$cat_laup</div>
<div class='table_row_cell' style='width:80px;'> <span id='remove_$cat_id'> ازالة </span>- تعديل </div>
</div>

<script>
$('#remove_$cat_id').click(function(){

});
</script>
";


////ترتيب العناصر
echo"
<script>
$('#$cat_id-table_row').click(function(){
$(function(){
$( '#table_frame' ).sortable({revert: true });
$( '#table_frame' ).sortable('enable');

$(this).draggable({
connectToSortable: '#table_frame',
helper: 'original',
revert: 'invalid'
});
$( '#table_frame' ).disableSelection();
});	

});


$('#edit_cat_name_$cat_id').click(function(){
$(this).html('<input type=text />');
});
</script>
";
}

echo"
</span>
</div>
";

?>

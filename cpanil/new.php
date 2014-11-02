<?php
include("header.php");
echo'
<head><link rel="stylesheet" href="style_editor.css" />
<script type="text/javascript" src="jqui.js"></script>
</head>';
$d=time();
if(isset($_GET["action"])){
if($_GET["action"]=="new"){$action="new";
$title_area = "";
$topic_area = "";
$thumb_area = "";
$thumb_val = "اضافة صورة مصغرة";
$catug_area = 1;
$if_edit_id_of_topic = $d;
$state = "5";
}else

if($_GET["action"]=="edit" && isset($_GET["tid"])){
$tid = $_GET["tid"];
$if_edit_id_of_topic = $_GET["tid"];
$state = "0";
$action="edit";
$Get_class->qufu("*","topics","id='$tid' ORDER BY id limit 1");
foreach($Get_class->PostsArray as $key=>$editpost){
$title_area = $editpost["title"];
$topic_area = $editpost["post"];
$thumb_val = $editpost["thumb"];
if(!empty($thumb_val)){$thumb_area = "تغيير الصورة المصغرة";}else{$thumb_area = "اضافة صورة مصغرة";}
$catug_area = $editpost["cat"];
}

}


else {$action="new";
$title_area = "";
$topic_area = "";
$thumb_area = "اضافة صورة مصغرة";
$thumb_val = "";
$catug_area = 1;
$if_edit_id_of_topic=$d;
$state = "5";
}

}else{$action="new";
$title_area = "";
$topic_area = "";
$thumb_area = "اضافة صورة مصغرة";
$thumb_val = "";
$catug_area = 1;
$if_edit_id_of_topic=$d;
$state = "5";
}
include("box.html");

?>
//// نشر موضوع جديد
<script>
state = 1;
$("#save_post").click(function(){
var work_or_not = $(this).attr('value');
if(work_or_not==1){
$(this).attr('value','0');
$(this).html('حفظ تلقائي - موَقف');
$(this).css('background','#ccc');
state = 0;
}else{
$(this).attr('value','1');
$(this).html('حفظ تلقائي - يعمل');
$(this).css('background','#629BD3');
state = 1;
}
});

setInterval(function(){

var can_i_save_post  = $('#text_area').html().length;
var can_i_save_title = $('#post_title').val().length;

if(state==1){
if(can_i_save_post >'10' || can_i_save_title !='0'){
StatusBar('جاري الحفظ ...');
var thepost_before_process = $('#text_area').html();
var thetitl = $('#post_title').val();
var thethum = $('#post_thumb_val_saver').val();
var thecatg = $('#text_area_details_cat').val();

save_post(thepost_before_process,thetitl,thecatg,thethum,"<?php echo $action; ?>","<?php echo $if_edit_id_of_topic; ?>","<?php echo $state; ?>");
StatusBar('تم الحفظ');
}
}
},300000);



$("#post_now").click(function(){
$(this).css("background","#ccc");
$(this).html("جاري النشر ...");


var thepost_before_process = $('#text_area').html();


var thepost = $('.editor').html();
var thetitl = $('#post_title').val();
var thethum = $('#post_thumb_val_saver').val();
var thecatg = $('#text_area_details_cat').val();


if((jQuery.trim(thepost_before_process)).length==0){
$('.editor').css('border','1px solid #E94B40');
}else{
$('.editor').css('border','0px solid #ccc');
}


if(thecatg=="0"){
$('#text_area_details_cat').css('border','1px solid #E94B40');
}else{
$('#text_area_details_cat').css('border','1px solid #ccc');
}

if(thethum==""){
$('#post_thumb').css('border','1px solid #E94B40');
}else{
$('#post_thumb').css('border','1px solid #ccc');
}

if(thetitl==''){
$('#post_title').css('border','1px solid #E94B40');
}else{
$('#post_title').css('border','1px solid #ccc');
}

if(thetitl!=='' & thepost_before_process!=='' & thecatg!=="0"){
save_post(thepost_before_process,thetitl,thecatg,thethum,"<?php echo $action; ?>","<?php echo $if_edit_id_of_topic; ?>","0");
$('#text_area_details_cat').css('border','1px solid #ccc');
$('#text_area_details_title').css('border','1px solid #ccc');
}
$('.text_area').html(data);


});


function save_post(Gtopic,Gtitle,Gcat,Gtumb,Gaction,Gifedit,Gsavestate){
$.post('actions/save_post.php',{topic:Gtopic,title:Gtitle,cat:Gcat,thumb:Gtumb,action:Gaction,gid:Gifedit,state:Gsavestate,type:get_my_choise},function(data){
$('.text_area').html(data);
});
}


</script>



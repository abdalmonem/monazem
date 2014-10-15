<?php
include("header.php");
echo'<div class="admin_body">';

echo'
<div class="navbar">
<a href="?page=all" ><div class="navbar_cell">جميع التعليقات</div></a>
<a href="?page=draft" ><div class="navbar_cell">الغير منشورة</div></a>
<a href="?page=posted" ><div class="navbar_cell">التي تم الرد عليها</div></a>
</div>
';
//// نشر موضوع جديد


echo"
<div class='table_frame' style='width:98%;min-height:200px;margin:80px 1%;line-height:50px;' >
<div class='table_row' >
<div class='table_row_cell' style='width:280px;'>الموضوع</div>
<div class='table_row_cell' style='width:300px;'>المعلق</div>
<div class='table_row_cell' style='width:110px;'>تاريخ النشر</div>
<div class='table_row_cell' style='width:300px;'>التعليق</div>
<div class='table_row_cell' style='width:180px;'>اجراء</div>
</div>";


$Get_class->co("*","id!='0' order by id Desc limit 10");
foreach($Get_class->CommentsArray as $key=>$gtcom2){
$id = $gtcom2["id"];
$topic_id = $gtcom2["topic"];
$name = $gtcom2["name"];
$email = $gtcom2["email"];
$post_date = $gtcom2["date"];
$comm = $gtcom2["comment"];


$Get_class->po("id,title","id='$topic_id' ORDER By id desc LIMIT 1");
foreach($Get_class->PostsArray as $key=>$related_posts){
$topicId    = $related_posts["id"];
$topicTitle = $related_posts["title"];
}
//if($gtFirest2["status"]==0){$sta="puse";}else if($gtFirest2["status"]==1){$sta="play";}

echo"
<div class='table_row' id='row-$id'>
<div class='table_row_cell' style='width:280px;'><a href='../topic.php?article=$id' >$topicTitle</a></div>
<div class='table_row_cell' style='width:300px;'>$name</div>
<div class='table_row_cell' style='width:110px;'>$post_date</div>
<div class='table_row_cell' style='width:300px;' id='show_morecom-$id' >  ".substr($comm,0,20)." ... </div>
<div class='table_row_cell' style='width:180px;'>
<div style='float:left;width:60px;height:100%;' id='rebut-element-$id'> <img src='../img/message.png' style='margin:13px 0px;width:24px;float:right;'/></div>
<div style='float:left;width:60px;height:100%;' id='de-$id'> <img src='../img/delete.png' style='margin:13px 0px;width:20px;float:right;'/></div>
</div>
</div>

			<div class='table_row' id='full-comm-$id' style='display:none;height:auto;background-color:#FCFADB;text-align:center;font-size:18px;'>
			<p>$comm</p>
			</div>
			
			<div class='table_row' id='delet-element-$id' style='height:auto;display:none;background-color:#F9DBE2;text-align:center;font-size:18px;'>
			هل ترغب باذالة هذا التعليق نهائيا ؟
			<button class='table_confirm' id='table-del-confirm-$id'>اذالة فورا</button>
			<button class='table_back'    id='table-back-confirm-$id'>لا تراجع</button>
			</br>
			<span style='font-size:12px;'>لا يمكن التراجع عن هذا الاجاء</span>
			</div>


<script>
$('#st-$id').toggle(function(){
$.post('actions/save_post.php',{puse_post:'$id'},function(data){ $('#imgst-$id').attr('src','../img/play.png'); });
},

function(){
$.post('actions/save_post.php',{puse_post:'$id'},function(data){ $('#imgst-$id').attr('src','../img/puse.png');});
});

		$('#de-$id').toggle(function(){
		$('#delet-element-$id').animate({height:'auto'},422);
		},

		function(){
		$('#delet-element-$id').animate({height:'hide'},422);
		});
		
		$('#table-back-confirm-$id').click(function(){
		$('#delet-element-$id').animate({height:'hide'},422);
		});		
		$('#table-del-confirm-$id').click(function(){
		$.post('actions/save_post.php',{delete_post:'$id'},function(data){});
		$('#delet-element-$id').fadeOut(333);
		$('#row-$id').fadeOut(333);
		});
		
</script>



			<div class='table_row' id='re-element-$id' style='height:auto;display:none;background-color:#fcfcfc;text-align:center;font-size:18px;'>
			<p >اضافة رد</p>
<textarea class='replay_comment' id='post_area_$id'>

</textarea>
<button class='replay_comment_button' id='post_re_$id'>نشر</button>
<script>
$('#post_re_$id').click(function(){
var reteae = $('#post_area_$id').val();

$.post('actions/save_post.php',{replyid:'$id',replycomment:reteae},function(data){

});

});

		$('#rebut-element-$id').toggle(function(){
		$('#re-element-$id').animate({height:'auto'},422);
		},

		function(){
		$('#re-element-$id').animate({height:'hide'},422);
		});

		
		$('#show_morecom-$id').toggle(function(){
		$('#full-comm-$id').animate({height:'auto'},422);
		},

		function(){
		$('#full-comm-$id').animate({height:'hide'},422);
		});
</script>

			</br>
			</br>
			</div>
			
			
";
}

echo"
</div>
";




?>

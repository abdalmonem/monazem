<?php
include("header.php");
echo'<div class="admin_body">';

echo'<div class="navbar">';
if($allset->usRank=="0"){
echo'
<a href="?page=binre" ><div class="navbar_cell">سلة المحذوفات</div></a>
<a href="?page=pages" ><div class="navbar_cell">الصفحات الثابته</div></a>
<a href="?page=draft" ><div class="navbar_cell">الغير منشورة</div></a>
';
}

echo'<a href="?page=all" ><div class="navbar_cell">جميع المواضيع</div></a>
<a href="?page=posted" ><div class="navbar_cell">المنشورة فقط</div></a>
<a href="?page=pending" ><div class="navbar_cell">في مرحلة الموافقة</div></a>
';

echo"</div>";
//// نشر موضوع جديد


echo"
<div class='table_frame' style='width:98%;min-height:200px;margin:80px 1%;line-height:50px;' >
<div class='table_row' >
<div class='table_row_cell' style='width:380px;'>عنوان المقال</div>";

if($allset->usRank=="0"){echo"<div class='table_row_cell' style='width:250px;'>الكاتب </div>";}
echo"
<div class='table_row_cell' style='width:110px;'>تاريخ النشر</div>
<div class='table_row_cell' style='width:180px;'>القسم</div>
<div class='table_row_cell' style='width:80px;'>اجراء</div>
</div>";


if(isset($_GET["page"])){
if($_GET["page"]=="recyclebin"){
$Get_class->po("*","status='3' order by id ASC limit 10");
foreach($Get_class->PostsArray as $key=>$gtFirest2){
$id = $gtFirest2["id"];
$title = $gtFirest2["title"];
$post_date = $gtFirest2["date"];
$cat = $gtFirest2["cat"];


echo"
<div class='table_row' id='row-$id'>
<div class='table_row_cell' style='width:380px;'><a href='../topic.php?article=$id' >$title</a></div>
<div class='table_row_cell' style='width:250px;'>الكاتب </div>
<div class='table_row_cell' style='width:110px;'>$post_date</div>
<div class='table_row_cell' style='width:180px;'>$cat</div>
<div class='table_row_cell' style='width:300px;'>
<div style='float:left;width:60px;height:100%;' id='st-$id'> <img src='../img/repost.png' style='margin:13px 0px;width:20px;float:right;'/></div>
<div style='float:left;width:60px;height:100%;' id='de-$id'> <img src='../img/delete.png' style='margin:13px 0px;width:20px;float:right;'/></div>
</div>
</div>


			<div class='table_row' id='delet-element-$id' style='display:none;background-color:#F9DBE2;text-align:center;font-size:18px;'>
			هل ترغب باذالة المقال اذالة نهائية ؟
			<button class='table_confirm' id='table-del-confirm-$id'>اذالة نهائية</button>
			<button class='table_back'    id='table-back-confirm-$id'>لا تراجع</button>
			</br>
			<span style='font-size:12px;'>ملاحظة : هذا الاجراء لا يمكن التراجع عنه</span>
			</div>


<script>

$('#st-$id').click(function(){
$.post('actions/save_post.php',{puse_post:'$id'},function(data){ $('#row-$id').slideUp(); });
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
		$.post('actions/save_post.php',{delete_post_From_repin:'$id'},function(data){});
		$('#delet-element-$id').fadeOut(333);
		$('#row-$id').fadeOut(333);
		});
		
</script>
";
} 
}



else if($_GET["page"]=="all"){
$Get_class->po("*","id!='' order by id Desc limit 10","show_pages");
foreach($Get_class->PostsArray as $key=>$gtFirest2){
$id = $gtFirest2["id"];
$title = $gtFirest2["title"];
$post_date = $gtFirest2["date"];
$cat = $gtFirest2["cat"];
$link = "../".$allset->blog_links("article","ar",$id,$title);

if($gtFirest2["status"]==0){$sta="puse";}else if($gtFirest2["status"]==1){$sta="play";}



echo"
<div class='table_row' id='row-$id'>

<div class='table_row_cell' style='width:380px;'><a href='$link' >$title</a></div>
<div class='table_row_cell' style='width:250px;'>الكاتب </div>
<div class='table_row_cell' style='width:110px;'>$post_date</div>
<div class='table_row_cell' style='width:180px;'>$cat</div>
<div class='table_row_cell' style='width:300px;'>
<div style='float:left;width:60px;height:100%;' id='fav_but_$id'> <img id='imgfv-$id' src='../img/star.png' style='margin:13px 0px;width:20px;float:right;'/></div>
<div style='float:left;width:60px;height:100%;' id='de-$id'> <img src='../img/delete.png' style='margin:13px 0px;width:20px;float:right;'/></div>
<a href='new.php?action=edit&tid=$id' ><div style='float:left;width:60px;height:100%;' > <img src='../img/eadit.png' style='margin:13px 0px;width:20px;float:right;'/></div></a>
<div style='float:left;width:60px;height:100%;' id='st-$id'> <img id='imgst-$id' src='../img/$sta.png' style='margin:13px 0px;width:20px;float:right;'/></div>
</div>
</div>

<div class='table_row' id='fav_cel_$id' style='display:none;'>
<div class='table_one_input'>
<input type='text' id='inp_fav_$id' placeholder='لتعين الموضوع كمميز , قم بلصق رابط الصورة هنا واضغط زر الحفظ' class='table_one_input_input'/>
<button class='table_one_input_submit' id='siv_fav_$id'>حفظ</button>
</div>
</div>

<script>
$('#fav_but_$id').toggle(function(){ $('#fav_cel_$id').animate({height:'auto'},422); },
function(){ $('#fav_cel_$id').animate({height:'hide'},422); });

$('#siv_fav_$id').click(function(){
	fav_val = $('#inp_fav_$id').val();
		if(fav_val !==''){ $('#imgfv-$id').attr('src','../img/remove_fav.png');
			$('#fav_cel_$id').animate({height:'hide'},422);
			$.post('actions/save_post.php',{fav_post:'$id',fav_link:fav_val},function(data){});
			}else{
			$.post('actions/save_post.php',{fav_post:'$id',fav_link:fav_val},function(data){});
			$('#imgfv-$id').attr('src','../img/star.png');
			$('#fav_cel_$id').animate({height:'hide'},422);
			}
});

</script>

			<div class='table_row' id='delet-element-$id' style='display:none;background-color:#F9DBE2;text-align:center;font-size:18px;'>
			هل ترغب حقا باذالة : $title
			<button class='table_confirm' id='table-del-confirm-$id'>اذالة فورا</button>
			<button class='table_back'    id='table-back-confirm-$id'>لا تراجع</button>
			</br>
			<span style='font-size:12px;'>نصيحة : بامكانك تعديل الموضوع من علامة القلم بقائمة الاجرات</span>
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
";
} 
}


else if($_GET["page"]=="posted"){
$Get_class->po("*","status='1' OR status='0' order by id Desc limit 10");
foreach($Get_class->PostsArray as $key=>$gtFirest2){
$id = $gtFirest2["id"];
$title = $gtFirest2["title"];
$post_date = $gtFirest2["date"];
$cat = $gtFirest2["cat"];
$link = "../".$allset->blog_links("article","ar",$id,$title);

if($gtFirest2["status"]==0){$sta="puse";}else if($gtFirest2["status"]==1){$sta="play";}


if($gtFirest2["status"]==0){$sta="puse";}else if($gtFirest2["status"]==1){$sta="play";}

echo"
<div class='table_row' id='row-$id'>
<div class='table_row_cell' style='width:380px;'><a href='$link' >$title</a></div>";
if($allset->usRank=="0"){echo"<div class='table_row_cell' style='width:250px;'>الكاتب</div>";}
echo"
<div class='table_row_cell' style='width:110px;'>$post_date</div>
<div class='table_row_cell' style='width:180px;'>$cat</div>
<div class='table_row_cell' style='width:300px;'>
<div style='float:left;width:60px;height:100%;' id='fav_but_$id'> <img id='imgfv-$id' src='../img/star.png' style='margin:13px 0px;width:20px;float:right;'/></div>
<div style='float:left;width:60px;height:100%;' id='de-$id'> <img src='../img/delete.png' style='margin:13px 0px;width:20px;float:right;'/></div>
<a href='new.php?action=edit&tid=$id' ><div style='float:left;width:60px;height:100%;' > <img src='../img/eadit.png' style='margin:13px 0px;width:20px;float:right;'/></div></a>
<div style='float:left;width:60px;height:100%;' id='st-$id'> <img id='imgst-$id' src='../img/$sta.png' style='margin:13px 0px;width:20px;float:right;'/></div>
</div>
</div>

<div class='table_row' id='fav_cel_$id' style='display:none;'>
<div class='table_one_input'>
<input type='text' id='inp_fav_$id' placeholder='لتعين الموضوع كمميز , قم بلصق رابط الصورة هنا واضغط زر الحفظ' class='table_one_input_input'/>
<button class='table_one_input_submit' id='siv_fav_$id'>حفظ</button>
</div>
</div>

<script>
$('#fav_but_$id').toggle(function(){ $('#fav_cel_$id').animate({height:'auto'},422); },
function(){ $('#fav_cel_$id').animate({height:'hide'},422); });

$('#siv_fav_$id').click(function(){
	fav_val = $('#inp_fav_$id').val();
		if(fav_val !==''){ $('#imgfv-$id').attr('src','../img/remove_fav.png');
			$('#fav_cel_$id').animate({height:'hide'},422);
			$.post('actions/save_post.php',{fav_post:'$id',fav_link:fav_val},function(data){});
			}else{
			$.post('actions/save_post.php',{fav_post:'$id',fav_link:fav_val},function(data){});
			$('#imgfv-$id').attr('src','../img/star.png');
			$('#fav_cel_$id').animate({height:'hide'},422);
			}
});

</script>

			<div class='table_row' id='delet-element-$id' style='display:none;background-color:#F9DBE2;text-align:center;font-size:18px;'>
			هل ترغب حقا باذالة : $title
			<button class='table_confirm' id='table-del-confirm-$id'>اذالة فورا</button>
			<button class='table_back'    id='table-back-confirm-$id'>لا تراجع</button>
			</br>
			<span style='font-size:12px;'>نصيحة : بامكانك تعديل الموضوع من علامة القلم بقائمة الاجرات</span>
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
";
} 
}
}else{
$Get_class->po("*","status='1' OR status='0' order by id Desc limit 10");
foreach($Get_class->PostsArray as $key=>$gtFirest2){
$id = $gtFirest2["id"];
$title = $gtFirest2["title"];
$post_date = $gtFirest2["date"];
$cat = $gtFirest2["cat"];

if($gtFirest2["status"]==0){$sta="puse";}else if($gtFirest2["status"]==1){$sta="play";}

echo"
<div class='table_row' id='row-$id'>

<div class='table_row_cell' style='width:380px;'><a href='../topic.php?article=$id' >$title</a></div>
<div class='table_row_cell' style='width:250px;'>الكاتب </div>
<div class='table_row_cell' style='width:110px;'>$post_date</div>
<div class='table_row_cell' style='width:180px;'>$cat</div>
<div class='table_row_cell' style='width:300px;'>
<div style='float:left;width:60px;height:100%;' id='fav_but_$id'> <img id='imgfv-$id' src='../img/star.png' style='margin:13px 0px;width:20px;float:right;'/></div>
<div style='float:left;width:60px;height:100%;' id='de-$id'> <img src='../img/delete.png' style='margin:13px 0px;width:20px;float:right;'/></div>
<a href='new.php?action=edit&tid=$id' ><div style='float:left;width:60px;height:100%;' > <img src='../img/eadit.png' style='margin:13px 0px;width:20px;float:right;'/></div></a>
<div style='float:left;width:60px;height:100%;' id='st-$id'> <img id='imgst-$id' src='../img/$sta.png' style='margin:13px 0px;width:20px;float:right;'/></div>
</div>
</div>

<div class='table_row' id='fav_cel_$id' style='display:none;'>
<div class='table_one_input'>
<input type='text' id='inp_fav_$id' placeholder='لتعين الموضوع كمميز , قم بلصق رابط الصورة هنا واضغط زر الحفظ' class='table_one_input_input'/>
<button class='table_one_input_submit' id='siv_fav_$id'>حفظ</button>
</div>
</div>

<script>
$('#fav_but_$id').toggle(function(){ $('#fav_cel_$id').animate({height:'auto'},422); },
function(){ $('#fav_cel_$id').animate({height:'hide'},422); });

$('#siv_fav_$id').click(function(){
	fav_val = $('#inp_fav_$id').val();
		if(fav_val !==''){ $('#imgfv-$id').attr('src','../img/remove_fav.png');
			$('#fav_cel_$id').animate({height:'hide'},422);
			$.post('actions/save_post.php',{fav_post:'$id',fav_link:fav_val},function(data){});
			}else{
			$.post('actions/save_post.php',{fav_post:'$id',fav_link:fav_val},function(data){});
			$('#imgfv-$id').attr('src','../img/star.png');
			$('#fav_cel_$id').animate({height:'hide'},422);
			}
});

</script>

			<div class='table_row' id='delet-element-$id' style='display:none;background-color:#F9DBE2;text-align:center;font-size:18px;'>
			هل ترغب حقا باذالة : $title
			<button class='table_confirm' id='table-del-confirm-$id'>اذالة فورا</button>
			<button class='table_back'    id='table-back-confirm-$id'>لا تراجع</button>
			</br>
			<span style='font-size:12px;'>نصيحة : بامكانك تعديل الموضوع من علامة القلم بقائمة الاجرات</span>
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
";
}
}
echo"
</div>
";




?>

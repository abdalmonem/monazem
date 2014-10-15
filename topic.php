<?php


$gid= intval($_GET['id']);
$gtitle= $_GET['title'];
$glang= $_GET['lang'];

if(!isset($gid) || !isset($gtitle) || !isset($glang)){die();}
echo "<base href='../../../'>
<head>
</head>
";
//echo"</br></br></br></br></br></br></br></br></br>".$_GET['id'];


include("header.php");
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


 echo"<div class='blog_body'>";



///add viw+
mysql_query("UPDATE topics SET viw=viw+1 WHERE id=$gid ");

$qu1=mysql_query("SELECT title,cat,post,comnum,date,thumb,author,type FROM topics WHERE id=$gid ");
$qu2=mysql_fetch_array($qu1);
$ti = strip_tags($qu2['title']);
$comnum = $qu2['comnum'];
$remove_editable_tag='contenteditable="true"';
$remove_sortable_tag='class="ui-sortable-handle"';
$remove_mousestyle_tag='cursor: move';
$po = str_replace($remove_editable_tag," ",htmlspecialchars_decode($qu2['post']));
$po = str_replace($remove_sortable_tag," ",$po);
$po = str_replace($remove_mousestyle_tag," ",$po);
$da = $qu2['date'];
$au = $qu2['author'];
$tu = $qu2['thumb'];
$ty = $qu2['type'];
if(empty($qu2['type']) OR $qu2['type']=0){
$blog_box_design="blog_box";
$blog_posts_aria_design="blog_posts_aria";
}else
{
$blog_box_design="blog_box_standerd_pages";
$blog_posts_aria_design="blog_posts_aria_standerd_pages";
}

echo"<head><title> $ti - $allset->blog_name</title></head>";

echo"
<div class='$blog_box_design' >
<div class='$blog_posts_aria_design' itemscope itemtype='http://schema.org/Article'>
";

echo"
<div itemprop='name' class='post_title'> $ti <img src='img/overlaping.png' /></div>
<meta itemprop='image' content='$tu'>
<div class='the_topic sky_link'>
$po
</div>
";

if(empty($ty) OR $ty=0){
echo"
<div class='under_share_buttons white_link'>
<a href='https://www.facebook.com/sharer/sharer.php?u=$actual_link' ><div class='under_share_buttons_cell' style='background-color:#45B0E3;'><img src='img/share/twitter.png' />غرَد</div></a>
<a href='https://twitter.com/home?status=$actual_link' ><div class='under_share_buttons_cell' style='background-color:#39599F;'><img src='img/share/facebook.png' />شارك</div></a>
<a href='https://plus.google.com/share?url=$actual_link' ><div class='under_share_buttons_cell' style='background-color:#333333;'><img src='img/share/google.png' />شارك</div></a>
</div>

</div>

<div class='related_posts black_link'>
<div class='under_title'>مقالات اخري مرتبطة بـ $ti<img src='img/overlaping.png' /></div>";

$Get_class->po("*","id!='' && status='1' ORDER By rand() LIMIT 3","dont_show_pages");
foreach($Get_class->PostsArray as $key=>$related_posts){
$related_posts_id = $related_posts["id"];
$related_posts_title = $related_posts["title"];
$related_posts_thumb = $related_posts["thumb"];
$related_posts_thumb = $related_posts["thumb"];
$related_posts_link  = $allset->blog_links("article","ar",$related_posts_id,$related_posts_title);

echo"
<a href='$related_posts_link'>
<div class='related_cel'>
<div class='related_cel_thumb' style='background-image:url($related_posts_thumb);background-size:cover; background-repeat: no-repeat; background-position:center;'></div>
<div class='related_cel_text'>$related_posts_title</div>
</div>
</a>
";
}


if($allset->allow_comments=="0"){
echo"
</div>
<div class='comments_box'>
<div class='under_title' style='border-bottom:4px solid #F3F3F0;'>التعليقات<img src='img/comment.png' />
</div>
";

if($comnum>6){$mincomnum = $comnum-7 ;$selfrom = "ASC LIMIT $mincomnum,7";}else{$selfrom = "ASC LIMIT 7";}
if($comnum>6){
echo"
<div style='color:#777;text-align:center;cursor:pointer;' id='load_more_comments'>عرض المزيد من التعليقات</div>

			<script>
			more_result_num = $mincomnum;
			$('#load_more_comments').click(function(){
			$('#load_more_comments').html('جاري التحميل ...');


			more_result_num = more_result_num-7;
alert(more_result_num);

			$.get('get_more.php?topic=$gid&type=comment&lang=ar&last_result='+more_result_num+'&all_result=$comnum',function( data ) {
			$('#load_more_comments').after(data).slideDown(55);
			});

			});
			</script>
";
}

include("classes/time_about.php");
if($comnum>0){
$Get_class->co("*","topic='$gid' ORDER By id $selfrom");
foreach($Get_class->CommentsArray as $key=>$comment){
$commenter_name    = $comment["name"];
$commenter_email   = $comment["email"];
$commenter_comment = $comment["comment"];
$author_re_comment = $comment["reply"];
$commenter_time    = time_about($comment["date"]);
$gravatar_link = 'http://www.gravatar.com/avatar/' . md5($commenter_email) . '?s=150';
echo"
<div class='comments_cell'>
<div class='comments_cell_thumb' style='background-image:url($gravatar_link);' ></div>
<div class='comments_cell_name'>$commenter_name</div>
<div class='comments_cell_comment'>$commenter_comment</div>
<div class='posts_box_post_cell_detils_since'>$commenter_time</div>
</div>";

if(!empty($author_re_comment)){
$commenter_name    = $comment["name"];
$commenter_email   = $comment["email"];
$commenter_comment = $comment["comment"];
$q1 = mysql_query("SELECT email,name FROM blog_users WHERE id='$au' ");
$q2 = mysql_fetch_array($q1);
$au_com_av =  'http://www.gravatar.com/avatar/' . md5($q2["email"]) . '?s=150';
$au_com_na =  $q2["name"];

echo"
<div class='comments_cell_admin' style='background:#FFFEDF;'>
<div class='comments_cell_thumb' style='background-image:url($au_com_av);' ></div>
<div class='comments_cell_name'>$au_com_na</div>
<div class='comments_cell_comment'>$author_re_comment</div>
</div>";
}

}
}else{
echo"
<p id='be_firest' style='font-size:17px;color:#333;text-align:center;height:150px;line-height:120px;'>كن اول من يشارك بتعليق علي هذا الموضوع</p>
";
}

echo"
<div class='add_comments_cell'>

<div class='under_title' style='border-bottom:1px solid #F3F3F0;background-color:#EDC549;color:#fff;'>
هل اعجبك الموضوع ؟ شاركنا الحوار بتعليقك
<img src='img/addcomment.png' /></div>

<input id='name' type='text' class='comment_input' placeholder='الاسم'/>
<input id='email' type='text' class='comment_input' placeholder='البريد الالكتروني'/>
<textarea id='comment' type='text' class='comment_input' style='width:96.5%;height:150px;' placeholder='اضف تعليقك هنا'></textarea>
<button class='comment_button' id='addcomment' >نشر</button></br>


</br>
</br>
</br>

</div>

<script>
$('#addcomment').click(function(){

name    = $('#name').val();
email   = $('#email').val();
comment = $('#comment').val();

if(name==''){
$('#name').css('border','1px solid #FFBBBB');
$('#name').animate({marginRight:'-10px'},122);
$('#name').animate({marginRight:'10px'},122);
$('#name').animate({marginRight:'-10px'},122);
$('#name').animate({marginRight:'10px'},122);
$('#name').animate({marginRight:'-10px'},122);
$('#name').animate({marginRight:'10px'},122);
$('#name').animate({marginRight:'-10px'},122);
$('#name').animate({marginRight:'10px'},122);
}else if(email==''){
$('#email').css('border','1px solid #FFBBBB');
$('#email').animate({marginRight:'-10px'},122);
$('#email').animate({marginRight:'10px'},122);
$('#email').animate({marginRight:'-10px'},122);
$('#email').animate({marginRight:'10px'},122);
$('#email').animate({marginRight:'-10px'},122);
$('#email').animate({marginRight:'10px'},122);
$('#email').animate({marginRight:'-10px'},122);
$('#email').animate({marginRight:'10px'},122);
}else if(comment==''){
$('#comment').css('border','1px solid #FFBBBB');
$('#comment').animate({marginRight:'-10px'},122);
$('#comment').animate({marginRight:'10px'},122);
$('#comment').animate({marginRight:'-10px'},122);
$('#comment').animate({marginRight:'10px'},122);
$('#comment').animate({marginRight:'-10px'},122);
$('#comment').animate({marginRight:'10px'},122);
$('#comment').animate({marginRight:'-10px'},122);
$('#comment').animate({marginRight:'10px'},122);
}

if(name!==''){ $('#name').css('border','1px solid #ccc');}
if(email!==''){ $('#email').css('border','1px solid #ccc');}
if(comment!==''){ $('#comment').css('border','1px solid #ccc');}

if(comment!=='' & name!=='' & email!==''){

$('#addcomment').css('opacity','0.7');
$('#name').css('opacity','0.2');
$('#email').css('opacity','0.2');
$('#comment').css('opacity','0.2');
$('#addcomment').html('انتظر...');


$.get('actions.php?topic=$gid&name='+name+'&email='+email+'&comment='+comment,function(data){
$('.add_comments_cell').before(data);
$('#be_firest').fadeOut(44);
});

}


});


</script>
";
}
echo"
</div>
</div>
";




echo"
<div class='sidebar'>
";
include("sidebar.php");
echo"
</div>";
}else{
echo"</div>";
echo"</div>";
}

//// end of body 
echo"</div>";


include("footer.php");
?>

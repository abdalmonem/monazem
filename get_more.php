<?php
include("config.php");

include("classes/get_class.php");
$Get_class = new GetClass();

if(isset($_GET['type'])){
if($_GET['type'] == "topic"){

if(isset($_GET['cat'])){$query_start = "id!='' && cat='".$_GET['cat']."' ";}else{$query_start = "id!=''";}

$Started_Result_Ftom = $_GET["last_result"];
$Get_class->po("*","$query_start ORDER By id Desc LIMIT $Started_Result_Ftom,7");
$index_Of_array = count($Get_class->PostsArray); 
foreach($Get_class->PostsArray as $key=>$all_posts){
$all_posts_id = $all_posts["id"];
$all_posts_title = $all_posts["title"];
$all_posts_thumb = $all_posts["thumb"];
$all_posts_thumb = $all_posts["thumb"];
$all_posts_link  = "article/ar/".$all_posts_id."/".$all_posts_title;
echo"
<a href='$all_posts_link'>
<div class='posts_box_post_cell'>
<div class='posts_box_post_cell_detils_since'>منذ شهر <img src='img/clock.png' /> </div>
<div class='posts_box_post_cell_thumb' style='background-image:url($all_posts_thumb);background-size:cover; background-repeat: no-repeat; background-position:center;'></div>
<div class='posts_box_post_cell_detils'>
<div class='posts_box_post_cell_detils_title'>$all_posts_title</div>
</div>
</div>
</a>
";
}
echo"<script>alert('$index_Of_array');</script>";
if($index_Of_array < 7){
echo" <script> $('#load_more_all_topics').html('عرض المزيد من المواضيع'); </script> ";
}else{echo" <script> $('#load_more_all_topics').fadeOut(); </script> ";}


}else if($_GET['type'] == "comment"){
if($_GET["last_result"] > 0){$Started_Result_From = $_GET["last_result"];$Started_Result_To=7;
echo" <script> $('#load_more_comments').html('عرض المزيد من المواضيع'); </script> ";
}
else{$Started_Result_From = 0;$Started_Result_To=$_GET["last_result"]+7;
echo" <script> $('#load_more_comments').fadeOut().remove(); </script> ";
}

$gid = $_GET["topic"];
			include("classes/time_about.php");
			$Get_class->co("*","topic='$gid' ORDER By id ASC LIMIT $Started_Result_From,$Started_Result_To");

			foreach($Get_class->CommentsArray as $key=>$comment){
			$commenter_name    = $comment["name"];
			$commenter_email   = $comment["email"];
			$commenter_comment = $comment["comment"];
			$commenter_time    = time_about($comment["date"]);
			$gravatar_link = 'http://www.gravatar.com/avatar/' . md5($commenter_email) . '?s=150';
			echo"
			<div class='comments_cell'>
			<div class='comments_cell_thumb' style='background-image:url($gravatar_link);' ></div>
			<div class='comments_cell_name'>$commenter_name  <div class='posts_box_post_cell_detils_since'>$commenter_time</div></div>
			<div class='comments_cell_comment'>$commenter_comment</div>
			</div>";
			}

}

}

?>
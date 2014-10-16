<?php 
///include("../config.php");
class GetClass{

//////////////////////////// المواريث "مصفوفات للاستخدام خارج الكلاس"
public $PostsArray;   /// مصفوفة المواضيع
public $PostNumber;



function blog_links($para1,$lang,$id,$title){
if(empty($title)){$title="غير معنون";}
$link = $para1."/".$lang."/".$id."/".str_replace(" ","-",$title);
return $link;
}


function blog_cat_links($lang,$id,$title){
if(empty($title)){$title="غير معنون";}
$cat_link = "Category/".$lang."/".$id."/".str_replace(" ","-",$title);
$cat_link = "Category/".$lang."/".$id."/".str_replace(" ","-",$title);
return $cat_link;
}




function po($rows="",$cond="",$do_you_need_pages="dont_show_pages"){
$PostsArray=[];


			if(!empty($do_you_need_pages) & $do_you_need_pages="dont_show_pages")
			{$show_pages_or_not="type!='1' &&  type!='2' &&";}
			else{$show_pages_or_not=" ";}
			
			
$Posts_query = mysql_query("SELECT $rows FROM topics WHERE $show_pages_or_not $cond");
$Posts_num_rows = mysql_num_rows($Posts_query);
while($Posts_fetch_array = mysql_fetch_array($Posts_query)){
$this->PostsArray[] = $Posts_fetch_array;
}}


public $CatsArray;   /// مصفوفة التصنيفات
public $CatNumber;
function ca($rows="",$cond=""){
$CatsArray=[];
$Cats_query = mysql_query("SELECT $rows FROM cats WHERE $cond");
$Cats_num_rows = mysql_num_rows($Cats_query);
while($Cats_fetch_array = mysql_fetch_array($Cats_query)){
$this->CatsArray[] = $Cats_fetch_array;
}}


public $CommentsArray;   /// مصفوفة التعليقات
public $CommentsNumber;
function co($rows="",$cond=""){
$CommentsArray=[];
$Comments_query = mysql_query("SELECT $rows FROM comments WHERE $cond");
$CommentsNumber = mysql_num_rows($Comments_query);
while($Comments_fetch_array = mysql_fetch_array($Comments_query)){
$this->CommentsArray[] = $Comments_fetch_array;
}}



public $UsersArray;   /// مصفوفة الاعضاء
public $UsersNumber;
function us($rows="",$cond=""){
$UsersArray=[];
$Users_query = mysql_query("SELECT $rows FROM blog_users WHERE $cond");
$UsersNumber = mysql_num_rows($Users_query);
while($Users_fetch_array = mysql_fetch_array($Users_query)){
$this->UsersArray[] = $Users_fetch_array;
}}




/// سحب موضوع كامل مع التصميم
function GET_TOPIC_CELL($query_standerd){
$Posts_function = new GetClass();
$Posts_function->po("*",$query_standerd);
foreach($Posts_function->PostsArray as $key=>$all_posts){
$all_posts_id = $all_posts["id"];
$all_posts_title = $all_posts["title"];
$all_posts_thumb = $all_posts["thumb"];
$all_posts_thumb = $all_posts["thumb"];
$all_posts_link  = $Posts_function->blog_links("article","ar",$all_posts_id,$all_posts_title);
echo"
<a href='$all_posts_link' itemprop='$all_posts_link'>
<div class='posts_box_post_cell' itemscope itemtype='http://schema.org/Article' >
<div class='posts_box_post_cell_detils_since'>منذ شهر <img src='img/clock.png' /> </div>
<div class='posts_box_post_cell_thumb' style='background-image:url($all_posts_thumb);background-size:cover; background-repeat: no-repeat; background-position:center;'></div>
<meta itemprop='image' content='$all_posts_thumb'>
<div class='posts_box_post_cell_detils'>
<div itemprop='name' class='posts_box_post_cell_detils_title'>$all_posts_title</div>
</div>
</div>
</a>
";

}
$this->result_number = count($Posts_function->PostsArray);
}


}

/*get posts
$Posts_function = new GetClass();
$Posts_function->po("*","id='1' ORDER By id DESC LIMIT 4");
print_r($Posts_function->PostsArray);
*/

/*get cats
$Cats_function = new GetCat();
$Cats_function->ca("*","id='1' ORDER By id DESC LIMIT 4");
print_r($Cats_function->CatsArray);
*/


?>
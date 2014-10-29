<?php 
///include("../config.php");
class GetClass{

//////////////////////////// المواريث "مصفوفات للاستخدام خارج الكلاس"
public $PostsArray;   /// مصفوفة المواضيع
public $PostNumber;
public $queryArray;
public $query_num_rows;



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
global $condb;
$rows = $condb->real_escape_string((gettype($rows) == "string") ? $rows : "");
$cond = $condb->real_escape_string((gettype($cond) == "string") ? $cond : "");
$do_you_need_pages = $condb->real_escape_string((gettype($do_you_need_pages) == "string") ? $do_you_need_pages : "");
$PostsArray=[];


			if(!empty($do_you_need_pages) & $do_you_need_pages="dont_show_pages")
			{$show_pages_or_not="type!='1' &&  type!='2' &&";}
			else{$show_pages_or_not=" ";}
			
			
$Posts_query = $condb->query("SELECT $rows FROM topics WHERE $show_pages_or_not $cond");
$Posts_num_rows = $Posts_query->num_rows;
while($Posts_fetch_array = $Posts_query->fetch_array(MYSQLI_ASSOC)){
$this->PostsArray[] = $Posts_fetch_array;
}}


public $CatsArray;   /// مصفوفة التصنيفات
public $CatNumber;
function ca($rows="",$cond=""){
global $condb;
$CatsArray=[];
$Cats_query = $condb->query("SELECT $rows FROM cats WHERE $cond");
$Cats_num_rows = $Cats_query->num_rows;
while($Cats_fetch_array = $Cats_query->fetch_array(MYSQLI_ASSOC)){
$this->CatsArray[] = $Cats_fetch_array;
}}


public $CommentsArray;   /// مصفوفة التعليقات
public $CommentsNumber;
function co($rows="",$cond=""){
global $condb;
$CommentsArray=[];
$Comments_query = $condb->query("SELECT $rows FROM comments WHERE $cond");
$CommentsNumber = $Comments_query->num_rows;
while($Comments_fetch_array = $Comments_query->fetch_array(MYSQLI_ASSOC)){
$this->CommentsArray[] = $Comments_fetch_array;
}}



public $UsersArray;   /// مصفوفة الاعضاء
public $UsersNumber;
function us($rows="",$cond=""){
global $condb;
$UsersArray=[];
$Users_query = $condb->query("SELECT $rows FROM blog_users WHERE $cond");
$UsersNumber = $Users_query->num_rows;
while($Users_fetch_array = $Users_query->fetch_array(MYSQLI_ASSOC)){
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





///query function
public function qufu($rows="",$from,$cond=""){
global $condb;
$rows = $condb->real_escape_string((gettype($rows) == "string") ? $rows : "");
$from = $condb->real_escape_string((gettype($from) == "string") ? $from : "");
$cond = $condb->real_escape_string((gettype($cond) == "string") ? $cond : "");

$queryArray=[];

$query_start    = $condb->query("SELECT $rows from $from $cond");
$query_num_rows = $query_start->num_rows;
while($query_fetch_array = $query_start->fetch_array(MYSQLI_ASSOC)){
$this->queryArray[] = $query_fetch_array;
}

}
}

/*
$Posts_function = new GetClass();
$Posts_function->qufu("*","topics","");
foreach($Posts_function->queryArray as $key=>$d){
echo $d['id']."</br></br></br></br>";
}
*/

/*get cats
$Cats_function = new GetCat();
$Cats_function->ca("*","id='1' ORDER By id DESC LIMIT 4");
print_r($Cats_function->CatsArray);
*/


?>

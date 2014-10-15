<?php 
///include("../config.php");
class GetClass{

//////////////////////////// ЧсуцЧбэЫ "уенцнЧЪ ссЧгЪЮЯЧу ЮЧбЬ ЧспсЧг"
public $PostsArray;   /// уенцнЩ ЧсуцЧжэк
public $PostNumber;

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


public $CatsArray;   /// уенцнЩ ЧсЪефэнЧЪ
public $CatNumber;
function ca($rows="",$cond=""){
$CatsArray=[];
$Cats_query = mysql_query("SELECT $rows FROM cats WHERE $cond");
$Cats_num_rows = mysql_num_rows($Cats_query);
while($Cats_fetch_array = mysql_fetch_array($Cats_query)){
$this->CatsArray[] = $Cats_fetch_array;
}}


public $CommentsArray;   /// уенцнЩ ЧсЪксэоЧЪ
public $CommentsNumber;
function co($rows="",$cond=""){
$CommentsArray=[];
$Comments_query = mysql_query("SELECT $rows FROM comments WHERE $cond");
$CommentsNumber = mysql_num_rows($Comments_query);
while($Comments_fetch_array = mysql_fetch_array($Comments_query)){
$this->CommentsArray[] = $Comments_fetch_array;
}}



public $UsersArray;   /// уенцнЩ ЧсЪксэоЧЪ
public $UsersNumber;
function us($rows="",$cond=""){
$UsersArray=[];
$Users_query = mysql_query("SELECT $rows FROM blog_users WHERE $cond");
$UsersNumber = mysql_num_rows($Users_query);
while($Users_fetch_array = mysql_fetch_array($Users_query)){
$this->UsersArray[] = $Users_fetch_array;
}}


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
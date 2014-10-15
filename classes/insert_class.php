<?php 
///include("../config.php");
class GetClass{

//////////////////////////// المواريث "مصفوفات للاستخدام خارج الكلاس"
public $PostsArray;   /// مصفوفة المواضيع
public $PostNumber;

function po($rows="",$cond=""){
$PostsArray=[];
$Posts_query = mysql_query("SELECT $rows FROM topics WHERE $cond");
$PostNumber = mysql_num_rows($Posts_query);
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
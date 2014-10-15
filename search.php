<?php
include("config.php");
$serch_key_world = $_GET["serch_key_world"];
$q1 = mysql_query("SELECT * FROM topics WHERE title like'$serch_key_world%' order by date limit 4");
$num_rows = mysql_num_rows($q1);
while($q2 = mysql_fetch_array($q1)){
$title = $q2["title"];


echo'
<div class="search_outo_comp_box_cell">'.$title.'</div>
';
}
if($num_rows>0){
echo'
<script>
$("#search_key_show").html("نتائج متعلقة بـ '.$serch_key_world.' ");
</script>
';
}else{
echo'
<script>
$("#search_key_show").html("لم تتطابق كلمة بحثك : '.$serch_key_world.' مع اي محتوي بقاعدتنا");
</script>
';
}

?>
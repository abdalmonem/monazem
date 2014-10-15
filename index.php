<?php
$r = rand(1, 100);
$th= rand(1, 20);
@$gid= intval($_GET['cat']);
 
include "header.php";
echo"<title> $allset->blog_name </title>";



 echo"
<div class='blog_body'>
";


echo"<div class='blog_box white_link'>
<div class='posts_box'>
<div class='cat_top_posts' style='background-color:#009CC0;'>موضوع مميز <img src='img/prem.png' /></div>
";

$gtprem = mysql_query("SELECT * FROM topics WHERE premium !='' order by rand() limit 1");
$gtprem2 = mysql_fetch_array($gtprem);
$gtprem2title = $gtprem2['title'];
$gtprem2id    = $gtprem2['id'];
$gtprem2link  = $allset->blog_links("article","ar",$gtprem2id,$gtprem2title);
echo"
<a href='$gtprem2link'>
<div class='posts_box_first' style='background-image:url(".$gtprem2['premium'].");background-size:cover; background-repeat: no-repeat; background-position:center;'>
<div class='posts_box_first_title_area'  >
<div class='posts_box_first_title'>$gtprem2title</div>

</div>
</div>
</a>
";


echo"<div class='cat_top_posts' style='border-top:10px solid #F3F3F0;background-color:#16AEB5;'>الاكثر مشاهدة<img src='img/new.png' /></div>";


$Get_class->po("*","id!='' && status='1' ORDER By viw Desc LIMIT 3","dont_show_pages");
foreach($Get_class->PostsArray as $key=>$premum_3_posts){
$theeprem_id = $premum_3_posts["id"];
$theeprem_title = $premum_3_posts["title"];
$theeprem_thumb = $premum_3_posts["thumb"];
$theeprem_posts_link  = $allset->blog_links("article","ar",$theeprem_id,$theeprem_title);

echo"
<a href='$theeprem_posts_link'>
<div class='normal_posts_box_post_cell'>
<div class='normal_posts_box_post_cell_thumb' style='background-image:url($theeprem_thumb);background-size:cover; background-repeat: no-repeat; background-position:center;'></div>
<div class='norml_posts_box_post_cell_detils'>
<div class='normal_posts_box_post_cell_detils_title'> $theeprem_title </div>
</div>
</div>
</a>
";
unset($Get_class->PostsArray);
}


echo"<div class='cat_top_posts' style='border-top:10px solid #F3F3F0;background-color:#16AEB5;'>جميع المواضيع<img src='img/all_posts.png' /></div>";
echo"<div id='post_contener'>";
$Get_class->po("*","id!='' && status='1' ORDER By id Desc LIMIT 7","dont_show_pages");
foreach($Get_class->PostsArray as $key=>$all_posts){
$all_posts_id = $all_posts["id"];
$all_posts_title = $all_posts["title"];
$all_posts_thumb = $all_posts["thumb"];
$all_posts_thumb = $all_posts["thumb"];
$all_posts_link  = $allset->blog_links("article","ar",$all_posts_id,$all_posts_title);
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
$result_number = count($Get_class->PostsArray);
echo"</div>";


if($result_number > 6){
echo"
<div class='load_more_box'>
<div class='load_moreposts' id='load_more_all_topics' style='display:none;'>عرض المزيد من المواضيع</div>
</div>

<script>
more_result_num = 0;
$('#load_more_all_topics').click(function(){
$('#load_more_all_topics').html('جاري التحميل ...');


more_result_num = more_result_num+7;


$.get('get_more.php?type=topic&lang=ar&last_result='+more_result_num,function( data ) {
$('#post_contener').append(data).slideDown(55);
});

});
</script>
";
}


echo"
</div>
</div>";

/*
$qu1=mysql_query("SELECT * FROM blog");
while ($qu2=mysql_fetch_array($qu1)){
$ti = $qu2['title'];
$th = $qu2['thumb'];


$qu3=mysql_query("SELECT * from users WHERE id=9");
$qu4=mysql_fetch_assoc($qu3);

}
*/

echo"<div class='sidebar'>";
include("sidebar.php");
echo"</div>";

echo"</div>";



?>

<?php
$r = rand(1, 100);
$th= rand(1, 20);
@$gid= intval($_GET['cat']);
		require_once"header.php";
		echo"<title> $allset->blog_name </title>
		<div class='blog_body'>
		<div class='blog_box white_link'>
		<div class='posts_box'>";

if(isset($_GET["page"]) && $_GET["page"]=="index"){
echo"<div class='cat_top_posts' style='background-color:#009CC0;'>موضوع مميز <img src='img/prem.png' /></div>";

		$Get_class->qufu("*","topics","WHERE premium !='' order by rand() limit 1");
		foreach($Get_class->queryArray as $key=>$gtprem2){
		$gtprem2link  = $Get_class->blog_links("article","ar",$gtprem2['id'],$gtprem2['title']);
		echo"
		<a href='$gtprem2link'>
		<div class='posts_box_first' style='background-image:url(".$gtprem2['premium'].");background-size:cover; background-repeat: no-repeat; background-position:center;'>
		<div class='posts_box_first_title_area'  > <div class='posts_box_first_title'>".$gtprem2['title']."</div> </div>
		</div></a>
		";
		unset($Get_class->queryArray);
		}

				echo"<div class='cat_top_posts' style='border-top:10px solid #F3F3F0;background-color:#16AEB5;'>الاكثر مشاهدة<img src='img/new.png' /></div>";
				$Get_class->qufu("*","topics","WHERE id!='' && status='1' ORDER By viw Desc LIMIT 3");
				foreach($Get_class->queryArray as $key=>$premum_3_posts){
				$theeprem_posts_link  = $Get_class->blog_links("article","ar",$premum_3_posts["id"],$premum_3_posts["title"]);
				echo"
				<a href='$theeprem_posts_link'>
				<div class='normal_posts_box_post_cell'>
				<div class='normal_posts_box_post_cell_thumb' style='background-image:url(".$premum_3_posts['thumb'].");background-size:cover; background-repeat: no-repeat; background-position:center;'></div>
				<div class='norml_posts_box_post_cell_detils'>
				<div class='normal_posts_box_post_cell_detils_title'> ".$premum_3_posts['title']." </div></div></div></a>
				";
				unset($Get_class->queryArray);
				}


		echo"<div class='cat_top_posts' style='border-top:10px solid #F3F3F0;background-color:#16AEB5;'>جميع المواضيع<img src='img/all_posts.png' /></div>";
		echo"<div id='post_contener'>";
		$Get_class->GET_TOPIC_CELL("id!='' && status='1' ORDER By id Desc LIMIT 7","dont_show_pages");
		echo"</div>";


switch($Get_class->result_number){
case '7':
echo"
		<div class='load_more_box'>
		<div class='load_moreposts' id='load_more_all_topics' >عرض المزيد من المواضيع</div>
		</div>
				<script>
				more_result_num = 0;
				$('#load_more_all_topics').click(function(){
				$('#load_more_all_topics').html('جاري التحميل ...');
				more_result_num = more_result_num+7;
				$.get('get_more.php?type=topic&lang=ar&last_result='+more_result_num,function(data){
				$('#post_contener').append(data).slideDown(55);
				});
				});
				</script>
";
break;
}}

echo"</div></div>";

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

<?php
////// تسجيل الدخول سايت بار
$url_of_page = explode('/',$_SERVER['REQUEST_URI']);

if (in_array('article', $url_of_page)){
echo"<div class='sidebar_cel' style='border-bottom:10px solid #F3F3F0;'>";


$q1 = mysql_query("SELECT about,name,email FROM blog_users WHERE id='$au' ");
$q2 = mysql_fetch_array($q1);
$about =  $q2["about"];
$name  =  $q2["name"];
$gravatar_link = 'http://www.gravatar.com/avatar/' . md5($q2["email"]) . '?s=150';
echo"
<div class='auther_box'>
<div class='auther_box_thumb' style='background-image:url($gravatar_link);' ></div>
<div class='auther_box_name'>كتب بواسطة $name <img src='img/author.png' /> </div>
<div class='auther_box_about'>$about</div>
</div>
</div>
";


echo"
<div class='sidebar_cel white_link' style='border-bottom:10px solid #F3F3F0;background-color:#999;'>
<a href='https://facebook.com/MonazemDotCom' > <div class='sidebar_flow'  ><img src='img/social/facebook.png' /></br> فيس بوك </div> </a>
<a href='https://twitter.com/MonazemDotCom' ><div class='sidebar_flow'  ><img src='img/social/twitter.png' /></br> تويتر </div></a>
<a href='https://plus.google.com/103479011791322422061' ><div class='sidebar_flow'  ><img src='img/social/google.png' /></br> قوقل بلس </div></a>
</div>";

/*
echo"
<div class='sidebar_cel' style='border-bottom:10px solid #F3F3F0;padding-bottom:15px;'>
<div class='sidebar_title'> اضيفت حديثا </div>

<a href='$related_posts_link'>
<div class='related_cel'>
<div class='related_cel_thumb' style='background-image:url($related_posts_thumb);background-size:cover; background-repeat: no-repeat; background-position:center;'></div>
<div class='related_cel_text'>$related_posts_title</div>
</div>
</a>

<a href='$related_posts_link'>
<div class='related_cel'>
<div class='related_cel_thumb' style='background-image:url($related_posts_thumb);background-size:cover; background-repeat: no-repeat; background-position:center;'></div>
<div class='related_cel_text'>$related_posts_title</div>
</div>
</a>

<a href='$related_posts_link'>
<div class='related_cel'>
<div class='related_cel_thumb' style='background-image:url($related_posts_thumb);background-size:cover; background-repeat: no-repeat; background-position:center;'></div>
<div class='related_cel_text'>$related_posts_title</div>
</div>
</a>


<a href='$related_posts_link'>
<div class='related_cel'>
<div class='related_cel_thumb' style='background-image:url($related_posts_thumb);background-size:cover; background-repeat: no-repeat; background-position:center;'></div>
<div class='related_cel_text'>$related_posts_title</div>
</div>
</a>

</div>



";

*/


}else if (in_array('Category', $url_of_page)){
echo"<div class='sidebar_cel' style='border-bottom:10px solid #F3F3F0;'>
<div class='auther_box' style='height:375px;'>
<div class='auther_box_thumb'></div>
<div class='auther_box_name'>تحت التطوير<img src='img/author.png' /> </div>
<div class='auther_box_about'>
في محلة التصميم
</div>
</div>
</div>






";
}else{
echo"
<div class='sidebar_cel' style='height:286px;background-color:#067B82;'>
<p style='color:#fff;font-size:21px;'>مُنَظِم !! </p>
<p style='color:#fff;font-size:18px;' >هو مشروع ويَب غَير ربحي
, يُعني بتطور وتحسين الويب وجعله افضل مرجعية</p>
<p style='color:#fff;font-size:13px;' >تعرف علي مزيد وكيفية المساهمة</p>
</div>
";///// ازرار صفحات الفيس بوك

}

/*
echo"
<!-- Histats.com  START (hidden counter)-->
<script type='text/javascript'>document.write(unescape('%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E'));</script>
<a href='http://www.histats.com' target='_blank' title='counter free hit unique web' ><script  type='text/javascript' >
try {Histats.start(1,2555313,4,0,0,0,'');
Histats.track_hits();} catch(err){};
</script></a>
<noscript><a href='http://www.histats.com' target='_blank'><img  src='http://sstatic1.histats.com/0.gif?2555313&101' alt='counter free hit unique web' border='0'></a></noscript>
<!-- Histats.com  END  -->
";
*/


?>
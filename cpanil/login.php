<?php
SESSION_START();
include "../config.php";
include "../classes/user.lib.php";


 
include "header.php";




 echo"
<div class='blog_body'>
";


echo"

<div class='header_blog'>
عنوان المدونة
<div class='header_blog_bar'>الاقسام</div>
</div>";


echo"
<div class='blog_box'>
<div class='blog_sidebar'>ji</br>ijjiujoiji</br>ijjiujoiji</br></div>


<div class='blog_posts_aria'>
<div class='sidebar_reg' >
<div class='bar_reg_title'><text>تسجيل دخول </text></div>
</br>
<div style='margin:0px 0px 0px 250px;'>
<form method='post' action='login.php' >
<input type='text' name='email' placeholder='البريد الاليكتروني' class='out_formstyle' style='width:400px;' />
<br/>


<input type='password' name='password' placeholder='كلمة السر'class='out_formstyle' style='width:400px;'/ >
<br/>
<input type='submit' name='submit' value='فتح حساب جديد' class='button' style='width:400px;' />
</form>

</div></br>
</div>

</div>
";

echo "
</div>";


	if(!empty($_GET["password"]) && !empty($_GET["email"])){
		$c = new user();
		$e = $c->real_escape_string($_GET["email"]);
		$p = $c->real_escape_string($_GET["password"]);
		$query = $c->GETuser(array("email"=>$e,"password"=>$p));
		if(!$query->num_rows)
			echo "تاكد من المعلومات";
		else{
			$r = $query->fetch_array($q);
			$_SESSION['uid'] = $r['id'];
			$_SESSION['em'] = $r['email'];
			echo "تم تسجيل الدخول بنجاح";
		}
	}
	echo "<form action='' method='post' >
	<input type='text' name='email' placeholder='email' />
	<input type='text' name='password' placeholder='pass' />
	<input type='submit' name='submit' value= 'submit' />		
	</form>";


?>

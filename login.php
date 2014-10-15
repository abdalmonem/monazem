<?php
SESSION_START();
include "../config.php";


 
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

echo"
</div>";


	if(isset($_POST['submit'])){
		if($_POST['email'] == "" || $_POST['password'] == ""){
			echo "Missing input field <br />
			<meta http-equiv='Refresh' content='3'; URL=login.php' />";
		}
		$e = $_POST['email'];
		$p = $_POST['password'];
		echo"$e $p";
		
		$q= mysql_query("SELECT `id`, `email` FROM `blog_users` WHERE email='".$e."' && password='".$p."'");
		if(!mysql_num_rows($q)){
			echo "Input data not exist<br />";
		}
		$row = mysql_fetch_array($q);
		$_SESSION['uid'] = $row['id'];
		$_SESSION['em'] = $row['email'];
		echo "Login successfully";
	}
	if(isset($_POST['email'])){$placeholder=$_POST["email"];}else{$placeholder="";}
	echo "<form action='' method='post' >
	<input type='text' name='email' value='$placeholder' />
	<input type='text' name='password' value='' />
	<input type='submit' name='submit' value= 'submit' />		
	</form>";


?>

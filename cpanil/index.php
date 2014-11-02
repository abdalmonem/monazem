<?php
ob_start();
SESSION_START();
include("../config.php");
$d = time();
echo '
<!DOCTYPE html>
<html>
<head>
<title>14 بيكسل</title>
<link rel="stylesheet" href="../style.css" type="text/css" />
<link rel="stylesheet" href="style.css" type="text/css" />
<script type="text/javascript" src="../jq.js"></script>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>
<body>
<div style="z-index:1020; position:fixed">

<div class="logheader">

<div class="hh1">
<img src="../logo1.png" width="50px"; style="float:left;">
14pixel

</div>
</div>
</div>
';

if(isset($_SESSION["sid"])){
header("location:posts.php?page=all");
}else{
if(isset($_GET['action'])){
if($_GET["action"]=="login"){

if(isset($_POST["logbutton"])){
$mail = $_POST["email"];
$pass = $_POST["password"];
$q1 = mysql_query("SELECT * FROM blog_users WHERE email='$mail' && password='$pass' limit 1");
if(mysql_num_rows($q1)=="1"){
echo"sucss!!";
$fuser = mysql_fetch_array($q1);

$_SESSION["sid"]    = $fuser["id"];
$_SESSION["semail"] = $fuser["email"];

header("location:posts.php?page=all");

}else{
echo"
<div class='log_notie'>
كلمة السر او اسم المستخدم خاطئ <img src='../img/rong_form.png' style='width:23px;position:absolute;margin:5px;'/>
</div>
";
}

}

echo"
<div class='log_box black_link'>
<div class='log_box_title'>تسجيل دخول <img src='../img/key.png' style='width:20px;margin:5px;'/> </div>
<form  method='post'>
<input type='text' class='log_box_form' name='email' placeholder='البريد الاليكتروني'/>
<input type='password' class='log_box_form' name='password' placeholder='كلمة السر'/>
<input type='submit' class='log_box_button' name='logbutton' value='تسجيل دخول'/>
</form>
<p><a href='?action=forgetpassword' > نسيت كلمة السر </a>   |   
ليس لديك حساب ؟
<a href='?action=register' >سجل الان</a>
</p>
</div>
";
}












else if($_GET["action"]=="register"){

if(isset($_POST["regbutton"])){
$mail   = $_POST["email"];
$name   = $_POST["name"];
$pass   = $_POST["password"];
$repass = $_POST["repassword"];
$q1     = mysql_query("SELECT * FROM blog_users WHERE email='$mail' limit 1");
if(mysql_num_rows($q1)>0){
echo"
<div class='log_notie'>
عذرا هذا البريد متواجد من قبل |
<a href='?action=login'>سجل دخول لحسابك </a>
 <img src='../img/rong_form.png' style='width:23px;position:absolute;margin:5px;'/>
</div>
";
}else{
if(empty($mail) OR empty($name) OR empty($pass) OR empty($repass)){$reg_err = "انت لم تقم بملاء جميع الحقول , رحاء حاول مجددا";}
else if(!empty($mail) AND !empty($name) AND !empty($pass) AND !empty($repass) && $pass!==$repass){$reg_err = "تاكد من تطابق كلمتي السر بالاسفل";}
else if(!empty($mail) AND !empty($name) AND !empty($pass) AND !empty($repass) && $pass==$repass){$reg_err = "تمام";
mysql_query("INSERT INTO blog_users 
(name,email,password,rank,date)
VALUES
('$name','$mail','$pass','1','$d')
");
}
echo"
<div class='log_notie'>
$reg_err <img src='../img/rong_form.png' style='width:23px;position:absolute;margin:5px;'/>
</div>
";
}

}

echo"
<div class='log_box black_link'>
<div class='log_box_title'>تسجيل حساب جديد<img src='../img/user.png' style='width:20px;margin:5px;'/> </div>
<form  method='post'>
<input type='text' class='log_box_form' name='name' placeholder='الاسم'/>
<input type='text' class='log_box_form' name='email' placeholder='البريد'/>
<input type='password' class='log_box_form' name='password' placeholder='كلمة السر'/>
<input type='password' class='log_box_form' name='repassword' placeholder='اعد ادخال كلمة السر'/>
<input type='submit' class='log_box_button' name='regbutton' value='تسجيل' id='register'/>
</form>
<p>  
تملك حسابا ؟
<a href='?action=login' >سجل دخول</a>
</p>
</div>

";
}
}else{
header("location:index.php?action=login");
}
}



?>
<?php
//include("../config.php");
class allset{
public $blog_name;
public $url;
public $description;
public $register_available;
public $hack_logs;
public $logs_filelogs_file;
public $allow_comments;
public $show_comments;
public $check_comments;
public $blog_state;
public $allow_to_msg;

public $usEmail;
public $usPassword;
public $usName;
public $usAbout;
public $usState;
public $usRank;



public function bs(){

global $condb;
$qs1                      = $condb->query("SELECT * FROM setting WHERE id='1' ORDER BY id desc limit 1");
while($qs2                = $qs1->fetch_array(MYSQLI_ASSOC)){
$this->blog_name          = $qs2["blog_name"];
$this->url                = $qs2["url"];
$this->description        = $qs2["description"];
$this->register_available = $qs2["register_available"];
$this->hack_logs          = $qs2["hack_logs"];
$this->logs_filelogs_file = $qs2["logs_file"];
$this->allow_comments     = $qs2["allow_comments"];
$this->show_comments      = $qs2["show_comments"];
$this->check_comments     = $qs2["check_comments"];
$this->blog_state         = $qs2["blog_state"];
$this->allow_to_msg       = $qs2["allow_to_msg"];
}

}



function user_set(){
global $condb;
$UsSet             = $condb->query("SELECT * FROM blog_users WHERE id='".$_SESSION['sid']."' ");
while($UsSet2            = $UsSet->fetch_array(MYSQLI_ASSOC)){

$this->usEmail           = $UsSet2["email"];
$this->usPassword        = $UsSet2["password"];
$this->usName            = $UsSet2["name"];
$this->usAbout           = $UsSet2["about"];
$this->usState           = $UsSet2["state"];
$this->usRank            = $UsSet2["rank"];
}

}




}


$allset = new allset();
$allset->bs();
echo $allset->blog_name;



?>
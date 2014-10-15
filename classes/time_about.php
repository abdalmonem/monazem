<?php
function time_about($before){
$timestamp  = time() - $before ; 
$seconds    = $timestamp;
$qminute    = $seconds / 60;
$minute     = intval($qminute);
$qhours     = $seconds / 60/ 60 ;
$hours      = intval($qhours);
$qdays      = $seconds / 60/ 60 /24;
$days       = intval($qdays);
$qmonths    = $seconds / 60/ 60  /24 /30;
$months     = intval($qmonths);
$qyears     = $seconds / 60/ 60 /24 /30 /12;
$years      = intval($qyears);
$ida        = $timestamp;

if($seconds < 60){$since = "منذ $seconds ثانية";}
else if($minute > 11 and $minute < 61 ){$since = "منذ $minute دقيقة";}
else if($minute == 1){$since = "منذ دقيقة";}
else if($minute == 2){$since = "منذ دقيقتين";}
else if($minute  > 3 and $minute  < 11){$since = "منذ $minute دقائق";}
else if($minute == 60){$since = "منذ ساعة تماما";}
else if($hours == 1){$since = "منذ ساعة";}
else if($hours  == 2){$since = "منذ ساعتين";}
else if($hours  > 2 and $hours  < 11){$since = "منذ $hours ساعات";}
else if($hours  > 11 and $hours < 24 ){$since = "منذ $hours ساعة";}
else if($days == 1){$since = "منذ البارحة";}
else if($days == 2){$since = "منذ يومين";}
else if($days < 11){$since = "منذ $days ايام";}
else if($days == 11 or $days > 11 and $days < 30){$since = "منذ $days يوم";}
else if($months == 1){$since = "منذ شهر";}
else if($months == 3){$since = "منذ شهرين";}
else if($months >3 and $months<11){$since = "منذ $months شهور";}
else if($months <10 and $months < 13){$since = "منذ $months شهر";}
else if($years == 1){$since = "منذ عام";}		  
else if($years == 2){$since = "منذ عامين";}		
else if($years >2 and $years< 11){$since = "منذ $years اعوام";}		
else if($years > 10 and $years< 11){$since = "منذ $years عام";}
return $since;
}
?>
<?php
//////////////////////////////////////////////////////*on off button*///////////////////////////////
function On_Off_Function($button_title,$fild,$target){
$rand = rand(0,533);
if($fild=="0"){$state="on_button";$elsestate="of_button";$state_text="ايقاف";$elsetext="تشغيل";$state_float="right";$elsestate_float="left";}
          else{$state="of_button";$elsestate="on_button";$state_text="تشغيل";$elsetext="ايقاف";$state_float="left";$elsestate_float="right";}

return "
<div class='set_form_cell'>
<div class='set_form_input_title'>$button_title</div>
<div class='on_of' id='but_$rand'>
<div class='on_of_state' id='sta_$rand' style='float:$state_float' >$state_text</div>
<div class='$state' id='on_of_but_$rand'>||||</div>
</div>
<script>
$('#but_$rand').click(function(){
var state = $('#sta_$rand').html();
if(state=='$state_text'){
but_cls = $('#on_of_but_$rand').attr('class');
$('#sta_$rand').css('float','$elsestate_float');
$('#on_of_but_$rand').removeClass('$state').addClass('$elsestate');
$.post('actions/save_set.php',{type:'$target',val:'onofbutton'},function(data){ $('.save_notic').html(data).slideDown().delay(5555).slideUp(); });
$('#sta_$rand').html('$elsetext');
}else {
but_cls = $('#on_of_but_$rand').attr('class');
$('#sta_$rand').css('float','$state_float');
$('#on_of_but_$rand').removeClass('$elsestate').addClass('$state');
$.post('actions/save_set.php',{type:'$target',val:'onofbutton'},function(data){ $('.save_notic').html(data).slideDown().delay(5555).slideUp(); });
$('#sta_$rand').html('$state_text');
}
});
</script>
</div>
";
}
//////////////////////////////////////////////////////*on off button*///////////////////////////////





function confirm_table_Function($if_click_div,$action,$elementid,$msg,$remove_but,$back_but,$notic,$targeturl,$para1,$para1val){
return"
			<div class='table_row' id='$action-$elementid' style='display:none;background-color:#F9DBE2;text-align:center;font-size:18px;'>
			$msg 
			<button class='table_confirm' id='$action-confirm-$elementid'>$remove_but</button>
			<button class='table_back'    id='$action-back-$elementid'>$back_but</button>
			</br>
			<span style='font-size:12px;'>$notic</span>
			</div>
			
<script>
		$('#$if_click_div').toggle(function(){
		$('#$action-$elementid').animate({height:'auto'},422);
		},

		function(){
		$('#$action-$elementid').animate({height:'hide'},422);
		});
		
		$('#$action-back-$elementid').click(function(){
		$('#$action-$elementid').animate({height:'hide'},422);
		});		
		
		$('#$action-confirm-$elementid').click(function(){
		$.post('$targeturl',{'$para1':'$para1val'},function(data){});
		$('#$action-$elementid').fadeOut(333);
		$('#row-$elementid').fadeOut(333);
		});
		</script>
		";
		
}


function one_tow_three_button($title,$option1,$option2,$option3,$get_my_choise){
$id1 = time()+1;
$id2 = time()+2;
$id3 = time()+3;
return"
<div class='set_form_cell'>
<div class='set_form_input_title'>$title</div>
<div class='input_chose_one' index='0' id='$id1' style='border-bottom:5px solid #5894CE;' >$option1</div>
<div class='input_chose_one' index='1' id='$id2' >$option2</div>
<div class='input_chose_one' index='2' id='$id3' >$option3</div>
</div>

<script>
get_my_choise = 0;
$('#$id1,#$id2,#$id3').click(function(){
$('#$id1,#$id2,#$id3').css('border-bottom','5px solid #ccc');
$(this).css('border-bottom','5px solid #5894CE');
get_my_choise = $(this).attr('index');
return false();
});
</script>
";

}


?>
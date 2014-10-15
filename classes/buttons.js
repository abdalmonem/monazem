/*on off button*/


/*chose one button*/

function chose_one(chose_one1,chose_one2,chose_one3,get_my_choise){
$(chose_one1+','+chose_one2+','+chose_one3).click(function(){
$(chose_one1+','+chose_one2+','+chose_one3).css('border-bottom','5px solid #ccc');
$(this).css('border-bottom','5px solid #4CC71E');
});
}

/*sve one input on click enter*/
function fast_save_form(input_target,url,target_fild){
$(input_target).keypress(function(e) {
var input_val = $(input_target).val();
if(e.which == 13){
$.post(url,{type:target_fild,val:input_val},function(data){
$('.save_notic').html(data).slideDown().delay(5555).slideUp();
});
}
});
}


/*sve one input on click enter*/
function fast_save_setting_fast_menu(input_target,url,target_fild){
$(input_target).keypress(function(e) {
var input_val = $(input_target).val();
if(e.which == 13){
$.post(url,{type:target_fild,val:input_val},function(data){});
$(input_target).css('border','1px solid #52B131');
}
});
}
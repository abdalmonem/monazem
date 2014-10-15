function ted(bsbsbsbsbsbsb){

$(document).ready(function(){
 document.getElementById('bsbsbsbsbsbsb').contentWindow.document.designMode="on";
 document.getElementById('bsbsbsbsbsbsb').contentWindow.document.close();
 var edit = document.getElementById("bsbsbsbsbsbsb").contentWindow;
 edit.focus();
 $("#bold").click(function(){
  if($(this).hasClass("selected")){
   $(this).removeClass("selected");
  }else{
   $(this).addClass("selected");
  }
  boldIt();
 });
 $("#italic").click(function(){
  if($(this).hasClass("selected")){
   $(this).removeClass("selected");
  }else{
   $(this).addClass("selected");
  }
  ItalicIt();
 });
 $("#fonts").on('change',function(){
  changeFont($("#fonts").val());
 });
 $("#link").click(function(){
  var urlp=prompt("What is the link:","http://");
  url(urlp);
 }); 
 $("#stext").click(function(){
  $("#text").hide();
  $("#bsbsbsbsbsbsb").show();
  $("#controls").show()
 });
 $("#shtml").on('click',function(){
  $("#text").css("display","block");
  $("#bsbsbsbsbsbsb").hide();
  $("#controls").hide();
 });
});
function boldIt(){
 var edit = document.getElementById("bsbsbsbsbsbsb").contentWindow;
  edit.focus();
  edit.document.execCommand("bold", false, "");
  edit.focus();
}
function ItalicIt(){
 var edit = document.getElementById("bsbsbsbsbsbsb").contentWindow;
 edit.focus();
 edit.document.execCommand("italic", false, "");
 edit.focus();
}
function changeFont(font){
 var edit = document.getElementById("bsbsbsbsbsbsb").contentWindow;
 edit.focus();
 edit.document.execCommand("FontName", false, font);
 edit.focus();
}
function url(url){
 var edit = document.getElementById("bsbsbsbsbsbsb").contentWindow;
 edit.focus();
 edit.document.execCommand("Createlink", false, url);
 edit.focus();
}
setInterval(function(){
 var gyt=$("#bsbsbsbsbsbsb").contents().find("body").html().match(/@/g);
 if($("#bsbsbsbsbsbsb").contents().find("body").html().match(/@/g)>=0){}else{
  $("#text").val($("#bsbsbsbsbsbsb").contents().find("body").html());
 }
 $("#text").val($("#bsbsbsbsbsbsb").contents().find("body").html());
},1000);

}
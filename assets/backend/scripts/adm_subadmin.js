var newentry=function(){$("#new_button").on("click",function(e){e.preventDefault(),$("#adminform").modal({keyboard:!1,backdrop:"static"})})},saveadmin=function(){$("#admin_form").on("submit",function(e){if(e.preventDefault(),!$("#admin_form").valid())return!1;var a=$("#admin_form").serialize();$.post(site_url+"Administrator/savesubadmin",a,function(e){$("#custom_heading").html("Server response"),$("#custom_message").html(e.message),$("#alertmodal").modal({backdrop:"static",keyboard:!1}),$("#subadmindismiss").click(),$("#admin_form")[0].reset()}),loadadmin()})},loadadmin=function(){$.post("Administrator/loadsubadmin",function(e){var a="";if(0===e.error){var i=e.admins;for(var r in i){var t=i[r],n="No",s="Yes",o="Unblock";1==t.active&&(n="Yes",o="Block"),1==t.superkey&&(s="No"),a+='<div class="col-md-4">',a+='<div class="box box-widget widget-user-2 " style="border:1px solid #ecf0f5">',a+='<div class="widget-user-header bg-blue-active">',a+='<div class="widget-user-image"><img class="img-circle" src="'+t.photo+'" alt="User Avatar"></div>',a+='<h3 class="widget-user-username">'+t.fullname+'</h3><h5 class="widget-user-desc">'+t.role+" section</h5>",a+="</div>",a+='<div class="box-footer no-padding">',a+='<ul class="nav nav-stacked">',a+='<li><a href="javascript:void(0);">Email ID<span class="pull-right ">'+t.emailid+" </span></a></li>",a+='<li><a href="javascript:void(0);">Mobile number<span class="pull-right ">+91 '+t.phoneno+"</span></a></li>",a+='<li><a href="javascript:void(0);">Account Active<span class="pull-right badge bg-blue-active">'+n+"</span></a></li>",a+='<li><a href="javascript:void(0);">Blocked (Session Temporary blocked)<span class="pull-right  badge bg-blue-active">'+s+"</span></a></li>",a+="</ul>",a+="</div>",a+='<div class="box-footer">',a+="last login "+t.logdate,a+='<div class="pull-right">',a+='<button type="button" class="btn btn-primary btn-xs" onclick="editadmin('+t.admid+')"><i class="fa fa-pencil"></i> Edit</button>',a+=' <button type="submit" class="btn btn-danger btn-xs" onclick="blockadmin('+t.admid+","+t.active+')"><i class="fa  fa-ban"></i> '+o+"</button>",a+="</div>",a+="</div>",a+="</div>",a+="</div>"}}else a+="Sorry no information found at server!...";$("#adminbody").html(a)})},editadmin=function(e){$.post(site_url+"Administrator/getadminbyid",{id:e},function(e){$("#upfullname").val(e.admins.fullname),$("#upusername").val(e.admins.username),$("#upphoneno").val(e.admins.phoneno),$("#upemailid").val(e.admins.emailid),$("#uprole").val(e.admins.role),$("#upid").val(e.admins.admid),$("#uppassword").attr("disabled","disabled"),$("#upadminform").modal({keyboard:!1,backdrop:"static"})}),$("#updateadmin_form").on("submit",function(e){if(e.preventDefault(),!$("#updateadmin_form").valid())return!1;var a=$("#updateadmin_form").serialize();$.post(site_url+"Administrator/updatesubadmin",a,function(e){console.log(e),$("#custom_heading").html("Server response"),$("#custom_message").html(e.message),$("#alertmodal").modal({backdrop:"static",keyboard:!1}),$("#cancelupdate").click(),$("#updateadmin_form")[0].reset()})}),loadadmin()},blockadmin=function(e,a){var i="1";1==a&&(i=0),$.post(site_url+"Administrator/changeactive",{id:e,value:i},function(e){console.log(e),loadadmin(),$("#fcustom_message").html(e.message),setTimeout(function(){$("#fcustom_message").html("")},2500)})};$(function(){$("#adminform").on("hidden.bs.modal",function(){$("#admin_form")[0].reset()}),$.validator.setDefaults({errorClass:"help-block",highlight:function(e){$(e).closest(".form-group").addClass("has-error")},unhighlight:function(e){$(e).closest(".form-group").removeClass("has-error")}}),$.validator.addMethod("pattern",function(e,a,i){return!!this.optional(a)||("string"==typeof i&&(i=new RegExp("^(?:"+i+")$")),i.test(e))},"Invalid input information."),$("#admin_form").validate({rules:{fullname:{required:!0,pattern:"[a-zA-Z ]{2,32}"},emailid:{required:!0,email:!0},phoneno:{required:!0,pattern:"[0-9]{10}"},role:{required:!0},password:{required:!0,pattern:"[a-zA-Z0-9#@$]{8,32}"},username:{required:!0,pattern:"[a-zA-Z0-9@#$]{8,32}"}},messages:{fullname:{required:"Please enter  the administrator  name.",pattern:"Please enter correct username"},role:{required:"Please choose   the administrator  role."},emailid:{required:"Please enter  the emailid .",pattern:"Please enter correct email id )"},phoneno:{required:"Please enter  the mobile no.",pattern:"Please enter correct mobile no"},username:{required:"Please enter  the user name(for login).",pattern:"Please enter correct user name (@#$ are allowed)"},password:{required:"Please enter  the password.",pattern:"Please enter correct password(@#$ are allowed)"}}})});
var validators;$(function(){function e(){var e=$(this),a=e.find(".modal-dialog");e.css("display","block"),a.css("margin-top",Math.max(0,($(window).height()-a.height())/2))}$.validator.setDefaults({errorClass:"help-block",highlight:function(e){$(e).closest(".form-group  ").addClass("has-error")},unhighlight:function(e){$(e).closest(".form-group ").removeClass("has-error")}}),$.validator.addMethod("pattern",function(e,a,o){return!!this.optional(a)||("string"==typeof o&&(o=new RegExp("^(?:"+o+")$")),o.test(e))},"Invalid input information."),login(),$(".modal").on("show.bs.modal",e),$(window).on("resize",function(){$(".modal:visible").each(e)})}),$(document).ajaxStart(function(e){$(e.target.activeElement).hasClass("btn")&&$(".overlay").removeClass("hidden")}),$(document).ajaxStop(function(e){$(e.target.activeElement).hasClass("btn")&&$(".overlay").addClass("hidden")});var login=function(){validators=$("#loginform").validate({rules:{emailid:{required:!0,email:!0},password:{required:!0,pattern:"[a-zA-Z0-9#@_!*%$&?]{8,32}"}},messages:{emailid:{required:"Please enter  the email id .",email:"Please enter correct emailid"},password:{required:"Please enter  the password.",pattern:"Please enter correct password"}}}),$("#loginform").on("submit",function(e){if(e.preventDefault(),!$("#loginform").valid())return!1;1==$("#remember").prop("checked")&&Cookies.set($("#username").val(),$("#password").val(),{expires:365});var a=$("#loginform").serialize();$.post("Institute/loginInstitute",a,function(e){"0"===e.iserror?window.location.href=e.url:($("#custom_message").html("Server Response : "+e.message),$("#myModal").modal({backdrop:"static",keyboard:!1}),$("#loginform")[0].reset(),$('input[type="checkbox"]').iCheck({checkboxClass:"icheckbox_square-blue",increaseArea:"20%"}))},"json")})};
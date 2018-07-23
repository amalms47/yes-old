var validators;$(function(){function e(){var e=$(this),r=e.find(".modal-dialog");e.css("display","block"),r.css("margin-top",Math.max(0,($(window).height()-r.height())/2))}$('input[type="checkbox"]').iCheck({checkboxClass:"icheckbox_square-blue",increaseArea:"20%"}),$('input[type="radio"]').iCheck({radioClass:"iradio_square-blue",increaseArea:"20%"}),loadform(1),loadlogo(),$.validator.setDefaults({errorClass:"help-block",highlight:function(e){$(e).closest(".form-group  ").addClass("has-error")},unhighlight:function(e){$(e).closest(".form-group ").removeClass("has-error")}}),$.validator.addMethod("pattern",function(e,r,a){return!!this.optional(r)||("string"==typeof a&&(a=new RegExp("^(?:"+a+")$")),a.test(e))},"Invalid input information."),login(),register(),sendMail(),$(".modal").on("show.bs.modal",e),$(window).on("resize",function(){$(".modal:visible").each(e)})}),$(document).ajaxStart(function(e){$(e.target.activeElement).hasClass("btn")&&$(".overlay").removeClass("hidden")}),$(document).ajaxStop(function(e){$(e.target.activeElement).hasClass("btn")&&$(".overlay").addClass("hidden")});var loadform=function(e){1===e&&($("#login_form").show(),$("#register_form").hide(),$("#password_form").hide()),2===e&&($("#register_form").show(),$("#login_form").hide(),$("#password_form").hide()),3===e&&($("#password_form").show(),$("#login_form").hide(),$("#register_form").hide())},sendMail=function(){validators=$("#passwordform").validate({rules:{emailid:{required:!0,email:!0}},messages:{emailid:{required:"Please enter  the email id .",email:"Please enter correct emailid"}}}),$("#passwordform").on("submit",function(e){if(e.preventDefault(),!$("#passwordform").valid())return!1;var r=$("input[name='option']:checked").val();$.post("Institute/resetInstitute",{emailid:$("#pusername").val(),option:r},function(e){$("#custom_message").html(e.message),$("#myModal").modal({backdrop:"static",keyboard:!1}),$("#passwordform")[0].reset(),$('input[type="radio"]').iCheck({radioClass:"iradio_square-blue",increaseArea:"20%"})})})},loadlogo=function(){$("#username").on("focusout",function(e){e.preventDefault();var r=Cookies.get($("#username").val());void 0!==r&&$("#password").val(r),""!=$("#username").val()&&$.post("Institute/getLogo",{emailid:$("#username").val()},function(e){$("#cover").attr("src",e.photo)},"json")}),$("#pusername").on("focusout",function(e){e.preventDefault(),$.post("Institute/getLogo",{emailid:$("#pusername").val()},function(e){$("#pcover").attr("src",e.photo)},"json")})},register=function(){validators=$("#registerform").validate({rules:{username:{required:!0,pattern:"[a-zA-Z_ ' ]{3,100}"},emailid:{required:!0,email:!0},contactno:{required:!0,pattern:"[0-9]{10,10}"},password:{required:!0,pattern:"(?=.*?[a-zA-Z])(?=.*?[0-9])(?=.*?[@#%$;])[a-zA-Z0-9@#%$;]{6,32}"},reppassword:{required:!0,equalTo:"#mypass"}},messages:{username:{required:"Please enter  the username ",pattern:"Please enter name correctly"},contactno:{required:"Please enter  mobileno",pattern:"Please enter 10 digit mobileno"},emailid:{required:"Please enter  the email id .",email:"Please enter correct emailid"},password:{required:"Please enter  the password.",pattern:"Must contain number,char,special char"},reppassword:{required:"Please enter  the confirm password.",equalTo:"Password doesnot match"}}}),$("#registerform").on("submit",function(e){if(e.preventDefault(),!$("#registerform").valid())return!1;if(!1===$("#terms").prop("checked"))return $("#term_error").html("Please agree to our Terms and Conditions"),!1;$("#term_error").html("");var r=$("#registerform").serialize();$.post("Institute/registerInstitute",r,function(e){$("#custom_message").html(e.message),$("#myModal").modal({backdrop:"static",keyboard:!1}),$("#registerform")[0].reset(),$('input[type="checkbox"]').iCheck({checkboxClass:"icheckbox_square-blue",increaseArea:"20%"})},"json")})},login=function(){validators=$("#loginform").validate({rules:{emailid:{required:!0,email:!0},password:{required:!0,pattern:"(?=.*?[a-zA-Z])(?=.*?[0-9])(?=.*?[@#%$;])[a-zA-Z0-9@#%$;]{6,16}"}},messages:{emailid:{required:"Please enter  the email id .",email:"Please enter correct emailid"},password:{required:"Please enter  the password.",pattern:"Password contain char,number special char"}}}),$("#login").click(function(e){if(e.preventDefault(),!$("#loginform").valid())return!1;1==$("#remember").prop("checked")&&Cookies.set($("#username").val(),$("#password").val(),{expires:365});var r=$("#loginform").serialize();$.post("Institute/loginInstitute",r,function(e){"0"===e.iserror?window.location.href=e.url:(console.log(e.message),$("#errormsg").html(e.message),$("#errormsg").css("color","red"))},"json")})};
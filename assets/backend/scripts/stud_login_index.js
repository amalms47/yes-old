$(function(){$.post(site_url+"Student/checkloginstatus",function(e){1==e.value&&($("#studentacc").html(e.name),$("#studentacc2").html(e.name),$("#studentacc").click(function(){window.location.href=site_url+"student-home"}),$("#studentacc2").click(function(){window.location.href=site_url+"student-home"}))}),studloaddata()});var studloaddata=function(){$("#studemailid").on("keyup",function(e){e.preventDefault();var r=Cookies.get($("#studemailid").val());void 0!==r&&$("#studpassword").val(r)})};$(function(){$.validator.setDefaults({highlight:function(e){$(e).closest(".form-group").addClass("has-error")},unhighlight:function(e){$(e).closest(".form-group").removeClass("has-error").addClass("has-success")}}),$("#studregform").validate({rules:{studfname:{required:!0},studregmobile:{required:!0,mobile_val:!0},studregemailid:{required:!0,email_val:!0},studregpass:{required:!0,minlength:6,maxlength:12,pass_val:!0},studregcpass:{required:!0,equalTo:"#studregpass"}},messages:{studfname:{required:"Please enter your name"},studregmobile:{required:"Please enter your mobile number",mobile_val:"Please enter 10 digit mobile number"},studregemailid:{required:"Please enter your emailid",email_val:"Please enter correct email id"},studregpass:{required:"Please enter a password",pass_val:"Only special characters allowed"},studregcpass:{required:"Confirm password is required",equalTo:"Password does not match"}}}),jQuery.validator.addMethod("email_val",function(e,r){return this.optional(r)||/^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(e)},"Enter a valid email"),jQuery.validator.addMethod("mobile_val",function(e,r){return this.optional(r)||/^\b[0-9]{10,10}\b$/i.test(e)},"Enter a valid email"),jQuery.validator.addMethod("pass_val",function(e,r){return this.optional(r)||/^(?=.*?[a-zA-Z0-9@#%$;])[a-zA-Z0-9@#%$;]{6,12}$/.test(e)},"Must have  6 charactors not morethan 12 charactors"),$("#studloginform").validate({rules:{studemailid:{required:!0,loginemail_val:!0},studpassword:{required:!0,loginpass_val:!0}},messages:{studemailid:{required:"Please enter your username",loginemail_val:"Please enter your email correctly"},studpassword:{required:"Please enter your password",loginpass_val:"Mininmum 6 charactors"}}}),jQuery.validator.addMethod("loginemail_val",function(e,r){return this.optional(r)||/^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(e)},"Enter a valid email"),jQuery.validator.addMethod("loginpass_val",function(e,r){return this.optional(r)||/^.{6,20}$/i.test(e)},"Enter a valid email"),$("#studpasswordform").validate({rules:{studforgotemailid:{required:!0,passemail_val:!0}},messages:{studforgotemailid:{required:"Please enter your username",passemail_val:"Please enter your userrname corectly"}}}),jQuery.validator.addMethod("passemail_val",function(e,r){return this.optional(r)||/^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(e)},"Enter a valid email")}),$("#studloginform").on("submit",function(e){if(e.preventDefault(),!$("#studloginform").valid())return!1;1==$("#studremember").prop("checked")&&Cookies.set($("#studemailid").val(),$("#studpassword").val(),{expires:365});var r=$("#studloginform").serialize();$.post(site_url+"student-authenticate",r,function(e){1==e.action?window.location.href=e.url:0==e.action?window.location.href=e.url:-1==e.action&&($("#errorlogin").css("color","red"),$("#errorlogin").html(e.message))})}),$("#studregform").on("submit",function(e){if(e.preventDefault(),!$("#studregform").valid())return!1;$("#studregbutton").attr("disabled","disabled"),$("#studregbutton").html("please wait");var r="";if($("#studterms").prop("checked")===!1)return r="please agree to our terms and conditions",$("#studterm_error").html(r),!1;$("#studterm_error").html("");var t=$("#studregemailid").val(),a=$("#studfname").val(),s=$("#studregmobile").val(),i=$("#studregcpass").val();$.post("student-register",{name:a,mobile:s,email:t,cpass:i},function(e){1==e.action?($("#errorloginreg").css("color","red"),$("#errorloginreg").html(e.message),$("#studregform")[0].reset()):($("#errorloginreg").css("color","green"),$("#errorloginreg").html(e.message),$("#studregform")[0].reset(),$("#studregbutton").attr("disabled",!1),$("#studregbutton").html("Register"))})});
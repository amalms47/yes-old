$(function(){$.validator.setDefaults({errorClass:"help-block",highlight:function(t){$(t).closest(".form-group  ").addClass("has-error")},unhighlight:function(t){$(t).closest(".form-group ").removeClass("has-error")}}),$.validator.addMethod("pattern",function(t,e,r){return!!this.optional(e)||("string"==typeof r&&(r=new RegExp("^(?:"+r+")$")),r.test(t))},"Invalid input information."),submitform1(),submitform2(),submitform3(),uploadAttach(),saveAttachment(),getstudentdata(),submitstudentdata()});var getstudentdata=function(){$.post(site_url+"Student/getstudentprofile",function(t){var e=t.content;for(var r in e){var a=e[r];$("#fname").val(a.firstname),$("#lname").val(a.lastname),$("#frname").val(a.fathername),$("#dob").val(a.dob),$("#email").val(a.email),$("#mobile").val(a.mobile),$("#religion").val(a.religion),$("#state2").val(a.state),$("#district2").val(a.district),$("#caste").val(a.caste),$("#country").val(a.nationality),$("#address").val(a.address),$("#address2").val(a.address2),$("#pincode").val(a.pincode),$("#city").val(a.city),$("#taddress").val(a.taddress),$("#taddress2").val(a.taddress2),$("#tcity").val(a.tcity),$("#tcountry").val(a.tnationality),$("#tpincode").val(a.tpincode),$("#districts").val(a.tdistrict),$("#states").val(a.tstate)}})},submitform1=function(){$.validator.setDefaults({highlight:function(t){$(t).closest(".form-group").addClass("has-error")},unhighlight:function(t){$(t).closest(".form-group").removeClass("has-error").addClass("has-success")}}),validators=$("#applicationform1").validate({rules:{fname:{required:!0},lname:{required:!0},frname:{required:!0},gender:{required:!0},mobile:{required:!0,pattern:"[0-9]{10,10}"},dob:{required:!0},religion:{required:!0},caste:{required:!0},country:{required:!0}}}),$("#applicationform1").on("submit",function(t){if(t.preventDefault(),!$("#applicationform1").valid())return!1;var e=$("#applicationform1").serializeArray();$.post(site_url+"Student/completeStudentProfile1",e,function(t){1==t.value?($("#formbutton1").css("background-color","green"),$("#formbutton1").html("SAVED"),setTimeout(function(){$("#contactstep").click()},1e3)):$("#form1msg").val(t.message)})})},submitform2=function(){$.validator.setDefaults({highlight:function(t){$(t).closest(".form-group").addClass("has-error")},unhighlight:function(t){$(t).closest(".form-group").removeClass("has-error").addClass("has-success")}}),validators=$("#applicationform2").validate({rules:{tpincode:{pattern:"[0-9]{3,10}"},pincode:{required:!0,pattern:"[0-9]{3,10}"},city:{required:!0},address:{required:!0},address2:{required:!0},state:{required:!0},district:{required:!0},country:{required:!0}},messages:{pincode:{pattern:"Only numbers allowed"},tpincode:{pattern:"Only numbers allowed"}}}),$("#applicationform2").on("submit",function(t){if(t.preventDefault(),!1===$("#terms").prop("checked"))return $("#term_error").html("Please agree to our terms and conditions"),!1;if($("#term_error").html(""),!$("#applicationform2").valid())return!1;var e=$("#applicationform2").serializeArray();$.post(site_url+"Student/completeStudentProfile2",e,function(t){1==t.value?($("#formbutton2").css("background-color","green"),$("#formbutton2").html("SAVED"),setTimeout(function(){$("#qualicationstep").click()},1e3)):$("#form2msg").val(t.message)})})},submitform3=function(){$.validator.setDefaults({highlight:function(t){$(t).closest(".form-group").addClass("has-error")},unhighlight:function(t){$(t).closest(".form-group").removeClass("has-error").addClass("has-success")}}),validators=$("#applicationform3").validate({rules:{qualname:{required:!0},qualuniversity:{required:!0},qualinstitution:{required:!0},qualyear:{required:!0},qualpercent:{required:!0}}}),$("#applicationform3").on("submit",function(t){if(t.preventDefault(),!$("#applicationform3").valid())return!1;var e=$("#applicationform3").serializeArray();$.post(site_url+"Student/completeStudentqual",e,function(t){$("#qualmsg").fadeOut(5e3),$("#qualmsg").html(t.message),$("#qualname").val(""),$("#qualuniversity").val(""),$("#qualpercent").val(""),$("#qualyear").val(""),$("#qualinstitution").val(""),$("#Appqualform").slideUp("fast")})})},uploadAttach=function(){$("#brchuretriger").on("click",function(){if($.validator.setDefaults({highlight:function(t){$(t).closest(".form-group").addClass("has-error")},unhighlight:function(t){$(t).closest(".form-group").removeClass("has-error").addClass("has-success")}}),validators=$("#brochureform").validate({rules:{attchname:{required:!0}}}),$("#brochureform").valid())t=1;else{return!1;var t}1==t&&$("#brofile").trigger("click")})},saveAttachment=function(){$("#brofile").change(function(t){t.preventDefault();var e=new FormData(document.getElementById("brochureform"),document.getElementById("attchname"));$.ajax({url:site_url+"Student/uploadAttach",type:"POST",data:e,processData:!1,contentType:!1,enctype:"multipart/form-data",success:function(t){$("#Attachmsg").html(t.message),0==t.error&&($("#Attachmsg").html(t.message),$("#Attachmsg").fadeOut(5e3))}})})},submitstudentdata=function(){$.post(site_url+"Student/getstudentprofile",function(t){var e=t.content;for(var r in e){var a=e[r];$("#subfname").html(a.firstname),$("#sublname").html(a.lastname),$("#subfrname").html(a.fathername),$("#subdob").html(a.dob),$("#submobile").html(a.mobile),$("#subgender").html(a.gender),$("#subreligion").html(a.religion),$("#subcaste").html(a.caste),$("#subcountry").html(a.nationality),$("#subaddress").html(a.address),$("#subtaddress").html(a.taddress),$("#subpincode").html(a.pincode),$("#subcity").html(a.city),$("#substate").html(a.state),$("#subdistrict").html(a.district)}})};
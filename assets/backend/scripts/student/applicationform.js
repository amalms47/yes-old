$(function(){$.validator.setDefaults({errorClass:"help-block",highlight:function(t){$(t).closest(".form-group  ").addClass("has-error")},unhighlight:function(t){$(t).closest(".form-group ").removeClass("has-error")}}),$.validator.addMethod("pattern",function(t,e,r){return!!this.optional(e)||("string"==typeof r&&(r=new RegExp("^(?:"+r+")$")),r.test(t))},"Invalid input information."),submitform(),getstudentdata(),checkprofile(),submitQualform()});var checkprofile=function(){$.post(site_url+"Student/isProfilecomplete",function(t){t.error})},getstudentdata=function(){$.post(site_url+"Student/getstudentprofile",function(t){var e=t.content;for(var r in e){var a=e[r];$("#fname").val(a.firstname),$("#lname").val(a.lastname),$("#frname").val(a.fathername),$("#dob").val(a.dob),$("#email").val(a.email),$("#mobile").val(a.mobile),$("#religion").val(a.religion),$("#state2").val(a.state),$("#district2").val(a.district),$("#caste").val(a.caste),$("#country").val(a.nationality),$("#address").val(a.address),$("#address2").val(a.address2),$("#pincode").val(a.pincode),$("#city").val(a.city),$("#taddress").val(a.taddress),$("#taddress2").val(a.taddress2),$("#tcity").val(a.tcity),$("#tcountry").val(a.tnationality),$("#tpincode").val(a.tpincode),$("#districts").val(a.tdistrict),$("#states").val(a.tstate)}})},submitform=function(){$.validator.setDefaults({highlight:function(t){$(t).closest(".form-group").addClass("has-error")},unhighlight:function(t){$(t).closest(".form-group").removeClass("has-error").addClass("has-success")}}),validators=$("#applicationform").validate({rules:{fname:{required:!0},lname:{required:!0},frname:{required:!0},gender:{required:!0},city:{required:!0},pincode:{required:!0},dob:{required:!0},mobile:{required:!0,pattern:"[0-9]{10,10}"},address:{required:!0},address2:{required:!0},religion:{required:!0},caste:{required:!0},country:{required:!0},state2:{required:!0},district2:{required:!0}}}),$("#applicationform").on("submit",function(t){if(t.preventDefault(),!$("#applicationform").valid())return!1;var e=$("#applicationform").serializeArray();$.post(site_url+"Student/completeStudentProfile",e,function(t){$("#savingmsg").html("success"),$("#qualifications").show(),$("#buttons").hide()})})},submitQualform=function(){$("#addmore1").click(function(){$("#qualform2").toggle()}),$("#addmore2").click(function(){$("#qualform3").toggle()}),$("#addmore3").click(function(){$("#qualform4").toggle()}),$.validator.setDefaults({highlight:function(t){$(t).closest(".form-group").addClass("has-error")},unhighlight:function(t){$(t).closest(".form-group").removeClass("has-error").addClass("has-success")}}),$("#applicationQualform").on("submit",function(t){if(t.preventDefault(),!1===$("#terms").prop("checked"))return $("#term_error").html("Please agree to our terms and conditions"),!1;$("#term_error").html("");var e=$("#applicationQualform").serializeArray();$.post(site_url+"Student/completeStudentqual",e,function(t){$("#custom_message").html(t.message),$("#myModal").modal({backdrop:"static",keyboard:!1})})})};
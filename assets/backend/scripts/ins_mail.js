$(function(){$("#searchcollegemail").on("keyup",function(){getcollegemail(1)}),getcollegemail(1),collegetostudentmail()});var getcollegemail=function(e){var l=$("#searchcollegemail").val();$.post(site_url+"Institute/getcollegemail",{page:e,search:l},function(e){var l=0;if(0===e.iserror){var a="",i=e.value;for(var t in i){l++;var o=i[t];0==o.isiview?a+='<tr style="background-color:lightgray">':1==o.isiview&&(a+="<tr>"),a+="<td>"+l+"</td>",a+='<td class="mailbox-subject"><b>'+o.collegename+"</b>",a+='<td class="mailbox-name"><a href="javascript:void(0)" onclick="mailreadpage('+o.id+')">'+o.collegeemail+"</a></td>",a+='<td class="mailbox-subject"><b>'+o.subject+"</b>",a+="</td>",a+="</td>",a+='<td class="mailbox-subject">'+o.message+"</td>",a+='<td class="mailbox-date">'+o.date+"</td>",a+="</tr>"}var s="",m=e.page_count;console.log(e),s+='<ul class="pagination pagination-sm  pull-right" style="margin:0px;"><li><a  href="javascript:void(0);" onclick="getcollegemail(1)">«</a></li>';for(var c=1;c<=m;c++)s+='<li><a href="javascript:void(0);" onclick="getcollegemail('+c+')">'+c+"</a></li>";s+='<li><a href="javascript:void(0);"  onclick="getcollegemail('+m+')">»</a></li>',$("#mailpage").html(s),$("#allmailbox").html(a)}else 1===e.iserror&&$("#allmailbox").html("No information found on server")}),$("#mailrefresh").click(function(){getcollegemail(1)})},mailreadpage=function(e){$.post(site_url+"Institute/getmailcontent",{id:e},function(e){if(0===e.iserror){var l=e.value;for(var a in l){var i=l[a];$("#collegemailname").html(i.collegename),$("#frommail").html(i.collegeemail),$("#maildate").html(i.date),$("#mailsubject").html(i.subject),$("#mailcontent").html(i.message)}}}).done(function(){getcollegemail(1),checknewmail()}),$("#collegeform").modal({keyboard:!1,backdrop:"static"})},collegetostudentmail=function(){$.validator.setDefaults({highlight:function(e){$(e).closest(".form-group").addClass("has-error")},unhighlight:function(e){$(e).closest(".form-group").removeClass("has-error").addClass("has-success")}}),$("#mailboxcustom").validate({rules:{mailto:{required:!0},mailsubject:{required:!0},composeemail:{required:!0}},messages:{mailto:{required:"Please enter reciepient emailid."},mailsubject:{required:"Please provide any subject"},composeemail:{required:"Please type your message"}}}),$("#mailboxcustom").on("submit",function(e){if(e.preventDefault(),!$("#mailboxcustom").valid())return!1;$("#instmailbutton").html("sending"),$("#instmailbutton").prop("disabled",!0);var l=$("#mailto").val(),a=$("#mailsubject").val(),i=$("#composeemail").val();$("#mailsubject").val();$.post(site_url+"Institute/collegetostudentmail",{to:l,mailsubject:a,message:i},function(e){$("#instmailbutton").html("Send"),$("#instmailbutton").prop("disabled",!1),$("#mailto").val(""),$("#mailsubject").val(""),$("#mailsubject").val(""),$("#composeemail").val(""),$("#custom_message").html(e.message),$("#myModal").modal({backdrop:"static",keyboard:!1})})})};
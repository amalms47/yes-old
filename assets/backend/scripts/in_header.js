$(function(){countrequest(),countvisitors(),iscompleteprofile(),countUnread(),checknewmail()}).ajaxStart(function(){Pace.restart()});var iscompleteprofile=function(){$.post(site_url+"Institute/isprofilecomplete",function(t){content="",1==t.error?(content+='<a href="javascript:void(0);" onclick=completeprofile()>',content+='<i class="fa fa-institution"></i>',content+='<span class="label label-danger" style="margin-right: 23px;">Profile not completed</span>',content+="</a>"):console.log("Profile completed"),$("#profileerrror").html(content)})},countUnread=function(){$.post(site_url+"Institute/countUnread",function(t){if(content="",1==t.value){content+='<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">',content+='<i class="fa fa-envelope-o" title="Unread requests"></i>',content+='<span class="label label-success">new request</span>',content+="</a>",content+='<ul class="dropdown-menu">',content+="<li>",content+='<ul style="background-color: #44474c" class="menu">',content+="<li>";var n=t.datavalue;for(var e in n){var o=n[e];content+='<a href="javascript:void(0);" onclick="enquiryread();">',content+='<a href="javascript:void(0);" onclick="enquiryread();">',content+='<div class="pull-left">',content+='<img src="'+o.photo+'" class="img-circle" alt="User Image">',content+="</div>",content+='<h4 style="color:#fff">',content+=o.firstname+"&nbsp;"+o.lastname,content+='<small><i class="fa fa-clock-o"></i>&nbsp;'+o.mdate+"</small>",content+="</h4>",content+="<p>"+o.coursename+"</p>",content+="</a>"}content+="</li>",content+="</ul>",content+="</li>",content+='<li class="footer"><a href="javascript:void(0);"  style=" background-color: #aaafb7;" onclick="enquiryread();">View All Requests</a></li>',content+="</ul>"}$("#unreadrequests").html(content)})},checknewmail=function(){$.post(site_url+"Institute/isnewmail",function(t){content="",1==t.value&&(content+='<a href="javascript:void(0);" onclick=checkmail()>',content+='<i class="fa fa-envelope-square"></i>',content+='<span class="label label-danger" style="margin-right:23px;">'+t.count+"</span>",content+="</a>"),$("#newmail").html(content)})},checkmail=function(){window.location.href=site_url+"institution-mailbox"},enquiryread=function(){window.location.href=site_url+"student-enquiry"},completeprofile=function(){window.location.href=site_url+"institution-profile"},countrequest=function(){},countvisitors=function(){};
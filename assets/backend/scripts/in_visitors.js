$(function(){getvisitors(1)});var getvisitors=function(t){$.post(site_url+"Institute/getvisitors",{page:t},function(t){$("#visitorscount").html(t.count);var e="",a=1;if(1!=t.iserror){var s=t.value;for(var r in s){var o=s[r];e+="<tr>",e+="<td>"+a+"</td>",a++,e+="<td>"+o.firstname+"&nbsp;"+o.lastname+"</td>",e+="<td>"+o.email+"</td>",e+="<td>"+o.mobile+"</td>",e+="<td>"+o.regdate+"</td>",e+='<td><button class="btn-flat btn-success" onclick="qualification('+o.student+')">Qualifications</button></td>',e+='<td><button class="btn-flat bg-gray" onclick="attachments('+o.student+')">Attachments</button></td>',e+='<td><button class="btn-flat bg-blue" onclick="viewprofile('+o.student+')">View Profile</button></td>',e+="</tr>",$("#visitors").html(e)}var i="",n=t.page_count;i+=' <ul class="pagination pagination-sm  pull-right" style="margin:0px;"><li><a  href="javascript:void(0);" onclick="getvisitors(1)">«</a></li>';for(a=1;a<=n;a++)i+=' <li><a  href="javascript:void(0);" onclick="getvisitors('+a+')">'+a+"</a></li>";i+='<li><a href="javascript:void(0);"  onclick="getvisitors('+n+')">»</a></li>',$("#notcollegepage").html(i)}else 1==t.error&&(e+=t.message,$("#visitors").html(e))})},qualification=function(t){$.post(site_url+"Institute/getQual",{student:t},function(t){var e="";if(console.log(t),"0"===t.iserror){e+='<table class="table table-bordered">',e+="<tbody><tr>",e+='<th style="width: 10px">#</th>',e+="<th>Course Name</th>",e+="<th>University/Board Name</th>",e+="<th>College Name</th>",e+="<th>Year of Passout</th>",e+='<th style="width: 40px">Percentage</th>',e+="</tr>";var a=t.quals,s=1;for(var r in a)e+="<tr>",e+="  <td>"+s+"</td>",s+=1,e+="  <td>"+(r=a[r]).coursetitle+"</td>",e+="  <td>"+r.courseuniversity+"</td>",e+="  <td>"+r.collegename+"</td>",e+="  <td>"+r.coursepassdate+"</td>",e+='  <td><span class="badge bg-green">'+r.coursemarks+"</span></td>",e+="  </tr>";e+=" </tbody></table>"}else e=t.message;$("#qualbody").html(e)}).done(function(){$("#qualModal").modal({backdrop:"static",keyboard:!1})})},attachments=function(t){$.post(site_url+"Institute/getAttachments",{student:t},function(t){var e="";if("0"==t.error){e+='<table class="table table-bordered">',e+="<tbody><tr>",e+='<th style="width:10px">#</th>',e+="<th>Attachment for</th>",e+="<th>Updated on</th>",e+='<th style="width: 40px">View</th>',e+="</tr>";var a=t.contents,s=1;for(var r in a){var o=a[r];e+="<tr>",e+="  <td>"+s+"</td>",s+=1,e+="  <td>"+o.name+"</td>",e+="  <td>"+o.date+"</td>",e+='  <td><a target="_blank"  href="'+o.attachment+'"><span class="badge bg-green">View</span></a></td>',e+="  </tr>"}e+=" </tbody></table>"}else e=t.message;$("#attachbody").html(e)}).done(function(){$("#attachModal").modal({backdrop:"static",keyboard:!1})})},viewprofile=function(t){$.post(site_url+"Institute/getstudentPro",{sid:t},function(t){if(0==t.iserror){var e=t.value;for(var a in e){var s=e[a];$("#proimage").attr("src",s.photo),$("#proname").html(s.firstname+"&nbsp;"+s.lastname),$("#proaddress").html(s.address+"&nbsp;"+s.address2),$("#protaddress").html(s.taddress+"&nbsp;"+s.taddress2),$("#proplace").html(s.city+"&nbsp;"+s.district+"&nbsp;"+s.state),$("#profather").html(s.fathername),$("#promobile").html(s.mobile),$("#progender").html(s.gender),$("#prodob").html(s.dob),$("#pronationality").html(s.nationality),$("#promobile").html(s.mobile)}}}).done(function(){$("#studProfile").modal({backdrop:"static",keyboard:!1})})};
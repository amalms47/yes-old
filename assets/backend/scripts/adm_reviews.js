$(function(){getreviews(1)});var getreviews=function(t){$.post(site_url+"Administrator/reviewlist",{page:t},function(t){var e="";if($("#reviewcount").html(t.count),0==t.error){var s=t.reviews;for(var o in s){var l=s[o],a="blocked";"1"===l.active&&(a="Active"),e+='<div class="panel box">',e+='<div class="box-header with-border">',e+='<h4 class="box-title">',e+='<a data-toggle="collapse" style="color: #373b42" data-parent="#accordion" href="#collapse'+l.rid+'" aria-expanded="false" class="collapsed">',e+=l.student,e+="</a>",e+="</h4>",e+='<div class="pull-right">',e+='&nbsp;&nbsp;<button type="button"  class="btn btn-xs bg-gray">'+a+"</button>",e+='&nbsp;&nbsp;<button type="button"  class="btn btn-xs btn-success" >'+l.stars+"/5</button>","1"===l.active&&(e+='&nbsp;&nbsp;<button type="button"  class="btn btn-xs btn-danger" onclick="blockreview('+l.rid+","+l.active+');">Block</button></div>'),"0"===l.active&&(e+='&nbsp;&nbsp;<button type="button"  class="btn btn-xs btn-success" onclick="blockreview('+l.rid+","+l.active+');">Unblock</button></div>'),e+="</div>",e+='<div id="collapse'+l.rid+'" class="panel-collapse collapse" aria-expanded="false" style="height:0px;">',e+='<div class="box-body">',e+='<div class="row">',e+='<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">  ',e+='<div class="col-xs-12  col-sm-12 col-md-12 col-lg-4 table-responsive">',e+='<table class="table table-striped">',e+="<tbody>",e+="<tr><th>Student name</th><td>"+l.student+"</td></tr>",e+="<tr><th>College name</th><td>"+l.title+"</td></tr>",e+="<tr><th>content</th><td>"+l.content+"</td></tr>",e+="<tr><th>Added on</th><td>"+l.date+"</td></tr>",e+="<tr><th>Stars</th><td>"+l.stars+"/5 </td></tr>",e+="</tbody>",e+="</table>",e+="</div>",e+="</div>",e+="</div>",e+="</div>",e+="</div>",e+="</div>"}var i="",n=t.page_count;i+=' <li><a  onclick="getreviews(1)">«</a></li>';for(var c=1;c<=n;c++)i+='<li><a href="javascript:void(0)" onclick="getreviews('+c+')">'+c+"</a></li>";i+='<li><a  onclick="getreviews('+n+')">»</a></li>',$("#course_page").html(i)}else e+="<h2>Sorry no reviews found</h2>",$("#course_page").html("");$("#accordion").html(e)},"json")},blockreview=function(t,e){var s=1;1==e&&(s=0),$.post(site_url+"Administrator/updatereviesadmin",{id:t,option:s},function(){getreviews(1)})};
$(function () {
    getreviews(1);

});

var getreviews=function (page) {


    $.post(site_url+"Institute/adminclgreviews",{"page":page},function(data)
    {


        var content='';
        if(data.error==0)
        {
            var courses=data.reviews;
            for (var course in courses)
            {
                var mycourse=courses[course];
                var isblocked='blocked'; if(mycourse.active==="1") isblocked='Active';
                content+='<div class="panel box">';
                content+='<div class="box-header with-border">';
                content+='<h4 class="box-title">';
                content+='<a data-toggle="collapse" style="color: #373b42" data-parent="#accordion" href="#collapse'+mycourse.rid+'" aria-expanded="false" class="collapsed">';
                content+=mycourse.student;
                content+='</a>';
                content+='</h4>';

                content+='<div class="pull-right">';


                content+='&nbsp;&nbsp;<button type="button"  class="btn btn-xs btn-success" >'+mycourse.stars+'/5</button>';

                content+='</div>';
                content+='<div id="collapse'+mycourse.rid+'" class="panel-collapse collapse" aria-expanded="false" style="height:0px;">';
                content+='<div class="box-body">';
                content+='<div class="row">';
                content+='<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">  ';
                content+='<div class="col-xs-12  col-sm-12 col-md-12 col-lg-4 table-responsive">';
                content+='<table class="table table-striped">';
                content+='<tbody>';
                content+='<tr><th>Student name</th><td>'+mycourse.student+'</td></tr>';
                content+='<tr><th>content</th><td>'+mycourse.content+'</td></tr>';
                content+='<tr><th>Added on</th><td>'+mycourse.date+'</td></tr>';
                content+='<tr><th>Stars</th><td>'+mycourse.stars+'/5 </td></tr>';
                content+='<tr><th>Status</th><td>'+isblocked+'</td></tr>';

                content+='</tbody>';
                content+='</table>';
                content+='</div>';
                content+='</div>';
                content+='</div>';
                content+='</div>';
                content+='</div>';
                content+='</div>';
            }
            var page_cotent='';var page_count=data.page_count;
            page_cotent+=' <li><a  onclick="getreviews(1)">«</a></li>';
            for(var i =1;i<=page_count;i++){page_cotent+='<li><a onclick="getreviews('+i+')">'+i+'</a></li>';}
            page_cotent+='<li><a  onclick="getreviews('+page_count+')">»</a></li>';
            $('#course_page').html(page_cotent);

        }
        else
        {
            content+='<h2>Sorry no reviews found</h2>';
            $('#course_page').html('');
        }
        $("#accordion").html(content);
    },'json');
};



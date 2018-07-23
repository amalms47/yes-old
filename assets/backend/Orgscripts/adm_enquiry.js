$(function(){
    $('input[type="radio"].category').iCheck({radioClass: 'iradio_flat-blue'});
    $('input[type="radio"].choice').iCheck({radioClass: 'iradio_flat-blue'});
    getenquiry();
    $("#search").on("keyup",function(){getenquiry();});

});


var getenquiry=function(page_no)
{
    var page=1;
    var search=$("#search").val();
    if(page_no!==undefined&&page_no!=null&&page_no!=""){    page=page_no;    }
    $.post(site_url+'Administrator/getEnquiry',{'search':search,'page':page},function(data)
    {
        console.log(data);
        //console.log(data);
        var content='';
        if(data.iserror==0)
        {

            var enquirys=data.enquirys;
            for (var enquiry in enquirys)
            {

                var myenq=enquirys[enquiry];
                var isblocked='NB'; if(myenq.isblocked==="1") ischecked='B';

                content+=' <div class="col-md-4" >';
                content+='<div class="box box-widget widget-user-2" >';
                content+='<div class="widget-user-header " style="background-color: #2b2e33">';
                content+=' <div class="widget-user-image">';
                content+=' <img class="img-circle" src="'+myenq.photo+'" alt="User Avatar">';
                content+=' </div>';
                content+='<h3 class="widget-user-username" style="color: white">'+myenq.firstname+'&nbsp;'+myenq.lastname+'</h3>';
                content+=' <h6 class="widget-user-desc" style="color: white">'+myenq.title+'</h5>';


                content+='</div>';
                content+='<div class="box-footer no-padding">';
                content+=' <ul class="nav nav-stacked">';
                content+='  <li><a href="#">Course <span class="pull-right ">'+myenq.coursename+'</span></a></li>';
                content+='  <li><a href="#">Email ID <span class="pull-right ">'+myenq.email+'</span></a></li>';
                content+=' <li><a href="#">Mobileno<span class="pull-right ">'+myenq.mobile+'</span></a></li>';
                content+=' <li><a href="#">Requested Date<span class="pull-right badge bg-gray">'+myenq.mdate+'</span></a></li>';
                content+=' <li><a href="#">College Seen<span class="pull-right badge bg-gray">'+myenq.rdate+'</span></a></li>';
                content+='</ul>';
                content+='</div>';
                content+='<div class="box-footer">';
                content+='<div class="pull-right">';
                content+='<button type="button" class="btn bg-gray btn-xs" title="view student details" onclick="attachments('+myenq.student+')"><i class="fa fa-paperclip"></i>&nbsp;Attachments</button>&nbsp;';

                content+='<button type="button" class="btn bg-gray btn-xs" title="view student details" onclick="qualification('+myenq.student+')"><i class="fa fa-graduation-cap"></i> Qualification</button>&nbsp;';
                if(myenq.isaview==0) content+='<button type="button" class="btn btn-danger btn-xs" title="unread messages"  onclick="showmessage('+myenq.id+')"><i class="fa fa-comment"></i> View messages</button>&nbsp;';


                else{content+='<button type="button" class="btn btn-gray btn-xs" title="view messages"  onclick="showmessage('+myenq.id+');"><i class="fa fa-comment"></i>View details</button>&nbsp;';}


                content+='</div>';
                content+='</div>';

                content+='</div>';
                content+=' </div>';
            }
            $("#enquirybody").html(content);
            var page_cotent='';var page_count=data.page_count;


            if(page>1)
                page_cotent+=' <ul class="pagination pagination-sm  pull-right" style="margin:0px;"><li><a  href="javascript:void(0);" onclick="getenquiry('+(page-1)+')">«&nbsp;Prev</a></li>';
            if(page<page_count)
                page_cotent+=' <ul class="pagination pagination-sm  pull-right" style="margin:0px;"><li><a  href="javascript:void(0);" onclick="getenquiry('+(page+1)+')">Next&nbsp;»</a></li>';

            $('#enquirypage').html(page_cotent);
        }
        else
        {
            content='<div class="alert alert-danger alert-dismissible">';
            content+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
            content+='<h4><i class="icon fa fa-ban"></i> Alert!</h4>';
            content+='<h5>No information found at server!</h5>';
            content+='</div>';
            $("#enquirybody").html(content);
            $('#enquirypage').html('');
        }

        isnewRequests();

    });



};



var attachments=function(student)
{

    $.post(site_url+"Institute/getAttachments",{'student':student},function(data){
        var content='';

        if(data.error=="0")
        {
            content+='<table class="table table-bordered">';
            content+='<tbody><tr>';

            content+='<th style="width:10px">#</th>';
            content+='<th>Attachment for</th>';
            content+='<th>Updated on</th>';
            content+='<th style="width: 40px">View</th>';
            content+='</tr>';
            var quals=data.contents;
            var i=1;
            for (var qual in quals)
            {
                var attach=quals[qual];

                content+='<tr>';
                content+='  <td>'+i+'</td>';i=i+1;
                content+='  <td>'+attach.name+'</td>';
                content+='  <td>'+attach.date+'</td>';

                content+='  <td><a target="_blank"  href="'+attach.attachment+'"><span class="badge bg-green">View</span></a></td>';

                content+='  </tr>';



            }
            content+=' </tbody></table>';

        }
        else{
            content=data.message;
        }
        $("#attachbody").html(content);

    }).done(function(){$('#attachModal').modal({backdrop: 'static', keyboard: false}); });
    //
};

var qualification=function(student)
{

    $.post(site_url+"Administrator/getQual",{'student':student},function(data){
        var content='';
        console.log(data);
        if(data.iserror==="0")
        {
            content+='<table class="table table-bordered">';
            content+='<tbody><tr>';
            content+='<th style="width: 10px">#</th>';
            content+='<th>Course Name</th>';
            content+='<th>University/Board Name</th>';
            content+='<th>College Name</th>';
            content+='<th>Year of Passout</th>';
            content+='<th style="width: 40px">Percentage</th>';
            content+='</tr>';
            var quals=data.quals;
            var i=1;
            for (var qual in quals)
            {
                var qual=quals[qual];

                content+='<tr>';
                content+='<td>'+i+'</td>';i=i+1;
                content+='<td>'+qual.coursetitle+'</td>';
                content+='<td>'+qual.courseuniversity+'</td>';
                content+='<td>'+qual.collegename+'</td>';
                content+='<td>'+qual.coursepassdate+'</td>';
                content+='<td><span class="badge bg-green">'+qual.coursemarks+'</span></td>';
                content+='</tr>';

            }
            content+=' </tbody></table>';

        }
        else{
            content=data.message;
        }
        $("#qualbody").html(content);

    }).done(function(){$('#qualModal').modal({backdrop: 'static', keyboard: false}); });
    //
};


var showmessage=function(id)
{

    $.post(site_url+"Administrator/getEnquiryMsg",{'id':id},function(data)
    {

        console.log(data);
        var content=data.enquiry;
        for(var contents in content){
            var datas=content[contents];

            $("#smessage").html( datas.message);
            var reply=datas.reply;
            if(reply==null){$("#replymsg").html('college not replied');}
            else{$("#replymsg").html(reply);
        }

        }
    }).done(function(){$('#msgModal').modal({backdrop: 'static', keyboard: false}); });

    getenquiry(1);
};

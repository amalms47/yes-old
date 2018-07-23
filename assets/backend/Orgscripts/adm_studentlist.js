$(function(){
    $('input[type="radio"].category').iCheck({radioClass: 'iradio_flat-blue'});
    $('input[type="radio"].choice').iCheck({radioClass: 'iradio_flat-blue'});
    getstudentlist(1);
    $("#search").on("keyup",function(){getstudentlist();});

    $('.choice').on('ifChecked ', function() {getstudentlist();});

});


var getstudentlist=function(page_no)
{
    var my_page=1;
    var search=$("#search").val();
    var option=$("input[name='option']:checked").val();
    if(page_no!==undefined&&page_no!=null&&page_no!=""){    my_page=page_no;    }

    $.post(site_url+'Administrator/getStudentlist',{'option':option,'search':search,'page':my_page},function(data)
    {

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
                content+=' <h6 class="widget-user-desc" style="color: white">'+myenq.state+',&nbsp;'+myenq.city+'</h5>';

                content+='</div>';
                content+='<div class="box-footer no-padding">';
                content+=' <ul class="nav nav-stacked">';
                content+=' <li><a href="#">Gender <span class="pull-right ">'+myenq.gender+'</span></a></li>';
                content+=' <li><a href="#">Date of birth <span class="pull-right ">'+myenq.dob+'</span></a></li>';
                content+=' <li><a href="#">Email ID <span class="pull-right ">'+myenq.email+'</span></a></li>';
                content+=' <li><a href="#">Mobileno<span class="pull-right ">'+myenq.mobile+'</span></a></li>';
                content+=' <li><a href="#">Registered Date<span class="pull-right badge bg-gray">'+myenq.date+'</span></a></li>';
                content+='</ul>';
                content+='</div>';
                content+='<div class="box-footer">';
                content+='<div class="pull-right">';
                content+='<button type="button" class="btn bg-gray btn-xs" title="view student details" onclick="qualification('+myenq.studid+')"><i class="fa fa-graduation-cap"></i> Qualification</button>&nbsp;';
                if(myenq.isblocked==0)content+='<button type="button" class="btn bg-red  btn-xs" title="unread messages"  onclick="Blockstudent('+myenq.studid+')"><i class="fa fa-lock"></i>&nbsp;Block</button>&nbsp;';
                if(myenq.isblocked==1)content+='<button type="button" class="btn bg-green  btn-xs" title="unread messages"  onclick="Unblockstudent('+myenq.studid+')"><i class="fa fa-unlock-alt"></i>&nbsp;Unblock</button>&nbsp;';

                content+='</div>';
                content+='</div>';

                content+='</div>';
                content+=' </div>';
            }
            $("#studentlist").html(content);
            var page_cotent='';var page_count=data.page_count;
            if(my_page>1)
                page_cotent+=' <ul class="pagination pagination-sm  pull-right" style="margin:0px;"><li><a  href="javascript:void(0);" onclick="getstudentlist('+(my_page-1)+')">«&nbsp;Prev</a></li>';
            if(my_page<page_count)
                page_cotent+=' <ul class="pagination pagination-sm  pull-right" style="margin:0px;"><li><a  href="javascript:void(0);" onclick="getstudentlist('+(my_page+1)+')">Next&nbsp;»</a></li>';

            $('#collegepage').html(page_cotent);
        }
        else
        {

            content+='<h5>No information found at server!</h5>';

            $("#studentlist").html(content);
            $('#collegepage').html('');
        }

    });

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
                content+='  <td>'+i+'</td>';i=i+1;
                content+='  <td>'+qual.coursetitle+'</td>';
                content+='  <td>'+qual.courseuniversity+'</td>';
                content+='  <td>'+qual.collegename+'</td>';
                content+='  <td>'+qual.coursepassdate+'</td>';
                content+='  <td><span class="badge bg-green">'+qual.coursemarks+'</span></td>';
                content+='  </tr>';

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
var showmessage=function(student)
{
    $.post(site_url+"Administrator/getEnqMsg",{'student':student},function(data)
    {
        $("#smessage").html( data.enquiry.message);
        $("#replymsg").html( data.enquiry.reply);
    }).done(function(){$('#msgModal').modal({backdrop: 'static', keyboard: false}); });

};

var Blockstudent=function(student){
    $.post(site_url+"Administrator/Blockstudent",{student:student },function (data) {

        getstudentlist(1);
        $('#ccustom_message').html(data.message);
        setTimeout( function(){$('#ccustom_message').html('');} , 2500);
    });
}

var Unblockstudent=function(student){
    $.post(site_url+"Administrator/Unblockstudent",{student:student },function (data) {

        getstudentlist(1);
        $('#ccustom_message').html(data.message);
        setTimeout( function(){$('#ccustom_message').html('');} , 2500);
    });
}


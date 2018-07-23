$(function(){
$('input[type="radio"].category').iCheck({radioClass: 'iradio_flat-blue'});
$('input[type="radio"].choice').iCheck({radioClass: 'iradio_flat-blue'});
getenquiry();
$("#search").on("keyup",function(){getenquiry();});
 saveReply();

});


var getenquiry=function(page_no)
{


var page=1;
var search=$("#search").val();

if(page_no!==undefined&&page_no!=null&&page_no!=""){    page=page_no;    }  
  $.post(site_url+'Institute/getEnquiry',{'search':search,'page':page},function(data)
  {



      console.log(data);

     var content='';
    if(data.iserror==0)
    {

        var enquirys=data.enquirys;
        for (var enquiry in enquirys)
        {


            var myenq=enquirys[enquiry];



            var isblocked='NB'; if(myenq.isblocked==="1") ischecked='B';
             content+='<div class="col-md-4" >';
             content+='<div class="box box-widget widget-user-2" >';
            content+='<div class="widget-user-header " style="background-color: #2b2e33">';
             content+='<div class="widget-user-image">';
               content+='<img class="img-circle" src="'+myenq.photo+'" alt="User Avatar">';
             content+='</div>';
              content+='<h3 class="widget-user-username" style="color: white">'+myenq.firstname+'&nbsp;'+myenq.lastname+'</h3>';
             content+='<h5 class="widget-user-desc" style="color: white">'+myenq.coursename+'</h5>';
            
            content+='</div>';
            content+='<div class="box-footer no-padding">';
             content+=' <ul class="nav nav-stacked">';
               content+=' <li><a href="#">Gender<span class="pull-right ">'+myenq.gender+'</span></a></li>';
                content+=' <li><a href="#">Date Of Birth <span class="pull-right ">'+myenq.dob+'</span></a></li>';
              content+='  <li><a href="#">Email ID <span class="pull-right ">'+myenq.email+'</span></a></li>';
               content+=' <li><a href="#">Mobileno<span class="pull-right ">'+myenq.mobile+'</span></a></li>';
                content+=' <li><a href="#">Requested Date<span class="pull-right badge bg-gray">'+myenq.mdate+'</span></a></li>';
              content+='</ul>';
            content+='</div>';
            content+='<div class="box-footer">';
                    content+='<div class="pull-right">';
            content+='<button type="button" class="btn bg-gray btn-xs" title="view student details" onclick="attachments('+myenq.student+')"><i class="fa fa-paperclip"></i>&nbsp;Attachments</button>&nbsp;';

            content+='<button type="button" class="btn bg-gray btn-xs" title="view student details" onclick="qualification('+myenq.student+')"><i class="fa fa-graduation-cap"></i> Qualification</button>&nbsp;';
                   if(myenq.isiview==0) content+='<button type="button" class="btn btn-danger btn-xs" title="view messages"  onclick="showmessage('+myenq.id+')"><i class="fa fa-comment"></i> Message/Replay</button>&nbsp;';


            else{content+='<button type="button" class="btn btn-gray btn-xs" title="view messages"  onclick="showmessage('+myenq.id+')"><i class="fa fa-comment"></i> Message/Replay</button>&nbsp;';}



            content+='</div>';
                           content+='</div>';
                    
          content+='</div>';
       content+=' </div>';
        }
        $("#enquirybody").html(content);
        var page_cotent='';var page_count=data.page_count;
        page_cotent+=' <li><a  onclick="getenquiry(1)">«</a></li>';
        for(var i =1;i<=page_count;i++){page_cotent+='<li><a onclick="getenquiry('+i+')">'+i+'</a></li>';}
        page_cotent+='<li><a  onclick="getenquiry('+page_count+')">»</a></li>';
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
    
 });  

};

var qualification=function(student)
{
    $.post("Institute/getQual",{'student':student},function(data){
  var content='';

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


var showmessage=function(id)
{

      $.post("Institute/getEnqMsg",{'student':id},function(data)
      {
         $("#smessage").html( data.enquiry.message);
         $("#saveReply").val(data.enquiry.id);
         $("#replymsg").val(data.enquiry.reply);
      }).done(function(){$('#msgModal').modal({backdrop: 'static', keyboard: false}); });

};
var saveReply=function()
{

    $("#saveReply").on("click",function(event){

        event.preventDefault();
      var enquiry=$("#saveReply").val();
      var rmessage=$("#replymsg").val();

        if(rmessage!="")
        {
            var msg="";
            $.post(site_url+"Institute/saveReply",{"id":enquiry,"reply":rmessage},function(data){
                $("#enquirydismiss").click();
                msg=data.message;

            }).done(function(){$("#custom_message").html(msg);$('#myModal').modal({backdrop: 'static', keyboard: false});});
        }
    });
};


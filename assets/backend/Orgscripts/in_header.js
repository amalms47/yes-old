$(function()
{
    countrequest();
    countvisitors();
    iscompleteprofile();
    countUnread();
    checknewmail();
}).ajaxStart(function() { Pace.restart(); });


var iscompleteprofile= function () {

    $.post(site_url+'Institute/isprofilecomplete',function(data){


        content="";
        if(data.error==1){
            content+='<a href="javascript:void(0);" onclick=completeprofile()>';
            content+='<i class="fa fa-institution"></i>';
            content+='<span class="label label-danger" style="margin-right: 23px;">Profile not completed</span>';
            content+='</a>';
        }
        else{
            console.log("Profile completed");
        }
        $("#profileerrror").html(content);


    });
};

var countUnread=function(){

    $.post(site_url+"Institute/countUnread",function(data){
        content="";
        if(data.value==1){

                content += '<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">';
                content += '<i class="fa fa-envelope-o" title="Unread requests"></i>';
                content += '<span class="label label-success">new request</span>';
                content += '</a>';

                content += '<ul class="dropdown-menu">';

                content += '<li>';
                content += '<ul style="background-color: #44474c" class="menu">';
                content += '<li>';


                var datavalue=data.datavalue;
            for( var datas in datavalue) {

                var mydata=datavalue[datas];


                content += '<a href="javascript:void(0);" onclick="enquiryread();">';
                content += '<a href="javascript:void(0);" onclick="enquiryread();">';
                content += '<div class="pull-left">';
                content += '<img src="'+mydata.photo+'" class="img-circle" alt="User Image">';
                content += '</div>';
                content += '<h4 style="color:#fff">';
                content +=  mydata.firstname+'&nbsp;'+mydata.lastname;
                content += '<small><i class="fa fa-clock-o"></i>&nbsp;'+mydata.mdate+'</small>';
                content += '</h4>';
                content += '<p>'+mydata.coursename+'</p>';
                content += '</a>';
            }
                content += '</li>';
                content += '</ul>';
                content += '</li>';
                content += '<li class="footer"><a href="javascript:void(0);"  style=" background-color: #aaafb7;" onclick="enquiryread();">View All Requests</a></li>';
                content += '</ul>';

        }

        $("#unreadrequests").html(content);
    })
};


var checknewmail=function()
{

    $.post(site_url+'Institute/isnewmail',function(data){

        content="";
        if(data.value==1){
            content+='<a href="javascript:void(0);" onclick=checkmail()>';
            content+='<i class="fa fa-envelope-square"></i>';
            content+='<span class="label label-danger" style="margin-right:23px;">'+data.count+'</span>';
            content+='</a>';
        }

        $("#newmail").html(content);


    });
};

var checkmail=function () {
    window.location.href=site_url+"institution-mailbox";
}

var enquiryread=function(){
    window.location.href=site_url+"student-enquiry";
};
var completeprofile=function(){
    window.location.href=site_url+"institution-profile";
};

var countrequest=function()
{

};

var countvisitors=function()
{

};
$(function()
{ 
    
    getcover();
    countcourse();
    countrequest();
    countvisitors();
    countreviews();


}).ajaxStart(function() { Pace.restart(); });


var getcover=function()
{

$.post('Institute/getInstitute',{'data':['cover']},function(mydata){
   var cover=(mydata.data.cover);
 if(cover!=="none.jpg"&&cover!=="none.png")
 {
 $('#cover').css({"background":"url('"+cover+"') center center no-repeat "});
     $('#cover').css({"background-size":"cover"});
 }
},'json');
};


var countcourse=function()
{
    $.post(site_url+"Institute/countcourse",function (data) {
        $("#coursecount").html(data.count);
    });
};

var countrequest=function()
{
    $.post(site_url+"Institute/countrequest",function (data) {
        $("#enquirycount").html(data.count);
    });
};

var countvisitors=function()
{

    $.post(site_url+"Institute/countvisitors",function (data) {
        $("#visitorscount").html(data.count);
    });
};

var countreviews=function()
{

    $.post(site_url+"Institute/countreviews",function (data) {
        $("#reviewcount").html(data.count);
    });
};
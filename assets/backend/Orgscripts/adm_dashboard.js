$(function(){

   getCollegegrid();
    getStudentgrid();
    countcolleges();
    countcourses();
    countinactive();
    countstudents();
    blockedstudents();
    countfeatured();
    countvisitorss();
    countrequest();
    clgcategory();
    coursecategory();

}).ajaxStart(function() { Pace.restart(); });

var getCollegegrid=function(){

    $.post(site_url+"Administrator/getCollegegrid",function(data){

        var collegedata="";
        var content=data.content;
        for(var college in content){
            var mydata=content[college];

            collegedata+='<li><img src="'+mydata.logo+'" alt="User Image"><a class="users-list-name" href="javascript:void(0)">'+mydata.shortname+'</a><span class="users-list-date">'+mydata.regdate+'</span></li>';

        }

        $("#collegegridlist").html(collegedata);
    });
};



var getStudentgrid=function(){

    $.post(site_url+"Administrator/getStudentgrid",function(data){

        var studentdata="";
        var content=data.content;
        for(var student in content){
            var mydata=content[student];

            studentdata+='<li><img src="'+mydata.photo+'" alt="User Image"><a class="users-list-name" href="javascript:void(0)">'+mydata.firstname+'&nbsp;'+mydata.lastname+'</a><span class="users-list-date">'+mydata.date+'</span></li>';

        }

        $("#studentgridlist").html(studentdata);
    });
};

var countcolleges=function () {
$.post(site_url+"Administrator/admincountcolleges",function (data) {

    $("#clgcound").html(data.count);
});
};


var countstudents=function () {

    $.post(site_url+"Administrator/admincountstudents",function (data) {

        $("#studcount").html(data.count);
    });
};


var countcourses=function () {

    $.post(site_url+"Administrator/admincoursecount",function (data) {

        $("#coursecount").html(data.count);
    });
};


var countinactive=function () {

    $.post(site_url+"Administrator/admincountinactive",function (data) {

        $("#inactcound").html(data.count);
    });
};


var blockedstudents=function () {

    $.post(site_url+"Administrator/admincountinactivestudents",function (data) {

        $("#blockedstud").html(data.count);
    });
};


var countfeatured=function () {

    $.post(site_url+"Administrator/countfeatured",function (data) {

        $("#featuredcount").html(data.count);
    });
};


var countvisitorss=function () {

    $.post(site_url+"Administrator/countvisitors",function (data) {

        $("#viscount").html(data.count);
    });
};

var countrequest=function () {

    $.post(site_url+"Administrator/countreq",function (data) {

        $("#enqcount").html(data.count);
    });
};

var clgcategory=function () {

    $.post(site_url+"Administrator/countclgcat",function (data) {

        $("#clgcat").html(data.count);
    });
};


var coursecategory=function () {

    $.post(site_url+"Administrator/countcoursecat",function (data) {

        $("#coursecat").html(data.count);
    });
};
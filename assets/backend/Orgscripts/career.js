$(function () {


    $.validator.setDefaults({errorClass: 'help-block',highlight: function(element){ $(element).closest('.form-group  ').addClass('has-error'); },unhighlight: function(element){ $(element).closest('.form-group ').removeClass('has-error');  }});
    $.validator.addMethod( "pattern", function( value, element, param ) { if ( this.optional( element ) ) { return true; } if ( typeof param === "string" ) { param = new RegExp( "^(?:" + param + ")$" );  } return param.test( value ); }, "Invalid input information." );

    $("#new_course").click(function(){$("#new_course_panel").slideToggle();});
    $('#skills').wysihtml5({toolbar: {
        "font-styles": false, // Font styling, e.g. h1, h2, etc.
        "emphasis": false, // Italics, bold, etc.
        "lists": true, // (Un)ordered lists, e.g. Bullets, Numbers.
        "html": false, // Button which allows you to edit the generated HTML.
        "link": false, // Button to insert a link.
        "image": false, // Button to insert an image.
        "color": false, // Button to change color of font
        "blockquote": false // Blockquote
    }});

    $('#good').wysihtml5({toolbar: {
        "font-styles": false, // Font styling, e.g. h1, h2, etc.
        "emphasis": false, // Italics, bold, etc.
        "lists": true, // (Un)ordered lists, e.g. Bullets, Numbers.
        "html": false, // Button which allows you to edit the generated HTML.
        "link": false, // Button to insert a link.
        "image": false, // Button to insert an image.
        "color": false, // Button to change color of font
        "blockquote": false // Blockquote
    }});

    $('#bad').wysihtml5({toolbar: {
        "font-styles": false, // Font styling, e.g. h1, h2, etc.
        "emphasis": false, // Italics, bold, etc.
        "lists": true, // (Un)ordered lists, e.g. Bullets, Numbers.
        "html": false, // Button which allows you to edit the generated HTML.
        "link": false, // Button to insert a link.
        "image": false, // Button to insert an image.
        "color": false, // Button to change color of font
        "blockquote": false // Blockquote
    }});


    savecourse();
    loadcontents(1);
}).ajaxStart(function() { Pace.restart(); });



var savecourse=function () {

    $("#careerform").validate({
        ignore: ":hidden:not(textarea)",
        rules: {
            category: {required: true,pattern:"[a-zA-Z ]{3,100}"},
            name: {required: true,pattern:"[a-zA-Z ]{3,100}"},
            skills: {required: true},
            salpercent: {required: true},
            content: {required: true},
            good: {required: true},
            howto: {required: true},
            minsal: {required: true},
            avgsal: {required: true},
            maxsal: {required: true},
            bad: {required: true}
        },
        messages: {
            category: {required: "Please enter heading" ,pattern:'Do not use special charactors atleast 3 charactors'},

            name: {required: "Please enter career name.",pattern:'Do not use special charactors atleast 3 charactors'}
        }
    });


    $("#careerform").on("submit", function (event) {


        event.preventDefault();
        if (!$("#careerform").valid()) {
            return false;
        }


        if ($("#reg").val() === "Register") {

            var mydatas=$("#careerform").serialize();
            $.post(site_url+"Administrator/createcareer",mydatas,function (data) {

                $("#custom_message").html(data.message);
                $('#alertmodal').modal({backdrop: 'static', keyboard: false});
                $("#careerform")[0].reset();
                $("#new_course_panel").slideToggle();
                $("#reg").val("Register");
                $("#reg").attr("selid", -1);


            }).done(function () {
                loadcontents(1);
            });
        }
       /* else if ($("#reg").val() === "Update") {
            var mydata = $("#careerform").serializeArray();
            mydata.push({name: "id", value: $("#reg").attr("selid")});
            $.post(site_url+"Administrator/updatecareercontent", mydata, function (data) {
                $("#custom_message").html(data.message);
                $('#alertmodal').modal({backdrop: 'static', keyboard: false});
            }).done(function () {
                loadcontents(1);
                location.reload(true);
            });
            $("#careerform")[0].reset();
            $("#new_course_panel").slideToggle();
            $("#save").val("New");
            $("#save").attr("selid", -1);
            $('iframe').contents().find('.wysihtml5-editor').html('');
        }*/

    });

};
var loadcontents=function(page_no)
{

    var page=1;
    if(page_no!==undefined){    page=page_no;  }
    $.post(site_url+"Administrator/getcareer",{"page":page},function(data)
    {


        var content='';
        if(data.iserror==0)
        {
            var courses=data.courses;
            for (var course in courses)
            {
                var mycourse=courses[course];
                var stat="Active";
                if(mycourse.active==0)stat="Blocked";

                var status="Block";
                if(mycourse.active==0)status="Unblock";

                var pic="Edit photo";
                if(mycourse.image=='none.png')status="Add photo";
                content+='<div class="panel box">';
                content+='<div class="box-header with-border">';
                content+='<h4 class="box-title">';
                content+='<a data-toggle="collapse" style="color: #373b42" data-parent="#accordion" href="#collapse'+mycourse.id+'" aria-expanded="false" class="collapsed">';
                content+=mycourse.name;
                content+='</a>';
                content+='</h4>';
                content+='<div class="pull-right">';
                content+='&nbsp;&nbsp;<button type="button"  class="btn btn-xs">'+stat+'</button>';
                content+='&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" id="logotrigers"  data-toggle="tooltip" data-placement="top" title="Min 800 * 400 width and height"  class="btn btn-xs btn-success" onclick="editpic('+mycourse.id+')">'+pic+'</button>';
               // content+='&nbsp;&nbsp;&nbsp;&nbsp;<button type="button"  class="btn btn-xs btn-warning" onclick="edit('+mycourse.id+')">Edit</button>';

                content+='&nbsp;&nbsp;&nbsp;&nbsp;<button type="button"  class="btn btn-xs btn-info" onclick="block('+mycourse.id+','+mycourse.active+')">'+status+'</button>';
                content+='&nbsp;&nbsp;&nbsp;&nbsp;<button type="button"  class="btn btn-xs btn-danger" onclick="deletecareer('+mycourse.id+')">Delete</button></div>';

                content+='</div>';
                content+='<div id="collapse'+mycourse.id+'" class="panel-collapse collapse" aria-expanded="false" style="height:0px;">';
                content+='<div class="box-body">';
                content+='<div class="row">';
                content+='<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">  ';
                content+='<div class="col-xs-12  col-sm-12 col-md-12 col-lg-4 table-responsive">';
                content+='<table class="table table-striped">';
                content+='<tbody>';

                content+=' <div  class=" col-sm-8">';
                content+='<img src="'+mycourse.photo+'" width="100px" height="100px" style="padding-top:5px;" id="clogo">';
                content+=' <h3 class="widget-user-username" id="username"></h3>';
                content+='<h5 class="widget-user-desc" id="subtitle"></h5>';
                content+='</div>';



                content+='<tr><th>Category</th><td>'+mycourse.category+'</td></tr>';
                content+='<tr><th>Min Salary</th><td>'+mycourse.minsal+'</td></tr>';
                content+='<tr><th>Avg Salary</th><td>'+mycourse.avgsal+'</td></tr>';
                content+='<tr><th>Max Salary</th><td>'+mycourse.maxsal+'</td></tr>';
                content+='<tr><th>Job pressure</th><td>'+mycourse.salpercent+'</td></tr>';
                content+='<tr><th>Followers count</th><td>'+mycourse.followers+'</td></tr>';
                content+='<tr><th>Academic pressure</th><td>'+mycourse.acdpressure+'</td></tr>';
                content+='<tr><th>Job pressure</th><td>'+mycourse.jobpressure+'</td></tr>';




                content+='</tbody>';
                content+='</table>';
                content+='</div>';
                content+='<div class="col-xs-12  col-sm-12 col-md-12 col-lg-8 invoice-col text-justify">';
                content+='<h5><b>Skills</b></h5>';
                content+=mycourse.skills+'</div>';
                content+='<div class="col-xs-12  col-sm-12 col-md-12 col-lg-8 invoice-col text-justify">';
                content+='<h5><b>content</b></h5>';
                content+=mycourse.content+'</div>';
                content+='<div class="col-xs-12  col-sm-12 col-md-12 col-lg-8 invoice-col text-justify">';
                content+='<h5><b>How to</b></h5>';
                content+=mycourse.howto+'</div>';
                content+='<div class="col-xs-12  col-sm-12 col-md-12 col-lg-8 invoice-col text-justify">';
                content+='<h5><b>Good about career</b><h5>';
                content+=mycourse.good+'</div>';
                content+='<h5><b>Bad about career</b><h5>';
                content+=mycourse.bad+'</div>';
                content+='</div>';
                content+='</div>';
                content+='</div>';
                content+='</div>';
                content+='</div>';
            }
            var page_cotent='';
            var page_count=data.page_count;
            page_cotent+=' <li><a href="javascript:void(0)" onclick="loadcontents(1)">«</a></li>';
            for(var i =1;i<=page_count;i++){page_cotent+='<li><a href="javascript:void(0)" onclick="loadcontents('+i+')">'+i+'</a></li>';}
            page_cotent+='<li><a href="javascript:void(0)" onclick="loadcontents('+page_count+')">»</a></li>';
            $('#course_page').html(page_cotent);

        }
        else
        {
            content+='<h2>Sorry No uploaded course found at server</h2>';
            $('#course_page').html('');
        }
        $("#accordion").html(content);
    },'json');

};

var block=function (id,option) {
    var flag=0;
    if(option==0)flag=1;
    $.post(site_url+"Administrator/blockcareer",{id:id,flag:flag},function (data) {
        loadcontents(1);

    });
};



/*
var edit=function(id)
{

    $.post(site_url+"Administrator/getCareercontentById",{"id":id},function(data){


        $("#name").val(data.courses.name);
        $("#content").val(data.courses.content);

       // $("#good").val(data.courses.good);
        //$("#bad").val(data.courses.bad);
        $("#category").val(data.courses.category);
        $("#howto").val(data.courses.howto);
        $("#salpercent").val(data.courses.salpercent);
        $("#minsal").val(data.courses.minsal);
        $("#avgsal").val(data.courses.avgsal);
        $("#maxsal").val(data.courses.maxsal);
        $("#acdpressure").val(data.courses.acdpressure);
        $("#jobpressure").val(data.courses.jobpressure);

        $('iframe').contents().find('.wysihtml5-editor').html(data.courses.skills);
        $('iframe').contents().find('#good').html(data.courses.good);
        $('iframe').contents().find('.wysihtml5-editor').html(data.courses.bad);

        $("#reg").val("Update"); $("#reg").attr("selid",id);
        if ($('#new_course_panel').is(':visible')===false)$("#new_course_panel").slideToggle();
    },'json');
};

*/


var editpic=function (id) {

    $("#carimage").val(id);
    $('#upimage').trigger('click');


    $("#upimage").change(function (event) {
        event.preventDefault();
        var formdata = new FormData(document.getElementById("coverform2"));
        $.ajax({
            url: 'Administrator/uploadCareerpic',
            type: 'POST',
            data: formdata,
            processData: false,
            contentType: false,
            enctype: 'multipart/form-data',
            success: function (data) {


                $("#custom_message").html(data.message);
                $('#alertmodal').modal({backdrop: 'static', keyboard: false});
                $('#alertmodal').on('click', function () {
                    location.reload(true);
                });

            }
        });
    });

};

var deletecareer=function (id) {

    var c=confirm('Are you sure');
    if(c==true) {
        $.post(site_url + "Administrator/deletecareer", {dd: id}, function (data) {
            $("#custom_message").html(data.message);
            $('#alertmodal').modal({backdrop: 'static', keyboard: false});
            loadcontents(1);
        });
    }

};

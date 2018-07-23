$(function () {



    $.validator.setDefaults({errorClass: 'help-block',highlight: function(element){ $(element).closest('.form-group  ').addClass('has-error'); },unhighlight: function(element){ $(element).closest('.form-group ').removeClass('has-error');  }});
    $.validator.addMethod( "pattern", function( value, element, param ) { if ( this.optional( element ) ) { return true; } if ( typeof param === "string" ) { param = new RegExp( "^(?:" + param + ")$" );  } return param.test( value ); }, "Invalid input information." );

    $("#new_course").click(function(){$("#new_course_panel").slideToggle();});
    $('#eligibility').wysihtml5({toolbar: {
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

    $("#courseform").validate({
        ignore: ":hidden:not(textarea)",
        rules: {
            catname: {required: true,pattern:"[a-zA-Z ]{3,100}"},
            name: {required: true,pattern:"[a-zA-Z ]{3,100}"},
            future: {required: true},
            content: {required: true},
            eligibility: {required: true},
            scope: {required: true}
        },
        messages: {
            catname: {required: "Please enter heading",pattern:'Do not use special charactors atleast 3 charactors'},

            name: {required: "Please enter heading",pattern:'Do not use special charactors atleast 3 charactors'}
        }
    });


    $("#courseform").on("submit", function (event) {


        event.preventDefault();
        if (!$("#courseform").valid()) {
            return false;
        }


        if ($("#reg").val() === "Register") {

            var mydatas=$("#courseform").serialize();
          $.post(site_url+"Administrator/createcoursecontent",mydatas,function (data) {

                    $("#custom_message").html(data.message);
                    $('#alertmodal').modal({backdrop: 'static', keyboard: false});
                    $("#courseform")[0].reset();
                    $("#new_course_panel").slideToggle();
                    $("#reg").val("Register");
                    $("#reg").attr("selid", -1);


            }).done(function () {
                loadcontents(1);
            });
        }
        else if ($("#reg").val() === "Update") {
            var mydata = $("#courseform").serializeArray();
            mydata.push({name: "id", value: $("#reg").attr("selid")});
            $.post(site_url+"Administrator/updatecoursecontent", mydata, function (data) {
                $("#custom_message").html(data.message);
                $('#alertmodal').modal({backdrop: 'static', keyboard: false});
            }).done(function () {
                loadcontents(1);
                location.reload(true);
            });
            $("#courseform")[0].reset();
            $("#new_course_panel").slideToggle();
            $("#save").val("New");
            $("#save").attr("selid", -1);
            $('input#pic').prop('disabled', false);
            $('iframe').contents().find('.wysihtml5-editor').html('');
        }

    });

};
    var loadcontents=function(page_no)
        {

            var page=1;
            if(page_no!==undefined){    page=page_no;  }
            $.post(site_url+"Administrator/getCourseByPage",{"page":page},function(data)
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
                        content+='&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" id="logotrigers"  class="btn btn-xs btn-success" onclick="editpic('+mycourse.id+')">'+pic+'</button>';
                        content+='&nbsp;&nbsp;&nbsp;&nbsp;<button type="button"  class="btn btn-xs btn-warning" onclick="edit('+mycourse.id+')">Edit</button>';

                        content+='&nbsp;&nbsp;&nbsp;&nbsp;<button type="button"  class="btn btn-xs btn-info" onclick="block('+mycourse.id+','+mycourse.active+')">'+status+'</button>';
                        content+='&nbsp;&nbsp;&nbsp;&nbsp;<button type="button"  class="btn btn-xs btn-danger" onclick="deletecourse('+mycourse.id+')">Delete</button></div>';

                        content+='</div>';
                        content+='<div id="collapse'+mycourse.id+'" class="panel-collapse collapse" aria-expanded="false" style="height:0px;">';
                        content+='<div class="box-body">';
                        content+='<div class="row">';
                        content+='<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">  ';
                        content+='<div class="col-xs-12  col-sm-12 col-md-12 col-lg-4 table-responsive">';
                        content+='<table class="table table-striped">';
                        content+='<tbody>';

                        content+=' <div  class=" col-sm-8">';
                        content+='<img src="'+mycourse.image+'" width="100px" height="100px" style="padding-top:5px;" id="clogo">';
                        content+=' <h3 class="widget-user-username" id="username"></h3>';
                        content+='<h5 class="widget-user-desc" id="subtitle"></h5>';
                        content+='</div>';



                        content+='<tr><th>Category</th><td>'+mycourse.catname+'</td></tr>';




                        content+='</tbody>';
                        content+='</table>';
                        content+='</div>';
                        content+='<div class="col-xs-12  col-sm-12 col-md-12 col-lg-8 invoice-col text-justify">';
                        content+='<h5><b>Eligibility Criteria</b></h5>';
                        content+=mycourse.eligibility+'</div>';
                        content+='<div class="col-xs-12  col-sm-12 col-md-12 col-lg-8 invoice-col text-justify">';
                        content+='<h5><b>Scope</b></h5>';
                        content+=mycourse.scope+'</div>';
                        content+='<div class="col-xs-12  col-sm-12 col-md-12 col-lg-8 invoice-col text-justify">';
                        content+='<h5><b>Future of the course</b></h5>';
                        content+=mycourse.future+'</div>';
                        content+='<div class="col-xs-12  col-sm-12 col-md-12 col-lg-8 invoice-col text-justify">';
                        content+='<h5><b>Content Details</b><h5>';
                        content+=mycourse.content+'</div>';
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
    $.post(site_url+"Administrator/blockcoursecontent",{id:id,flag:flag},function (data) {
    loadcontents(1);

    });
};



var edit=function(id)
{

    $.post(site_url+"Administrator/getCoursecontentById",{"id":id},function(data){


        $("#name").val(data.courses.name);
        $("#scope").val(data.courses.scope);
        $("#future").val(data.courses.future);
        $("#content").val(data.courses.content);
        $("#catname").val(data.courses.catname);
        $("#totalseats").val(data.courses.totalseats);

        $('iframe').contents().find('.wysihtml5-editor').html(data.courses.eligibility);
        $("#reg").val("Update"); $("#reg").attr("selid",id);
        if ($('#new_course_panel').is(':visible')===false)$("#new_course_panel").slideToggle();
    },'json');
};


var editpic=function (id) {

    $("#hidid").val(id);
    $('#upimage').trigger('click');


    $("#upimage").change(function (event) {
        event.preventDefault();
        var formdata = new FormData(document.getElementById("coverform2"));
        $.ajax({
            url: 'Administrator/uploadCoursepic',
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

var deletecourse=function (id) {

    var c=confirm('Are you sure');
    if(c==true) {
        $.post(site_url + "Administrator/deletecoursepost", {dd: id}, function (data) {
            $("#custom_message").html(data.message);
            $('#alertmodal').modal({backdrop: 'static', keyboard: false});
            loadcontents(1);
        });
    }

};


$(function()
{
iscatexists();
$("#new_course").click(function(){$("#new_course_panel").slideToggle();});
$("#cancel").click(function(){var validator = $( "#courseform" ).validate();validator.resetForm();$("#new_course_panel").slideToggle(); $("#reg").val("Register"); $("#reg").attr("selid",-1);});   
$.validator.setDefaults({errorClass: 'help-block',highlight: function(element){ $(element).closest('.form-group  ').addClass('has-error'); },unhighlight: function(element){ $(element).closest('.form-group ').removeClass('has-error');  }});
$.validator.addMethod( "pattern", function( value, element, param ) { if ( this.optional( element ) ) { return true; } if ( typeof param === "string" ) { param = new RegExp( "^(?:" + param + ")$" );  } return param.test( value ); }, "Invalid input information." );



    $("#newcatform").validate({
        rules:{newcatname:{required:true}},
        messages:{newcatname:{ required:"Please enter the course name ." } }
    });

    $("#newcourseform").validate({
        rules:{catselname:{required:true},newcoursename:{required:true,pattern:"[a-zA-Z .]{1,100}"},newcoursesname:{required:true,pattern:"[a-zA-Z .]{1,100}"}},
        messages:{name:{ required:"Please enter  the course name" },category:{ required:"Select the course category" }  }
    });


   
    
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
    loadselectcategory();
  loadcategory();
  loadlevel();
  loadcourse();
    newcourse();
  savecourse();
  /*searchcourse();*/
  newcategory();

  $("#category").change(function () {
      var cat=$("#category").val();
     loadcourses(cat);
  });

  $("#addnewcourse").click(function () {
      loadselectcategory();
  });





}).ajaxStart(function() { Pace.restart(); });



var iscatexists=function () {

    $("#newcatname").keyup(function () {

        var search = $("#newcatname").val();

            $.post(site_url + "Institute/isCategoryexist", {"data": search}, function (data) {


                if (data.error == 0) {
                    var titles = data.content;
                    var sug = titles.map(function (mytitle) {
                        return mytitle.categoryname;
                    });
                }
                else {

                    sug = "no colleges found";
                }
                $("#newcatname").autocomplete({source: sug});

            });

});
};



var loadcategory=function()
{


 return $.post(site_url+'Institute/getCourseCategory',function(data)
 {
 var content='';

 if(data.iserror==="0")
 {
     var content='<option value="'+""+'">SELECT CATEGORY</option>';
var categorys=data.category;
for (var category in categorys){
    var mycategory=categorys[category];
    content+='<option value="'+mycategory.id+'" >'+mycategory.categoryname+'</option>';

    }
}
 $("#category").html(content);
},'json');
};



var loadselectcategory=function()
{

    return $.post(site_url+'Institute/getCourseCategory',function(data)
    {
        var content='';

        if(data.iserror==="0")
        {
            var content='<option value="'+""+'">SELECT CATEGORY</option>';
            var categorys=data.category;
            for (var category in categorys){
                var mycategory=categorys[category];
                content+='<option value="'+mycategory.id+'" >'+mycategory.categoryname+'</option>';

            }
        }
        $("#catselname").html(content);
    },'json');
};

var loadcourses=function(category)
{

    return $.post(site_url+'Institute/getCoursesbycategory',{cat:category},function(data)
    {

        var content='<option value="'+""+'">SELECT COURSE</option>';

        if(data.iserror==="0")
        {
            var categorys=data.courses;
            for (var category in categorys){
                var mycategory=categorys[category];
                content+='<option value="'+mycategory.cid+'" >'+mycategory.name+'</option>';

            }
        }
        $("#name").html(content);
    },'json');
};

var loadlevel=function()
{
 return $.post('Institute/getCourseLevel',function(data)
 {
 var content='<option value="'+""+'">SELECT COURSE LEVEL</option>';    
 if(data.iserror==="0")
 {
var levels=data.levels;
for (var level in levels){    var mylevel=levels[level];     content+='<option value="'+mylevel.level+'" >'+mylevel.level+'</option>';        } 
}
 $("#level").html(content);
},'json');
};




var savecourse=function()
{
$("#courseform").validate({ ignore: ":hidden:not(textarea)",  
rules:{name:{required:true},type:{required:true}},



messages:{name:{ required:"Please enter course name."},type:{ required:"Please select course type"}}
});

$("#courseform").on("submit",function(event)
{
event.preventDefault();
if(!$("#courseform").valid()){return false;}
if($("#reg").val()==="Register")
{
var data=$("#courseform").serialize();


$.post(site_url+"Institute/createCourse",data,function(data){

    $("#custom_message").html(data.message);$('#myModal').modal({backdrop: 'static', keyboard: false});
}).done(function(){
        loadcourse(1);
    });
}
else if($("#reg").val()==="Update")
{
var mydata=$("#courseform").serializeArray();
mydata.push({name:"couid",value:$("#reg").attr("selid")});


$.post(site_url+"Institute/saveCourse",mydata,function(data){$("#custom_message").html(data.message);$('#myModal').modal({backdrop: 'static', keyboard: false}); }).done(function(){loadcourse(1); });
$("#reg").val("Register");$("#reg").attr("selid","-1");
}
$("#courseform")[0].reset();         $("#new_course_panel").slideToggle();
 });
};

var loadcourse=function(page_no)
{

var page=1;
var course_term="";
var course=$('#course_term').val();
if(course!==undefined&&course!==""){course_term=course;}
if(page_no!==undefined){    page=page_no;  }
 $.post(site_url+"Institute/getCourseByPage",{"course":course_term,"page":page},function(data)
{


var content='';
if(data.iserror==0)
{
var courses=data.courses;
for (var course in courses)
{
var mycourse=courses[course];
var ischecked=''; if(mycourse.isavailable==="1") ischecked='checked';
content+='<div class="panel box">';
content+='<div class="box-header with-border">';
content+='<h4 class="box-title">';
content+='<a data-toggle="collapse" style="color: #373b42" data-parent="#accordion" href="#collapse'+mycourse.couid+'" aria-expanded="false" class="collapsed">';
content+=mycourse.name;
content+='</a>';
content+='</h4>';


if(mycourse.feesstructure!=null){var feedata='updated';}

else { feedata="Upload fee structure";}

content+='<div class="pull-right"><label><input type="checkbox" class="minimal"  value="'+mycourse.couid+'" name="isavailable" id="isavailable"  '+ischecked+'> Is Seat Available </label>&nbsp;';
    content+='&nbsp;&nbsp;<button type="button"  class="btn btn-xs bg-gray-active" onclick="getseat('+mycourse.couid+')"><i class="fa fa-graduation-cap"></i> Seat status</button>';
content+='&nbsp;&nbsp;<button type="button"  class="btn btn-xs btn-primary" id="feestr" onclick="uploadfeestructure('+mycourse.couid+');"><i class="fa fa-cloud-upload"></i>&nbsp;'+feedata+'</button>';
content+='&nbsp;&nbsp;<button type="button"  class="btn btn-xs btn-warning" onclick="getcourse('+mycourse.couid+')"><i class="fa fa-pencil"></i> Edit</button>';
content+='&nbsp;&nbsp;<button type="button"  class="btn btn-xs btn-danger" onclick="deletecourse('+mycourse.couid+')"><i class="fa fa-trash"></i> Delete</button></div>';
content+='</div>';
content+='<div id="collapse'+mycourse.couid+'" class="panel-collapse collapse" aria-expanded="false" style="height:0px;">';
content+='<div class="box-body">';
content+='<div class="row">';
content+='<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">  ';
content+='<div class="col-xs-12  col-sm-12 col-md-12 col-lg-4 table-responsive">';
content+='<table class="table table-striped">';
content+='<tbody>';
content+='<tr><th>Category</th><td>'+mycourse.categoryname+'</td></tr>';
    content+='<tr><th>Shortname</th><td>'+mycourse.shortname+'</td></tr>';
    content+='<tr><th>Course type</th><td>'+mycourse.type+'</td></tr>';
content+='<tr><th>Level</th><td>'+mycourse.level+' </td></tr>';
content+='<tr><th>Scheme</th><td>'+mycourse.scheme+' </td></tr>';
    var feesdata="Currently not added";
    if(mycourse.feesstructure!=null){feesdata='<a target="_blank" href="'+data.url+''+mycourse.feesstructure+'">view fee structure</a>';}
    content+='<tr><th>Fee structure</th><td>'+feesdata+'</td></tr>';
content+='<tr><th>Total Seats</th><td>'+mycourse.totalseats+'</td></tr>';
content+='<tr><th>Available Seats</th><td>'+mycourse.seats+'</td></tr>';
content+='<tr><th>Duration</th><td>'+mycourse.duration+'</td></tr>';
content+='<tr><th>Total Fees</th><td> Rs.'+mycourse.fees+'/-</td></tr>';
content+='</tbody>';
content+='</table>';
content+='</div>';
content+='<div class="col-xs-12  col-sm-12 col-md-12 col-lg-8 invoice-col text-justify">';
content+='<h5><b>Eligibility Criteria</b></h5>';
content+=mycourse.eligibility+'</div>';
content+='<div class="col-xs-12  col-sm-12 col-md-12 col-lg-8 invoice-col text-justify">';
content+='<h5><b>Short Details</b><h5>';
content+=mycourse.details+'</div>';
 content+='</div>';   
content+='</div>';    
content+='</div>';
content+='</div>';
content+='</div>';
}
var page_cotent='';var page_count=data.page_count;
page_cotent+=' <li><a  onclick="loadcourse(1)">«</a></li>';
for(var i =1;i<=page_count;i++){page_cotent+='<li><a onclick="loadcourse('+i+')">'+i+'</a></li>';}
page_cotent+='<li><a  onclick="loadcourse('+page_count+')">»</a></li>';
$('#course_page').html(page_cotent);

}
else
{
    content+='<h2>Sorry No uploaded course found at server</h2>';
    $('#course_page').html('');
}
$("#accordion").html(content);
},'json').done(function()
{
$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({checkboxClass: 'icheckbox_flat-blue'   });
$('.minimal').on('ifChanged', function(event){
  //console.log(event.currentTarget.checked+' '+event.currentTarget.value);
  var isavailable=0;  if(event.currentTarget.checked===true)isavailable=1;
  var data={"couid":event.currentTarget.value,"isavailable":isavailable};

  $.post("Institute/updateAvalability",data,function(data){$("#custom_message").html(data.message);$('#myModal').modal({backdrop: 'static', keyboard: false}); });
});
});

};


/*var searchcourse=function(){    $("#course_term").on("keyup",function(){loadcourse(1);});};*/


var getcourse=function(id)
{

    $.post("Institute/getCourseById",{"id":id},function(data){




  $("#category").val(data.courses.category_id);
        loadcourses( $("#category").val());
        $("#name").val(data.courses.cid);
  $("#scheme").val(data.courses.scheme);
  $("#level").val(data.courses.level);
        $("#type").val(data.courses.type);
  $("#fees").val(data.courses.fees);
  $("#totalseats").val(data.courses.totalseats);
  $("#seats").val(data.courses.seats);
  $("#duration").val(data.courses.duration);
  $("#details").val(data.courses.details);
  $('iframe').contents().find('.wysihtml5-editor').html(data.courses.eligibility);
  $("#reg").val("Update"); $("#reg").attr("selid",id);

if ($('#new_course_panel').is(':visible')===false)$("#new_course_panel").slideToggle();     
    },'json');
};

var deletecourse=function(id)
{

    var c=confirm('Are you sure!...');
    if(c===true)
    {
    $.post("Institute/deleteCourse",{"id":id},function(data){
    $("#custom_message").html(data.message);$('#myModal').modal({backdrop: 'static', keyboard: false});   
        loadcourse(1);
   },'json');
    }
};


var getseat=function (id) {
    $.post("Institute/getseat", {id: id}, function (data) {
        seat = data.seat;
        for (var seats in seat) {
            var myseat = seat[seats];
           $("#seatupdate").val(myseat.seats);
        }


        $("#seatsubmit").unbind().on("click",function () {
            var seatcount=$("#seatupdate").val();
            $.post("Institute/Updateseat", {id: id, seatcount: seatcount}, function (datas) {
                $("#custom_message").html(datas.message);
             $('#myModal').modal({backdrop: 'static', keyboard: false});
            });
        });

    }).done(function(){$('#seatupdateModal').modal({backdrop: 'static', keyboard: false}); });
};


var newcategory=function () {


        $("#catsubmit").on("click",function (event) {

            event.preventDefault();
            if(!$("#newcatform").valid()){return false;}

            var category=$("#newcatname").val();
            $.post(site_url+"Institute/savenewcourse", { category: category}, function (data) {
                $("#newcatname").val("");
                loadcategory();
if(data.error==0) {
    $("#custom_message").html(data.message);

    $('#myModal').modal({backdrop: 'static', keyboard: false});
}

                if(data.error==1) {

                    $("#custom_message").html(data.message);

                    $('#myModal').modal({backdrop: 'static', keyboard: false});


                }
            });

    });

        loadcategory();
};



var newcourse=function () {


    $("#cousubmit").on("click",function (event) {


        event.preventDefault();
        if(!$("#newcourseform").valid()){return false;}

        var category=$("#catselname").val();
        var course=$("#newcoursename").val();
        var shortname=$("#newcoursesname").val();

        $.post(site_url+"Institute/savecoursebycollege", { category: category,course:course,shortname:shortname}, function (data) {
            $("#catselname").val("");
            $("#newcoursename").val("");
            $("#newcoursesname").val("");
            loadcategory();

            $("#custom_message").html(data.message);

            $('#myModal').modal({backdrop: 'static', keyboard: false});
        });

    });

};

var uploadfeestructure=function(id){

    $('#feefile').trigger('click');
    savefeestructure(id);
    };


var savefeestructure=function(id)
{

    $("#feefile").change(function(event)
    {
        $("#couid").val(id);

        event.preventDefault();
        var formdata=new FormData(document.getElementById("feeform"),document.getElementById("couid"));
        $.ajax({url:site_url+'Institute/uploadFeestructure', type: 'POST', data: formdata, processData: false, contentType: false, enctype: 'multipart/form-data',

            success: function (data) {
            $("#custom_message").html(data.message);
            $('#myModal').modal({backdrop: 'static', keyboard: false});
            }
        });
    });
};





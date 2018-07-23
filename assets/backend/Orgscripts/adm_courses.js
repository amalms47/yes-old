   $("#category").select2();
   $("#level").select2();


var getcategoey=function()
{

$.post(site_url+'Administrator/getcoursecategory',function(data){

 if(data.error===0)
 {

     $("#category").append('<option value="">Select category</option>');
    var category=data.category;
    for (var cate in category) {
        var mycat=category[cate];

        $("#category").append('<option value="'+mycat.id+'">'+mycat.categoryname+'</option>');  }
 }
});
};
var getselectcat=function () {

    $.post(site_url+'Administrator/getcoursecategory',function(data){

        if(data.error===0)
        {

            $("#catselname").append('<option value="">Select category</option>');
            var category=data.category;
            for (var cate in category) {
                var mycat=category[cate];

                $("#catselname").append('<option value="'+mycat.id+'">'+mycat.category+'</option>');  }
        }
    });
};



var getlevels=function()
{
$.post('Administrator/getcourselevel',function(data){
 if(data.error===0)
 {
   var level=data.level;
 for (var lev in level) { var mycat=level[lev];  $("#level").append('<option value="'+mycat.level+'">'+mycat.level+'</option>');   }
 }
});
};

var getcourses=function(page)
{
    var my_page=1;
    if(page!==null&&page!==undefined&&page!=="") {my_page=page;}
    $.post(site_url+"Administrator/getcourses",{"search":$('#search').val(),"page":my_page},function(data){



    var content='';
    var i=1;
    if(data.error==0)
    {
          var courses=data.courses;
          for (var course in courses)
        {
             var mycourse=courses[course];

             var status='Active';
             if(mycourse.cactive==0){status='Blocked'}
             content+='<tr>';
             content+='<td>'+i+'.</td>';i++;
             content+='<td>'+mycourse.categoryname+'</td>';
             content+='<td>'+mycourse.name+'</td>';
            content+='<td>'+mycourse.shortname+'</td>';
            content+='<td>'+mycourse.addedby+'</td>';
            content+='<td>'+status+'</td>';

            if(mycourse.cactive==1)content+='<td><span style="color: green;font-size: large" class="fa fa-check" onclick="activecourse('+mycourse.cid+','+mycourse.cactive+')"></a></td>';
            else if(mycourse.cactive==0)content+='<td><span  style="color: darkred;font-size: large" class="fa fa-times" onclick="activecourse('+mycourse.cid+','+mycourse.cactive+')"></a></td>';

            content+='<td><button type="button" class="btn btn-primary " onclick="getcourse('+mycourse.cid+')"><i class="fa fa-edit"></i> Edit</button></td>';
             content+='<tr>';
        }
        
         var page_cotent='';var page_count=data.page_count;
        if(my_page>1)
            page_cotent+=' <ul class="pagination pagination-sm  pull-right" style="margin:0px;"><li><a  href="javascript:void(0);" onclick="getcourses('+(my_page-1)+')">«&nbsp;Prev</a></li>';
        if(my_page<page_count)
            page_cotent+=' <ul class="pagination pagination-sm  pull-right" style="margin:0px;"><li><a  href="javascript:void(0);" onclick="getcourses('+(my_page+1)+')">Next&nbsp;»</a></li>';

        $('#coursepages').html(page_cotent);
    }
    else
    {
        content='<tr><td colspan="4">no information found at server</td></tr>';
    }
        $("#coursebody").html(content);  
    });
};


var activecourse=function (catid,val) {



    var option="0";
    if(val==0){option=1;}
    $.post(site_url+"Administrator/blockCourse",{option:option,id:catid},function (data) {

        getcourses(1);
    });
};


var getcourse=function(id)
{

$.post(site_url+"Administrator/getallcoursebyid",{"id":id},function(mydata)
{

    $("#category").select2("trigger", "select", {data: { id: mydata.courses.id }});

    $("#name").val(mydata.courses.name);
    $("#shortname").val(mydata.courses.shortname);
    $("#btn_save").attr("selid",mydata.courses.cid);
    $("#btn_save").attr("value",'edit');
});


};

var searchcourse=function()
{
  $("#search").on("keyup",function(event)
  {
      event.preventDefault();
      getcourses(1);
  }) ; 
};

var cleardata=function()
{
  $("#cleardata").on("click",function(event){
   $("#category").val($('#category option:first-child').val()).trigger('change');

      $("#name").val("");
      $("#shortname").val("");
      $("#category").val("");
$("#btn_save").attr("selid",-1);
$("#btn_save").attr("value",'insert');
  });  
};
getcategoey();
getlevels();
getcourses(1);
searchcourse();
cleardata();
$(function()
 {


     getselectcat();
$.validator.setDefaults({errorClass: 'help-block',highlight: function(element){ $(element).closest('.form-group  ').addClass('has-error'); },unhighlight: function(element){ $(element).closest('.form-group ').removeClass('has-error');  }});
$.validator.addMethod( "pattern", function( value, element, param ) { if ( this.optional( element ) ) { return true; } if ( typeof param === "string" ) { param = new RegExp( "^(?:" + param + ")$" );  } return param.test( value ); }, "Invalid input information." );
$("#courseform").validate({
            rules:{name:{required:true,pattern:"[a-zA-Z .]{3,100}"},shortname:{required:true,pattern:"[a-zA-Z .]{1,100}"},category:{required:true}},
            messages:{name:{ required:"Please enter  the course name .",pattern:"Only charactors allowed" },category:{ required:"Please enter  the course category ." }  }
        });
});

var savecourse=function()
{
$("#courseform").on("submit",function(event)
{
    
event.preventDefault();if(!$("#courseform").valid()){return false;}
var data=$("#courseform").serializeArray();

if($("#btn_save").attr("value")=="insert")
{

$.post(site_url+"Administrator/savecourse",data,function(data){
    cleardata();
  $("#custom_heading").html('Server response');
  $("#custom_message").html(data.message);
  $('#alertmodal').modal({backdrop: 'static', keyboard: false}); ;


    cleardata();

    $("#category").val("");
    $("#name").val("");
    $("#custom_heading").html('Server response');
    $("#custom_message").html(data.message);
    $('#alertmodal').modal({backdrop: 'static', keyboard: false});
    $("#category").val($('#category option:first-child').val()).trigger('change');

    $("#name").val("");
    $("#shortname").val("");
    $("#btn_save").attr("selid",-1);
    $("#btn_save").attr("value",'insert');
    getcourses(1);
});
}
else
{

    data.push({name:'cid',value:$("#btn_save").attr("selid")});


   $.post(site_url+"Administrator/updateallcourse",data,function(data){

       cleardata();

       $("#category").val("");
       $("#name").val("");
  $("#custom_heading").html('Server response');
  $("#custom_message").html(data.message);
  $('#alertmodal').modal({backdrop: 'static', keyboard: false});
     $("#category").val($('#category option:first-child').val()).trigger('change');

      $("#name").val("");
$("#btn_save").attr("selid",-1);
$("#btn_save").attr("value",'insert');
getcourses(1);
    });
}

});

};

savecourse();
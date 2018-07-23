$(function () {
   getinactivecolleges(1);
});

var getinactivecolleges=function (page) {

    var my_page=1;
    if(page!==null&&page!==undefined&&page!=="") {my_page=page;}
    $.post(site_url+"Administrator/getinactiveclg", {page: my_page}, function (data) {

$("#incollegescount").html(data.num);
        var content='';
        var i=1;
 if(data.error===0)
 {

 var colleges=data.colleges;
 for (var college in colleges)
 {

 var mycollege=colleges[college];



     content+='<tr>';
     content+='<td>'+i+'</td>';i++;
     content+='<td>'+mycollege.username+'</td>';
     content+='<td>'+mycollege.emailid+'</td>';
     content+='<td>'+mycollege.contactno+'</td>';
     content+='<td>'+mycollege.regdate+'</td>';
     content+='</tr>';


     $("#inactive").html(content);
 }

 var page_cotent='';var page_count=data.page_count;
     if(my_page>1)
         page_cotent+=' <ul class="pagination pagination-sm  pull-right" style="margin:0px;"><li><a  href="javascript:void(0);" onclick="getinactivecolleges('+(my_page-1)+')">«&nbsp;Prev</a></li>';
     if(my_page<page_count)
         page_cotent+=' <ul class="pagination pagination-sm  pull-right" style="margin:0px;"><li><a  href="javascript:void(0);" onclick="getinactivecolleges('+(my_page+1)+')">Next&nbsp;»</a></li>';

 $('#inactiveclgpage').html(page_cotent);

 }
 else if(data.error===1)
 {
 content='no information found at server';
 $('#inactiveclgpage').html("");
 }
 $('#inactiveclgbody').html(content);
 });

 };


 var details=function(id)
 {
 $.post("Administrator/getcollegebyid",{"id":id},function(data){
 //console.log(data);
 $('#title').html(data.colleges.title);
 $('#ccover').css({"background":"url('"+data.colleges.cover+"') center center"});
 $('#clogo').attr("src",data.colleges.logo);
 $('#username').html(data.colleges.title);
 $('#subtitle').html(data.colleges.subtitle);
 $('#mapcode').html(data.colleges.mapcode);
 $('#mapcode').find('iframe').css({"width":"260px","height":"200px"});
 $('#address1').html(data.colleges.address);
 $('#address2').html(data.colleges.city+', '+data.colleges.district+"(district)");
 $('#address3').html(data.colleges.state+"(state), pin."+data.colleges.pincode);
 $('#category').html(data.colleges.type);
 $('#university').html(data.colleges.university);
 $('#phoneno').html(data.colleges.contactno);
 $('#emailid').html(data.colleges.emailid);
 $('#faxno').html(data.colleges.faxno);
 $('#brochure').attr("href",data.colleges.brochure);
 $('#hurl').attr("href",data.colleges.url);
 $('#url').html(data.colleges.url);
 $('#details').html(data.colleges.content);
     $('#shortname').html(data.colleges.shortname);
 });

 $('#collegeform').modal({  keyboard: false,backdrop:'static'});
 }

 var collegeactive=function(id){


 $.post("Administrator/makecollegeactive",{id:id},function(data) {

 getinactivecolleges(1);
 $('#ccustom_message').html(data.message);
 setTimeout( function(){$('#ccustom_message').html('');} , 2500);

 });

 };



 var courses=function(id)
 {
 $.post("Administrator/getCourseById",{"inst_id":id},function(data){

 var content='';
 if(data.iserror==0)
 {
 var courses=data.courses;
 for (var course in courses)
 {
 var mycourse=courses[course];
 var ischecked=''; if(mycourse.isavailable==="1") ischecked='checked';
 content+='<div class="panel box  box-warning">';
 content+='<div class="box-header with-border">';
 content+='<h4 class="box-title">';
 content+='<a data-toggle="collapse" data-parent="#accordion" href="#collapse'+mycourse.id+'" aria-expanded="false" class="collapsed">';
 content+=mycourse.name+' ( '+mycourse.shortname+' )';
 content+='</a>';
 content+='</h4>';
 content+='<div class="pull-right"><label><input type="checkbox" class="minimal"  value="'+mycourse.id+'" name="isavailable" id="isavailable"  '+ischecked+'> Is Seat Available </label>&nbsp;';
 content+='&nbsp;&nbsp;<button type="button"  class="btn btn-xs btn-primary" onclick="getfees('+mycourse.id+')"><i class="fa fa-cloud-upload"></i> Fee Structure</button>';

 content+='</div>';
 content+='<div id="collapse'+mycourse.id+'" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">';
 content+='<div class="box-body">';
 content+='<div class="row">';
 content+='<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">';
 content+='<div class="col-xs-12  col-sm-12 col-md-12 col-lg-4 table-responsive">';
 content+='<table class="table table-striped">';
 content+='<tbody>';
 content+='<tr><th>Category</th><td>'+mycourse.category+'</td></tr>';
 content+='<tr><th>Level</th><td>'+mycourse.level+' </td></tr>';
 content+='<tr><th>Scheme</th><td>'+mycourse.scheme+' </td></tr>';
 content+='<tr><th>Seats</th><td>'+mycourse.seats+'</td></tr>';
 content+='<tr><th>Duration</th><td>'+mycourse.duration+'</td></tr>';
 content+='<tr><th> Fees</th><td> Rs.'+mycourse.fees+'/-</td></tr>';
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

 }
 else
 {
 content+='<h2>Sorry No uploaded course found at Server</h2>';

 }

 $("#ins_courses").html(content);
 $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({checkboxClass: 'icheckbox_flat-blue'   });



 $('#collegecourse').modal({  keyboard: false,backdrop:'static'});
 });
 };


 var features=function(id) {

     $.post("Administrator/getFeature", {"institute": id}, function (data) {


         var content = '';
         if (data.iserror == 0) {

             var features = data.features;
             var i = 1;
             for (var feature in features) {
                 var myfeature = features[feature];
                 content += '<div class="panel box  box-warning">';
                 content += '<div class="box-header with-border">';
                 content += '<h4 class="box-title">';
                 content += '<a data-toggle="collapse" data-parent="#accordion" href="#collapse' + myfeature.id + '" aria-expanded="false" class="collapsed">';
                 content += myfeature.title;
                 content += '</a>';
                 content += '</h4>';
                 content += '<div id="collapse' + myfeature.id + '" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">';
                 content += '<div class="box-body">';
                 content += ' <div class="attachment-block clearfix">';
                 content += '<img class="attachment-img" src="' + myfeature.picture + '" alt="Attachment Image">';
                 content += ' <div class="attachment-pushed" style="padding-left:5px;">';
                 content += '<div class="attachment-text" >';
                 content += myfeature.content;
                 content += '    </div>';
                 content += '     </div>';
                 content += '   </div>';
                 content += '</div>';
                 content += '</div>';
                 content += '</div>';
             }

         }
         else {
             content += '<h2>Sorry No uploaded course found at Server</h2>';
         }
         $("#ins_feature").html(content);
     });

     $('#collegefeat').modal({keyboard: false, backdrop: 'static'});

 };
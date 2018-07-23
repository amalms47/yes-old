$(function () 
{

    loadcategory();

    $("#clgcategory").change(function () {
        getcolleges(1);
    });
 /*   
$.post('Administrator/getcoursecategory',function(data){
 if(data.error===0)
 {
     var content='<label><input type="radio" name="category" class="category" value="" checked> All </label>&nbsp;';
    var category=data.category;
    for (var cate in category) {   var mycat=category[cate];  content+='<label><input type="radio" name="category" class="category"  value="'+mycat.category+'">'+mycat.category+'</label>&nbsp;';  }
    $('#mycategory').html(content);
    $('input[type="radio"].category').iCheck({radioClass: 'iradio_flat-blue'});
 }
});
    */
    $('input[type="radio"].category').iCheck({radioClass: 'iradio_flat-blue'});
$('input[type="radio"].choice').iCheck({radioClass: 'iradio_flat-blue'});


var showcategory=function(o){ if(o==1) { $('#categorysection').slideDown( "slow" ); }else if (o==0){ $('#categorysection').slideUp("slow");} };
showcategory(1);
$('.choice').on('ifChecked ', function(event)
{
    var v=$("input[name='option']:checked").val();showcategory(v);
    getcolleges(1);
});

$('.category').on('ifChecked ', function(event)
{
    var v=$("input[name='category']:checked").val();//showcategory(v);
    getcolleges(1);
});
});




var loadcategory=function()
{
    $.post(site_url+'Administrator/getCategorydropdown',function(data)
    {
        var contents='';

        if(data.error=="0")
        {
            var contents='<option value="'+""+'">All Category</option>';
            var categorys=data.content;
            for (var category in categorys){
                var mycategory=categorys[category];
                contents+='<option value="'+mycategory.category+'" >'+mycategory.category+'</option>';
            }
        }
        $("#clgcategory").html(contents);
    },'json');
};





var getcolleges=function(page)
{

    var search=$("#search").val();

    var option=$("input[name='option']:checked").val();

    var category=$("#clgcategory").val();
    var my_page=1;
    if(page!==null&&page!==undefined&&page!=="") {my_page=page;}
    var data={'option':option,'category':category,'page':my_page,'search':search};


    $.post(site_url+'Administrator/getcolleges',data,function(data)
   {

     var content='';
    if(data.error==0)
    {

          var colleges=data.colleges;
          for (var college in colleges)
        {

            var mycollege=colleges[college];


            var accactive='<span class="pull-right badge bg-green-active">Yes</span>';
            var activemsg="Block";
            if(mycollege.isblocked==1){accactive='<span class="pull-right badge bg-red-active">No</span>';activemsg="Unblock"}

                    content+='<div class="col-md-4">';
                    content+='<div class="box box-widget widget-user-2 " style="border:1px solid #ecf0f5">';
                    content+='<div class="widget-user-header bg-blue-active text-center">';
                    content+='<div><img class="img-circle" src="'+mycollege.logo+'" style="width:120px;height:120px;" alt="User Avatars"></div>';
                    content+='<h6 class="page-header" style="font-size: medium">'+mycollege.title+' </h6><h5>'+mycollege.subtitle+'</h5>';
                    content+='</div>';
                    content+='<div class="box-footer no-padding">';
                    content+='<ul class="nav nav-stacked">';
                    content+='<li><a href="javascript:void(0);">Administrator<span class="pull-right ">'+mycollege.username+'</span></a></li>';
                    content+='<li><a href="javascript:void(0);">Email ID<span class="pull-right ">'+mycollege.emailid+'</span></a></li>';
                    content+='<li><a href="javascript:void(0);">Mobile number<span class="pull-right ">+91 '+mycollege.contactno+'</span></a></li>';

                    content+='<li><a href="javascript:void(0);">Account Active'+accactive+'</a></li>';
                    content+='</ul>';
                    content+='</div>';
                    content+='<div class="box-footer">';
                    content+='<div class="pull-right">';
                    content+='<button type="button" class="btn btn-primary btn-xs" title="view college details" onclick=details('+mycollege.id+')><i class="fa fa-eye"></i> View</button>&nbsp;';
                    content+='<button type="button" class="btn btn-primary btn-xs" title="view college courses"  onclick=courses('+mycollege.id+')><i class="fa fa-list"></i> Courses</button>&nbsp;';
                    content+='<button type="button" class="btn btn-primary btn-xs" title="view college features"  onclick=features('+mycollege.id+')><i class="fa fa-list"></i> Features</button>&nbsp;';
                    content+='<button type="submit" class="btn btn-danger btn-xs" title="de-activate college account"  onclick=collegestatus('+mycollege.id+','+mycollege.isblocked+')><i class="fa  fa-ban"></i>'+activemsg+'</button>&nbsp;';
                    content+='</div>';
                    content+='</div>';
                    content+='</div>';
                    content+='</div>';  
        }
          
          var page_cotent='';var page_count=data.page_count;

        if(my_page>1)
            page_cotent+=' <ul class="pagination pagination-sm  pull-right" style="margin:0px;"><li><a  href="javascript:void(0);" onclick="getcolleges('+(my_page-1)+')">«&nbsp;Prev</a></li>';
        if(my_page<page_count)
            page_cotent+=' <ul class="pagination pagination-sm  pull-right" style="margin:0px;"><li><a  href="javascript:void(0);" onclick="getcolleges('+(my_page+1)+')">Next&nbsp;»</a></li>';


        $('#collegepage').html(page_cotent);
          
    }
    else
    {
        content='no information found at server';
           $('#collegepage').html("");
    }
        $('#collegebody').html(content);
    });

};

var test=function(){
    alert("pok");
};

var searchcollege=function()
{
    $("#search").on("keyup",function(){
        getcolleges(1);
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
        $("#location").html(data.colleges.state);
        $("#locatio2").html(data.colleges.district);
    });
    
    $('#collegeform').modal({  keyboard: false,backdrop:'static'});
};

var collegestatus=function(id,active){

    var option='1';
    if(active==1)option=0;


    $.post("Administrator/changecollegeactive",{"id":id,"isblocked":option},function(data) {

        getcolleges(1);
        $('#ccustom_message').html(data.message);
        setTimeout( function(){$('#ccustom_message').html('');} , 2500);

    });


};



var courses=function(id)
{

    $.post(site_url+"Administrator/getCourseById",{"inst_id":id},function(data){


        console.log(data);
        var content='';
        if(data.iserror==0)
        {
            var courses=data.courses;
            for (var course in courses)
            {
                var mycourse=courses[course];
                var ischecked='seats not available'; if(mycourse.isavailable==="1") ischecked='seats available';
                var feestruct="";
                if(mycourse.feesstructure!=null){feestruct='<a target="_blank" href="'+data.url+'/'+mycourse.feesstructure+'">&nbsp;view fee structure</a>';
                }

                content+='<div class="panel box  box-warning">';
                content+='<div class="box-header with-border">';
                content+='<h4 class="box-title">';
                content+='<a data-toggle="collapse" data-parent="#accordion" href="#collapse'+mycourse.couid+'" aria-expanded="false" class="collapsed">';
                content+=mycourse.name+' ( '+mycourse.shortname+' )';
                content+='</a>';
                content+='</h4>';

                content+='<div class="pull-right"><label><input type="button" style="display:none" class="btn btn-xs" >'+ischecked+'</label>&nbsp;';
                content+=feestruct;
                content+='</div>';
                content+='<div id="collapse'+mycourse.couid+'" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">';
                content+='<div class="box-body">';
                content+='<div class="row">';
                content+='<div class="col-xs-12  col-sm-12 col-md-12 col-lg-12">';
                content+='<div class="col-xs-12  col-sm-12 col-md-12 col-lg-4 table-responsive">';
                content+='<table class="table table-striped">';
                content+='<tbody>';
                content+='<tr><th>Category</th><td>'+mycourse.categoryname+'</td></tr>';
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


var features=function(id)
{

    $.post("Administrator/getFeature",{"institute":id},function(data)
    {
        var content='';
        if(data.iserror==0)
        {

            var features=data.features;
            var i=1;
            for (var feature in features)
            {
                var myfeature=features[feature];
                content+='<div class="panel box  box-warning">';
                content+='<div class="box-header with-border">';
                content+='<h4 class="box-title">';
                content+='<a data-toggle="collapse" data-parent="#accordion" href="#collapse'+myfeature.id+'" aria-expanded="false" class="collapsed">';
                content+=myfeature.title;
                content+='</a>';
                content+='</h4>';
                content+='<div id="collapse'+myfeature.id+'" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">';
                content+='<div class="box-body">';
                content+=' <div class="attachment-block clearfix">';
                content+='<img class="attachment-img" src="'+myfeature.picture+'" alt="Attachment Image">';
                content+=' <div class="attachment-pushed" style="padding-left:5px;">';
                content+='<div class="attachment-text" >';
                content+=myfeature.content;
                content+='    </div>';
                content+='     </div>';
                content+='   </div>';
                content+='</div>';
                content+='</div>';
                content+='</div>';
            }

        }
        else{content+='<h2>Sorry No uploaded course found at Server</h2>';}
        $("#ins_feature").html(content);
    });

    $('#collegefeat').modal({  keyboard: false,backdrop:'static'});
};




$(function(){

    saveAttachment();
    uploadAttach();
    getattachments();

    getnotification();

    savequalification();
    getqualfication();

    isprofilecomplete();
    completeprofile();
    uploadstudpicture();
    savestudphoto();

    isnotifications();

    getalldata();
    resetpassword();

    getrequests();
    jQuery.validator.addMethod("mobile_val", function (value, element) {
        return this.optional(element) || /^[0-9]{10,10}$/.test(value);
    }, 'Phone number contains only numbers');

    $("#newmobileform").validate({

        rules:{
            mobilenoedit:{
                required:true,
                maxlength:10,
                minlength:10,
                mobile_val:true
            }
        },
        messages:{

            mobilenoedit:{

                mobile_val:"Enter correct mobile number"
            }
        }
    });

});






var uploadAttach=function(){  $("#brchuretriger").on("click",function(){


    $.validator.setDefaults({

        highlight: function (element) {
            $(element)
                .closest('.form-group')
                .addClass('has-error');
        },
        unhighlight: function (element) {
            $(element)
                .closest('.form-group')
                .removeClass('has-error')
                .addClass('has-success');
        }
    });
    validators=$("#brochureform").validate(
        {
            rules: {
                attchname: {required: true}
            }
        });


    if(!$("#brochureform").valid()){return false; var flag=0;}
    else{
        flag=1;
    }

    if(flag==1){ $('#brofile').trigger('click');  }   });   };



var saveAttachment=function() {


    $("#brofile").change(function (event) {





        event.preventDefault();

        var formdata = new FormData(document.getElementById("brochureform"),document.getElementById("attchname"));
        $.ajax({
            url: site_url + 'Student/uploadAttach',
            type: 'POST',
            data: formdata,
            processData: false,
            contentType: false,
            enctype: 'multipart/form-data',
            success: function (data) {
                $("#Attachmsg").html(data.message);
                $("#attchname").val("");
                getattachments();

                if (data.error == 0) {

                    $("#Attachmsg").html(data.message);
                    $("#Attachmsg").fadeOut(5000);
                    window.location.reload();
                }


            }
        });

    });
};



var getattachments=function () {

  var data="";
    data += '<tr>';
    data += ' <th>#</th>';
    data += '<th>ATTACHMENT (View)</th>';
    data += '<th>DATE</th>';
    data += '<th>REMOVE</th>';
    data += '</tr>';

    $.post(site_url+"Student/getAttachments",function (values) {


        var i=1;

        var url=site_url+'assets/backend/studattachnments/';

            var content =values.contents;

            for (var conten in content) {

                var mydata = content[conten];
                data += '<tr>';
                data += ' <td>' + i + '</td>';i++;
                data += '<td><a  style="text-decoration: none;" target="_blank" href="'+mydata.attachment+'" >'+ mydata.name + '</a></td>';
                data += '<td>' + mydata.date + '</td>';
                data += '<td><a id="" style="text-decoration: none;" href="javascript:void(0)" onclick="deleteAtttachs(' + mydata.id + ');"><i class="fa fa-times"></i>&nbsp;&nbsp;REMOVE</a></td>';
                data += '</tr>';
            }
        if(values.error==1){
            data+="<tr><td>No attachments found</td><td></td><td></td><td></td></tr> ";
        }
        $("#attachs").html(data);
  });



};


var deleteAtttachs=function (id) {

    var c=confirm('Are you sure!...');
    if(c===true)
    {
        $.post(site_url+"Student/deleteattach",{"id":id},function(data){
            $("#custom_message").html(data.message);$('#myModal').modal({backdrop: 'static', keyboard: false});
            getattachments();
        },'json').done(function () {
           getattachments();
        });
    }
};

var getqualfication=function () {


   $.post(site_url+"Student/getstudentdata",function (data) {



       var cl="";
       var content=data.students;

       for (var contents in content) {

           var mydata = content[contents];


           cl += '<div class="faq-item">';
           cl += '<div class="faq-item-a">';
           cl += '<span class="faq-item-left">'+mydata.coursetitle+'</span>';
           cl += '<span title="delete" style="float: right;padding-left: 13px;color:#a80d0d" class="fa fa-times" onclick="deletequalification('+mydata.id+')"></span>';
           cl += '<span style="float: right;padding-left: 13px;" onclick="editqualification('+mydata.id+')">edit</span>';
           cl += '<span class="faq-item-i"></span>';
           cl += '<div class="clear"></div>';
           cl += '</div>';
           cl += '<div class="faq-item-b">';
           cl += '<div class="faq-item-p">';

           cl += '<div class="flight-d-text">';


           cl += '<div class="tables">';

           cl += '<div class="shortcodes">';
           cl += '<table class="table-a">';

           cl += '<tr>';
           cl += '<td>NAME OF SCHOOL/COLLEGE</td>';
           cl += ' <td>'+mydata.collegename+'</td>';

           cl += '</tr>';
           cl += '<tr>';
           cl += '<td>UNIVERSITY</td>';
           cl += '<td>'+mydata.courseuniversity+'</td>';

           cl += '</tr>';
           cl += '<tr>';
           cl += '<td>PASSED YEAR</td>';
           cl += '<td>'+mydata.coursepassdate+'</td>';

           cl += '</tr>';
           cl += '<tr>';
           cl += '<td>% OF MARK SCORED</td>';
           cl += '<td>'+mydata.coursemarks+'</td>';

           cl += '</tr>';
           cl += '</table>';
           cl += '</div>';

           cl += '<div class="clear"></div>';
           cl += '</div>';

           cl += '<br>';
           cl += '<div class="complete-devider"></div>';
           cl += '</div>';


           cl += '</div>';
           cl += ' </div>';
           cl += '</div>';

       }
       $("#qualificationlist").html(cl);
   }).done(function () {
       $('.faq-item-a').on('click',function(){
           var $parent = $(this).closest('.faq-item');
           if ($parent.is('.open')) {
               $parent.find('.faq-item-p').hide();
               $('.faq-item').removeClass('open');
           } else {
               $('.faq-item').removeClass('open');
               $('.faq-item-p').hide();
               $parent.addClass('open').find('.faq-item-p').fadeIn();
           }
       });
   });




};

var editqualification=function (id) {


   $.post(site_url+"Student/getQualbyid",{id:id},function (data) {

      if(data.error==0){

          var content=data.content;
          for(var contents in content){
              var mydata=content[contents];
          }


          $("#qualeditname").val(mydata.coursetitle);
          $("#qualid").val(mydata.id);
          $("#qualeditinstitution").val(mydata.collegename);
          $("#qualeditpercent").val(mydata.coursemarks);
          $("#qualedityear").val(mydata.coursepassdate);
          $("#qualedituniversity").val(mydata.courseuniversity);
          $('#qualeditModal').modal({backdrop: 'static', keyboard: false});
      }
      else{
          $("#custom_message").html(data.message);$('#myModal').modal({backdrop: 'static', keyboard: false});
      }
   });


    $("#qualeditform").on("submit",function(){

        $("#qualform").validate({

            rules:{
                qualeditname:{required:true},

                qualeditpercent:{required:true},
                qualedityear:{required:true},
                qualedituniversity:{required:true},
                qualeditinstitution:{required:true}
            }
        });


        if(!$("#qualeditform").valid()){return false;}

        var name=$("#qualeditname").val();
        var id=$("#qualid").val();
        var marks=$("#qualeditpercent").val();
        var year=$("#qualedityear").val();
        var board=$("#qualedituniversity").val();
        var institution=$("#qualeditinstitution").val();


        $.post(site_url+"Student/updateQualification",{id:id,name:name,marks:marks,year:year,board:board,inst:institution},function(result){

            $("#qualeditdismissbutton").click();
            {  $("#custom_heading").html('Server response'); $("#custom_message").html(result.message); $('#myModal').modal({backdrop: 'static', keyboard: false});}


        });
    });


    getalldata();
};


var isprofilecomplete=function(){


    $.post(site_url+"Student/checkProfilecomplete",function(data){

        if(data.error==1){

            $("#pronotcomplete").html('(Profile not completed)');
        }

    });
};


var isnotifications=function(){


    $.post(site_url+"Student/getunreadnoti",function(data){


        if(data.error==1){
            $("#unreadmsg").show();
            $("#unreadmsg").html('You have unread notifications');
        }
    });

};


var completeprofile=function(){

    $.validator.setDefaults({

        // errorClass:'help-block',
        highlight: function (element) {
            $(element)
                .closest('.form-group')
                .addClass('has-error');
        },
        unhighlight: function (element) {
            $(element)
                .closest('.form-group')
                .removeClass('has-error')
                .addClass('has-success');

        }
    });
    $("#completeprofileform").validate({

        rules:{
            firstname:{required:true,minlength:2},
            lastname:{required:true},
            gender:{required:true},
            dob:{required:true},
            contactno:{required:true,mobile_val:true},
            studstate:{required:true},
            studcity:{required:true}
        },
        messages:{
            firstname:{required:"Firsname is required",minlength:"Atleast 2 charactors"},
            lastname:{required:"Lastname is required "},
            gender:{required:"Please select your gender"},
            dob:{required:"Enter your date of birth "},
            contactno:{required:"Mobile number is required ",mobile_val:"Mobile number contain 10 digit numbers"},
            studstate:{required:"Select your state  "},
            studcity:{required:"Select your city "}

        }

    });


    $("#completeprofileform").on("submit",function(e){
        e.preventDefault();

        if (!$("#completeprofileform").valid()) {return false;}


        var firstname=$("#firstname").val();
        var lastname=$("#lastname").val();
        var dob=$("#dob").val();
        var gender=$("#gender").val();
        var studstate=$("#state").val();
        var studcity=$("#district").val();
        var number=$("#contactno").val();



        $.post("Student/Completestudentprofile",{"firstname":firstname,"lastname":lastname,"dob":dob,"gender":gender,"studstate":studstate,"studcity":studcity,"number":number},function(data){

            $("#dismissbutton").click();
            $("#custom_heading").html('Server response'); $("#custom_message").html(data.message); $('#myModal').modal({backdrop: 'static', keyboard: false});

           // window.location.reload();

        });
    });
}



var getrequests=function(){


    $.post(site_url+"Student/getrequests",function(data){

        var cli="";


        if(data.error==0) {
            var mydata = data.values;

            for (var rdata in mydata) {

                var reqdata = mydata[rdata];

                cli+='<h2>'+reqdata.title+'</h2>';



                cli+='<div class="column mm-12" style="margin-left: 10px;">';

                cli+=' <div class="complete-info-table">';
                cli+='<div class="complete-info-i">';
                cli+='<div class="complete-info-l"><b>Applied on :</b></div>';
                cli+='<div class="complete-info-r">'+reqdata.mdate+'</div>';
                cli+='<div class="complete-info-l"><b>Applied for :</b></div>';
                cli+='<div class="complete-info-r">'+reqdata.coursename+'</div>';
                cli+='<div class="complete-info-l"><b>Message :</b></div>';
                cli+='<div class="complete-info-r">'+reqdata.message+'</div>';
                cli+=' <div class="complete-info-l"><b>Status :</b></div>';
                cli+=' <div class="complete-info-r">'+reqdata.status+'</div>';

                cli+='</div>';

                cli+=' </div>';

                cli+='</div>';




                cli+='<div class="clear"></div>';


            }
        }
        else{
            cli=data.message;
        }

        $("#requestsection").html(cli);
    });
};


var getnotification=function () {


    $.post(site_url+"Student/getnotifications",function(data){

        console.log(data)
        var cli="";

        if(data.error==0) {
            var mydata = data.values;

            for (var rdata in mydata) {

                var reqdata = mydata[rdata];

                cli+='<h2>'+reqdata.title+'</h2>';



                cli+='<div class="column mm-12" style="margin-left: 10px;">';

                cli+=' <div class="complete-info-table">';
                cli+='<div class="complete-info-i">';
                cli+='<div class="complete-info-l"><b>Applied on :</b></div>';
                cli+='<div class="complete-info-r">'+reqdata.mdate+'</div>';
                cli+='<div class="complete-info-l"><b>Applied for :</b></div>';
                cli+='<div class="complete-info-r">'+reqdata.coursename+'</div>';
                cli+='<div class="complete-info-l"><b>Reply :</b></div>';
                cli+='<div class="complete-info-r">'+reqdata.reply+'</div>';
                if(reqdata.issview==0){
                    cli+=' <div class="complete-info-l"><a target="_blank"  href="javascript:void(0)" onclick="markasread('+reqdata.id+');"><span class="badge" style="background-color: #c12222;font-weight: lighter">Mark as read</span></a></div>';

                }
                else{
                    cli+='<div class="complete-info-r" style="color: #11a022;">&#10004;&nbsp;seen</div>';
                }


                cli+='</div>';

                cli+=' </div>';

                cli+='</div>';




                cli+='<div class="clear"></div>';

            }
        }
        else{
            cli=data.message;
        }

        $("#notificationsection").html(cli);
    });



};


var markasread=function (eid) {

    $.post(site_url+"Student/marknotificationread",{id:eid},function (data) {

      if(data.error==0){

      }
      else if(data.error==1){

            $("#custom_heading").html();
          $("#custom_message").html(data.message);
          $('#myModal').modal({backdrop: 'static', keyboard: false});

      }

    }).done(function () {
        getnotification();
        setTimeout(function () {
           location.reload();
        },2000);
    });
};

var uploadstudpicture=function()
{

    $("#propictriger").on("click",function(){

        $('#propic').trigger('click');
    });
};


var savestudphoto=function(){

    $("#propic").change(function(event)
    {
        var data=new FormData(document.getElementById("propicform"));
        $.ajax({url:'Student/uploadstudpropic', type: 'POST', data: data, processData: false, contentType: false, enctype: 'multipart/form-data',
            success: function (data) {  $("#custom_heading").html('Server response'); $("#custom_message").html(data.message); $('#myModal').modal({backdrop: 'static', keyboard: false});}
        });
        $('#myModal').on('click', function () {location.reload(true);});

    });
};



var savequalification=function(){


    $("#qualform").on("submit",function(){

        $("#qualform").validate({

            rules:{
                qualname:{required:true},
                qualpercent:{required:true},
                qualyear:{required:true},
                qualuniversity:{required:true},
                qualinstitution:{required:true}
            }
        });


        if(!$("#qualform").valid()){return false;}

        var name=$("#qualname").val();
        var marks=$("#qualpercent").val();
        var year=$("#qualyear").val();
        var board=$("#qualuniversity").val();
        var institution=$("#qualinstitution").val();



        $.post("Student/saveQualification",{name:name,marks:marks,year:year,board:board,inst:institution},function(result){

            $("#qualdismissbutton").click();
            {  $("#custom_heading").html('Server response'); $("#custom_message").html(result.message); $('#myModal').modal({backdrop: 'static', keyboard: false});}


        });
    });


    getalldata();
};


var getalldata=function(){


    $.post("Student/getstudentdata",function(data) {
        if(data.error==0) {
            var content = '';
            var students = data.students;



            //console.log(student);
            var i=1;

            for (var details in students) {


                var mydata = students[details];


                content+= '<div class="jumbotron text-left" id="qualshow">';

                content+= ' <h4 class="text-primary">'+mydata.coursetitle+'</h4>';


                content+= '<table class="table" style="border: 0px;">';

                content+= '<tbody>';

                content+= ' <tr>';
                content+= ' <th>INSTITUTION NAME</th>';
                content+= '<td>'+mydata.institutename+'</td>';
                content+= '</tr>';
                content+='<tr><th>STREAM</th> <td>'+mydata.coursetitle+'</td> </tr>';

                content+= '<tr>';
                content+= '<th>PASSED YEAR</th>';
                content+= '<td>'+mydata.coursepassdate+'</td>';
                content+= '</tr>';

                content+= ' <tr>';
                content+= '<th>MARKS (%)</th>';
                content+= '<td>'+mydata.coursemarks+'</td>';
                content+= '</tr>';
                content+= '</tbody>';
                content+= ' </table>';

                 content+='</div>';

              }

            $("#edu").html(content);

        }
        else{

            var content = '';
            content+='<tr><td id="nodata" class="mailbox-star" colspan="3">Add your qualification details here</td></tr>';
            $("#notableshow").html(content);
            $("#qualificationtable").css('visibility','hidden');
        }
    });
}


var deletequalification=function(id){

    var c=confirm('Are you sure!...');
    if(c===true) {
        $.post(site_url+"Student/deletequalification", {id_data: id}, function (result) {

            $("#custom_heading").html('Server response');
            $("#custom_message").html(result.message);
            $('#myModal').modal({backdrop: 'static', keyboard: false});


        });

        getqualfication();
    }
};

var resetpassword=function(){

    $("#studenteditpasswordform").on("submit",function(){

        $.validator.setDefaults({errorClass: 'help-block',
            highlight: function(element){ $(element).closest('.form-group  ').addClass('has-error'); },
            unhighlight: function(element){ $(element).closest('.form-group ').removeClass('has-error');  }
        });

        $("#studenteditpasswordform").validate({

            rules:{
                newpass:{
                    required:true,
                    pass_val:true
                },
                cnewpass:{
                    required:true,
                    equalTo:"#newpass"
                },
                oldpass:{
                    required:true,
                    pass_val:true
                }
            },
            messages:{
                required:"Please fille this field",
                pass_val:"Password must contain 6 charactors"
            }

        });

        jQuery.validator.addMethod("pass_val", function (value, element) {
            return this.optional(element) || /^(?=.*?[a-zA-Z0-9@#%$;])[a-zA-Z0-9@#%$;]{6,12}$/.test(value);
        }, 'Must have  6 charactors not morethan 12 charactors');

        if(!$("#studenteditpasswordform").valid()){return false;}

        var data=$("#studenteditpasswordform").serialize();

        $.post("Student/editstudpassword",data,function(result){

            $("#passdismissbutton").click();
            {  $("#custom_heading").html('Server response'); $("#custom_message").html(result.message); $('#myModal').modal({backdrop: 'static', keyboard: false});}



        });

    });
};



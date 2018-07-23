$(function () {
    $.validator.setDefaults({errorClass: 'help-block', highlight: function(element){ $(element).closest('.form-group  ').addClass('has-error'); }, unhighlight: function(element){ $(element).closest('.form-group ').removeClass('has-error');  }  });
    $.validator.addMethod( "pattern", function( value, element, param )  { if ( this.optional( element ) ) { return true; } if ( typeof param === "string" ) { param = new RegExp( "^(?:" + param + ")$" );  }  return param.test( value );   }, "Invalid input information." );

    submitform1();
    submitform2();
    submitform3();

    uploadAttach();

    saveAttachment();


    getstudentdata();


    //checkprofile();

    submitstudentdata();

});

/*
var checkprofile=function () {
    $.post(site_url+"Student/isProfilecomplete",function (data) {

        if(data.error==1){

             window.location.href=site_url+'student-home';
        }

    });
};
*/
var getstudentdata=function () {



    $.post(site_url+"Student/getstudentprofile",function (data) {

        var content=data.content;
        for(var contents in content){
            var mydata=content[contents];
            $("#fname").val(mydata.firstname);
            $("#lname").val(mydata.lastname);
            $("#frname").val(mydata.fathername);
            $("#dob").val(mydata.dob);
            $("#email").val(mydata.email);
            $("#mobile").val(mydata.mobile);
            $("#religion").val(mydata.religion);

            $("#state2").val(mydata.state);
            $("#district2").val(mydata.district);
            $("#caste").val(mydata.caste);
            $("#country").val(mydata.nationality);
            $("#address").val(mydata.address);
            $("#address2").val(mydata.address2);
            $("#pincode").val(mydata.pincode);
            $("#city").val(mydata.city);


            $("#taddress").val(mydata.taddress);
            $("#taddress2").val(mydata.taddress2);
            $("#tcity").val(mydata.tcity);
            $("#tcountry").val(mydata.tnationality);
            $("#tpincode").val(mydata.tpincode);
            $("#districts").val(mydata.tdistrict);
            $("#states").val(mydata.tstate);



        }
    });
};
var submitform1=function()
{



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

    validators=$("#applicationform1").validate(
        {
            rules: {
                fname: {required: true},
                lname: {required: true},
                frname: {required: true},
                gender: {required: true},
                mobile: {required: true, pattern: "[0-9]{10,10}"},
                dob: {required: true},
                religion: {required: true},
                caste: {required: true},
                country: {required: true}

               /* pincode: {required: true},
                city: {required: true},


                address: {required: true},
                address2: {required: true},

                state2: {required: true},
                district2: {required: true}*/
            }


        });

    $("#applicationform1").on("submit",function(event)
    {

        event.preventDefault();


        if(!$("#applicationform1").valid()){return false;}




        var datas=$("#applicationform1").serializeArray();


        $.post(site_url+'Student/completeStudentProfile1',datas,function(data) {



          if(data.value==1){
              $("#formbutton1").css('background-color','green');
              $("#formbutton1").html('SAVED');


              setTimeout(function () {
                  $("#contactstep").click();
              },1000);

          }
          else{
                $("#form1msg").val(data.message);
            }

        });


    });
};


var submitform2=function()
{



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

    validators=$("#applicationform2").validate(
        {
            rules: {

                tpincode: {pattern: "[0-9]{3,10}"},
                 pincode: {required: true,pattern: "[0-9]{3,10}"},
                 city: {required: true},


                 address: {required: true},
                 address2: {required: true},

                 state: {required: true},
                 district: {required: true},
                    country:{required:true}
            },
            messages:{pincode:{pattern:"Only numbers allowed"},tpincode:{pattern:"Only numbers allowed"}}


        });

    $("#applicationform2").on("submit",function(event)
    {


        event.preventDefault();

        var terms=$("#terms").prop("checked");


        if(terms===false){

            $("#term_error").html('Please agree to our terms and conditions');
            return false;
        } else
            $("#term_error").html('');


        if(!$("#applicationform2").valid()){return false;}




        var datas=$("#applicationform2").serializeArray();


        $.post(site_url+'Student/completeStudentProfile2',datas,function(data) {




            if(data.value==1){
                $("#formbutton2").css('background-color','green');
                $("#formbutton2").html('SAVED');


                setTimeout(function () {
                    $("#qualicationstep").click();
                },1000);
            }
            else{
                $("#form2msg").val(data.message);
            }


        });


    });
};


var submitform3=function()
{


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

    validators=$("#applicationform3").validate(
        {
            rules: {


                qualname: {required: true},
                qualuniversity: {required: true},


                qualinstitution: {required: true},
                qualyear: {required: true},

                qualpercent: {required: true}

            }


        });

    $("#applicationform3").on("submit",function(event)
    {


        event.preventDefault();

        if(!$("#applicationform3").valid()){return false;}

        var datas=$("#applicationform3").serializeArray();


        $.post(site_url+'Student/completeStudentqual',datas,function(data) {

            $("#qualmsg").fadeOut(5000);
           $("#qualmsg").html(data.message);

           $("#qualname").val("");
            $("#qualuniversity").val("");
            $("#qualpercent").val("");
            $("#qualyear").val("");
            $("#qualinstitution").val("");


            $("#Appqualform").slideUp('fast');

        });


    });

};




var uploadAttach=function(){     $("#brchuretriger").on("click",function(){

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






   if(flag==1){ $('#brofile').trigger('click');  }  });    };


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


                if (data.error == 0) {

                    $("#Attachmsg").html(data.message);
                    $("#Attachmsg").fadeOut(5000);
                    // window.location.reload();
                }


            }
        });

    });
};



var submitstudentdata=function () {

    $.post(site_url + "Student/getstudentprofile", function (data) {


        var content = data.content;

        for (var contents in content) {
            var mydata = content[contents];


            $("#subfname").html(mydata.firstname);
            $("#sublname").html(mydata.lastname);
            $("#subfrname").html(mydata.fathername);
            $("#subdob").html(mydata.dob);
            $("#submobile").html(mydata.mobile);
            $("#subgender").html(mydata.gender);
            $("#subreligion").html(mydata.religion);

            $("#subcaste").html(mydata.caste);
            $("#subcountry").html(mydata.nationality);
            $("#subaddress").html(mydata.address);
            $("#subtaddress").html(mydata.taddress);
            $("#subpincode").html(mydata.pincode);
            $("#subcity").html(mydata.city);
            $("#substate").html(mydata.state);
            $("#subdistrict").html(mydata.district);


        }
    });
};
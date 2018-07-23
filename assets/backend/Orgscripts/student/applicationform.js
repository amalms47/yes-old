$(function () {
    $.validator.setDefaults({errorClass: 'help-block', highlight: function(element){ $(element).closest('.form-group  ').addClass('has-error'); }, unhighlight: function(element){ $(element).closest('.form-group ').removeClass('has-error');  }  });
    $.validator.addMethod( "pattern", function( value, element, param )  { if ( this.optional( element ) ) { return true; } if ( typeof param === "string" ) { param = new RegExp( "^(?:" + param + ")$" );  }  return param.test( value );   }, "Invalid input information." );

    submitform();
    getstudentdata();


    checkprofile();

    submitQualform();

});


var checkprofile=function () {
    $.post(site_url+"Student/isProfilecomplete",function (data) {

        if(data.error==1){

           // window.location.href=site_url+'student-home';
        }

    });
};

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
var submitform=function()
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

    validators=$("#applicationform").validate(
        {
            rules: {
                fname: {required: true},
                lname: {required: true},
                frname: {required: true},
                gender: {required: true},
                city: {required: true},
                pincode: {required: true},
                dob: {required: true},
                mobile: {required: true, pattern: "[0-9]{10,10}"},
                address: {required: true},
                address2: {required: true},
                religion: {required: true},
                caste: {required: true},
                country: {required: true},
                state2: {required: true},
                district2: {required: true}
            }


        });

    $("#applicationform").on("submit",function(event)
    {

        event.preventDefault();


        if(!$("#applicationform").valid()){return false;}




        var datas=$("#applicationform").serializeArray();


        $.post(site_url+'Student/completeStudentProfile',datas,function(data) {


            $("#savingmsg").html("success");


                $("#qualifications").show();
                $("#buttons").hide();


        });


    });
};

var submitQualform=function () {




    $("#addmore1").click(function () {
        $("#qualform2").toggle();

    });

    $("#addmore2").click(function () {
        $("#qualform3").toggle();

    });
    $("#addmore3").click(function () {
        $("#qualform4").toggle();

    });


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






    $("#applicationQualform").on("submit",function(event)
    {


        event.preventDefault();
        var terms=$("#terms").prop("checked");


        if(terms===false){

            $("#term_error").html('Please agree to our terms and conditions');
            return false;
        } else
            $("#term_error").html('');


        var datas=$("#applicationQualform").serializeArray();


        $.post(site_url+'Student/completeStudentqual',datas,function(data) {
            $("#custom_message").html(data.message);
            $('#myModal').modal({backdrop: 'static', keyboard: false});
        });


    });

};

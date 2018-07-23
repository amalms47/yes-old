
$(function(){

    $.post(site_url+"Student/checkloginstatus",function (data) {
        if(data.value==1){


            $("#studentacc").html(data.name);
            $("#studentacc2").html(data.name);
            $("#studentacc").click(function () {
                window.location.href=site_url+"student-home";
            });
            $("#studentacc2").click(function () {
                window.location.href=site_url+"student-home";
            });
        }
    });

    studloaddata();

});



// get cover photo and cookie informaion if found!....
var studloaddata=function()
{
    $("#studemailid").on("keyup",function(event){
        event.preventDefault();

        //get cookie information saved for 365 days
        var info=Cookies.get($("#studemailid").val());
        if(info!==undefined) {$("#studpassword").val(info);}
        //get coverphoto dynamically for login form

    });
};

$(function () {
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


    $("#studregform").validate({                           //register form validation

        rules: {

            studfname: {required: true},
            studregmobile: {required: true, mobile_val: true},
            studregemailid: {required: true, email_val: true},
            studregpass:{required:true,minlength:6,maxlength:12,pass_val:true},
            studregcpass:{required:true, equalTo:"#studregpass"}
        },

        messages: {
            studfname: {required: "Please enter your name"},
            studregmobile: {required: "Please enter your mobile number",mobile_val: "Please enter 10 digit mobile number"},
            studregemailid: {required: "Please enter your emailid",email_val: "Please enter correct email id"},
            studregpass:{required:"Please enter a password",pass_val:"Only special characters allowed"},
            studregcpass:{required:"Confirm password is required", equalTo:"Password does not match"}

        }

    });

    jQuery.validator.addMethod("email_val", function (value, element) {
        return this.optional(element) || /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(value);
    }, 'Enter a valid email');

    jQuery.validator.addMethod("mobile_val", function (value, element) {
        return this.optional(element) || /^\b[0-9]{10,10}\b$/i.test(value);
    }, 'Enter a valid email');


    jQuery.validator.addMethod("pass_val", function (value, element) {
        return this.optional(element) || /^(?=.*?[a-zA-Z0-9@#%$;])[a-zA-Z0-9@#%$;]{6,12}$/.test(value);
    }, 'Must have  6 charactors not morethan 12 charactors');


    $("#studloginform").validate({

        rules: {
            studemailid: {required: true,loginemail_val:true},
            studpassword: {required: true,loginpass_val:true}
        },

        messages: {
            studemailid: {required: "Please enter your username",loginemail_val:"Please enter your email correctly"},
            studpassword: {required: "Please enter your password",loginpass_val:"Mininmum 6 charactors"}

        }
    });

    jQuery.validator.addMethod("loginemail_val", function (value, element) {
        return this.optional(element) || /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(value);
    }, 'Enter a valid email');

    jQuery.validator.addMethod("loginpass_val", function (value, element) {
        return this.optional(element) || /^.{6,20}$/i.test(value);
    }, 'Enter a valid email');


    $("#studpasswordform").validate({

        rules: {

            studforgotemailid: {required: true,passemail_val:true},


        },

        messages: {
            studforgotemailid: {required: "Please enter your username",passemail_val:"Please enter your userrname corectly"},


        }

    });

    jQuery.validator.addMethod("passemail_val", function (value, element) {
        return this.optional(element) || /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(value);
    }, 'Enter a valid email');



});

/************************************ validation ends here  ***************************************/



$("#studloginform").on("submit",function(event) {
    event.preventDefault();

    if (!$("#studloginform").valid()) {
        return false;
    }
    /*****************process data in ***************/
    if ($("#studremember").prop("checked") == true) {
        Cookies.set($("#studemailid").val(), $("#studpassword").val(), {expires: 365});
    }


    var formdata = $("#studloginform").serialize();


    $.post(site_url+"student-authenticate", formdata, function (data) {

        if (data.action == 1) {

            window.location.href = data.url;
        }
        else if (data.action == 0) {

            window.location.href = data.url;
        }
        else if (data.action == -1) {

            $("#errorlogin").css('color','red');
           $("#errorlogin").html(data.message);
        }
    });
});



$("#studregform").on("submit",function(event)
{


    event.preventDefault();
    if(!$("#studregform").valid()){return false;}
    else{
        $("#studregbutton").attr('disabled','disabled');
        $("#studregbutton").html('please wait');
    }
    var terms='';
    if($("#studterms").prop("checked")===false){terms="please agree to our terms and conditions";$("#studterm_error").html(terms);return false;}
    else $("#studterm_error").html('');


    var email=$("#studregemailid").val();
    var name=$("#studfname").val();
    var mobile=$("#studregmobile").val();
    var cpass=$("#studregcpass").val();


    $.post('student-register',{"name":name,"mobile":mobile,"email":email,"cpass":cpass},function(data){



       if(data.action==1) {


            $("#errorloginreg").css('color','red');
            $("#errorloginreg").html(data.message);
            $("#studregform")[0].reset();

        }
        else {

            $("#errorloginreg").css('color','green');
            $("#errorloginreg").html(data.message);
            $("#studregform")[0].reset();
            $("#studregbutton").attr('disabled',false);
            $("#studregbutton").html('Register');

        }

    });
    //$('#studregisterbutton').attr('disabled',false);
    /********************* process data in ***********************/
});

/*****************process data in ***************/






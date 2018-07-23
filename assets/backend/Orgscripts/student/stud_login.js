
var studloadform=function(no)
{
    if(no===1){$("#studlogin_form").show(); $("#studpassword_form").hide();$("#studreg_form").hide();}
    if(no===2){$("#studreg_form").show(); $("#studlogin_form").hide();$("#studpassword_form").hide();}

    if(no===3)
    {
        $("#studpassword_form").show();$("#studlogin_form").hide();

    }
};


$(document).ajaxStart(function(e) {    if($(e.target.activeElement).hasClass('btn'))      $(".overlay").removeClass("hidden"); });
$(document).ajaxStop(function(e) {    if($(e.target.activeElement).hasClass('btn'))      $(".overlay").addClass("hidden");});

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


}

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


                    studregemailid: {required: true, email_val: true},
                    studregpassword:{required:true, pass_val:true},
                    studregcpassword:{required:true, equalTo:"#studregpassword"}
                },

                messages: {

                    studregemailid: {required: "Please enter your emailid",email_val: "Please enter correct email id"},
                    studregpassword:{required:"Please enter a password",pass_val:"Minimum 6 characters"},
                    studregcpassword:{required:"Confirm password is required", equalTo:"Password does not match"}

                }

            });

    jQuery.validator.addMethod("email_val", function (value, element) {
        return this.optional(element) || /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(value);
    }, 'Enter a valid email');



    jQuery.validator.addMethod("pass_val", function (value, element) {
        return this.optional(element) || /^(?=.*?[a-zA-Z0-9@#%$;])[a-zA-Z0-9@#%$;]{6,12}$/.test(value);
    }, 'Must have  6 charactors not morethan 12 charactors');


    $("#studloginform").validate({

        rules: {

            studemailid: {required: true,loginemail_val:true},
            studpassword: {required: true}

        },

        messages: {
            studemailid: {required: "Please enter your username",loginemail_val:"Please enter your username correctly"},
            studpassword: {required: "Please enter your password"}

        }

    });

    jQuery.validator.addMethod("loginemail_val", function (value, element) {
        return this.optional(element) || /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(value);
    }, 'Enter a valid email');


    $("#studpasswordform").validate({

        rules: {

            studforgotemailid: {required: true,passemail_val:true},


        },

        messages: {
            studforgotemailid: {required: "Please enter your username",passemail_val:"Please enter your username correctly"},


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
                    $("#studemailid").effect('shake' ,{ times:1 }, 100);
                    $("#studpassword").effect('shake' ,{ times:1 }, 100);
                    return false;
                }
                /*****************process data in ***************/
                if ($("#studremember").prop("checked") == true) {
                    Cookies.set($("#studemailid").val(), $("#studpassword").val(), {expires: 365});
                }


                var formdata = $("#studloginform").serialize();


                $.post("student-authenticate", formdata, function (data) {

                    console.log(data);
                    if (data.action == 1) {

                        window.location.href = data.url;
                    }
                    else {

                        $("#studloginerrors").html(data.message);
                    }
                });
            });

    /*****************process data in ***************/


$("#studregform").on("submit",function(event)
{
    event.preventDefault();
    if(!$("#studregform").valid()){return false;}
    var terms='';
    if($("#studterms").prop("checked")===false){terms="please agree to our terms and conditions";$("#studterm_error").html(terms);return false;}
    else $("#studterm_error").html('');
    /********************* process data in ***********************/

    var email=$("#studregemailid").val();
    var cpass=$("#studregcpassword").val();


    $.post('student-register',{"email":email,"cpass":cpass},function(data){
        //$('#studregisterbutton').attr('disabled',true);
        if(data.action==1) {
            $("#act_link").html('<button type="button" class="btn btn-primary pull-right" data-dismiss="modal">OK</button>');
            $("#custom_message").html("Server Response : " + data.message);
            $('#myModal').modal({backdrop: 'static', keyboard: false});
            $("#studregform")[0].reset();

        }
        else{
            $("#act_link").html('<button type="button" class="btn btn-primary pull-right" data-dismiss="modal">OK</button>');
            $("#custom_message").html("Server Response : " + data.message);
            $('#myModal').modal({backdrop: 'static', keyboard: false});
            $("#studregform")[0].reset();

        }

    });
    //$('#studregisterbutton').attr('disabled',false);
    /********************* process data in ***********************/
});

$("#studpasswordform").on("submit",function(event)
{
    event.preventDefault();
    if(!$("#studpasswordform").valid()){return false;}
    $.post(site_url+"student-sendlink",{"emailid":$("#studforgotemailid").val()},function(data){

        $("#act_link").html('<button type="button" class="btn btn-primary pull-right" data-dismiss="modal">OK</button>');
        $("#custom_message").html(data.message);
        $('#myModal').modal({backdrop: 'static', keyboard: false});

        $("#studforgotemailid").val("");
    });
});





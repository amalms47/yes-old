var validators;

$(function()
{


    $('input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_square-blue', increaseArea: '20%' });
    $('input[type="radio"]').iCheck({radioClass: 'iradio_square-blue', increaseArea: '20%' });
    loadform(1);
    loadlogo();
    $.validator.setDefaults({errorClass: 'help-block', highlight: function(element){ $(element).closest('.form-group  ').addClass('has-error'); }, unhighlight: function(element){ $(element).closest('.form-group ').removeClass('has-error');  }  });
    $.validator.addMethod( "pattern", function( value, element, param )  { if ( this.optional( element ) ) { return true; } if ( typeof param === "string" ) { param = new RegExp( "^(?:" + param + ")$" );  }  return param.test( value );   }, "Invalid input information." );

    login();
    register();
    sendMail();


    function reposition() { var modal = $(this), dialog = modal.find('.modal-dialog'); modal.css('display', 'block');dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));   }
    $('.modal').on('show.bs.modal', reposition);
    $(window).on('resize', function() {   $('.modal:visible').each(reposition); });

});
$(document).ajaxStart(function(e) {    if($(e.target.activeElement).hasClass('btn'))      $(".overlay").removeClass("hidden"); });
$(document).ajaxStop(function(e) {    if($(e.target.activeElement).hasClass('btn'))      $(".overlay").addClass("hidden");});


var loadform=function(no)
{
    if(no===1){$("#login_form").show();$("#register_form").hide(); $("#password_form").hide();}
    if(no===2){$("#register_form").show();$("#login_form").hide(); $("#password_form").hide();}
    if(no===3) {$("#password_form").show();$("#login_form").hide(); $("#register_form").hide();}
};


var sendMail=function()
{
    validators= $("#passwordform").validate({  rules:{ emailid:{required:true,email:true}  },  messages:{emailid:{ required:"Please enter  the email id .",email:"Please enter correct emailid" }    }        });

    $("#passwordform").on("submit",function(event)
    {
        event.preventDefault();
        if(!$("#passwordform").valid()){return false;}    var v=$("input[name='option']:checked").val();
        $.post("Institute/resetInstitute",{"emailid":$("#pusername").val(),"option":v},function(data){
            $("#custom_message").html(data.message);     $('#myModal').modal({backdrop: 'static', keyboard: false});
            $("#passwordform")[0].reset();
            $('input[type="radio"]').iCheck({radioClass: 'iradio_square-blue', increaseArea: '20%' });
        });
    });
}

/*  new code */
/*function checkpress(e){    var code = (e.keyCode ? e.keyCode : e.which);if(code == 13) {  $('#login').trigger("click");$('#registerbutton').trigger("click");}}/*
function submitForm()
{
    $("#loginform").on("submit",function(e){   if(!$("#loginform").valid()){ return false; }$(".overlay").removeClass("hidden"); });

    $("#registerform").on("submit",function(e){   if(!$("#registerform").valid()){ return false; }$(".overlay").removeClass("hidden"); });
}
*/

//$(document).ajaxStart(submitForm());
//$(document).ajaxStop(function(e) {    if($(e.target.activeElement).hasClass('btn') )      $(".overlay").addClass("hidden");});




var loadlogo=function()
{
    $("#username").on("focusout",function(event)
    {
        event.preventDefault();
        var info=Cookies.get($("#username").val());
        if(info!==undefined) {$("#password").val(info);}
        if($("#username").val()!="")
        {
            $.post("Institute/getLogo",{"emailid":$("#username").val()},function(data){  $("#cover").attr("src",data.photo); },'json');
        }
    });

    $("#pusername").on("focusout",function(event){
        event.preventDefault();
        $.post("Institute/getLogo",{"emailid":$("#pusername").val()},function(data){  $("#pcover").attr("src",data.photo); },'json');
    });

};





var register=function()
{

    validators=$("#registerform").validate(
        {
            rules:{username:{required:true,pattern:"[a-zA-Z_ ' ]{3,100}"},title:{required:true,pattern:"[a-zA-Z_ ' ]{3,100}"},emailid:{required:true,email:true},contactno:{required:true,pattern:"[0-9]{10,10}"},password:{required: true,pattern: "(?=.*?[a-zA-Z])(?=.*?[0-9])(?=.*?[@#%$;])[a-zA-Z0-9@#%$;]{6,32}" },reppassword:{required:true,equalTo: "#mypass"}    },
            messages:{username:{required:"Please enter  the username ",pattern:"Please enter name correctly"},contactno:{required:"Please enter  mobileno",pattern:"Please enter 10 digit mobileno"},
                emailid:{ required:"Please enter  the email id .",email:"Please enter correct emailid" },title:{required:"Please enter college name" },password:{required:"Please enter  the password.", pattern:"Must contain number,char,special char"},
                reppassword:{required:"Please enter  the confirm password.",equalTo:"Password doesnot match"}}
        });

    $("#registerform").on("submit",function(event)
    {
        event.preventDefault();

        if(!$("#registerform").valid()){return false;}
        var terms=$("#terms").prop("checked");if(terms===false){$("#term_error").html('Please agree to our Terms and Conditions');return false;} else $("#term_error").html('');
        var formdata=$("#registerform").serialize();
        $.post(site_url+'Institute/registerInstitute',formdata,function(data)
        {
            console.log(data);
            $("#custom_message").html(data.message);$('#myModal').modal({backdrop: 'static', keyboard: false});
            $("#registerform")[0].reset();
            $('input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_square-blue', increaseArea: '20%' });
        },'json');

    });
};

var login=function()
{
    validators= $("#loginform").validate({
        rules:{ emailid:{required:true,email:true},  password:{required: true,pattern: "(?=.*?[a-zA-Z])(?=.*?[0-9])(?=.*?[@#%$;])[a-zA-Z0-9@#%$;]{6,16}" }       },
        messages:{ emailid:{ required:"Please enter  the email id .",email:"Please enter correct emailid" }, password:{required:"Please enter  the password.", pattern:"Password contain char,number special char"}
        } });

    $("#login").click(function(event)
    {

        event.preventDefault();



        if(!$("#loginform").valid()){ return false; }
        if($("#remember").prop("checked")==true){Cookies.set($("#username").val(),$("#password").val(),{expires:365});  }
        var formdata=$("#loginform").serialize();
        $.post("Institute/loginInstitute",formdata,function(data){
            if(data.iserror==="0")
            {
                window.location.href=data.url;
            }
            else{
                console.log(data.message);
                $('#errormsg').html(data.message);
                $('#errormsg').css('color','red');
            }

        },'json');
    });

};
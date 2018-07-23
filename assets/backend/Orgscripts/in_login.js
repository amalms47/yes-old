var validators;

$(function()
{

    $.validator.setDefaults({errorClass: 'help-block', highlight: function(element){ $(element).closest('.form-group  ').addClass('has-error'); }, unhighlight: function(element){ $(element).closest('.form-group ').removeClass('has-error');  }  });
    $.validator.addMethod( "pattern", function( value, element, param )  { if ( this.optional( element ) ) { return true; } if ( typeof param === "string" ) { param = new RegExp( "^(?:" + param + ")$" );  }  return param.test( value );   }, "Invalid input information." );

    login();



    function reposition() { var modal = $(this), dialog = modal.find('.modal-dialog'); modal.css('display', 'block');dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));   }
    $('.modal').on('show.bs.modal', reposition);
    $(window).on('resize', function() {   $('.modal:visible').each(reposition); });

});
$(document).ajaxStart(function(e) {    if($(e.target.activeElement).hasClass('btn'))      $(".overlay").removeClass("hidden"); });
$(document).ajaxStop(function(e) {    if($(e.target.activeElement).hasClass('btn'))      $(".overlay").addClass("hidden");});


var login=function()
{
    validators= $("#loginform").validate({
        rules:{ emailid:{required:true,email:true},  password:{required: true,pattern: "[a-zA-Z0-9#@_!*%$&?]{8,32}" }       },
        messages:{ emailid:{ required:"Please enter  the email id .",email:"Please enter correct emailid" }, password:{required:"Please enter  the password.", pattern:"Please enter correct password"}
        } });

    $("#loginform").on("submit",function(event)
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
            else{$("#custom_message").html("Server Response : "+data.message);$('#myModal').modal({backdrop: 'static', keyboard: false}); $("#loginform")[0].reset();   $('input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_square-blue', increaseArea: '20%' });}
        },'json');
    });

};
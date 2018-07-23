


$(function(){

    getphoto();
    $.validator.setDefaults({errorClass: 'help-block',
        highlight: function(element){ $(element).closest('.form-group  ').addClass('has-error'); },
        unhighlight: function(element){ $(element).closest('.form-group ').removeClass('has-error');  }
    });

    $.validator.addMethod( 'pattern', function( value, element, param )
    { if ( this.optional( element ) ) { return true; } if ( typeof param === 'string' ) { param = new RegExp( '^(?:' + param + ')$' );  }
        return param.test( value );
    }, 'Invalid input information.' );

    $('#loginform').validate({
        rules:{
            username:{required:true,pattern:'[a-zA-Z0-9#@_!*%$&?]{8,32}'},
            password:{required: true,pattern: '[a-zA-Z0-9#@_!*%$&?]{8,32}' }
        },
        messages:{
            username:{ required:'Please enter  the username .',pattern:'Please enter correct username' },
            password:{required:'Please enter  the password.'	, pattern:'Please enter correct password'}
        }
    });






});







//get login person profile photo
var getphoto=function()
{ 
    $('#username').on('focusout',function(event){event.preventDefault();
    $.post(site_url+'getadminphoto',{'username':$('#username').val()},function(data){


        $('#photo').attr('src',data.photo);
    });
    });
};

$(document).ajaxStart(function(e) {    if($(e.target.activeElement).hasClass('btn'))      $(".overlay").removeClass("hidden"); });
$(document).ajaxStop(function(e) {    if($(e.target.activeElement).hasClass('btn'))      $(".overlay").addClass("hidden");});

/*  new code *
function checkpress(e){    var code = (e.keyCode ? e.keyCode : e.which);if(code == 13) {  $('#login').trigger("click");}
}
function submitForm()
{
    $("#loginform").on("submit",function(e){   if(!$("#loginform").valid()){ return false; }$(".overlay").removeClass("hidden"); });


}

$(document).ajaxStart(submitForm());
*/
var signin=function()
{
   $('#loginform') .on('submit',function(event){ event.preventDefault();


    if(!$('#loginform').valid()){ return false; }
    var formData=$('#loginform').serialize();
    $.post('secure-signin',formData,function(data){

        if(data.error==0) {

            window.location.href = data.url;
        }

        else{


                $('#message').html(data.message);
                $('#message').css('color','red');
        }
        });
    //$('#loginform')[0].reset();
  });
};



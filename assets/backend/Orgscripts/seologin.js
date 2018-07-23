$(function () {
    $.validator.setDefaults({errorClass: 'help-block', highlight: function(element){ $(element).closest('.form-group  ').addClass('has-error'); }, unhighlight: function(element){ $(element).closest('.form-group ').removeClass('has-error');  }  });
    $.validator.addMethod( "pattern", function( value, element, param )  { if ( this.optional( element ) ) { return true; } if ( typeof param === "string" ) { param = new RegExp( "^(?:" + param + ")$" );  }  return param.test( value );   }, "Invalid input information." );

    login();
});


var login=function()
{
    validators= $("#seologinform").validate({
        rules:{ username:{required:true},  password:{required: true }     }
         });

    $("#seologin").click(function(event)
    {

        event.preventDefault();



        if(!$("#seologinform").valid()){ return false; }
        var formdata=$("#seologinform").serialize();

        $.post(site_url+"Seoadmin/login",formdata,function(data){

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
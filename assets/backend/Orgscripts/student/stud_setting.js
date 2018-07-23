$(function(){

    $.validator.setDefaults({errorClass: 'help-block',
        highlight: function(element){ $(element).closest('.form-group  ').addClass('has-error'); },
        unhighlight: function(element){ $(element).closest('.form-group ').removeClass('has-error');  }
    });

    $.validator.addMethod( "pattern", function( value, element, param )
    { if ( this.optional( element ) ) { return true; } if ( typeof param === "string" ) { param = new RegExp( "^(?:" + param + ")$" );  }
        return param.test( value );
    }, "Invalid input information." );

    $("#studresetpasswordform").validate({
        rules:{
            password:{required: true,pattern: "[a-zA-Z0-9#@_!*%$&?]{6,32}" },
            reppassword:{required:true,equalTo: "#mypass"}
        },
        messages:{
            password:{required:"Please enter  the password.", pattern:"Please enter correct password"},
            reppassword:{required:"Please enter  the confirm password.",equalTo:"Password doesnot match"}
        }
    });

});



$("#studresetpasswordform").on("submit",function(event)
{

    event.preventDefault();
    if(!$("#studresetpasswordform").valid()){return false;}
   // alert($("#emailid").val());
    var formdata=$("#studresetpasswordform").serialize();
    $.post("student-setting",formdata,function(data){
        window.location.href=data.action;

    });
});
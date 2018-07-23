var uploadpicture=function(){  $("#propictriger").on("click",function(){   $('#propic').trigger('click');    });};

var savephoto=function()
{
$("#propic").change(function(event)
{
var data=new FormData(document.getElementById("propicform"));
$.ajax({url:'Administrator/uploadprofilepic', type: 'POST', data: data, processData: false, contentType: false, enctype: 'multipart/form-data',
success: function (data) {  $("#custom_heading").html('Server response'); $("#custom_message").html(data.message); $('#alertmodal').modal({backdrop: 'static', keyboard: false});}
});
$('#alertmodal').on('click', function () {location.reload(true);});
});
};

var saveprofile=function()
{
      $("#Profileform").on("submit",function(event)
    {
        event.preventDefault();
        if(!$("#Profileform").valid()){return false;}
         var data=$("#Profileform").serialize();
         $.post(site_url+"Administrator/saveprofile",data,function(data){$("#custom_heading").html('Server response'); $("#custom_message").html(data.message); $('#alertmodal').modal({backdrop: 'static', keyboard: false});})
         $('#alertmodal').on('click', function () {location.reload(true);});
    });
};



var savepasword=function(){
    $("#PasswordForm").on("submit",function(event)
    {
        event.preventDefault();
         if(!$("#PasswordForm").valid()){return false;}
         var data=$("#PasswordForm").serialize();
         $.post("Administrator/savepassword",data,function(data){ $("#custom_heading").html('Server response');$("#custom_message").html(data.message);$('#alertmodal').modal({backdrop: 'static', keyboard: false}); $("#PasswordForm")[0].reset(); });
         
         
    });
};




//loginform validation code section.
 $(function()
 {
     
$.validator.setDefaults({errorClass: 'help-block',highlight: function(element){ $(element).closest('.form-group  ').addClass('has-error'); },unhighlight: function(element){ $(element).closest('.form-group ').removeClass('has-error');  }});
$.validator.addMethod( "pattern", function( value, element, param ) { if ( this.optional( element ) ) { return true; } if ( typeof param === "string" ) { param = new RegExp( "^(?:" + param + ")$" );  } return param.test( value ); }, "Invalid input information." );

$("#Profileform").validate({
rules:{emailid:{required:true,email:true}, phoneno:{required: true,pattern: "[0-9]{10}" },username:{required:true,pattern:"[a-zA-Z \s]{2,32}"},fullname:{required:true,pattern:"[a-zA-Z \s]{2,32}"} },
messages:{emailid:{ required:"Please enter  the email id .",email:"Please enter correct emailid" },phoneno:{required:"Please enter  the phoneno.", pattern:"Please enter correct phoneno"},username:{required:"Please enter  the username.", pattern:"Please enter correct username"},fullname:{required:"Please enter  the fullname.", pattern:"Please enter correct fullname"}  }
});

$("#PasswordForm").validate({
rules:{oldpass:{required: true,pattern: "[a-zA-Z0-9#@_!*%$;&?]{8,32}" },newpass:{required: true,pattern: "[a-zA-Z0-9#@_!*%$&?]{8,32}" },reppass:{required:true,equalTo: "#newpass"}                      },
messages:{oldpass:{ required:"Please enter  the password .",pattern:"Please enter correct password" },newpass:{ required:"Please enter  the password .",pattern:"Please enter correct password" },reppass:{ required:"Please enter  the password .",pattern:"Password doesnot match" }}
 });


});
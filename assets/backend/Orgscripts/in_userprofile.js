$(function()
{
$.validator.setDefaults({errorClass: 'help-block',highlight: function(element){ $(element).closest('.form-group  ').addClass('has-error'); },unhighlight: function(element){ $(element).closest('.form-group ').removeClass('has-error');  }});
$.validator.addMethod( "pattern", function( value, element, param ) { if ( this.optional( element ) ) { return true; } if ( typeof param === "string" ) { param = new RegExp( "^(?:" + param + ")$" );  } return param.test( value ); }, "Invalid input information." );
savepasword();   
saveprofile(); 
loaduser();
       
}) .ajaxStart(function() { Pace.restart(); });

var saveprofile=function()
{
$("#Profileform").validate({
rules:{emailid:{required:true,email:true}, contactno:{required: true,pattern: "[0-9]{3,20}" },username:{required:true,pattern:"[a-zA-Z \s]{2,32}"} },
messages:{emailid:{ required:"Please enter  the email id .",email:"Please enter correct emailid" },contactno:{required:"Please enter  the phoneno."	, pattern:"Please enter correct phoneno"},username:{required:"Please enter  the username."	, pattern:"Please enter correct username"}   }
});
$("#Profileform").on("submit",function(event)
{
event.preventDefault();
if(!$("#Profileform").valid()){return false;}
var data=$("#Profileform").serialize();
$.post("Institute/saveUserProfile",data,function(data)
{
    $("#custom_message").html(data.message);$('#myModal').modal({backdrop: 'static', keyboard: false});     
},'json').done(function(){loaduser();});
//$('#myModal').on('hidden.bs.modal', function (e) { e.preventDefault();location.reload(true);});
 });
};

var loaduser=function()
{
$.post("Institute/getInstitute",{"data":['username','emailid','contactno']},function(mydata){
$("#username").val(mydata.data.username);$("#susername").html(mydata.data.username);
$("#emailid").val(mydata.data.emailid);$("#semailid").html(mydata.data.emailid);
$("#contactno").val(mydata.data.contactno);$("#scontactno").html(mydata.data.contactno);

});    
};

var savepasword=function()
{
$("#PasswordForm").validate({
rules:{oldpass:{required: true,minlength:6,pattern: "(?=.*?[a-zA-Z])(?=.*?[0-9])(?=.*?[@#%$;])[a-zA-Z0-9@#%$;]{6,32}" },newpass:{required: true,minlength:6,pattern: "(?=.*?[a-zA-Z])(?=.*?[0-9])(?=.*?[@#%$;])[a-zA-Z0-9@#%$;]{6,32}" },reppass:{required:true,equalTo: "#newpass"}                      },
messages:{oldpass:{ required:"Please enter  the password .",pattern:"Please enter correct password" },newpass:{ required:"Please enter new the password .",pattern:"Password contain character,number,special charactor." },reppass:{ required:"Please enter  the password .",pattern:"Password doesnot match" }}
 });   
 $("#PasswordForm").on("submit",function(event)
 {
 event.preventDefault();
if(!$("#PasswordForm").valid()){return false;}
var data=$("#PasswordForm").serialize();
$.post(site_url+"Institute/savePassword",data,function(data){ $("#custom_message").html(data.message);$('#myModal').modal({backdrop: 'static', keyboard: false}); $("#PasswordForm")[0].reset(); },'json');
  });
};


var newentry=function(){
    $('#new_button').on('click',function(event){
        event.preventDefault();
        $('#adminform').modal({  keyboard: false,backdrop:'static'});

    });
};


var saveadmin=function() {

    $('#admin_form').on('submit', function (event) {

        event.preventDefault();
        if (!$("#admin_form").valid()) {
            return false;
        }
        var data = $('#admin_form').serialize();
        $.post(site_url + 'Administrator/savesubadmin', data, function (data) {
            $("#custom_heading").html('Server response');
            $("#custom_message").html(data.message);
            $('#alertmodal').modal({backdrop: 'static', keyboard: false});
            $("#subadmindismiss").click();
            $('#admin_form')[0].reset();
        });
        loadadmin();
    });
};







/*
var saveadmin=function()
{

    $('#admin_form').on('submit',function(event){

        event.preventDefault();
        if(!$("#admin_form").valid()){
            return false;
        }
        var option= $('#save_button').val();

        if(option==="Update")
        {
            alert();
//alert($('#save_button').attr('sel_id')+$('#save_button').val());
            var data=$('#admin_form').serializeArray();
            data.push({ name: "id", value: $('#save_button').attr('sel_id')});
            $.post(site_url+'Administrator/updatesubadmin',data,function(data){
                $("#custom_heading").html('Server response'); $("#custom_message").html(data.message); $('#alertmodal').modal({backdrop: 'static', keyboard: false});
                $("#subadmindismiss").click();
                $('#admin_form')[0].reset();
            });
            loadadmin();
        }
        else
        {
            var data=$('#admin_form').serialize();
            $.post(site_url+'Administrator/savesubadmin',data,function(data){
                $("#custom_heading").html('Server response'); $("#custom_message").html(data.message); $('#alertmodal').modal({backdrop: 'static', keyboard: false});
                $("#subadmindismiss").click();
                $('#admin_form')[0].reset();
            });
        }
        loadadmin();
        $('#save_button').val('Insert');
        $('#save_button').attr('sel_id',-1);
    });
};


*/


var loadadmin=function()
{

$.post('Administrator/loadsubadmin',function(data)
{
var content='';
if(data.error===0)
{
var admins=data.admins;
for (var admin in admins)
{
var myadmin=admins[admin];  
var active='No';
var blocked='Yes';
var activemsg='Unblock';
if(myadmin.active==1){  active='Yes'; activemsg='Block';}
if(myadmin.superkey==1){  blocked='No';}
content+='<div class="col-md-4">';
content+='<div class="box box-widget widget-user-2 " style="border:1px solid #ecf0f5">';
content+='<div class="widget-user-header bg-blue-active">';
content+='<div class="widget-user-image"><img class="img-circle" src="'+myadmin.photo+'" alt="User Avatar"></div>';
content+='<h3 class="widget-user-username">'+myadmin.fullname+'</h3><h5 class="widget-user-desc">'+myadmin.role+' section</h5>';
content+='</div>';
content+='<div class="box-footer no-padding">';
content+='<ul class="nav nav-stacked">';
content+='<li><a href="javascript:void(0);">Email ID<span class="pull-right ">'+myadmin.emailid+' </span></a></li>';
content+='<li><a href="javascript:void(0);">Mobile number<span class="pull-right ">+91 '+myadmin.phoneno+'</span></a></li>';
content+='<li><a href="javascript:void(0);">Account Active<span class="pull-right badge bg-blue-active">'+active+'</span></a></li>';
content+='<li><a href="javascript:void(0);">Blocked (Session Temporary blocked)<span class="pull-right  badge bg-blue-active">'+blocked+'</span></a></li>';
content+='</ul>';
content+='</div>';
content+='<div class="box-footer">';
content+='last login '+myadmin.logdate;
content+='<div class="pull-right">';
content+='<button type="button" class="btn btn-primary btn-xs" onclick="editadmin('+myadmin.admid+')"><i class="fa fa-pencil"></i> Edit</button>';
content+=' <button type="submit" class="btn btn-danger btn-xs" onclick="blockadmin('+myadmin.admid+','+myadmin.active+')"><i class="fa  fa-ban"></i> '+activemsg+'</button>';
content+='</div>';
content+='</div>';
content+='</div>';
content+='</div>';

}
}
else
{
    content+='Sorry no information found at server!...';
}
$('#adminbody').html(content);
});
};


var editadmin=function(id)
{
$.post(site_url+'Administrator/getadminbyid',{"id":id},function(data)
{
    $('#upfullname').val(data.admins.fullname);
$('#upusername').val(data.admins.username);
$('#upphoneno').val(data.admins.phoneno);
$('#upemailid').val(data.admins.emailid);
$('#uprole').val(data.admins.role);
    $('#upid').val(data.admins.admid);
$('#uppassword').attr("disabled","disabled");


$('#upadminform').modal({  keyboard: false,backdrop:'static'});
});
    $('#updateadmin_form').on('submit',function (event) {


        event.preventDefault();
        if (!$("#updateadmin_form").valid()) {
            return false;
        }
        var data = $('#updateadmin_form').serialize();
        $.post(site_url + 'Administrator/updatesubadmin', data, function (data) {
            console.log(data);

            $("#custom_heading").html('Server response');
            $("#custom_message").html(data.message);
            $('#alertmodal').modal({backdrop: 'static', keyboard: false});
            $("#cancelupdate").click();
            $('#updateadmin_form')[0].reset();
        });

    });
    loadadmin();
};

var blockadmin=function(id,active){

    var option='1';
    if(active==1)option=0;
  $.post(site_url+'Administrator/changeactive',{'id':id,'value':option},function(data){
      console.log(data);
      loadadmin();
      $('#fcustom_message').html(data.message);
      setTimeout( function(){$('#fcustom_message').html('');} , 2500);
  });
};




$(function()
 {
   
 $('#adminform').on('hidden.bs.modal', function () {$('#admin_form')[0].reset();});
$.validator.setDefaults({errorClass: 'help-block',highlight: function(element){ $(element).closest('.form-group').addClass('has-error'); }, unhighlight: function(element){ $(element).closest('.form-group').removeClass('has-error');  } });
$.validator.addMethod( "pattern", function( value, element, param ) { if ( this.optional( element ) ) { return true; } if ( typeof param === "string" ) { param = new RegExp( "^(?:" + param + ")$" );  }       return param.test( value );       }, "Invalid input information." );
$("#admin_form").validate({ 
rules:{
fullname:{required:true,pattern: "[a-zA-Z ]{2,32}"}, emailid:{required:true,email:true}, phoneno:{required:true,pattern:"[0-9]{10}"}, role:{required:true},
password:{required: true,pattern: "[a-zA-Z0-9#@$]{8,32}" },username:{required:true,pattern:"[a-zA-Z0-9@#$]{8,32}"}
},
messages:{
    fullname:{required:"Please enter  the administrator  name.", pattern:"Please enter correct username"},
    role:{required:"Please choose   the administrator  role."},
    emailid:{required:"Please enter  the emailid .", pattern:"Please enter correct email id )"},
    phoneno:{required:"Please enter  the mobile no.", pattern:"Please enter correct mobile no"},
    username:{required:"Please enter  the user name(for login).", pattern:"Please enter correct user name (@#$ are allowed)"},
    password:{required:"Please enter  the password.", pattern:"Please enter correct password(@#$ are allowed)"}   
}
});   
});


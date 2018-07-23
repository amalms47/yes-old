$(function()
{
    $.validator.setDefaults({errorClass: 'help-block', highlight: function(element){ $(element).closest('.form-group  ').addClass('has-error'); }, unhighlight: function(element){ $(element).closest('.form-group ').removeClass('has-error');  }  });
    $.validator.addMethod( "pattern", function( value, element, param )  { if ( this.optional( element ) ) { return true; } if ( typeof param === "string" ) { param = new RegExp( "^(?:" + param + ")$" );  }  return param.test( value );   }, "Invalid input information." );

   $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({checkboxClass: 'icheckbox_flat-blue'   });
 //  $(".textarea").wysihtml5();
 
   //loadcategory();
   loadprofile();  
   saveprofile();

}).ajaxStart(function() { Pace.restart(); });


var loadcategory=function()
{
 return $.post('Institute/getCategory',function(data)
 {
 var content='<option value="'+""+'">SELECT COLLEGE CATEGORY</option>';    
 if(data.iserror==="0")
 {
var categorys=data.category;
for (var category in categorys)
{   
    var mycategory=categorys[category];   
     content+='<option value="'+mycategory.category+'" >'+mycategory.category+'</option>';        
    
}
 }
 $("#type").html(content);
},'json');
};

var loadprofile=function()
{
    $.post(site_url+"Institute/getInstitute",{'data':['*']},function(institute){

        $("#title").val(institute.data.title);  $("#shortname").val(institute.data.shortname);
        $("#subtitle").val(institute.data.subtitle);   $("#url").val(institute.data.url);      
        loadcategory().done(function(){$("#type").val(institute.data.type);});
       $("#state").val(institute.data.state);  
       select_district( $("#state").val());
        $("#district").val(institute.data.district);
        
        
        $("#university").val(institute.data.university);         $("#address").val(institute.data.address);
        $("#city").val(institute.data.city);

        $("#collegetype").val(institute.data.collegetype);

        $("#details").val(institute.data.details);


         $("#pincode").val(institute.data.pincode);
         $("#f_atm").iCheck(((institute.data.f_atm==0)?'uncheck':'check'));
         $("#f_canteen").iCheck(((institute.data.f_canteen==0)?'uncheck':'check'));
         $("#f_hostel").iCheck(((institute.data.f_hostel==0)?'uncheck':'check'));
         $("#f_wifi").iCheck(((institute.data.f_wifi==0)?'uncheck':'check'));
         $("#f_sports").iCheck(((institute.data.f_sports==0)?'uncheck':'check'));
         $("#f_bus").iCheck(((institute.data.f_bus==0)?'uncheck':'check'));
         $("#f_library").iCheck(((institute.data.f_library==0)?'uncheck':'check'));
          $("#regdate").html(institute.data.regdate); 
    });
};

var saveprofile=function()
{

    $.validator.setDefaults({errorClass: 'help-block',
        highlight: function(element){ $(element).closest('.form-group  ').addClass('has-error'); },
        unhighlight: function(element){ $(element).closest('.form-group ').removeClass('has-error');  }
    });


    validators=$("#profileform").validate(
        {
            rules:{pincode:{pattern: "[0-9]{3,10}" },title:{required:true,pattern:"[a-zA-Z ]{3,100}"},address:{required:true},state:{required:true},district:{required:true}},
            messages:{pincode:{pattern:"Only numbers allowed"},title:{required:"Enter college full name",pattern:"Numbers or charactors not allowed"},address:{required:"Enter college address "},state:{required:"Select college state"},district:{required:"Select college district"}}

        });


$("#profileform").on("submit",function(event){
event.preventDefault();
    if(!$("#profileform").valid()){return false;}
var formdata=$("#profileform").serialize();
$.post("Institute/saveInstitute",formdata,function(data)
{

    $("#custom_message").html(data.message); 
    $('#myModal').modal({backdrop: 'static', keyboard: false});
loadprofile();    

});

});
};

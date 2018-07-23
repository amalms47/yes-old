$(function(){


    $("#rateYo").on("rateyo.set", function (e, data) {

        var rate=data.rating;

        $("#starscoun").val(rate);

    });


//$("#getbrochure").click(function () {
    getbrochure();
//});
    sendrequest();
    getdata();
    collegecategory();
    getFacilities();
    getCourses(1);

    getsimiliarclg();
    getcollegenews();

    setvisitor();
    submitreview();
    getreviews(1);

    $("#fac").click(function () {
        $('#facilityModal').modal({backdrop: 'static', keyboard: false});
    });
});


var setvisitor=function () {

    setTimeout(function () {
       $.post(site_url+"Yescolleges/addvisitor",{id:collegeid,name:collegename},function (data) {
console.log(data.message);
       });
   },3000);

};

var getcollegedata=function(name){



    window.open(site_url+"college/"+name, '_blank');

};

var getsimiliarclg=function (ccategory,cid) {


    if(ccategory==""){ccategory="Engineering College"}

    $.post(site_url+"Yescolleges/getSimiliarcollege2",{cat:ccategory,cid:cid},function (data) {

        var image=site_url+"assets/frontend/img/star-b.png";
        var colleges = "";
        var content = data.content;
        for (var mycollege in content) {
            var clg = content[mycollege];
           
             colleges+='<div class="h-liked-item">';
                                colleges+='<div class="h-liked-item-i">';
                                    colleges+='<div class="h-liked-item-l">';
                                        colleges+='<a href="javasxript:void(0)" target="_blank" onclick="getcollegedata(\'' + clg.slug + '\');"><img style="width:80px;height:60px;border-radius: 8px;" alt="'+clg.title+'" src="'+clg.profile+'"></a>';
                                    colleges+='</div>';
                                    colleges+='<div class="h-liked-item-c">';
                                        colleges+='<div class="h-liked-item-cb">';
                                            colleges+='<div class="h-liked-item-p">';
                                                colleges+='<div class="h-liked-title"><a target="_blank" href="javascript:void(0)" onclick="getcollegedata(\'' + clg.slug + '\');">'+clg.title+'</a></div>';
                                                colleges+='<div class="h-liked-rating">';
                                                    colleges+='<nav class="stars">';
                                                        colleges+='<ul>';
                                                            colleges+='<li><a><img alt="" src="'+image+'" /></a></li>';
                                                            colleges+='<li><a><img alt="" src="'+image+'" /></a></li>';
                                                            colleges+='<li><a><img alt="" src="'+image+'" /></a></li>';
                                                            colleges+='<li><a><img alt="" src="'+image+'" /></a></li>';
                                                            colleges+='<li><a><img alt="" src="'+image+'" /></a></li>';
                                                        colleges+='</ul>';
                                                        colleges+='<div class="clear"></div>';
                                                    colleges+='</nav>';
                                                colleges+='</div>';
                                                colleges+='<div class="h-liked-foot">';
                                                  
                                                    colleges+='<span class="h-liked-comment">'+clg.district+'</span>';
                                                colleges+='</div>';
                                            colleges+='</div>';
                                        colleges+='</div>';
                                        colleges+='<div class="clear"></div>';
                                    colleges+='</div>';
                                colleges+='</div>';
                                colleges+='<div class="clear"></div>';
                            colleges+='</div>';
            
            
            

        }
        $("#similiarclg").html(colleges);
    });

};

var getcollegenews=function () {


    var id=collegeid;

    $.post(site_url+"Institute/getNews",{id:id},function (data) {

        var content="";
        if(data.iserror==1){$("#eventmsg").html('No news or events  found on this college');}
        var features=data.events;
        for(var feature in features) {
            var mydata = features[feature];

            content+='<div class="toggle-i">';
            content+='<div class="toggle-ia">';
            content+='<div class="toggle-ia-a">';
            content+='<div class="toggle-ia-l">';
            content+='<a href="#" class="toggle-trigger"></a>';
            content+=' </div>';
            content+='<div class="toggle-ia-r">';
            content+=' <div class="toggle-ia-rb">';
            content+='<div class="toggle-lbl">'+mydata.title+'<span class="pull-right" style="font-size: smaller;text-transform: lowercase">Updated on : '+mydata.date+'</span></div>';
            content+='<div class="toggle-txt">';
            content+=' <div class="cat-list-item fly-in">';
            content+='<div class="cat-list-item-l">';
            content+='<a><img alt="'+mydata.title+'" src="'+mydata.picture+'" style="width: 200px;height: 120px;"></a>';
            content+=' </div>';
            content+=' </div>';


            content+='<span>'+mydata.content+'</span></div>';
            content+='</div>';
            content+='<div class="clear"></div>';
            content+='</div>';
            content+='</div>';
            content+='<div class="clear"></div>';
            content+='</div>';
            content+='</div>';

        }

        $("#collegeevents").html(content);
    }).done(function () {
        $('.toggle-trigger').on('click',function(){
            var $parent = $(this).closest('.toggle-i');
            if ( $parent.is('.open') ) {
                $parent.removeClass('open').find('.toggle-txt').hide();
            } else {
                $parent.addClass('open').find('.toggle-txt').fadeIn();
            }
            return false;
        });
    });

};




var getdata=function(){

    var id=collegename;

    $.post(site_url+"college-getdata",{data:id},function(data){


        var colleges=data.content;


        for(var college in colleges) {

            var mydata = colleges[college];

            var location=mydata.city+'&nbsp;'+mydata.district+'&nbsp;'+mydata.state;

            if(mydata.collegetype=='govt'){$("#getadm").hide();}
            if(mydata.shortname==""){$("#shortnamespan").hide();}
            if(mydata.url==""){$("#collgesiteurl").hide();$("#collegeurl").hide();}
            if(mydata.subtitle==""){$("#affilicationside").hide();$("#collegeaffiliation2").css('display','none');$("#collegeaff").css('display','none');}
            if(mydata.university==""){$("#collegeuni").hide();$("#collegeuniversity").hide();}

            $("#collegecover").attr("src", mydata.cover);
            $("#collegelogo").attr("src", mydata.logo);
            $("#map").html(mydata.mapcode);
            $("#map iframe").attr("width","100%");
            $("#map iframe").attr("height","230px");
            $("#collegetitle").html(mydata.title);
             $("#collegetitle2").html(mydata.title);
            $("#collegename").html(mydata.shortname);
            $("#collegetype").html(mydata.type);
            $("#collegeaffiliation").html(mydata.subtitle);
            $("#collegeaffiliation2").html(mydata.subtitle);
            $("#collegestate").html(mydata.state);
            $("#collegecity").html(mydata.city);
            $("#collegecity2").html(location);
            getsimiliarclg(mydata.type,id);
            $("#collegedistrict").html(mydata.district);
            $("#collegeuniversity").html(mydata.university);
           // $("#collegeuniversity2").html(mydata.university);
            $("#collegedetails").html(mydata.details);
            $("#collegeaddress").html(mydata.address);
            $("#collegeaddress2").html(mydata.address);
            $("#collegephone").html(mydata.contactno);
            $("#collegephone2").html(mydata.contactno);
            $("#collegeemail").html(mydata.emailid);
            $("#collegepin").html(mydata.pincode);
            $("#collegefax").html(mydata.faxno);
            $("#collegeurl").html(mydata.url);
            $("#collegedetails").html(mydata.details);

            $("#collegetitletag").html(mydata.titletag);
            $("#metanametag").html(mydata.metanametag);
            $("#metakeywordtag").html(mydata.metakeytag);


            $(".doorman").hide();
            if (mydata.f_hostel == 1) {
                $(".doorman").show();

            }
            $(".gym").hide();
            if (mydata.f_gym == 1) {
                $(".gym").show();

            }
            $(".tv").hide();
            if (mydata.f_library == 1) {
                $(".tv").show();
            }
            $(".restourant").hide();
            if (mydata.f_canteen == 1) {
                $(".restourant").show();
            }
            $(".conf-room").hide();
            if (mydata.f_bus == 1) {
                $(".conf-room").show();
            }
            $(".play-place").hide();
            if (mydata.f_sports == 1) {
                $(".play-place").show();
            }
            $(".entertaiment").hide();
            if (mydata.f_entertainment == 1) {
                $(".entertaiment").show();

            }

            $(".pool").hide();
            if (mydata.f_pool == 1) {
                $(".pool").show();
            }

            $(".hot-tub").hide();
            if (mydata.f_placement == 1) {
                $(".hot-tub").show();
            }

            $(".parking").hide();
            if (mydata.f_parking == 1) {
                $(".parking").show();
            }

            $(".secure").hide();
            if (mydata.f_atm == 1) {
                $(".secure").show();
            }


            $(".internet").hide();
            if (mydata.f_wifi == 1) {
                $(".internet").show();
        }




        }
    },'json');

};


var comparecollege=function(name,id){

    //var insname=name.replace(/\s/g,"-");
    window.open(site_url+"compare-colleges/"+name+"/"+collegeid,'_blank');
    //window.location.href=site_url+"compare-colleges/"+insname+"/"+id;

};


var collegecategory=function () {

    var id=collegeid;
  $.post(site_url+"Institute/getCollegecategory",{id:id},function (data) {

      content=data.content;
      for(var category in content){
          var mycategory=content[category];
      }
  },'json') ;
};

var sendadmissionrequest=function(){

    $.validator.setDefaults({errorClass: 'help-block',
        highlight: function(element){ $(element).closest('.form-group  ').addClass('has-error'); },
        unhighlight: function(element){ $(element).closest('.form-group ').removeClass('has-error');  }
    });


        $("#admissionrequestforms").validate({
            rules:{
                requestmsg: {
                    required: true
                }
                },
                messages:{
                    requestmsg: {
                        required: "Please type your request here"
                    }
                }});



    $("#admissionrequestforms").on("submit",function(e){



        e.preventDefault();
        if(!$('#admissionrequestform').valid()){ return false; }
        var course=$("#courserequest").val();


        var requestmessage=$("#requestmsg").val();
      $.post(site_url+"Institute/sendadmissionRequest",{"course":course,"message":requestmessage,"collegeid":collegeid},function(data){


          $("#cancelrequest").click();
          $("courserequest").val("");
          $("#requestmsg").val("");
          $("#custom_message").html("Server Response : "+data.message);
          $('#myModal').modal({backdrop: 'static', keyboard: false});
      });

    });


};

var getFacilities=function () {


    var id=collegeid;
    $.post(site_url+"Institute/getFacilityimages",{id:id},function (data) {

        var colleges="";
        if(data.error==1){$("#gallerymsg").html('No images found on this college');}
        var features=data.features;
        for(var feature in features) {
            var mydata = features[feature];

            colleges += '<div class="offer-slider-i">';
            colleges += '<a class="offer-slider-img" href="#">';
            colleges += '<img alt="" src="'+mydata.picture+'" width="626px" height="232px" />';
            colleges += '<span class="offer-slider-overlay">';
            colleges += '<span class="offer-slider-btn">view</span>';
            colleges += '</span>';
            colleges += '</a>';
            colleges += '<div class="offer-slider-txt">';
            colleges += '<div class="offer-slider-link text-center"><a>'+mydata.title+'</a></div>';
            colleges += '<div class="offer-slider-txt">';
            colleges += '<div class="offer-slider-location" style="text-transform: lowercase">'+mydata.content+'</div>';
            colleges += '<div class="clear"></div>';
            colleges += '</nav>';
            colleges += '</div>';

            colleges += '</div>';
            colleges += '</div>';

        }

        $("#offers").html(colleges);
    }).done(function () {
        $(".owl-slider").owlCarousel({
            items:2,
            autoPlay: 3000,
            itemsDesktop : [1120,4], //5 items between 1000px and 901px
            itemsDesktopSmall : [900,2], // betweem 900px and 601px
            itemsTablet: [620,2], //2 items between 600 and 479
            itemsMobile: [479,1], //1 item between 479 and 0
            stopOnHover: true
        });
    });


};

/*

var getCourses=function (page) {

    var id=collegeid;
    $.post(site_url+"Institute/getCoursesfront",{id:id,page:page},function (data) {

        console.log(data);
        var conten="";

        if(data.error==1){$("#coursemsg").html('No courses found on this collge');}
       var content=data.content;
        for(var feature in content) {
            var mydata = content[feature];

       conten += '<div class="faq-item" >';
       conten += '<div class="faq-item-a" >';
       conten += '<span class="faq-item-left">'+mydata.name+'</span>';
       conten += '<span class="faq-item-i"></span>';
       conten += '<div class="clear"></div>';
       conten += '</div>';
       conten += '<div class="faq-item-b" style="background-color: #f7f8fc;">';
       conten += '<div class="faq-item-p"><b>Category </b>:'+mydata.categoryname+'</div>';
            conten += '<div class="faq-item-p"><b>Level </b>:'+mydata.level+'</div>';
            if(mydata.scheme!=""){conten += '<div class="faq-item-p"><b>Scheme </b>:'+mydata.scheme+'</div>';}
            conten += '<div class="faq-item-p"><b>Duration </b>:'+mydata.duration+'</div>';
            if(mydata.fees!=""){
                conten += '<div class="faq-item-p"><b>Fees </b>:'+mydata.fees+'</div>';

            }
            var feesdata="Currently not added";

            if(mydata.feesstructure!=null){
                feesdata='<a target="_blank" href="'+data.url+'/'+mydata.feesstructure+'">&nbsp;view fee structure</a>';
            }



            conten += '<div class="faq-item-p"><b>Fees structure </b>:'+feesdata+'</div>';

            if(mydata.totalseats!=""){ conten += '<div class="faq-item-p"><b>Seats</b>:'+mydata.totalseats+'</div>';}

            conten += '<div class="faq-item-p"><b>Eligibility</b>:'+mydata.eligibility+'</div>';
            conten += '<div class="faq-item-p"><b>Details</b>:'+mydata.details+'</div>';


            if((mydata.type!="govt")&&mydata.isavailable==1){

                conten += '<div class="faq-item-p"><button style="text-decoration: none;background-color: cornflowerblue;color: white" href="javascript:void(0)" onclick="checkuserloggedin(\'' + mydata.name + '\',' + mydata.couid + ');"><b>APPLY NOW</b></button></div>';
            }

            if(mydata.isavailable=="0"){

                conten += '<div class="faq-item-p"><button style="text-decoration: none;background-color: #bc3829;color: white" href="javascript:void(0)" "><b>SEATS NOT AVAILABLE</b></button></div>';
            }
       conten += '</div>';
       conten += '</div>';

        }
        $("#courselists").html(conten);


        var pages='';
        var count=data.pagecount;



        pages+='<a  href="javascript:void(0);" style="color: #4a90a4" onclick="getCourses(1)">«</a>';
        for(var i=1;i<=count;i++) {   pages+= '<a href="javascript:void(0)" onclick="getCourses('+i+')">'+i+'</a>';  }
        pages+= '<a href="javascript:void(0);" style="color: #4a90a4" onclick="getCourses(' + count + ')">»</a>';


        $("#coursepagination").html(pages);

    }).done(function () {

        $('.faq-item-a').on('click',function(){
            var $parent = $(this).closest('.faq-item');
            if ($parent.is('.open')) {
                $parent.find('.faq-item-p').hide();
                $('.faq-item').removeClass('open');
            } else {
                $('.faq-item').removeClass('open');
                $('.faq-item-p').hide();
                $parent.addClass('open').find('.faq-item-p').fadeIn();
            }
        });
    });

};


*/



var getCourses=function (page) {

    var id=collegeid;
    $.post(site_url+"Institute/getCoursesfront",{id:id,page:page},function (data) {

        var conten="";

        if(data.error==1){$("#coursemsg").html('No courses found on this collge');}
        var content=data.content;
        for(var feature in content) {
            var mydata = content[feature];

            conten += '<div class="faq-item" >';
            conten += '<div class="faq-item-a" >';
            conten += '<span class="faq-item-left">'+mydata.name+'</span>';
            conten += '<span class="faq-item-i"></span>';
            conten += '<div class="clear"></div>';
            conten += '</div>';
            conten += '<div class="faq-item-b" style="background-color: #f7f8fc;">';
            conten += '<div class="faq-item-p"><b>Category </b>:'+mydata.categoryname+'</div>';
            conten += '<div class="faq-item-p"><b>Level </b>:'+mydata.level+'</div>';
            if(mydata.scheme!=""){conten += '<div class="faq-item-p"><b>Scheme </b>:'+mydata.scheme+'</div>';}
            conten += '<div class="faq-item-p"><b>Duration </b>:'+mydata.duration+'</div>';
            if(mydata.fees!=""){
                conten += '<div class="faq-item-p"><b>Fees </b>:'+mydata.fees+'</div>';

            }
            var feesdata="Currently not added";

            if(mydata.feesstructure!=null){
                feesdata='<a target="_blank" href="'+data.url+'/'+mydata.feesstructure+'">&nbsp;view fee structure</a>';
            }



            conten += '<div class="faq-item-p"><b>Fees structure </b>:'+feesdata+'</div>';

            if(mydata.totalseats!=""){ conten += '<div class="faq-item-p"><b>Seats</b>:'+mydata.totalseats+'</div>';}

            conten += '<div class="faq-item-p"><b>Eligibility</b>:'+mydata.eligibility+'</div>';
            conten += '<div class="faq-item-p"><b>Details</b>:'+mydata.details+'</div>';


            if((mydata.type!="govt")&&mydata.isavailable==1){

                conten += '<div class="faq-item-p"><button style="text-decoration: none;background-color: cornflowerblue;color: white" href="javascript:void(0)" onclick="checkuserloggedin(\'' + mydata.name + '\',' + mydata.couid + ');"><b>APPLY NOW</b></button></div>';
            }

            if(mydata.isavailable=="0"){

                conten += '<div class="faq-item-p"><button style="text-decoration: none;background-color: #bc3829;color: white" href="javascript:void(0)" "><b>SEATS NOT AVAILABLE</b></button></div>';
            }
            conten += '</div>';
            conten += '</div>';

        }
        $("#courselists").html(conten);


        var pages='';
        var count=data.pagecount;



        pages+='<a  href="javascript:void(0);" style="color: #4a90a4" onclick="getCourses(1)">«</a>';
        for(var i=1;i<=count;i++) {   pages+= '<a href="javascript:void(0)" onclick="getCourses('+i+')">'+i+'</a>';  }
        pages+= '<a href="javascript:void(0);" style="color: #4a90a4" onclick="getCourses(' + count + ')">»</a>';


        $("#coursepagination").html(pages);

    }).done(function () {

        $('.faq-item-a').on('click',function(){
            var $parent = $(this).closest('.faq-item');
            if ($parent.is('.open')) {
                $parent.find('.faq-item-p').hide();
                $('.faq-item').removeClass('open');
            } else {
                $('.faq-item').removeClass('open');
                $('.faq-item-p').hide();
                $parent.addClass('open').find('.faq-item-p').fadeIn();
            }
        });
    });

};





var checkuserloggedin=function(coursename,courseid){                     // check user logged in or not if logged in only he can apply


    $.post(site_url+"Student/checkloginstatus",function(data){

        var id=courseid;
            var check="";
            if(data.value==1) {
                checkapplied(coursename,id);
            }
            else{
                $("#custom_message").html(data.message);
                $('#myModal').modal({backdrop: 'static', keyboard: false});}
        });

};


var sendrequest=function () {
    $("#submitrequest").on("click", function (e) {

        e.preventDefault();


        $("#cancelrequest1").click();
         $.post(site_url + "Student/sendadmissionRequest", {       // send or apply for course


         "message": 'Need admission for '+$("#submitrequest").attr("couname"),
         "courseid": $("#submitrequest").attr("couid"),
         "clgid":$("#submitrequest").attr("colid"),
         "coursename":$("#submitrequest").attr("couname")
         }, function (data) {


         $("#custom_message").html(data.message);
         $('#myModal').modal({backdrop: 'static', keyboard: false});
         });

    });
}
var checkapplied=function (coursename,courseid) {


    $.post(site_url + "Student/checkapplied", {courseid:courseid}, function (cdata) {    //check he already applied for same course or not ??


        if(cdata.error==0) {


            $("#subcoursename").html(coursename);
            $("#submitrequest").attr("colname",collegename);
            $("#submitrequest").attr("colid",collegeid);
            $("#submitrequest").attr("couid",courseid);$("#submitrequest").attr("couname",coursename);


            $('#detailsModal').modal({backdrop: 'static', keyboard: false});







        }

        else{


            $("#custom_message").html(cdata.message);
            $('#myModal').modal({backdrop: 'static', keyboard: false});
        }

    });
}


var getbrochure=function(){



    var id=collegeid;
    $.post(site_url+'Institute/getclgBrochure',{'data':['brochure'],id:id},function(mydata){


      if(mydata.value=="none"){$("#brochurelink").hide();}
        $("#brochurelink").attr("href",mydata.data.brochureurl);
    },'json');
};

var submitreview=function () {




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
    $("#reviewform").validate({
        rules:{revname:{required:true},revcontent:{required:true}},



        messages:{revname:{ required:"Please enter your name."},revcontent:{required:'Please type your review'}}
    });




    $("#reviewform").on("submit",function(event) {


        event.preventDefault();
        if (!$("#reviewform").valid()) {
            return false;
        }


        var id = collegeid;
        var sname = $("#revname").val();
        var content = $("#revcontent").val();
        var rate=$("#starscoun").val();
        $.post(site_url + "Yescolleges/submitReview", {cid: id, studname: sname, rcontent: content,rate:rate}, function (data) {



            $("#revname").val("");
            $("#revcontent").val("");
            $("#starscoun").val("");
            $("#cancelsubrequest").click();
            $("#custom_message").css('color','green');
            $("#custom_message").html(data.message);
            $('#myModal').modal({backdrop: 'static', keyboard: false});
        });

    });
};

var getreviews=function (page) {



    var id=collegeid;

        $.post(site_url+"Institute/getclgReviews",{page:page,id:id},function (data) {

            var mydata = "";


            var simage=site_url+"assets/backend/images/studimages/default.png";
            var star=site_url+"assets/frontend/img/sstar-b.png";
            var nostar=site_url+"assets/frontend/img/star-a.png";

            if(data.error==0) {
                var content = data.reviews;
                for (var contents in content) {

                    var mydatas = content[contents];

                mydata+='<div class="blog-comment-i">';
                    mydata += '<nav class="stars" style="float: right;padding-right:29px;">';
                    mydata+='<div class="blog-comment-txt"><span style="font-weight: bold">'+mydatas.stars+'</span> <span style="font-size: smaller"> / 5 rating</span></div>';
                    mydata+='</nav>';

                    mydata+='<div class="guest-reviews-a">';
                    mydata+='<div class="guest-reviews-l">';
                    mydata += '<img alt="" width="60px" height="60px" src="' + simage + '">';
                    mydata+='</div>';
                    mydata+='<div class="guest-reviews-r">';
                    mydata+='<div class="guest-reviews-rb">';
                    mydata+='<div class="blog-comment-lbl"></div>';
                    mydata += '<div class="blog-comment-lbl">' + mydatas.student + '</div>';
                    mydata+='<div class="blog-comment-info">Posted at &nbsp;<span>'+mydatas.date+'</span></div>';
                    mydata+='<div class="blog-comment-txt">'+mydatas.content+'</div>';
                    mydata+='</div>';
                    mydata+=' <br class="clear">';
                    mydata+='</div>';
                    mydata+='</div>';
                    mydata+='<div class="clear"></div>';
                    mydata+='</div>';
                }
                $("#reviewsection").html(mydata);

                var pages='';
                var count=data.pagecount;



                pages+=' <a  href="javascript:void(0);" style="color: #4a90a4" onclick="getreviews(1)">«</a>';
                for(var i=1;i<=count;i++) {   pages+= '<a href="javascript:void(0)" onclick="getreviews('+i+')">'+i+'</a>';  }
                pages+= '<a href="javascript:void(0);" style="color: #4a90a4" onclick="getreviews(' + count + ')">»</a>';


                $("#reviewpagination").html(pages);
            }


            else{
                $("#reviewpagination").html('No reviews found');
            }

        });
    };



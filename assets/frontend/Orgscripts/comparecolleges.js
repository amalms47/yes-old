
$(function () {
     getcomparedcollege();
    getcomparedcollege2();
    getcomparedcollege3();
    compsearch2();
    compsearch3();
    removeclg2();
    removeclg3();
    getSimiliarclg();

});

var removeclg3=function () {

    $("#searchcomp3").keyup(function () {

        var check1 = $("#searchcomp3").val();
        if (check1 != "") {
            $("#removeclgbutton3").show();
        }
        $("#removeclgbutton3").on("click", function () {
            $("#searchcomp3").val("");
            $("#topname3").html("");
            $("#cname3").html("");
            $("#location3").html("");
            $("#addr3").html("");
            $("#aff3").html("");
            $("#type3").html("");
            $("#university3").html("");
            $("#listfeatures3").html("");
            $("#courseselect3").html("");
            $("#selectcourses3").html("");
            $("#courseselect3").css('display','none');

        });

    });
};


var removeclg2=function () {

    $("#searchcomp2").keyup(function () {

        var check1 = $("#searchcomp2").val();
        if (check1 != "") {
            $("#removeclgbutton2").show();
        }
        $("#removeclgbutton2").on("click", function () {
            $("#searchcomp2").val("");
            $("#topname2").html("");
            $("#cname2").html("");
            $("#location2").html("");
            $("#addr2").html("");
            $("#aff2").html("");
            $("#type2").html("");
            $("#selectcourses2").html("");
            $("#university2").html("");
            $("#listfeatures2").html("");
            $("#courseselect2").html("");
            $("#courseselect2").css('display','none');

        });

    });
};
var compsearch2=function() {

    $("#searchcomp2").focusin(function () {

        var search = $("#searchcomp2").val();

        $.post(site_url + "Yescolleges/getsearchcollege", {"data": search}, function (data) {

            if (data.error == 0) {
                var titles = data.content;
                var sug = titles.map(function (mytitle) {
                    return mytitle.title;
                });
            }
            else {
                sug = "no colleges found";
            }
            $("#searchcomp2").autocomplete({source: sug});


        });
    });

};


var compsearch3=function() {

    $("#searchcomp3").focusin(function () {

        var search = $("#searchcomp2").val();

        $.post(site_url + "Yescolleges/getsearchcollege", {"data": search}, function (data) {


            if (data.error == 0) {
                var titles = data.content;
                var sug = titles.map(function (mytitle) {
                    return mytitle.title;
                });
            }
            else {
                sug = "no colleges found";
            }
            $("#searchcomp3").autocomplete({source: sug});

        });
    });

};

var getcomparedcollege=function () {



        $.post(site_url + "Yescolleges/getComparedcollege", {clgid: clgid}, function (data) {

            var content = data.content;

            var listdata = "";
            for (var mydata in content) {
                var clg = content[mydata];
                $("#topname").html(clg.shortname);
                $("#cname").html(clg.title);
                $("#location").html(clg.city + ',&nbsp;' + clg.district + ',&nbsp;' + clg.state);
                $("#addr").html(clg.address);
                $("#aff").html(clg.subtitle);
                $("#type").html(clg.type);
                $("#university").html(clg.university);


                listdata += '<ul>';
                if (clg.f_hostel == 1) listdata += '<li>Hostel</li>';
                if (clg.f_library == 1) listdata += '<li>Library</li>';
                if (clg.f_canteen == 1) listdata += '<li>Canteen</li>';
                if (clg.f_bus == 1) listdata += '<li>College Bus</li>';
                if (clg.f_wifi == 1) listdata += '<li>Wifi-campus</li>';
                if (clg.f_sports == 1) listdata += '<li>Sports/Playground</li>';
                listdata += '</ul>';

                $("#listfeatures").html(listdata);

                getCourses(clgid);
            }
        });

};


var getcomparedcollege2=function () {


    $("#compareform2").submit(function (e) {

        e.preventDefault();
        var val2 = $("#searchcomp2").val();

        $.post(site_url+"Yescolleges/getComparedcollegebyname", {id: val2}, function (data) {

            var content = data.content;
            var listdata2 = "";
            for (var mydata in content) {
                var clg = content[mydata];
                $("#topname2").html(clg.shortname);
                $("#cname2").html(clg.title);
                $("#location2").html(clg.city + ',&nbsp;' + clg.district + ',&nbsp;' + clg.state);
                $("#addr2").html(clg.address);
                $("#aff2").html(clg.subtitle);
                $("#type2").html(clg.type);
                $("#university2").html(clg.university);


                listdata2 += '<ul>';
                if (clg.f_hostel == 1) listdata2 += '<li>Hostel</li>';
                if (clg.f_library == 1) listdata2 += '<li>Library</li>';
                if (clg.f_canteen == 1) listdata2 += '<li>Canteen</li>';
                if (clg.f_bus == 1) listdata2 += '<li>College Bus</li>';
                if (clg.f_wifi == 1) listdata2 += '<li>Wifi-campus</li>';
                if (clg.f_sports == 1) listdata2 += '<li>Sports/Playground</li>';
                listdata2 += '</ul>';

                $("#listfeatures2").html(listdata2);


                    getCourses2(clg.id);



            }
        });
    });
};

var getcomparedcollege3=function () {

    $("#compareform3").submit(function (e) {
        e.preventDefault();
        var val3 = $("#searchcomp3").val();
        $.post(site_url+"Yescolleges/getComparedcollegebyname", {id: val3}, function (data) {

            var content = data.content;
            var listdata3 = "";
            for (var mydata in content) {
                var clg = content[mydata];
                $("#topname3").html(clg.shortname);
                $("#cname3").html(clg.title);
                $("#location3").html(clg.city + ',&nbsp;' + clg.district + ',&nbsp;' + clg.state);
                $("#addr3").html(clg.address);
                $("#aff3").html(clg.subtitle);
                $("#type3").html(clg.type);
                $("#university3").html(clg.university);

                listdata3 += '<ul>';
                if (clg.f_hostel == 1) listdata3 += '<li>Hostel</li>';
                if (clg.f_library == 1) listdata3 += '<li>Library</li>';
                if (clg.f_canteen == 1) listdata3 += '<li>Canteen</li>';
                if (clg.f_bus == 1) listdata3 += '<li>College Bus</li>';
                if (clg.f_wifi == 1) listdata3 += '<li>Wifi-campus</li>';
                if (clg.f_sports == 1) listdata3 += '<li>Sports/Playground</li>';
                listdata3 += '</ul>';

                $("#listfeatures3").html(listdata3);


                    getCourses3(clg.id);

            }
        });
    });
};


var getCourses=function (id) {

    $.post(site_url+"Yescolleges/getCourses",{id:id},function (data) {

        var courselist='';

        content=data.content;
        courselist+='<option>select course here</option>';
        for(var contents in content){
            var course=content[contents];

            courselist+='<option>'+course.name+'</option>';

        }
        $("#courseselect1").show();
        $("#courseselect1").html(courselist);
    });

    $("#courseselect1").change(function()
    {
        var selected=$(this).val();
        var coursedetails="";
        var flag=0;
        $.post(site_url+"Yescolleges/getSelectedCourse",{id:id,select:selected},function (data) {

            var content=data.content;

            for(var contents in content) {

                var course=content[contents];

                var flag=1;
                if(flag==1){$("#coursetr").show();}
                coursedetails += '<ul>';
                coursedetails += '<li><b>Category : </b>'+ course.category + '</li>';
                coursedetails += '<li><b>Level : </b>'+ course.level + '</li>';
                coursedetails += '<li><b>Scheme : </b>'+ course.scheme + '</li>';
                coursedetails += '<li><b>Total seats : </b>'+ course.totalseats + '</li>';
                coursedetails += '<li><b>Eligibilty : </b>'+ course.eligibility + '</li>';
                coursedetails += '<li><b>Duration : </b>'+ course.duration + '</li>';


                coursedetails += '<li style="font-size: 20px;color: darkgray"><b>Course Fee : </b>'+ course.fees + '</li>';


                coursedetails += '</ul>';

            }


            $("#selectcourses1").html(coursedetails);

        });


    });


};
var getCourses2=function (id) {


alert();
    $.post(site_url+"Yescolleges/getCourses", {id: id}, function (data) {

        console.log(data);
        var courselist = '';
        content = data.content;
        courselist+='<option>select course here</option>';
        for (var contents in content) {
            var course = content[contents];

            courselist+='<option>'+course.name+'</option>';

        }


        $("#courseselect2").show();
        $("#courseselect2").html(courselist);
    });

    $("#courseselect2").change(function() {
        var selected = $(this).val();
        var coursedetails = "";
        var flag=0;
        $.post(site_url+"Yescolleges/getSelectedCourse", {id: id, select: selected}, function (data) {



            var content = data.content;

            for (var contents in content) {
                var flag=1;
                if(flag==1){$("#coursetr").show();}
                var course = content[contents];

                coursedetails += '<ul>';
                coursedetails += '<li><b>Category : </b>' + course.category + '</li>';
                coursedetails += '<li><b>Level : </b>' + course.level + '</li>';
                coursedetails += '<li><b>Scheme : </b>' + course.scheme + '</li>';
                coursedetails += '<li><b>Total seats : </b>' + course.totalseats + '</li>';
                coursedetails += '<li><b>Eligibilty : </b>' + course.eligibility + '</li>';
                coursedetails += '<li><b>Duration : </b>' + course.duration + '</li>';


                coursedetails += '<li style="font-size: 20px;color: darkgray"><b>Course Fee : </b>' + course.fees + '</li>';


                coursedetails += '</ul>';

            }


            $("#selectcourses2").html(coursedetails);
        });
    });
};


var getCourses3=function (id) {

    $.post(site_url+"Yescolleges/getCourses",{id:id},function (data) {


        var courselist='';
        var flag=0;
        content=data.content;
        courselist+='<option>select course here</option>';
        for(var contents in content){
            var course=content[contents];

            courselist+='<option>'+course.name+'</option>';

        }

        $("#courseselect3").show();
        $("#courseselect3").html(courselist);
    });

    $("#courseselect3").change(function() {
        var selected = $(this).val();
        var coursedetails = "";
        $.post(site_url+"Yescolleges/getSelectedCourse", {id: id, select: selected}, function (data) {



            var content = data.content;

            for (var contents in content) {
                var flag=1;
                if(flag==1){$("#coursetr").show();}

                var course = content[contents];

                coursedetails += '<ul>';
                coursedetails += '<li><b>Category : </b>' + course.category + '</li>';
                coursedetails += '<li><b>Level : </b>' + course.level + '</li>';
                coursedetails += '<li><b>Scheme : </b>' + course.scheme + '</li>';
                coursedetails += '<li><b>Total seats : </b>' + course.totalseats + '</li>';
                coursedetails += '<li><b>Eligibilty : </b>' + course.eligibility + '</li>';
                coursedetails += '<li><b>Duration : </b>' + course.duration + '</li>';


                coursedetails += '<li style="font-size: 20px;color: darkgray"><b>Course Fee : </b>' + course.fees + '</li>';


                coursedetails += '</ul>';

            }


            $("#selectcourses3").html(coursedetails);
        });
    });
};


var getSimiliarclg=function () {

    var id=clgid;
    $.post(site_url+"Yescolleges/getComparesimiliar",{id:id},function (data) {

        console.log(data);

        var smclg = "";
        var content=data.content;
        for(var smg in content){
            var smgdata=content[smg];


            smclg+='<div id="content" onclick="addcompare(\'' + smgdata.title + '\');">';
            smclg+='<div class="col-sm-5">';
            smclg+='<a href="#"><img src="'+smgdata.logo+'" class="img-responsive" alt="product 1">';
            smclg+='</div>';
            smclg+='<div class="col-sm-7">';
            smclg+='<h4>'+smgdata.shortname+'</h4>';
            smclg+='<h6>'+smgdata.district+'</h6>';
            smclg+='<small><a>Add to compare</a></small></a>';
            smclg+='</div>';
            smclg+='</div>';
        }
        $("#comparedsimilarclg").html(smclg);
    }).done(function () {
        $('.updates').slick({

            infinite: true,
            dots: false,
            speed: 800,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,

                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }

            ]
        });
    });
};

var addcompare=function (name) {
    $("#searchcomp2").val(name);
    $("#compareform2").submit();
};


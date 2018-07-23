$(function () {
    getcomparedcollege();
    getcomparedcollege2();
    clgsearch();





    $("#searchclg").autocomplete({
        autoFocus: true,
        select: function(event, ui) {
            $(event.target).val(ui.item.value);
            $('#searchclgform').submit();
            //window.location.href="college-profile-view/"+$("#search_query").val();
            return false;
        }
    });

});



var clgsearch=function() {

    $("#searchclg").focusin(function () {

        var search = $("#searchclg").val();

        $.post(site_url + "Yescolleges/getsearchcollege", {"data": search}, function (data) {

            if (data.error == 0) {
                var titles = data.content;
                var sug = titles.map(function (mytitle) {
                    return mytitle.title+"("+mytitle.shortname+")";
                });
            }
            else {
                sug = "no colleges found";
            }
            $("#searchclg").autocomplete({source: sug});


        });
    });

};


var getcomparedcollege=function () {



    $.post(site_url + "Yescolleges/getComparedcollege", {clgid: clgid}, function (data) {

        var content = data.content;

        var listdata = "";
        for (var mydata in content) {
            var clg = content[mydata];

            $("#clgimage1").attr('src',clg.profile);
            $("#clg1name").html(clg.title);
            $("#clg1type").html(clg.type);
            $("#clgtype1").html(clg.type);
            $("#clglocation1").html(clg.city + ',&nbsp;' + clg.district + ',&nbsp;' + clg.state);
            $("#clgaddr1").html(clg.address);
            $("#clgaff1").html(clg.subtitle);
            $("#clguniversity1").html(clg.university);



            getCourses(clgid);
        }
    });

};




var getcomparedcollege2=function () {



    $("#searchclgform").submit(function (e) {

        e.preventDefault();
        var val2 = $("#searchclg").val();

        $.post(site_url+"Yescolleges/getComparedcollegebyname", {id: val2}, function (data) {


            var content = data.content;
            var listdata2 = "";
            for (var mydata in content) {
                var clg = content[mydata];

                $("#clgimage2").attr('src',clg.profile);

                $("#clg2name").html(clg.title);
                $("#clg2type").html(clg.type);
                $("#clgtype2").html(clg.type);
                $("#clglocation2").html(clg.city + ',&nbsp;' + clg.district + ',&nbsp;' + clg.state);
                $("#clgaddr2").html(clg.address);
                $("#clgaff2").html(clg.subtitle);
                $("#clguniversity2").html(clg.university);


                getCourses2(clg.id);



            }
        });
    });
};




var getCourses=function (id) {

    $.post(site_url+"Yescolleges/getCourses",{id:id},function (data) {


        var courselist='';


        content=data.content;
        if(data.error==0){courselist+='<option>select course here</option>';}
        if(data.error==1){courselist+='<option>No courses found</option>';}
        for(var contents in content){
            var course=content[contents];

            courselist+='<option value="'+course.couid+'">'+course.name+'</option>';

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
                if(flag==1){$("#coursedetails").show();}

                coursedetails += '<ul style="list-style: none">';
                coursedetails += '<li><b>Category : </b>'+ course.categoryname + '</li>';
                coursedetails += '<li><br></li>';
                coursedetails += '<li><b>Duration : </b>'+ course.duration + '</li>';
                coursedetails += '<li><br></li>';
                coursedetails += '<li><b>Level : </b>'+ course.level + '</li>';
                coursedetails += '<li><br></li>';
                coursedetails += '<li><b>Scheme : </b>'+ course.scheme + '</li>';
                coursedetails += '<li><br></li>';
                coursedetails += '<li><b>Total seats : </b>'+ course.totalseats + '</li>';
                coursedetails += '<li><br></li>';
                coursedetails += '<li style="font-size: 15px;color: darkgray"><b>Course Fee : </b>'+ course.fees + '</li>';
                coursedetails += '<li><br></li>';
                coursedetails += '<li><b>Eligibilty : </b>'+ course.eligibility + '</li>';


                coursedetails += '</ul>';

            }


            $("#selectcourses1").html(coursedetails);

        });


    });


};



var getCourses2=function (id) {


    $.post(site_url+"Yescolleges/getCourses2",{id:id},function (data) {

        var courselist='';

        content=data.content;
        if(data.error==0){courselist+='<option>select course here</option>';}
        if(data.error==1){courselist+='<option>No courses found</option>';}
        for(var contents in content){
            var course=content[contents];

            courselist+='<option value="'+course.couid+'">'+course.name+'</option>';

        }
        $("#courseselect2").show();
        $("#courseselect2").html(courselist);
    });

    $("#courseselect2").change(function()
    {

        var selected=$(this).val();

        var coursedetails="";
        var flag=0;
        $.post(site_url+"Yescolleges/getSelectedCourse2",{id:id,select:selected},function (data) {

            var content=data.content;

            for(var contents in content) {

                var course=content[contents];

                var flag=1;
                if(flag==1){$("#coursedetails").show();}

                coursedetails += '<ul style="list-style: none">';
                coursedetails += '<li><b>Category : </b>'+ course.categoryname + '</li>';
                coursedetails += '<li><br></li>';
                coursedetails += '<li><b>Duration : </b>'+ course.duration + '</li>';
                coursedetails += '<li><br></li>';
                coursedetails += '<li><b>Level : </b>'+ course.level + '</li>';
                coursedetails += '<li><br></li>';
                coursedetails += '<li><b>Scheme : </b>'+ course.scheme + '</li>';
                coursedetails += '<li><br></li>';
                coursedetails += '<li><b>Total seats : </b>'+ course.totalseats + '</li>';
                coursedetails += '<li><br></li>';
                coursedetails += '<li style="font-size: 15px;color: darkgray"><b>Course Fee : </b>'+ course.fees + '</li>';
                coursedetails += '<li><br></li>';
                coursedetails += '<li><b>Eligibilty : </b>'+ course.eligibility + '</li>';


                coursedetails += '</ul>';

            }


            $("#selectcourses2").html(coursedetails);

        });


    });


};
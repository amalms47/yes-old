$(function(){

    $('.stateselect').on('click ', function(event){
        var state=$("input[name='stateselect']:checked").val();

        $("#streamslide").slideUp();
        $("#sortcity").slideDown();

        getcity(state);
    });

    $('.streamsearch').on('click ', function(event){
        var stream=$("input[name='streamsearch']:checked").val();
        getresult(1);
    });

    $('.stateselect').on('click ', function(event){

        var state=$("input[name='stateselect']:checked").val();
        getresult(1);
    });


    search();
    getresult(1);
    getchoice();
});

var search=function ()
{
    $("#searchsubmit").on("submit",function(event)
    {
        event.preventDefault();
        getresult(1);
    }) ;
};

var getresult=function (page)
{

    $.urlParam = function(name){
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results==null){
            return null;
        }
        else{
            return results[1] || 0;
        }
    };

    var urlstream=$.urlParam('q');


    var my_page=1;
    if(page!==null&&page!==undefined&&page!=="") {my_page=page;}
    var term=$("#search_term").val();
    var stream=$("input[name='streamsearch']:checked").val();
    var state=$("input[name='stateselect']:checked").val();
    var city=$("input[name='cityselect']:checked").val();
    $.post(site_url+"Yescolleges/getResult",{"term":term,"page":my_page,"stream":stream,"stream2":urlstream,"state":state,"city":city},function(data) {




        $("#search_term").val("");

        var clg= '';
        var page_cotent = '';
        if (data.iserror === "0") {
            var institutes = data.institutes;
            for (var institute in institutes) {
                var mydata = institutes[institute];

                clg+='<div class="cat-list-item fly-in">';
                clg+='<div class="cat-list-item-l">';
                clg+='<a><img alt="" src="'+mydata.profile+'" style="width: 240px;height: 160px;border-radius: 4px;"></a>';
                clg+='</div>';
                clg+='<div class="cat-list-item-r">';
                clg+='<div class="cat-list-item-rb">';
                clg+='<div class="cat-list-item-p">';
                clg+='<div class="cat-list-content">';
                clg+='<div class="cat-list-content-a">';
                clg+='<div class="cat-list-content-l">';
                clg+='<div class="cat-list-content-lb">';
                clg+='<div class="cat-list-content-lpadding">';
                clg+='<div class="offer-slider-link"><a target="_blank" href="javascript:void(0)" onclick="getcollegedata(\'' + mydata.slug + '\');">'+mydata.title+'</a></div>';
                clg+='<p>'+mydata.address+'</p>';
                clg+='<div class="offer-slider-location">'+mydata.type+'</div>';
                clg+='</div>';
                clg+='</div>';
                clg+='<br class="clear"/>';
                clg+='</div>';
                clg+='</div>';
                clg+='<div class="cat-list-content-r">';
                clg+='<div class="cat-list-content-p">';
                clg+='<nav class="stars">';
                clg+='<ul>';
               /* clg+='<li><a href="#"><img alt="" src="'+site_url+'assets/frontend/img/star-b.png" /></a></li>';
                clg+='<li><a href="#"><img alt="" src="'+site_url+'assets/frontend/img/star-b.png" /></a></li>';
                clg+='<li><a href="#"><img alt="" src="'+site_url+'assets/frontend/img/star-b.png" /></a></li>';
                clg+='<li><a href="#"><img alt="" src="'+site_url+'assets/frontend/img/star-b.png" /></a></li>';
                clg+='<li><a href="#"><img alt="" src="'+site_url+'assets/frontend/img/star-a.png" /></a></li>';
                clg+='</ul>';
                clg+='<div class="clear"></div>';
                clg+='</nav>';
                clg+='<div class="cat-list-review">0 reviews</div>';*/
                clg+='<div class="offer-slider-r">';

                clg+='</div>';
                clg+='<a href="javascript:void(0)"  class="cat-list-btn" style="background-color: #455B45;color: white" onclick="getcollegedata(\'' + mydata.slug + '\');" target="_blank">APPLY</a>';
                clg+='</div>';
                clg+='</div>';
                clg+='<div class="clear"></div>';
                clg+='</div>';
                clg+='</div>';
                clg+='</div>';
                clg+='<br class="clear" />';
                clg+='</div>';
                clg+='<div class="clear"></div>';
                clg+=' </div>';

            }
            $("#pages").removeClass('hidden');
            var page_cotent = '';
            var page_count = data.page_count;

            if(my_page>1)

                page_cotent+='<li><a style="width: 120px;font-weight:bold;border: none;color: #595c60" href="javascript:void(0)" class="page-prev" onclick="getresult('+(my_page-1)+')"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;...PREV</a></li>';

            if(my_page<page_count)
                page_cotent+='<li><a style="width: 120px;font-weight:bold;border: none;color: #595c60" href="javascript:void(0)" class="page-prev" onclick="getresult('+(my_page+1)+')">NEXT...&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a></li>';


            $('#pages').html(page_cotent);

        }
        else {

            var url=site_url+'assets/backend/images/collegeprofile/none.jpg';
            clg+='<div class="cat-list-item fly-in">';
            clg+='<div class="cat-list-item-l">';
            clg+='<a><img alt="" src="'+url+'" style="width: 240px;height: 160px;"></a>';
            clg+='</div>';
            clg+='<div class="cat-list-item-r">';
            clg+='<div class="cat-list-item-rb">';
            clg+='<div class="cat-list-item-p">';
            clg+='<div class="cat-list-content">';
            clg+='<div class="cat-list-content-a">';
            clg+='<div class="cat-list-content-l">';
            clg+='<div class="cat-list-content-lb">';
            clg+='<div class="cat-list-content-lpadding">';

            clg+='<p>No colleges found on this details</p>';
            clg+='</div>';
            clg+='</div>';
            clg+='<br class="clear"/>';
            clg+='</div>';
            clg+='</div>';

            clg+='<div class="clear"></div>';
            clg+='</div>';
            clg+='</div>';
            clg+='</div>';
            clg+='<br class="clear" />';
            clg+='</div>';
            clg+='<div class="clear"></div>';
            clg+=' </div>';

            $("#pages").addClass('hidden');
        }
        if (data.inst_count > 0) {
            $("#searchcount").html(data.inst_count);
        }
        else {
            $("#searchcount").html(0);
        }
        $("#searchcollegelist").html(clg);


    });

};


var getcollegedata=function(name){

    var insname=name.replace(/\s/g,"-");

    window.open(site_url+"college/"+insname, '_blank');


};



var comparecollege=function(name,id){

    var insname=name.replace(/\s/g,"-");
    window.location.href=site_url+"compare-colleges/"+insname+"/"+id;

};

var getchoice=function () {



};

var getcity=function (state) {


    if (state=='Kerala') {

        var kerala = ["Alappuzha","Ernakulam","Idukki","Kannur","Kasaragod","Kollam","Kottayam","Kozhikode","Malappuram","Palakkad","Pathanamthitta","Thrissur","Thiruvananthapuram","Wayanad"];
        $(function() {
            var options = '';
            for (var i = 0; i < kerala.length; i++) {

                options+='<div class="checkbox">';
                options+='<label><input type="radio" class="cityselect" name="cityselect" value="' + kerala[i] + '" />&nbsp;' + kerala[i] + ' </label>';
                options+='</div>';
            }
            $('#listcity').html(options);
        });
    }

    if (state=='Tamilnadu') {

        var Tamilnadu = ["Ariyalur","Chennai","Coimbatore","Cuddalore","Dharmapuri","Dindigul","Erode","Kanchipuram","Kanyakumari","Karur","Krishnagiri","Madurai","Mandapam","Nagapattinam","Nilgiris","Namakkal","Perambalur","Pudukkottai","Ramanathapuram","Salem","Sivaganga","Thanjavur","Thiruvallur","Tirupur",
            "Tiruchirapalli","Theni","Tirunelveli","Thanjavur","Thoothukudi","Tiruvallur","Tiruvannamalai","Vellore","Villupuram","Viruthunagar"];
        $(function() {
            var options = '';
            for (var i = 0; i < Tamilnadu.length; i++) {

                options+='<div class="checkbox">';
                options+='<label><input type="radio" class="cityselect" name="cityselect" value="' + Tamilnadu[i] + '" />&nbsp;' + Tamilnadu[i] + ' </label>';
                options+='</div>';
            }
            $('#listcity').html(options);
        });
    }


    if (state=='Karnataka') {

        var karnataka = ["Bagalkot","Bangalore","Bangalore Urban","Belgaum","Bellary","Bidar","Bijapur","Chamarajnagar", "Chikkamagaluru","Chikkaballapur",
            "Chitradurga","Davanagere","Dharwad","Dakshina Kannada","Gadag","Gulbarga","Hassan","Haveri district","Kodagu",
            "Kolar","Koppal","Mandya","Mysore","Raichur","Shimoga","Tumkur","Udupi","Uttara Kannada","Ramanagara","Yadgir"];
        $(function() {
            var options = '';
            for (var i = 0; i < karnataka.length; i++) {

                options+='<div class="checkbox">';
                options+='<label><input type="radio" class="cityselect" name="cityselect" value="' + karnataka[i] + '" />&nbsp;' + karnataka[i] + ' </label>';
                options+='</div>';
            }
            $('#listcity').html(options);
        });
    }


    if (state=='Maharashtra') {

        var maharashtra = ["Ahmednagar","Akola","Alibag","Amaravati","Arnala","Aurangabad","Aurangabad","Bandra","Bassain","Belapur","Bhiwandi","Bhusaval","Borliai-Mandla","Chandrapur","Dahanu","Daulatabad","Dighi (Pune)","Dombivali","Goa","Jaitapur","Jalgaon",
           "Miraj","Mumbai (ex Bombay)","Murad","Nagapur","Nagpur","Nalasopara","Nanded","Nandgaon","Nasik","Navi Mumbai","Nhave","Osmanabad","Palghar",
            "Panvel","Pimpri","Pune","Ratnagiri","Sholapur","Thane","Trombay","Varsova","Vengurla","Virar","Wada"];
        $(function() {
            var options = '';
            for (var i = 0; i < maharashtra.length; i++) {

                options+='<div class="checkbox">';
                options+='<label><input type="radio" class="cityselect" name="cityselect" value="' + maharashtra[i] + '" />&nbsp;' + maharashtra[i] + ' </label>';
                options+='</div>';
            }
            $('#listcity').html(options);
        });
    }

    if (state=='Arunanchal Pradesh') {

        var ap = ["Anjaw","Changlang","Dibang Valley","East Siang","East Kameng","Kurung Kumey","Lohit","Longding","Lower Dibang Valley","Lower Subansiri","Papum Pare",
            "Tawang","Tirap","Upper Siang","Upper Subansiri","West Kameng","West Siang"];
        $(function() {
            var options = '';
            for (var i = 0; i < ap.length; i++) {

                options+='<div class="checkbox">';
                options+='<label><input type="radio" class="cityselect" name="cityselect" value="' + ap[i] + '" />&nbsp;' + ap[i] + ' </label>';
                options+='</div>';
            }
            $('#listcity').html(options);
        });
    }


    $('.cityselect').on('click ', function(event){
        $("#stateslide").slideUp();
        var city=$("input[name='cityselect']:checked").val();
        getresult(1);
    });

};
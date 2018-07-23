

<!-- Footer  -->

<footer class="nb-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="about">
                    <!--<img src="" class="img-responsive center-block" alt="IMAGE-LOGO">-->
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, non temporibus sed, ipsum molestias quasi officia harum possimus omnis doloremque expedita minima earum assumenda sit cum dolorem incidunt ipsa. Ipsam.</p>

                    <div class="social-media">
                        <ul class="list-inline">
                            <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-info-single">
                    <h2 class="title">Help Center</h2>
                    <ul class="list-unstyled">
                        <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> How to Pay</a></li>
                        <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> FAQ's</a></li>
                        <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> Sitemap</a></li>
                        <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> Delivery Info</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-info-single">
                    <h2 class="title">Customer information</h2>
                    <ul class="list-unstyled">
                        <li><a href="<?=base_url();?>institution-login" title=""><i class="fa fa-angle-double-right"></i> College Login</a></li>
                        <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> FAQ's</a></li>
                        <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> Sell Your Items</a></li>
                        <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> Contact Us</a></li>
                        <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> RSS</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-info-single">
                    <h2 class="title">Security & privacy</h2>
                    <ul class="list-unstyled">
                        <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> Terms Of Use</a></li>
                        <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> Privacy Policy</a></li>
                        <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> Return / Refund Policy</a></li>
                        <li><a href="http://www.nextbootstrap.com/" title=""><i class="fa fa-angle-double-right"></i> Store Locations</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-info-single">
                    <h2 class="title">NEWSLETTER</h2>
                    <p>Subscribe to our news letter for latest update, news & academic offers :</p>
                    <p>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="enter e-mail..">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-envelope"></span></button>
                      </span>
                    </div><!-- /input-group -->
                    </p>

                </div>
            </div>
        </div>
    </div>

    <section class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <p>Copyright &copy; 2017 Yescolleges. All rights reserved.</p>
                </div>
                <div class="col-sm-6"></div>
            </div>
        </div>
    </section>
</footer>

<!-- End of Footer -->

<script src="<?=base_url();?>assets/frontend/js/script.js" type="text/javascript" charset="utf-8"></script>




<script src="<?=base_url();?>assets/frontend/slick/slick.js" type="text/javascript" charset="utf-8"></script>


<script>
    $(document).ready(function(){
        $(".dropdown").hover(
            function() {
                $('.dropdown-menu', this).stop( true, true ).slideDown("slow");
                $(this).toggleClass('open');
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
                $(this).toggleClass('open');
            }
        );
    });

</script>

<script>
    /*global $ */
    $(document).ready(function () {

        "use strict";

        $('.menu > ul > li:has( > ul)').addClass('menu-dropdown-icon');
        //Checks if li has sub (ul) and adds class for toggle icon - just an UI


        $('.menu > ul > li > ul:not(:has(ul))').addClass('normal-sub');
        //Checks if drodown menu's li elements have anothere level (ul), if not the dropdown is shown as regular dropdown, not a mega menu (thanks Luka Kladaric)

        $(".menu > ul").before("<a href=\"#\" class=\"menu-mobile\"><img src=\"<?=base_url();?>assets/frontend/img/logo-lat.gif\" style=\"margin-top:-10px;\" alt=\"\" width=\"40%\" height=\"40%\"></a>");

        //Adds menu-mobile class (for mobile toggle menu) before the normal menu
        //Mobile menu is hidden if width is more then 959px, but normal menu is displayed
        //Normal menu is hidden if width is below 959px, and jquery adds mobile menu
        //Done this way so it can be used with wordpress without any trouble

        $(".menu > ul > li").hover(function (e) {
            if ($(window).width() > 943) {
                $(this).children("ul").stop(true, false).fadeToggle(150);
                e.preventDefault();
            }
        });
        //If width is more than 943px dropdowns are displayed on hover

        $(".menu > ul > li").click(function () {
            if ($(window).width() <= 943) {
                $(this).children("ul").fadeToggle(150);
            }
        });
        //If width is less or equal to 943px dropdowns are displayed on click (thanks Aman Jain from stackoverflow)

        $(".menu-mobile").click(function (e) {
            $(".menu > ul").toggleClass('show-on-mobile');
            e.preventDefault();
        });
        //when clicked on mobile-menu, normal menu is shown as a list, classic rwd menu story (thanks mwl from stackoverflow)

    });
</script>

<!-- SLider featured colleges -->

<!-- End  of Featured colleges  -->
<script>
    $('#search-type').change(function() {
        $('#search-query').prop('placeholder',$(this).val());
    });
</script>


<script>
    $(document).ready(function(){
        $('.sub-menu-management').removeClass('hidden');
    });
</script>
<script type="text/javascript">

    $("#management").hover(function(){
        $('.sub-menu-management').removeClass('hidden');
        $('.sub-menu-arts').addClass('hidden');
        $('.sub-menu-engineering').addClass('hidden');
        $('.sub-menu-medical').addClass('hidden');
        $('.sub-menu-law').addClass('hidden');
        $('.sub-menu-computer-application').addClass('hidden');
        $('.sub-menu-paramedical').addClass('hidden');
        $('.sub-menu-aviation').addClass('hidden');
    });

    $("#engineering").hover(function(){
        $('.sub-menu-management').addClass('hidden');
        $('.sub-menu-arts').addClass('hidden');
        $('.sub-menu-medical').addClass('hidden');
        $('.sub-menu-law').addClass('hidden');
        $('.sub-menu-computer-application').addClass('hidden');
        $('.sub-menu-paramedical').addClass('hidden');
        $('.sub-menu-aviation').addClass('hidden');
        $('.sub-menu-engineering').removeClass('hidden');
    });

    $("#medical").hover(function(){
        $('.sub-menu-management').addClass('hidden');
        $('.sub-menu-engineering').addClass('hidden');
        $('.sub-menu-arts').addClass('hidden');
        $('.sub-menu-law').addClass('hidden');
        $('.sub-menu-computer-application').addClass('hidden');
        $('.sub-menu-paramedical').addClass('hidden');
        $('.sub-menu-aviation').addClass('hidden');
        $('.sub-menu-medical').removeClass('hidden');
    });

    $("#arts").hover(function(){
        $('.sub-menu-management').addClass('hidden');
        $('.sub-menu-engineering').addClass('hidden');
        $('.sub-menu-medical').addClass('hidden');
        $('.sub-menu-law').addClass('hidden');
        $('.sub-menu-computer-application').addClass('hidden');
        $('.sub-menu-paramedical').addClass('hidden');
        $('.sub-menu-aviation').addClass('hidden');
        $('.sub-menu-arts').removeClass('hidden');
    });

    $("#law").hover(function(){
        $('.sub-menu-management').addClass('hidden');
        $('.sub-menu-engineering').addClass('hidden');
        $('.sub-menu-medical').addClass('hidden');
        $('.sub-menu-arts').addClass('hidden');
        $('.sub-menu-computer-application').addClass('hidden');
        $('.sub-menu-paramedical').addClass('hidden');
        $('.sub-menu-aviation').addClass('hidden');
        $('.sub-menu-law').removeClass('hidden');
    });

    $("#computer-application").hover(function(){
        $('.sub-menu-management').addClass('hidden');
        $('.sub-menu-engineering').addClass('hidden');
        $('.sub-menu-medical').addClass('hidden');
        $('.sub-menu-law').addClass('hidden');
        $('.sub-menu-arts').addClass('hidden');
        $('.sub-menu-paramedical').addClass('hidden');
        $('.sub-menu-aviation').addClass('hidden');
        $('.sub-menu-computer-application').removeClass('hidden');
    });

    $("#paramedical").hover(function(){
        $('.sub-menu-management').addClass('hidden');
        $('.sub-menu-engineering').addClass('hidden');
        $('.sub-menu-medical').addClass('hidden');
        $('.sub-menu-law').addClass('hidden');
        $('.sub-menu-computer-application').addClass('hidden');
        $('.sub-menu-arts').addClass('hidden');
        $('.sub-menu-aviation').addClass('hidden');
        $('.sub-menu-paramedical').removeClass('hidden');
    });

    $("#aviation").hover(function(){
        $('.sub-menu-management').addClass('hidden');
        $('.sub-menu-engineering').addClass('hidden');
        $('.sub-menu-medical').addClass('hidden');
        $('.sub-menu-law').addClass('hidden');
        $('.sub-menu-computer-application').addClass('hidden');
        $('.sub-menu-paramedical').addClass('hidden');
        $('.sub-menu-arts').addClass('hidden');
        $('.sub-menu-aviation').removeClass('hidden');
    });

</script>



<script>
    $(document).ready(function(){
        $('.sub-menu-management').removeClass('hidden');
    });
</script>
<script type="text/javascript">

    $("#management").hover(function(){
        $('.sub-menu-management').removeClass('hidden');
        $('.sub-menu-arts').addClass('hidden');
        $('.sub-menu-engineering').addClass('hidden');
        $('.sub-menu-medical').addClass('hidden');
        $('.sub-menu-law').addClass('hidden');
        $('.sub-menu-computer-application').addClass('hidden');
        $('.sub-menu-paramedical').addClass('hidden');
        $('.sub-menu-aviation').addClass('hidden');
    });

    $("#engineering").hover(function(){
        $('.sub-menu-management').addClass('hidden');
        $('.sub-menu-arts').addClass('hidden');
        $('.sub-menu-medical').addClass('hidden');
        $('.sub-menu-law').addClass('hidden');
        $('.sub-menu-computer-application').addClass('hidden');
        $('.sub-menu-paramedical').addClass('hidden');
        $('.sub-menu-aviation').addClass('hidden');
        $('.sub-menu-engineering').removeClass('hidden');
    });

    $("#medical").hover(function(){
        $('.sub-menu-management').addClass('hidden');
        $('.sub-menu-engineering').addClass('hidden');
        $('.sub-menu-arts').addClass('hidden');
        $('.sub-menu-law').addClass('hidden');
        $('.sub-menu-computer-application').addClass('hidden');
        $('.sub-menu-paramedical').addClass('hidden');
        $('.sub-menu-aviation').addClass('hidden');
        $('.sub-menu-medical').removeClass('hidden');
    });

    $("#arts").hover(function(){
        $('.sub-menu-management').addClass('hidden');
        $('.sub-menu-engineering').addClass('hidden');
        $('.sub-menu-medical').addClass('hidden');
        $('.sub-menu-law').addClass('hidden');
        $('.sub-menu-computer-application').addClass('hidden');
        $('.sub-menu-paramedical').addClass('hidden');
        $('.sub-menu-aviation').addClass('hidden');
        $('.sub-menu-arts').removeClass('hidden');
    });

    $("#law").hover(function(){
        $('.sub-menu-management').addClass('hidden');
        $('.sub-menu-engineering').addClass('hidden');
        $('.sub-menu-medical').addClass('hidden');
        $('.sub-menu-arts').addClass('hidden');
        $('.sub-menu-computer-application').addClass('hidden');
        $('.sub-menu-paramedical').addClass('hidden');
        $('.sub-menu-aviation').addClass('hidden');
        $('.sub-menu-law').removeClass('hidden');
    });

    $("#computer-application").hover(function(){
        $('.sub-menu-management').addClass('hidden');
        $('.sub-menu-engineering').addClass('hidden');
        $('.sub-menu-medical').addClass('hidden');
        $('.sub-menu-law').addClass('hidden');
        $('.sub-menu-arts').addClass('hidden');
        $('.sub-menu-paramedical').addClass('hidden');
        $('.sub-menu-aviation').addClass('hidden');
        $('.sub-menu-computer-application').removeClass('hidden');
    });

    $("#paramedical").hover(function(){
        $('.sub-menu-management').addClass('hidden');
        $('.sub-menu-engineering').addClass('hidden');
        $('.sub-menu-medical').addClass('hidden');
        $('.sub-menu-law').addClass('hidden');
        $('.sub-menu-computer-application').addClass('hidden');
        $('.sub-menu-arts').addClass('hidden');
        $('.sub-menu-aviation').addClass('hidden');
        $('.sub-menu-paramedical').removeClass('hidden');
    });

    $("#aviation").hover(function(){
        $('.sub-menu-management').addClass('hidden');
        $('.sub-menu-engineering').addClass('hidden');
        $('.sub-menu-medical').addClass('hidden');
        $('.sub-menu-law').addClass('hidden');
        $('.sub-menu-computer-application').addClass('hidden');
        $('.sub-menu-paramedical').addClass('hidden');
        $('.sub-menu-arts').addClass('hidden');
        $('.sub-menu-aviation').removeClass('hidden');
    });

</script>

<script>
    $('.fixed-button').on('click', function(){
        $('.fixed-button').prev().toggle("swing")
    })
</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5877ec7c620a011eeac619da/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->

</body>
</html>
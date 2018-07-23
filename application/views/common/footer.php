
<footer class="footer-a">
    <div class="wrapper-padding">
        <div class="section">
            <div class="footer-lbl">Get In Touch</div>
            <div class="footer-adress">Yescolleges , Thevara, Kerala</div>
            <div class="footer-phones">+91 7356222466</div>
            <div class="footer-email">info@yescolleges.com</div>
            <!-- <div class="footer-skype">facebook.com/yescolleges</div> -->
        </div>

        <div class="section">
            <div class="footer-lbl">Yescolleges</div>
            <div class="twitter-wiget">
                <div class="footer-tour-a"><a href="<?=base_url()?>about" style="text-decoration: none;color: white">About Us</a></div>
            </div>
            <br>
            <div class="twitter-wiget">
                <div class="footer-tour-a"><a href="<?=base_url()?>vision-mission" style="text-decoration: none;color: white">Vision & Mission</a></div>
            </div>
            <br>
            <div class="twitter-wiget">
                <div class="footer-tour-a"><a href="<?=base_url()?>contact" style="text-decoration: none;color: white">Contact Us</a></div>
            </div>
            <br>
       <!--     <div class="twitter-wiget">
                <div class="footer-tour-a"><a href="<?=base_url()?>institution-login" style="text-decoration: none;color: white">Management Team</a></div>
            </div> -->
            <br>

        </div>

        <div class="section">
            <div class="footer-lbl">Colleges</div>

            <div class="twitter-wiget">
                <div class="footer-tour-a"><a href="<?=base_url()?>institution-login" style="text-decoration: none;color: white">College Login</a></div>
            </div>
            <br>
            <div class="twitter-wiget">
                <div class="footer-tour-a"><a href="<?=base_url()?>advertise-with-us" style="text-decoration: none;color: white">Advertise With Us</a></div>
            </div>
            <br>
            <div class="twitter-wiget">
                <div class="footer-tour-a"><a href="<?=base_url()?>institution-login" style="text-decoration: none;color: white">Sitemap</a></div>
            </div>
            <br>
            <!--  <div class="twitter-wiget">
                <div class="footer-tour-a"><a href="<?=base_url()?>institution-login" style="text-decoration: none;color: white">Colleges</a></div>
            </div> -->

        </div>

        <div class="section">
            <div class="footer-lbl">Others</div>

            <div class="twitter-wiget">
                <div class="footer-tour-a"><a href="<?=base_url()?>faq" style="text-decoration: none;color: white">FAQ</a></div>
            </div>
            <br>
            <div class="twitter-wiget">
                <div class="footer-tour-a"><a href="<?=base_url()?>institution-login" style="text-decoration: none;color: white">Terms of use</a></div>
            </div>
            <br>
            <div class="twitter-wiget">
                <div class="footer-tour-a"><a href="<?=base_url()?>institution-login" style="text-decoration: none;color: white">Privacy Policy</a></div>
            </div>
            <br>
            <div class="twitter-wiget">
                <div class="footer-tour-a"><a href="<?=base_url()?>institution-login" style="text-decoration: none;color: white">Return / Refund Policy</a></div>
            </div>
            <br>


        </div>
        <div class="section">
            <div class="footer-lbl">newsletter</div>

                <div class="footer-subscribe-a">
                    <input type="text" class="form-group" placeholder="your email" value="">
                </div>

            <button class="footer-subscribe-btn">Submit</button>
            <a href="https://msg91.com/startups/?utm_source=startup-banner"><img src="https://msg91.com/images/startups/msg91Badge.png" width="120" height="90" title="MSG91 - SMS for Startups" alt="Bulk SMS - MSG91"></a>

        </div>
       </div>
    <div class="clear"></div>
</footer>

<footer class="footer-b">
    <div class="wrapper-padding">
        <div class="footer-left">© Copyright 2017 by  . All rights reserved.</div>
        <!--<div class="footer-social">
            <a href="#" class="footer-twitter"></a>
            <a href="#" class="footer-facebook"></a>
            <a href="#" class="footer-vimeo"></a>
            <a href="#" class="footer-pinterest"></a>
            <a href="#" class="footer-instagram"></a>
        </div>-->
        <div class="clear"></div>
    </div>
</footer>


<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span></button>
                <h4 class="modal-title text-center">
                    <img src="<?= base_url()?>assets/images/logo-lat.gif">
                </h4>
            </div>
            <div class="modal-body">
                <p id="custom_message" class="text-bold text-danger text-center"></p>
            </div>
        </div>
    </div>
</div>



<!-- // scripts // -->
<script src="<?= base_url()?>assets/backend/plugins/jQueryValidation/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/backend/scripts/stud_login_index.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/frontend/js/idangerous.swiper.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/frontend/js/jqeury.appear.js"></script>

<script type="text/javascript" src="<?=base_url();?>assets/frontend/js/bxSlider.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/frontend/js/custom.select.js"></script>
<script type="text/javascript" src="https://yescolleges.azureedge.net/assets/frontend/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/frontend/js/slideInit.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/frontend/js/script.js?sd"></script>


<!-- \\ scripts \\ -->

<script>
    $(document).ready(function(){
        $('#search-type').change(function() {
            $('#search-query').prop('placeholder',$(this).val());
        });
    });
</script>

</body>
</html>
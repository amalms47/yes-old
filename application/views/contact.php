<script src="http://maps.google.com/maps/api/js?sensor=false"></script>

<!-- main-cont -->
<div class="main-cont">

    <input type="hidden" id="tagidsection" value="5">
    <div class="contacts-page-holder">
        <div class="contacts-page">

<br>
            <br>
            <div class="contacts-colls">
                <header class="page-lbl">
                    <div class="typography-heading">GET IN TOUCH WITH US</div>
                    <p>Don’t miss out your opportunities; Join hands with YesColleges today!</p>
                </header>
                <div class="contacts-colls-l">
                    <div class="contact-colls-lbl">OUR OFFICE</div>
                    <div class="contacts-colls-txt">
                        <p>Address: Yescolleges,Thevara,Kerala</p>
                        <p style="font-family: 'Montserrat', sans-serif">Mobile: +91 9539791917</p>
                        <p>E-mail: info@yescolleges.com</p>
                        <div class="side-social">
                            <a class="side-social-twitter" href="#"></a>
                            <a class="side-social-facebook" href="#"></a>
                            <a class="side-social-vimeo" href="#"></a>
                            <a class="side-social-pinterest" href="#"></a>
                            <a class="side-social-instagram" href="#"></a>
                        </div>
                    </div>
                </div>
                <div class="contacts-colls-r">
                    <div class="contacts-colls-rb">
                        <div class="contact-colls-lbl">Contact Us</div>
                        <div class="booking-form">
                            <form id="contact_form" action="post">
                                <div class="booking-form-i">
                                    <label>First Name:</label>
                                    <div class="input"><input type="text" name="FirstName" value="" /></div>
                                </div>
                                <div class="booking-form-i">
                                    <label>Last Name:</label>
                                    <div class="input"><input type="text" name="lastName" value="" /></div>
                                </div>
                                <div class="booking-form-i">
                                    <label>Email Adress:</label>
                                    <div class="input"><input type="text" name="Email" value="" /></div>
                                </div>
                                <div class="booking-form-i">
                                    <label>Website:</label>
                                    <div class="input"><input type="text" name="Website" value="" /></div>
                                </div>
                                <div class="booking-form-i textarea">
                                    <label>Message:</label>
                                    <div class="textarea-wrapper">
                                        <textarea name="Message"></textarea>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <button class="contacts-send">Send message</button>
                            </form>
                            <script type="text/javascript">
                                $(function () {
                                    $('#contact_form').ajaxForm({
                                        beforeSubmit : function() {return init_validation('#contact_form');},
                                        success : function() {
                                            alert('Your message has been sent!');
                                            $('#contact_form').resetForm();
                                        }
                                    });
                                });
                            </script>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>

            <div class="clear"></div>
        </div>
        <!-- MAP -->
        <div class="contacts-map">
            <div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d347.35957128220457!2d76.29562459509546!3d9.940203896682744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b0872f297ac5671%3A0xa33a86459377f9e7!2sYescolleges!5e0!3m2!1sen!2sin!4v1501501877348" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

            </div>
        </div>
        <!-- End of MAP -->
    </div>

</div>
<!-- /main-cont -->
<script>
    $(document).ready(function(){
        'use strict';
        (function($) {
            $(function() {
                $('.checkbox input').styler({
                    selectSearch: true
                });
            });
        })(jQuery);
    });
</script>
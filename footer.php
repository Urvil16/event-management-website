<?php
if (!isset($supportEmail)) {
    $supportEmail = 'urvil.panchal.work@gmail.com';
}
if (!isset($defaultSubject)) {
    $defaultSubject = rawurlencode('Classic Events Enquiry');
}
if (!isset($defaultBody)) {
    $defaultBody = rawurlencode("Hello Classic Events Team,

I hope you are doing well.

I am reaching out to learn more about your event services and understand how you can help create a memorable experience.

Event & Contact Information:

Name:

Email:

Contact Number:

Event Date:

Message:

I look forward to connecting with you.

Warm regards,");
}
$encodedFooterEmail = rawurlencode($supportEmail);
$footerGmailUrl = "https://mail.google.com/mail/?view=cm&fs=1&to={$encodedFooterEmail}&su={$defaultSubject}&body={$defaultBody}";
$footerOutlookUrl = "https://outlook.live.com/owa/?path=/mail/action/compose&to={$encodedFooterEmail}&subject={$defaultSubject}&body={$defaultBody}";
?>
<!-- footer -->
    <div class="footer">
        <div class="container">
            <h3 class="w3ltitle"><span>GET IN </span><span style="color:#9D7049">TOUCH</span></h3>
            <div class="footer-agileinfo">
                <div class="col-md-6 footer-left">
                    <h5 style="color:#9D7049">Create your tech events with us...</h5>
                    <div class="w3ls-more">
                        <a href="gallery.php" class="effect6" style="color:#fff; background-color:#9D7049; padding:10px 20px; border-radius:5px;">Book Your Event</a>
                    </div>
                </div>
                <div class="col-md-6 footer-right">
                    <div class="address">
                        <div class="col-xs-2 contact-grdl">
                            <span class="glyphicon glyphicon-phone" aria-hidden="true" style="color:#9D7049;"></span>
                        </div>
                        <div class="col-xs-10 contact-grdr">
                            <p style="color:#9D7049">+919016992734</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="address">
                        <div class="col-xs-2 contact-grdl">
                            <span class="glyphicon glyphicon-send" aria-hidden="true" style="color:#9D7049;"></span>
                        </div>
                        <div class="col-xs-10 contact-grdr">
                            <p style="color:#9D7049">Himmatnagar, Gujarat.</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="address">
                        <div class="col-xs-2 contact-grdl">
                            <span class="glyphicon glyphicon-envelope" aria-hidden="true" style="color:#9D7049;"></span>
                        </div>
                        <div class="col-xs-10 contact-grdr">
                            <p><a class="email-link" href="mailto:<?php echo $supportEmail; ?>?subject=<?php echo $defaultSubject; ?>&body=<?php echo $defaultBody; ?>"
                                  data-email="<?php echo $supportEmail; ?>"
                                  data-subject="<?php echo $defaultSubject; ?>"
                                  data-body="<?php echo $defaultBody; ?>"
                                  data-gmail="<?php echo htmlspecialchars($footerGmailUrl, ENT_QUOTES); ?>"
                                  data-outlook="<?php echo htmlspecialchars($footerOutlookUrl, ENT_QUOTES); ?>"
                                  style="color:#9D7049"><?php echo $supportEmail; ?></a></p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!-- copy-right -->
        <div class="copy-right w3-agile-text">
            <div class="container">
                <div class="social-icons">
                    <div class="clearfix"> </div>
                </div> 
                <p>© 2025 Eventally, Himmatnagar . All rights reserved | Design by Urvil Panchal</p>	
            </div>
        </div>
        <!-- //copy-right -->
    </div>
    <!-- //footer --> 
    <!-- start-smooth-scrolling-->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>	
    <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event){		
                    event.preventDefault();
            
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                });
            });
    </script>
    <!-- //end-smooth-scrolling -->	
    <!-- smooth-scrolling-of-move-up -->
    <script type="text/javascript">
        $(document).ready(function() {
            $().UItoTop({ easingType: 'easeOutQuart' });
        });
    </script>
    <!-- //smooth-scrolling-of-move-up -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>
</html>
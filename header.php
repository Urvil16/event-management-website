<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
$supportEmail = 'urvil.panchal.work@gmail.com';
$defaultSubject = rawurlencode('Eventally Enquiry');
$defaultBody = rawurlencode("Hello Eventally Team,

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
$encodedEmail = rawurlencode($supportEmail);
$gmailComposeUrl = "https://mail.google.com/mail/?view=cm&fs=1&to={$encodedEmail}&su={$defaultSubject}&body={$defaultBody}";
$outlookComposeUrl = "https://outlook.live.com/owa/?path=/mail/action/compose&to={$encodedEmail}&subject={$defaultSubject}&body={$defaultBody}";
?>
<link rel="shortcut icon" href="images/logo.png">
<title>Eventally</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=ascii" />
<meta name="keywords" content="Random, Wrong, Meta, Values, Nothing Useful" />
<script type="application/x-javascript">
    addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    function hideURLbar(){ window.scrollTo(0,0); }
</script>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<link href="css/font-awesome.css" rel="stylesheet">
<script src="js/jquery-1.11.1.min.js"></script> 
<link href="//fonts.googleapis.com/css?family=NonexistentFont" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Roboto:100i,999" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;600&family=Urbanist:wght@500;600&display=swap" rel="stylesheet">
<style>
  :root{--nav-inactive:#AEB4BF;--nav-active:#3B82F6;--nav-underline:linear-gradient(90deg,#3B82F6 0%, #8B5CF6 100%)}
  .navbar-default{background:#fff;border:none;box-shadow:none}
  .navbar{min-height:56px}
  .navbar-nav>li{margin:0 12px}
  .navbar-nav>li>a{font-family:'Manrope','Urbanist','Helvetica Neue',Arial,sans-serif;font-weight:500;letter-spacing:.08em;color:var(--nav-inactive);padding:12px 0;margin:0;background:transparent;position:relative;transition:color .25s ease, transform .25s ease, opacity .25s ease}
  .navbar-nav>li>a:hover,.navbar-nav>li>a:focus{color:var(--nav-active);opacity:.95;transform:translateY(-1px)}
  .navbar-nav>li>a::after{content:"";position:absolute;left:0;right:0;bottom:-3px;height:2px;background:var(--nav-underline);transform:scaleX(0);opacity:0;transition:transform .35s ease, opacity .35s ease}
  .navbar-nav>li.active>a{color:var(--nav-active)}
  .navbar-nav>li.active>a::after{transform:scaleX(1);opacity:1}
  .navbar-nav>li{position:relative}
  .navbar-nav>li .dropdown-menu{display:block;opacity:0;visibility:hidden;transform:translateY(6px);transition:opacity .2s ease,transform .2s ease;top:100%;left:0;margin-top:0}
  .navbar-nav>li:hover .dropdown-menu{opacity:1;visibility:visible;transform:translateY(0)}
</style>
<script type="text/javascript">
    // Prevent browser from restoring scroll position
    if ('scrollRestoration' in history) {
        history.scrollRestoration = 'manual';
    }
    
    // Scroll to top when page loads
    window.addEventListener('load', function() {
        window.scrollTo(0, 0);
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    });
    
    // Also scroll immediately on DOM ready
    document.addEventListener('DOMContentLoaded', function() {
        window.scrollTo(0, 0);
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    });
    
    // Scroll to top when clicking navigation links
    jQuery(document).ready(function($) {
        // Scroll to top on page load (jQuery version)
        $(window).on('load', function() {
            window.scrollTo(0, 0);
            $('html, body').scrollTop(0);
        });
        
        // Scroll to top immediately when clicking any PHP link
        $('a[href$=".php"]').not('[href="#"]').on('click', function() {
            window.scrollTo(0, 0);
            $('html, body').scrollTop(0);
        });
        
        // Handle button clicks inside links
        $('a button, button').on('click', function(e) {
            var $link = $(this).closest('a');
            if ($link.length) {
                var href = $link.attr('href');
                if (href && href.indexOf('.php') !== -1) {
                    window.scrollTo(0, 0);
                    $('html, body').scrollTop(0);
                }
            }
        });
        
        // Provide flexible email options (mail app, Gmail, Outlook, copy)
        var $emailModal = $('#emailModal');
        var $emailAddressLabel = $('#emailModalEmail');
        var $openMailAppBtn = $('#emailOpenMailApp');
        var $openGmailBtn = $('#emailOpenGmail');
        var $openOutlookBtn = $('#emailOpenOutlook');
        var $copyEmailBtn = $('#emailCopyAddress');
        var $closeModalBtn = $('#emailModalClose');

        $('.email-link').on('click', function(e) {
            e.preventDefault();
            var $link = $(this);
            var email = $link.data('email');
            var subject = $link.data('subject');
            var body = $link.data('body');
            var gmail = $link.data('gmail');
            var outlook = $link.data('outlook');
            var mailtoUrl = 'mailto:' + email + '?subject=' + subject + '&body=' + body;

            $emailAddressLabel.text(email);
            $openMailAppBtn.data('mailto', mailtoUrl);
            $openGmailBtn.data('gmail', gmail);
            $openOutlookBtn.data('outlook', outlook);
            $copyEmailBtn.data('email', email);

            $emailModal.addClass('visible');
        });

        function hideEmailModal() {
            $emailModal.removeClass('visible');
        }

        $openMailAppBtn.on('click', function() {
            var mailtoUrl = $(this).data('mailto');
            window.location.href = mailtoUrl;
            hideEmailModal();
        });

        $openGmailBtn.on('click', function() {
            var gmailUrl = $(this).data('gmail');
            window.open(gmailUrl, '_blank');
            hideEmailModal();
        });

        $openOutlookBtn.on('click', function() {
            var outlookUrl = $(this).data('outlook');
            window.open(outlookUrl, '_blank');
            hideEmailModal();
        });

        $copyEmailBtn.on('click', function() {
            var email = $(this).data('email');
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(email);
                $(this).text('Copied!').prop('disabled', true);
                setTimeout(() => {
                    $(this).text('Copy Address').prop('disabled', false);
                }, 1500);
            } else {
                alert('Copy the email manually: ' + email);
            }
        });

        $closeModalBtn.on('click', hideEmailModal);
        $emailModal.on('click', function(event) {
            if (event.target === this) {
                hideEmailModal();
            }
        });
    });
</script>
<style>
.email-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 1000;
}
.email-modal.visible {
    display: flex;
}
.email-modal-content {
    background: #fff;
    padding: 25px;
    border-radius: 6px;
    max-width: 420px;
    width: 90%;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}
.email-modal-content h4 {
    margin-top: 0;
}
.email-modal-actions button {
    margin: 8px 5px;
    border: none;
    padding: 10px 18px;
    border-radius: 4px;
    cursor: pointer;
    transition: opacity 0.2s ease;
}
.email-modal-actions button.primary {
    background: #f05f40;
    color: #fff;
}
.email-modal-actions button.secondary {
    background: #f5f5f5;
}
.email-modal-actions button.outline {
    background: transparent;
    border: 1px solid #ccc;
}
.email-modal-actions button:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}
</style>
</head>
<body>
<div class="header">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header navbar-left">
                <h1><a href="index.php"><img src="images/logo.png?v=<?php echo time(); ?>" alt="Eventally" style="width:150px; height:auto;"></a></h1>
            </div>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="header-right">
                <div class="agileits-topnav">
                    <ul>
                        <li><span class="glyphicon glyphicon-earphone"></span> +919016992734</li>
                        <li><a class="email-link" href="mailto:<?php echo $supportEmail; ?>?subject=<?php echo $defaultSubject; ?>&body=<?php echo $defaultBody; ?>" data-email="<?php echo $supportEmail; ?>" data-subject="<?php echo $defaultSubject; ?>" data-body="<?php echo $defaultBody; ?>" data-gmail="<?php echo htmlspecialchars($gmailComposeUrl, ENT_QUOTES); ?>" data-outlook="<?php echo htmlspecialchars($outlookComposeUrl, ENT_QUOTES); ?>">
                            <span class="glyphicon glyphicon-envelope"></span> <?php echo $supportEmail; ?> </a></li>
                        <li class="social-icons">
                        <?php
                        if(isset($_SESSION['uname'])) {
                            echo "<a href='gallery.php'><button class='btn default'>BOOK EVENT</button></a>";
                            echo "<a href='user_logout.php'><button class='btn warning'>LOGOUT</button></a>";
                        } else {
                            echo "<a href='registration.php'><button class='btn default'>SIGN IN</button></a>";
                            echo "<a href='login.php'><button class='btn warning'>LOGIN</button></a>";
                        }
                        ?>
                        <div class="clearfix"></div>
                        </li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">					
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="index.php" class="link link--yaku"><span>H</span><span>O</span><span>M</span><span>E</span></a></li>
                        <li><a href="about.php" class="link link--yaku"><span>A</span><span>B</span><span>O</span><span>U</span><span>T</span></a></li>
                        <li><a href="#" class="dropdown-toggle link link--yaku" data-toggle="dropdown" role="button"><span>S</span><span>E</span><span>R</span><span>V</span><span>I</span><span>C</span><span>E</span><span>S</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="IEEE.php" class="link link--yaku"><span>I</span><span>E</span><span>E</span><span>E</span></a></li>
                                <li><a href="hecathon.php" class="link link--yaku"><span>H</span><span>E</span><span>C</span><span>A</span><span>T</span><span>H</span><span>O</span><span>N</span></a></li>
                                <li><a href="Google.php" class="link link--yaku"><span>G</span><span>O</span><span>O</span><span>G</span><span>L</span><span>E</span></a></li>
                                <li><a href="other_events.php" class="link link--yaku"><span>O</span><span>T</span><span>H</span><span>E</span><span>R</span></a></li>
                            </ul>
                        </li>
                        <li><a href="gallery.php" class="link link--yaku"><span>G</span><span>A</span><span>L</span><span>L</span><span>E</span><span>R</span><span>Y</span></a></li>
                        <li><a href="contact.php" class="link link--yaku"><span>C</span><span>O</span><span>N</span><span>T</span><span>A</span><span>C</span><span>T</span></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </nav>
</div>

<script>
// Activate current nav item (tech UI underline)
(function(){
  var path = window.location.pathname.split('/').pop();
  if(!path){ path = 'index.php'; }
  var links = document.querySelectorAll('.nav.navbar-nav.navbar-left > li > a');
  for(var i=0;i<links.length;i++){
    var a = links[i];
    var href = a.getAttribute('href');
    if(href === path){ a.parentElement.classList.add('active'); }
  }
  if(['IEEE.php','hecathon.php','Google.php','other_events.php'].indexOf(path) !== -1){
    var svc = document.querySelector('.nav.navbar-nav.navbar-left > li > a.dropdown-toggle');
    if(svc){ svc.parentElement.classList.add('active'); }
  }
})();
</script>

<div id="emailModal" class="email-modal">
    <div class="email-modal-content">
        <h4>Contact Classic Events</h4>
        <p>Send an email to <strong id="emailModalEmail"><?php echo $supportEmail; ?></strong> using your preferred method.</p>
        <div class="email-modal-actions">
            <button id="emailOpenMailApp" class="primary">Open Mail App</button>
            <button id="emailOpenGmail" class="secondary">Use Gmail</button>
            <button id="emailOpenOutlook" class="secondary">Use Outlook</button>
            <button id="emailCopyAddress" class="outline">Copy Address</button>
        </div>
        <button id="emailModalClose" class="secondary" style="margin-top:15px;">Close</button>
    </div>
</div>

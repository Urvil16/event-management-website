<?php
include('Database/connect.php');
if(isset($_POST['submit']))
{
    $a = trim($_POST['Name']);
    $b = trim($_POST['Email']);
    $c = trim($_POST['Message']);

    if ($a === '' || $b === '' || $c === '') {
        echo "<script> alert('Please fill all fields')</script>";
    } else if (!filter_var($b, FILTER_VALIDATE_EMAIL)) {
        echo "<script> alert('Please enter a valid email')</script>";
    } else {
        $idRes = mysqli_query($con, "SELECT IFNULL(MAX(id),0)+1 AS next FROM feedback");
        $row = mysqli_fetch_assoc($idRes);
        $nextId = (int)$row['next'];
        $stmt = mysqli_prepare($con, "INSERT INTO feedback (id, unm, email, comment) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "isss", $nextId, $a, $b, $c);
        $ok = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if($ok)
        {
             echo "<script> alert('Send Successfully')</script>";
             echo "<script> window.location.assign('index.php');</script>";
        }
        else
        {
            echo "<script> alert('Not Send')</script>";
        }
    }
}
?>
<?php
	include_once("header.php");
?>
	<!-- //header -->
	<div class="banner about-bnr w3-agileits">
		<div class="container">
		</div>
	</div>
	<!-- contact -->
	<div class="contact">
		<div class="container">
			<h2 class="w3ls-title1">Contact <span>Us</span></h2>
			<div class="contact-agileitsinfo">
				<div class="col-md-8 contact-grids">
					<p>As Times go by in your life, it becomes more precious. So , Make every moment mindful, meaningful and memorable and The most memorable moments in life are the ones you have never planned. </p><br />
					<h5>...BECAUSE WE WILL BE THERE TO PLAN THEM FOR YOU !!</h5>	
					<div class="contact-w3form">
						<h3 class="w3ls-title1">Drop Us a Line</h3>
						<form action="#" method="post"> 
							<textarea name="Message" placeholder="Message..." required=""></textarea>
							<input type="text" name="Name" placeholder="Your Name" required=""/>
							<input type="text" name="Email" placeholder="Email" required=""/>
							<input type="submit" name="submit" value="SEND">
						</form>
					</div>
				</div>
				<div class="col-md-4 contact-grids">
					<div class="cnt-address">
						<h3 class="w3ls-title1">Address</h3>
						<h4>Eventally</h4>
						<p>Himmatnagar 
							<span></span>
							Sabarkantha.
						</p>
                        <h4>Get In Touch</h4>
                        <p>Urvil Panchal: +91 9016992734
                            <span>Priyansh : +91 9016992734 </span>
                            E-mail: 
                            <?php
                            if (!isset($supportEmail)) {
                                $supportEmail = 'urvil.panchal.work@gmail.com';
                            }
                            if (!isset($defaultSubject)) {
                                $defaultSubject = rawurlencode('Eventally Enquiry');
                            }
                            if (!isset($defaultBody)) {
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
                            }
                            if (!isset($gmailComposeUrl)) {
                                $encodedEmail = rawurlencode($supportEmail);
                                $gmailComposeUrl = "https://mail.google.com/mail/?view=cm&fs=1&to={$encodedEmail}&su={$defaultSubject}&body={$defaultBody}";
                            }
                            if (!isset($outlookComposeUrl)) {
                                $encodedEmail = rawurlencode($supportEmail);
                                $outlookComposeUrl = "https://outlook.live.com/owa/?path=/mail/action/compose&to={$encodedEmail}&subject={$defaultSubject}&body={$defaultBody}";
                            }
                            ?>
                            <a class="email-link" href="mailto:<?php echo $supportEmail; ?>?subject=<?php echo $defaultSubject; ?>&body=<?php echo $defaultBody; ?>"
                               data-email="<?php echo $supportEmail; ?>"
                               data-subject="<?php echo $defaultSubject; ?>"
                               data-body="<?php echo $defaultBody; ?>"
                               data-gmail="<?php echo htmlspecialchars($gmailComposeUrl, ENT_QUOTES); ?>"
                               data-outlook="<?php echo htmlspecialchars($outlookComposeUrl, ENT_QUOTES); ?>">
                               <?php echo $supportEmail; ?>
                            </a>
                        </p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //contact -->
	<!-- footer -->
	<?php
		include_once("footer.php");
	?>

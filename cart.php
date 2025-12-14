<?php
	include('Database/connect.php');
	include('session.php');

	// Make sure booking table accepts modern data (mobile/email lengths, auto IDs)
	$bookingFixes = [
		"ALTER TABLE `booking` MODIFY COLUMN `id` INT(11) NOT NULL AUTO_INCREMENT",
		"ALTER TABLE `booking` MODIFY COLUMN `mo` VARCHAR(15) NOT NULL",
		"ALTER TABLE `booking` MODIFY COLUMN `nm` VARCHAR(60) NOT NULL",
		"ALTER TABLE `booking` MODIFY COLUMN `email` VARCHAR(100) NOT NULL",
		"ALTER TABLE `booking` MODIFY COLUMN `thm_nm` VARCHAR(200) NOT NULL"
	];
	foreach ($bookingFixes as $sqlFix) {
		@mysqli_query($con, $sqlFix);
	}
	// Ensure booking table has primary key so AUTO_INCREMENT takes effect
	@mysqli_query($con, "ALTER TABLE `booking` ADD PRIMARY KEY (`id`)");

	include("header.php");
	$q=mysqli_query($con,"select * from temp");
	while($f=mysqli_fetch_row($q))
	{
		$id=$f[0];
		$image=$f[1];
		$name=$f[2];
		$price=$f[3];
	}
	if(isset($_POST['submit']))
	{
		$name = substr(trim($_POST['nm']), 0, 60);
		$email = substr(trim($_POST['email']), 0, 100);
		$mo = preg_replace('/\D/', '', $_POST['mo']);
		if (strlen($mo) > 15) {
			$mo = substr($mo, 0, 15);
		}
		$date = $_POST['date'];

		$q=mysqli_query($con,"select * from temp");
		$r=mysqli_num_rows($q);

		if ($r === 0) {
			echo "<script>alert('No theme selected. Please pick a theme again.'); window.location='gallery.php';</script>";
			exit;
		}

		// Get next booking id in case AUTO_INCREMENT still missing
		$nextId = 1;
		$idResult = mysqli_query($con, "SELECT IFNULL(MAX(id),0)+1 AS next_id FROM booking");
		if ($idResult && $rowId = mysqli_fetch_assoc($idResult)) {
			$nextId = (int)$rowId['next_id'];
		}

		$stmt = mysqli_prepare($con,"INSERT INTO booking(id,nm,email,mo,theme,thm_nm,price,date) VALUES (?,?,?,?,?,?,?,?)");
		if (!$stmt) {
			$error = mysqli_error($con);
			echo "<script>alert('Booking failed: ".htmlspecialchars($error, ENT_QUOTES)."');</script>";
			exit;
		}

		while($res=mysqli_fetch_array($q))
		{
				$id=$res[0];
				$im=$res[1];
				$nm=$res[2];
				$pri=(int)$res[3];
				mysqli_stmt_bind_param($stmt,"isssssis",$nextId,$name,$email,$mo,$im,$nm,$pri,$date);
				$q1=mysqli_stmt_execute($stmt);
				if($q1)
				{
						echo "<script>alert('Your Event is Booked');</script>";
						echo '<script type="text/javascript">window.location="index.php";</script>';
						exit;
				}
				else
				{
						$error = mysqli_stmt_error($stmt);
						echo "<script>alert('Booking error: ".htmlspecialchars($error, ENT_QUOTES)."');</script>";
				}
				$nextId++;
		}
		mysqli_stmt_close($stmt);
		echo "<script>alert('Not Booked');</script>";
	}		
	$qry=mysqli_query($con,"select * from temp where id=".$id);
	$row=mysqli_fetch_row($qry);	
?>

<script>
$(function()
{
	$("#datepicker").datepicker
	({
		changeMonth:true,
		changeYear:true
	});
});
>
</script>

<div class="codes">
<div class="container"> 
<h3 class='w3ls-hdg' align="center">BOOKING</h3>
<div class="grid_3 grid_4">
				<div class="tab-content">
					<div class="tab-pane active" id="horizontal-form">
						<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
						<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Name</label>
								<div class="col-sm-8">
									<input type="text" class="form-control1"  name="nm" pattern="[A-Za-z\s]{2,30}" title="Only Letter For Name" id="focusedinput" placeholder="Name" required="">
								</div>
							</div>
							<div class="form-group">
								<label for="smallinput" class="col-sm-2 control-label label-input-sm">Email</label>
								<div class="col-sm-8">
									<input type="text" class="form-control1 input-sm" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Enter Proper Email Id" id="smallinput" placeholder="Email">
								</div>
							</div>
							<div class="form-group">
								<label for="smallinput" class="col-sm-2 control-label label-input-sm">Mobile no</label>
								<div class="col-sm-8">
									<input type="text" class="form-control1 input-sm" name="mo" id="smallinput" pattern="([7-9]{1})+([0-9]{9})" title="Only Number" maxlength="10" placeholder="Mobile no" required=""/>
								</div>
							</div>
							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Your Theme :</label>
								<div class="col-sm-8">
								<img src="./images/<?php echo $row[1]; ?>" height="200"  width="300"/></div>		
							</div>
							<div class="form-group">
								<label for="disabledinput" class="col-sm-2 control-label">Theme Name :</label>
								<div class="col-sm-8">
									<input disabled="" type="text" class="form-control1" value="<?php echo $row[2]; ?>" name="price" id="focusedinput" placeholder="Theme Price" >
								</div>
							</div>
							<div class="form-group">
								<label for="disabledinput" class="col-sm-2 control-label">Theme Price :</label>
								<div class="col-sm-8">
								<input disabled="" type="text" class="form-control1" value="<?php echo $row[3]; ?>" name="price" id="focusedinput" placeholder="Theme Price" >
								</div>
							</div>
							<div class="form-group">
								<label for="smallinput" class="col-sm-2 control-label label-input-sm">Event Date</label>
								<div class="col-sm-8">
									<input type="date" class="form-control1 input-sm" name="date" id="smallinput" placeholder="DD/MM/YYYY" required=""/>
								</div>
							</div>
					<div class="contact-w3form" align="center">
						<input type="submit" name="submit" class="btn" value="BOOK">
					</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
<?php 
	include_once("footer.php");
?>
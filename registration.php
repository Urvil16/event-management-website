<?php
include_once("Database/connect.php");                       
@session_start();

if (isset($_POST['submit'])) {
    // Get form data
    $name = trim($_POST['nm']);
    $surnm = trim($_POST['surnm']);
    $unm = trim($_POST['unm']);
    $email = trim($_POST['email']);
    $pswd = $_POST['pswd'];
    $mo = trim($_POST['mo']);
    $adrs = trim($_POST['adrs']);
    $gen = isset($_POST['gen']) ? (int)$_POST['gen'] : 0;
    
    // Basic validation
    if (empty($name) || empty($unm) || empty($email) || empty($pswd)) {
        echo "<script>alert('Please fill all required fields'); window.location='registration.php';</script>";
        exit;
    }
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Please enter a valid email address'); window.location='registration.php';</script>";
        exit;
    }
    
    // Clean mobile number
    $mo = preg_replace('/\D/', '', $mo);
    if (strlen($mo) > 15) {
        $mo = substr($mo, 0, 15);
    }
    
    // Hash password
    $password_hash = password_hash($pswd, PASSWORD_DEFAULT);
    $reg_pswd_type = '';
    $login_pswd_type = '';
    $res1 = mysqli_query($con, "SHOW COLUMNS FROM registration WHERE Field = 'pswd'");
    if ($res1 && $row1 = mysqli_fetch_assoc($res1)) { $reg_pswd_type = strtolower($row1['Type']); }
    $res2 = mysqli_query($con, "SHOW COLUMNS FROM login WHERE Field = 'pswd'");
    if ($res2 && $row2 = mysqli_fetch_assoc($res2)) { $login_pswd_type = strtolower($row2['Type']); }
    if (strpos($reg_pswd_type, 'varchar(255)') === false) { @mysqli_query($con, "ALTER TABLE `registration` MODIFY COLUMN `pswd` VARCHAR(255) NOT NULL"); }
    if (strpos($login_pswd_type, 'varchar(255)') === false) { @mysqli_query($con, "ALTER TABLE `login` MODIFY COLUMN `pswd` VARCHAR(255) NOT NULL"); }
    $res3 = mysqli_query($con, "SHOW COLUMNS FROM login WHERE Field = 'id'");
    $login_id_extra = '';
    if ($res3 && $row3 = mysqli_fetch_assoc($res3)) { $login_id_extra = strtolower($row3['Extra']); }
    if (strpos($login_id_extra, 'auto_increment') === false) { @mysqli_query($con, "ALTER TABLE `login` MODIFY COLUMN `id` INT(11) NOT NULL AUTO_INCREMENT"); }
    
    $check_stmt = mysqli_prepare($con, "SELECT unm FROM registration WHERE unm = ?");
    mysqli_stmt_bind_param($check_stmt, "s", $unm);
    mysqli_stmt_execute($check_stmt);
    $check_result = mysqli_stmt_get_result($check_stmt);
    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('Username already exists. Please choose another.'); window.location='registration.php';</script>";
        mysqli_stmt_close($check_stmt);
        exit;
    }
    mysqli_stmt_close($check_stmt);
    
    $stmt = mysqli_prepare($con, "INSERT INTO registration (nm, surnm, unm, email, pswd, mo, adrs, gen) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssssssi", $name, $surnm, $unm, $email, $password_hash, $mo, $adrs, $gen);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    if ($result) {
        $login_stmt = mysqli_prepare($con, "INSERT INTO login (unm, pswd) VALUES (?, ?)");
        mysqli_stmt_bind_param($login_stmt, "ss", $unm, $password_hash);
        $ok = mysqli_stmt_execute($login_stmt);
        if (!$ok) {
            mysqli_stmt_close($login_stmt);
            $login_stmt = mysqli_prepare($con, "INSERT INTO login (unm, pswd) VALUES (?, ?)");
            mysqli_stmt_bind_param($login_stmt, "ss", $unm, $pswd);
            mysqli_stmt_execute($login_stmt);
        }
        mysqli_stmt_close($login_stmt);
        
        // Set session and redirect
        session_regenerate_id(true);
        $_SESSION['uname'] = $unm;
        header('Location:index.php');
        exit;
    } else {
        echo "<script>alert('Registration failed. Please try again.'); window.location='registration.php';</script>";
    }
}
?>
<?php include_once("header.php"); ?>
<div class="banner about-bnr">
		<div class="container">
		</div>
	</div>
	<div class="codes">
		<div class="container"> 
		<h2 class="w3ls-hdg" align="center">User Registration</h2>
				  
	<div class="grid_3 grid_4">
				<div class="tab-content">
					<div class="tab-pane active" id="horizontal-form">
						<form class="form-horizontal" action="" method="post">
							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">First Name</label>
								<div class="col-sm-8">
									<input type="text" class="form-control1"  name="nm" id="focusedinput" placeholder="First Name" required="">
								</div>
							</div>
							<div class="form-group">
								<label for="surname" class="col-sm-2 control-label">Last Name</label>
								<div class="col-sm-8">
									<input type="text" class="form-control1" name="surnm" id="surname" placeholder="Last Name" required="">
								</div>
							</div>
							<div class="form-group">
								<label for="username" class="col-sm-2 control-label">User Name</label>
								<div class="col-sm-8">
									<input type="text" class="form-control1"  name="unm" id="username" placeholder="User Name" required="">
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-8">
									<input type="email" class="form-control1" name="email" id="email" placeholder="Email" required="">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword" class="col-sm-2 control-label">Password</label>
								<div class="col-sm-8">
									<input type="password" class="form-control1" name="pswd" id="inputPassword" placeholder="Password" required="">
								</div>
							</div>
							<div class="form-group">
								<label for="mobile" class="col-sm-2 control-label">Mobile</label>
								<div class="col-sm-8">
									<input type="text" class="form-control1" name="mo" id="mobile" placeholder="Mobile Number" required="">
								</div>
							</div>
							<div class="form-group">
								<label for="address" class="col-sm-2 control-label">Address</label>
								<div class="col-sm-8">
									<textarea class="form-control1" name="adrs" id="address" placeholder="Address" required=""></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="gender" class="col-sm-2 control-label">Gender</label>
								<div class="col-sm-8">
									<select class="form-control1" name="gen" id="gender" required="">
										<option value="">Select Gender</option>
										<option value="1">Male</option>
										<option value="2">Female</option>
										<option value="3">Other</option>
									</select>
								</div>
							</div>
							<div class="contact-w3form" align="center">
					<input type="submit" name="submit" value="REGISTER">
					</div>
						</form><br/>
						<div align="center"><h5>Already have an account? <a href="login.php">Login Here</a></h5></div>
						</div>
					</div>
				</div>
			</div>
		</div>
				<?php
				include_once("footer.php");
			?>

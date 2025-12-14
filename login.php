<?php
include_once("Database/connect.php");
if(isset($_POST['submit']))
{
    session_start();
    $uname = trim($_POST['unm']);
    $pswd = $_POST['pswd'];
    $uname = substr($uname, 0, 39);

    $stmt = mysqli_prepare($con, "SELECT unm, pswd FROM login WHERE LOWER(unm) = LOWER(?)");
    mysqli_stmt_bind_param($stmt, "s", $uname);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_bind_result($stmt, $db_unm, $db_pswd);
        mysqli_stmt_fetch($stmt);
        if (password_verify($pswd, $db_pswd) || $pswd === $db_pswd) {
            session_regenerate_id(true);
            $_SESSION['uname'] = $db_unm;
            header('Location:index.php');
            exit;
        } else {
            echo "<script> alert('Invalid username or password');</script>";
        }
    } else {
        mysqli_stmt_close($stmt);
        $stmt = mysqli_prepare($con, "SELECT unm, pswd FROM registration WHERE LOWER(unm) = LOWER(?)");
        mysqli_stmt_bind_param($stmt, "s", $uname);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) > 0) {
            mysqli_stmt_bind_result($stmt, $db_unm, $db_pswd);
            mysqli_stmt_fetch($stmt);
            if (password_verify($pswd, $db_pswd) || $pswd === $db_pswd) {
                session_regenerate_id(true);
                $_SESSION['uname'] = $db_unm;
                header('Location:index.php');
                exit;
            } else {
                echo "<script> alert('Invalid username or password');</script>";
            }
        } else {
            echo "<script> alert('Username or password does not exist');</script>";
        }
    }
    mysqli_stmt_close($stmt);
}
include_once("header.php");
?>
<div class="banner about-bnr">
		<div class="container">
		</div>
	</div>
	<div class="codes">
		<div class="container"> 
		<h2 class="w3ls-hdg" align="center">User Login</h2>
				  
	<div class="grid_3 grid_4">
				<div class="tab-content">
					<div class="tab-pane active" id="horizontal-form">
						<form class="form-horizontal" action="" method="post">
							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">User Name</label>
								<div class="col-sm-8">
									<input type="text" class="form-control1"  name="unm" id="focusedinput" placeholder="User Name" required="">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword" class="col-sm-2 control-label">Password</label>
								<div class="col-sm-8">
									<input type="password" class="form-control1" name="pswd" id="inputPassword" placeholder="Password" required="">
								</div>
							</div>
							<div class="contact-w3form" align="center">
					<input type="submit" name="submit" value="SEND">
					</div>
						</form><br/>
						<div align="center"><h5>Not an account? <a href="registration.php">Registration Here</a></h5></div>
						</div>
					</div>
				</div>
			</div>
		</div>
				<?php
				include_once("footer.php");
			?>

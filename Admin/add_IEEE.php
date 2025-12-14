<?php
	include_once("header.php");
    include('../Database/connect.php');
	include('session.php');
    if(isset($_REQUEST['submit']))
    {
        $fnm=$_FILES["image"]["name"];
        $nm=$_REQUEST['nm'];
        $pr=(int)$_REQUEST['price'];
        
        move_uploaded_file($_FILES["image"]["tmp_name"],"../images/" .$_FILES["image"]["name"]);
        @session_start();
        if(isset($_SESSION['admin']))
        {
            $idRes = mysqli_query($con, "SELECT IFNULL(MAX(id),0)+1 AS next FROM wedding");
            if($idRes !== false)
            {
                $row = mysqli_fetch_assoc($idRes);
                $nextId = (int)$row['next'];
                $stmt = mysqli_prepare($con, "INSERT INTO wedding(id, img, nm, price) VALUES(?, ?, ?, ?)");
                if($stmt !== false)
                {
                    mysqli_stmt_bind_param($stmt, "issi", $nextId, $fnm, $nm, $pr);
                    $ok = mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                    if($ok)
                    {
                        echo "<script> alert('Added');</script>";        
                        echo '<script type="text/javascript">window.location="IEEE_disp.php";</script>';
                    }
                    else
                    {
                        echo "<script> alert('Error: Failed to add. " . mysqli_error($con) . "');</script>";
                    }
                }
                else
                {
                    echo "<script> alert('Error: Failed to prepare statement. " . mysqli_error($con) . "');</script>";
                }
            }
            else
            {
                echo "<script> alert('Error: Failed to get next ID. " . mysqli_error($con) . "');</script>";
            }
        }
    }
?>
<link href="../css/style.css" rel="stylesheet" type="text/css" />

<div class="codes">
<div class="container"> 
<h3 class='w3ls-hdg' align="center">ADD IEEE</h3>
<div class="grid_3 grid_4">
				<div class="tab-content">
					<div class="tab-pane active" id="horizontal-form">
						<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Enter Image</label>
								<div class="col-sm-8">
									<input type="file"  name="image">
								</div>
							</div>
							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Enter Price</label>
								<div class="col-sm-8">
									<input type="text" class="form-control1"  name="price" id="focusedinput" placeholder="Theme Price" >
								</div>
							</div>
							<div class="form-group">
								<label for="txtarea1" class="col-sm-2 control-label">Enter Name</label>
								<div class="col-sm-8">
								<input type="text" class="form-control1"  name="nm" id="focusedinput" placeholder="Theme Name"></div>
								</div>
							</div>
					<div class="contact-w3form" align="center">
					<input type="submit" name="submit" class="btn" value="SEND"> <input type="button" value="DISPLAY" class="btn my" onClick="javascript:location.href='IEEE_disp.php'" />
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
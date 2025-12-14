<?php
		include('../Database/connect.php');
		if (isset($_GET['id'])) {
			$id = (int)$_GET['id'];
			$stmt = mysqli_prepare($con, "DELETE FROM feedback WHERE id = ?");
			mysqli_stmt_bind_param($stmt, "i", $id);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
		}
		echo '<script type="text/javascript">window.location="view_feedback.php";</script>';
		?>

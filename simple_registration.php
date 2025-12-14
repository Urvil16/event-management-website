<?php
// Error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("Database/connect.php");
@session_start();

$message = "";
if (isset($_POST['submit'])) {
    $name = trim($_POST['nm']);
    $surnm = trim($_POST['surnm']);
    $unm = trim($_POST['unm']);
    $email = trim($_POST['email']);
    $pswd = $_POST['pswd'];
    $mo = trim($_POST['mo']);
    $adrs = trim($_POST['adrs']);
    $gen = isset($_POST['gen']) ? (int)$_POST['gen'] : 0;
    
    // Simple validation
    if (empty($name) || empty($unm) || empty($email) || empty($pswd)) {
        $message = "Please fill all required fields";
    } else {
        // Try simple insert first
        try {
            $password_hash = password_hash($pswd, PASSWORD_DEFAULT);
            
            // Simple insert without prepared statements for testing
            $query = "INSERT INTO registration (nm, surnm, unm, email, pswd, mo, adrs, gen) 
                     VALUES ('$name', '$surnm', '$unm', '$email', '$password_hash', '$mo', '$adrs', '$gen')";
            
            $result = mysqli_query($con, $query);
            
            if ($result) {
                // Also add to login table
                $login_query = "INSERT INTO login (unm, pswd) VALUES ('$unm', '$password_hash')";
                mysqli_query($con, $login_query);
                
                $_SESSION['uname'] = $unm;
                $message = "Registration successful! Redirecting...";
                echo "<script>setTimeout(() => window.location='index.php', 2000);</script>";
            } else {
                $message = "Registration failed: " . mysqli_error($con);
            }
        } catch (Exception $e) {
            $message = "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Registration</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .form-group { margin: 10px 0; }
        label { display: inline-block; width: 100px; }
        input[type="text"], input[type="email"], input[type="password"], textarea, select { 
            padding: 5px; width: 250px; 
        }
        .message { padding: 10px; margin: 10px 0; }
        .success { background: #d4edda; color: #155724; }
        .error { background: #f8d7da; color: #721c24; }
        input[type="submit"] { padding: 10px 20px; background: #007bff; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Simple Registration Form</h2>
    
    <?php if ($message): ?>
        <div class="message <?php echo strpos($message, 'successful') !== false ? 'success' : 'error'; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
    
    <form method="post">
        <div class="form-group">
            <label>First Name:</label>
            <input type="text" name="nm" required>
        </div>
        <div class="form-group">
            <label>Last Name:</label>
            <input type="text" name="surnm">
        </div>
        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="unm" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="pswd" required>
        </div>
        <div class="form-group">
            <label>Mobile:</label>
            <input type="text" name="mo">
        </div>
        <div class="form-group">
            <label>Address:</label>
            <textarea name="adrs"></textarea>
        </div>
        <div class="form-group">
            <label>Gender:</label>
            <select name="gen">
                <option value="1">Male</option>
                <option value="2">Female</option>
                <option value="3">Other</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Register">
        </div>
    </form>
    
    <p><a href="test_db.php">Test Database Connection</a> | <a href="login.php">Login</a> | <a href="index.php">Home</a></p>
</body>
</html>

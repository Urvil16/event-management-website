<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management System</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<?php
    include_once("header.php");
    include_once("Database/connect.php"); 
?>

<?php
    include_once("projects.php");
?>

<!-- services -->
<div class="services">
    <div class="container">
        <h3 class="w3ltitle"> OUR SERVICES</h3>
        <div class="services-agileinfo">
            <div class="servc-icon">
                <a href="IEEE.php" class="agile-shape">
                    <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                    <p class="serw3-agiletext">
                        <?php echo strtoupper("IEEE"); ?>
                    </p>
                </a>
            </div>
            <div class="servc-icon">
                <a href="Google.php" class="agile-shape">
                    <span class="glyphicon glyphicon-glass" aria-hidden="true"></span>
                    <p class="serw3-agiletext">
                        <?php echo strtoupper("GOOGLE"); ?>
                    </p>
                </a>
            </div>
            <div class="servc-icon">
                <a href="hecathon.php" class="agile-shape">
                    <span class="glyphicon fa fa-gift" aria-hidden="true"></span>
                    <p class="serw3-agiletext">
                        <?php echo strtoupper("HACKATHON"); ?>
                    </p>
                </a>
            </div>
            <div class="servc-icon">
                <a href="other_events.php" class="agile-shape">
                    <span class="glyphicon glyphicon-music" aria-hidden="true"></span>
                    <p class="serw3-agiletext">
                        <?php echo "OTHER EVENTS"; ?>
                    </p>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- //services -->

<?php
    include_once("footer.php"); 
?>

</body>
</html>



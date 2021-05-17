<html>
<head>
    <title>Computer World</title>
</head>
<link rel="icon" type="image/png" href="img/com.png">
<link rel="stylesheet" href="css/customSty.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<body>
    <div class="iback"><img src="img/header.jpg" height="100%" width="100%"></div>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-target="#nav1" data-toggle="collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
                <a class="navbar-brand" href="index.php">Computer World</a>
            </div>
            <div class="navbar-collapse collapse" id="nav1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="reg_form.php">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="info">
        <font size="20px"><strong>Welcome to our Computer Assembly website.</strong></font>
        <hr class="myhr">
        <font size="4px">
            <p>This site will help you assemble your PC according to your own needs.</p>
        </font>
        <form action="reg_form.php" method="POST">
        <input type="submit" class="btn1" value="Get Started">
        </form>
    </div>
</body>
</html>
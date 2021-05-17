<?php
session_start();
if(isset($_SESSION['a']))
{
	header("location:admin.php");
}
if(isset($_SESSION['u']))
{
	header("location:user.php");
}
?>
<html>

<head>
    <title>Login</title>
    <link rel="icon" type="image/png" href="img/favicon.ico">
</head>
<link rel="stylesheet" href="css/login.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<body>
<div class="bg1"><img src="img/back.jpg" width="100%" height="100%"></div>
	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
       <div class="navbar-header">
           <button type="button" class="navbar-toggle" data-target="#nav1" data-toggle="collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
		<a class="navbar-brand" href="#">Computer World</a>
       </div>
       <div class="navbar-collapse collapse" id="nav1">
           <ul class="nav navbar-nav navbar-right">
               <li><a href="index.php">Home</a></li>
               <li><a href="contact.php">Contact</a></li>
               <li class="active"><a href="login.php">Login</a></li>
               <li><a href="reg_form.php">Register</a></li>
           </ul>
       </div>
       </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-3 col-xs-1">
            </div>
            <div class="col-md-4 col-sm-6 col-xs-10">
                <form action="check.php" method="POST" class="formContainer">
                    <img src="img/bg-01.jpg" class="img-responsive im"><br>
                    <div class="form1">
                        <input type="text" class="form-control" name="i" placeholder="ID"><br><br>
                        <input type="password" class="form-control" name="p" placeholder="Password"><br><br>
                        <center>
                            <input type="submit" name="s" value="Login" class="btn1"><br><br>
                            <a class="btn btn-link reg" href="reg_form.php">Register Now!</a>
                        </center>
                    </div>
                </form>
            </div>
            <div class="col-md-4 col-sm-3 col-xs-1">
            </div>
        </div>
    </div>
</body>

</html>

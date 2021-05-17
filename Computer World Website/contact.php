<html>
<head>
<title>Contact Us!</title>
<link rel="icon" type="image/png" href="img/favicon.ico">
<link rel="stylesheet" href="css/customSty.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="bg2"></div>
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
               <li class="active"><a href="contact.php">Contact</a></li>
               <li><a href="login.php">Login</a></li>
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
            <div class="col-md-3 col-sm-3 col-xs-1">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-10">
				<form action="" method="POST" class="conForm">
					Name :<br><input placeholder="Your Name" type="text" name="cname" class="form-control"><br>
					E-mail :<br><input placeholder="Your Name" type="text" name="cemail" class="form-control"><br>
					Phone :<br><input placeholder="Your Name" type="text" name="cphone" class="form-control"><br>
					Message :<br><textarea rows="6" cols="7" class="form-control" name="cmsg"></textarea><br>
					<input type="submit" class="btn btn-info" name="su">
				</form>
		</div>
            <div class="col-md-3 col-sm-3 col-xs-1">
            </div>
        </div>
    </div>
</body>
</html>
<?php
$n=$_POST['cname'];
$e=$_POST['cemail'];
$p=$_POST['cphone'];
$m=$_POST['cmsg'];
	if(isset($_POST['su']) && $n!='' && $e!='' && $p!='')
	{
		mail('pratyushkumar1234522@gmail.com',$e,$m,$p);
		echo'<script>alert("Thanks for contacting us.");</script>';
	}
	else
	{
		echo'<script>alert("Please enter your details.");</script>';
	}
?>
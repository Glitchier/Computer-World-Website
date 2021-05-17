<html>
<head>
<title>Regitration Form</title>
<link rel="icon" type="image/png" href="img/favicon.ico">
<link rel="stylesheet" href="css/customSty.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<?php
$na=$nas=$nam=$nams=$em=$ems=$pass1=$pass1s=$pass2=$pass2s=$ph=$phs=$phos='';
$nar=$emr=$pass1r=$pass2r=$phr=$phor=0;
	if(isset($_POST['s']))
	{
		$na=trim($_POST['na']);
		if(strlen($na)>=5 &&  strlen($na)<=10)
		{
			$nar=1;
		}
		else
		{
			$nas="<font color='red'>Check Id(B/W 5 to 10 character)</font>";
		}
        $nam=trim($_POST['nam']);
		if(strlen($na)>=2 &&  strlen($na)<=30)
		{
			$namr=1;
		}
		else
		{
			$nams="<font color='red'>Check Name(B/W 2 to 30 character)</font>";
		}
		$em=trim($_POST['em']);
		$ev='/^[a-zA-Z0-9.-_]*\@[a-zA-Z]*\.[a-zA-Z.]{2,6}$/';
		if(!preg_match($ev,$em))
		{
			$ems='<font color="red">Check E-mail</font>';
		}
		else
		{
			$emr=1;
		}
		$pass1=trim($_POST['pass1']);
		if(strlen($pass1)>=5 &&  strlen($pass1)<=10)
		{
			$pass1r=1;
		}
		else
		{
			$pass1s="<font color='red'>Check password(B/w 5 to 10 character)</font>";
		}
		$pass2=trim($_POST['pass2']);
		if(strlen($pass2)>=5 &&  strlen($pass2)<=10)
		{
			$pass2r=1;
		}
		else
		{
			$pass2s="<font color='red'>Check Password(B/w 5 to 10 character)</font>";
		}
		
		$ph=trim($_POST['ph']);
		$pv='/^[0-9]{10,10}$/';
		if(!preg_match($pv,$ph))
		{
			$phs='<font color="red">Check Phone</font>';
		}
		else
		{
			$phr=1;
		}
		if($_FILES['pho']['name']!='')
		{
			$fn=$_FILES['pho']['name'];
			$l=strlen($fn);
			$pd=strrpos($fn,".");
			$ext=substr($fn,$pd+1,$l-1);
			$vext=Array('jpg','bmp','jpeg','png');
			
			if(in_array($ext,$vext))
			{
				
				$phor=1;
			}
			else
			{
				$phos="<font color='red'>Check image</font>";
			}
		}
		else
		{
			$phos="<font color='red'>Choose image</font>";
		}
	if($pass1==$pass2)
	{
		if(	$nar==1 &&	$emr==1 && $phr==1 && $phor==1 )
		{

		
		$fta=$_FILES['pho']['tmp_name'];
		$fd='load/'.uniqid().''.$fn;
				
		include"connection.php";

		$t="insert into register(Id ,Name, Email , Password , Phone ,Photo) values ('".$na."','".$nam."', '".$em."','".$pass2."','".$ph."','".$fd."')";
			$q=mysqli_query($cn,$t);
			if($q)
			{
				move_uploaded_file($fta,$fd);
				echo'<script>alert("Registered Sucessfully")</script>';
			}
			else
			{
				echo '<script>alert("'.mysqli_error($cn).'")</script>';
			}	
		}
		else
		{
			echo'<script>alert("Check your details.")</script>';
		}
	}
		else
		{
			$pass1s="<font color='red'>Check Password</font>";
			$pass2s="<font color='red'>Check Password</font>";
		}
		$pass1='';$pass2='';
	}
?>
<body>
<div class="bg1"></div>
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
               <li><a href="login.php">Login</a></li>
               <li class="active"><a href="reg_form.php">Register</a></li>
           </ul>
       </div>
       </div>
    </nav>
    <div class="container-fluid bg">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-1">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-10">
                <form action="" method="POST" enctype="multipart/form-data" class="regForm">
	ID :<br><input placeholder="Your ID" type="text" class="form-control" name="na" value="<?php echo $na;?>">&nbsp;<span><?php echo $nas; ?></span><br><br>
	Name :<br><input placeholder="Your Name" type="text" class="form-control" name="nam" value="<?php echo $nam;?>">&nbsp;<span><?php echo $nams; ?></span><br><br>
	E-mail :<br><input placeholder="Your E-mail" type="text" class="form-control" name="em" value="<?php echo $em;?>">&nbsp;<span><?php echo $ems; ?></span><br><br>
	Password :<br><input placeholder="Your Password" type="password" class="form-control" name="pass1" value="<?php echo $pass1;?>">&nbsp;<span><?php echo $pass1s; ?></span><br><br>
	Re-Enter Password :<br><input placeholder="Re-Enter Your Password" type="password" class="form-control" name="pass2" value="<?php echo $pass2;?>">&nbsp;<span><?php echo $pass2s; ?></span><br><br>
	Phone :<br><input placeholder="Your Phone Number" type="text" class="form-control" name="ph" value="<?php echo $ph;?>">&nbsp;<span><?php echo $phs; ?></span><br><br>
	Photo :&nbsp;<input type="file" class="form-control" name="pho">&nbsp;<span><?php echo $phos; ?></span><br><br>
	<input type="submit" class="reg_btn" name="s" value="Register Now!"><br><br>
	<input type="submit" class="clr_btn" name="r" value="Clear">
</form>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-1">
            </div>
        </div>
    </div>
</body>
</html>
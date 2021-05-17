<html>
	<head>
		<title>Insert Products</title>
		<link rel="icon" type="image/png" href="img/com.png">
<link rel="stylesheet" href="css/customSty.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
		<?php
		session_start();
if($_SESSION['aid']!=session_id())
{
	header("location:login.php");
}
			$bno=$bnos=$na=$nas=$rate=$rates=$quas=$des=$dess=$phos='';
			$bnor=$nar=$rater=$desr=$phor=0;
			if(isset($_POST['s']))
			{
				$bno=trim($_POST['bno']);
				if($bno=='')
				{
					$bnos="Enter Batch No.!!!";
				}
				else
				{
					if(strlen($bno)<=6 && strlen($bno)>0)
					{
						$bnor=1;
					}
					else
					{
						$bnos="Check Batch No.!!!";
					}
				}
				$na=trim($_POST['na']);
				if($na=='')
				{
					$nas="Enter Name!!!";
				}
				else
				{
				$nv="/^[a-zA-Z ]*$/";
				if(!preg_match($nv,$na))
				{
					$nas="Check Name!!!";
				}
				else
				{
					$nar=1;
				}
				}
				$rate=trim($_POST['rate']);
				if($rate=='')
				{
					$rates="Enter Rate!!!";
				}
				else
				{
				$rv="/^[0-9]*$/";
				if(!preg_match($rv,$rate))
				{
					$rates="Check Rate!!!";
				}
				else
				{
					$rater=1;
				}
				}
				$qua=trim($_POST['qua']);
				$quav='/^[0-9]*$/';
				if(!preg_match($quav,$qua))
				{
					$quas="Check quantity!!!";
				}
				else
				{
					$quar=1;
				}
				$des=trim($_POST['des']);
				if($des=='')
				{
					$dess="Enter Description!!!";
				}
				else
				{
					$desv="/^[a-zA-Z0-9 .@#*=]*$/";
					if(!preg_match($desv,$des))
					{
						$dess="Check Description!!!";
					}
					else
					{
						$desr=1;
					}
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
						$phos="Check image!!!";
					}
				}
				else
				{
					$phos="Choose image!!!";
				}
				if($bnor==1 &&	$nar==1 && $rater==1 && $quar==1 && $desr==1 && $phor==1 )
				{
				$fta=$_FILES['pho']['tmp_name'];
				$fd='load/'.uniqid().''.$fn;
						
				include"connection.php";
		
				$t="insert into product values ('".$bno."', '".$na."','".$rate."','".$qua."','".$des."','".$fd."')";
					$q=mysqli_query($cn,$t);
					if($q)
					{
						move_uploaded_file($fta,$fd);
						echo'<script>alert("Product inserted Sucessfully")</script>';
					}
					else
					{
						echo'<br>error '.mysqli_error($cn);
					}	
				}
			}
		?>
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
		<a class="navbar-brand" href="index.php">Computer World</a>
       </div>
       <div class="navbar-collapse collapse" id="nav1">
           <ul class="nav navbar-nav navbar-right">
               <li><a href="index.php">Home</a></li>
			   <li><a href="bill.php">Bills</a></li>
               <li><a href="aupdate.php">Update Profile </a></li>
               <li><a href="admin.php">Users</a></li>
               <li><a href="product.php">Products</a></li>
               <li class="active"><a href="insert_product.php">Insert Products</a></li>
               <li><a href="del_product.php">Delete Products</a></li>
               <li><a href="end.php">Logout </a></li>
           </ul>
       </div>
       </div>
    </nav>
    <div class="container pdiv">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
			<form action="" class="insert_div" method="POST" enctype="multipart/form-data">
				Batch No.<br><input placeholder="Enter Batch No." class="form-control" type="text" name="bno" value="<?php echo $bno;?>"><br><span><?php echo $bnos;?></span><br>
				Product Name :<br><input type="text" placeholder="Enter Product Name" class="form-control" name="na" value="<?php echo $na;?>"><br><span><?php echo $nas;?></span><br>
				Rate :<br><input class="form-control" type="text" name="rate" placeholder="Enter Rate" value="<?php echo $na;?>"><br><span><?php echo $rates;?></span><br>
				Quantity :<br><input placeholder="Enter Quantity" class="form-control" type="text" name="qua"><br><span><?php echo $quas;?></span><br>
				Description :<br><textarea class="form-control" placeholder="Enter Description" name="des" rows="12" cols="40" value="<?php echo $na;?>"></textarea><br><span><?php echo $dess;?></span><br>
				Photo :<br><input type="file" class="form-control" name="pho"><br><span><?php echo $phos;?></span><br>
				<input type="submit" name="s" class="insert_btn" value="Insert Product">
				</form>
              </div>
           <div class="col-md-3"></div>
        </div>
    </div>
			</body>
	</head>
</html>
<html>
	<head>
		<title>Products</title>
		<?php
			$bno=$bnos=$na=$nas=$rate=$rates=$quas=$des=$dess=$phos='';
			$bnor=$nar=$rater=$desr=0;
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
			<form action="" method="POST" enctype="multipart/form-data">
				Batch No. :&nbsp;<input type="text" name="bno" value="<?php echo $bno;?>">&nbsp;<span><?php echo $bnos;?></span><br><br>
				Product Name :&nbsp;<input type="text" name="na" value="<?php echo $na;?>">&nbsp;<span><?php echo $nas;?></span><br><br>
				Rate :&nbsp;<input type="text" name="rate" value="<?php echo $na;?>">&nbsp;<span><?php echo $rates;?></span><br><br>
				Quantity :&nbsp;<input type="text" name="qua">&nbsp;<span><?php echo $quas;?></span><br><br>
				Description :<br><textarea name="des" rows="12" cols="40" value="<?php echo $na;?>"></textarea>&nbsp;<span><?php echo $dess;?></span><br><br>
				Photo :<br><input type="file" name="pho">&nbsp;<span><?php echo $phos;?></span><br><br>
				<input type="submit" name="s">
				</form>
			</body>
	</head>
</html>
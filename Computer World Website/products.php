<title>Products</title>
<?php
session_start();
if($_SESSION['uid']!=session_id())
{
	header("location:login.php");
}

?>
<link rel="icon" type="image/png" href="img/favicon.ico">
<link rel="stylesheet" href="css/customSty.css">
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
		<a class="navbar-brand" href="index.php">Computer World</a>
       </div>
       <div class="navbar-collapse collapse" id="nav1">
           <ul class="nav navbar-nav navbar-right">
               <li><a href="index.php">Home</a></li>
			   <li class="active"><a href="user_bill.php">Bill</a></li>
               <li><a href="userup.php">Update Profile</a></li>
               <li><a href="user.php">User Home </a></li>
               <li><a href="products.php">Products</a></li>
               <li><a href="end.php">Logout </a></li>
           </ul>
       </div>
       </div>
    </nav>
</body>

<?php
$ud=$_SESSION['u'];

include"connection.php";

$q="select * from product";

$sq=mysqli_query($cn,$q); 

if($sq)
{
		if(mysqli_fetch_array($sq)>0)
		{
		$sq=mysqli_query($cn,$q); 
echo'<div class="container-fluid bg">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 col-sm-2 col-xs-1">
            </div>
            <div class="col-md-10 col-sm-8 col-xs-10">
				<div class="table-responsive utab"><table class="table table-bordered table-hover">';
echo'<tr class="success"><th>Batch_No</th><th>Product Name</th><th>Rate</th><th>Quantity</th>
<th>Description</th><th>Photo</th></tr>';
			while($x=mysqli_fetch_array($sq))
			{
			echo'<tr><th>'.$x['Batch_No'].'</th>';
			echo'<th>'.$x['Name'].'</th>';
			echo'<th>'.$x['Rate'].'</th>';
			echo'<th>'.$x['Quantity'].'</th>';
			echo'<th>'.$x['Description'].'</th>';
			echo'<th><img src="'.$x['Photo'].'" width="75" height="75"></th></tr>';
			}
			echo'</table>';
			$sq=mysqli_query($cn,$q);
			echo'<form action="" method="POST" class="proForm">';
			echo'Select Product :<br><select class="form-control" name="sel_pro">';
			while($x=mysqli_fetch_array($sq))
			{
				echo'<option value="'.$x['Batch_No'].'">'.$x['Batch_No'].'</option>';
			}
			echo'</select><br>';
			echo'Select Quantity :<br><select class="form-control" name="sel_qua">';
			for($i=1;$i<=10;$i++)
			{
				echo'<option value="'.$i.'">'.$i.'</option>';
			}
			echo'</select><br>';
			echo'<br><input class="bill_btn" type="submit" name="bill" value="Bill"></div></div>
            <div class="col-md-1 col-sm-2 col-xs-1">
            </div>
        </div>
    </div>';
		}
		else
		{
		echo' No Record !!!';
		}

}
else
{
echo' Error : '.mysqli_error($cn);
}
?>
<?php
if(isset($_POST['bill']))
{
	
	$pp=$_POST['sel_pro'];
	
	include"connection.php";

$q="select * from product where Batch_No='".$pp."'";

$sq=mysqli_query($cn,$q); 

if($sq)
{
		if(mysqli_fetch_array($sq)>0)
		{
			$sq=mysqli_query($cn,$q); 

			while($x=mysqli_fetch_array($sq))
			{
			$sel_n=$x['Name'];
			$sel_r=$x['Rate'];
			$sel_q=$x['Quantity'];
			$sel_d=$x['Description'];
			$sel_img =$x['Photo'];
			}
		$qq=$_POST['sel_qua'];
	if($sel_q>=$qq)
	{
			$em=$_SESSION['em'];
			$ph=$_SESSION['ph'];
			$amt=(($sel_r)*($qq));
		
	include"connection.php";
$t="insert into bill(Email ,Phone,Product ,Photo,Batch_No ,Quantity ,Rate ,Amount,Description) 
 values('".$em."','".$ph."','".$sel_n."','".$sel_img."','".$pp."','".$qq."','".$sel_r."','".$amt."','".$sel_d."' )";
	

	$bi='update product set Quantity=Quantity-'.$qq.' where Batch_No="'.$pp.'"';
	if(mysqli_query($cn,$t) && mysqli_query($cn,$bi))
	{
		echo'<script>alert("Thanks for shopping.")</script>';
		echo "<meta http-equiv='refresh' content='0'>";
	}
	else
	{
		echo'<br>Error : '.mysqli_error($cn);
	}
	}
	else
	{
		echo'<script>alert("Insufficient Stock Out.Try Again")</script>';
	}
		}
}
}
?>


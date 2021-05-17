<title>Products</title>
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
               <li class="active"><a href="product.php">Products</a></li>
               <li><a href="insert_product.php">Insert Products</a></li>
               <li><a href="del_product.php">Delete Products</a></li>
               <li><a href="end.php">Logout </a></li>
           </ul>
       </div>
       </div>
    </nav>
</body> 

<?php
$ad=$_SESSION['a'];
echo'Welcome '.$ad;

include"connection.php";

$q="select * from product";

$sq=mysqli_query($cn,$q); 

if($sq)
{
		if(mysqli_fetch_array($sq)>0)
		{
			$sq=mysqli_query($cn,$q); 
echo'<div class="container pdiv">';
echo'<div class="row">';
			while($x=mysqli_fetch_array($sq))
			{
            echo'<div class="col-md-4 col-sm-6"><div class="rw"><img class="img1" src="'.$x['Photo'].'" width="90" height="90"><br><br>';
			echo'Batch No. : '.$x['Batch_No'].'<br>';
			echo'Product Name : '.$x['Name'].'<br>';
			echo'Rate : '.$x['Rate'].'<br>';
			echo'Quantity Available : '.$x['Quantity'].'<br>';
			echo'Description : '.$x['Description'].'</div></div>';
			}
		echo'</div></div>';
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

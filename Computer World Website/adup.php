<title>Admin</title>
<?php
session_start();
if($_SESSION['aid']!=session_id())
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
			   <li><a href="bill.php">Bills</a></li>
               <li class="active"><a href="aupdate.php">Update Profile </a></li>
               <li><a href="admin.php">Users</a></li>
               <li><a href="product.php">Products</a></li>
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

?>


<?php

if(isset($_POST['d']))
{
	$uid=$_POST['r'];
	
	include"connection.php";
$dq="delete from register where id='".$uid."'";
 	
	$sdq=mysqli_query($cn,$dq);
	
	if($sdq)
	{
		echo"<script > alert('Deleted')</script>";
	
	}
	else
	{
	echo' Error : '.mysqli_error($cn);
	}
	

}
?>



<?php
if(isset($_POST['u']))
{

$ud=$_POST['r'];

include"connection.php";

$q="select * from register where id='".$ud."'";

$sq=mysqli_query($cn,$q); 

if($sq)
{
		if(mysqli_fetch_array($sq)>0)
		{
			$sq=mysqli_query($cn,$q); 
echo'<div class="container updiv">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12"><h1>Update Profile</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4"><form action="" method="POST" enctype="multipart/form-data">';
			while($x=mysqli_fetch_array($sq))
			{
echo'ID:<input class="form-control" type="text" name="i" value="'.$x['id'].'" readonly><br><br>';
echo'Name:<input class="form-control" type="text" name="n" value="'.$x['name'].'" ><br><br>';
echo'Phone:<input type="text" class="form-control" name="ph" value="'.$x['phone'].'" ><br><br>';
echo'Email:<input type="text" name="em" class="form-control" value="'.$x['email'].'" ><br><br>';
echo'Password:<input type="text" name="ps" class="form-control" value="'.$x['password'].'" ><br><br>';
echo'<img src="'.$x['photo'].'" width="75" height="75"><br><br>';
echo'Photo:<input class="form-control" type="file" name="im"><br><br>';
echo'<br><br><input class="up_btn" type="submit" name="aup" value="update">';
			}
		echo'</form></div>
            <div class="col-md-4 col-sm-4 col-xs-4">
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

}
?>

<?php 

$nr=$emr=$phr=$psr=$por=$ir=0;

if(isset($_POST['aup']))
{
 
 
 $i=trim($_POST['i']);

 if(strlen($i)>=4)
 {
	$ir=1;
	
 }
 
 
 $n=trim($_POST['n']);
 $nc='/^[a-zA-Z ]*$/';
 if(preg_match($nc,$n) )
 {
	$nr=1;
	
 }
 
 $em=trim($_POST['em']);
 $emc='/^[a-zA-Z0-9._-]*\@[a-zA-Z0-9]*\.[a-zA-Z.]{2,6}$/';
 if(preg_match($emc,$em) )
 {
	$emr=1;
	
 }
 
 $ph=trim($_POST['ph']);
 $phc='/^[0-9]{10,10}$/';
 if(preg_match($phc,$ph) )
 {
	$phr=1;
	
 }
 

 $ps=trim($_POST['ps']);

 if(strlen($ph)>=5)
 {
	$psr=1;
	
 }
 
 if ($ir==1 && $nr==1 && $emr==1 && $phr==1 && $psr==1 )
{


 if($_FILES['im']['name']!='')
 {
 $fn=$_FILES['im']['name'];

	   $l=strlen($fn);
	   
	   $pd=strrpos($fn,".");
	   $ext=substr($fn,$pd+1,$l-1);
	  $vext=Array('jpg','png','bmp');
	  if(in_array($ext,$vext))
	  {	   
	   $por=1;
	 }
	}
 if($por==1)
 {
  
		$fta=$_FILES['im']['tmp_name'];
		$fd='load/'.uniqid().''.$fn;
	
$sq="update register  
set name='".$n."' ,
phone='".$ph."', 
email='".$em."' ,
password='".$ps."',
photo='".$fd."' where id='".$i."'";

include"connection.php";
$q=mysqli_query($cn,$sq);

if($q)
{
	echo'<script> alert("Updated")</script>';
	move_uploaded_file($fta,$fd);
	$_SESSION['i']=$i;
abc();
} 

else
{
	echo' Error : '.mysqli_error($cn);	
}


}
else
{
$sq="update  register  
set name='".$n."' ,
phone='".$ph."' ,
email='".$em."', 
password='".$ps."' where id='".$i."'";

include"connection.php";
$q=mysqli_query($cn,$sq);

if($q)
{
	echo'<script> alert("Updated")</script>';
	$_SESSION['i']=$i;
	abc();
	
	
	
	
} 

else
{
	echo' Error : '.mysqli_error($cn);	
}


}	
}
else
{
	echo'<script> alert("check")</script>';
}		
		
		
 
}
 
 
 

?>


<?php
function abc()
{
$i=$_SESSION['i'];
include"connection.php";

$q="select * from register where id='".$i."'";

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
echo'<tr class="success"><th>id</th><th>Name</th><th>Phone</th><th>Email</th>
<th>Password</th><th>Photo</th></tr>';
			while($x=mysqli_fetch_array($sq))
			{
			echo'<tr><th>'.$x['id'].'</th>';
			echo'<th>'.$x['name'].'</th>';
			echo'<th>'.$x['phone'].'</th>';
			echo'<th>'.$x['email'].'</th>';
			echo'<th>'.$x['password'].'</th>';
echo'<th><img src="'.$x['photo'].'" width="75" height="75"></th></tr>';
			}
		echo'</table></div></div>
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

}
?>

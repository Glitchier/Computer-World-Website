<title>Update</title>
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
<div class="bg1"></div>
<nav class="navbar navbar-inverse">
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
			   <li><a href="user_bill.php">Bill</a></li>
               <li class="active"><a href="userup.php">Update Profile</a></li>
               <li><a href="user.php">User Home</a></li>
               <li><a href="products.php">Products</a></li>
               <li><a href="end.php">Logout </a></li>
           </ul>
       </div>
       </div>
    </nav>
</body>

<?php
$ud=$_SESSION['u'];

?>




<?php




include"connection.php";

$q="select * from register where id='".$ud."'";

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
            <div class="col-md-3 col-sm-3 col-xs-1">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-10">
			<form action="" method="POST" enctype="multipart/form-data"  class="regForm">';
			while($x=mysqli_fetch_array($sq))
			{
echo'ID :<input class="form-control" type="text" name="i" value="'.$x['id'].'" readonly><br><br>';
echo'Name :<input class="form-control" type="text" name="n" value="'.$x['name'].'" ><br><br>';
echo'Phone :<input class="form-control" type="text" name="ph" value="'.$x['phone'].'" ><br><br>';
echo'E-mail :<input class="form-control" type="text" name="em" value="'.$x['email'].'" ><br><br>';
echo'Password :<input class="form-control" type="text" name="ps" value="'.$x['password'].'" ><br><br>';
echo'<img src="'.$x['photo'].'" width="75" height="75">';
echo'<br><br>Photo :<input class="form-control" type="file" name="im"><br><br>';
echo'<br><br><input type="submit" name="aup" value="update"  class="up_btn">';
			}
		echo'</form></div>
            <div class="col-md-3 col-sm-3 col-xs-1">
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
	echo "<meta http-equiv='refresh' content='0'>";
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
	
	echo "<meta http-equiv='refresh' content='0'>";
	
	
	
} 

else
{
	echo' Error : '.mysqli_error($cn);	
}


}	
}
else
{
	echo'<script> alert("Check")</script>';
}		
		
		
 
}
 
 
 

?>


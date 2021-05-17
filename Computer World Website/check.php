<title>Check</title>
<?php

	if(isset($_POST['s']))
	{
		$i=$_POST['i'];
		$p=$_POST['p'];
		if(($i=='Pratyush' || $i=='pratyush') && $p=='qwerty')
		{
			session_start();
			$_SESSION['aid']=session_id();
			$_SESSION['a']=$i;
			header("location:admin.php");
		}
		else
		{
		include"connection.php";

		$q="select * from register where id='".$i."' and password ='".$p."'";

		$sq=mysqli_query($cn,$q); 
		if(mysqli_fetch_array($sq)>0)
		{
			session_start();
			$_SESSION['uid']=session_id();
			$_SESSION['u']=$i;
			header("location:user.php");
		
		}
		else
		{
		
			header("location:login.php");
			
		}
		}
		
	}
	else
	{
	header("location:login.php");
	}

?>
<title>Bill Table Creation</title>
<?php
	include"connection.php";
	$t="create table bill(Id int(9) auto_increment  not null,Email varchar(50) not null,Phone varchar(20) not null,Product varchar(500),Photo varchar(500),Batch_No varchar(30) not null,Quantity int(5) not null,Rate int(8) not null,Amount int(8) not null,Description varchar(400) not null,primary key(Id))";
	
	$q=mysqli_query($cn,$t);
	if($q)
	{
		echo'Bill Table created successfully.';
	}
	else
	{
		echo'<br>Error : '.mysqli_error($cn);
	}
?>
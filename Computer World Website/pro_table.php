<title>Product Table Creation</title>
<?php
include"connection.php";

	$t="create table product(Batch_No varchar(40) not null, Name varchar(50) not null,Rate int not null,Quantity int not null,Description varchar(400) not null,Photo varchar(500), primary key(Batch_No))";
$q=mysqli_query($cn,$t);
		if($q)
		{
		echo'Table created Successfully';
		}
		else
		{
		echo'<br>Error :'.mysqli_error($cn);
		}
?>
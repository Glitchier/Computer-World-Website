<title>Reg. Table Creation</title>
<?php
include"connection.php";

	$t="create table registration (id varchar(40) not null, email varchar(50) not null unique, password varchar(40) not null, phone varchar(20) not null,photo varchar(500) not null , primary key(id))";
$q=mysqli_query($ct1,$t);
		if($q)
		{
		echo'Table created Successfully';
		}
		else
		{
		echo'<br>Error :'.mysqli_error($ct1);
		}
?>
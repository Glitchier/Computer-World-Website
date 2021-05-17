<title>Register Table Creation</title>
<?php
include"connection.php";
$sq="create table register(id varchar(20) not null,name varchar(30) not null,phone varchar(20) not null,email varchar(50) not null unique,
password varchar(20) not null, photo varchar(500) not null, primary key(id))";

$q=mysqli_query($cn,$sq);

if($q)
{
	echo'Table Created.';
}
else
{
	echo' Error : '.mysqli_error($cn);	
}

?>
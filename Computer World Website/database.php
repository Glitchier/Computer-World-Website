<?php
$s1='localhost:3306';
$u1='root';
$p1='qwerty';

$cn=mysqli_connect($s1,$u1,$p1);

$sq="create database Computer_Assembly";

$q=mysqli_query($cn,$sq);

if($q)
{
	echo'Database Created. ';
}
else
{
	echo' Error : '.mysqli_error($cn);	
}

?>
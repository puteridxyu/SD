<?php

$connection = mysqli_connect("127.0.0.1","root","","sdd");

if(!$connection)
{
	echo "Database connection faild...";
}
	



	$id=$_GET['id'];;
	mysqli_query($connection,"delete from `register` where id='$id'");
	header('location:../../Application%20Layer/Manage%20Registration/customerdetails.php');
?>
<?php
	include('db.php');
	$prodid = $_POST['prodid'];
	$pname=$_POST['pname'];
	$desc=$_POST['desc'];
	$price=$_POST['price'];
	$cat=$_POST['cat'];
	$con = mysqli_connect("localhost","root","root","dbgadget");
	mysqli_query($con,"UPDATE products SET Product='$pname', Description='$desc', Price='$price', Category='$cat' WHERE ID='$prodid'");
	header("location: admin.php");
?>
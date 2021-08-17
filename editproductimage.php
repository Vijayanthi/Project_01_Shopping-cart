<?php
	include('db.php');
	$id=$_GET['id'];
	$con = mysqli_connect("localhost","root","root","dbgadget");
	$result = mysqli_query($con,"SELECT * FROM products where ID='$id'");
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
			{
				$image=$row['imgUrl'];
			}
?>
<img src="reservation/img/products/<?php echo $image ?>">
<form action="editpicexec.php" method="post" enctype="multipart/form-data">
	<br>
	<input type="hidden" name="prodid" value="<?php echo $id=$_GET['id']; ?>">
	Select Image
	<br>
	<input type="file" name="image"><br>
	<input type="submit" value="Upload">
</form>
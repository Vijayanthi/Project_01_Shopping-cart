<style type="text/css">
<!--
.ed{
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
}
#button1{
text-align:center;
font-family:Arial, Helvetica, sans-serif;
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
background-color:#00CCFF;
height: 34px;
}
-->
</style>
<?php
	include('db.php');
	$id=$_GET['id'];
	$con = mysqli_connect("localhost","root","root","dbgadget");
	$result = mysqli_query($con,"SELECT * FROM products where ID='$id'");
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
			{
				$pname=$row['Product'];
				$desc=$row['Description'];
				$price=$row['Price'];
				$cat=$row['Category'];
			}
?>
<form action="execeditproduct.php" method="post">
	<input type="hidden" name="prodid" value="<?php echo $id=$_GET['id'] ?>">
	Product Name:<br><input type="text" name="pname" value="<?php echo $pname ?>" class="ed"><br>
	Description:<br><input type="text" name="desc" value="<?php echo $desc ?>" class="ed"><br>
	Price:<br><input type="text" name="price" value="<?php echo $price ?>" class="ed"><br>
	Category:<br>
        <select name="cat" class="ed">
            <?php
                include('db.php');
                $con = mysqli_connect("localhost","root","root","dbgadget");
                $r = mysql_query($con,"select * from category"); 
                while($row = mysqi_fetch_array($r,MYSQLI_ASSOC)){
                    $selected = ($cat == $row['title']) ? " selected='selected'" : "";
                     echo '<option '.$selected.'>'.$row['title'].'</option>';
                }
            ?>
              </select>
    <br>
	<input type="submit" value="Update" id="button1">
</form>
<?php include('include/home/header.php'); ?>

    	<section>
		<div class="container">
			<div class="row">

                    
    <div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">All Products</h2>

	
<!--php starts here-->
<?php				
				//$filter = isset($_POST['filter']) ? $_POST['filter'] : '';
				if(isset($_POST['filter']))
				{
					$filter = $_POST['filter'];
					$con = mysqli_connect("localhost","root","root","dbgadget");
					$result = mysqli_query($con,"SELECT * FROM products where Product like '%$filter%' or Description like '%$filter%' or Category like '%$filter%'");
                    
				}
				else
				{
					$con = mysqli_connect("localhost","root","root","dbgadget");
					$result = mysqli_query($con,"SELECT * FROM products");
                }
					
				if($result){				
				while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
					
				$prodID = $row["ID"];	
					echo '<ul class="col-sm-4">';
					echo '<div class="product-image-wrapper">
						  <div class="single-products">
						  <div class="productinfo text-center">
					<a href="product-details.php?prodid='.$prodID.'" rel="bookmark" title="'.$row['Product'].'"><img src="reservation/img/products/'.$row['imgUrl'].'" alt="'.$row['Product'].'" title="'.$row['Product'].'" width="150" height="150" /></a>
                    </a>
					
					<h2><a href="product-details.php?prodid='.$prodID.'" rel="bookmark" title="'.$row['Product'].'">'.$row['Product'].'</a></h2>
					<h2>'.$row['Price'].'</h2>
					<p>Category: '.$row['Category'].'</p>
					
					<a href="product-details.php?prodid='.$prodID.'" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Details</a>
					</div>';		
					echo '</ul>';			
				}
				}
				?>

<!--php ends here-->
		</div>
        </div>
</div>
</div>
</div>
</section>

<?php include('include/home/footer.php'); ?>
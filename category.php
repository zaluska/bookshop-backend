<?php include 'includes/session.php'; ?>
<?php
	$slug = $_GET['category'];

	$conn = $pdo->open();

	try{
		$stmt = $conn->prepare("SELECT * FROM category WHERE cat_slug = :slug");
		$stmt->execute(['slug' => $slug]);
		$cat = $stmt->fetch();
		$catid = $cat['id'];
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	$pdo->close();

?>
<?php include 'includes/header.php'; ?>

<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content py-4 mb-4">
	        <div class="row ">
	        	<div class="col-sm-9">
		            <h1 class="page-header py-4 mb-4"><?php echo $cat['name']; ?></h1>
		       		<?php
		       			
		       			$conn = $pdo->open();

		       			try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = :catid");
						    $stmt->execute(['catid' => $catid]);
						    foreach ($stmt as $row) {
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='row'>";
	       						echo "
											 <div class='col-md-4'>
											 <div class='card bg-white text-dark text-center border-0'>
												 <div class='card-body'>
												 <img src='".$image."' width='100%' height='330' class='mb-2'>
												 <h6><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></h6>
												 <b class='text-danger'>kr. ".number_format($row['price'], 2)."</b>
											 </div>
										 </div>
									 </div>
	       						";
	       						if($inc == 3) echo "</div>";
						    }
						    if($inc == 1) echo "<div class='col-md-4'></div><div class='col-md-4'></div></div>"; 
							if($inc == 2) echo "<div class='col-md-4'></div></div>";
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						$pdo->close();

		       		?> 
	        	</div>
	        
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  
</div>
<footer id="main-footer" class="text-center p-4 text-dark">
    <div class="container">
      <div class="row">
        <div class="col">
         <strong>Copyright &copy;<span><?php echo date(' Y '); ?></span><a href="https://nackademin.se/">Nataliia, Fumie and Sureerat</a></strong>
        </div>
      </div>
    </div>
  </footer>	
<?php include 'includes/footer.php'; ?>
<?php include 'includes/scripts.php'; ?>

</body>
</html>

<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
<div class="wrapper">

	<div class="content-wrapper">
	  <div class="jumbotron jumbotron-fluid alert-primary">
  <div class="container">
    <h1 class="display-4 ">Welcome to our online bookshop</h1>
    <p class="lead"></p>
  </div>
</div>
	  
	    <div class="container">
		       		<?php
		       			$month = date('m');
		       			$conn = $pdo->open();

		       			try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT * FROM products");
						    $stmt->execute();
						    foreach ($stmt as $row) {
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='row mb-4'>";
										 echo "
										 
        								<div class='col-md-4'>
          								<div class='card bg-white text-dark text-center border-0'>
            								<div class='card-body'>
														<img src='".$image."' width='100%' height='400' class='mb-2'>
              							<h5><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></h5>
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
		
		</div>
	  </div>
		<footer id="main-footer" class="text-center p-4 bg-secondary text-white">
    <div class="container">
      <div class="row">
        <div class="col">
         <strong>Copyright &copy;<span><?php echo date(' Y '); ?></span><a href="https://nackademin.se/">Nataliia, Fumie and Sureerat</a></strong>
        </div>
      </div>
    </div>
  </footer>
   
  
  	<?php include 'includes/footer.php'; ?>
		</div>
</div>

<?php include 'includes/scripts.php'; ?>
<?php include 'includes/session.php'; ?>

<header class="main-header">
<nav class="navbar navbar-static-top navbar-expand-lg">
<div class="">
  <a href="index.php" class="navbar-brand text-white"><i class="fas fa-book-dead fa-2x mr-2"></i><b>Online-Bookshop</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  </div>
</nav>
</header>
<?php include 'includes/header.php'; ?>
<body class="hold-transition register-page">
<div class="register-box">
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>

  	<div class="register-box-body container py-4 mb-4">
    	<h2 class="login-box-msg mb-4">Register With Us</h2>

    	<form action="register.php" method="POST">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="firstname" placeholder="Firstname" value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>" required>
            <span class="form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="lastname" placeholder="Lastname" value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>"  required>
            <span class="form-control-feedback"></span>
          </div>
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
        		<span class="form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo (isset($_SESSION['address'])) ? $_SESSION['address'] : '' ?>" required>
            <span class="form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="postcode" placeholder="Postcode" value="<?php echo (isset($_SESSION['postcode'])) ? $_SESSION['postcode'] : '' ?>" required>
            <span class=" form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="city" placeholder="City" value="<?php echo (isset($_SESSION['city'])) ? $_SESSION['city'] : '' ?>" required>
            <span class="form-control-feedback"></span>
          </div>
          
         
          
      		<div class="row">
    			<div class="col-xs-4 ">
          			<button type="submit" class="btn btn-danger btn-block-lg btn-flat" name="signup"><i class="fa fa-pencil"></i> comfirm </button>
        		</div>
      		</div>
    	</form>
      <br>
      <!-- <a href="login.php">I already have a membership</a><br> -->
      <!-- <a href="index.php"><i class="fa fa-home"></i> Home</a> -->
  	</div>
</div>
	
<?php include 'includes/scripts.php' ?> 
</body>
</html>
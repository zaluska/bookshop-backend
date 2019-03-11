<header class="main-header">
<nav class="navbar navbar-static-top navbar-expand-lg">
<div class="container">
  <a href="index.php" class="navbar-brand text-white"><b>Online-Bookshop</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav p-0">
      <li class="nav-item">
        <a class="nav-link text-white px-2" href="index.php">Home</a>
      </li>
      
      <li class="nav-item dropdown text-white px-2">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Authors
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <?php
             
             $conn = $pdo->open();
             try{
               $stmt = $conn->prepare("SELECT * FROM category");
               $stmt->execute();
               foreach($stmt as $row){ 
                 echo "
                <a class='dropdown-item text-secondary' href='category.php?category=".$row['cat_slug']."'>".$row['name']."</a>
                 
                 ";                  
               }
             }
             catch(PDOException $e){
               echo "There is some problem in connection: " . $e->getMessage();
             }

             $pdo->close();

           ?>
         
        </div>
      </li>
      <li class="nav-item px-2">
        <a class="nav-link text-white" href="contact.php ">Contact us</a>
      </li>
    </ul>
        </div>
      </li>
    </ul>
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-shopping-cart text-white"></i>
              <span class="label label-success cart_count text-white"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- <li class="header">You have <span class="cart_count"></span></li> -->
              <li>
                <ul class="menu" id="cart_menu">
                </ul>
              </li>
              <li class="footer pl-2"><a href="cart_view.php"> Go to Cart</a></li>
            </ul>
          </li>
          
        </ul>
      </div>
    </div>
  </div>
  </div>
</nav>
</header>
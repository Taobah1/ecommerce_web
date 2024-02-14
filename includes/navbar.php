

  <nav class="navbar navbar-expand-lg bg-secondary sticky-top" id="load_cart">
    <div class="container">
      <a href="index.php" class="navbar-brand me-5"><img src="assets/img/taobah.jpg" width="70"  alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#ecomWebsite" aria-controls="ecomWebsite" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse ms-md-5" id="ecomWebsite">
        <div class="dropdown me-3">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          
          <ul class="dropdown-menu">
            <?php
            $category = getAll("categories");
            if(mysqli_num_rows($category) > 0){
              while($rows=mysqli_fetch_assoc($category)){

            ?>
            <li><a class="dropdown-item" href="products.php?category=<?= $rows['slug']; ?>"><?= $rows['name']; ?></a></li>
            <?php
              }
            }
            
            ?>

          </ul> 
        </div>
        <form action="search_data.php" method="get" class="d-flex" role="search">
          <input class="form-control me-2" type="search" name="search" placeholder="Search for products, brands and categories" aria-label="Search" style="width: 350px">
          <input class="btn btn-primary me-3" name="search_product" value="search" type="submit">
        </form>
        <ul class="navbar-nav me-auto">
          <li class="nav-item mt-2 mt-md-0">
            <div class="dropdown">
              <?php 
              if(isset($_SESSION['auth']))
              {
              ?>
              <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user me-1" aria-hidden="true"></i> Hello! <?= $_SESSION['auth_user']['name']; ?>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#"></a></li>
                <li><a class="dropdown-item" href="#"><i class="fa fa-user me-3" aria-hidden="true"></i>My Account</a></li>
                <li><a class="dropdown-item" href="orders.php"><i class="fab fa-first-order me-3"></i>Orders</a></li>
                <li><a class="dropdown-item" href=""><i class="fa-solid fa-inbox me-3"></i>Inbox</a></li>
                <li><a class="dropdown-item" href=""><i class="fa fa-heart me-3" aria-hidden="true"></i>Saved items</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-center text-warning" href="Logout.php">Logout</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item mt-2 mt-md-0 ms-0 ms-md-3">
            <a href="cart.php" class="nav-link text-white"><i class="fa-solid fa-cart-shopping"></i><sup><?php cartsItems(); ?></sup> My Cart</a>
          </li>
          <!-- <li class="nav-item">
            <a href="" class="nav-link text-white">Total Price: $<?php totalCarts(); ?></a>
          </li> -->
          <?php } 
            else{
              ?>
          <li class="nav-item">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user me-1" aria-hidden="true"></i> Account
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="login.php">SIGN IN</a></li>
                <li><a class="dropdown-item" href="register.php">REGISTER</a></li>
                <li><a class="dropdown-item" href="">Saved Items</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item ms-3">
            <a href="cart.php" class="nav-link text-white"><i class="fa-solid fa-cart-shopping"></i><sup></sup> My Cart</a>
          </li>
          <?php
            }
          ?>
          <li class="nav-item">
            <!-- <a href="orders.php" class="nav-link text-white">My Orders</a> -->
          </li>
        </ul>
      </div>
    </div>
  </nav>
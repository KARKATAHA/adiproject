<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../index.php">SuperFast Eshop</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../mycart.php" class="glyphicon glyphicon-shopping-cart">Cart</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span></span>Shop By Category<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../index.php">All</a></li>
            <?php
              getCats();
            ?>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> My Account<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?php
                  if(!isset($_SESSION['is_logged_in'])){
                    echo "<a href=\"../login.php\"><span ></span>Login</a>";
                  }
                  else{
                    echo "<a href=\"../customer/my_account.php\">".$_SESSION['username']."</a>";
                  }
                ?>
            </li>
            <li><a href="my_orders.php">Orders</a></li>
            <li role="separator" class="divider"></li>
            <li><?php
                  if(isset($_SESSION['is_logged_in']) and $_SESSION['is_logged_in']==1){
                    echo "<a href=\"../logout.php\"><span></span>Log Out</a>";
                  }
                ?>
            </li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
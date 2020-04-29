<style type="text/css">

  .navbar-default {
  background-color: #64B5F6;
  color: #FFFFFF;
  border-bottom-width: 3px;
  border-bottom-color: #ffffff;
}
</style>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">My Home Decoration</a>
    </div>
 
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li> <?php session_start();

            if(isset($_SESSION['userid']))  
            {  
               echo '<a href=""> <li>Welcome - '.$_SESSION['userid'].'</a></li>'; 
            }  
            else  
                {  
                 
                header("location:login.php");
                } 
               ?></li>
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="products.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Products</a></li>
            <li><a href="customers.php"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> Customers</a></li>
            <li><a href="staffs.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Staffs</a></li>
            <li><a href="orders.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Orders</a></li>
            <li><a href="catalogue.php"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Catalogue</a></li>
            <li><a href="search.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</a></li>
          </ul>
        </li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

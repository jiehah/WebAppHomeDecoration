<?php
include_once 'products_crud.php';
include_once 'database.php';
error_reporting(0);

  $per_page = 5;
  
  if (isset($_GET["page"]))
    $page = $_GET["page"];
  else 
    $page = 1;
    $start_from = ($page-1) * $per_page;

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM tbl_products_a164854_pt2 LIMIT $start_from, $per_page");

    $stmt->execute();

    $result = $stmt->fetchAll();
  } catch(PDOException $e){
    echo "Error: " . $e->getMessage();
  }

  if (isset($_GET["all"])) {
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT * FROM tbl_products_a164854_pt2 LIMIT $start_from, $per_page");

      $stmt->execute();

      $result = $stmt->fetchAll();
    } catch(PDOException $e){
      echo "Error: " . $e->getMessage();
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Home Decoration System : Catalogue</title>
    <link rel="icon" href="logo.jpg" type="image/ico" sizes="40x40">
    <link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative|Arapey|Cinzel:900" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="mypt3.css" />
 
  </head>

<style type="text/css">
  .thumbnail{        
  width: 100%; 
  height: 350px;
  overflow: auto;
}

.thumbnail img{
  // your styles for the image
  width: 100%;
  height: 35%;
  display: block;
  overflow: hidden;
  padding-top: 3%;
}

h4{
  font-family: 'Trebuchet', serif;
  text-align:left;
}
</style>

<body>

<?php include_once 'nav_bar.php'; ?>
<div class="container-fluid"> 
  <div class="row">

  <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
      <div class="page-header">
        <h2 style="font-family: 'Segoe UI';">My Home Decoration</h2>
      </div>

    <div class="col-md-3"> 
      <form action="catalogue.php" method="get" >
                <div class="form-group">

                <div class="input-group">
                <input id="searchText" type="text" class="form-control" placeholder="Search for..." name="text-search">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="submit" class="btn btn-default btn-block" name="search">Go</button>
                </span>
            </div>
            <!-- /input-group -->
                </div>
              </form>

              <div class="btn-group" style="width: 100%;">
                <a href="#" data-target="dropdown-menu" class="btn btn-default btn-block dropdown-toggle" data-toggle="dropdown">
                  Categories
                  <span class="caret"></span>
                </a>
                <?php try {
                  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                  $stmt = $conn->prepare("SELECT DISTINCT fld_type FROM tbl_products_a164854_pt2");

                  $stmt->execute();
                  $result = $stmt->fetchAll();
                }
                catch(PDOException $e){
                      echo "Error: " . $e->getMessage();
                } ?>
                <ul class="dropdown-menu" style="width: 100%;">
                  <?php foreach($result as $readrow) { ?>
                  <li><a href="catalogue.php?category=<?php echo $readrow['fld_type']; ?>"><?php echo $readrow['fld_type']; ?></a></li>
                  <?php
                    }
                    $conn = null;
                  ?>
                </ul>
              </div>

              <div class="btn-group" style="width: 100%; margin-top: 10px; margin-bottom: 10px;">
                <a href="#" data-target="dropdown-menu" class="btn btn-default btn-block dropdown-toggle" data-toggle="dropdown">
                  Sorting
                  <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" style="width: 100%;">
                  <li><a href="catalogue.php?sort=nameAsc">Name: A to Z</a></li>
                  <li><a href="catalogue.php?sort=nameDesc">Name: Z to A</a></li>
                  <li><a href="catalogue.php?sort=priceAsc">Price: Low to High</a></li>
                  <li><a href="catalogue.php?sort=priceDesc">Price: High to Low</a></li>
                </ul>
              </div>

              <a href="catalogue.php" class="btn btn-info btn-raised btn-block">Show all products</a>
            </div>

            <div class="col-md-9">
              <div class="row" id="dataSection">

                  <?php
                    // Read
                    $per_page = 6;
                    if (isset($_GET["page"]))
                      $page = $_GET["page"];
                    else
                      $page = 1;
                    $start_from = ($page-1) * $per_page;
                    try {
                      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          if(isset($_GET['search'])) {
                        $getSearch = $_GET['text-search'];

                        if ($getSearch == "all") {
                          $stmt = $conn->prepare("SELECT * FROM tbl_products_a164854_pt2");
                        }else {
                          $stmt = $conn->prepare("SELECT * FROM tbl_products_a164854_pt2 WHERE fld_product_name LIKE '%".$getSearch."%'");
                        }

                      } else if(isset($_GET["category"])){
                        $getCategory = $_GET["category"];
                        $stmt = $conn->prepare("SELECT * FROM tbl_products_a164854_pt2 WHERE fld_type = \"".$getCategory."\"");

                      } else if (isset($_GET["sort"])) {
                        $getSort = $_GET["sort"];

                        if($getSort == "nameAsc"){
                          $stmt = $conn->prepare("SELECT * FROM tbl_products_a164854_pt2 ORDER BY fld_product_name ASC");
                        } elseif ($getSort == "nameDesc") {
                          $stmt = $conn->prepare("SELECT * FROM tbl_products_a164854_pt2 ORDER BY fld_product_name DESC");
                        } elseif ($getSort == "priceAsc") {
                          $stmt = $conn->prepare("SELECT * FROM tbl_products_a164854_pt2 ORDER BY fld_price ASC");
                        } elseif ($getSort == "priceDesc") {
                          $stmt = $conn->prepare("SELECT * FROM tbl_products_a164854_pt2 ORDER BY fld_price DESC");
                        } 
                      } else {
                        $stmt = $conn->prepare("SELECT * FROM tbl_products_a164854_pt2 LIMIT $start_from, $per_page");
                      }

                      $stmt->execute();
                      $result = $stmt->fetchAll();
                    }
                    catch(PDOException $e){
                          echo "Error: " . $e->getMessage();
                    }
                  ?>

        <?php foreach($result as $readrow) { ?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                      <div class="thumbnail" >
              <?php if ($readrow['fld_image'] == "" ) { ?>
                <img src="pictures/nophoto.jpg" class="img-responsive">
              <?php } else { ?>
                <img src="pictures/<?php echo $readrow['fld_image'] ?>" class="img-responsive">
              <?php } ?>

              <div class="caption" >
                <h4><?php echo $readrow['fld_product_id']; ?></h4>
                <p style="height: 90px;">
                  <strong>Name : </strong><?php echo $readrow['fld_product_name']; ?><br>
                  <strong>Price :</strong> RM<?php echo $readrow['fld_price']; ?><br>
                  <strong>Type : </strong> <?php echo $readrow['fld_type']; ?><br>
                </p>
              </div>
              <!-- /.caption -->

              <a href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-primary btn-block" role="button">View</a>
            </div>
            <!-- /.thumbnail -->
                    </div>
        <?php } $conn = null; ?>

                    <center>
                      <?php if(!isset($_GET['category']) && !isset($_GET['sort']) && !isset($_GET['find']) && !isset($_GET['adv-find'])){ ?>
                      <div class="row">
                        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                          <nav>
                              <ul class="pagination">
                              <?php
                              try {
                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $stmt = $conn->prepare("SELECT * FROM tbl_products_a164854_pt2");
                                $stmt->execute();
                                $result = $stmt->fetchAll();
                                $total_records = count($result);
                              }
                              catch(PDOException $e){
                                    echo "Error: " . $e->getMessage();
                              }
                              $total_pages = ceil($total_records / $per_page);
                              ?>
                              <?php if ($page==1) { ?>
                                <li class="disabled"><span aria-hidden="true">«</span></li>
                              <?php } else { ?>
                                <li><a href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                              <?php
                              }
                              for ($i=1; $i<=$total_pages; $i++)
                                if ($i == $page)
                                  echo "<li class=\"active\"><a href=\"catalogue.php?page=$i\">$i</a></li>";
                                else
                                  echo "<li><a href=\"catalogue.php?page=$i\">$i</a></li>";
                              ?>
                              <?php if ($page==$total_pages) { ?>
                                <li class="disabled"><span aria-hidden="true">»</span></li>
                              <?php } else { ?>
                                <li><a href="catalogue.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
                              <?php } ?>
                            </ul>
                          </nav>
                        </div>
                    </center>
                </div> <?php } ?>
            </div>
        </div>
    </div>

    </div>

    

</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
 

   <footer class="container-fluid bg4 text-center">
  
  <p>Copyright © Nur Najihah Nizaruddin 2019</p>
</footer>
</body>
</html>
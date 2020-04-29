<?php
  include_once 'products_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>My Home Decoration System : Products</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 <link rel="icon" href="logo.jpg" type="image/ico" sizes="40x40">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

  <?php include_once 'nav_bar.php'; ?>
 
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
        <div class="page-header">
          <h2>Create New Product</h2>
        </div>
      <form action="products.php" method="post" class="form-horizontal">
        <div class="form-group">
          <label for="productid" class="col-sm-3 control-label">ID</label>
          <div class="col-sm-9">
          <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_id']; ?>" required> 
        </div>
        </div>
      <div class="form-group">
          <label for="productname" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
          <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>" required>
        </div>
        </div>
        <div class="form-group">
          <label for="productprice" class="col-sm-3 control-label">Price(RM)</label>
          <div class="col-sm-9">
          <input name="price" type="number" class="form-control" id="productprice" placeholder="Product Price"value="<?php if(isset($_GET['edit'])) echo $editrow['fld_price']; ?>" min="0.0" step="0.01" required>
         </div>
        </div>
      <div class="form-group">
          <label for="productsize" class="col-sm-3 control-label">Size(cm)</label>
          <div class="col-sm-9">
          <input name="size" type="text" class="form-control" id="productsize" placeholder="Product Size"value="<?php if(isset($_GET['edit'])) echo $editrow['fld_size']; ?>" required>
        </div>
        </div>
      <div class="form-group">
          <label for="producttype" class="col-sm-3 control-label">Type</label>
          <div class="col-sm-9">
            <select name="type" class="form-control" id="producttype" required>
              <option value="">Please select</option>
              <option value="Cabinet&Drawer"
              <?php if(isset($_GET['edit'])) if($editrow['fld_type']=="Cabinet&Drawer") echo "selected"; ?>>Cabinet&Drawer</option>
              <option value="Candle holders & candles"
              <?php if(isset($_GET['edit'])) if($editrow['fld_type']=="Candle holders & candles") echo "selected"; ?>>Candle holders & candles</option>
              <option value="Chair&Sofa"
              <?php if(isset($_GET['edit'])) if($editrow['fld_type']=="Chair&Sofa") echo "selected"; ?>>Chair&Sofa</option>
              <option value="Frames&Picture" 
              <?php if(isset($_GET['edit'])) if($editrow['fld_type']=="Frames&Picture") echo "selected"; ?>>Frames&Picture</option>
              <option value="Lighting" 
              <?php if(isset($_GET['edit'])) if($editrow['fld_type']=="Lighting") echo "selected"; ?>>Lighting</option>
              <option value="Mirrors" 
              <?php if(isset($_GET['edit'])) if($editrow['fld_type']=="Mirrors") echo "selected"; ?>>Mirrors</option>
              <option value="Plant,plant pots&stands"
              <?php if(isset($_GET['edit'])) if($editrow['fld_type']=="Plant,plant pots&stands") echo "selected"; ?>>Plant,plant pots&stands</option>
            </select>
          </div>
        </div>    
        <div class="form-group">
          <label for="productmanufacturer" class="col-sm-3 control-label">Made In</label>
          <div class="col-sm-9">
          <div class="radio">
            <label>
            <input name="manufacturer" type="radio" id="productmanufacturer" value="China" <?php if(isset($_GET['edit'])) if($editrow['fld_manufacturer']=="China") echo "checked"; ?> checked> China 
            </label>
          </div>
          <div class="radio">
            <label>
            <input name="manufacturer" type="radio" id="productmanufacturer" value="Indonesia" <?php if(isset($_GET['edit'])) if($editrow['fld_manufacturer']=="Indonesia") echo "checked"; ?>>Indonesia 
          </label>
          </div>
          <div class="radio">
            <label>
            <input name="manufacturer" type="radio" id="productmanufacurer" value="Japan" <?php if(isset($_GET['edit'])) if($editrow['fld_manufacturer']=="Japan") echo "checked"; ?>>Japan 
             </label>
          </div>
          <div class="radio">
            <label>
            <input name="manufacturer" type="radio" id="productmanufacurer" value="Korea" <?php if(isset($_GET['edit'])) if($editrow['fld_manufacturer']=="Korea") echo "checked"; ?>> Korea
             </label>
          </div>
          <div class="radio">
            <label>
            <input name="manufacturer" type="radio" id="productmanufacurer" value="Malaysia" <?php if(isset($_GET['edit'])) if($editrow['fld_manufacturer']=="Malaysia") echo "checked"; ?>> Malaysia
             </label>
          </div>
          <div class="radio">
            <label>
            <input name="manufacturer" type="radio" id="productmanufacurer" value="Thailand" <?php if(isset($_GET['edit'])) if($editrow['fld_manufacturer']=="Thailand") echo "checked"; ?>> Thailand
            </label>
          </div>
          </div>
      </div>
        <div class="form-group">
          <label for="productdescription" class="col-sm-3 control-label">Description</label>
          <div class="col-sm-9">
          <input name="description" type="text" class="form-control" id="productdescription" placeholder="Product Description" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_description']; ?>" required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
        <?php if (isset($_GET['edit'])) { ?>
        <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_id']; ?>">
        <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
        <?php } else { ?>
          <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
          <?php } ?>
          <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
        </div>
      </div>
    </form>
     </div>
  </div>
    <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Products List</h2>
      </div>
      <table class="table table-striped table-bordered">
      <tr>
          <th>Product ID</th>
          <th>Name</th>
          <th>Price(RM)</th>
          <th>Size(cm)</th>
          <th>Type</th>
          <th>Made In</th>
          <th>Description</th>
          <th></th>
      </tr>
      <?php
      // Read
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
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>   
      <tr>
        <td><?php echo $readrow['fld_product_id']; ?></td>
        <td><?php echo $readrow['fld_product_name']; ?></td>
        <td><?php echo $readrow['fld_price']; ?></td>
        <td><?php echo $readrow['fld_size']; ?></td>
        <td><?php echo $readrow['fld_type']; ?></td>
        <td><?php echo $readrow['fld_manufacturer']; ?></td>
        <td><?php echo $readrow['fld_description']; ?></td>
        <td>
          <a href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
          <a href="products.php?edit=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-success btn-xs" role="button">Edit</a>
          <a href="products.php?delete=<?php echo $readrow['fld_product_id']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>
 
    </table>
     </div>
  </div>
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
              echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"products.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
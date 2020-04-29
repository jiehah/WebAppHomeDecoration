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
<title> Search</title>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="icon" href="logo.jpg" type="image/ico" sizes="40x40">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style type="text/css">
  .thumbnail {
    background: #ffffff;
    border-width:4px;  
    border-style:dotted solid;
  }

  .page-header{
    border-width:0px;  
    border-bottom-style: dashed;
  }

</style>
</head>
<body>

<?php include_once 'nav_bar.php'; ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Search</h2>
      </div>
  
  <table>
    <form method="post">
    <tr>
      <td>Fields</td>
      <td>Search Term</td>
      <td>Operator</td>
    </tr>

    <tr>
      <td><br><select name="cat1" class="form-control"><option value="fld_product_name">Product Name</option><option value="fld_price">Product Price</option><option value="fld_type">Product Type</option></select>
      </td>

      <td><br><input name="text1" type="text" class="form-control" required>
      </td>

      <td><br><select name="opt1" class="form-control"> <option value="or">OR</option><option value="and">AND</option></select> </td>
    </tr>

    <tr>
      <td><br><select name="cat2" class="form-control"> <option value="fld_price">Product Price</option><option value="fld_product_name">Product Name</option><option value="fld_type">Product Type</option>
      </td>

      <td><br><input name="text2" type="number" class="form-control" required>
      </td>

      <td><br><select name="opt2" class="form-control"> <option value="or">OR</option><option value="and">AND</option></select>
      </td>
    </tr>

    <tr>
      <td><br><select name="cat3" class="form-control"><option value="fld_type">Product Type</option><option value="fld_price">Product Price</option><option value="fld_product_name">Product Name</option>
      </td>

      <td><br><input name="text3" type="text" class="form-control" required>
      </td>
    </tr>


    <tr>
      <td><br><input type="submit" class="form-control" name="search" value="Search">
      </td>

      <td><br><center><a href="catalogue.php" target="" role="button" class="form-control"> Catalogue</a></center></td>
    </tr>

    </form>
  </table>
    </div>


<div class="row">
  <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
    <div class="page-header">
      <h2>Products List</h2>
    </div>
      
  


    <?php

    if (isset($_POST['search']))
    {
    try {
    $cat1=$_POST['cat1'];
    $text1=$_POST['text1'];
    $opt1=$_POST['opt1'];
    $cat2=$_POST['cat2'];
    $text2=$_POST['text2'];
    $opt2=$_POST['opt2'];
    $cat3=$_POST['cat3'];
    $text3=$_POST['text3'];
    
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * from tbl_products_a164854_pt2 where $cat1 = '$text1'  $opt1  $cat2 = '$text2' $opt2 $cat3 = '$text3'");
    $stmt->execute();
    $result = $stmt->fetchAll();
    }
    catch(PDOException $e){
    echo "Error: " . $e->getMessage();
    }
    foreach($result as $readrow) {
    ?> 

    <div class="col-sm-6 col-md-4">
      <div class="row" align="center">
              <div class="thumbnail col-md-11" >
                <img src="pictures/<?php echo $readrow['fld_image']; ?>"  alt="ALT NAME" style="width:250px;height:250px;">
                <div class="caption">
                 <h4><class="pull-left"><?php echo $readrow['fld_product_id']; ?><br> </class="pull-left"></h4>
                  <class="pull-right"><?php echo $readrow['fld_product_name']; ?><br> </class="pull-right">
                  <class="pull-right"><?php echo $readrow['fld_type']; ?><br> </class="pull-right">
                  <td>
                  <a href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
                  </td>
                </div>
              </div>
            
     </div>

   </div>
    

    <?php }} ?>
   
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

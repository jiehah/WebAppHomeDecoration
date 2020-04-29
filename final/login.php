<?php  
session_start();//session starts here  
  
?> 

<!DOCTYPE html>
<html>
<head>
  
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>My Home Decoration System : Login</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="icon" href="logo.jpg" type="image/ico" sizes="16x16">
<style>
      * {
    box-sizing: border-box;
    font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
    font-size: 16px;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
body {
    background-color: #435165;
}
.login {
    width: 400px;
    background-color: #ffffff;
    box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
    margin: 1px auto;
}
.login h1 {
    text-align: center;
    color: #5b6574;
    font-size: 24px;
    padding: 20px 0 20px 0;
    border-bottom: 1px solid #dee0e4;
}
.login form {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding-top: 20px;
}
.login form label {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 50px;
    height: 50px;
    background-color: #3274d6;
    color: #ffffff;
}
.login form input[type="password"], .login form input[type="text"] {
    width: 310px;
    height: 50px;
    border: 1px solid #dee0e4;
    margin-bottom: 20px;
    padding: 0 15px;
}
.login form input[type="submit"] {
    width: 100%;
    padding: 15px;
  margin-top: 20px;
    background-color: #3274d6;
    border: 0;
    cursor: pointer;
    font-weight: bold;
    color: #ffffff;
    transition: background-color 0.2s;
}
.login form input[type="submit"]:hover {
  background-color: #2868c7;
    transition: background-color 0.2s;
}
    </style>
  </head>
<body>


  <div class="col-md-12 text-center">
    <br>
    <img src="logo.jpg" width="20%" height= "20%" class="img-responsive" style="margin:0 auto;">
  </div>
    <div class="login">
      <h1>Login</h1>
      <form action="login.php" method="POST">
        <label for="uname">
          <i class="fas fa-user"></i>
        </label>
        <input type="text" placeholder="Username" name="uid"  required>
        <br>
        <label for="upass">
          <i class="fas fa-lock"></i>
        </label>
        <input type="password" placeholder="Password" name="password" required>
        <input type="submit" name="login">
      </form>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>


<?php  
  
include('database.php'); 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
if(isset($_POST['login']))  
{  
    $userid=$_POST['uid'];  
    $userpass=$_POST['password'];  
  
    $query = $conn->query("SELECT * FROM tbl_staffs_a164854_pt2 WHERE fld_staff_num = '$userid' AND fld_staff_password = '$userpass' ");
    $count = $query->rowcount();
    $row = $query->fetch();

    if($count > 0)  
    {  
      $_SESSION['userid'] = $_POST["uid"]; 
      header('Location: index.php');
    }  

    else{

      echo "<script>alert('Username or password is incorrect!')</script>";  
    }
  }

?>
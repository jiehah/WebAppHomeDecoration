<!DOCTYPE html>
<html>
<head>
  <title>My Home Decoration System : Customers</title>
</head>
<body>
  <center>
    <a href="index.php">Home</a> |
    <a href="products.php">Products</a> |
    <a href="customers.php">Customers</a> |
    <a href="staffs.php">Staffs</a> |
    <a href="orders.php">Orders</a>
    <hr>
    <form action="customers.php" method="post">
    <table>
      <tr>
        <td>Customer ID:</td>
        <td><input name="cid" type="text"></td>
      </tr>
      <tr>
        <td>Name:</td>
        <td><input name="fname" type="text"></td>
      </tr>
      <tr>
        <td>Gender:</td>
        <td>
          <input name="gender" type="radio" value="Male"> Male <br>
          <input name="gender" type="radio" value="Female"> Female <br>
        </td>
      </tr>
      <tr>
        <td>Phone Number:</td>
        <td><input name="phone" type="text"></td>
      </tr>
      <tr>
        <td> Address:</td>
        <td><input name="address" type="text"></td>
      </tr>
    </table>
      <button type="submit" name="create">Create</button>
      <button type="reset">Clear</button>
    </form>
    <hr>
    <table border="1">
      <tr>
        <td>Customer ID</td>
        <td>Name</td>
        <td>Gender</td>
        <td>Phone Number</td>
        <td>Address</td>
        <td></td>
      </tr>
      <tr>
        <td>C001</td>
        <td>Wawa</td>
        <td>Female</td>
        <td>011-1112333</td>
        <td>Jalan 24, Taman Harmoni 2 Bandar Teknologi Kajang</td>
        <td>
          <a href="customers.php">Edit</a>
          <a href="customers.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>C002</td>
        <td>Sarah</td>
        <td>Female</td>
        <td>012-6908122</td>
         <td>Jalan 1/2, Taman Seri Kemboja</td>
        <td>
          <a href="customers.php">Edit</a>
          <a href="customers.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>C003</td>
        <td>Qayyum</td>
        <td>Male</td>
        <td>019-6978321</td>
        <td>Jalan 6, Kawasan Perindustrian 5</td>
        <td>
          <a href="customers.php">Edit</a>
          <a href="customers.php">Delete</a>
        </td>
      </tr>
    </table>
  </center>
</body>
</html>
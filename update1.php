<?php
$host_heroku = "ec2-34-228-100-83.compute-1.amazonaws.com";
$db_heroku = "deg7glh2avsc8";
$user_heroku = "wxzpbrqdqzqnld";
$pw_heroku =
"985b689938ec46332a01823db58ec530c1448b58897b339c96d76e40cf604e1d";
$conn_string = "host=$host_heroku port=5432 dbname=$db_heroku user=$user_heroku password=$pw_heroku";
$pg_heroku = pg_connect($conn_string);
if (!$pg_heroku)
{
die('Error: Could not connect: ' . pg_last_error());
}
$pi=$_GET['pi'];
$pn=$_GET['pn'];
$pp=$_GET['pp'];
$qt=$_GET['qt'];
?>
<html>
 <head>
 <title> Update </title>
 </head>
 <body>
<style>
 body {
 background-image: url('background.jpg');
 background-attachment: fixed;
   background-size: 100%100%;
 }
 </style>
 <br>
 <form action="" method="GET">
 <table border"0" bgcolor="white" align="center" cellspacing="20">

 <tr>
 <td>Product ID</td>
 <td><input type="text" value="<?php echo "$pi" ?>" name="productid" required></td>
 </tr>

 <tr>
 <td>Product Name</td>
 <td><input type="text" value="<?php echo "$pn" ?>" name="productname" required></td>
 </tr>

 <tr>
 <td>Product Price</td>
 <td><input type="text" value="<?php echo "$pp" ?>" name="productprice" required></td>
 </tr>

 <tr>
 <td>Quantity</td>
 <td><input type="text" value="<?php echo "$qt" ?>" name="quantityonhand" required></td>
 </tr>

 <tr>
 <td colspan="2" align="center"><input type="submit" id="button" name="submit" value="Update"></td>
 </tr>
 </form>
 </table>
</body>
</html>
<?php
if($_GET['submit'])
{
$productid = $_GET['productid'];
$productname = $_GET['productname'];
$productprice = $_GET['productprice'];
$quantityonhand = $_GET['quantityonhand'];
  $query = "UPDATE atnshop1 SET productid='$productid', productname='$productname',
productprice='$productprice', quantityonhand='$quantityonhand' WHERE productid='$productid' ";
$data = pg_query($pg_heroku,$query);
if($data)
{
echo "<script>alert('Updated Successfully!')</script>";
?>
<meta http-equiv="refresh" content="0; url=https://huong-511.herokuapp.com/login1.php" />
<?php
}
else
{
echo "Failed to update the table.";
}
}
?>

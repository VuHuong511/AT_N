<html>
<head>
 <ul>
 <li> <a href="index.php"> Log out</a> </li>
 </ul>
 </head>
 <body>
 <style>
 body {
 background-image: url('background.jpg');
 background-attachment: fixed;
 background-size: 100%100%;
 }
 </style>
  <style>
table, th, td {
  border: 1px solid blue;
  padding: 5px;
}
table {
  border-spacing: 15px;
}
</style>
  <table border="2" bgcolor="white">
 <tr>
 <th>Toy ID</th>
 <th>Toy Name</th>
 <th>Toy Price</th>
 <th>Quantity</th>
 <th colspan="2" align="center">Action</th>
 </tr>
<?php
echo '<p>HUONG ATN Shop </p>';
$host_heroku = "ec2-34-228-100-83.compute-1.amazonaws.com";
$db_heroku = "deg7glh2avsc8";
$user_heroku = "wxzpbrqdqzqnld";
$pw_heroku = "985b689938ec46332a01823db58ec530c1448b58897b339c96d76e40cf604e1d";
$conn_string = "host=$host_heroku port=5432 dbname=$db_heroku user=$user_heroku password=$pw_heroku";
$pg_heroku = pg_connect($conn_string);
if (!$pg_heroku)
{
  die('Error: Could not connect: ' . pg_last_error());
}
 $query = 'select * from atnshop1';
$data = pg_query($pg_heroku, $query);
 $total = pg_num_rows($data);
if($total!=0)
{
while ($result=pg_fetch_assoc($data))
{
echo "
<tr>
<td>".$result['productid']."</td>
<td>".$result['productname']."</td>
<td>".$result['price']."</td>
<td>".$result['quantityonhand']."</td>
<td><a
href='update1.php?pi=$result[productid]&pn=$result[productname]&pp=$result[price]&qt=$result[quantityonhand]'>
Edit/Update</td>
<td><a href='delete1.php?pi=$result[productid]'>Delete</td>
</tr>
";
}
}

?>
 <form action="https://huong-511.herokuapp.com/add1.php">
 <input type="submit" value="Add" />
</form>
</body>
</html>

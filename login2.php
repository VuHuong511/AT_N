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
  border: 1px solid black;
  padding: 5px;
}
table {
  border-spacing: 15px;
}
</style>
 <table border="2">
 <tr>
 <th>Product ID</th>
 <th>Product Name</th>
 <th>Product Price</th>
 <th>Quantity</th>
 <th colspan="2" align="center">Operation</th>
 </tr>
<?php
echo '<p>GnouhP ATN Shop 2 </p>';
$host_heroku = "ec2-52-0-67-144.compute-1.amazonaws.com";
$db_heroku = "dd672fnuqneeiig";
$user_heroku = "xssfpwgzhjijiu";
$pw_heroku =
"6eb8e3cfe2223ce872b8c0c119a3f750019aa8b32c3efa67516adca3e1bda7d6";
$conn_string = "host=$host_heroku port=5432 dbname=$db_heroku user=$user_heroku password=$pw_heroku";
$pg_heroku = pg_connect($conn_string);
if (!$pg_heroku)
{
  die('Error: Could not connect: ' . pg_last_error());
}
 $query = 'select * from atnshop2';
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
<td>".$result['productprice']."</td>
<td>".$result['quantityonhand']."</td>
<td><a
href='update1.php?pi=$result[productid]&pn=$result[productname]&pp=$result[productprice]&qt=$result[quantityonhand]'>
Edit/Update</td>
<td><a href='delete1.php?pi=$result[productid]'>Delete</td>
</tr>
";
}
}

?>
 <form action="https://huong-511.herokuapp.com/add2.php">
 <input type="submit" value="Add" />
</form>
</body>
</html>

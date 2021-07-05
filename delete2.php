<?php
 $host_heroku = "ec2-34-228-100-83.compute-1.amazonaws.com";
 $db_heroku = "deg7glh2avsc8";
 $user_heroku = "wxzpbrqdqzqnld";
 $pw_heroku =
 "985b689938ec46332a01823db58ec530c1448b58897b339c96d76e40cf604e1d";
$conn_string = "host=$host_heroku port=5432 dbname=$db_heroku user=$user_heroku
password=$pw_heroku";
$pg_heroku = pg_connect($conn_string);
if (!$pg_heroku)
{
die('Error: Could not connect: ' . pg_last_error());
}
$productid=$_GET['pi'];
$query = "DELETE FROM atnshop2 WHERE productid = '$productid'";
$data = pg_query($pg_heroku,$query);
if($data)
{
 echo "<script>alert('Delete Successfully!')</script>";
?>
<meta http-equiv="refresh" content="0; url=https://huong-511.herokuapp.com/login2.php" />
<?php
}
else
{
 echo "Failed to delete.";
}
?>

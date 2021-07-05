<?php
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
$productid=$_GET['pi'];
$query = "DELETE FROM atnshop1 WHERE productid = '$productid'";
$data = pg_query($pg_heroku,$query);
if($data)
{
 echo "<script>alert('Delete Successfully!')</script>";
?>
<meta http-equiv="refresh" content="0; url=https://huong-511.herokuapp.com/login1.php" />
<?php
}
else
{
 echo "Failed to delete.";
}
?>

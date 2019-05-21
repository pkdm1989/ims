<?php
$hostname="localhost"; //local server name default localhost
$username="kappsxyz_ims";  //mysql username default is root.
$password="kappsxyz@007";       //blank if no password is set for mysql.
$database="kappsxyz_ims";  //database name which you created
$con=mysqli_connect($hostname,$username,$password);
if(! $con)
{
die('Connection Failed'.mysql_error());
}
mysqli_select_db($con,$database);
?>

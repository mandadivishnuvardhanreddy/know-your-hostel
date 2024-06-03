<?php
echo "hello world";
$severname="localhost";
$username="root";
$password="";
$database="hostel128";
$conn=mysqli_connect($severname,$username,$password,$database);
$sql="CREATE TABLE `hostel` (`name` VARCHAR(20),`cost` INT(6),`location` VARCHAR(20))";
mysqli_query($conn,$sql);
if(!$conn)
{
    die("failed to connect".mysqli_connect_error());
}
else{
 echo "connected";
}


?>
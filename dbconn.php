<?php 
//phpinfo();
//connecting to the server and the database
$servername = "localhost";
$username = "root";
$password = "Pass*123";
$conn = mysqli_connect($servername, $username, $password) or die(mysqli_error());
mysqli_select_db($conn, "discussion_forum")
 ?>
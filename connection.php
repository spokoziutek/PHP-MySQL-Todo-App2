<?php
$servername = "phpmysqltodo-server.mysql.database.azure.com";
$username = "titsnlcplv";
$password = "qweasdzxc123!";
$db_name = "phpcrud";
$conn = new mysqli($servername, $username, $password, $db_name, 3306);
if($conn->connect_error) {
    die("Connection failed".$conn->connect_error);
}
?>

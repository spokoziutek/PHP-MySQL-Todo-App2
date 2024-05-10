<?php
include "connection.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE from `tasks` where id=$id";
    $conn->query($sql);
}
header('location:/php_crud/index.php');
exit;
?>
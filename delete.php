<?php
include "connection.php";
if (isset($_GET['id'])) {
    $stmt = $conn->prepare("DELETE from tasks where id=?");
    $stmt->bind_param("i", $id);
    $id = $_GET['id'];
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
header('location:/php_crud/');
exit;
?>

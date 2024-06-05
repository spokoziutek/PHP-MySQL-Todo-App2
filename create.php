<?php
include "connection.php";
if (isset($_POST['submit'])) {
    $stmt = $conn->prepare("INSERT INTO tasks (name, url, deadline) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $url, $deadline);
    $name = $_POST['name'];
    $url = $_POST['url'];
    $deadline = $_POST['deadline'];
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header("location: /index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Todo | PHP MySQL Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body class="bg-light">
    <?php include('header.php'); ?>
    <main>
        <div class="container mt-5">
            <h1 class="text-center">Create New Todo</h1>
            <div class="col-lg-6 m-auto">
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label" for="name">NAME</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="url">URL</label>
                        <input type="text" id="url" name="url" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="deadline">DEADLINE</label>
                        <input type="date" id="deadline" name="deadline" class="form-control">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                    <a class="btn btn-info text-white" type="submit" name="cancel" href="./">Cancel</a>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>

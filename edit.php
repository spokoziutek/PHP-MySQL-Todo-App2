<?php
include "connection.php";

$id = $name = $url = $deadline = $error = $success = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['id'])) {
        header("location:/index.php");
        exit;
    }
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM tasks WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $url = $row["url"];
        $deadline = $row["deadline"];
    } else {
        header("location:/index.php");
        exit;
    }

    $stmt->close();
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST["name"];
    $url = $_POST["url"];
    $deadline = $_POST["deadline"];

    $stmt = $conn->prepare("UPDATE tasks SET name=?, url=?, deadline=? WHERE id=?");
    $stmt->bind_param("sssi", $name, $url, $deadline, $id);
    $stmt->execute();
    $stmt->close();
    header("location:/index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Todo | PHP MySQL Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body class="bg-light">
    <?php include('header.php'); ?>
    <main>
        <div class="container mt-5">
            <h1 class="text-center">Edit Todo</h1>
            <div class="col-lg-6 m-auto">
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label" for="name">NAME</label>
                        <input type="text" id="name" name="name" value="<?php echo $name; ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="url">URL</label>
                        <input type="text" id="url" name="url" value="<?php echo $url; ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="deadline">DEADLINE</label>
                        <input type="date" id="deadline" name="deadline" value="<?php echo $deadline; ?>" class="form-control">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                    <a class="btn btn-info text-white" type="submit" name="cancel" href="./">Cancel</a>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>

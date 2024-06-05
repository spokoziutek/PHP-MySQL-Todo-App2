<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP MySQL Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body class="bg-light">
    <?php include('header.php'); ?>
    <main>
        <div class="container mt-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>URL</th>
                        <th>DEADLINE</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "connection.php";
                    $sql = "select * from tasks";
                    $result = $conn->query($sql);
                    if (!$result) {
                        die("Invalid query!");
                    }
                    while ($row = $result->fetch_assoc()) {
                        echo "
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[url]</td>
                        <td>$row[deadline]</td>
                        <td>
                        <a class='btn btn-success' href='edit.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-danger' href='delete.php?id=$row[id]'>Delete</a>
                        </td>
                    </tr>
                    ";
                    }
                    ?>
                </tbody>
            </table>
            <img src="https://www.tapeciarnia.pl/tapety/normalne/72340_ziewajacy_kot.jpg" alt='ziewający kot'/>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>

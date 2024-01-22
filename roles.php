<?php
require_once('connection.php');
if (!empty($_POST)) {

    $name = $_POST['name'];
    $sql = "INSERT INTO roles(name) values(?)";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Role created successfully";
    } else {
        echo "Error creating role";
    }

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Add new roles</h1>
    <form action="" method="post">
        <label for="">Role:</label>
        <input type="email" name="email" required><br>

        <button>Create</button>
    </form>
    <a href="adminDashboard.php">Go to dashboard</a>


</body>

</html>
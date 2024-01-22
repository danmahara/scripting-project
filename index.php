<?php
require_once('connection.php');

// for seeing hashed password

// if (!empty($_POST)) {
//     $password = $_POST['password'];
//     $hashed_password = password_hash($password, PASSWORD_BCRYPT);
//     echo "Hashed Password: " . $hashed_password;
// }
if (!empty($_POST)) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch hashed password from the database based on the entered email
    $sql = "SELECT * FROM admin WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $response = $stmt->get_result();

    if ($response) {
        $userData = $response->fetch_assoc();
        // echo $userData['name'];
        if ($userData && password_verify($password, $userData['password_hash'])) {
            // Password is correct
            session_start();

            $_SESSION['name'] = $userData['name'];
            $_SESSION['is_set'] = true;
            echo "Logged in successfully";
            header("Location: adminDashboard.php");
            exit();
        } else {
            echo "Username and password not match";
        }
    } else {
        echo "User not found";
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
    <h1>Admin login</h1>
    <form action="" method="post">
        <label for="">Email:</label>
        <input type="email" name="email" required><br>
        <label for="">Password:</label>
        <input type="password" name="password"><br>
        <button>Submit</button>
    </form>
    <a href="users/index.php">Users Login</a>


</body>

</html>
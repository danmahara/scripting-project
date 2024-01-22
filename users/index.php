<?php
require_once('../connection.php');
if (!empty($_POST)) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    // Fetch hashed password from the database based on the entered email
    $sql = "SELECT * FROM users WHERE email='$email' ";
    $stmt = $conn->prepare($sql);
    // $stmt->bind_param('s', $email);
    $stmt->execute();
    $response = $stmt->get_result();

    if ($response) {
        $userData = $response->fetch_assoc();
        // echo $userData['name'];
        // if ($userData && password_verify($password, $userData['password_hash'])) {
        //     // Password is correct
        //     session_start();

        //     $_SESSION['name'] = $userData['name'];
        //     $_SESSION['is_set'] = true;
        //     echo "Logged in successfully";
        //     // header("Location: studentDashboard.php");
        //     exit();
    } else {
        echo "Username and password not match";
    }
} else {
    // echo "User not found";
    // }
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
    <h1>Users login</h1>
    <form action="" method="post">
        <label for="">Email:</label>
        <input type="email" name="email" required><br>
        <label for="">Password:</label>
        <input type="password" name="password"><br>
        <button>Login</button>
    </form>
</body>

</html>
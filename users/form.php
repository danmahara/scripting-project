<?php

require_once('../connection.php');

$sql = "SELECT * FROM roles";
$result = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1> Users account creation </h1>
    <form action="Create.php" onsubmit="return validation()">
        <label for="">Name:</label>
        <input type="text" name="name" required><br>
        <label for="">Email</label>
        <input type="email" name="email" required>
        <br>
        <label for="">Address:</label>
        <input type="text" name="address"><br>
        <label for="">Role:</label>

        <select name="role" id="">
            <option value="">Select</option>
            <?php foreach ($result as $role) { ?>
                <option value="">
                    <?= $role['name']; ?>
                </option>
            <?php } ?>
        </select>
        <br>
        <label for="">Password</label>
        <input type="text" name="password" id="password">
        <br>
        <label for="">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password"><label id="errorPassword"></label>
        <br>
        <button type="submit">Create</button>
    </form>

    <script>
        function validation() {
            // event.preventDefault(); // Prevent the default form submission

            var password = document.getElementById('password').value;
            var confirm_password = document.getElementById('confirm_password').value;
            var errorPassword = document.getElementById('errorPassword');

            if (password != confirm_password) {
                errorPassword.innerHTML = "Your password is not correct";
                return false;
            }

            if (password.length < 6) {
                alert('Password must be greater than 6 characters');
                return false;
            }

            // Reset the error message if passwords match and meet length requirement
            errorPassword.innerHTML = "";
            return true;
            alert(password);
        }
    </script>
</body>

</html>
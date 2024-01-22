<?php
require_once('connection.php');
$id = 1;
$sql = "SELECT name from admin where id='$id'";

$result = mysqli_query($conn, $sql);
// $result = $conn->query($sql);

$response = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin

    </title>
</head>

<body>
    <h1>Welcome,
        <?= $response['name']; ?>
    </h1>
    <!-- Button to show students detail -->
    <form action="student/studentList.php">
        <button>Show Students Details</button>
    </form>
    <form action="teacher/teacherList.php">
        <button>Show teacher Details</button>`
    </form>
    <form action="course/courseList.php">
        <button>Show course Details</button>
    </form>
    <form action="roles.php">
        <button>Add new roles</button>
    </form>
    
    <label for=""> Create account for users:</label>
    <a href="users/form.php">Create</a>
    <br>
    <a href="adminLogout.php">Logout</a>

    <!-- <select name="createRole" id="createRole" onchange="redirectToAccountCreation()">
        <option value="">Select for whom?</option>
        <option value="student">Student</option>
        <option value="teacher">Teacher</option>
    </select> -->
    <br><br>
    <script>
        function redirectToAccountCreation() {
            var selectedRole = document.getElementById("createRole").value;
            if (selectedRole === "student") {
                window.location.href = 'student/login.php';
            } else if (selectedRole === "teacher") {
                window.location.href = 'teacher/login.php';
            }
        }
    </script>
</body>

</html>
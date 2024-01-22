<?php
require_once('../connection.php');


// Query to retrieve all students
$sql = "SELECT course_name  FROM course";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Course details</h2>
    <table border="1">
        <tr>
            <th>Name</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            foreach ($result as $student) { ?>
                <tr>
                    <td>
                        <?= $student['course_name']; ?>
                    </td>
                </tr>
            <?php }
        } else {
            echo "<h3>No course found.</h3>";
        } ?>
    </table>
</body>

</html>
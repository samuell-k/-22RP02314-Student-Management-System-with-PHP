<?php

session_start();
if (!isset($_SESSION['username'])) {

    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    </style>
</head>

<body>

    <h1>STUDENT MANAGEMENT SYSTEM</h1><br>
    <a href="add.php"><span style=" text-decoration: none;">add new student</span></a><br>
    <a href="logout.php"><span>Logout</span></a>
    <h2>LIST OF ALL STUDENT</h2><br>

    <?php
    include("connect.php");

    $select = mysqli_query($conn, "SELECT * FROM student");
    if (mysqli_num_rows($select) > 0) {

        echo "<table border='1'><tr><th>ID</th><th>FirstName</th><th>LastName</th><th>Gender</th><th>Age</th><th>action</th></tr><br>";

        while ($row = mysqli_fetch_array($select)) {

            echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td><td ><a href='update.php?id=" . $row[0] . "'>Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='delete.php?id=" . $row[0] . "'>delete</a></td></tr>";
        }
    } else {

        echo "<h1>no students found</h1>";
    }

    ?>

</body>

</html
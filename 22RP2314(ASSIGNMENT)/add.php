<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>add new student on the system</h1><br>
    <form action="" method="post">

        <label for="">firstname</label><input type="text" name="fname" id=""><br><br>
        <label for="">lastname</label><input type="text" name="lname" id=""><br><br>
        <label for="">gender</label> &nbsp;&nbsp;Male <input type="radio" name="gender" id="" value="male">
        Female<input type="radio" name="gender" id="" value="female"><br><br>
        <label for="">Age</label><input type="number" name="age" id=""><br><br>

        <input type="submit" name="submit" id="" value="add student"><br>
    </form>
</body>

</html>

<?php

include("connect.php");

if (isset($_POST['submit'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];




    if (!empty($fname) && (!empty($lname)) && (!empty($gender)) && (!empty($age)) && (preg_match("/^[a-zA-Z ]*$/", $fname)) && (preg_match("/^[a-zA-Z ]*$/", $lname))  && (preg_match("/^[0-9]*$/", $age)) && (preg_match("/^[male,female]*$/", $gender))) {


        $insert = mysqli_query($conn, "INSERT INTO student(fname,lname,gender,age) VALUES('$fname','$lname','$gender','$age')");
        if ($insert) {

            header("location:home.php");
        } else {


            echo "data not inserted" . mysqli_error($conn);
        }
    } else {
        echo "use valid input";
    }
}









?>
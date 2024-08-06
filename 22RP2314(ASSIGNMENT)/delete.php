<?php
include("connect.php");

$id = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM student WHERE id='$id'");

if ($query) {


    header("location:home.php");
} else {
    echo "data not deleted";
}

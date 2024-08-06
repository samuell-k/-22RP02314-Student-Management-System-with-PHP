<?php

session_start();
if (!isset($_SESSION['username'])) {

    header("location:index.php");
}
?>
<?php

include("connect.php");
$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM student WHERE id ='$id'");



while ($row = mysqli_fetch_array($query)) {

?>

    <h1>update student information</h1><br>

    <form action="" method="post">

        <label for="">firstname</label><input type="text" name="fname" id="" value="<?php echo $row[1]; ?>"><br><br>
        <label for="">lastname</label><input type="text" name="lname" id="" value="<?php echo $row[2]; ?>"><br><br>
        <label for="">gender</label><input type="text" name="gender" id="" value="<?php echo $row[3]; ?>"><br>
        <label for="">Age</label><input type="number" name="age" id="" value="<?php echo $row[4]; ?>"><br><br>

        <input type="submit" name="submit" id="" value="save changes"><br>
    </form>



    </form>

<?php
}


if (isset($_POST['submit'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];




    if (!empty($fname) && (!empty($lname)) && (!empty($gender)) && (!empty($age)) && (preg_match("/^[a-zA-Z ]*$/", $fname)) && (preg_match("/^[a-zA-Z ]*$/", $lname))  && (preg_match("/^[0-9]*$/", $age)) && (preg_match("/^[male,female]*$/", $gender))) {


        $update = mysqli_query($conn, "UPDATE student SET fname='$fname',lname='$lname',gender='$gender',age='$age' WHERE id='$id'");
        if ($update) {
            header("location:home.php");
        } else {
            echo "failed to update data";
        }
    } else {

        echo "use valid input";
    }
}










?>
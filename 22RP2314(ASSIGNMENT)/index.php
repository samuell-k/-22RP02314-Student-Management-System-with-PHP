<?php

session_start();
if (isset($_SESSION['username'])) {

    header("location:home.php");
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
    <h2>Admin Page</h2>
    <form action="" method="post">

        <label for="">username</label><input type="text" name="username" id="" value="<?php if (isset($_COOKIE['username'])) {
                                                                                            echo $_COOKIE['username'];
                                                                                        }   ?>" placeholder="enter username"><br>
        <label for="">password</label><input type="password" name="password" id="" value="<?php if (isset($_COOKIE['password'])) {
                                                                                                echo $_COOKIE['password'];
                                                                                            }   ?>" placeholder="enter password"><br><br>
        <input type="submit" name="submit" id="" value="Login"><br><br>
        remind me <input type="checkbox" name="remind" id=""><br>




    </form>
</body>

</html>


<?php
include("connect.php");

if (isset($_POST['submit'])) {

    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $store = test_input($_POST['remind']);




    if (!empty($username) && (!empty($password)) && (preg_match("/^[a-zA-Z ]*$/", $username)) && (preg_match("/^[a-zA-Z0-9]*$/", $password))) {

        $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");

        $query1 = mysqli_num_rows($query);

        if ($query1 > 0) {

            if ($store) {
                $_COOKIE['username'] = $username;
                setcookie('username', $username, time() + 120);
                $_COOKIE['password'] = $password;
                setcookie('password', $password, time() + 120);
            } else {
                $_COOKIE['username'] = $username;
                setcookie('username', $username, time() + 0);
                $_COOKIE['password'] = $password;
                setcookie('password', $password, time() + 0);
            }

            $_SESSION['username'] = $username;
            header("location:home.php");
        } else {

            echo "<h3>user not found</h3>";
        }
    } else {
        echo "<h3>use valid input<h3>";
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
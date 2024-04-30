<?php
require_once('dbconnect.php');

if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['username']) && isset($_POST['passport']) 
&& isset($_POST['nid']) && isset($_POST['date_of_birth']) && isset($_POST['city']) && isset($_POST['country']) && isset($_POST['phone_no']) 
&& isset($_POST['email']) && isset($_POST['password'])){
    $f = $_POST['first_name'];
    $l = $_POST['last_name'];
    $u = $_POST['username'];
    $p1 = $_POST['passport'];
    $n = $_POST['nid'];
    $d = $_POST['date_of_birth'];
    $c1 = $_POST['city'];
    $c2 = $_POST['country'];
    $p2 = $_POST['phone_no'];
    $e = $_POST['email'];
    $p3 = $_POST['password'];

    $checkSql = "SELECT * FROM admins WHERE user_name = '$u'";
    $checkResult = mysqli_query($conn, $checkSql);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "Username already exists in the admins table. Please choose a different username.";
    } else {
        $sql = "INSERT INTO users VALUES ('$f', '$l', '$u', '$p1', '$n', '$d', '$c1', '$c2', '$p2', '$e', '$p3')";
        
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_affected_rows($conn)){
            echo "Inserted Successfully";
            header("Location: login.php");
        } else {
            echo "Insertion Failed";
            header("Location: signup.php");
        }
    }
}
?>
<?php 
include 'conn.php';

if (isset($_REQUEST["login"])){
    $uname = $_REQUEST["uname"];
    $psw = $_REQUEST["psw"];
    $_SESSION['uname'] = $uname;

    $sql = "SELECT * FROM user WHERE Email ='$uname' AND Password ='$psw'";
    $result = mysqli_query($conn, $sql);

    if ($result -> num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $uid = $row['U_ID'];
            $email = $row['Email'];
            $role = $row['Role'];
            $status = $row['Status'];
        }
        if ($status != 'restricted') {
            if ($role == 'volunteer') {
                $_SESSION['uid'] = $uid;
                header('Location: home_volunteer.php'); 
            }
            // else {
            //     $_SESSION['uid'] = $uid;
            //     header('Location: #.php'); 
            //     exit;
            // }
        }
        else {
            echo "<script> alert ('Your account is restricted!'); window.location.href = 'login.php';</script>";
        }
        
    }
    else {
        echo "<script> alert ('Incorrect username or password!'); window.location.href = 'login.php';</script>";
    }
}
?>
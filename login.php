<?php

include "config.php";

session_start();

$user = $_POST['user'];
$pass = $_POST['pass'];

if (isset($_POST['submit'])) {
    
    $sql = "SELECT * FROM user WHERE username='$user' AND password='$pass'";
    
    $result = mysqli_query($conn, $sql);
    
    $num = mysqli_num_rows($result); 

    if ($num > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION["id_user"] = $row["id"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["status"] = "login";
        $_SESSION["role"] = $row["role"];
        // echo "anda berhasil login";
        header('Location: admin.php');
    } else {
        header('Location: index.php?p=username dan password anda salah');
    }
}

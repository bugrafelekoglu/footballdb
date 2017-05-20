<?php
    include('config.php');
    session_start();

    $user = $_SESSION['login_user'];
    
    $sql = mysqli_query($db, "SELECT username FROM ... WHERE username = '$user'");

    $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
    
    $login_session = $row['username'];

    if(!isset($_SESSION['login_user'])){
        header("location: index.php");
    }
?>

<?php
    include("config.php");
    session_start();

    $username = $_SESSION['user'];

    $query = "DELETE f.*, p.* FROM Fan f, Person p WHERE p.username = '$username' and f.fan_id = p.person_id";
    $result = mysqli_query($db, $query);

    if ($result) {
        header("location: logout.php");
    }

    else {
        echo "Deletion unsuccessful";
    }
?>

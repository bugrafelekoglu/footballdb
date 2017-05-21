<?php
    include("config.php");
    session_start();
    echo "register enter";


        //FULLNAME

        $fullName = trim($_POST['full_name']);
        $fullName = strip_tags($fullName);
        $fullName = htmlspecialchars($fullName);

        //USERNAME

        $username = trim($_POST['user_name']);
        $username = strip_tags($fullName);
        $username = htmlspecialchars($fullName);

        //EMAIL

        $email = trim($_POST['email']);
        $email = strip_tags($email);
        $email = htmlspecialchars($email);

        //PASSWORD

        $password = trim($_POST['password']);
        $password = strip_tags($password);
        $password = htmlspecialchars($password);

        //CONFIRMPASSWORD

        $confirmPassword = trim($_POST['password_confirmation']);
        $confirmPassword = strip_tags($confirmPassword);
        $confirmPassword = htmlspecialchars($confirmPassword);

        // // Check if the entered values are okay
        // if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //     $validRegistration = false;
        //     $_SESSION['errorMessage'] = '1';
        //     header("location: index.php");
        //     exit();
        // }
        // $checkQuery = "SELECT * from Person WHERE username = '$username' or email = '$email'";
        //
        // $result = mysqli_query($db, $checkQuery);
        // if($result) {
        //     $validRegistration = false;
        //     $_SESSION['errorMessage'] = '2';
        //     header("location: index.php");
        //     exit();
        // }
        $query = "INSERT INTO Person(username, password, email, fullname, nationality)
                    VALUES ('$username', '$password', '$email', '$fullName', '')";
        $result = mysqli_query($db, $query);
        // if($result){
        //     echo "success";
        //     $fanQuery = "SELECT person_id from Person WHERE username = '$username' and password = '$password'";
        //     $result = mysqli_query($db, $fanQuery);
        //     $array = mysqli_fetch_array($result, MYSQLI_ASSOC);
        //     $fan_id = intval($array['person_id']);
        //     $fanQuery = "INSERT INTO Fan(fan_id, favourite_team) VALUES ($fan_id, '')";
        //     $result = mysqli_query($db, $fanQuery);

            if($result) {
                header("location: index_fan.php");
                $db->close();
                echo "you registered";
                exit();
            }


?>

<?php
    include("config.php");
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
        //TODO: VALIDATION
        $error = false;
        //Email Validation

        $emailQuery = "SELECT email FROM person WHERE email = '$email'";
        $result = mysqli_query($db, $emailQuery);
        $count = mysqli_num_rows($result);
        if(count != 0){
            $error = true;
            $emailFound = "Email that is provided is already in use";
        }

        //Password & Confirm Password Validation
        if($_POST['password'] != $_POST['password_confirmation']){
            $error = true;
            $passwordNotEqual = "Passwords should be same";
        }
        //If there is no error
        if(!$error){
            $query = "INSERT INTO Person(username, password, email, fullname, nationality)
                        VALUES ('$username', '$password', '$email', '$fullName', '')";
            $result = mysqli_query($db, $query);
            if($result){
                echo "success";

                unset($fullname);
                unset($username);
                unset($password);
                unset($email);

                header("location: index_fan.php");
                $db->close();
                echo "you registered";
                exit();
            }
        }
?>

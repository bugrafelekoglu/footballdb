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
        $query = "INSERT INTO Person(username, password, email, fullname, nationality)
                    VALUES ('$username', '$password', '$email', '$fullName', '')";

        $result = mysqli_query($db, $query);
        if($result){
            echo "success";
            header("location: index_fan.php");
            $db->close();
            echo "you registered";
            exit();
        }

?>

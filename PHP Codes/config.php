<?php
   define('DB_SERVER', '');
   define('DB_USERNAME', '');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', '');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>
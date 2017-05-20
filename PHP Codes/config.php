<?php
   define('DB_SERVER', '207.154.246.103');
   define('DB_USERNAME', 'cs353');
   define('DB_PASSWORD', 'transfermarkt');
   define('DB_DATABASE', 'footballdb');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>
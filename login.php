<?php
    include("config.php");
    session_start();
    echo "login successful";
    //LOGIN
    $_SESSION['whoLogin'] = null;
        // Username & Password
        echo "isset";
        $username = mysqli_real_escape_string($db, $_POST['emailInput']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        //SQL Code
        $sqlFan = "SELECT F.fan_id FROM fan F, person P WHERE P.person_id = F.fan_id AND (email = '$username' and password = '$password') or (username = '$username' and password = '$password')";
        $sqlDirector = "SELECT C.clubdirector_id, P.fullname FROM person P, clubdirector C WHERE P.person_id = C.clubdirector_id AND email = '$username' AND password = '$password'";
        $sqlTeamCoach = "SELECT T.teamcoach_id, P.fullname FROM teamCoach T, person P WHERE P.person_id = T.teamcoach_id AND (email = '$username' and password = '$password') or (username = '$username' and password = '$password')";
        $sqlPlayerCoach = "SELECT PC.playercoach_id, P.fullname FROM playerCoach PC, person P WHERE P.person_id = PC.playerCoach_id AND (email = '$username' and password = '$password') or (username = '$username' and password = '$password')";
        $sqlAgent = "SELECT id FROM agent WHERE (email = '$username' and password = '$password') or (username = '$username' and password = '$password')";
        $sqlPlayer = "SELECT player_id, P.fullname FROM player PL, person P WHERE P.person_id = PL.player_id AND (email = '$username' and password = '$password') or (username = '$username' and password = '$password')";
        //Session Numbers:
        //1: Fan
        //2: Director
        //3: Team Coach
        //4: Player Coach
        //5: Agent
        //6: Player
        //Result for Fan
        $result = mysqli_query($db, $sqlFan);
        //$row = mysql_fetch_array($result, MYSQL_ASSOC);
        $count = mysqli_num_rows($result);
        if($count > 0){
            session_start();
            $_SESSION['whoLogin'] = 1;
            $_SESSION['user'] = $username;
            header("location: index_fan.php");
            $db->close();
            echo "yeeeey";
            exit();
        }
        //Result for Director
        $result = mysqli_query($db, $sqlDirector);
        $count = mysqli_num_rows($result);
        if($count > 0){
            session_start();
            $_SESSION['whoLogin'] = 2;
            $_SESSION['user'] = $username;
            header("location: index_clubdirector.php");
            $db->close();
            exit();
        }
        //Result for Team Coach
        $result = mysqli_query($db, $sqlTeamCoach);
        $count = mysqli_num_rows($result);
        if($count > 0){
            session_start();
            $_SESSION['whoLogin'] = 3;
            $_SESSION['user'] = $username;
            header("location: index_teamcoach.php");
            $db->close();
            exit();
        }
        //Result for Player Coach
        $result = mysqli_query($db, $sqlPlayerCoach);
        $count = mysqli_num_rows($result);
        if($count > 0){
            session_start();
            $_SESSION['whoLogin'] = 4;
            $_SESSION['user'] = $username;
            header("location: index_playercoach.php");
            $db->close();
            exit();
        }
        //Result for Agent
        $result = mysqli_query($db, $sqlAgent);
        $count = mysqli_num_rows($result);
        if($count > 0){
            session_start();
            $_SESSION['whoLogin'] = 5;
            $_SESSION['user'] = $username;
            header("location: index_agent.php");
            $db->close();
            exit();
        }
        //Result for Player
        $result = mysqli_query($db, $sqlPlayer);
        $count = mysqli_num_rows($result);
        if($count > 0){
            session_start();
            $_SESSION['whoLogin'] = 6;
            $_SESSION['user'] = $username;
            header("location: index_player.php");
            $db->close();
            exit();
        }
        // header("location: index_register.php");
?>

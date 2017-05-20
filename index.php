<?php
    include("config.php");
    session_start();

    //LOGIN
    if(isset($_SESSION['whoLogin'])){

        //Session Numbers:
        //1: Fan
        //2: Director
        //3: Team Coach
        //4: Player Coach
        //5: Agent
        //6: Player

        if($_SESSION['whoLogin'] == 1){
            header("location: index_fan.php");
        }
        else if($_SESSION['whoLogin'] == 2){
            header("location: index_clubdirector.php");
        }
        else if($_SESSION['whoLogin'] == 3){
            header("location: index_teamcoach.php");
        }
        else if($_SESSION['whoLogin'] == 4){
            header("location: index_playercoach.php");
        }
        else if($_SESSION['whoLogin'] == 5){
            header("location: index_agent.php");
        }
        else if($_SESSION['whoLogin'] == 6){
            header("location: index_player.php");
        }
        else{
            header("location: index.php");
        }
    }

    //REGISTER
    if(isset($_SESSION['regUser'])){

        //FULLNAME

        $fullName = trim($_POST['full_name']);
        //$fullName = strip_tags($fullName);
        //$fullName = htmlspecialchars($fullName);

        //USERNAME

        $username = trim($_POST['user_name']);
        //$username = strip_tags($fullName);
        //$username = htmlspecialchars($fullName);

        //EMAIL

        $email = trim($_POST['email']);
        //$email = strip_tags($email);
        //$email = htmlspecialchars($email);

        //PASSWORD

        $password = trim($_POST['password']);
        //$password = strip_tags($password);
        //$password = htmlspecialchars($password);

        //CONFIRMPASSWORD

        $confirmPassword = trim($_POST['password_confirmation']);
        //$confirmPassword = strip_tags($confirmPassword);
        //$confirmPassword = htmlspecialchars($confirmPassword);

        //TODO: VALIDATION
        $query = "INSERT INTO Person(username, password, email, fullname, nationality)
                    VALUES ('$username', '$password', '$email', '$fullName', '')";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="favicon/favicon.ico">

    <title>Football Database v1.0</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="css/theme.css" rel="stylesheet">
    <link href="css/register_pop.css" rel="stylesheet">
</head>

<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                <a class="navbar-brand" href="#index">Football Database v1.0</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PLAYERS <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#player_perf">Performance Statistics</a></li>
                            <li><a href="#player_personal">Personal Statistics</a></li>
                        </ul>
                    </li>
                    <li><a href="#clubs">CLUBS</a></li>
                    <li><a href="#transfers">TRANSFERS</a></li>
                    <li><a href="#leagues">LEAGUES</a></li>
                    <li><a href="#cups">CUPS</a></li>

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                        <ul id="login-dp" class="dropdown-menu" style="padding: 10px">
                            <li>
                                <div class="row" style="width: 200px">
                                    <div class="col-md-12">
                                        <form class="form" role="form" method="post" action="login.php" accept-charset="UTF-8" id="login-nav">
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                                <input type="text" name="emailInput" class="form-control" id="exampleInputEmail2" placeholder="EmailUsername" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                <input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                                <div class="help-block text-right"><a href="">Forget the password?</a></div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="SignIn" class="btn btn-primary btn-block">Sign in</button>
                                            </div>
                                            <div class="checkbox">
                                                <label>
											 <input type="checkbox"> Keep me logged-in
											 </label>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="bottom text-center" data-toggle="modal" data-target="#myModal">
                                        Are you a fan? <a href="#"><b>Register</b></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->

        </div>
    </nav>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myMediumModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body modal-md">
                <div class="row">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-right:30px">
                    </button>
                    <div class="col-xs-12 col-sm-8 col-md-10 col-sm-offset-2 col-md-offset-1">
                        <form method="post" action="index.php" role="form">
                            <h2>Please Sign Up <small>Thanks.</small></h2>
                            <hr class="colorgraph">
                            <div class="form-group">
                                <input type="text" name="full_name" id="full_name" class="form-control input-lg" placeholder="Full Name" tabindex="3">
                            </div>
                            <div class="form-group">
                                <input type="text" name="user_name" id="user_name" class="form-control input-lg" placeholder="Username" tabindex="3">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
                                    </div>
                                </div>
                            </div>
                            <hr class="colorgraph" style="margin-top: 0px">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2"><input type="submit" name="regUser" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="container theme-showcase" role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <style>
            radio {
                font-size: 30px;
            }
        </style>
        <div class="jumbotron">
            <h1 style="margin:-10px">Welcome to Football Database </h1>
            <h3 style="margin:20px">Choose one topic: </h3>
            <div class="row marketing" style="margin:-30px 0px -20px -20px">

                <div class="btn-group" data-toggle="buttons" style="width:900px; margin: 35px 75px">
                    <label class="btn btn-warning btn-lg active" style="font-size:40px; width:180px">
                    <input type="radio" name="options" id="option1" autocomplete="off" checked> Player
                  </label>
                    <label class="btn btn-danger btn-lg" style="font-size:40px; width:160px">
                    <input type="radio" name="options" id="option2" autocomplete="off"> Club
                  </label>
                    <label class="btn btn-success btn-lg" style="font-size:40px; width:220px">
                    <input type="radio" name="options" id="option3" autocomplete="off"> League
                  </label>
                    <label class="btn btn-info btn-lg" style="font-size:40px; width:150px">
                    <input type="radio" name="options" id="option3" autocomplete="off"> Cup
                  </label>
                    <label class="btn btn-primary btn-lg" style="font-size:40px;width:190px">
                    <input type="radio" name="options" id="option3" autocomplete="off"> Match
                  </label>
                </div>

            </div>
            <h3 style="margin:20px">Then search: </h3>

            <div class="row marketing" style="margin:20px -8px">
                <form method="post" action="search.php?go" id="searchform">
                <input type="text" name="search" class="form-control" placeholder="Type football player, team or organization..." style="font-size:30px;width: 80%; float:left; height:50px">
                <button type="button" name="searchSubmit" class="btn btn-danger" style="float: right; width:150px; height:50px; font-size:30px">

               <!-- <#?php
                    if(isset($_POST['searchSubmit'])){
                       if(isset($_GET['go'])){
                           if(preg_match("^/[A-Za-z]+/", $_POST['search']))
                               $doSearch = $_POST['search'];
                       }
                        $searchQuery = "SELECT club_name, city, nation, transfer_budget, stadium, director
                                            CASE WHEN " .$doSearch "=club_name
                                                END
                                        FROM club C;
                                        SELECT player_name, year_birth, weight, height, position, foot, agent, value, team_name
                                            CASE WHEN " .$doSearch "=player_name
                                                END
                                        FROM player P NATURAL JOIN club C
                                        WHERE P.team = C.id;
                                        SELECT agent.fullname, player.fulname
                                            CASE WHEN " .$doSearch "=agent.fullname
                                                END
                                        FROM player P NATURAL JOIN agent A
                                        WHERE P.agent = agent.id;
                                        SELECT director.fullname, club_name
                                            CASE WHEN " .$doSearch "=director.fullname
                                                END
                                        FROM clubdirector D, club C
                                        WHERE D.id=C.director;"
                    }
                ?>-->
          <span class="glyphicon glyphicon-search" style="font-size:30px"></span>
        </button>
        </form>
            </div>

        </div>


        <div style="width: 100%; overflow: hidden;">
            <div class="panel panel-primary" style="width:700px; float:left">
                <div class="panel-heading">
                    <h1 class="panel-title" style="font-size:40px">Top 10 Most Valuable Leagues</h1>
                </div>
                <div class="panel-body" style="text-align:center;margin: auto;width: 100%;   padding: 10px;">
                    <div class="col-md-6" style="width:100%">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>League</th>
                                    <th>Country</th>
                                    <th>Clubs</th>
                                    <th>Players</th>
                                    <th>Avg Age</th>
                                    <th>Total Value</th>
                                </tr>
                            </thead>

                            <!--<#?php

                                echo "<tbody style= 'text-align:left'>";

                                $top10Leagues = "CREATE VIEW leagues_top10(name,nation,total_value,team_count,player_count,avg_age)
                                AS SELECT organization_name, nation, total_value, team_count, player_count, avg_age
                                FROM organization NATURAL JOIN (
                                    SELECT organization_id,nation, SUM(transfer_budget)+SUM(wage_budget) AS total_value
                                    FROM organization NATURAL JOIN standings NATURAL JOIN club
                                    GROUP BY(organization_id, nation))
                                NATURAL JOIN(
                                    SELECT organization_id, COUNT(*) AS player_count, AVG(age) AS avg_age
                                    FROM (organization NATURAL JOIN standings NATURAL JOIN club) JOIN player ON club_id=team
                                    GROUP BY organization_id)
                                WHERE division like 'league%'
                                ORDER BY total_value DESC
                                LIMIT 10";

                                $result = mysqli_query($db, $top10Leagues);

                                while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
                                    $league = $row["organization_name"];
                                    $country = $row["nation"];
                                    $clubCount = $row["team_count"];
                                    $playerCount = $row["player_count"];
                                    $averageAge = $row["avg_age"];
                                    $totalValue = $row["total_value"]

                                    echo "<tr>
                                            <td>" .$league . "</td>
                                            <td>" .$country . "</td>
                                            <td>" .$clubCount . "</td>
                                            <td>" .$playerCount . "</td>
                                            <td>" .$averageAge . "</td>
                                            <td>" .$totalValue . "</td>
                                    </tr>";
                                }
                                echo "</tbody>";

                            ?>-->
                        </table>
                    </div>
                </div>
            </div>

            <div class="panel panel-default" style="margin-left:730px; height:514px">
                <div class="panel-heading">
                    <h1 class="panel-title" style="font-size:40px">Cups</h1>
                </div>

                <br>
                <div style="text-align:center">
                    <a href="http://www.uefa.com/uefachampionsleague/" class="btn btn-lg btn-primary" target="_blank" style="width:220px">Champions League</a>
                    <p></p>
                    <a href="http://www.uefa.com/uefaeuropaleague/" class="btn btn-lg btn-success" target="_blank" style="width:220px">Europa League</a>
                    <p></p>
                    <a href="http://www.thefa.com/competitions/thefacup" class="btn btn-lg btn-info" target="_blank" style="width:220px">FA Cup</a>
                    <p></p>
                    <a href="http://www.tff.org/Default.aspx?pageID=288" class="btn btn-lg btn-warning" target="_blank" style="width:220px">Turkish Ziraat Cup</a>
                    <p></p>
                    <a href="http://www.uefa.com/uefasupercup/" class="btn btn-lg btn-success" target="_blank" style="width:220px">Super Cup</a>
                    <p></p>
                    <a href="http://www.soccer24.com/spain/copa-del-rey/" class="btn btn-lg btn-primary" target="_blank" style="width:220px">Copa Del Rey</a>
                    <p></p>
                    <a href="http://www.legaseriea.it/en/tim-cup/fixture-and-results" class="btn btn-lg btn-danger" target="_blank" style="width:220px">Coppa Italia</a>
                    <p></p>
                </div>
            </div>
        </div>

    </div>
    <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

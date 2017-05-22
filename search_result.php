<?php
    include("config.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Football Database v1.0</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                        <?php
                        if(isset($_SESSION['whoLogin'])){
                            $personQuery = "SELECT fullname, person_id FROM person WHERE email = '" .$_SESSION['email'] . "'";
                            $result = mysqli_query($db, $personQuery);
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            $userName = $row['fullname'];

                            echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'><b>" .$userName . "</b> <span class='caret'></span></a>

                        <ul class='dropdown-menu' style='padding: 10px; width:50%; text-align:right'>
                            <div style='width: 100px; margin: 1px 10px 10px 20px'>
                                <button type='submit' class='btn btn-primary' style=' width:100px'><span class='glyphicon glyphicon-user' style='margin:1px 5px 1px 1px'></span> Profile</button>

                            </div>
                            <p></p>
                            <div style='width: 100px; margin: 1px 10px 10px 20px'>
                                <form action='logout.php'>
                                <button type='submit' class='btn btn-danger' style=' width:100px'><span class='glyphicon glyphicon-log-out' style='margin:1px 5px 1px 1px'></span> Log out</button>
                                    </form>";
                                }

                                else { echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'><b>Login</b> <span class='caret'></span></a>
                                    <ul id='login-dp' class='dropdown-menu' style='padding: 10px'>
                                        <li>
                                            <div class='row' style='width: 200px'>
                                                <div class='col-md-12'>
                                                    <form class='form' role='form' method='post' action='login.php' accept-charset='UTF-8' id='login-nav'>
                                                        <div class='form-group'>
                                                            <label class='sr-only' for='exampleInputEmail2'>Email address</label>
                                                            <input type='email' class='form-control' id='exampleInputEmail2' placeholder='Email address' required>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label class='sr-only' for='exampleInputPassword2'>Password</label>
                                                            <input type='password' class='form-control' id='exampleInputPassword2' placeholder='Password' required>
                                                            <div class='help-block text-right'><a href=''>Forget the password?</a></div>
                                                        </div>
                                                        <div class='form-group'>
                                                            <button type='submit' class='btn btn-primary btn-block'>Sign in</button>
                                                        </div>
                                                        <div class='checkbox'>
                                                            <label>
                                                         <input type='checkbox'> Keep me logged-in
                                                         </label>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class='bottom text-center' data-toggle='modal' data-target='#myModal'>
                                                    Are you a fan? <a href='#'><b>Register</b></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>";
                                }
                                    ?>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->

        </div>
    </nav>
    <style>
        /* Credit to bootsnipp.com for the css for the color graph */

        .colorgraph {
            height: 5px;
            border-top: 0;
            background: #c4e17f;
            border-radius: 5px;
            background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        }
    </style> <?php

    if(!isset($_SESSION['whoLogin'])) {

    echo "<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myMediumModalLabel' aria-hidden='true'>
        <div class='modal-dialog modal-md'>
            <div class='modal-content'>
                <div class='modal-body modal-md'>
                    <div class='row'>
                        <button type='button' class='close' data-dismiss='modal' aria-hidden='true' style='margin-right:30px'>
                    X</button>
                        <div class='col-xs-12 col-sm-8 col-md-10 col-sm-offset-2 col-md-offset-1'>
                            <form role='form'>
                                <h2>Please Sign Up <small>Thanks.</small></h2>
                                <hr class='colorgraph'>
                                <div class='form-group'>
                                    <input type='text' name='full_name' id='full_name' class='form-control input-lg' placeholder='Full Name' tabindex='3'>
                                </div>
                                <div class='form-group'>
                                    <input type='text' name='user_name' id='user_name' class='form-control input-lg' placeholder='Username' tabindex='3'>
                                </div>
                                <div class='form-group'>
                                    <input type='email' name='email' id='email' class='form-control input-lg' placeholder='Email Address' tabindex='4'>
                                </div>
                                <div class='row'>
                                    <div class='col-xs-12 col-sm-6 col-md-6'>
                                        <div class='form-group'>
                                            <input type='password' name='password' id='password' class='form-control input-lg' placeholder='Password' tabindex='5'>
                                        </div>
                                    </div>
                                    <div class='col-xs-12 col-sm-6 col-md-6'>
                                        <div class='form-group'>
                                            <input type='password' name='password_confirmation' id='password_confirmation' class='form-control input-lg' placeholder='Confirm Password' tabindex='6'>
                                        </div>
                                    </div>
                                </div>
                                <hr class='colorgraph' style='margin-top: 0px'>
                                <div class='row'>
                                    <div class='col-md-8 col-md-offset-2'><input type='submit' value='Register' class='btn btn-primary btn-block btn-lg' tabindex='7'></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>";
}
?>
    <div class="container theme-showcase" role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <style>
            radio {
                font-size: 30px;
            }
        </style>
        <div class="jumbotron">
            <h1 style="margin:-10px">Search the Football Database </h1>
            <h3 style="margin:20px">Choose one topic: </h3>
            <div class="row marketing" style="margin:-30px 0px -20px -20px">
                <form method="post" action="search_result.php" id="searchform">
                <div class="btn-group" data-toggle="buttons" style="width:900px; margin: 35px 75px">
                    <label class="btn btn-warning btn-lg active" style="font-size:40px; width:180px">
                    <input type="radio" name="options" value="player" autocomplete="off" checked> Player
                  </label>
                    <label class="btn btn-danger btn-lg" style="font-size:40px; width:160px">
                    <input type="radio" name="options" value="club" autocomplete="off"> Club
                  </label>
                    <label class="btn btn-success btn-lg" style="font-size:40px; width:220px">
                    <input type="radio" name="options" value="league" autocomplete="off"> League
                  </label>
                    <label class="btn btn-primary btn-lg" style="font-size:40px;width:190px">
                    <input type="radio" name="options" value="match" autocomplete="off"> Match
                  </label>
                </div>

            </div>
            <h3 style="margin:20px">Then search: </h3>

            <div class="row marketing" style="margin:20px -8px">

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
            <div class="panel panel-warning" style="width:1140px; float:left; border-color:#EB9316">
                <div class="panel-heading" style="background:#EB9316">
                    <h1 class="panel-title" style="font-size:40px;color:white">Search results from players with key: <?php echo $_POST['search']; ?></h1>
                </div>
                <div class="panel-body" style="text-align:center;margin: auto;width: 100%;   padding: 10px">
                    <div class="col-md-6" style="width:100%">
                        <table class="table table-hover" style="font-size:34px">
                            <tbody style="text-align:left">
                                <?php
                                    if (isset($_POST['options'])){
                                        $markedButton = $_POST['options'];
                                    $searchText = $_POST['search'];
                                    if($markedButton == 'player') {
                                        $query = "SELECT fullname, value, position FROM player natural join person WHERE player_id = person_id and fullname LIKE '%$searchText%'";
                                        $result = mysqli_query($db, $query);

                                        while($rowResult = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                            echo "<tr>
                                                    <td>".$rowResult['fullname']."</td>
                                                    <td>".$rowResult['position']."</td>
                                                    <td>".$rowResult['value']."M$</td>

                                                    ";
                                        }
                                    }

                                    else if ($markedButton == 'club') {
                                        $query = "SELECT club_name, nation, transfer_budget FROM club WHERE club_name LIKE '%$searchText%' or city LIKE '%$searchText%' or nation LIKE '%$searchText%'";
                                        $result = mysqli_query($db, $query);

                                        while($rowResult = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                            echo "<tr>
                                                    <td>".$rowResult['club_name']."</td>
                                                    <td>".$rowResult['nation']."</td>
                                                    <td>".$rowResult['transfer_budget']."M$</td>
                                                    ";
                                    }
}
                                    else if($markedButton == 'league') {
                                        $query = "SELECT organization_name, organizer, team_count FROM organization WHERE organization_name LIKE '%$searchText%' or organizer LIKE '%$searchText%' or sponsor LIKE '%$searchText%'";
                                        $result = mysqli_query($db, $query);

                                        while($rowResult = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                            echo "<tr>
                                                    <td>".$rowResult['organization_name']."</td>
                                                    <td>".$rowResult['organizer']."</td>
                                                    <td>".$rowResult['team_count']."M$</td>

                                                    ";
                                    }
}
                                    else if ($markedButton == 'match') {
                                        $query = "SELECT match_date, stadium, organization FROM matchtable WHERE stadium LIKE '%$searchText%' or organization LIKE '%$searchText%'";
                                        $result = mysqli_query($db, $query);

                                        while($rowResult = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                            echo "<tr>
                                                    <td>".$rowResult['match_date']."</td>
                                                    <td>".$rowResult['stadium']."</td>
                                                    <td>".$rowResult['organization']."M$</td>

                                                    ";
                                    }
                                }
                            }

                                    else if (!isset($_POST['options'])){
                                        $searchText = $_POST['search'];
                                        $query = "SELECT fullname, value, position FROM player natural join person WHERE player_id = person_id and fullname LIKE '%$searchText%'";
                                        $result = mysqli_query($db, $query);
                                        echo "Players";
                                        while($rowResult = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                            echo "<tr>
                                                    <td>".$rowResult['fullname']."</td>
                                                    <td>".$rowResult['position']."</td>
                                                    <td>".$rowResult['value']."M$</td>
                                                    ";
                                                }
                                                    $query = "SELECT club_name, nation, transfer_budget FROM club WHERE club_name LIKE '%$searchText%' or city LIKE '%$searchText%' or nation LIKE '%$searchText%'";
                                                    $result = mysqli_query($db, $query);

echo "Clubs";
                                                    while($rowResult = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                        echo "<tr>
                                                                <td>".$rowResult['club_name']."</td>
                                                                <td>".$rowResult['nation']."</td>
                                                                <td>".$rowResult['transfer_budget']."M$</td>
                                                                ";
                                                            }
                                                                $query = "SELECT organization_name, organizer, team_count FROM organization WHERE organization_name LIKE '%$searchText%' or organizer LIKE '%$searchText%' or sponsor LIKE '%$searchText%'";
                                                                $result = mysqli_query($db, $query);

echo "Leagues";
                                                                while($rowResult = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                                    echo "<tr>
                                                                            <td>".$rowResult['organization_name']."</td>
                                                                            <td>".$rowResult['organizer']."</td>
                                                                            <td>".$rowResult['team_count']."M$</td>

                                                                            ";
                                    }
                                    $query = "SELECT match_date, stadium, organization FROM matchtable WHERE stadium LIKE '%$searchText%' or organization LIKE '%$searchText%'";
                                    $result = mysqli_query($db, $query);
echo "Matches";
                                    while($rowResult = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        echo "<tr>
                                                <td>".$rowResult['match_date']."</td>
                                                <td>".$rowResult['stadium']."</td>
                                                <td>".$rowResult['organization']."M$</td>

                                                ";
                                }
}
                                 ?>

                                <!-- <tr>
                                    <td>Vincent Aboubakar</td>
                                    <td>@Besiktas</td>
                                    <td>10.0M $</td>
                                </tr>
                                <tr>
                                    <td>Demba ba</td>
                                    <td>@Besiktas</td>
                                    <td>8.0M $</td>
                                </tr>
                                <tr>
                                    <td>Ryan Babel</td>
                                    <td>@Besiktas</td>
                                    <td>5.0M $</td>
                                </tr> -->
                       <!--         <tr>
                                    <td>Fenerbahçe</td>
                                    <td>Team @Turkey</td>
                                </tr>
                                <tr>
                                    <td>Serie A</td>
                                    <td>Italy</td>
                                </tr>
                                <tr>
                                    <td>Ligue 1</td>
                                    <td>France</td>
                                </tr>
                                <tr>
                                    <td>Eredivisie</td>
                                    <td>Netherlands</td>
                                </tr>
                                <tr>
                                    <td>Super Lig</td>
                                    <td>Turkey</td>
                                </tr>
                                <tr>
                                    <td>Liga NOS</td>
                                    <td>Portugal</td>
                                </tr>
                                <tr>
                                    <td>Premier Liga</td>
                                    <td>Russia</td>
                                </tr>
                                <tr>
                                    <td>Jupiler Pro League</td>
                                    <td>Belgium</td>
                                </tr>   -->
                            </tbody>
                        </table>
                        <h3 class="glyphicon glyphicon-chevron-down" style="margin:-10px "></h3>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>

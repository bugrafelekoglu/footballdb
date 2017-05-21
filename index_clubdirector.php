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
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="button" class="btn btn-default">
          <span class="glyphicon glyphicon-search"></span> Find
        </button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <?php
                            $clubDirectorQuery = "SELECT fullname, person_id FROM person WHERE email = '" .$_SESSION['user'] . "'";
                            $result = mysqli_query($db, $clubDirectorQuery);
                            $row = mysqli_fetch_array($result, MYSQL_ASSOC);
                            $clubDirectorName = $row['fullname'];
                        
                            echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'><b>" .$clubDirectorName . "</b> <span class='caret'></span></a>";
                        ?>
                        <ul class="dropdown-menu" style="padding: 10px; width:50%; text-align:right">
                            <div style="width: 100px; margin: 1px 10px 10px 20px">
                                <button type="submit" class="btn btn-primary" style=" width:100px"><span class="glyphicon glyphicon-user" style="margin:1px 5px 1px 1px"></span> Profile</button>

                            </div>
                            <p></p>
                            <div style="width: 100px; margin: 1px 10px 10px 20px">
                                <form action="logout.php">
                                <button type="submit" class="btn btn-danger" style=" width:100px"><span class="glyphicon glyphicon-log-out" style="margin:1px 5px 1px 1px"></span> Log out</button>
                                    </form>

                            </div>

                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->

        </div>
    </nav>

    <div class="container theme-showcase" role="main" style="poisiton:relative">
        <div class="bg" style="background: url('assets/pic/back.png') no-repeat center center;
  position: absolute;
  width: 1140px;
  height: 633px; /*same height as jumbotron */
  border-radius: 10px ;
  z-index: -1;"></div>
        <div class="jumbotron" style="background: rgba(245, 245, 245, 0.6)">
            <h1><span class="glyphicon glyphicon-heart" style="color: transparent;  border-style: outset; background: linear-gradient(to right, #193155 0%,#193155 50%,#2989d8 50%,#F3E508 50%,#F3E508 100%)"></span> <span style="text-decoration: underline"> 
                
                <?php
                    $teamNameQuery = "SELECT club_name FROM club WHERE director = '" .$row['person_id'] . "'";
                    $result = mysqli_query($db, $teamNameQuery);
                    $row = mysqli_fetch_array($result, MYSQL_ASSOC);
                    $clubName = $row['club_name'];
                
                    echo "" .$clubName . "</span> <h1>";
                ?>
                
            <div class="row marketing">
                <div class="col-lg-6">
                    <h3>City:</h3>
                    <h1 style="font-size:50px">
                        
                        <?php
                            $cityQuery = "SELECT city FROM club WHERE club_name = '" .$clubName . "'";
                            $resultCity = mysqli_query($db, $cityQuery);
                            $rowCity = mysqli_fetch_array($resultCity, MYSQL_ASSOC);
                            $cityName = $rowCity['city'];
                        
                            echo "<span class='label label-default'>" .$cityName . "</span>";
                        ?>
                    </h1>
                    <br>

                    <h3>Country:</h3>
                    <h2 style="font-size:50px">
                            <?php
                                $countryQuery = "SELECT nation FROM club WHERE club_name = '" .$clubName . "'";
                                $resultCountry = mysqli_query($db, $countryQuery);
                                $rowCountry = mysqli_fetch_array($resultCountry, MYSQL_ASSOC);
                                $countryName = $rowCountry['nation'];
                        
                                echo "<span class='label label-danger'> " .$countryName . "</span>";
                            ?>
                    </h2>
                    <br>
                    <h3>Stadium:</h3>
                    <h2 style="font-size:50px">
                            <?php
                                $stadiumQuery = "SELECT stadium FROM club WHERE club_name = '" .$clubName . "'";
                                $resultStadium = mysqli_query($db, $stadiumQuery);
                                $rowStadium = mysqli_fetch_array($resultStadium, MYSQL_ASSOC);
                                $stadiumName = $rowStadium['stadium'];
                        
                                echo "<span class='label label-warning'> " .$stadiumName . "</span>";
                            ?>
                    </h2>
                </div>

                <div class="col-lg-6">
                    <h3>Team Value:</h3>
                    <h2 style="font-size:50px">
                        <?php
                                //TODO: SUM TRANSFER BUDGET AND WAGE BUDGET
                                $teamValueQuery = "SELECT transfer_budget FROM club WHERE club_name = '" .$clubName . "'";
                                $resultTeamValue = mysqli_query($db, $teamValueQuery);
                                $rowTeamValue = mysqli_fetch_array($resultTeamValue, MYSQL_ASSOC);
                                $teamValue = $rowTeamValue['transfer_budget'];
                        
                                echo "<span class='label label-info'> " .$teamValue . " Million € </span>";
                            ?>
                    </h2>
                    <br>

                    <h3>Team Coach:</h3>
                    <h2 style="font-size:50px">
                        <?php
                                
                                $teamCoachQuery = "SELECT P.fullname FROM club C, person P WHERE C.coach = P.person_id AND 
                                club_name = '" .$clubName . "'";
                                $resultTeamCoach = mysqli_query($db, $teamCoachQuery);
                                $rowTeamCoach = mysqli_fetch_array($resultTeamCoach, MYSQL_ASSOC);
                                $teamCoach = $rowTeamCoach['fullname'];
                        
                                echo "<span class='label label-success'> " .$teamCoach . "</span>";
                            ?>
                    </h2>
                    <br>
                    <h3>Club Director:</h3>
                    <h2 style="font-size:50px">
                       <?php
                            echo "<span class='label label-primary'>" .$clubDirectorName ."</span>";
                        ?>
                    </h2>
                </div>
            </div>

        </div>
    </div>


    <div class="container theme-showcase" role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->

        <div style="width: 100%; overflow: hidden;">
            <div class="panel panel-primary" style="width:700px; float:left">
                <div class="panel-heading">
                    <h1 class="panel-title" style="font-size:50px">2016-17 Türkiye Süper Ligi</h1>
                </div>
                <div class="panel-body" style="text-align:center;margin: auto;width: 100%;   padding: 10px;">
                    <div class="col-md-6" style="width:100%">
                        <table class="table table-striped">
                            <thead>
                                <tr style="font-size:18px">
                                    <th>#</th>
                                    <th>Team</th>
                                    <th>Played</th>
                                    <th>Won</th>
                                    <th>Draw</th>
                                    <th>Lost</th>
                                    <th>GF</th>
                                    <th>GA</th>
                                    <th>GD</th>
                                    <th>Points</th>
                                </tr>
                            </thead>
                            <tbody style="text-align:center">
                                <tr>
                                    <td>1</td>
                                    <td style="text-align: left">Beşiktaş</td>
                                    <td>27</td>
                                    <td>18</td>
                                    <td>7</td>
                                    <td>2</td>
                                    <td>54</td>
                                    <td>23</td>
                                    <td>+31</td>
                                    <td>61</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td style="text-align: left">Başakşehir</td>
                                    <td>26</td>
                                    <td>15</td>
                                    <td>8</td>
                                    <td>3</td>
                                    <td>47</td>
                                    <td>22</td>
                                    <td>+25</td>
                                    <td>53</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td style="text-align: left">Galatasaray</td>
                                    <td>26</td>
                                    <td>15</td>
                                    <td>4</td>
                                    <td>7</td>
                                    <td>50</td>
                                    <td>28</td>
                                    <td>+22</td>
                                    <td>49</td>
                                </tr>
                                <tr style="background: #DBEEF3">
                                    <td>4</td>
                                    <td style="text-align: left">Fenerbahçe</td>
                                    <td>26</td>
                                    <td>13</td>
                                    <td>8</td>
                                    <td>5</td>
                                    <td>47</td>
                                    <td>25</td>
                                    <td>+22</td>
                                    <td>47</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td style="text-align: left">Trabzonspor</td>
                                    <td>27</td>
                                    <td>13</td>
                                    <td>5</td>
                                    <td>9</td>
                                    <td>31</td>
                                    <td>27</td>
                                    <td>+4</td>
                                    <td>44</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td style="text-align: left">Antalyaspor</td>
                                    <td>27</td>
                                    <td>12</td>
                                    <td>7</td>
                                    <td>8</td>
                                    <td>32</td>
                                    <td>32</td>
                                    <td>0</td>
                                    <td>43</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td style="text-align: left">Konyaspor</td>
                                    <td>26</td>
                                    <td>10</td>
                                    <td>8</td>
                                    <td>8</td>
                                    <td>31</td>
                                    <td>32</td>
                                    <td>-1</td>
                                    <td>38</td>
                                </tr>
                            </tbody>
                        </table>
                        <h3 class="glyphicon glyphicon-chevron-down" style="margin:-10px "></h3>
                    </div>
                </div>
            </div>

            <div class="panel panel-default" style="margin-left:730px; height:514px">
                <div class="panel-heading">
                    <h1 class="panel-title" style="font-size:50px">Cups</h1>
                </div>

                <br>
                <div style="text-align:center">
                    <button type="button" class="btn btn-lg btn-primary" style="width:220px">Champions League</button>
                    <p></p>
                    <button type="button" class="btn btn-lg btn-success" style="width:220px">Europa League</button>
                    <p></p>
                    <button type="button" class="btn btn-lg btn-info" style="width:220px">FA Cup</button>
                    <p></p>
                    <button type="button" class="btn btn-lg btn-warning" style="width:220px">Turkish Ziraat Cup</button>
                    <p></p>
                    <button type="button" class="btn btn-lg btn-success" style="width:220px">Super Cup</button>
                    <p></p>
                    <button type="button" class="btn btn-lg btn-primary" style="width:220px">Copa Del Rey</button>
                    <p></p>
                    <button type="button" class="btn btn-lg btn-danger" style="width:220px">Coppa Italia</button>
                    <p></p>
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
        window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>
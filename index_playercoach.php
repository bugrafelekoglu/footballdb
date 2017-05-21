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
    <link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet" media="screen">
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
    <style>
        .square,
        .btn {
            border-radius: 0px!important;
        }
        /* -- color classes -- */

        .coralbg {
            background-color: #F3E610;
        }

        .coral {
            color: #F3E610;
        }

        .red {
            color: #B21E37;
        }

        .turqbg {
            background-color: #20375A;
        }

        .turq {
            color: #20375A;
        }

        .white {
            color: #fff!important;
        }
        /* -- The "User's Menu Container" specific elements. Custom container for the snippet -- */

        div.user-menu-container {
            z-index: 10;
            background-color: #fff;
            margin-top: 20px;
            background-clip: padding-box;
            opacity: 0.97;
            filter: alpha(opacity=97);
            -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
        }

        div.user-menu-container .btn-lg {
            padding: 0px 12px;
        }

        div.user-menu-container h4 {
            font-weight: 300;
            color: #8b8b8b;
        }

        div.user-menu-container a,
        div.user-menu-container .btn {
            transition: 1s ease;
        }

        div.user-menu-container .thumbnail {
            width: 100%;
            min-height: 200px;
            border: 0px!important;
            padding: 0px;
            border-radius: 0;
            border: 0px!important;
        }
        /* -- Vertical Button Group -- */

        div.user-menu-container .btn-group-vertical {
            display: block;
        }

        div.user-menu-container .btn-group-vertical>a {
            padding: 20px 25px;
            background-color: #20375A;
            color: black;
            border-color: #fff;
        }

        div.btn-group-vertical>a:hover {
            color: black;
            border-color: white;
        }

        div.btn-group-vertical>a.active {
            background: #F3E610;
            box-shadow: none;
            color: white;
        }
        /* -- Individual button styles of vertical btn group -- */

        div.user-menu-btns {
            padding-right: 0;
            padding-left: 0;
            padding-bottom: 0;
        }

        div.user-menu-btns div.btn-group-vertical>a.active:after {
            content: '';
            position: absolute;
            left: 100%;
            top: 50%;
            margin-top: -13px;
            border-left: 0;
            border-bottom: 13px solid transparent;
            border-top: 13px solid transparent;
            border-left: 10px solid #000;
        }
        /* -- The main tab & content styling of the vertical buttons info-- */

        div.user-menu-content {
            color: #323232;
        }

        div.user-menu-content1 {
            color: #323232;
        }

        ul.user-menu-list {
            list-style: none;
            margin-top: 20px;
            margin-bottom: 0;
            padding: 10px;
            border: 1px solid #eee;
        }

        ul.user-menu-list>li {
            padding-bottom: 8px;
            text-align: center;
        }

        div.user-menu div.user-menu-content:not(.active) {
            display: none;
        }
        /* -- The btn stylings for the btn icons -- */

        .btn-label {
            position: relative;
            left: -12px;
            display: inline-block;
            padding: 6px 12px;
            background: rgba(0, 0, 0, 0.15);
            border-radius: 3px 0 0 3px;
        }

        .btn-labeled {
            padding-top: 0;
            padding-bottom: 0;
        }
        /* -- Custom classes for the snippet, won't effect any existing bootstrap classes of your site, but can be reused. -- */

        .user-pad {
            padding: 20px 25px;
        }

        .no-pad {
            padding-right: 0;
            padding-left: 0;
            padding-bottom: 0;
        }

        .user-details {
            background: #eee;
            min-height: 333px;
        }

        .user-image {
            max-height: 200px;
            overflow: hidden;
        }

        .overview h3 {
            font-weight: 300;
            margin-top: 15px;
            margin: 10px 0 0 0;
        }

        .overview h4 {
            font-weight: bold!important;
            font-size: 40px;
            margin-top: 0;
        }

        .view {
            position: relative;
            overflow: hidden;
            margin-top: 10px;
        }

        .view p {
            margin-top: 20px;
            margin-bottom: 0;
        }

        .caption {
            position: absolute;
            top: 0;
            right: 0;
            background: rgba(70, 216, 210, 0.44);
            width: 100%;
            height: 100%;
            padding: 2%;
            display: none;
            text-align: center;
            color: #fff !important;
            z-index: 2;
        }

        .caption a {
            padding-right: 10px;
            color: #fff;
        }

        .info {
            display: block;
            padding: 10px;
            background: #eee;
            text-transform: uppercase;
            font-weight: 300;
            text-align: right;
        }

        .info p,
        .stats p {
            margin-bottom: 0;
        }

        .stats {
            display: block;
            padding: 10px;
            color: white;
        }

        .share-links {
            border: 1px solid #eee;
            padding: 15px;
            margin-top: 15px;
        }

        .square,
        .btn {
            border-radius: 0px!important;
        }
        /* -- media query for user profile image -- */

        @media (max-width: 767px) {
            .user-image {
                max-height: 400px;
            }
        }
    </style>
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>
                            <?php
                                    
                                $playerCoachQuery = "SELECT fullname, person_id FROM person WHERE email = '" .$_SESSION['user'] . "'";
                                $result = mysqli_query($db, $playerCoachQuery);
                                $row = mysqli_fetch_array($result, MYSQL_ASSOC);
                                $playerCoachName = $row['fullname'];
                            
                                echo "" . $playerCoachName .  "</b> <span class='caret'></span></a>";
                            ?>
                            
                        <ul class="dropdown-menu" style="padding: 10px; width:50%; text-align:right">
                            <div style="width: 100px; margin: 1px 10px 10px 20px">
                                <button type="submit" class="btn btn-primary" style=" width:100px"><span class="glyphicon glyphicon-user" style="margin:1px 5px 1px 1px"></span> Profile</button>

                            </div>
                            <p></p>
                            <form action="logout.php">
                            <div style="width: 100px; margin: 1px 10px 10px 20px">
                                <button type="submit" class="btn btn-danger" style=" width:100px"><span class="glyphicon glyphicon-log-out" style="margin:1px 5px 1px 1px"></span> Log out</button>
                            </div>
                            </form>
                        </ul>
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
    </style>

    <div class="container theme-showcase" role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <style>
            radio {
                font-size: 30px;
            }
        </style>
        <div class="container" style="margin-bottom: 30px">
            <div class="row user-menu-container square" style="width:1140px; height: 333px">
                <div class="col-md-7 user-details">                       
                          <div class="user-pad">
                                
                                <?php
                                    $playerInfo = "SELECT * FROM player PL, person P, club C, playercoach PC WHERE P.person_id = PL.player_id AND PL.coach = PC.playercoach_id AND PL.team = C.club_id";
                                    //$playerInfo = "SELECT * FROM (player PL NATURAL JOIN person P) NATURAL JOIN playercoach PC WHERE P.person_id = PL.player_id AND PL.coach = PC.playercoach_id";
                                    $resultInfo = mysqli_query($db, $playerInfo);
                                
                                   
                                
                                    
                                    while($rowInfo = mysqli_fetch_array($resultInfo, MYSQL_ASSOC)){
                                        $name = $rowInfo['fullname'];
                                        $clubName = $rowInfo['club_name'];
                                        $nationality = $rowInfo['nationality'];
                                        $position = $rowInfo['position'];
                                        $value = $rowInfo['value'];
                                        
                                        echo "<h3>" .$name . "</h3>";
                                        echo "<h4 class='black'><i class='fa fa-check-circle-o'> Club Name: " .$clubName . "</i>"; 
                                        echo "<h4 class='black'><i class='fa fa-flag'></i> Nationality: " .$nationality . "</h4>";
                                        echo "<h4 class='black'><i class='fa fa-check-circle-o'></i> Position: " .$position . "</h4>";
                                        echo "<h4 class='black'><i class='fa fa-check-circle-o'></i> Value: " .$value . " Million €</h4>";
                                    }
                                ?>
                                
                            

                    </div>
                
                </div>
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
                            <tbody style="text-align:left">
                                <tr>
                                    <td>Premier League</td>
                                    <td>England</td>
                                    <td>20</td>
                                    <td>576</td>
                                    <td>25.8</td>
                                    <td>4.34 B €</td>
                                </tr>
                                <tr>
                                    <td>La Liga</td>
                                    <td>Spain</td>
                                    <td>20</td>
                                    <td>481</td>
                                    <td>27.1</td>
                                    <td>3.76 B €</td>
                                </tr>
                                <tr>
                                    <td>1. Bundesliga</td>
                                    <td>Germany</td>
                                    <td>18</td>
                                    <td>506</td>
                                    <td>27.1</td>
                                    <td>3.64 B €</td>
                                </tr>
                                <tr>
                                    <td>Serie A</td>
                                    <td>Italy</td>
                                    <td>18</td>
                                    <td>544</td>
                                    <td>28.8</td>
                                    <td>2.14 B €</td>
                                </tr>
                                <tr>
                                    <td>Ligue 1</td>
                                    <td>France</td>
                                    <td>20</td>
                                    <td>499</td>
                                    <td>26.9</td>
                                    <td>2.11 B €</td>
                                </tr>
                                <tr>
                                    <td>Eredivisie</td>
                                    <td>Netherlands</td>
                                    <td>18</td>
                                    <td>478</td>
                                    <td>24.2</td>
                                    <td>1.54 B €</td>
                                </tr>
                                <tr>
                                    <td>Super Lig</td>
                                    <td>Turkey</td>
                                    <td>18</td>
                                    <td>449</td>
                                    <td>28.4</td>
                                    <td>756.5 M €</td>
                                </tr>
                                <tr>
                                    <td>Liga NOS</td>
                                    <td>Portugal</td>
                                    <td>18</td>
                                    <td>510</td>
                                    <td>29.3</td>
                                    <td>650.3 M €</td>
                                </tr>
                                <tr>
                                    <td>Premier Liga</td>
                                    <td>Russia</td>
                                    <td>16</td>
                                    <td>410</td>
                                    <td>28.1</td>
                                    <td>503.2 M €</td>
                                </tr>
                                <tr>
                                    <td>Jupiler Pro League</td>
                                    <td>Belgium</td>
                                    <td>16</td>
                                    <td>411</td>
                                    <td>25.4</td>
                                    <td>430.2 M €</td>
                                </tr>
                            </tbody>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script>
        $(document).ready(function() {
            var $btnSets = $('#responsive'),
                $btnLinks = $btnSets.find('a');

            $btnLinks.click(function(e) {
                e.preventDefault();
                $(this).siblings('a.active').removeClass("active");
                $(this).addClass("active");
                var index = $(this).index();
                $("div.user-menu>div.user-menu-content").removeClass("active");
                $("div.user-menu>div.user-menu-content").eq(index).addClass("active");
            });
            $btnLinks.click(function(e) {
                e.preventDefault();
                $(this).siblings('a.active').removeClass("active");
                $(this).addClass("active");
                var index = $(this).index();
                $("div.user-menu1>div.user-menu-content1").removeClass("active");
                $("div.user-menu1>div.user-menu-content1").eq(index).addClass("active");
            });
        });

        $(document).ready(function() {
            $("[rel='tooltip']").tooltip();

            $('.view').hover(
                function() {
                    $(this).find('.caption').slideDown(250); //.fadeIn(250)
                },
                function() {
                    $(this).find('.caption').slideUp(250); //.fadeOut(205)
                }
            );
        });
    </script>
</body>
</html>
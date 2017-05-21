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
    <link rel="icon" href="favicon/favicon.ico">

    <title>Football Database v1.0</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="css/theme.css" rel="stylesheet">
    <link href="css/register-popup.css" rel="stylesheet">
    <link href="css/player-card.css" rel="stylesheet">
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
                <a class="navbar-brand" href="index.php">Football Database v1.0</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PLAYERS <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="player-performance.php">Performance Statistics</a></li>
                            <li><a href="player-personal.php">Personal Statistics</a></li>
                            <li><a href="injuries.php">Injuries</a></li>
                        </ul>
                    </li>
                    <li><a href="club-list.php">CLUBS</a></li>
                    <li><a href="transfers.php">TRANSFERS</a></li>
                    <li><a href="league-list.php">LEAGUES</a></li>
                    <li><a href="cup-list.php">CUPS</a></li>

                </ul>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span> Find
                    </button>
                </form>
                <?php 
                    if(isset($_SESSION['whoLogin'])) {
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b> <?php echo $_SESSION['user']; ?> </b> 
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" style="padding: 10px; width:50%; text-align:right">
                            <div style="width: 100px; margin: 1px 10px 10px 20px">
                                <a href="profile.php" class="btn btn-primary" target="_blank" style=" width:100px"><span class="glyphicon glyphicon-user" style="margin:1px 5px 1px 1px"></span> Profile</a>
                            </div>
                            <p></p>
                            <div style="width: 100px; margin: 1px 10px 10px 20px">
                                <a href="logout.php" class="btn btn-danger" style=" width:100px"><span class="glyphicon glyphicon-log-out" style="margin:1px 5px 1px 1px"></span> Log out</a>
                            </div>
                        </ul>
                    </li>
                </ul>
                <?php } else { ?>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php"><b> Login </b> </a>
                    </li>
                </ul>
                <?php } ?>
            </div>
            <!--/.nav-collapse -->

        </div>
    </nav>

    <div class="container theme-showcase" role="main">
        <div class="col-lg-12 col-sm-12">
            <div class="card hovercard" style="height: 370px; text-shadow: 2px 2px 4px #000000; background: linear-gradient(to right, #193155 0%,#193155 50%,#F3E508 50%,#F3E508 100%)">
                <div class="card-background">
                    <button type="submit" class="btn btn-primary" style=" width:180px; margin-left:900px"><span class="glyphicon glyphicon-pencil" style="margin:1px 5px 1px 1px"></span> Suggest Correction</button>
                    <button type="submit" class="btn btn-primary" style=" width:180px;height:50px;font-size:20px; margin-left:900px;margin-top:285px"><span class="glyphicon glyphicon-pencil" style="margin:1px 5px 1px 1px"></span> Make Offer</button>
                </div>
                <div class="useravatar" style="width:400px; margin:auto">
                    <img alt="" src="assets/pic/lens300.png">
                </div>
                <div class="card-info" style="width:400px; margin:auto"> <span class="card-title" style="color:white; font-size: 30px">Jeremain Lens</span>

                </div>
            </div>
            <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs" style="">Personal</div>
            </button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <div class="hidden-xs">Team</div>
            </button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                <div class="hidden-xs">Transfers</div>
            </button>
                </div>
            </div>

            <div class="well col-lg-12">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab1">
                        <div class="col-lg-6">
                            <h3>Age</h3>
                            <h3>Weight</h3>
                            <h3>Height</h3>
                            <h3>Agent</h3>
                        </div>
                        <div class="col-lg-6">
                            <h3>Player Coach</h3>
                            <h3>Nationality</h3>
                            <h3>Foot</h3>
                        </div>                        
                    </div>
                    <div class="tab-pane fade in" id="tab2">
                        <h2>Fenerbahçe</h2>
                        <h3>Number</h3>
                        <h3>Position</h3>
                        <h3>Match played</h3>
                        <h3>Goals</h3>
                        <h3>Team Coach</h3>
                        <h3>Cups</h3>
                        <hr>
                        <h2>Sunderland</h2>
                        <h3>Number</h3>
                        <h3>Position</h3>
                        <h3>Match played</h3>
                        <h3>Goals</h3>
                        <h3>Team Coach</h3>
                        <h3>Cups</h3>
                    </div>
                    <div class="tab-pane fade in" id="tab3">
                        <h3>CONTRACT (Team Sell, Team Buy, Date1, Date2, Wage, Transfer Fee, Termination Fee)</h3>
                        <h3>CONTRACT (Team Sell, Team Buy, Date1, Date2, Wage, Transfer Fee, Termination Fee)</h3>
                        <h3>CONTRACT (Team Sell, Team Buy, Date1, Date2, Wage, Transfer Fee, Termination Fee)</h3>
                        <h3>CONTRACT (Team Sell, Team Buy, Date1, Date2, Wage, Transfer Fee, Termination Fee)</h3>
                        <h3>CONTRACT (Team Sell, Team Buy, Date1, Date2, Wage, Transfer Fee, Termination Fee)</h3>
                        <h3>CONTRACT (Team Sell, Team Buy, Date1, Date2, Wage, Transfer Fee, Termination Fee)</h3>
                        <h3>CONTRACT (Team Sell, Team Buy, Date1, Date2, Wage, Transfer Fee, Termination Fee)</h3>
                        <h3>CONTRACT (Team Sell, Team Buy, Date1, Date2, Wage, Transfer Fee, Termination Fee)</h3>
                        <h3>CONTRACT (Team Sell, Team Buy, Date1, Date2, Wage, Transfer Fee, Termination Fee)</h3>
                        <h3>CONTRACT (Team Sell, Team Buy, Date1, Date2, Wage, Transfer Fee, Termination Fee)</h3>
                    </div>
                </div>
            </div>

        </div>

        <style>
            hr {
                border-top: 2px dotted #000000 !important;
                margin-bottom: 5px !important;
                margin-top: 5px !important;
            }
        </style>

    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".btn-pref .btn").click(function() {
                $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
                // $(".tab").addClass("active"); // instead of this do the below
                $(this).removeClass("btn-default").addClass("btn-primary");
            });
        });
    </script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
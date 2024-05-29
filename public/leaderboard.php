<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <title>PhotoPlay</title>   
    <link rel="stylesheet" href="css/comun.css">
    <link rel="stylesheet" href="css/leaderboard.css">
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #685bd9;">
        
            <a class="navbar-brand" href="index.php" ><img src="imagenes/preguntados2edit.png" id="logo-preguntados" width="150" height="150" class="d-inline-block align-center"></a>
            <div clas="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    
                
                    <li class="nav-item px-5"><a class="text-white text-decoration-none " style="font-size: 200%"  href="leaderboard.php">Leaderboard</a></li>
                    <li class="nav-item px-5"><a class="text-white text-decoration-none" style="font-size: 200%"   href="registro.php">Register</a> </li>
                    <li class="nav-item px-5"><a class="text-white text-decoration-none" style="font-size: 200%"   href="login.php">Login</a></li>
                    
                    
                </ul>
                <ul class="right">
                    
                </ul>
            </div>
        </nav>
    </header>
    <main role="main" class="innercover">
        
            <div class="container leaderboard-container">
                <h3 class="h3-leaderboard">Top Rankings</h3>
                <ul class="leaderboard" id="leaderboardList">
                    <?php
                        session_start();
                        include_once "bbdd.php";
                        $scores=get_scores();
                        for($i=0; $i<sizeof($scores);$i++){
                            echo "<li class='leaderboard-item'>";
                            echo "<span class='player-name'>".$scores[$i]['username']."</span>";
                            echo "<span class='score'>".$scores[$i]['puntuacion']."</span>";
                            
                            echo "</li>";
                        }
                    ?>
                    <li class="leaderboard-item">
                        
                        <span class="player-name">Ruben</span>
                        <span class="score">99999999</span>
                    </li>
                    <li class="leaderboard-item">
                        
                        <span class="player-name">Ander</span>
                        <span class="score">99999999</span>
                    </li>
                    <li class="leaderboard-item">
                        
                        <span class="player-name">María</span>
                        <span class="score">99999999</span>
                    </li>
                    <li class="leaderboard-item">
                        
                        <span class="player-name">Diego</span>
                        <span class="score">99999999</span>
                    </li>
                    <li class="leaderboard-item">
                        
                        <span class="player-name">Peio</span>
                        <span class="score">-1</span>
                    </li> 
                </ul>
            </div>
       
    </main>

    <footer class="footer">
        <div class="row text-center">
            <div class="col-md-8"><p>&copy; PhotoPlay. All rights reserved.</p></div>
            <ul class="list-inline footer-links">
                <li class="list-inline-item"><a href="#"><img width="40" height="40" src="/imagenes/facebook.png"></a></li>
                <li class="list-inline-item"><a href="#"><img width="40" height="40" src="/imagenes/signo-de-twitter.png"></a></li>
                <li class="list-inline-item"><a href="#"><img width="40" height="40" src="/imagenes/instagram.png"></a></li>
            </ul>
            
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>

</body>
</html>
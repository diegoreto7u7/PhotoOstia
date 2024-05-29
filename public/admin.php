<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/comun.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body class="text-center">

<header >
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #685bd9;">
        
        <a class="navbar-brand" href="index.html" ><img src="imagenes/preguntados2edit.png" id="logo-preguntados" width="150" height="150" class="d-inline-block align-center"></a>
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
    <div class="container-fluid bg-dark" >
        <div class="d-flex justify-content-center">
            
        </div>

        <div class="container-lg" style="background-color: #685bd9; margin-top: 2%;"  id="user-scores">
            <div class="text-center">
                <h2>Users</h2>
                <hr>
            </div>
            <div class="container-lg" id="editContainer" style="display: none;">
                <form class="edit-form">
                    <div class="form-group">
                        <label for="score">Score</label>
                        <input type="text" class="form-control" id="score-edit" aria-describedby="scoreEdit">
                        
                      </div>
                      <div class="form-group">
                        <label for="scoreFecha">Fecha</label>
                        <input type="date" class="form-control" id="score-fecha" >
                      </div>
                     
                      <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="container user-container">
                
                
                
                <ul class="userboard" id="userList">
                    <?php
                        session_start();
                        include_once "bbdd.php"
                        $users=get_users();

                        for($i=0; $i<sizeof($users);$i++){
                            echo "<li class='user-item'>";
                            echo "<a href='userScores.html?user=".$users[$i]['id_usuario']."' class='user-name>".$users[$i]['username']."</a>";
                            echo "<button class='scoresButton'>Scores</button>";
                            echo "<button class='deleteButton'>Delete</button>";
                            echo "</li>";
                        }

                    ?>
                    <li class="user-item">
                        
                        <span class="user-name">Ruben</span>
                        
                        <button class="scoresButton">Scores</button>
                        <button class="deleteButton">Delete</button>
                        
                    </li>
                    <li class="user-item">
                        
                        <span class="player-name">Ruben</span>
                        <span class="score">99999999</span>
                    </li>
             
                </ul>
            </div>
           

            
        </div>
        <hr>
    </div>

</main>

<footer class="footer bg-sucess text-center">
    <div class="row">
        <div class="col-md-6"><p>&copy; PhotoPlay. All rights reserved.</p></div>
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
<script src="js/admin.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>
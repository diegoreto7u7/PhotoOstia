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
    <link rel="stylesheet" href="css/perfil.css">
</head>
<body class="text-center">

<header >
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #685bd9;">
        
        <a class="navbar-brand" href="index.php" ><img src="imagenes/preguntados2edit.png" id="logo-preguntados" width="150" height="150" class="d-inline-block align-center"></a>
        <div clas="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                
            
                <li class="nav-item px-5"><a class="text-white text-decoration-none " style="font-size: 200%"  href="leaderboard.php">Leaderboard</a></li>
                <li class="nav-item px-5"><a class="text-white text-decoration-none" style="font-size: 200%"   href="registro.php">Registro</a> </li>
                <li class="nav-item px-5"><a class="text-white text-decoration-none" style="font-size: 200%"   href="login.php">Login</a></li>
                
                
            </ul>
            <ul class="right">
                
            </ul>
        </div>
    </nav>
</header>
<main role="main" class="innercover">
    <div class="container-fluid bg-dark" >
        <div class="text-left">
            <?php
                session_start();
                $id_usuario=$_GET['user'];
                include_once "bbdd.php";
                $user=get_current_user($id_usuario);
                echo "<h2 style='display:inline' id='username'>Username</h2>"
            ?>
            
            <float></float>
            <button type="button" class="btn btn-primary btn-sm" id="editUsername">Editar</button>
            <div id="usernameEdit">
                <form>
                    <input type="text" name="newUsername" id="newUsername" />
                    <input type="submit" class="btn btn-primary" id="submitUsername" value="Cambiar"/>
                </form>
            </div>
            <hr>
            
        </div>

        <div class="container-lg" style="background-color: #685bd9; margin-top: 2%; "  id="user-scores">
            <div class="text-left">
                <h2>Scores</h2>
                <hr>
            </div>
            <div class="table-responsive" id="table-div">
                <table class="score-table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Score</th>
                            <th scope="col">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once "bbdd.php";
                        $scores=get_scores_user($id_usuario);
                        for($i=0; $i<sizeof($scores);$i++){
                            echo "<tr class='score-row'>";
                            echo "<td>".$scores[$i]['puntuacion']."</td>";
                            echo "<td>".$scores[$i]['fecha']."</td>";
                            echo "</tr>"
                            
                        }
                        ?>

                        <tr class="score-row">
                            <td>
                                prueba
                            </td>
                            <td>
                                2024/04/6
                            </td>
                        </tr>
                        <tr class="score-row">
                            <td>
                                prueba2
                            </td>
                            <td>
                                2024/04/6
                            </td>
                        </tr>
                        <tr class="score-row">
                            <td>
                                prueba3
                            </td>
                            <td>
                                2024/04/6
                            </td>
                        </tr>
                        <tr class="score-row">
                            <td>
                                prueba4
                            </td>
                            <td>
                                2024/04/6
                            </td>
                        </tr>
                    </tbody>
                </table>

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
<script src="js/perfil.js"></script>

</body>
</html>
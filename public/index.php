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
    <link rel="stylesheet" href="css/index.css">
    <title>Preguntados</title>
</head>
<body class="text-center">
    
<?php session_start(); ?>

<header>
    <nav class="navbar navbar-expand-lg navbar-light purple-bg">
        <a class="navbar-brand" href="index.php"><img src="imagenes/preguntados2edit.png" id="logo-preguntados" width="150" height="150" class="d-inline-block align-center"></a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item px-5"><a class="text-white text-decoration-none" style="font-size: 200%" href="leaderboard.php">Leaderboard</a></li>
                <li class="nav-item px-5"><a class="text-white text-decoration-none" style="font-size: 200%" href="registro.php">Register</a></li>
                <li class="nav-item px-5"><a class="text-white text-decoration-none" style="font-size: 200%" href="login.php">Login</a></li>
            </ul>
            <ul class="right"></ul>
        </div>
    </nav>
</header>

<div class="container mt-5">
    <div class="text-section">
        <h1>ESTE ES NUESTRO JUEGO: 'PREGUNTADOS'</h1>
        <p>¡Bienvenido a Preguntados! En este juego, tus conocimientos de DAM se pondrán a prueba. Compite con otros jugadores para conseguir la puntuación más alta. ¿Podrás contestar todas las preguntas correctamente?</p>
    </div>
    <div class="image-left">
       <img src="/Fotos/PanelInicial.PNG" alt="Panel Inicial">
        <p>Al abrir el juego, verás un panel donde necesitas iniciar sesión para jugar. Para crear una cuenta, ve a la sección 'Registrarse' en esta misma página y sigue los pasos. Con tu cuenta, podrás almacenar todos tus datos de juego. Sin iniciar sesión, solo podrás salir del juego o ver el Top 10 de mejores puntuaciones.</p>
    </div>
    <div class="image-right">
        <p>Una vez que inicies sesión, el juego te llevará a otro panel con los diferentes temas disponibles. Como el juego se basa en niveles y temas, al principio solo tendrás un tema desbloqueado. Esto se indicará con un mensaje en la pantalla.</p>
        <img src="/Fotos/PanelTop10.PNG" alt="Panel Top 10">
    </div>
    <div class="image-centered">
        <img src="/Fotos/Desbloqueo.PNG" alt="Desbloqueo">
    </div>
    <div class="image-group">
        <img src="/Fotos/1TemasBloqueados.PNG" alt="Tema 1 Bloqueado">
        <img src="/Fotos/2TemasBloqueados.PNG" alt="Tema 2 Bloqueado">
        <img src="/Fotos/3TemasBloqueados.PNG" alt="Tema 3 Bloqueado">
        <img src="/Fotos/4TemasBloqueados.PNG" alt="Tema 4 Bloqueado">
    </div>
    <div class="text-section">
        <p>Para desbloquear nuevos temas, necesitas responder correctamente a 9 preguntas del tema actual. Cada panel de preguntas tiene tres secciones: arriba, en el medio y abajo.</p>
    </div>
    <div class="image-right">
        <p>Sección Superior:
            Izquierda: Los segundos que tienes para responder (10 segundos) y tu puntuación, que depende de la rapidez de tus respuestas. Puedes ganar hasta 450 puntos por pregunta, pero cada segundo que pasa, los puntos bajan 50. Si te equivocas, pierdes 150 puntos.
            Derecha: Tres corazones que representan tus vidas. Cada vez que fallas o se acaba el tiempo, pierdes una vida.</p>
        <img src="/Fotos/Pregunta.PNG" alt="Pregunta">
    </div>
    <div class="small-image-group">
        <img src="/Fotos/TiempoTerminado.PNG" alt="Tiempo Terminado">
        <img src="/Fotos/2 vidas.PNG" alt="2 Vidas">
        <img src="/Fotos/1 vida.PNG" alt="1 Vida">
    </div>
    <div class="text-section">
        <p>Sección Media:
            Aquí aparece la pregunta con sus tres posibles respuestas. Debes elegir una para continuar.</p>
        <p>Sección Inferior:
            Dos botones: 'Volver' para regresar al panel de elección de temas, el cual si algún tema ha sido superado y se quiere volver a acceder ahí, no se puede porque el tema se bloquea y aparece un mensaje indicando que el tema ha sido superado, y 'Corregir' para comprobar tu respuesta. Si la respuesta es incorrecta, verás cuál era la correcta.</p>
    </div>
    <div class="small-image-group">
        <img src="/Fotos/PreguntaCorrecta.PNG" alt="Pregunta Correcta">
        <img src="/Fotos/PreguntaIncorrecta.PNG" alt="Pregunta Incorrecta">
        <img src="/Fotos/TemaSuperado.PNG" alt="Tema Superado">
    </div>
    <div class="text-section">
        <p>Final del Juego:
            Puede aparecer uno de dos mensajes: uno indicando que has superado el juego, felicitándote y mostrando tu puntuación final, y otro indicando que has perdido. Si haces un récord de puntuación, el Top 10 se actualizará con tu nombre y tu puntuación.
            ¡Y eso es todo! ¡Disfruta jugando Preguntados y demuestra cuánto sabes!</p>
    </div>
</div>

<footer class="footer">
    <div class="row text-center">
        <div class="col-md-8">
            <p>&copy; <?php echo date("Y"); ?> PhotoPlay. All rights reserved.</p>
        </div>
        <div class="footer-links">
            <li class="list-inline-item"><a href="https://es-es.facebook.com/"><img width="40" height="40" src="/imagenes/facebook.png"></a></li>
            <li class="list-inline-item"><a href="https://x.com/"><img width="40" height="40" src="/imagenes/signo-de-twitter.png"></a></li>
            <li class="list-inline-item"><a href="https://www.instagram.com/"><img width="40" height="40" src="/imagenes/instagram.png"></a></li>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/jquery-3.7.1.min.js"></script>
</body>
</html>

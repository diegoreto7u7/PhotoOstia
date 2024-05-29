<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>PhotoPlay</title>   
    <link rel="stylesheet" href="css/comun.css">
    <link rel="stylesheet" href="css/registro.css">
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #685bd9;">
        <a class="navbar-brand" href="index.php">
            <img src="imagenes/preguntados2edit.png" id="logo-preguntados" width="150" height="150" class="d-inline-block align-center">
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item px-5"><a class="text-white text-decoration-none" style="font-size: 200%" href="leaderboard.php">Leaderboard</a></li>
                <li class="nav-item px-5"><a class="text-white text-decoration-none" style="font-size: 200%" href="registro.php">Register</a></li>
                <li class="nav-item px-5"><a class="text-white text-decoration-none" style="font-size: 200%" href="login.php">Login</a></li>
            </ul>
        </div>
    </nav>
</header>

<section class="vh-100 bg-dark">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-custom-1 text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                            <p class="text-white-50 mb-5">Please enter your username and password!</p>


                            <form action="registro.php" method="post">
                                <div class="form-outline form-white mb-4">
                                    <input type="text" id="typeUsernameX" name="username" class="form-control form-control-lg" required />
                                    <label class="form-label" for="typeUsernameX">Username</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="password" id="typePasswordX" name="password" class="form-control form-control-lg" required />
                                    <label class="form-label" for="typePasswordX">Password</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="password" id="typeRepeatPasswordX" name="repeat_password" class="form-control form-control-lg" required />
                                    <label class="form-label" for="typeRepeatPasswordX">Repeat Password</label>
                                </div>

                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>
                            </form>

                            <?php
                                session_start();

                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                    $username = $_POST['username'];
                                    $password = $_POST['password'];
                                    $repeatPassword = $_POST['repeat_password'];

                                    // Check if passwords match
                                    if ($password !== $repeatPassword) {
                                        echo "Passwords do not match!";
                                        exit;
                                    }

                                    // Hash the password
                                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                                    // Database connection configuration
                                    $db_username = 'c##photoplay';
                                    $db_password = 'almi123';
                                    $db_service = '3.221.255.12:1521/ORCLCDB';

                                    // Connect to Oracle database
                                    $connection = oci_connect($db_username, $db_password, $db_service);

                                    if (!$connection) {
                                        $error = oci_error();
                                        echo "Connection error: " . $error['message'];
                                        exit;
                                    }

                                    // Check if username already exists
                                    $query = "SELECT COUNT(*) AS USER_COUNT FROM usuario WHERE username = :username";
                                    $stid = oci_parse($connection, $query);
                                    oci_bind_by_name($stid, ':username', $username);
                                    oci_execute($stid);

                                    $row = oci_fetch_assoc($stid);
                                    if ($row['USER_COUNT'] > 0) {
                                        echo "Username already exists!";
                                        oci_free_statement($stid);
                                        oci_close($connection);
                                        exit;
                                    }
                                    oci_free_statement($stid);

                                    // Insert new user into the database
                                    $query = "INSERT INTO usuario (username, contrasena) VALUES (:username, :password)";
                                    $stid = oci_parse($connection, $query);
                                    oci_bind_by_name($stid, ':username', $username);
                                    oci_bind_by_name($stid, ':password', $hashedPassword);

                                    $result = oci_execute($stid);
                                    if ($result) {
                                        echo "Registration successful!";
                                    } else {
                                        $error = oci_error($stid);
                                        echo "Error registering user: " . $error['message'];
                                    }

                                    oci_free_statement($stid);
                                    oci_close($connection);
                                }
                                ?>


                            <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                            </div>
                        </div>

                        <div>
                            <p class="mb-0">Do you have an account? <a href="login.php" class="text-white">Login</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="row text-center">
        <div class="col-md-8"><p>&copy; PhotoPlay. All rights reserved.</p></div>
        <ul class="list-inline footer-links">
            <li class="list-inline-item"><a href="https://es-es.facebook.com/"><img width="40" height="40" src="/imagenes/facebook.png"></a></li>
            <li class="list-inline-item"><a href="https://x.com/"><img width="40" height="40" src="/imagenes/signo-de-twitter.png"></a></li>
            <li class="list-inline-item"><a href="https://www.instagram.com/"><img width="40" height="40" src="/imagenes/instagram.png"></a></li>
        </ul>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/jquery-3.7.1.min.js"></script>

</body>
</html>

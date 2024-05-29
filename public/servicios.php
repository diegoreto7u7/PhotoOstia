
<?php
    if(isset($_SERVER['HTTP_ORIGIN']))
    {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Max-Age: 86400");
    }

    if($_SERVER['REQUEST_METHOD'] == 'OPTIONS')
    {
        if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, DELETE, PUT");
        if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
        exit(0);
    }

    header('Content-Type: application/JSON');

    include_once('bbdd.php');

    $funcion = $_POST['function'];
    if($funcion == "getScoreUsuario")
    {
        $scores_usuarios = obtenerEstadisticasUsuarios($arg);
        $scores_usuarios = get_scores();
        $scoresUJson = json_encode($scores_usuarios, JSON_UNESCAPED_UNICODE);
        echo $scoresUJson;
    } else if($funcion == "changeUsername")
    {
        if(change_username($_POST['username'],$_POST['newUsername'])){
            echo true;
        }
        
    } else if($funcion == "deleteUser")
    {
        
        
    } else if($funcion == "changeScore")
    {
       if(change_score($_POST['score'],$_POST['newScore'],$_POST['fecha'],$_POST['newFecha'])){
            echo true;
       }else{
            echo false;
       }
    }
    
?>
<?php
    session_unset();
    session_destroy();
    $username = trim(htmlspecialchars($_REQUEST["usuario"], ENT_QUOTES, "UTF-8"));
    $password = trim(htmlspecialchars($_REQUEST["contraseña"], ENT_QUOTES, "UTF-8"));

    $conexion = mysqli_connect("localhost", "root", "", "vargasacedo")
    or die("Problemas en la conexion");
    
    $consulta = "SELECT usuario, contraseña FROM usuarios WHERE usuario='$username' AND contraseña='$password'";
    
    $registros = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
    $count = mysqli_num_rows($registros);
    if ($count != 1) {
        header("location: login.php?errorC=Usuario o contraseña incorrecta");
    } else {
        session_start();
        $_SESSION['nombreUsuario'] = $username; 
        $_SESSION['estado'] = 'Autenticado';
        header('location: index.php?correctoC=Sesión iniciada');
    }
?>
<?php
session_start();
if (empty($_SESSION['nombreUsuario']) && empty($_SESSION['estado'])) {
    header('location: index.php?error=Sesion finalizada');
} else {
    $id = trim(htmlspecialchars($_REQUEST["id"], ENT_QUOTES, "UTF-8"));
    $nombretabla = trim(htmlspecialchars($_REQUEST["nombretabla"], ENT_QUOTES, "UTF-8"));
    
    $conexionv = mysqli_connect("localhost", "root", "", "vargasacedo")
        or die("Problemas en la conexion");
        
    $registrosv = mysqli_query($conexionv, "SELECT * FROM $nombretabla WHERE usuario=$id")
        or die("Problemas en la consulta ".mysqli_error($conexionv));
    
    if ($regv = mysqli_fetch_array($registrosv)) {
        mysqli_query($conexionv, "DELETE FROM $nombretabla WHERE usuario=$id")
            or die("Problemas en la consulta ".mysqli_error($conexionv));
            print "<h3>Entrada borrada.</h3>";
    } else {
        header("Location: inicio.php?error='Id no encontrado'");
    }
    header("Location: admin$nombretabla.php?");
}
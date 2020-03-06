<?php
session_start();
if (empty($_SESSION['nombreUsuario']) && empty($_SESSION['estado'])) {
    header('location: formucuenta.php?errorA=Error al cambiar credenciales');
} else {

    $usuario = trim(htmlspecialchars($_REQUEST["usuario"], ENT_QUOTES, "UTF-8"));
    $correo = trim(htmlspecialchars($_REQUEST["correo"], ENT_QUOTES, "UTF-8"));
    $contraseña = trim(htmlspecialchars($_REQUEST["contraseña"], ENT_QUOTES, "UTF-8"));

    $conexionv = mysqli_connect("localhost", "root", "", "vargasacedo")
        or die("Problemas de conexión");
    
    $registrosv = mysqli_query($conexionv, "UPDATE usuarios SET correo='$correo', contraseña='$contraseña' WHERE usuario='$usuario'") 
        or die("Problemas de actualización ".mysqli_error($conexionv));
    
        header("Location: formucuenta.php?correctoA=Las credenciales fueron cambiadas");

    mysqli_close($conexionv);
}
?>
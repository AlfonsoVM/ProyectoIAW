<?php
session_start();
if (empty($_SESSION['nombreUsuario']) && empty($_SESSION['estado'])) {
    header('location: inicio.php?error=Sesion finalizada');
} else {

    $id = trim(htmlspecialchars($_REQUEST["id"], ENT_QUOTES, "UTF-8"));
    $tipo = trim(htmlspecialchars($_REQUEST["tipo"], ENT_QUOTES, "UTF-8"));
    $nombretabla = trim(htmlspecialchars($_REQUEST["nombretabla"], ENT_QUOTES, "UTF-8"));
    
    $conexionv = mysqli_connect("localhost", "root", "", "vargasacedo")
        or die("Problemas en la conexion");
    
    $registrosv = mysqli_query($conexionv, "SELECT * FROM $nombretabla WHERE $tipo = '$id'")
        or die("Problemas en la consulta ".mysqli_error($conexionv));
    
    if ($regv = mysqli_fetch_array($registrosv)) {
        mysqli_query($conexionv, "DELETE FROM $nombretabla WHERE $tipo = '$id'")
            or die("Problemas en el borrado".mysqli_error($conexionv));
            print "<h3>Entrada borrada.</h3>";
        if ($nombretabla == 'imagenes') {

            $usuario = trim(htmlspecialchars($_REQUEST["usuario"], ENT_QUOTES, "UTF-8"));

            // PHP program to delete a file named gfg.txt  
            // using unlike() function  
               
            $uploadFileDir = "./imagenes/$usuario/";
            $dest_path = $uploadFileDir . $id;
               
            // Use unlink() function to delete a file  
            if (!unlink($dest_path)) {  
                echo ("$dest_path cannot be deleted due to an error");  
            }  
            else {  
                echo ("$dest_path has been deleted");  
            }  
            
        } else {
            print "Problemas borrado";
        }
    } else {
        header("Location: admin$nombretabla.php?errorB=Fallo al borrar");
    }
    header("Location: admin$nombretabla.php?correctoB=Borrado completado");
}
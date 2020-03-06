<?php
session_start();
if (empty($_SESSION['nombreUsuario']) && empty($_SESSION['estado'])) {
    header('location: index.php?errorI=Sesion finalizada');
} else {

    $usuario = trim(htmlspecialchars($_REQUEST["usuario"], ENT_QUOTES, "UTF-8"));
    $titulo = trim(htmlspecialchars($_REQUEST["titulo"], ENT_QUOTES, "UTF-8"));
    $fecha = trim(htmlspecialchars($_REQUEST["fecha"], ENT_QUOTES, "UTF-8"));
    
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    // get details of the uploaded file
        $fileTmpPath = $_FILES['imagen']['tmp_name'];
        $fileName = $_FILES['imagen']['name'];
        $fileSize = $_FILES['imagen']['size'];
        $fileType = $_FILES['imagen']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $newFileName = $fileName;

        $conexionv = mysqli_connect("localhost", "root", "", "vargasacedo")
        or die("Problemas de conexión");
    
        $registrosv = mysqli_query($conexionv, "SELECT * FROM imagenes WHERE imagen='$newFileName'") 
        or die("Problemas en el select".mysqli_error($conexionv));

        if ($reg = mysqli_fetch_array($registrosv) ) {
            mysqli_close($conexionv);
            header('location: formuimagen.php?errorA=La imagen ya está en la base de datos.');
        } else {
            $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');
            if (in_array($fileExtension, $allowedfileExtensions)) {
                // directory in which the uploaded file will be moved
                $uploadFileDir = "./imagenes/$usuario/";
                $dest_path = $uploadFileDir . $newFileName;
                
                if (!file_exists($uploadFileDir)) {
                    mkdir($uploadFileDir, 0777, true);
                }

                if(move_uploaded_file($fileTmpPath, $dest_path))
                {
                    $message ='Archivo correctamente subido';
                    
                    mysqli_query($conexionv, "INSERT INTO imagenes (usuario, imagen, titulo, fecha) 
                    VALUES ('$usuario', '$newFileName', '$titulo', '$fecha')") 
                        or die("Problemas en el insert".mysqli_error($conexionv));
                    mysqli_close($conexionv);
                    header('location: formuimagen.php?correctoA=La imagen se subió correctamente.');
                } else {
                    $message = 'Hubo algún error moviendo el archivo al directorio. Asegurese de que el servidor tiene permisos de escritura sobre el directorio.';
                    mysqli_close($conexionv);
                    header('location: formuimagen.php?errorA=Error de subida.');
                }
            }
        }
    } else {
        echo "error";
    }
}
?>
<?php
session_start();
if (isset($_SESSION['nombreUsuario']) && isset($_SESSION['estado'])) {
$usuario = $_SESSION['nombreUsuario'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PhotoIAW</title>
    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
    <link rel="stylesheet" href="assets/css/app.css">
	<link rel="stylesheet" href="assets/css/theme.css">
	
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <a class="navbar-brand font-weight-bolder mr-3" href="index.php"><img src="assets/img/logo.png"></a>
    <button class="navbar-light navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsDefault" aria-controls="navbarsDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsDefault">
        <ul class="navbar-nav mr-auto align-items-center">
    		<li class="nav-item">
            <h3><a href="index.php">PhotoIAW</a> / <a href="formuimagen.php">Imágenes</a> / Tus imágenes</h3>
			</li>
    	</ul>
    	<ul class="navbar-nav ml-auto align-items-center">
    		<li class="nav-item">
				<a class="nav-link" href="login.php">Iniciar Sesión</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="signin.php">Registrarse</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="logout.php">Cerrar Sesión</a>
			</li>
            <?php
			if (isset($_REQUEST["errorI"])) {
				print "<li class=nav-link style='color: red'> $_REQUEST[errorI] </li>";
			}
			if (isset($_SESSION['nombreUsuario']) && isset($_SESSION['estado']) && $_SESSION['nombreUsuario'] <> 'admin') {
				print "<a class='nav-link' href='formuimagen.php'>Imágenes</a>";
			}
			if (isset($_SESSION['nombreUsuario']) && isset($_SESSION['estado'])) {
						print "<a class='nav-link' href='formucuenta.php'>Cuenta</a>";
			}
			if (isset($_SESSION['nombreUsuario']) && $_SESSION['nombreUsuario'] == 'admin') { 
				print "<a class='nav-link' href='admin.php'>Administrar</a>";
			}
			if (isset($_REQUEST["correctoC"])) {
				print "<li class=nav-link style='color: green'> $_REQUEST[correctoC] </li>";
      		}      
			if (isset($_REQUEST["cerrar"])) {
				print "<li class=nav-link style='color: black'> $_REQUEST[cerrar] </li>";
			}
			?>
    	</ul>
    </div>
    </nav>    
    <main role="main">   
	
	
    <section class="mt-4 mb-5">
    <div class="container-fluid">
        <?php
            if (isset($_REQUEST["errorB"])) {
                print "<li class=nav-link style='color: red'> $_REQUEST[errorB] </li>";
            }
            if (isset($_REQUEST["correctoB"])) {
				print "<li class=nav-link style='color: green'> $_REQUEST[correctoB] </li>";
			}
        ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Usuario</th>
                <th scope="col">Imagen</th>
                <th scope="col">Titulo</th>
                <th scope="col">Fecha</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conexion = mysqli_connect("localhost", "root", "", "vargasacedo") or die("Problemas con la conexión");
                $registros = mysqli_query($conexion, "SELECT usuario, imagen, titulo, fecha 
                                                        FROM imagenes WHERE usuario = '$usuario'")
                    or die("Problemas en la consulta:".mysqli_error($conexion));

                $contador=0;
                while ($reg = mysqli_fetch_array($registros)) {
                    $contador=$contador+1;
                    echo "<tr>";
                        echo "<th>" . $contador . "</th>";
                        echo "<th>" . $reg['usuario'] . "</th>";
                        echo "<th><img class='card-img' src='imagenes\\".$reg['usuario']."\\".$reg['imagen']."' alt='Card image'></th>";
                        echo "<th>" . $reg['titulo'] . "</th>";
                        echo "<th>" . $reg['fecha'] . "</th>";
                        echo "<td><a class='btn btn-danger btn-sm' href='adminborrar.php?id=$reg[imagen]&usuario=$reg[usuario]&nombretabla=imagenes&tipo=imagen' > Borrar </a>";
                    echo "</tr>";
                }
                echo "</table>";
                                
                mysqli_close($conexion);
                ?>
            </tbody>
        </table>
    </div>
    </section>    
    </main>

    <script src="assets/js/app.js"></script>
    <script src="assets/js/theme.js"></script>
    
    <footer class="footer pt-5 pb-5 text-center">        
    </footer>    
</body>
</html>
<?php
} else {
    header('location: index.php?errorI=Sesion finalizada');
}
?>
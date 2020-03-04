<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aguas</title>
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
			if (isset($_REQUEST["error"])) {
				print "<li class=nav-link style='color: red'> $_REQUEST[errorI] </li>";
			}
			if (isset($_REQUEST["correctoC"])) {
				print "<a class='nav-link' href='subirimagen.php'>Imágenes</a>";
				if (isset($_SESSION['admin']) && $_SESSION['admin'] == true ) { 
					print "<a class='nav-link' href='admin.php'>Administrar</a>";
				}
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
    	<div class="row">
    		<div class="card-columns">
								
				<?php
				$conexion = mysqli_connect("localhost", "root", "", "vargasacedo") or die("Problemas con la conexión");
				$registros = mysqli_query($conexion, "SELECT  usuario, imagen, titulo, date
														FROM imagenes ORDER BY ASC date")
					or die("Problemas en la consulta:".mysqli_error($conexion));
					
				while ($reg = mysqli_fetch_array($registros)) {
				echo "<div class='card card-pin'>";
    				echo "<img class='card-img' src='imagenes\\".$reg['usuario']."\\".$reg['imagen']."' alt='Card image'>";
    				echo "<div class='overlay'>";
    					echo "<h2 class='card-title title'>".$reg['titulo']."</h2>";
    					echo "<div class='more'>";
    						echo "<h1>";
    						echo "<i class='fa fa-arrow-circle-o-right' aria-hidden='true'></i>".$reg['usuario']."</h1>";
    					echo "</div>";
    				echo "</div>";
				echo "</div>";

					/*
					echo "<tr>";
						echo "<td>" . $reg['usuario'] . "</td>";
						echo "<td>" . "<img src='usuarios\\".$reg['usuario']."\\".$reg['nombre'].".jpg'/>" . "</td>";
						echo "<td>" . $reg['fecha'] . "</td>";
					echo "</tr>";
					*/
				}

				mysqli_close($conexion);
				?>
				
    		</div>
    	</div>
    </div>
    </section>    
    </main>

    <script src="assets/js/app.js"></script>
    <script src="assets/js/theme.js"></script>
    
    <footer class="footer pt-5 pb-5 text-center">        
    </footer>    
</body>
</html>
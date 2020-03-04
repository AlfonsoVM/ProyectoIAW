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
    <a class="navbar-brand font-weight-bolder mr-3" href="index.html"><img src="assets/img/logo.png"></a>
    <button class="navbar-light navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsDefault" aria-controls="navbarsDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsDefault">
    	<ul class="navbar-nav mr-auto align-items-center">
    		<form class="bd-search hidden-sm-down">
    			<input type="text" class="form-control bg-graylight border-0 font-weight-bold" id="search-input" placeholder="Buscar..." autocomplete="off">
    			<div class="dropdown-menu bd-search-results" id="search-results">
    			</div>
    		</form>
    	</ul>
    	<ul class="navbar-nav ml-auto align-items-center">
    		<li class="nav-item">
    			<a class="nav-link active" href="index.html">Inicio</a>
    		</li>
    		<li class="nav-item">
    			<a class="nav-link" href="post.html">Recientes</a>
    		</li>
    		<li class="nav-item">
    			<a class="nav-link" href="author.html">Autores</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="login.php">Iniciar Sesión</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="signin.php">Registrarse</a>
			</li>
    	</ul>
    </div>
    </nav>    
    <main role="main">
        
    
    <section class="mt-4 mb-5">
    <div class="container mb-4">
    
    </div>
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
    				echo "<img class='card-img' src='imagenes/".$reg['usuario']."/".$reg['imagen']."' alt='Card image'>";
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
        
    <div class="container">
        
        </div>
        
    </footer>    
</body>
    
</html>

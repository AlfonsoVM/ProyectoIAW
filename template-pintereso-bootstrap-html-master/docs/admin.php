<?php
session_start();
/*if (isset($_SESSION['admin']) && $_SESSION['admin'] == true ) { 
} else {
    header('location: index.php?error=Sesion finalizada');
}*/
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
				<h3><a href="index.php">PhotoIAW</a> / Administración</h3>
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
				<div class='card card-pin'>
                    <button type="button" class="btn btn-dark" onclick="window.location.href = 'adminusuarios.php'">Usuarios</button>
                    <button type="button" class="btn btn-dark" onclick="window.location.href = 'adminimagenes.php'">Imágenes</button>
                </div>
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
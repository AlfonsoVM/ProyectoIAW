<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesión</title>
    <style type="text/css">
html,body{
    background-color: powderblue;}

.tg  {border-collapse:collapse;border-spacing:0;border-color:#9ABAD9;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#9ABAD9;color:#444;background-color:#EBF5FF;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#9ABAD9;color:#fff;background-color:#409cff;}
.tg .tg-06e6{font-family:"Times New Roman", Times, serif !important;;background-color:#409cff;color:#ffffff;text-align:left;vertical-align:top}
.tg .tg-fia5{font-family:"Times New Roman", Times, serif !important;;text-align:left;vertical-align:top}
.tg .tg-14gg{background-color:#ffffff;color:#000000;text-align:left;vertical-align:top}
.tg .tg-0lax{text-align:left;vertical-align:top}

.boton {border-radius: 8px;
        background-color: #33ACFF;
        color:white;}
    </style>




</head>
<body>
<h1>Registro</h1>
<form action="loginf.php" method="post" name="login">

<div class="fondo">

<table class="tg">
  <tr>
    <th class="tg-fia5">Correo Electrónico</th>
    <th class="tg-14gg"><input type="email" name="email" class="form-control" id="email" placeholder="Correo Electrónico"></th>
  </tr>
  <tr>
    <td class="tg-06e6">Usuario</td>
    <td class="tg-0lax"><input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario"></td>
  </tr>
  <tr>
    <td class="tg-06e6">Contraseña</td>
    <td class="tg-0lax"><input type="password" name="password" id="password" class="form-control"placeholder="Contraseña"></td>
  </tr>
  
</table><br>
<input type="submit" class="boton" value="Registrarse"> 
                           <div class="form-group">
                              <p class="text-center">¿Ya tienes cuenta? <a href="login.php" id="signup">Inicia sesión aquí</a></p>
                           </div>
                        </form>
</div>
</body>
</html>
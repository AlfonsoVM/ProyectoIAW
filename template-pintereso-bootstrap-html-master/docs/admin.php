<?php
session_start();
if (isset($_SESSION['admin']) && $_SESSION['admin'] == true ) { 
} else {
    header('location: index.php?error=Sesion finalizada');
}
?>
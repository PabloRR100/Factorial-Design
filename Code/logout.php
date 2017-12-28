<?php
    session_start();
    if(session_destroy()) // Elimina la sesion
    {
        header("Location: index.php"); // Vuelta al Home
    }
?>
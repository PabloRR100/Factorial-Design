<?php

    session_start(); // Inicio de Sesión
    $error=''; // Variable para almacenar el Mensaje de Error
    
    if (isset($_POST['submit'])) 
    {
        if (empty($_POST['username']) || empty($_POST['password'])) 
        {
            $error = "POR FAVOR, IDENTIFÍSQUESE PARA ACCEDER";
        }
        else
        {
            // Definimos Usuario y Contraseña
            $username=$_POST['username'];
            $password=$_POST['password'];
            // Establecemos Conexión con el Server pasando el server_name, user_id and password como parámetros.
            $connection = mysql_connect("localhost", "profesor", "etsiim");
            // Para proteger el MySQL injection por seguridad.
            $username = stripslashes($username);
            $password = stripslashes($password);
            $username = mysql_real_escape_string($username);
            $password = mysql_real_escape_string($password);
            // Elegimos Database
            $db = mysql_select_db("company", $connection);
            // SQL query to fetch information of registerd users and finds user match.
            $query = mysql_query("select * from login where password='$password' AND username='$username'", $connection);
            $rows = mysql_num_rows($query);
            
            if ($rows == 1) 
            {
                $_SESSION['login_user']=$username; // Inicio de sesión
                header("location: profile.php"); // Redirección a la siguiente página
            } 
            else 
            {
                $error = "ESTE USUARIO NO ESTÁ REGISTRADO";
            }
            mysql_close($connection); // Cerramos la conexión con la database
        }
    }
?>

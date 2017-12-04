<?php
    // Establecer Conexión con el Server pasando el server_name, user_id and password como parámetros
    $connection = mysql_connect("localhost", "profesor", "etsiim");
    // Selección de Database
    $db = mysql_select_db("company", $connection);
    session_start();// Comienzo de sesión
    // Almacenando Sesión
    $user_check=$_SESSION['login_user'];
    // SQL Query To Fetch Complete Information Of User
    $ses_sql=mysql_query("select username from login where username='$user_check'", $connection);
    $row = mysql_fetch_assoc($ses_sql);
    $login_session =$row['username'];
    
    if(!isset($login_session))
    {
        mysql_close($connection); // Cerrando Conexiónn
        header('Location: index.php'); // Home Page
    }
?>

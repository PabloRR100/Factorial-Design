<?php

class profesorado
{

    public function recogerListado()
    {
        
        $servername = "localhost";
        $username = "profesor";
        $password = "etsiim";
        $dbname = "company";
        
        try
        {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $consulta = $conn->prepare("SELECT * FROM login");
            $consulta->execute(); 
            return $consulta->fetchAll();        
        }
        
        catch(PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
        }
        
    }

    public function addAlumno($nombre, $numero, $permisos)
    {
        
        $servername = "localhost";
        $username = "profesor";
        $password = "etsiim";
        $dbname = "company";
        
        try
        {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      

            $nuevoAlumno = $conn->prepare("INSERT INTO login (username, password, permisos)
            VALUES ('$nombre', '$numero', '$permisos')");

            $nuevoAlumno->execute();
            echo "SE HA ALMACENADO EL ALUMNO EN LA LISTA";        
        }
        
        catch(PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
        }
        
        
    }
    
    public function eliminarAlumno($alumno)
    {
        
        $servername = "localhost";
        $username = "profesor";
        $password = "etsiim";
        $dbname = "company";
        
        try
        {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      

            $nuevoAlumno = $conn->prepare("DELETE FROM login WHERE id='$alumno'");
                        
            $nuevoAlumno->execute();
            echo "SE HA ELIMINADO EL ALUMNO DE LA LISTA";        
        }
        catch(PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
        }
        
        
    }
    
    public function editarAlumno($alumno, $numero, $permisos, $fila)
    {
        
        $servername = "localhost";
        $username = "profesor";
        $password = "etsiim";
        $dbname = "company";
        
        try
        {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      

            $nuevoAlumno = $conn->prepare("UPDATE login SET username='$alumno', password='$numero', permisos='$permisos' WHERE id='$fila' ");
            
            $nuevoAlumno->execute();
            echo "SE HA ELIMINADO EL ALUMNO DE LA LISTA";        
        }
        
        catch(PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
        }
        
        
    }
    
    public function recogerAlumno($fila)
    {
        
        $servername = "localhost";
        $username = "profesor";
        $password = "etsiim";
        $dbname = "company";
        
        try
        {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      

            $nuevoAlumno = $conn->prepare("SELECT FROM login WHERE id='$fila' ");            
            $nuevoAlumno->execute();
            
            return $nuevoAlumno->fetchAll();     
        }
        
        catch(PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
        }
        
        
    }
  
}

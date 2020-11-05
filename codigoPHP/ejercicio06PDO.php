<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 6</title>         
    </head>
    <body>
        <?php
        /**
            *@author: Cristina Núñez
            *@since: 03/11/2020
            * Mostrar el contenido de la tabla Departamento y el número de registros.
        */ 
            
        require_once "../config/confDBPDO.php";  
            try{
                $miDB = new PDO(DNS, USER, PASSWORD); //Establezco la conexión a la base de datos instanciado un objeto PDO.
                $miDB ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Cuando se produce un error lanza una excepción utilizando PDOException.
                
                $sql = <<<EOD
                       INSERT INTO Departamento (CodDepartamento, DescDepartamento, VolumenNegocio) VALUES 
                            (:CodDepartamento, :DescDepartamento, :VolumenNegocio);
EOD;
                $consulta = $miDB ->prepare($sql);
                
                $parametros[0] = [":CodDepartamento" => "EDF", ":DescDepartamento" => "Departamento de educación física", ":VolumenNegocio" => 1];
                $parametros[1] = [":CodDepartamento" => "ART", ":DescDepartamento" => "Departamento de arte", ":VolumenNegocio" => 2];
                $parametros[2] = [":CodDepartamento" => "MUS", ":DescDepartamento" => "Departamento de musica", ":VolumenNegocio" => 3];
                
                for($registro=0; $registro<=2; $registro++){
                    $consulta->execute($parametros[$registro]);
                }

            echo "<h3> <span style='color: green;'>"."Valores insertados con éxito </span></h3>";//Si no se ha producido ningún error nos mostrará "Conexión establecida con éxito"
            
            }catch (PDOException $excepcion) { //Código que se ejecutará si se produce alguna excepción
                $errorExcepcion = $excepcion->getCode();//Almacenamos el código del error de la excepción en la variable $errorExcepcion
                $mensajeExcepcion = $excepcion->getMessage();//Almacenamos el mensaje de la excepción en la variable $mensajeExcepcion
                
                echo "<span style='color: red;'>Error: </span>".$mensajeExcepcion."<br>";//Mostramos el mensaje de la excepción
                echo "<span style='color: red;'>Código del error: </span>".$errorExcepcion;//Mostramos el código de la excepción
            } finally {
                unset($miDB);//Cerramos la conexión con la base de datos
            }
        ?>
    </body>
    
</html> 
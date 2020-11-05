<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 5</title>         
    </head>
    <body>
        <?php
        /**
            *@author: Cristina Núñez
            *@since: 03/11/2020
            * Mostrar el contenido de la tabla Departamento y el número de registros.
        */ 
            
        require_once "../config/confDBPDO.php";  
            try {
                $miDB = new PDO(DNS,USER,PASSWORD);//Instanciamos un objeto PDO y establecemos la conexión
                $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Configuramos las excepciones
                $miDB->beginTransaction();
                /*
                $sql1 = <<<EOD
                        INSERT INTO Departamento(CodDepartamento,DescDepartamento,VolumenNegocio) VALUES
                        ('EDF', 'Departamento de educación física', 1);
EOD;
                
                $sql2 = <<<EOD
                        INSERT INTO Departamento(CodDepartamento,DescDepartamento,VolumenNegocio) VALUES
                        ('ART', 'Departamento de arte', 2);
EOD;
                
                $sql3 = <<<EOD
                        INSERT INTO Departamento(CodDepartamento,DescDepartamento,VolumenNegocio) VALUES
                        ('MUS', 'Departamento de música', 3);
EOD;
                
                $miDB->exec($sql1);
                $miDB->exec($sql2);
                $miDB->exec($sql3);
                */
                $sql = <<<EOD
                       INSERT INTO Departamento (CodDepartamento, DescDepartamento, VolumenNegocio) VALUES 
                            (:CodDepartamento1, :DescDepartamento1, :VolumenNegocio1),
                            (:CodDepartamento2, :DescDepartamento2, :VolumenNegocio2),
                            (:CodDepartamento3, :DescDepartamento3, :VolumenNegocio3); 
EOD;
                $consulta = $miDB ->prepare($sql);
                
                $parametros = [":CodDepartamento1" => "EDF", ":DescDepartamento1" => "Departamento de educación física", ":VolumenNegocio1" => 1,
                               ":CodDepartamento2" => "ART", ":DescDepartamento2" => "Departamento de arte", ":VolumenNegocio2" => 2,
                               ":CodDepartamento3" => "MUS", ":DescDepartamento3" => "Departamento de musica", ":VolumenNegocio3" => 3];
                
                $consulta -> execute($parametros);
                $miDB->commit();

                echo "<h3> <span style='color: green;'>"."Valores insertados con éxito </span></h3>";//Si no se ha producido ningún error nos mostrará "Conexión establecida con éxito"
            }
            catch (PDOException $excepcion) { //Código que se ejecutará si se produce alguna excepción
                $miDB->rollBack();
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
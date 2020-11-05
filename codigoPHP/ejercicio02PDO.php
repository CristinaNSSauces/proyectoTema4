<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 02</title>         
    </head>
    <body>
        <?php
        /**
            *@author: Cristina Núñez
            *@since: 27/10/2020
            * Mostrar el contenido de la tabla Departamento y el número de registros.
        */ 
            
        require_once "../config/confDBPDO.php";//Incluimos el archivo confDBPDO.php para poder acceder al valor de las constantes de los distintos valores de la conexión 
            try {
                echo "<h3>Con consulta preparada</h3>";
                $miDB = new PDO(DNS,USER,PASSWORD);//Instanciamos un objeto PDO y establecemos la conexión
                $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Configuramos las excepciones
                
                $sql = "SELECT * from Departamento";
                $consulta = $miDB->prepare($sql);
                $consulta->execute();
                
        ?>

            <table>
                
                <tr>
                    <th>CodDepartamento</th>
                    <th>DescDepartamento</th>
                    <th>FechaBaja</th>
                    <th>VolumenNegocio</th>
                </tr>
                
                <?php 
                $registro = $consulta->fetchObject();
                    while($registro){ 
                ?>
                
                <tr>
                    <td><?php echo $registro->CodDepartamento ?></td>
                    <td><?php echo $registro->DescDepartamento ?></td>
                    <td><?php echo $registro->FechaBaja ?></td>
                    <td><?php echo $registro->VolumenNegocio ?></td>
                </tr>
                
                <?php 
                    $registro = $consulta->fetchObject(); 
                    }
                ?>
                
            </table>     
        <?php
            $numRegistros = $consulta->rowCount();
            echo("<h3>Hay ". $numRegistros." registros</h3>");
            
            echo "<h3> <span style='color: green;'>"."Conexión establecida con éxito </span></h3>";//Si no se ha producido ningún error nos mostrará "Conexión establecida con éxito"
            }
            catch (PDOException $excepcion) { //Código que se ejecutará si se produce alguna excepción
                $errorExcepcion = $excepcion->getCode();//Almacenamos el código del error de la excepción en la variable $errorExcepcion
                $mensajeExcepcion = $excepcion->getMessage();//Almacenamos el mensaje de la excepción en la variable $mensajeExcepcion
                
                echo "<span style='color: red;'>Error: </span>".$mensajeExcepcion."<br>";//Mostramos el mensaje de la excepción
                echo "<span style='color: red;'>Código del error: </span>".$errorExcepcion;//Mostramos el código de la excepción
            } finally {
                unset($miDB);
            }
        ?>
        
    </body>
    
</html>    
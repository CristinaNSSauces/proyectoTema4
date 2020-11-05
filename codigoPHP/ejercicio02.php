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
            *@description: Mostrar el contenido de la tabla Departamento y el número de registros
        */ 
            try {
                $miDB = new PDO("mysql:host=192.168.1.215;dbname=DAW215DBDepartamentos", "usuarioDAW215DBDepartamentos", "P@ssw0rd");//Instanciamos un objeto PDO y establecemos la conexión
                $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Configuramos las excepciones
                
                $sql = "SELECT * from Departamento";
                $consulta = $miDB->query($sql);
                
        ?>

            <table>
                
                <tr>
                    <th>CodDepartamento</th>
                    <th>DescDepartamento</th>
                    <th>FechaBaja</th>
                    <th>VolumenNegocio</th>
                </tr>
                
                <?php foreach ($consulta as $valor){ ?>
                
                <tr>
                    <td><?php echo $valor['CodDepartamento'] ?></td>
                    <td><?php echo $valor['DescDepartamento'] ?></td>
                    <td><?php echo $valor['FechaBaja'] ?></td>
                    <td><?php echo $valor['VolumenNegocio'] ?></td>
                </tr>
                <?php } ?>
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
            }
        ?>
        
    </body>
    
</html>    
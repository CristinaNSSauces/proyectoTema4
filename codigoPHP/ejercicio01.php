<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 01</title>         
    </head>
    <body>
        <?php
        /**
            *@author: Cristina Núñez
            *@since: 27/10/2020
            *@description: (ProyectoTema4) Conexión a la base de datos con la cuenta usuario y tratamiento de errores
        */ 
            try {
                $miDB = new PDO("mysql:host=192.168.1.215;dbname=DAW215DBDepartamentos", "usuarioDAW215DBDepartamentos", "P@ssw0rd");//Instanciamos un objeto PDO y establecemos la conexión
                $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Configuramos las excepciones
                
                $aAtributosPDO=[//Creamos un array con los diferentes atributos que puede tener un objeto PDO
                                "AUTOCOMMIT", 
                                "ERRMODE",
                                "CASE", 
                                "CLIENT_VERSION", 
                                "CONNECTION_STATUS",
                                "ORACLE_NULLS", 
                                "PERSISTENT", 
                                "SERVER_INFO", 
                                "SERVER_VERSION"
                               ];
                
                foreach ($aAtributosPDO as $valor) {//Recorremos los valores de los atributos del objeto PDO
                    echo "PDO::ATTR_$valor: ";
                    echo $miDB->getAttribute(constant("PDO::ATTR_$valor"))."<br>";
                }
                
                echo "<h3> <span style='color: green;'>"."Conexión establecida con éxito </span></h3>";//Si no se ha producido ningún error nos mostrará "Conexión establecida con éxito"
            }
            catch (PDOException $excepcion) {//Código que se ejecutará si se produce alguna excepción
                $errorExcepcion = $excepcion->getCode();//Almacenamos el código del error de la excepción en la variable $errorExcepcion
                $mensajeExcepcion = $excepcion->getMessage();//Almacenamos el mensaje de la excepción en la variable $mensajeExcepcion
                
                echo "<span style='color: red;'>Error: </span>".$mensajeExcepcion."<br>";//Mostramos el mensaje de la excepción
                echo "<span style='color: red;'>Código del error: </span>".$errorExcepcion;//Mostramos el código de la excepción
            }
        ?>
        
    </body>
    
</html>       
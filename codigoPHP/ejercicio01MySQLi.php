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
            require_once "../config/confDBMySQLi.php";//Incluimos el archivo confDBMySQLi.php para poder acceder al valor de las constantes de los distintos valores de la conexión
            
            mysqli_report(MYSQLI_REPORT_STRICT);//En caso de errot lanza una excepción para errores en lugar de advertencias
            
            
            echo '<h2>CONEXIÓN CORRECTA</h2>';
            try{//Codigo que puede tener excepciones
                $miDB = new mysqli();//Creamos un objeto mysqli
                $miDB->connect(HOST, USER, PASSWORD, DATABASE);//Establecemos la conexión con la base de datos
                
                echo "<h3> <span style='color: green;'>"."Conexión establecida con éxito </span></h3>";//Si no se ha producido ningún error nos mostrará "Conexión establecida con éxito"
               
            }catch(mysqli_sql_exception $e){//Código que se ejecutará en caso que lanzarse una excepción
                echo"<span style='color: red;'>Error: </span>".$e->getMessage()."<br>";//Mostramos el mensaje del error de la excepción
                echo"<span style='color: red;'>Código del error: </span>".$e->getCode()."<br>";//Mostramos el código del error de la excepción
                exit();//Termina de ejecutarse el script
            } finally {
                $miDB->close();//Cerramos la conexión
            }
            
            echo '<h2>CONEXIÓN CON CONTRASEÑA INCORRECTA</h2>';
            try{//Codigo que puede tener excepciones
                $miDB = new mysqli();//Creamos un objeto mysqli
                $miDB->connect(HOST, USER, 'PASSWORD', DATABASE);//Establecemos la conexión con la base de datos
                
                echo "<h3> <span style='color: green;'>"."Conexión establecida con éxito </span></h3>";//Si no se ha producido ningún error nos mostrará "Conexión establecida con éxito"
               
            }catch(mysqli_sql_exception $e){//Código que se ejecutará en caso que lanzarse una excepción
                echo"<span style='color: red;'>Error: </span>".$e->getMessage()."<br>";//Mostramos el mensaje del error de la excepción
                echo"<span style='color: red;'>Código del error: </span>".$e->getCode()."<br>";//Mostramos el código del error de la excepción
                exit();//Termina de ejecutarse el script
            }finally {
                $miDB->close();//Cerramos la conexión
            }     
        ?>
        
    </body>
    
</html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 7</title>         
    </head>
    <body>
        <?php
        /**
            *@author: Cristina Núñez
            *@since: 07/11/2020
            * Página web que toma datos (código y descripción) de un fichero xml y los añade a la tabla
              Departamento de nuestra base de datos. (IMPORTAR). El fichero importado se encuentra en el
              directorio .../tmp/ del servidor
        */ 
            
        require_once "../config/confDBPDO.php";  
            try{
                $miDB = new PDO(DNS, USER, PASSWORD); //Establezco la conexión a la base de datos instanciado un objeto PDO.
                $miDB ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Cuando se produce un error lanza una excepción utilizando PDOException.
                
                $sql = <<<EOD
                            Insert into Departamento values
                            (:CodDepartamento, :DescDepartamento, :FechaBaja, :VolumenNegocio);
EOD;
                $consulta = $miDB->prepare($sql);//Preparamos la consulta
                
                $archivoXML = new DOMDocument("1.0", "utf-8"); //Creamos un objeto DOMDocument con dos parámetros, la versión y la codificación del documento
                $archivoXML->load('../tmp/tablaDepartamento.xml'); //Cargamos el documento XML
                
                $numeroDepartamentos = $archivoXML->getElementsByTagName('Departamento')->count();//Guardamos el número de departamentos que hay en el archivoXML
                for ($numeroDepartamento = 0; $numeroDepartamento<$numeroDepartamentos; $numeroDepartamento++){//Recorremos los departamentos
                    
                    $CodDepartamento=$archivoXML->getElementsByTagName("CodDepartamento")->item($numeroDepartamento)->nodeValue;//Guardamos el valor del elemento del cógido de departamento
                    $DescDepartamento=$archivoXML->getElementsByTagName("DescDepartamento")->item($numeroDepartamento)->nodeValue;//Guardamos el valor del elemento de la descripción del departamento
                    $FechaBaja=$archivoXML->getElementsByTagName("FechaBaja")->item($numeroDepartamento)->nodeValue;//Guardamos el valor del elemento de la fecha de baja
                    if(empty($FechaBaja)){//Si el elemento de la feha de baja está vacío
                        $FechaBaja = null;//Le asignamos el valor de null para que no de error a la hora de insertar en la base de datos
                    }
                    $VolumenNegocio=$archivoXML->getElementsByTagName("VolumenNegocio")->item($numeroDepartamento)->nodeValue;//Guardamos el valor del elemento del volumen de negocio
                    
                    //Asignamos al array parametros los diferentes valores de los campos guardados
                    $parametros = [":CodDepartamento" => $CodDepartamento,
                                   ":DescDepartamento" => $DescDepartamento,
                                   ":FechaBaja" => $FechaBaja,
                                   ":VolumenNegocio" => $VolumenNegocio];
                    $consulta -> execute($parametros);//Ejecutamos la consulta con los parámetros
                }
                echo "<h3> <span style='color: green;'>"."Importación llevada a cabo con éxito </span></h3>";
            
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
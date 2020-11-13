<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 24</title>         
    </head>
    <body>
        <?php
        /**
            *@author: Cristina Núñez
            *@since: 28/10/2020
            *description:  Formulario   de   búsqueda   de   departamentos   por   descripción   
                           (por   una   parte   del   campoDescDepartamento, si el usuario no pone nada deben aparecer todos los departamentos)

        */
        require_once '../core/201020libreriaValidacion.php';
        require_once "../config/confDBPDO.php";//Incluimos el archivo confDBPDO.php para poder acceder al valor de las constantes de los distintos valores de la conexión 
        
        //declaracion de variables universales
        define("OBLIGATORIO", 1);
        define("OPCIONAL", 0);
        $entradaOK = true;
        
        
        //Declaramos el array de errores y lo inicializamos a null
        $aErrores = ['DescDepartamento' => null];
        
        //Declaramos el array del formulario y lo inicializamos a null
        //$aFormulario = ['DescDepartamento' => null];
        
            if(isset($_REQUEST['enviar'])){ //Comprobamos que el usuario haya enviado el formulario
                $aErrores['DescDepartamento'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['DescDepartamento'], 255, 1, OPCIONAL);
                
                
                // Recorremos el array de errores
                foreach ($aErrores as $campo => $error){
                    if ($error != null) { // Comprobamos que el campo no esté vacio
                        $entradaOK = false; // En caso de que haya algún error le asignamos a entradaOK el valor false para que vuelva a rellenar el formulario      
                        $_REQUEST[$campo] = "";
                    }
                }
            }else{
                $entradaOK = false; // Si el usuario no ha enviado el formulario asignamos a entradaOK el valor false para que rellene el formulario
            }
            if($entradaOK){ // Si el usuario ha rellenado el formulario correctamente rellenamos el array aFormulario con las respuestas introducidas por el usuario
                //$aFormulario['DescDepartamento'] = $_REQUEST['DescDepartamento'];
                
                try {
                $miDB = new PDO(DNS,USER,PASSWORD);//Instanciamos un objeto PDO y establecemos la conexión
                $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Configuramos las excepciones
                
                $sql = " select * from Departamento where DescDepartamento like '%{$_REQUEST['DescDepartamento']}%';";
                
                $consulta = $miDB->prepare($sql);//Preparamos la consulta
                $consulta->execute();////Ejecutamos la consulta
                
                if($consulta->rowCount()>0){//Si hay algún resultado
            ?>
                <table>
                    <tr>
                        <th>CodDepartamento</th>
                        <th>DescDepartamento</th>
                        <th>FechaBaja</th>
                        <th>VolumenNegocio</th>
                    </tr>

                    <?php 
                    $registro = $consulta->fetchObject();//Obtenemos la primera fila del resultado de la consulta y avanzamos el puntero a la siguiente fila
                    while($registro){ //Mientras haya un registro
                ?>
                
                <tr>
                    <td><?php echo $registro->CodDepartamento //Obtenemos el valor del código de departamento del registro ?></td>
                    <td><?php echo $registro->DescDepartamento //Obtenemos la descripción del departamento del registro ?></td>
                    <td><?php echo $registro->FechaBaja //Obtenemos la fecha de baja del registro ?></td>
                    <td><?php echo $registro->VolumenNegocio //Obtenemos el volumen de negocio del registro ?></td>
                </tr>
                
                <?php 
                    $registro = $consulta->fetchObject();//Obtenemos la siguiente fila del resultado de la consulta y avanzamos el puntero a la siguiente fila
                    }
                ?>
                </table>     
            <?php
                }else{
                    echo "No se ha encontrado ninguna coincidencia";
                }
                }catch (PDOException $excepcion) { //Código que se ejecutará si se produce alguna excepción
                    $errorExcepcion = $excepcion->getCode();//Almacenamos el código del error de la excepción en la variable $errorExcepcion
                    $mensajeExcepcion = $excepcion->getMessage();//Almacenamos el mensaje de la excepción en la variable $mensajeExcepcion

                    echo "<span style='color: red;'>Error: </span>".$mensajeExcepcion."<br>";//Mostramos el mensaje de la excepción
                    echo "<span style='color: red;'>Código del error: </span>".$errorExcepcion;//Mostramos el código de la excepción
                } finally {
                    unset($miDB);
                }
            }else{ // Si el usuario no ha rellenado el formulario correctamente volvera a rellenarlo
        ?>
        <form name="formulario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <div>
                    <label for="DescDepartamento">Descripción de departamento: </label>
                    <input type="text" style="background-color: #D2D2D2" id="DescDepartamento" style="background-color: #D2D2D2" name="DescDepartamento" value="<?php echo(isset($_REQUEST['DescDepartamento']) ? $_REQUEST['DescDepartamento'] : null);?>">
                    <?php echo($aErrores['DescDepartamento']!=null ? "<span style='color:red'>".$aErrores['DescDepartamento']."</span>" : null); ?>
                    <br><br>
                </div>
                <div>
                    <input type="submit" value="Enviar" name="enviar">
                </div>
        </form>
        <?php
            }
        ?>
    </body>
</html>
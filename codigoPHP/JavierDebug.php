<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 04 - Javier Nieto Lorenzo</title>
    </head>
    <body>
        <h1>Javier Nieto Lorenzo</h1>
        <?php
        /**
         *   @author: Javier Nieto Lorenzo
         *   @since: 28/10/2020
         *   @description: 04.- Formulario de búsqueda de departamentos por descripción (por una parte del campo DescDepartamento, si el usuario no pone nada deben aparecer todos los departamentos).

        */ 
        
        require_once '../core/201020libreriaValidacion.php'; // incluyo la libreria de validacion para validar los campos de formulario
            
            define("OBLIGATORIO",1);// defino e inicializo la constante a 1 para los campos que son obligatorios
            
            $entradaOK=true; // declaro la variable que determina si esta bien la entrada de los campos introducidos por el usuario
            
            $aErrores=[ //declaro e inicializo el array de errores
                'DescDepartamento' => null,
            ];
            
            $aRespuestas=[ // declaro e inicializo el array de las respuestas del usuario
                'DescDepartamento' => null,
            ];
            
            
           
            if(isset($_REQUEST["Buscar"])){ // compruebo que el usuario le ha dado a al boton de enviar y valido la entrada de todos los campos
                $aErrores['DescDepartamento']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['DescDepartamento'], 255, 1, 0);
                
                foreach ($aErrores as $campo => $error) { // recorro el array de errores
                    if($error != null){ // compruebo si hay algun mensaje de error en algun campo
                        $entradaOK=false; // le doy el valor false a $entradaOK
                        $_REQUEST[$campo]=""; // si hay algun campo que tenga mensaje de error pongo $_REQUEST a null
                    }
                }
            }else{ // si el usuario no le ha dado al boton de enviar
                $entradaOK=false; // le doy el valor false a $entradaOK
            }
            
            if($entradaOK){ // si la entrada esta bien recojo los valores introducidos y hago su tratamiento
                $aRespuestas['DescDepartamento']=$_REQUEST['DescDepartamento']; 
                
                
                
                // TRATAMIENTO
                echo "<h2>Datos introducidos</h2>";
                echo "<p>DescDepartamento: ".$aRespuestas['DescDepartamento']."</p>";
                
                
                // 
                echo "<h2>Contenido tabla Departamentos DAW215DBDepartamentos</h2>";
                try { // Bloque de código que puede tener excepciones en el objeto PDO
                    $miDB = new PDO("mysql:host=192.168.1.215:3306; dbname=DAW215DBDepartamentos","usuarioDAW215DBDepartamentos", "P@ssw0rd"); // creo un objeto PDO con la conexion a la base de datos

                    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $sqlConsulta="SELECT * FROM Departamento WHERE DescDepartamento LIKE '%{$aRespuestas['DescDepartamento']}%'";
                    $resultadoConsulta = $miDB->query($sqlConsulta);
                    
                    if($resultadoConsulta!=null){
                        
                        
        ?>
        <table>
            <tr>
                <th>CodDepartamento</th>
                <th>DescDepartamento</th>
                <th>FechaBaja</th>
                <th>VolumenNegocio</th>
            </tr>
            <?php foreach ($resultadoConsulta as $campo) {?>
            <tr>
                <td><?php echo $campo['CodDepartamento'] ?></td>
                <td><?php echo $campo['DescDepartamento'] ?></td>
                <td><?php echo $campo['FechaBaja'] ?></td>
                <td><?php echo $campo['VolumenNegocio'] ?></td>
            </tr>
            <?php 
                    }
            ?>
        </table>   
        
        <?php
                } else {
                    echo "<p>No se encuentra ningun departamento con esa descripción</p>";
                }   
                }catch (PDOException $miExceptionPDO) { // Codigo que se ejecuta si hay alguna excepcion
                    echo "<p style='color:red;'>ERROR EN LA CONEXION</p>";
                    echo "<p style='color:red;'>Código de error: ".$miExceptionPDO->getCode()."</p>"; // Muestra el codigo del error
                    echo "<p style='color:red;'>Error: ".$miExceptionPDO->getMessage()."</p>"; // Muestra el mensaje de error
                }finally{
                    unset($miDB);
                }
            }else{ // si hay algun campo de la entrada que este mal muestro el formulario hasta que introduzca bien los campos
        ?> 
        
        <form name="formulario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <fieldset>
                <legend>Buscar Departamento</legend>
                <div>
                    <label for="DescDepartamento">Descripcion del Departamento</label>
                    <input style="background-color:#81BEF7;width:248px;" type="text" id="DescDepartamento" name="DescDepartamento" placeholder="Introduzca Descripcion del Departamento" value="<?php 
                        echo (isset($_REQUEST['DescDepartamento'])) ? $_REQUEST['DescDepartamento'] : null; // si el campo esta correcto mantengo su valor en el formulario
                    ?>">
                    <?php
                        echo ($aErrores['DescDepartamento']) ? "<span style='color:#FF0000'>".$aErrores['DescDepartamento']."</span>" : null;// si el campo es erroneo se muestra un mensaje de error
                    ?>
                </div>
            </fieldset>

            <input type="submit" value="Buscar" name="Buscar">
        </form>
        
        <?php
            }
        ?>
    </body>
</html>




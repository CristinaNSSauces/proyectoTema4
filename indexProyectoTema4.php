<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CNS-TEMA3</title>

    <link href="webroot/css/estilo.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">TEMA 4: TÉCNICAS DE ACCESO A DATOS</div>
        <nav>
            <ul class="enlaces">
                <li><a href="../index.html">HOME</a></li>
                <li><a class="activo" href="../proyectoDWES/indexProyectoDWES.php">DWES</a></li>
                <li><a href="#">DWEC</a></li>
                <li><a href="#">DAW</a></li>
                <li><a href="#">DIW</a></li>
                <li><a href="#">EIE</a></li>
            </ul>
        </nav> 
    </header>
    
    <main>
        <div class="contenido">
            
            <table>
                <tr>
                    <th>Script</th>
                    <th>Descargar</th>
                    <th>Mostrar</th>
                </tr>
                <tr>
                    <td>Script CreaDAW215DBDepartamentos.sql</td>
                    <td><a href="scriptDB/CreaDAW215DBDepartamentos.sql"><img src="webroot/media/descargar.png" alt="descargar script" width="40px"></a></td>
                    <td><a href="mostrarcodigo/muestraScriptCreaDAW215DBDepartamentos.php"><img src="webroot/media/code.png" alt="ver script" width="40px"></a></td>
                </tr>
                <tr>
                    <td>Script CargaInicialDAW215DBDepartamentos.sql</td>
                    <td><a href="scriptDB/CargaInicialDAW215DBDepartamentos.sql"><img src="webroot/media/descargar.png" alt="descargar script" width="40px"></a></td>
                    <td><a href="mostrarcodigo/muestraScriptCargaInicialDAW215DBDepartamentos.php"><img src="webroot/media/code.png" alt="ver script" width="40px"></a></td>
                </tr>
                <tr>
                    <td>Script BorraDAW215DBDepartamentos.sql</td>
                    <td><a href="scriptDB/BorraDAW215DBDepartamentos.sql"><img src="webroot/media/descargar.png" alt="descargar script" width="40px"></a></td>
                    <td><a href="mostrarcodigo/muestraScriptBorraDAW215DBDepartamentos.php"><img src="webroot/media/code.png" alt="ver script" width="40px"></a></td>
                </tr>
                <!--
                <tr>
                    <td>Script CreaDAW215DBDepartamentos.php</td>
                    <td><a href="scriptDB/crear.php"><img src="webroot/media/run.png" alt="ejecutar script" width="40px"></a></td>
                    <td><a href="mostrarcodigo/muestraCrear1and1.php"><img src="webroot/media/code.png" alt="ver script" width="40px"></a></td>
                </tr>
                <tr>
                    <td>Script CargaInicialDAW215DBDepartamentos.php</td>
                    <td><a href="scriptDB/CargaInicial.php"><img src="webroot/media/run.png" alt="ejecutar script" width="40px"></a></td>
                    <td><a href="mostrarcodigo/muestraCargaInicial1and1.php"><img src="webroot/media/code.png" alt="ver script" width="40px"></a></td>
                </tr>
                <tr>
                    <td>Script BorrarDAW215DBDepartamentos.php</td>
                    <td><a href="scriptDB/Borrar.php"><img src="webroot/media/run.png" alt="ejecutar script" width="40px"></a></td>
                    <td><a href="mostrarcodigo/muestraBorrar1and1.php"><img src="webroot/media/code.png" alt="ver script" width="40px"></a></td>
                </tr>
                -->
                <tr>
                    <th>Archivos de configuración</th>
                    <th>Mostrar</th>
                </tr>
                <tr>
                    <td>confDBMySQLi.php</td>
                    <td><a href="mostrarcodigo/muestraConfigMySQLI.php"><img src="webroot/media/code.png" alt="ver archivo" width="40px"></a></td>
                </tr>
                <tr>
                    <td>confDBPDO.php</td>
                    <td><a href="mostrarcodigo/muestraConfDBPDO.php"><img src="webroot/media/code.png" alt="ver archivo" width="40px"></a></td>
                </tr>
                <tr>
                    <th>Ejercicios</th>
                    <th colspan="2">PDO</th>
                    <th colspan="2">MySQLi</th>
                </tr>
                <tr>
                    <th> </th>
                    <th>Ejecutar</th>
                    <th>Mostrar</th>
                    <th>Ejecutar</th>
                    <th>Mostrar</th>
                </tr>
                <tr>
                    <td class="enunciado">01. (ProyectoTema4) Conexión a la base de datos con la cuenta usuario y tratamiento de errores</td>
                    <td><a href="codigoPHP/ejercicio01PDO.php"><img src="webroot/media/run.png" alt="ejecutar código PDO" width="30px"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio01PDO.php"><img src="webroot/media/code.png" alt="ver código PDO" width="40px"></a></td>
                    <td><a href="codigoPHP/ejercicio01MySQLi.php"><img src="webroot/media/run.png" alt="ejecutar código MySQLi" width="30px"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio01MySQLi.php"><img src="webroot/media/code.png" alt="ver código MySQLi" width="40px"></a></td>
                </tr>
                <tr>
                    <td class="enunciado">02. Mostrar el contenido de la tabla Departamento y el número de registros</td>
                    <td><a href="codigoPHP/ejercicio02PDO.php"><img src="webroot/media/run.png" alt="ejecutar código PDO" width="30px"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio02PDO.php"><img src="webroot/media/code.png" alt="ver código PDO" width="40px"></a></td>
                    <!-- <td><a href="#"><img src="webroot/media/run.png" alt="ejecutar código MySQLi" width="30px"></a></td> -->
                    <!-- <td><a href="#"><img src="webroot/media/code.png" alt="ver código MySQLi" width="40px"></a></td> -->
                </tr>
                <tr>
                    <td class="enunciado">03. Formulario para añadir un departamento a la tabla Departamento con validación de entrada y control de errores</td>
                    <td><a href="codigoPHP/ejercicio03PDO.php"><img src="webroot/media/run.png" alt="ejecutar código PDO" width="30px"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio03PDO.php"><img src="webroot/media/code.png" alt="ver código PDO" width="40px"></a></td>
                    <!-- <td><a href="#"><img src="webroot/media/run.png" alt="ejecutar código MySQLi" width="30px"></a></td> -->
                    <!-- <td><a href="#"><img src="webroot/media/code.png" alt="ver código MySQLi" width="40px"></a></td> -->
                </tr>
                <tr>
                    <td class="enunciado">04. Formulario   de   búsqueda   de   departamentos   por   descripción   (por   una   parte   del   campoDescDepartamento, si el usuario no pone nada deben aparecer todos los departamentos)</td>
                    <td><a href="codigoPHP/ejercicio04PDO.php"><img src="webroot/media/run.png" alt="ejecutar código PDO" width="30px"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio04PDO.php"><img src="webroot/media/code.png" alt="ver código PDO" width="40px"></a></td>
                    <!-- <td><a href="#"><img src="webroot/media/run.png" alt="ejecutar código MySQLi" width="30px"></a></td> -->
                    <!-- <td><a href="#"><img src="webroot/media/code.png" alt="ver código MySQLi" width="40px"></a></td> -->
                </tr>
                <tr>
                    <td class="enunciado">05. Pagina web que añade tres registros a nuestra tabla Departamento utilizando tres instrucciones
                                          insert y una transacción, de tal forma que se añadan los tres registros o no se añada ninguno</td>
                    <td><a href="codigoPHP/ejercicio05PDO.php"><img src="webroot/media/run.png" alt="ejecutar código PDO" width="30px"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio05PDO.php"><img src="webroot/media/code.png" alt="ver código PDO" width="40px"></a></td>
                    <!-- <td><a href="#"><img src="webroot/media/run.png" alt="ejecutar código MySQLi" width="30px"></a></td> -->
                    <!-- <td><a href="#"><img src="webroot/media/code.png" alt="ver código MySQLi" width="40px"></a></td> -->
                </tr>
                <tr>
                    <td class="enunciado">06. Pagina web que cargue registros en la tabla Departamento desde un array departamentos nuevos utilizando una consulta preparada</td>
                    <td><a href="codigoPHP/ejercicio06PDO.php"><img src="webroot/media/run.png" alt="ejecutar código PDO" width="30px"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio06PDO.php"><img src="webroot/media/code.png" alt="ver código PDO" width="40px"></a></td>
                    <!-- <td><a href="#"><img src="webroot/media/run.png" alt="ejecutar código MySQLi" width="30px"></a></td> -->
                    <!-- <td><a href="#"><img src="webroot/media/code.png" alt="ver código MySQLi" width="40px"></a></td> -->
                </tr>
                <tr>
                    <td class="enunciado">07. Página web que toma datos (código y descripción) de un fichero xml y los añade a la tablaDepartamento de nuestra base de datos. (IMPORTAR). El fichero importado se encuentra en eldirectorio .../tmp/ del servidor</td>
                    <td><a href="codigoPHP/ejercicio07PDO.php"><img src="webroot/media/run.png" alt="ejecutar código PDO" width="30px"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio07PDO.php"><img src="webroot/media/code.png" alt="ver código PDO" width="40px"></a></td>
                    <!-- <td><a href="#"><img src="webroot/media/run.png" alt="ejecutar código MySQLi" width="30px"></a></td> -->
                    <!-- <td><a href="#"><img src="webroot/media/code.png" alt="ver código MySQLi" width="40px"></a></td> -->
                </tr>
                <tr>
                    <td></td>
                    <th colspan="2">tmp</th>
                    <th colspan="2">Local</th>
                </tr>
                <tr>
                    <th> </th>
                    <th>Ejecutar</th>
                    <th>Mostrar</th>
                    <th>Ejecutar</th>
                    <th>Mostrar</th>
                </tr>
                <tr>
                    <td class="enunciado">08. Página web que toma datos (código y descripción) de la tabla Departamento y guarda en unfichero departamento.xml. (COPIA DE SEGURIDAD / EXPORTAR). El fichero exportado seencuentra en el directorio .../tmp/ del servidor</td>
                    <td><a href="codigoPHP/ejercicio08PDO.php"><img src="webroot/media/run.png" alt="ejecutar código PDO" width="30px"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio08PDO.php"><img src="webroot/media/code.png" alt="ver código PDO" width="40px"></a></td>
                    <td><a href="codigoPHP/ejercicio08PDOLocal.php"><img src="webroot/media/run.png" alt="ejecutar código PDO" width="30px"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio08PDOLocal.php"><img src="webroot/media/code.png" alt="ver código PDO" width="40px"></a></td>
                    <!-- <td><a href="#"><img src="webroot/media/run.png" alt="ejecutar código MySQLi" width="30px"></a></td> -->
                    <!-- <td><a href="#"><img src="webroot/media/code.png" alt="ver código MySQLi" width="40px"></a></td> -->
                </tr>
            </table>
        </div>
    </main>
    
    <footer> 
        <address>Cristina Núñez Sebastián</address>
    </footer>
</body>
</html>

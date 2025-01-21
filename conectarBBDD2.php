 <?php 
//omito la conexión por seguridad, se realizaron las pruebas en el hosting de la clase, en la bbdd del juego
define("SERVIDOR", ""); // DATOS SERVIDOR
define("USUARIO", "");  // DATOS USUARIO BBDD
define("PASSWORD", ""); // DATOS CONTRASEÑA BBDD
define("BBDD", ""); // NOMBRE BBDD

    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
    $conexion->set_charset("utf8"); 
    $controlador = new mysqli_driver();
    $controlador->report_mode = MYSQLI_REPORT_OFF;

    $sql = "SELECT nombre, puntos, numFallos, tiempo FROM puntuacion 
    WHERE idContinente = 4
	ORDER BY puntos DESC, tiempo
    LIMIT 25";

    $resultado = $conexion->query($sql);
?>
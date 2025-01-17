 <?php 
    require_once('fpdf.php');
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
    
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',12);

    $pdf->Cell(0, 10, 'Ranking', 0, 1, 'C');
    $pdf->Ln(10);

    $ancho1 = 50;
    $ancho2 = 30;
    $ancho3 = 40;
    $ancho4 = 30;

    $anchoTotal = $ancho1 + $ancho2 + $ancho3 + $ancho4;
    $posX = (210 - $anchoTotal) / 2;

    $pdf->SetX($posX);

    $pdf->Cell($ancho1, 10, 'Nombre', 1, 0, 'C');
    $pdf->Cell($ancho2, 10, 'Puntos', 1, 0, 'C');
    $pdf->Cell($ancho3, 10, 'Num. Fallos', 1, 0, 'C');
    $pdf->Cell($ancho4, 10, 'Tiempo', 1, 1, 'C');

    $pdf->SetFont('Arial', '', 10);

    while ($fila = $resultado->fetch_assoc()) {
        $pdf->SetX($posX);
        $pdf->Cell($ancho1, 10, $fila['nombre'], 1, 0, 'C');
        $pdf->Cell($ancho2, 10, $fila['puntos'], 1, 0, 'C');
        $pdf->Cell($ancho3, 10, $fila['numFallos'], 1, 0, 'C');
        $pdf->Cell($ancho4, 10, $fila['tiempo'], 1, 1, 'C');
    }
$conexion->close();
    $pdf->Output('I');
    
?>
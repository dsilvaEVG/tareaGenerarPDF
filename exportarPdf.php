 <?php 
    require_once('fpdf.php');
    require_once('conectarBBDD2.php');
    
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
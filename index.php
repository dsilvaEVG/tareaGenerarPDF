 <?php 
    require_once('conectarBBDD2.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Ranking</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header><h1>Ranking</h1></header>
    <main>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Puntos</th>
                <th>Num. Fallos</th>
                <th>Tiempo</th>
            </tr>
            <?php 
             while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>
                    <td>".$fila["nombre"]."</td>
                    <td>".$fila["puntos"]."</td>
                    <td>".$fila["numFallos"]."</td>
                    <td>".$fila["tiempo"]."</td> 
            </tr>";
     
             } 
            ?>
        </table>
        <form action="exportarPdf.php" method="get">
            <button type="submit" class="button">Exportar a PDF</button>
        </form>
    </main>
</body>
</html>
<?php

$conexion->close();
    
?>

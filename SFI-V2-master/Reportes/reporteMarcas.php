<?php
require_once '../funciones/conexion.php';
$MiConexion = ConexionBD();
require_once '../funciones/autenticacion.php';

$SQL = "SELECT m.id_marca as codigo, 
               m.marca as marca,
              e.estatus as estatus
        FROM marca m, estatus e
        WHERE m.id_estatus=e.id_estatus AND m.disponibilidad = 1";

$result = $MiConexion->query($SQL);

date_default_timezone_set('America/Argentina/Buenos_Aires');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Marcas Activas</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/material.min.css">
    <link rel="stylesheet" href="../css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <style>
        html {
            background-color: white;
        }
        body {
            color: #0F0768;
            background-color: white;
        }
        .reporte {
            padding: 2px;
            border-radius: 5px;
            margin: auto;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            overflow-x: auto;
            width: 1000px;
        }
        h1, h2, h3 {
            text-align: center;
        }
        table {
            table-layout: auto;
            word-wrap: break-word;
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            white-space: normal;
            word-break: break-word;
        }
        th {
            background-color: #B1ACE3;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
            color: #555;
        }
        @media print {
            .reporte {
                max-width: 100%;
                overflow: visible;
                page-break-inside: avoid;
            }
            table {
                width: 100%;
            }
            button, a { 
                display: none;
            }
        }
    p{
        font-size: 10px;
        margin-bottom: 0px;
      }
    </style>
</head>
<body>
    <div class="reporte">
        <h3>Reporte de Marcas Activas</h3>
<?php echo "<p>Descarga: " . date("d/m/Y H:i:s") . "</p>"; ?>

        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
            <th>Codigo</th>
            <th>Marca</th>
            <th>Estatus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['codigo']) ?></td>
                            <td><?= htmlspecialchars($row['marca']) ?></td>
                            <td><?= htmlspecialchars($row['estatus']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
             <div >
        <br>
        <div>
            <a href="excel_marcas.php" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
    DESCARGAR EXCEL
</a>
        </div>
        <?php endif; ?>
    </div>

    
</body>
</html>

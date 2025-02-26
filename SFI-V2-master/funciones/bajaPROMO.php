<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "opticavision";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['BtnBaja'])) {
    $mensajeC1='';
    $mensajeE1='';


    if ($_POST['accion'] === 'dar_baja') {
        // Obtener el ID del usuario del formulario
        $user_id = intval($_POST['CODPROMO']);
        $sql = "UPDATE promociones SET activo = 0 WHERE id_promo= ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $user_id);

            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    $mensajeC1 = "Promocion dada de BAJA con éxito.";
                } else {
                    $mensajeE1 = "No se encontró ninguna promo con el ID proporcionado o ya está actualizado.";
                }
            } else {
                $mensajeE1 = "Error al actualizar la actividad de la promo: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $mensajeE1 = "Error al preparar la consulta: " . $conn->error;
        }
    }
    $conn->close();
return $mensajeE1;

}
?>
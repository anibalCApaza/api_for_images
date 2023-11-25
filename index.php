<?php
// Ruta a la carpeta de imágenes
$imageFolder = 'uploads/';

try {
    if (!isset($_GET['image'])) {
        throw new InvalidArgumentException('Se requiere el parámetro "image".');
    }

    $imageName = $_GET['image'];
    $imagePath = $imageFolder . $imageName;

    if (!file_exists($imagePath)) {
        throw new RuntimeException('La imagen no existe.');
    }

    // Configurar encabezados para la respuesta (imagen)
    header('Content-Type: image/jpeg');

    // Leer y enviar la imagen al cliente
    readfile($imagePath);
} catch (InvalidArgumentException $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
} catch (RuntimeException $e) {
    http_response_code(404);
    echo json_encode(['error' => $e->getMessage()]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error interno del servidor']);
}

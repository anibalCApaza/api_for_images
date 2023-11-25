<?php
// Ruta a la carpeta de imágenes
$imageFolder = 'uploads/';

// Nombre del archivo de imagen (puedes pasarlo como parámetro en la solicitud)
$imageName = isset($_GET['image']) ? $_GET['image'] : '';
$imagePath = $imageFolder . $imageName;

// Verificar si el archivo existe
if (file_exists($imagePath)) {
    // Configurar encabezados para la respuesta (imagen)
    header('Content-Type: image/jpeg');

    // Leer y enviar la imagen al cliente
    readfile($imagePath);
} else {
    // Devolver una respuesta de error si la imagen no existe
    echo json_encode(['error' => 'La imagen no existe.']);
}

?>
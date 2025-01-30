<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Inicializamos variables para calcular los puntajes
    $puntaje_categoria1 = 0;
    $puntaje_categoria2 = 0;

    // Procesamos las respuestas de la Categoría I
    $cantidad_categoria1 = 6; // Cambia esto si agregas más preguntas
    for ($i = 0; $i < $cantidad_categoria1; $i++) {
        if (isset($_POST["respuesta_categoria1_$i"])) {
            $puntaje_categoria1 += intval($_POST["respuesta_categoria1_$i"]);
        }
    }

    // Procesamos las respuestas de la Categoría II
    $cantidad_categoria2 = 6; // Cambia esto si agregas más preguntas
    for ($i = 0; $i < $cantidad_categoria2; $i++) {
        if (isset($_POST["respuesta_categoria2_$i"])) {
            $puntaje_categoria2 += intval($_POST["respuesta_categoria2_$i"]);
        }
    }

    // Calculo del puntaje total
    $puntaje_total = $puntaje_categoria1 + $puntaje_categoria2;

    // Mostramos los resultados
    echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Resultados del Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .resultados {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }
        .resultados h2 {
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Resultados del Test de Ansiedad</h1>
    <div class='resultados'>
        <h2>Puntaje por Categoría:</h2>
        <p><strong>Categoría I (Sentimientos de ansiedad):</strong> $puntaje_categoria1 puntos</p>
        <p><strong>Categoría II (Pensamientos de ansiedad):</strong> $puntaje_categoria2 puntos</p>
        <h2>Puntaje Total:</h2>
        <p><strong>$puntaje_total puntos</strong></p>
    </div>
    <a href='index.php' style='margin-top: 20px; display: inline-block;'>Volver al Test</a>
</body>
</html>";
} else {
    // Redirige al formulario si no se accede por POST
    header('Location: index.php');
    exit();
}//? funcion que procesa las respuestas del test de ansiedad

?>

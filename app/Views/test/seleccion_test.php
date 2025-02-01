<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Test</title>
</head>
<body>

    <h1>Selecciona el Test</h1>

    <div class="container">
        <div class="test-option">
            <img src="<?php echo RUTA_BASE; ?>assets/imagenes/estados_animo.png" alt="Test de Ansiedad">
        </div>
        <div class="test-option">
            <img src="<?php echo RUTA_BASE; ?>assets/imagenes/estados_animo.png" alt="Test de Depresión">
        </div>
    </div>

    <div class="btn-container">
        <a href="<?php echo RUTA_PUBLICA; ?>/Test/test_ansiedad" class="btn">Test de Ansiedad</a>
        <a href="<?php echo RUTA_PUBLICA; ?>/Test/test_depresion" class="btn">Test de Depresión</a>
    </div>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test de Ansiedad</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .instructions {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Test de Ansiedad</h1>
    <div class="instructions">
        <p>
            La siguiente es una lista de síntomas que las personas suelen experimentar. 
            En el espacio a la derecha de la tabla, califique (con el puntaje indicado abajo) 
            cuánto le ha molestado ese síntoma o problema durante la última semana:
        </p>
        <p>
            <strong>0 = De ningún modo</strong>, 
            <strong>1 = Un poco</strong>, 
            <strong>2 = Moderadamente</strong>, 
            <strong>3 = Mucho</strong>.
        </p>
    </div>
    
    <form method="POST" action="procesar_test.php">
        <table>
            <thead>
                <tr>
                    <th>Lista de síntomas</th>
                    <th>0</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                </tr>
            </thead>
            <tbody>
                <!-- Categoría I -->
                <tr>
                    <td colspan="5" style="text-align: left;"><strong>Categoría I: Sentimientos de ansiedad</strong></td>
                </tr>
                <?php
                $sintomas_categoria1 = [
                    "Siente ansiedad, nerviosismo, preocupación o miedo.",
                    "Siente que las cosas a su alrededor son extrañas, irreales o brumosas.",
                    "Se siente separado de todo o parte de su cuerpo.",
                    "Episodios de pánico inesperados.",
                    "Siente aprehensión o una sensación de inminente pérdida.",
                    "Se siente tenso, estresado o nervioso."
                ];
                foreach ($sintomas_categoria1 as $index => $sintoma) {
                    echo "<tr>
                            <td>$sintoma</td>
                            <td><input type='radio' name='respuesta_categoria1_$index' value='0' required></td>
                            <td><input type='radio' name='respuesta_categoria1_$index' value='1'></td>
                            <td><input type='radio' name='respuesta_categoria1_$index' value='2'></td>
                            <td><input type='radio' name='respuesta_categoria1_$index' value='3'></td>
                          </tr>";
                }
                ?>

                <!-- Categoría II -->
                <tr>
                    <td colspan="5" style="text-align: left;"><strong>Categoría II: Pensamientos de ansiedad</strong></td>
                </tr>
                <?php
                $sintomas_categoria2 = [
                    "Dificultad de concentrarse.",
                    "Pensamientos acelerados o siente como su mente salta de una cosa a otra.",
                    "Fantasías aterradoras o ensueños.",
                    "Siente que está a punto de perder el control.",
                    "Miedo a agrietarse o volverse loco.",
                    "Miedo a desmayarse."
                ];
                foreach ($sintomas_categoria2 as $index => $sintoma) {
                    echo "<tr>
                            <td>$sintoma</td>
                            <td><input type='radio' name='respuesta_categoria2_$index' value='0' required></td>
                            <td><input type='radio' name='respuesta_categoria2_$index' value='1'></td>
                            <td><input type='radio' name='respuesta_categoria2_$index' value='2'></td>
                            <td><input type='radio' name='respuesta_categoria2_$index' value='3'></td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
        <br>
        <button type="submit">Enviar respuestas</button>
    </form>
</body>
</html>

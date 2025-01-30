<title>Test de Depresión</title>
    <style>
body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th,
td {
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

    <h1>Test de Depresión</h1>
    <div class="instructions">
        <p>
            La siguiente es una lista de síntomas que las personas suelen experimentar.
            En el espacio a la derecha de la tabla, califique (con el puntaje indicado abajo)
            cuánto le ha molestado ese síntoma o problema durante la última semana:
        </p>
        <p>
            <strong>0 = Para nada</strong>,
            <strong>1 = Algo así</strong>,
            <strong>2 = Moderadamente</strong>,
            <strong>3 = Mucho</strong>,
            <strong>4 = Extremadamente</strong>.
        </p>
    </div>

    <form id="test_ansiedad">
        <table>
            <thead>
                <tr>
                    <th>Síntoma</th>
                    <th>0 - Para nada</th>
                    <th>1 - Algo así</th>
                    <th>2 - Moderadamente</th>
                    <th>3 - Mucho</th>
                    <th>4 - Extremadamente</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($preguntas as $pregunta): ?>
                <tr>
                    <td><?= $pregunta->pregunta ?></td>
                    <td>
                        <input class="form-check-input" type="radio" name="respuesta_<?= $pregunta->id ?>" value="0"
                            id="opcion0_<?= $pregunta->id ?>">
                    </td>
                    <td>
                        <input class="form-check-input" type="radio" name="respuesta_<?= $pregunta->id ?>" value="1"
                            id="opcion1_<?= $pregunta->id ?>">
                    </td>
                    <td>
                        <input class="form-check-input" type="radio" name="respuesta_<?= $pregunta->id ?>" value="2"
                            id="opcion2_<?= $pregunta->id ?>">
                    </td>
                    <td>
                        <input class="form-check-input" type="radio" name="respuesta_<?= $pregunta->id ?>" value="3"
                            id="opcion3_<?= $pregunta->id ?>">
                    </td>
                    <td>
                        <input class="form-check-input" type="radio" name="respuesta_<?= $pregunta->id ?>" value="4"
                            id="opcion4_<?= $pregunta->id ?>">
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <button class="submit-btn">Enviar Respuestas</button>
    </form>
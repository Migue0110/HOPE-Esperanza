<H2>TEST INICIAL</H2>

<div>
    <?php foreach ($preguntas as $pregunta): ?>
        <div class="rounded border p-3">
            <h3><?= $pregunta->pregunta ?></h3>
            <input type="radio" name="input1_<?= $pregunta->id ?>" value="1">
            <input type="radio" name="input2_<?= $pregunta->id ?>" value="2">
            <input type="radio" name="input3_<?= $pregunta->id ?>" value="3">
            <input type="radio" name="input4_<?= $pregunta->id ?>" value="4">
        </div>
    <?php endforeach; ?>
</div>
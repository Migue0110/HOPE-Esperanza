<h1>Restablecer Contraseña</h1>
<form method="POST" action="<?= base_url('login/resetPassword') ?>">
    <input type="hidden" name="token" value="<?= $token ?>">
    <label for="password">Nueva Contraseña:</label>
    <input type="password" name="password" required>
    <button type="submit">Restablecer Contraseña</button>
</form>
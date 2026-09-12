<?php
session_start();

$passwordTemporal = $_SESSION['password_temporal_generada'] ?? '';
$nomUsuario = $_SESSION['usuario_password_temporal'] ?? '';

if ($passwordTemporal === '' || $nomUsuario === '') {
    header('location: ../../index.php');
    exit;
}

unset($_SESSION['password_temporal_generada'], $_SESSION['usuario_password_temporal']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contraseña temporal - INTECAP Quiché</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; display: grid; place-items: center; padding: 20px; background: linear-gradient(135deg, #0a3d8f, #42a5f5); font-family: Arial, sans-serif; }
        .card { width: min(500px, 100%); padding: 36px; background: #fff; border-radius: 18px; box-shadow: 0 18px 45px rgba(0,0,0,.25); }
        h1 { margin: 0 0 12px; color: #0a3d8f; font-size: 1.6rem; }
        p { color: #52657a; line-height: 1.55; }
        .notice { padding: 13px; border-radius: 8px; background: #fff4d6; color: #795500; }
        label { display: block; margin: 22px 0 7px; color: #1565c0; font-weight: 700; }
        .password-row { display: flex; gap: 8px; }
        input { min-width: 0; flex: 1; padding: 13px; border: 1px solid #ccd9e8; border-radius: 8px; font: 700 1.1rem monospace; letter-spacing: 1px; color: #102a43; }
        button, a { padding: 13px 16px; border: 0; border-radius: 8px; background: #1565c0; color: #fff; font-weight: 700; text-decoration: none; cursor: pointer; }
        .login { display: block; margin-top: 22px; text-align: center; }
        #copiado { min-height: 20px; margin: 8px 0 0; color: #16803c; font-size: .9rem; }
    </style>
</head>
<body>
    <main class="card">
        <h1>Contraseña temporal generada</h1>
        <p>Usuario: <strong><?php echo htmlspecialchars($nomUsuario, ENT_QUOTES, 'UTF-8'); ?></strong></p>
        <p class="notice">Usa esta contraseña para ingresar. Es temporal y el sistema te pedirá cambiarla inmediatamente.</p>
        <label for="password-temporal">Contraseña temporal</label>
        <div class="password-row">
            <input id="password-temporal" type="text" value="<?php echo htmlspecialchars($passwordTemporal, ENT_QUOTES, 'UTF-8'); ?>" readonly>
            <button type="button" onclick="copiarContrasena()">Copiar</button>
        </div>
        <p id="copiado" aria-live="polite"></p>
        <a class="login" href="../../index.php">Ir al inicio de sesión</a>
    </main>
    <script>
        function copiarContrasena() {
            const campo = document.getElementById('password-temporal');
            campo.select();
            navigator.clipboard.writeText(campo.value).then(function () {
                document.getElementById('copiado').textContent = 'Contraseña copiada. Guárdala y úsala para ingresar.';
            });
        }
    </script>
</body>
</html>

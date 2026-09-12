<?php
session_start();

if (!isset($_SESSION['admin_intecap'])) {
    header('location: ../../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña temporal - INTECAP Quiché</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; display: grid; place-items: center; padding: 20px; background: linear-gradient(135deg, #0a3d8f, #42a5f5); font-family: Arial, sans-serif; }
        .card { width: min(460px, 100%); padding: 36px; background: #fff; border-radius: 18px; box-shadow: 0 18px 45px rgba(0,0,0,.25); }
        h1 { margin: 0 0 12px; color: #0a3d8f; font-size: 1.65rem; }
        p { color: #52657a; line-height: 1.55; }
        label { display: block; margin: 18px 0 7px; color: #1565c0; font-weight: 700; }
        input { width: 100%; padding: 12px; border: 1px solid #ccd9e8; border-radius: 8px; font-size: 1rem; }
        button { width: 100%; margin-top: 24px; padding: 13px; border: 0; border-radius: 8px; background: #1565c0; color: #fff; font-size: 1rem; font-weight: 700; cursor: pointer; }
        .notice { padding: 12px; border-radius: 8px; background: #fff4d6; color: #795500; }
    </style>
</head>
<body>
    <main class="card">
        <h1><i class="fa-solid fa-key"></i> Cambia tu contraseña</h1>
        <p class="notice">Ingresaste con una contraseña temporal. Debes reemplazarla para continuar.</p>
        <form action="../../modelos/cambiar_contrasena_temporal.php" method="post" autocomplete="off">
            <label for="password">Nueva contraseña</label>
            <input type="password" id="password" name="password" minlength="8" required>
            <label for="password1">Repite la nueva contraseña</label>
            <input type="password" id="password1" name="password1" minlength="8" required>
            <button type="submit">Guardar contraseña</button>
        </form>
    </main>
</body>
</html>

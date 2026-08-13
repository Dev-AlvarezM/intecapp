<?php
/**
 * PLANTILLA de credenciales de correo (SMTP).
 *
 * Copia este archivo a "credenciales.php" (mismo folder) y llena tus
 * datos reales ahí. "credenciales.php" está en .gitignore y nunca debe
 * subirse a GitHub.
 *
 * Para Gmail:
 *  1. Activa la verificación en dos pasos en la cuenta que envía.
 *  2. Genera una "contraseña de aplicación" NUEVA (16 caracteres) en:
 *     https://myaccount.google.com/apppasswords
 *  3. Pega esa contraseña de 16 caracteres (SIN espacios) en SMTP_PASS.
 *     OJO: si copias el valor con espacios que muestra Google
 *     ("abcd efgh ijkl mnop"), quítale los espacios: "abcdefghijklmnop".
 *     Debe tener exactamente 16 caracteres.
 */

define('SMTP_ENABLED', true);

define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);          // 587 = TLS (STARTTLS) | 465 = SSL
define('SMTP_SECURE', 'tls');      // 'tls' o 'ssl'

define('SMTP_USER', 'tu-correo@gmail.com');
define('SMTP_PASS', 'contraseniadeaplicacion16'); // 16 caracteres, sin espacios

define('MAIL_FROM', SMTP_USER);
define('MAIL_FROM_NAME', 'INTECAP Quiché - Sistema de Gestión');
<?php
/**
 * Credenciales reales de correo (SMTP).
 *
 * ESTE ARCHIVO NUNCA DEBE SUBIRSE A GITHUB.
 * Ya está en .gitignore.
 *
 * Para Gmail:
 *  1. Verificación en dos pasos activada en la cuenta que envía.
 *  2. Genera una "contraseña de aplicación" NUEVA en:
 *     https://myaccount.google.com/apppasswords
 *  3. Pega esa contraseña de 16 caracteres (SIN espacios) en SMTP_PASS.
 */

define('SMTP_ENABLED', true);

define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);          // 587 = TLS (STARTTLS) | 465 = SSL
define('SMTP_SECURE', 'tls');      // 'tls' o 'ssl'

define('SMTP_USER', 'sp.space.deveolopers@gmail.com');
define('SMTP_PASS', 'bleq oxsx pllz hrf'); // <-- reemplaza esto, sin espacios

define('MAIL_FROM', SMTP_USER);
define('MAIL_FROM_NAME', 'INTECAP Quiché - Sistema de Gestión');
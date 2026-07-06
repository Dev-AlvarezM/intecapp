<?php
/**
 * Configuración general del sitio.
 * Ajusta BASE_URL según dónde esté publicado el proyecto
 * (en tu XAMPP local normalmente es http://localhost/intecapp).
 */

if (!defined('BASE_URL')) {
    define('BASE_URL', 'http://localhost/intecapp');
}

// Identidad con la que se envían los correos del sistema.
if (!defined('MAIL_FROM')) {
    define('MAIL_FROM', 'espotify921@gmail.com'); // debe coincidir con SMTP_USER si usas Gmail
}
if (!defined('MAIL_FROM_NAME')) {
    define('MAIL_FROM_NAME', 'INTECAP Quiché - Sistema de Gestión');
}

// Minutos de validez del enlace de recuperación de contraseña.
if (!defined('RECUPERACION_MINUTOS_VALIDEZ')) {
    define('RECUPERACION_MINUTOS_VALIDEZ', 30);
}

/**
 * ── Envío real de correos (SMTP) ─────────────────────────────────────
 * La función mail() nativa de PHP casi nunca funciona en XAMPP/local
 * (no hay servidor de correo instalado en tu máquina), por eso los
 * correos "se pierden" sin avisar de ningún error.
 *
 * Activa SMTP_ENABLED = true y llena estos datos para que los correos
 * se envíen de verdad a través de una cuenta SMTP real (Gmail, tu
 * hosting, etc). Si lo dejas en false, se usa mail() nativa (rara vez
 * funciona en local).
 *
 * Para Gmail:
 *  1. Activa la verificación en dos pasos en la cuenta de Gmail que
 *     vas a usar para enviar.
 *  2. Genera una "contraseña de aplicación" en:
 *     https://myaccount.google.com/apppasswords
 *  3. Usa esa contraseña de 16 caracteres en SMTP_PASS (NO tu
 *     contraseña normal de Gmail).
 */
if (!defined('SMTP_ENABLED')) {
    define('SMTP_ENABLED', true);
}
if (!defined('SMTP_HOST')) {
    define('SMTP_HOST', 'smtp.gmail.com');
}
if (!defined('SMTP_PORT')) {
    define('SMTP_PORT', 587);          // 587 = TLS (recomendado), 465 = SSL
}
if (!defined('SMTP_SECURE')) {
    define('SMTP_SECURE', 'tls');      // 'tls' o 'ssl'
}
if (!defined('SMTP_USER')) {
    define('SMTP_USER', 'espotify921@gmail.com');
}
if (!defined('SMTP_PASS')) {
    define('SMTP_PASS', 'jdfy lalj ulwl lymn'); // contraseña de aplicación de 16 caracteres
}
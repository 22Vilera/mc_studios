<?php
declare(strict_types=1);
ob_start();

// ── Configuración de base de datos ──────────────────────────
define('DB_HOST', getenv('DB_HOST') ?: getenv('MYSQLHOST')     ?: 'localhost');
define('DB_USER', getenv('DB_USER') ?: getenv('MYSQLUSER')     ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: getenv('MYSQLPASSWORD') ?: '');
define('DB_NAME', getenv('DB_NAME') ?: getenv('MYSQLDATABASE') ?: 'mc_studios_db');
define('BASE_URL', 'index.php');

// ── Configuración de correo (Gmail SMTP) ────────────────────
define('MAIL_FROM',     'anibalvilera200531@gmail.com');
define('MAIL_FROM_NAME','Mc Studios, C.A.');
define('MAIL_TO',       'anibalvilera200531@gmail.com');
define('SMTP_USER',     'anibalvilera200531@gmail.com');
define('SMTP_PASS',     getenv('SMTP_PASS') ?: 'oiweugnlqvtjgazv');

// ── Cabeceras de seguridad ──────────────────────────────────
header('X-Frame-Options: DENY');
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: strict-origin-when-cross-origin');

// ── Solo se acepta POST ─────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . BASE_URL);
    exit;
}

// ── Sanitización de entradas ────────────────────────────────
$nombre      = trim(htmlspecialchars(filter_input(INPUT_POST, 'nombre',      FILTER_DEFAULT) ?? '', ENT_QUOTES, 'UTF-8'));
$institucion = trim(htmlspecialchars(filter_input(INPUT_POST, 'institucion', FILTER_DEFAULT) ?? '', ENT_QUOTES, 'UTF-8'));
$correo      = trim(filter_input(INPUT_POST, 'correo', FILTER_SANITIZE_EMAIL) ?? '');
$telefono    = trim(htmlspecialchars(filter_input(INPUT_POST, 'telefono', FILTER_DEFAULT) ?? '', ENT_QUOTES, 'UTF-8'));
$mensaje     = trim(htmlspecialchars(filter_input(INPUT_POST, 'mensaje',  FILTER_DEFAULT) ?? '', ENT_QUOTES, 'UTF-8'));

// ── Validación ──────────────────────────────────────────────
$errors = [];
if (mb_strlen($nombre, 'UTF-8') < 2)            $errors[] = 'nombre';
if (mb_strlen($institucion, 'UTF-8') < 2)        $errors[] = 'institucion';
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) $errors[] = 'correo';

if (!empty($errors)) {
    header('Location: ' . BASE_URL . '?status=error&fields=' . implode(',', $errors) . '#contacto');
    exit;
}

// ── Conexión a la base de datos (opcional) ──────────────────
mysqli_report(MYSQLI_REPORT_OFF);
$conn = @new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$conn->connect_error) {
    $conn->set_charset('utf8mb4');
    $sql  = "INSERT INTO leads_contacto (nombre, institucion, correo, telefono, mensaje) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param('sssss', $nombre, $institucion, $correo, $telefono, $mensaje);
        $stmt->execute();
        $stmt->close();
    }
    $conn->close();
} else {
    error_log('[Mc Studios] DB no disponible: ' . $conn->connect_error);
}

// ── Envío de correo con PHPMailer ───────────────────────────
require_once __DIR__ . '/libs/PHPMailer/Exception.php';
require_once __DIR__ . '/libs/PHPMailer/PHPMailer.php';
require_once __DIR__ . '/libs/PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Configuración SMTP Gmail
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = SMTP_USER;
    $mail->Password   = SMTP_PASS;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
    $mail->CharSet    = 'UTF-8';

    // Remitente y destinatario
    $mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);
    $mail->addAddress(MAIL_TO, 'Mc Studios — Leads');
    $mail->addReplyTo($correo, $nombre);

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = "🚀 Nuevo Lead — {$nombre} | {$institucion}";
    $mail->Body    = "
    <div style='font-family:Inter,Arial,sans-serif;max-width:600px;margin:0 auto;background:#f8faff;border-radius:12px;overflow:hidden;border:1px solid #e0e7ff'>
      <div style='background:#0D1F4C;padding:28px 32px;text-align:center'>
        <h1 style='color:#FF6B00;margin:0;font-size:1.5rem'>Mc Studios, C.A.</h1>
        <p style='color:rgba(255,255,255,0.7);margin:6px 0 0;font-size:0.9rem'>Nuevo lead de marketing — Smith Core</p>
      </div>
      <div style='padding:32px'>
        <table style='width:100%;border-collapse:collapse;font-size:0.9375rem'>
          <tr>
            <td style='padding:10px 0;color:#6B7A99;font-weight:600;width:40%'>Nombre</td>
            <td style='padding:10px 0;color:#0D1B3E;font-weight:700'>{$nombre}</td>
          </tr>
          <tr style='border-top:1px solid #EEF2FF'>
            <td style='padding:10px 0;color:#6B7A99;font-weight:600'>Institución</td>
            <td style='padding:10px 0;color:#0D1B3E'>{$institucion}</td>
          </tr>
          <tr style='border-top:1px solid #EEF2FF'>
            <td style='padding:10px 0;color:#6B7A99;font-weight:600'>Correo</td>
            <td style='padding:10px 0'><a href='mailto:{$correo}' style='color:#FF6B00'>{$correo}</a></td>
          </tr>
          <tr style='border-top:1px solid #EEF2FF'>
            <td style='padding:10px 0;color:#6B7A99;font-weight:600'>Teléfono</td>
            <td style='padding:10px 0;color:#0D1B3E'>" . ($telefono ?: '—') . "</td>
          </tr>
          <tr style='border-top:1px solid #EEF2FF'>
            <td style='padding:10px 0;color:#6B7A99;font-weight:600;vertical-align:top'>Mensaje</td>
            <td style='padding:10px 0;color:#0D1B3E'>" . (nl2br($mensaje) ?: '—') . "</td>
          </tr>
        </table>
        <div style='margin-top:24px;padding:16px;background:#FFF3E8;border-radius:8px;border-left:4px solid #FF6B00'>
          <p style='margin:0;font-size:0.875rem;color:#0D1B3E'>
            <strong>Acción recomendada:</strong> Contactar a este prospecto en menos de 24 horas para maximizar la conversión.
          </p>
        </div>
      </div>
      <div style='background:#EEF2FF;padding:16px 32px;text-align:center'>
        <p style='margin:0;font-size:0.8125rem;color:#6B7A99'>© 2026 Mc Studios, C.A. — San Juan de los Morros, Venezuela</p>
      </div>
    </div>";

    $mail->AltBody = "Nuevo lead: {$nombre} | {$institucion} | {$correo} | {$telefono}\n\nMensaje: {$mensaje}";

    $mail->send();

} catch (Exception $e) {
    // El lead ya se guardó en BD; el fallo de correo no cancela el éxito
    error_log('[Mc Studios] Error al enviar correo: ' . $mail->ErrorInfo);
}

header('Location: ' . BASE_URL . '?status=success#contacto');
exit;

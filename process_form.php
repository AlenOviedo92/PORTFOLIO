<?php

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Obtener los datos del formulario
//     $nombre = htmlspecialchars($_POST['nombre']);
//     $telefono = htmlspecialchars($_POST['telefono']);
//     $email = htmlspecialchars($_POST['email']);
//     $tema = htmlspecialchars($_POST['tema']);
//     $mensaje = htmlspecialchars($_POST['mensaje']);

//     // Validar los campos del formulario (puedes agregar más validaciones según tu necesidad)
//     if (empty($nombre) || empty($telefono) || empty($email) || empty($tema) || empty($mensaje)) {
//         echo "Todos los campos son obligatorios.";
//         exit;
//     }

//     // Enviar un correo electrónico con los datos del formulario
//     $to = "afoviedola@gmail.com";  // Cambia esto por tu dirección de correo
//     $subject = "Nuevo mensaje de contacto: $tema";
//     $body = "Nombre: $nombre\nTeléfono: $telefono\nEmail: $email\nMensaje: $mensaje";
//     $headers = "From: $email";

//     if (mail($to, $subject, $body, $headers)) {
//         echo "Mensaje enviado exitosamente.";
//     } else {
//         echo "Error al enviar el mensaje.";
//     }
// } else {
//     echo "Método de solicitud no válido.";
// }


// Incluir los archivos de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Si usas Composer, necesitarás el autoload
require 'vendor/autoload.php';

// Si instalaste PHPMailer manualmente, necesitarás incluir los archivos manualmente
// require 'path/to/PHPMailer/src/PHPMailer.php';
// require 'path/to/PHPMailer/src/Exception.php';
// require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $email = htmlspecialchars($_POST['email']);
    $tema = htmlspecialchars($_POST['tema']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Validar los campos del formulario
    if (empty($nombre) || empty($telefono) || empty($email) || empty($tema) || empty($mensaje)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    // Configurar PHPMailer
    $mail = new PHPMailer(true); // El parámetro 'true' habilita las excepciones

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';       // Servidor SMTP de Gmail
        $mail->SMTPAuth   = true;                   // Habilitar autenticación SMTP
        $mail->Username   = 'afoviedola@gmail.com'; // Tu dirección de correo Gmail
        $mail->Password   = 'hvav zibd hawa wnhf';  // Tu contraseña de Gmail o contraseña de aplicación (explicación abajo)
        $mail->SMTPSecure = 'tls';                  // Habilitar TLS (puedes usar 'ssl' en su lugar)
        $mail->Port       = 587;                    // Puerto TCP para TLS (587 es estándar para TLS, 465 para SSL)

        // Remitente y destinatarios
        $mail->setFrom($email, $nombre);            // El correo del remitente (lo tomamos del formulario)
        $mail->addAddress('afoviedola@gmail.com');  // Tu dirección de correo, donde recibirás el mensaje

        // Contenido del correo
        $mail->isHTML(true);                        // Usar formato HTML
        $mail->Subject = "Nuevo mensaje de contacto: $tema";
        $mail->Body    = "Nombre: $nombre<br>Teléfono: $telefono<br>Email: $email<br>Mensaje: $mensaje";

        // Enviar el correo
        $mail->send();
        echo "Mensaje enviado exitosamente.";
    } catch (Exception $e) {
        echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
    }
} else {
    echo "Método de solicitud no válido.";
}

?>

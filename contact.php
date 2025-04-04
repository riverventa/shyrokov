<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Параметры SMTP сервера
    $smtpServer = 'smtp.gmail.com';
    $smtpPort = 587;
    $smtpUser = 'riverventa@gmail.com'; // Твой email
    $smtpPass = 'your-app-password';    // Пароль приложения, если 2FA включен
    $fromEmail = 'riverventa@gmail.com';
    $toEmail = 'riverventa@gmail.com'; // Куда отправляем письмо

    // Заголовки письма
    $subject = 'Contact Form Submission';
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: ' . $fromEmail . "\r\n";
    $headers .= 'Reply-To: ' . $email . "\r\n";

    // Составление тела письма
    $body = 'Email: ' . $email . '<br>Message: ' . nl2br($message);

    // Создание соединения с SMTP сервером
    $socket = fsockopen($smtpServer, $smtpPort, $errno, $errstr, 30);

    if (!$socket) {
        echo "Ошибка соединения: $errstr ($errno)";
    } else {
        // Приветствие сервера
        fgets($socket, 512);
        fputs($socket, "EHLO " . $smtpServer . "\r\n");
        fgets($socket, 512);

        // Установка безопасности (STARTTLS)
        fputs($socket, "STARTTLS\r\n");
        fgets($socket, 512);

        // Аутентификация
        fputs($socket, "AUTH LOGIN\r\n");
        fgets($socket, 512);
        fputs($socket, base64_encode($smtpUser) . "\r\n");  // Логин
        fgets($socket, 512);
        fputs($socket, base64_encode($smtpPass) . "\r\n");  // Пароль
        fgets($socket, 512);

        // Отправка письма
        fputs($socket, "MAIL FROM: <$fromEmail>\r\n");
        fgets($socket, 512);
        fputs($socket, "RCPT TO: <$toEmail>\r\n");
        fgets($socket, 512);
        fputs($socket, "DATA\r\n");
        fgets($socket, 512);
        fputs($socket, $headers . "\r\n" . $body . "\r\n.\r\n");
        fgets($socket, 512);

        // Закрытие соединения
        fputs($socket, "QUIT\r\n");
        fgets($socket, 512);

        fclose($socket);

        echo "Message sent successfully!";
    }
}
?>


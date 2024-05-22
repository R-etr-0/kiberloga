<?php

// Включаем отчет об ошибках
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $token = "6703674971:AAHvtgr4qa3nDzPSVeTfPU6o5Rtw0zXiIRI";
    $chat_id = "-4249240111";
    $arr = array(
        'Имя пользователя: ' => $name,
        'Телефон: ' => $phone,
        'Email: ' => $email,
        ' ' => $message,
    );

    $txt = "";
    foreach ($arr as $key => $value) {
        $txt .= "<b>".$key."</b> ".$value."%0A";
    }

    $url = "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}";

    // Проверяем URL
    echo "URL: " . $url . "<br>";

    $sendToTelegram = file_get_contents($url);

    if ($sendToTelegram) {

    } else {
        echo "Error sending message";
    }
} else {
    echo "No POST data received";
}
?>
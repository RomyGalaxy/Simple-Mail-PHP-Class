<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    require_once 'mail.php';
    $message = '
        <p>Текст сообщения</p>
        <a href="https://webinvolga.ru/">Наш сайт</a>
    ';
    $mail = new Mail(array(
        'TO' => 'to@email.ru',
        'FROM' => 'yourmail@email.ru',
        'FROM_NAME' => 'Администратор',
        'SUBJECT' => 'Тема письма',
        'MESSAGE' => $message,
        'HTML_STYLES' => true,
    ));
    $mail->send();
    ?>
</body>
</html>
# Простой класс для отправик почты на PHP

<h3>Инициализация:</h3>

``` php
<?php 
    require_once 'mail.php';
    $message = '
        <p>Текст сообщения</p>
        <a href="https://webinvolga.ru/">Наш сайт</a>
    ';
    $mail = new Mail(array(
        'TO' => 'to@email.ru', // Кому
        'FROM' => 'yourmail@email.ru', // От кого
        'FROM_NAME' => 'Администратор', // Имя отправителя
        'SUBJECT' => 'Тема письма',  // Тема
        'MESSAGE' => $message, // Сообщение
        'HTML_STYLES' => true, // Включить поддержку CSS стилей
    ));
    $mail->send();
?>
```

<h3>Замена стилей письма CSS:</h3>
<p>По умолчанию стили заданы для тела письма и ссылок. Для установки новых стилей испульзуется массив стилей:</p>

``` php
<?php 
    $mail->_styles = array(
        'body' => 'margin: 0 0 0 0; padding: 10px 10px 10px 10px; background: #ffffff; color: #000000; font-size: 14px; font-family: Arial, Helvetica, sans-serif; line-height: 18px;',
        'a' => 'color: #003399; text-decoration: underline; font-size: 14px; font-family: Arial, Helvetica, sans-serif; line-height: 18px;',
        'table' => 'width: 100%; border: 1px solid #000',
        'img' => 'display:block;',
        'p' => 'display:block; padding: 10px 0px 10px 0px; font-size: 16px;',
    );
?>
```

<h3>Смена кодировки письма:</h3>

``` php
<?php 
    $mail->setEncode('windows-1251');
?>
```
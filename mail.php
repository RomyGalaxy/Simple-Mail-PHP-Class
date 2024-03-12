<?php
/**
 * Класс для отправки E-mail писем.
 *
 * @author Romy_Galaxy
 * @website https://webinvolga.ru/
 * @version 1.1
 */
class Mail {
    private string $to;
    private string $from;
    private string $from_name;
    private string $encoding = "utf-8";
    private string $subject;
    private array $params;
    public string $message;
    public string $body;
    private bool $styles;
    public array $_styles;
    public function __construct($params) {
        $this->to = $params['TO'];
        $this->from = $params['FROM'];
        $this->from_name = $params['FROM_NAME'];
        $this->subject = $params['SUBJECT'];
        $this->styles = $params['HTML_STYLES'];
        $this->message = $params['MESSAGE'];
        $this->_styles = array(
            'body' => 'margin: 0 0 0 0; padding: 10px 10px 10px 10px; background: #ffffff; color: #000000; font-size: 14px; font-family: Arial, Helvetica, sans-serif; line-height: 18px;',
            'a' => 'color: #003399; text-decoration: underline; font-size: 14px; font-family: Arial, Helvetica, sans-serif; line-height: 18px;',
        );
    }
    public function setEncode ($encoding) {
        $this->encoding = $encoding;
    }

    public function htmlStyles ($html) {
        if($this->styles === false) return $html;
        $html = str_replace('</head>', '<style></style></head>', $html);
        foreach ($this->_styles as $tag => $style) {
            $styles = $tag . '{' .$style. '}';
            $html = str_replace('</style>', '' . $styles . '</style>', $html);
        }
        return $html;
    }

    public function send() {
        if(empty($this->to) || empty($this->message)) return false;
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=' . $this->encoding . '' . "\r\n";
        $headers .= 'From: ' . $this->from_name . ' <' . $this->from . '>' . "\r\n";
        $this->body = '
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset='.$this->encoding.'" />
			</head>
			<body>
                '.$this->message.'
			</body>
        </html>
        ';
        $this->body = $this->htmlStyles($this->body);
        return mb_send_mail($this->to, $this->subject, $this->body, $headers);
    }
}
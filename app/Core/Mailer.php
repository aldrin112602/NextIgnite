<?php

namespace App\Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    protected $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->setup();
    }

    protected function setup()
    {
        // Server settings
        $this->mail->isSMTP();
        $this->mail->Host = $_ENV['MAIL_HOST'] ?? null;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $_ENV['MAIL_USERNAME'] ?? null;
        $this->mail->Password = $_ENV['MAIL_PASSWORD'] ?? null;
        $this->mail->SMTPSecure = $_ENV['MAIL_ENCRYPTION'] ?? null;
        $this->mail->Port = $_ENV['MAIL_PORT'] ?? null;

        // Sender info
        $this->mail->setFrom($_ENV['MAIL_FROM_ADDRESS'] ?? null, $_ENV['MAIL_FROM_NAME'] ?? null);
    }

    public function sendMail($to, $subject, $body, $altBody = '')
    {
        try {
            // Recipient
            $this->mail->addAddress($to);

            // Content
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;
            $this->mail->AltBody = $altBody;

            $this->mail->send();
            return true;
            
        } catch (Exception $e) {
            return false;
        }
    }
}

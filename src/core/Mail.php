<?php

namespace MyApp\Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Mail
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);

        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'zdacoder@gmail.com';
        $this->mail->Password = 'zxqtddyurmkyvmnf';
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = 587;
        $this->mail->SMTPDebug = SMTP::DEBUG_OFF;
    }

    public function sendMail($fromEmail, $fromName, $message)
    {
        try {
            $this->mail->setFrom('info@bluetravel.com', 'Blue Travel');
            $this->mail->addAddress('zdacoder@gmail.com', 'Admin Blue Travel'); 

            $tanggalPengiriman = date('d F Y');
            $subject = "Laporan Pengguna Website Blue Travel - Form Contact Us";
            $formatedMessage = str_replace("\n", "<br>", $message);
            $emailBody = "
            <p style='font-size: 16px; font-weight: medium; font-style: italic;'>Pada tanggal {$tanggalPengiriman}</p>
            <img src=\"https://drive.google.com/drive-viewer/AKGpihbOZnDHZOPu3g7uzrK1imm1KmHQ6PTdyDp53BPQ0Uk7o4nIxj40A2nPDNMKi2zO6lDfCoN11_xQHQanYotzL9RBnmtrfT-lvz8=s2560\" alt='Blue Travel Logo' style='width: 145px; height: auto;'>
            <p style='font-size: 16px; font-weight: medium;'>Kepada Tim Support Blue Travel,</p>
            <p style='font-size: 16px; font-weight: medium;'>Saya, {$fromName}, dengan email {$fromEmail} ingin mengirimkan pesan berikut:</p>
            <p style='font-size: 16px; font-weight: medium;'>{$formatedMessage}</p>
            <p style='font-size: 16px; font-weight: medium;'>Hormat saya,<br>{$fromName}</p>
        ";

            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $emailBody;

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
            return false;
        }
    }

}

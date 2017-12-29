<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Email
 *
 * @author thanh
 */

use PHPMailer\PHPMailer\PHPMailer;
use Dompdf\Dompdf;
use Dompdf\Options;
require("../lib/PHPMailer/src/PHPMailer.php");
require("../lib/PHPMailer/src/Exception.php");
require("../lib/PHPMailer/src/SMTP.php");
require("../lib/dompdf/autoload.inc.php");

class Email {
    private $mail;
    public function __construct($senderEmail, $senderName, $recipentEmail, $recipentName, $body, $subject = null, $pdf = null) {
        //Instantiate a mail object
        $this->mail = new PHPMailer(true);

        //Set server settings
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.googlemail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'wilsonjill870@gmail.com';
        $this->mail->Password = '21121998';
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Port = 587;
        $this->mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                'allow_self_signed' => TRUE
            )
        );
        
        //Set recipients information
        $this->mail->setFrom($senderEmail, $senderName);
        $this->mail->addAddress($recipentEmail, $recipentName);

        //Prepare email body
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;

        if ($pdf != null) {
            //Prepare PDF attachment
            //Set DOMPDF settings
            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $dompdf = new Dompdf($options); //Instantiate a DOMPDF object
            $contxt = stream_context_create(array( 
                'ssl' => array( 
                    'verify_peer' => FALSE, 
                    'verify_peer_name' => FALSE,
                    'allow_self_signed'=> TRUE
                ) 
            ));
            $dompdf->setHttpContext($contxt);

            //Create PDF attachment
            $dompdf->loadHtml($pdf);
            $dompdf->render();
            $output = $dompdf->output();
            file_put_contents("../resources/tmp/ticket.pdf", $output);

            //Attach PDF file to email
            $this->mail->addAttachment("../resources/tmp/ticket.pdf");
        }
    }
    
    public function Send() {
        try {
            //Send email
            $this->mail->send();
            
            //Delete temp ticket file if exists
            if (file_exists("../resources/tmp/ticket.pdf")) {
                unlink("../resources/tmp/ticket.pdf");
            }
            
        } catch (Exception $e) {
            echo("Message could not be sent.");
            echo("Mailer Error: " . $this->mail->ErrorInfo);
        }
    }
}

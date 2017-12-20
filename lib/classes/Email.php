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
    public function __construct($fullName, $email, $password, $ticketId, $url, $campingSpot) {
        try {
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
            $this->mail->setFrom('wilsonjill870@gmail.com', 'Sportify Team');
            $this->mail->addAddress($email, $fullName);

            //Prepare email body
            $this->mail->isHTML(true);
            $this->mail->Subject = 'E-ticket';
            $body = str_replace(array("%fullName%", "%email%" , "%password%", "%ticketId%", "%url%", "%campingSpot%"), array($fullName, $email, $password, $ticketId, $url, $campingSpot), file_get_contents("../lib/templates/email.inc.html"));
            $this->mail->Body = $body;

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
            $content = str_replace(array("%fullName%", "%email%" , "%password%", "%ticketId%", "%url%", "%campingSpot%"), array($fullName, $email, $password, $ticketId, $url, $campingSpot), file_get_contents("../lib/templates/ticket.inc.html"));
            $dompdf->loadHtml($content);
            $dompdf->render();
            $output = $dompdf->output();
            file_put_contents("../resources/tmp/ticket.pdf", $output);

            //Attach PDF file to email
            $this->mail->addAttachment("../resources/tmp/ticket.pdf");

            //Send email
            $this->mail->send();
            
            //Delete temp file
            unlink("../resources/tmp/ticket.pdf");
            
        } catch (Exception $e) {
            echo 'Message could not be sent. ';
            echo 'Mailer Error: ' . $this->mail->ErrorInfo;
        }
    }
}

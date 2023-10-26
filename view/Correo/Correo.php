<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

include("../../model/realizarModel.php");
$user = new realizarModel();

$id=$_REQUEST['id'];
$Medico=$_REQUEST['medico'];


$Lista = $user->EnviarMedico($id,$Medico);
foreach($Lista as $usuario){
$Enviar=$usuario['contacto'];
$id=$usuario['id'];
$paciente=$usuario['nombre'];

}
$mail = new PHPMailer(true);

try {
    //Servidor de donde se envian los correos
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Configure el servidor SMTP para enviar a través de
    $mail->SMTPAuth   = true;                                   //Habilitar la autenticación SMTP
    $mail->Username   = 'wrodas2530@gmail.com';                     //nombre de usuario SMTP
    $mail->Password   = 'qilu glll mjvt rckq';                               //contraseña SMTP
    $mail->SMTPSecure = 'ssl';    //tls  sinotiene el candado de seguridad verde      //Habilitar el cifrado TLS implícito
    $mail->Port       = 465;                                    //Puerto TCP al que conectarse; use 587 si ha configurado `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Destinatarios
    $mail->setFrom('wrodas2530@gmail.com', 'Laboratorio240'); //nombre y correo de quien lo envia
    $mail->addAddress($Enviar);     //Correo al que se enviara


    $mail->addAttachment('../../view/fpdf/pdf/'.$id.'.pdf');         //Add attachments

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $paciente;
    $mail->Body    = 'Buenos días la presente es para hacerle entrega de los resultados del examen del paciente <b>'.$paciente.'</b> Realisados en el laboratorio240';
   

    $mail->send();
    echo 'el mensaje ha sido enviado';
} catch (Exception $e) {
    echo "No se pudo enviar el mensaje. Error de envío: {$mail->ErrorInfo}";
    echo"Por favor verifique que el examen ya ha sido aprobado";
}


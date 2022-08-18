<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function enviarEmail($email,$nome){

$agora = date('d/m/Y H:i');
$primeiroNome = explode(" ", $nome);
//$uploaddir = 'uploads/';
//$uploadfile = $uploaddir . basename($_FILES['anexo']['name']);

/*if (move_uploaded_file($_FILES['anexo']['tmp_name'], $uploadfile)) {
    echo "Arquivo válido e enviado com sucesso.\n";
} else {
    echo "Possível ataque de upload de arquivo!\n";
}*/
$mail = new PHPMailer();

$mail->IsSMTP();

$mail->CharSet = "UTF-8";
//$mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true;  // authentication enabled
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // secure transfer enabled REQUIRED for GMail
$mail->SMTPAutoTLS = false;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;

$mail->Username = "iforum090@gmail.com";
$mail->Password = "ynhyuapirkwqzzbs";
$mail->SetFrom('iforum090@gmail.com','Equipe IFórum');
$mail->addAddress($email, $primeiroNome[0]);     //Add a recipient
$mail->addReplyTo('iforum90@gmail.com', 'Equipe IFórum');
//$mail->addAttachment($uploadfile);

$mail->Subject = "Confirme seu Email, ".$primeiroNome[0].'!';
//$link = "http://localhost/oficio-oficial/functions/confirma_email.php?h=".$tokenEmp;
$mail->isHTML(true);
$mail->msgHTML('
<h2>Olá, '.$primeiroNome[0].'</h2>
<br>
<h3>Verificamos diversas tentativas de login na sua conta conosco sem sucesso.</h3>
<br>
<h3>Isso ocorreu em '.$agora.' com o endereço IP '.get_client_ip().'.</h3>
<br>
<br>
<h4>Atenciosamente,</h4>
<h5>Equipe Ifórum<h5>

');

$mail->send();
}





?>
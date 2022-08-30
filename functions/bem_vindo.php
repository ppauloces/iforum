<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function bemVindo($email,$nome){

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

$mail->Subject = "Bem-vindo, ".$primeiroNome[0].'!';
//$link = "http://localhost/oficio-oficial/functions/confirma_email.php?h=".$tokenEmp;
$mail->isHTML(true);
$mail->msgHTML('
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <title></title>
    <!--[if (mso 16)]>
    <style type="text/css">
    a {text-decoration: none;}
    </style>
    <![endif]-->
    <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
    <!--[if gte mso 9]>
<xml>
    <o:OfficeDocumentSettings>
    <o:AllowPNG></o:AllowPNG>
    <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
</xml>
<![endif]-->
</head>

<body>
    <div class="es-wrapper-color">
        <!--[if gte mso 9]>
            <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
                <v:fill type="tile" color="#f8f9fd"></v:fill>
            </v:background>
        <![endif]-->
        <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td class="esd-email-paddings" valign="top">
                        <table cellpadding="0" cellspacing="0" class="esd-header-popover es-header" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center">
                                        <table bgcolor="rgba(0, 0, 0, 0)" class="es-header-body" align="center" cellpadding="0" cellspacing="0" width="600">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p10t es-p15b es-p30r es-p30l" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="540" class="esd-container-frame" align="center" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-image" style="font-size: 0px;"><a target="_blank"><img src="https://portal.ifba.edu.br/dgcom/documentos-e-manuais-arquivos/manuais/ifba_marca_vertical-01.png/@@download/file/IFBA_MARCA_vertical-01.png" alt style="display: block;" width="130"></a></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="es-content" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center" bgcolor="#f8f9fd" style="background-color: #f8f9fd;">
                                        <table bgcolor="transparent" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600" style="background-color: transparent;">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p20t es-p10b es-p20r es-p20l" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="560" class="esd-container-frame" align="center" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p10t es-p10b esd-block-image">
                                                                                        <p>Sua opinião vale muito,'.$primeiroNome[0].'!</p><a target="_blank"><img src="https://images.emojiterra.com/twitter/v13.1/512px/1f49a.png" alt style="display: block;" width="30"></a>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="esd-structure es-p15t es-m-p15t es-m-p0b es-m-p0r es-m-p0l" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="600" class="esd-container-frame" align="center" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-image" style="font-size: 0px;"><a target="_blank"><img class="adapt-img" src="https://hpy.stripocdn.email/content/guids/CABINET_1ce849b9d6fc2f13978e163ad3c663df/images/3991592481152831.png" alt style="display: block;" width="600"></a></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="esd-footer-popover es-footer" align="center" style="background-position: center center;">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center" bgcolor="#1E1E1E" style="background-color: #1e1e1e;">
                                        <table bgcolor="rgba(0, 0, 0, 0)" class="es-footer-body" align="center" cellpadding="0" cellspacing="0" width="600">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p40t es-p40b es-m-p40t es-m-p40b es-m-p20r es-m-p20l" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="600" class="esd-container-frame" align="center" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#f0f3fe" style="background-color: #f0f3fe; border-radius: 20px; border-collapse: separate;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="left" class="esd-block-text es-p25t es-p10b es-p20r es-p20l">
                                                                                        <h1 style="text-align: center; line-height: 150%;">IFórum é muito mais do que um trabalho, é uma plataforma social.</h1>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-button es-p10t es-p25b es-p20r es-p20l es-m-p15t es-m-p20b es-m-p20r es-m-p20l"><span class="es-button-border es-button-border-1661211127093" style="background: #c90c0f;"><a href="https://my.stripo.email/cabinet/" class="es-button es-button-1625642484812" target="_blank" style="border-width: 10px 20px; background: #c90c0f; border-color: #c90c0f;">FAÇA LOGIN
                                                                                            <img src="https://hpy.stripocdn.email/content/guids/CABINET_1ce849b9d6fc2f13978e163ad3c663df/images/32371592816290258.png" alt="icon" width="16" class="esd-icon-right" align="absmiddle" style="margin-left:10px;">
                                                                                                <!--<![endif]-->
                                                                                                <esd-config-block value="{&quot;configClass&quot;:&quot;es-button-1625642484812&quot;,&quot;rule&quot;:&quot;[data-ogsb] .es-button.es-button-1625642484812&quot;,&quot;properties&quot;:{&quot;padding&quot;:&quot;10px 20px !important&quot;}}" name="btnIndentSettingsControl" style="display: none;"></esd-config-block>
                                                                                            </a></span>
                                                                                        <esd-config-block value="{&quot;configClass&quot;:&quot;es-button-1625642484812&quot;,&quot;rule&quot;:&quot;td .es-button-border:hover a.es-button-1625642484812&quot;,&quot;properties&quot;:{&quot;background&quot;:&quot;#f1171b !important&quot;,&quot;border-color&quot;:&quot;#f1171b !important&quot;}}" name="hoverColorButtonSettingsControl" style="display: none;"></esd-config-block>
                                                                                        <esd-config-block value="{&quot;configClass&quot;:&quot;es-button-border-1661211127093&quot;,&quot;rule&quot;:&quot;td .es-button-border-1661211127093:hover&quot;,&quot;properties&quot;:{&quot;background&quot;:&quot;#f1171b !important&quot;}}" name="btnHoverOutlineStyleSettingsControl" style="display: none;"></esd-config-block>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
');

$mail->send();
}





?>
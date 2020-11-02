<?php 

$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$description = $_POST['descr'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'alicegerasimchuk23@gmail.com';                 // Наш логин
$mail->Password = 'AliceintheWonderland';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('AliceGerasimchuk23@gmail.com', 'Website EKO 3D KT');   // От кого письмо 
$mail->addAddress('irina.anikeeva401@gmail.com');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Запит на обстеження';
$mail->Body    = '
		Клієнт залишив запит на обстеження <br> 
	ПІБ: ' . $name . ' <br>
	Номер телефону: ' . $phone . '<br>
	Адреса відділення: ' . $address . ' <br>
	Додаткова інформація, яку залишив клієнт: ' . $description . '';

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>
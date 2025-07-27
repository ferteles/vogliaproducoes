<?
require("class.phpmailer.php");


	//form validation vars
	$formok = true;
	$errors = array();
	
	//sumbission data
	$ipaddress = $_SERVER['REMOTE_ADDR'];
	$date = date('d/m/Y');
	$time = date('H:i:s');
	
	//form data
	$name = $_POST['name'];	
	$email = $_POST['mail'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];


$mail = new PHPMailer();

$mail->IsSMTP();                                 		 // send via SMTP
$mail->Host     = "smtp.vogliaproducoes.com.br"; 		// SMTP server
$mail->SMTPAuth = true;    								 // turn on SMTP authentication
$mail->Username = "contato@vogliaproducoes.com.br"; 	// SMTP username
$mail->Password = "password";							 // SMTP password

$mail->From     = "no-reply@domain.com";				 // SMTP username
$mail->AddAddress("contato@vogliaproducoes.com.br");	 // Your Adress
$mail->Subject  =  "[Voglia Produções]";
$mail->IsHTML(true);
$mail->CharSet = 'UTF-8';
$mail->Body     =  "<p>Novo email do site Voglia Produções</p>
					  <p><strong>Nome: </strong> {$name} </p>
					  <p><strong>Email Address: </strong> {$email} </p>
					  <p><strong>Assunto: </strong> {$subject} </p>
					  <p><strong>Mensagem: </strong> {$message} </p>
					  <p>IP de origem: {$ipaddress} on {$date} at {$time}</p>";

if(!$mail->Send())
{
   echo "A mensagem não pode ser enviada <p>";
   echo "Erro: " . $mail->ErrorInfo;
   exit;
}

echo "Mensagem enviada!";


?>

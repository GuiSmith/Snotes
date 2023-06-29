<?php

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';

	function sendEmail($email, $passcode){

		$name = "Smith's Tales";
		$subject = "Smith's Tales - Alterar senha";
		$content = "<div><h2>Alteração de senha</h2><p><p>Prezado(a) [Nome do usuário],<br>Recebemos uma solicitação de alteração de senha para a sua conta. Para prosseguir com a alteração, clique no link abaixo:</p><p><a href='localhost/php/main/main.php?passcode=" . $passcode . "'>Clique aqui</a>. Código:  " . $passcode . "</p><p>Se você não solicitou essa alteração ou acredita que isso tenha sido um engano, por favor, desconsidere este e-mail.</p><p>Lembre-se de que é importante manter sua senha segura e evitar compartilhá-la com terceiros. Se você tiver alguma dúvida ou precisar de assistência adicional, não hesite em entrar em contato conosco.</p><p>Atenciosamente,<br>[Seu nome ou nome da equipe de suporte]<br>[Seu endereço de e-mail de contato]</p></p></div>";

		$mail = new PHPMailer(true);
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'guilhermessmith2014@gmail.com';
		$mail->Password = 'juhzwxsfszqilmgm';
		$mail->Port = 465;
		$mail->SMTPSecure = 'ssl';
		$mail->isHTML (true);
		$mail->setFrom($email, $name);
		$mail->addAddress($email);
		$mail->Subject = ("$subject");
		$mail->Body = $content;
		$mail->send();

		echo "Sent";

	}

?>
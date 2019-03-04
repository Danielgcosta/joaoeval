<?php
header('Content-Type: text/html; charset=UTF-8');
$field_nome = $_POST['nome'];
$field_telefone = $_POST['telefone'];
$field_email = $_POST['email'];
$field_mensagem = $_POST['mensagem'];

$mail_to = 'joaoevalpedidos@gmail.com';
$subject = 'Sugestao enviada pelo site'.$field_name;

$body_message = 'De: '.$field_nome."\n";
$body_message .= 'Telefone: '.$field_telefone."\n";
$body_message .= 'E-mail: '.$field_email."\n";
$body_message .= 'Mensagem: '.$field_mensagem;

$headers = 'From: '.$field_email."\r\n";
$headers .= 'Reply-To: '.$field_email."\r\n";

$mail_status = mail($mail_to, $subject, $body_message, $headers);

if ($mail_status) { ?>
	<script language="javascript" type="text/javascript">
		alert('Mensagem enviada com sucesso.\nObrigado pela sua opiniao e ate a proxima!');
		window.location = 'index.html';
	</script>
<?php
}
else { ?>
	<script language="javascript" type="text/javascript">
		alert('Falha ao enviar. Favor entrar em contato com JoaoeValPedidos@gmail.com');
		window.location = 'index.html';
	</script>
<?php
}
?>
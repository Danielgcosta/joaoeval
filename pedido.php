<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

header('Content-Type: text/html; charset=UTF-8');
$field_nome = $_POST['nome'];
$field_telefone = $_POST['telefone'];
$field_email = $_POST['email'];
$field_endereco = $_POST['endereco'];
$field_andar = $_POST['andar'];
$field_sala = $_POST['sala'];
$field_sector = $_POST['setor'];
$field_tamanhosalada = $_POST['tamanho_salada'];
$field_leg = $_POST['leg'];
$field_saleg = $_POST['saleg'];
$field_feijao = $_POST['feijao'];
$field_arrozComum = $_POST['arrozComum'];
$field_pedido = $_POST['pedido'];
$field_cardapio = $_POST['cardapio'];


$mail_to = 'joaoevalpedidos@gmail.com';
$subject = 'Pedido realizado pelo site'.$field_name;

$body_message = ''.$field_nome.", ";
$body_message .= ''.$field_telefone.", ";
$body_message .= ''.$field_email."\n";
$body_message .= ''.$field_endereco."";
$body_message .= ' / '.$field_andar."";
$body_message .= ' / '.$field_sala."";
$body_message .= ' / '.$field_sector."\n";
$body_message .= ''.$field_tamanhosalada." ";
$body_message .= ''.$field_leg." ";
$body_message .= ''.$field_saleg." ";
$body_message .= ''.$field_feijao." ";
$body_message .= ''.$field_arrozComum."\n";
$body_message .= 'Pedido:'."\n".$field_pedido."\n";
$body_message .= ''.$field_cardapio."\n";

$header = "From: naoresponda@joaoeval.com.br\r\n"; 
$header.= "MIME-Version: 1.0\r\n"; 
$header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
$header.= "X-Priority: 1\r\n"; 
$header.= 'Reply-To: '.$field_email."\r\n";

$mail_status = mail($mail_to, $subject, $body_message, $header);

if ($mail_status) { ?>
	<script language="javascript" type="text/javascript" charset="utf-8">
		alert(unescape('Pedido realizado com sucesso.\nAguarde confirmacao por e-mail.\nAproveite para dar uma olhada no nosso cardapio!'));
		window.location = 'cardapio.html';
	</script>
<?php
}
else { ?>
	<script language="javascript" type="text/javascript" charset="utf-8">
		alert(unescape('Falha ao enviar. Favor entrar em contato com JoaoeValPedidos@gmail.com'));
		window.location = 'cardapio.html';
	</script>
<?php
}
?>
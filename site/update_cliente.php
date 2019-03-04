<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML><HEAD><TITLE></TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></HEAD>

<style type="text/css">
<!--
A {
	COLOR: #000099; FONT-FAMILY: verdana; TEXT-DECORATION: none; FONT-WEIGHT: bold
}
A:hover {
	COLOR: #ff3300
}
input { 
font: 10px verdana, arial, helvetica, sans-serif;
}
.titulos {
filter:shadow(color=000000,direction=120);
height:5px;
font-family:verdana, arial, helvetica, sans-serif;
font-size:12px;
color:#ffff00;
}
table { 
font: 10px verdana, arial, helvetica, sans-serif;
color:#000000;
}
-->
</style> 

<body bgcolor="#000000">
<p align="center"> 
</p>
<p>&nbsp;</p>
<?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$dados=$_POST; 

list($nome, $local, $andar, $sala, $telefone, $tipo_salada, $quantidade, $quant_salada, $observacoes, $soja, $visa_vale, $horario)=array_values($dados);

$query="UPDATE tabela_clientes SET nome='$nome', local='$local', andar='$andar', sala='$sala', telefone='$telefone', tipo_salada='$tipo_salada', quantidade='$quantidade', quant_salada='$quant_salada',observacoes='$observacoes', soja='$soja', visa_vale='$visa_vale', horario='$horario' WHERE nome LIKE '$nome'";
		
mysql_query($query, $conn);

if (mysql_affected_rows($conn)==1) {
	include "edicao_ok.php";
	/*echo "Cliente atualizado com sucesso.";*/
	} else {
	include "edicao_erro.php";
	/*echo "Erro : Dados não atualizados!";*/
	die;
}
mysql_close($conn);
?>
</BODY>
</HTML>
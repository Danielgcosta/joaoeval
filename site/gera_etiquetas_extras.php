<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<style type="text/css">
<!--
table { 
background-color: #dfeff;
border:1;
font: 11px verdana, arial, helvetica, sans-serif;
color:#000000;
}
.titulos {
filter:shadow(color=000000,direction=120);
height:5px;
font-family:verdana, arial, helvetica, sans-serif;
font-size:12px;
color:#ffff00;
}
input { 
font: 11px verdana, arial, helvetica, sans-serif;
}
-->
</style>
<body>
<?
$dados=$_POST["data_entrada"];
$data_etiquetas=$dados;
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

/*deleta tabela_etq_extras (se existir) de um processamento anterior */
$deleta_tabela_etq_extras = "DROP TABLE tabela_etq_extras";
mysql_query($deleta_tabela_etq_extras, $conn);

/* Cria tabela temporária */
$cria_tabela=mysql_query("CREATE TABLE `tabela_etq_extras` (
`data_pedido` VARCHAR ( 10 ) NOT NULL ,
`Id` INT( 11 ) NOT NULL ,
`nome` VARCHAR( 255 ) NOT NULL ,
`local` VARCHAR( 20 ) NOT NULL ,
`andar` INT( 2 ) NOT NULL ,
`sala` INT ( 11 ) NOT NULL ,
`telefone` VARCHAR( 11 ) NOT NULL ,
`tipo_salada` VARCHAR( 11 ) NOT NULL ,
`quantidade` INT( 11 ) NOT NULL ,
`quant_salada` INT( 2 ) NOT NULL ,
`observacoes` VARCHAR( 255 ) DEFAULT NULL,
`soja` VARCHAR( 255 ) NOT NULL ,
`visa_vale` VARCHAR( 255 ) NOT NULL ,
`horario` VARCHAR( 255 ) NOT NULL ,
`preco_refeicao` FLOAT ( 4,2 ) NOT NULL ,
`preco_vale` FLOAT ( 4,2 ) NOT NULL ,
`valor_ref` FLOAT ( 8,2 ) NOT NULL ,
`valor_visa_vale` FLOAT ( 8,2 ) NOT NULL ,
`situacao` VARCHAR ( 8 ) NOT NULL)");

$copia=mysql_query("INSERT INTO `cadastro_clientes`.`tabela_etq_extras` SELECT * FROM `cadastro_clientes`.`tabela_pedidos`");
mysql_query($copia, $conn);

$deleta=mysql_query("DELETE FROM tabela_etq_extras WHERE quantidade LIKE '1'");
mysql_query($deleta, $conn);

$deleta=mysql_query("DELETE FROM tabela_etq_extras WHERE data_pedido != '$dados'");
mysql_query($deleta, $conn);

$resultado=mysql_query("SELECT * FROM tabela_etq_extras");
mysql_query($resultado, $conn);
$total=mysql_num_rows($resultado);

echo "<table width=710 border=1 cellspacing=5 cellpadding=11>";
$colunas = "3";
if ($total>0) { 
	for ($i = 0; $i<$total; $i++) { 
		$dados = mysql_fetch_array($resultado);
		$quantidade = $dados["quantidade"];
		$quant_etq=$quantidade-1;
		$nome = $dados["nome"];
		$andar = $dados["andar"];
		$sala = $dados["sala"];
		$tipo_salada = $dados["tipo_salada"];
		$observacoes = $dados["observacoes"];
		$quantidade = $dados["quantidade"];
		$soja = $dados["soja"];
		while ($quant_etq>0)	{
			$quant_etq-=1;
			echo "<td width=300><font face=Arial size=2><b>$nome</b><br>Andar : $andar<br>Sala : 	$sala<br>Salada : $tipo_salada<br>$observacoes<br>Soja : $soja</font></td>";
			if (($quant_etq%$colunas)==0) { 
				echo "</tr>"; 
				echo "<tr>"; 
			} 
		}
	}  
} else {
	include "./etiquetas_extras_erro.php";
	die;
}

echo "<table width=100% align=center border=0>";
echo "  <tr>"; 
echo "    <td width=50% align=right><form name=form1><input type=button value=Imprimir  Onclick=window.print()></form></td>";
echo "    <td width=50% align=left><form name=form2 method=get action=consulta_etiquetas_extras_existentes.php><input type=submit value=Fechar></form></td>";
echo "	</tr>";
echo "</table>";
?>
</body>
</html>
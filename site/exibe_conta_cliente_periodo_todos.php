<STYLE type="text/css">
table { 
font: 10px verdana, arial, helvetica, sans-serif;
color:#000000;
}
input { 
font: 10px verdana, arial, helvetica, sans-serif;
color:#000000;
}
.titulos {
filter:shadow(color=000000,direction=120);
height:5px;
font-family:verdana, arial, helvetica, sans-serif;
font-size:12px;
color:#ffff00;
}
select { 
font: 10px verdana, arial, helvetica, sans-serif;
color:#000000;
}
</STYLE>
<title></title>
<body bgcolor="#FFFFFF">
<?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);
$res = mysql_query("SELECT * FROM tabela_temp ORDER BY nome");
while ($row=mysql_fetch_array($res) ) {
	$nome=$row["nome"];
$dados=$_POST;
list($data_entrada1, $data_entrada2)=array_values($dados);

$data_inicio = substr($data_entrada1,6,4) . "-" .substr($data_entrada1,3,2) . "-" . substr($data_entrada1,0,2);
$data_fim = substr($data_entrada2,6,4) . "-" .substr($data_entrada2,3,2) . "-" . substr($data_entrada2,0,2);

$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

/*deleta tabela_temp2 (se existir) de um processamento anterior */
$deleta_tabela_temp2 = "DROP TABLE tabela_temp2";
mysql_query($deleta_tabela_temp2, $conn);

/*deleta tabela_temp3 (se existir) de um processamento anterior */
$deleta_tabela_temp3 = "DROP TABLE tabela_temp3";
mysql_query($deleta_tabela_temp3, $conn);

/* Cria tabela temporária (tabela_temp2) */
$cria_tabela=mysql_query("CREATE TABLE `tabela_temp2` (
`data_pedido` VARCHAR ( 10 ) NOT NULL ,
`id` INT( 11 ) NOT NULL ,
`nome` VARCHAR( 255 ) NOT NULL ,
`local` VARCHAR( 20 ) NOT NULL ,
`andar` INT( 2 ) NOT NULL ,
`sala` INT( 11 ) NOT NULL ,
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

$copia=mysql_query("INSERT INTO `cadastro_clientes`.`tabela_temp2` SELECT * FROM `cadastro_clientes`.`tabela_pedidos`");
mysql_query($copia, $conn);

/* Cria tabela temporária (tabela_temp3) */
$cria_tabela=mysql_query("CREATE TABLE `tabela_temp3` (
`data_pedido` VARCHAR ( 10 ) NOT NULL ,
`id` INT( 11 ) NOT NULL ,
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

$copia=mysql_query("INSERT INTO `cadastro_clientes`.`tabela_temp3` SELECT * FROM `cadastro_clientes`.`tabela_temp2`");
mysql_query($copia, $conn);


	$resultado=mysql_query("SELECT * FROM tabela_temp2");
	while ($row=mysql_fetch_array($resultado) ) {
		$guarda_data_pedido=$row["data_pedido"];
		$guarda_nome=$nome;
		$formata_data_pedido=substr($row["data_pedido"],6,4) . "-" .substr($row["data_pedido"],3,2) . "-" . substr($row["data_pedido"],0,2);
		$insere_data_pedido="UPDATE tabela_temp3 SET data_pedido='$formata_data_pedido' WHERE data_pedido='$guarda_data_pedido'";
		mysql_query($insere_data_pedido, $conn);
		$insere_nome="UPDATE tabela_temp3 SET nome='$guarda_nome' WHERE nome='$guarda_nome' AND  data_pedido='$guarda_data_pedido'";
		mysql_query($insere_nome, $conn);
	}
	$query="SELECT * FROM tabela_temp3 WHERE nome LIKE '$guarda_nome' AND data_pedido BETWEEN '$data_inicio' AND '$data_fim' ORDER BY data_pedido";
	$result=mysql_query($query, $conn);
	$total_clientes=mysql_num_rows($result);

	$tipo_pagto_resultante=mysql_query("SELECT preco_visa_vale FROM tabela_preco_visa_vale");
	mysql_query($tipo_pagto_resultante, $conn);
	echo "<table width=100% border=0 align=center bgcolor=#CCCCCC>";
	echo "<tr>"; 
	echo "<td align=center><img src='jv_logo.jpg' width='150' height='126'></td>";
	echo "</tr>";
    echo "<tr>"; 
    echo "<td class=titulos><div align=center><strong><font size=7><strong><font color=#00CC99 size=5></font></strong></font>";
    echo "<br><font color=#FFFFFF size=4 face=Verdana>Conta do Cliente por Período : $data_entrada1 a $data_entrada2</font><br></strong></div></td>";
    echo "</tr>";
	echo "<tr>"; 
    echo "<td>&nbsp;</td>";
    echo "</tr>";
    echo "<tr>"; 
    echo "<td align=center class=titulos><font face=Verdana size=4 color=#ffffff>Cliente : $guarda_nome</font></td>";
    echo "</tr>";
	echo "<tr>"; 
    echo "<td>&nbsp;</td>";
    echo "</tr>";
    echo "</table>";
	$valor_refeicao=0;
	$valor_visa_vale=0;
	$valor_total=0;
	echo "<table width=100% border=1 bgcolor=#cccccc cellspacing=0 cellpadding=5>";
	echo "<tr>"; 
	echo "<td align=center><b>Data Pedido</b></td>";
	echo "<td align=center><b>Quant</b></td>";
	echo "<td align=center><b>Tipo Salada</b></td>";
	echo "<td align=center><b>Observações/Predileções</b></td>";
	echo "<td align=center><b>Visa Vale</b></td>";
	echo "<td align=center><b>Valor (R$)</b></td>";
	echo "<td align=center><b>Situação</b></td>";
	echo "</tr>";
	while ($row=mysql_fetch_array($result) ) { 
		$valor_refeicao+=$row["valor_ref"];
    	$valor_visa_vale+=$row["valor_visa_vale"];	
		$acerta_data  = substr($row["data_pedido"],8,2) . "/" .substr($row["data_pedido"],5,2) . "/" . substr($row["data_pedido"],0,4);   
    	echo "<tr>"; 
		echo "<td align=center>$acerta_data</td>";
		echo "<td align=center>".$row["quantidade"];"></td>";
		echo "<td align=center>".$row["tipo_salada"];"</td>";
		echo "<td align=left>".$row["observacoes"];"</td>";
		echo "<td align=center>".$row["visa_vale"];"</td>"; ?>
		<td align="center">
		<? $valor_pago_ref=$row["valor_ref"];
	   	$valor_pago_vale=$row["valor_visa_vale"];
	   	if ($valor_pago_ref==0.00)	{
			  $valor_pago_final=$valor_pago_vale;
		  	} else {
	      	$valor_pago_final=$valor_pago_ref;
	    }
	    echo number_format($valor_pago_final, "2", ",", "."); ?></td>
		<? echo "<td align=center>".$row["situacao"];"</td>";
		echo "</tr>";
		$situacao=$row["situacao"];
		if ($situacao=='Pago')	{
			$valor_refeicao-=$row["valor_ref"];
			$valor_visa_vale-=$row["valor_visa_vale"];
		}	
	}	
	echo "</table>";
	$valor_total=$valor_refeicao+$valor_visa_vale;
	/*mysql_close($conn);*/
	$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
	if (!$conn) die("Não foi possivel conectar"); 
	mysql_select_db("u581370309_dados", $conn);
	$query="SELECT nome FROM tabela_temp2 WHERE data_pedido BETWEEN '$data_inicio' AND '$data_fim'";
	$resultado=mysql_query($query, $conn);
	while ($row=mysql_fetch_array($resultado) ) { 
		$valor_normal=$row["preco_refeicao"];
	}
	/*mysql_close($conn);*/
	$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
	if (!$conn) die("Não foi possivel conectar"); 
	mysql_select_db("u581370309_dados", $conn);
	$query="SELECT nome FROM tabela_temp2 WHERE data_pedido BETWEEN '$data_inicio' AND '$data_fim'";
	$resultado=mysql_query($query, $conn);
	while ($row=mysql_fetch_array($resultado) ) { 
		$valor_vale=$row["preco_vale"];
	}
	/*mysql_close($conn);*/
echo "<br>";
echo "<hr align=center>";

$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);
/*deleta tabela_temp2*/
$deleta_tabela_temp2 = "DROP TABLE tabela_temp2";
mysql_query($deleta_tabela_temp2, $conn);

/*deleta tabela_temp3*/
$deleta_tabela_temp3 = "DROP TABLE tabela_temp3";
mysql_query($deleta_tabela_temp3, $conn);
?>
<table width="95%" border="0" align="left">
  <tr> 
    <td width="17%">TOTAL DE PEDIDOS :</td>
    <td width="5%"><div align="right"><? echo $total_clientes; ?></div></td>
    <td width="7%">&nbsp;</td>
    <td width="6%">&nbsp;</td>
    <td width="5%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
    <td width="5%">&nbsp;</td>
    <td width="4%">&nbsp;</td>
    <td width="32%">TOTAL REFEIçãO NORMAL (R$) : </td>
    <td width="16%"><div align="right"><? echo number_format($valor_refeicao, "2", ",", "."); ?></div></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>TOTAL REFEIçãO C/ VISA VALE (R$) : </td>
    <td><div align="right"><? echo number_format($valor_visa_vale, "2", ",", "."); ?></div></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>TOTAL GERAL (R$) : </td>
    <td><div align="right"><? echo number_format($valor_total, "2", ",", "."); ?></div></td>
  </tr>
</table>
<br><br>
<br>
<br>
<br>
<p>
  <? } ?>
</p>
</body>
</html>   
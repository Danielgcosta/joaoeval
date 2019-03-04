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
	$formata_data_pedido=substr($row["data_pedido"],6,4) . "-" .substr($row["data_pedido"],3,2) . "-" . substr($row["data_pedido"],0,2);
	$insere_data_pedido="UPDATE tabela_temp3 SET data_pedido='$formata_data_pedido' WHERE data_pedido='$guarda_data_pedido'";
	mysql_query($insere_data_pedido, $conn);
}
$query="SELECT * FROM tabela_temp3 WHERE data_pedido BETWEEN '$data_inicio' AND '$data_fim' ORDER BY nome,  local, horario, data_pedido";
$result=mysql_query($query, $conn);
$total_clientes=mysql_num_rows($result);

$tipo_pagto_resultante=mysql_query("SELECT preco_visa_vale FROM tabela_preco_visa_vale");
mysql_query($tipo_pagto_resultante, $conn);
	echo "<table width=100% border=0 align=center bgcolor=#CCCCCC>";
	echo "<tr>"; 
	echo "<td width=100% height=22><hr align=center></td>";
	echo "</tr>";
    echo "<tr>"; 
    echo "<td class=titulos><div align=center><strong><font size=7><strong><font color=#00CC99 size=5>JOÃO & VAL Refeições Naturais</font></strong></font><br>";
    echo "<br><font color=#FFFFFF size=4 face=Verdana>Consulta de Pedidos por Período : $data_entrada1 a $data_entrada2</font><br></strong></div></td>";
    echo "</tr>";
    echo "<tr>"; 
    echo "<td height=22></td>";
    echo "</tr>";
    echo "</table>";
	$valor_refeicao=0;
	$valor_visa_vale=0;
	$valor_total=0;
	echo "<table width=100% border=1 bgcolor=#cccccc cellspacing=0 cellpadding=5>";
	echo "<tr>"; 
	echo "<td align=center><b>Nome</b></td>";
	echo "<td align=center><b>Local</b></td>";
	echo "<td align=center><b>Data Pedido</b></td>";
	echo "<td align=center><b>Quant</b></td>";
	echo "<td align=center><b>Observações/Predileções</b></td>";
	echo "<td align=center><b>Valor (R$)</b></td>";
	echo "</tr>";
	while ($row=mysql_fetch_array($result) ) { 
    	$valor_refeicao+=$row["valor_ref"];
    	$valor_visa_vale+=$row["valor_visa_vale"];	
		$acerta_data  = substr($row["data_pedido"],8,2) . "/" .substr($row["data_pedido"],5,2) . "/" . substr($row["data_pedido"],0,4);   
    	echo "<tr>"; 
		echo "<td align=left>".$row["nome"];"</td>";
		$get_local=$row['local'];
	  		if ($get_local=='1')	{
	  	 		$local='FORUM - 1º horário';
	  		}
	  		if ($get_local=='2')	{
	  	 		$local='FORUM - 2º horário';
	 		}
	  		if ($get_local=='3')	{
	  	 		$local='1ª VARA - 1º horário';
	  		}
	  		if ($get_local=='4')	{
	  	 		$local='2ª VARA - 1º horário';
	 		}
	  		if ($get_local=='5')	{
	  	 		$local='TRT';
	  		}
	  		if ($get_local=='6')	{
	  	 		$local='TRTL';
	  		}
	  		if ($get_local=='7')	{
	  	 		$local='Diversos';
	  		} 
	    echo "<td align=center>$local</td>";
		echo "<td align=center>$acerta_data</td>";
    	echo "<td align=center>".$row["quantidade"];"></td>";
    	echo "<td align=left>".$row["observacoes"];"</td>"; ?>
    	<td align="right">
		<? $valor_pago_ref=$row["valor_ref"];
		   $valor_pago_vale=$row["valor_visa_vale"];
		   if ($valor_pago_ref==0.00)	{
			  $valor_pago_final=$valor_pago_vale;
			  } else {
		      $valor_pago_final=$valor_pago_ref;
		   }
		   echo number_format($valor_pago_final, "2", ",", "."); ?></td><?
       	echo "</tr>";
	}
		echo "</table>";
	$valor_total=$valor_refeicao+$valor_visa_vale;
	mysql_close($conn);
	$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
	if (!$conn) die("Não foi possivel conectar"); 
	mysql_select_db("u581370309_dados", $conn);
	$query="SELECT * FROM tabela_temp2 WHERE data_pedido BETWEEN '$data_inicio' AND '$data_fim'";
	$resultado=mysql_query($query, $conn);
	while ($row=mysql_fetch_array($resultado) ) { 
		$valor_normal=$row["preco_refeicao"];
	}
	mysql_close($conn);
	$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
	if (!$conn) die("Não foi possivel conectar"); 
	mysql_select_db("u581370309_dados", $conn);
	$query="SELECT * FROM tabela_temp2 WHERE data_pedido BETWEEN '$data_inicio' AND '$data_fim'";
	$resultado=mysql_query($query, $conn);
	while ($row=mysql_fetch_array($resultado) ) { 
		$valor_vale=$row["preco_vale"];
	}
	mysql_close($conn);
echo "<br>";
echo "<hr align=center>";
echo "<table width=41% border=0 align=left>";
echo "<td>TOTAL DE CLIENTES DO PERÍODO :</td>";?>
<td><div align="right"><? echo $total_clientes; ?></div></td>
<?
echo "</tr>";
echo "<tr>"; 
echo "<td colspan=2>&nbsp;</td>";
echo "</tr>";
echo "<tr>"; 
echo "<td colspan=2><strong>TOTAIS</strong></td>";
echo "</tr>";
echo "<tr>"; 
echo "<td width=82%>TOTAL REFEIÇÃO (R$) : </td>";?>
<td align="right" width="18%"><? echo number_format($valor_refeicao, "2", ",", "."); ?></td>
<?
echo "</tr>";
echo "<tr>"; 
echo "<td>TOTAL VISA VALE (R$) : </td>";?>
<td align="right"><? echo number_format($valor_visa_vale, "2", ",", "."); ?></td>
<?
echo "</tr>";
echo "<tr>"; 
echo "<td>TOTAL GERAL (R$) : </td>";?>
<td align="right"><? echo number_format($valor_total, "2", ",", "."); ?></td>
<?
echo "</tr>";
echo "</table>";
echo "<br><br><br><br><br><br>";
echo "<hr align=center>";
/*}*/
echo "<table width=100% border=0>";
echo "<tr>";
echo "<td width=48%><form name=form1>";
echo "<div align=right><input type=button name=Submit value=IMPRIMIR Onclick=window.print()>";
echo "</div></form></td>";
echo "<td width=52%><form name=form2 method=get action=operacoes_pedidos.php>";
echo "<input type=submit name=Submit2 value=FECHAR></form></td>";
echo "</tr>";
echo "</table>";

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
</body>
</html>   
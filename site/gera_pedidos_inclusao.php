<STYLE type="text/css">
table { 
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
input { 
font: 10px verdana, arial, helvetica, sans-serif;
color:#000000;
}
</STYLE>
<title>Pedidos do Dia</title>
<body bgcolor="#000000">
<p>
<? /*$data = date("Y-m-d");
$novadata = substr($data,8,2) . "/" .substr($data,5,2) . "/" . substr($data,0,4);*/
$dados=$_POST;
list($data_entrada)=array_values($dados);

if ($data_entrada=="")	{
	include "./data_pedidos_erro.php";
	die;
	} else {
?>
</p>
<table width="100%" border="0" align="center" bgcolor="#CCCCCC">
  <tr> 
    <td height="22">
<hr align="center"></td>
  </tr>
  <tr> 
    <td class="titulos"><div align="center"><strong><font size="7"><strong><font color="#00CC99" size="5">JO�O 
        & VAL Refei��es Naturais</font></strong></font><br>
        <br>
        <font color="#FFFFFF" size="4" face="Verdana, Arial, Helvetica, sans-serif">Inclus�o 
        de Pedidos para o Dia </font><font color="#ffffff" size="4" face="Verdana, Arial, Helvetica, sans-serif">:</font><font color="#ffffff" size="3" face="Verdana, Arial, Helvetica, sans-serif"> 
        <? echo $data_entrada; ?></font><br>
        </strong></div></td>
  </tr>
  <tr> 
    <td height="22"><hr align="center"></td>
  </tr>
</table>
<div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong><br>
  DESMARQUE os Clientes a INCLUIR no Pedido</strong></font><br>
  <?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("N�o foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

/*deleta tabela_temp_inclusao (se existir) de um processamento anterior */
$deleta_tabela_temp = "DROP TABLE tabela_temp_inclusao";
mysql_query($deleta_tabela_temp, $conn);

/* Cria tabela tempor�ria (tabela_temp) */
$cria_tabela=mysql_query("CREATE TABLE `tabela_temp_inclusao` (
`data_pedido` VARCHAR( 10 ) NOT NULL ,
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
`valor_visa_vale` FLOAT ( 8,2 ) NOT NULL)");

$copia=mysql_query("INSERT INTO tabela_temp_inclusao (id, nome, local, andar, sala, telefone, tipo_salada, quantidade, quant_salada, observacoes, soja, visa_vale, horario) 	
 			SELECT * FROM tabela_clientes");
mysql_query($copia, $conn);

$dados=$_POST['data_entrada'];
$insere_data_pedido="UPDATE tabela_temp_inclusao SET data_pedido='$dados'";
mysql_query($insere_data_pedido, $conn);

$resultado = mysql_query("SELECT * FROM tabela_clientes");
mysql_query($resultado, $conn);
while ($row=mysql_fetch_array($resultado) ) {
	$tipo_pagto=$row["visa_vale"];
	if ($tipo_pagto=="Sim")	{
		$tipo_pagto_resultante=mysql_query("SELECT preco_visa_vale FROM tabela_preco_visa_vale");
		mysql_query($tipo_pagto_resultante, $conn);
		while ($linha=mysql_fetch_array($tipo_pagto_resultante) ) {
			$valor=$linha["preco_visa_vale"];
			$insere_valor="UPDATE tabela_temp_inclusao SET valor_visa_vale='$valor'*quantidade WHERE visa_vale='Sim'";
			mysql_query($insere_valor, $conn);
		}
	} else {	
		$tipo_pagto_resultante=mysql_query("SELECT preco_ref FROM tabela_preco_refeicao");
		mysql_query($tipo_pagto_resultante, $conn);
		while ($linha=mysql_fetch_array($tipo_pagto_resultante) ) {
			$valor=$linha["preco_ref"];
			$insere_valor="UPDATE tabela_temp_inclusao SET valor_ref='$valor'*quantidade WHERE visa_vale='N�o'";
			mysql_query($insere_valor, $conn);
		}
	}
}
$sql = mysql_query("SELECT * FROM tabela_preco_refeicao");
mysql_query($sql, $conn);
while ($row=mysql_fetch_array($sql) ) {
	$valor=$row["preco_ref"];
	$insere_valor="UPDATE tabela_temp_inclusao SET preco_refeicao='$valor' WHERE data_pedido='$dados'";
	mysql_query($insere_valor, $conn);
}
$sql = mysql_query("SELECT * FROM tabela_preco_visa_vale");
mysql_query($sql, $conn);
while ($row=mysql_fetch_array($sql) ) {
	$valor=$row["preco_visa_vale"];
	$insere_valor="UPDATE tabela_temp_inclusao SET preco_vale='$valor' WHERE data_pedido='$dados'";
	mysql_query($insere_valor, $conn);
}

$query_rs_produtos = "SELECT * FROM tabela_temp_inclusao ORDER BY local, horario, andar DESC";
$rs_produtos = mysql_query($query_rs_produtos, $conn) or die(mysql_error());
$row_rs_produtos = mysql_fetch_assoc($rs_produtos);
$totalRows_rs_produtos = mysql_num_rows($rs_produtos);
?>
</div>
<form action="excluir_pedidos_inclusao.php" method="POST">
  <table width="100%" border="1" bgcolor="#cccccc" cellspacing="0" cellpadding="1">
    <tr> 
      <td align="center" bgcolor="#ffffff"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><b>Nome</b></font></td>
      <td align="center" bgcolor="#ffffff"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><b>Local</font></td>
	  <td align="center" bgcolor="#ffffff"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><b>Hora</font></td>
      <td align="center" bgcolor="#ffffff"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><b>Andar</font></td>
      <td align="center" bgcolor="#ffffff"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><b>Sala</font></td>
      <td align="center" bgcolor="#ffffff"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><b>Telefone</font></td>
      <td align="center" bgcolor="#ffffff"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><b>Sal</font></td>
      <td align="center" bgcolor="#ffffff"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><b>Quant</font></td>	  
      <td align="left" bgcolor="#ffffff"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><b>Observa��es/Predile��es</font></td>
      <td align="center" bgcolor="#ffffff"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><b>N�o Pediu</font></td>
    </tr>
    <? do { ?>
    <tr> 
      <td align="left"><? echo $row_rs_produtos['nome']; ?></td>
	  <? $get_local=$row_rs_produtos['local'];
	  if ($get_local=='1')	{
	  	 $local='FORUM - 1� hor�rio';
	  }
	  if ($get_local=='2')	{
	  	 $local='FORUM - 2� hor�rio';
	  }
	  if ($get_local=='3')	{
	  	 $local='1� VARA - 1� hor�rio';
	  }
	  if ($get_local=='4')	{
	  	 $local='2� VARA - 1� hor�rio';
	  }
	  if ($get_local=='5')	{
	  	 $local='TRT';
	  }
	  if ($get_local=='6')	{
	  	 $local='TRTL';
	  }
	  if ($get_local=='7')	{
	  	 $local='Diversos';
	  } ?>
	  <td align="center"><? echo $local; ?></td>
	  <td align="center"><? echo $row_rs_produtos['horario']; ?></td>
      <td align="center"><? echo $row_rs_produtos['andar']; ?></td>
      <td align="center"><? echo $row_rs_produtos['sala']; ?></td>
      <td align="center"><? echo $row_rs_produtos['telefone']; ?></td>
      <td align="center"><? echo $row_rs_produtos['tipo_salada']; ?></td>
      <td align="center"><? echo $row_rs_produtos['quantidade']; ?></td>
      <td align="left"><? echo $row_rs_produtos['observacoes']; ?></td>
      <td align="center" bgcolor="#CCCCCC"> 
          <input name="excluir[]" type="checkbox" id="excluir[]" checked value="<? echo $row_rs_produtos['id']; ?>" /></td>
    </tr>
    <? } while ($row_rs_produtos = mysql_fetch_assoc($rs_produtos)); ?>
  </table>
    
  <table width="100%" border="0" align="center" bgcolor="#cccccc">
    <tr> 
      <td><input type="hidden" name="data_pedido" value="<? echo $data_entrada; ?>" ></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="4"><div align="center"> 
          <input name="gerar_pedidos" type="submit" value="INCLUIR" />
        </div></td>
    </tr>
    <tr> 
      <td colspan="4">&nbsp;</td>
    </tr>
  </table>
  <hr align="center">
</form>
<table width="100%" border="0" align="center">
  <tr> 
    <td>
<form name="form1" method="get" action="operacoes_pedidos.php">
        <div align="center">
          <input type="submit" name="Submit" value="SAIR">
        </div>
      </form></td>
  </tr>
</table>
<? } ?>
<br>
</body>
</html>
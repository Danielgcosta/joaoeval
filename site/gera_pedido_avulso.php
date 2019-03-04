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
    <td class="titulos"><div align="center"><strong><font size="7"><strong><font color="#00CC99" size="5">JOÃO 
        & VAL Refeições Naturais</font></strong></font><br>
        <br>
        <font color="#FFFFFF" size="4" face="Verdana, Arial, Helvetica, sans-serif">Pedidos 
        Avulsos para o Dia </font><font color="#ffffff" size="4" face="Verdana, Arial, Helvetica, sans-serif">:</font><font color="#ffffff" size="3" face="Verdana, Arial, Helvetica, sans-serif"> 
        <? echo $data_entrada; ?></font><br>
        </strong></div></td>
  </tr>
  <tr> 
    <td height="22"><hr align="center"></td>
  </tr>
</table>
<div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong><br>
  DESMARQUE os Clientes que PEDIRAM Refeição Avulsa</strong></font><br>
  <?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

/*deleta tabela_temp_avulsa (se existir) de um processamento anterior */
$deleta_tabela_temp = "DROP TABLE tabela_temp_avulsa";
mysql_query($deleta_tabela_temp, $conn);

/* Cria tabela temporária (tabela_temp) */
$cria_tabela=mysql_query("CREATE TABLE `tabela_temp_avulsa` (
`data_pedido` VARCHAR( 10 ) NOT NULL ,
`id` INT( 11 ) NOT NULL ,
`nome` VARCHAR( 255 ) NOT NULL ,
`andar` INT( 2 ) NOT NULL ,
`sala` INT( 11 ) NOT NULL ,
`telefone` VARCHAR( 11 ) NOT NULL ,
`tipo_salada` VARCHAR( 11 ) NOT NULL ,
`quantidade` INT( 11 ) NOT NULL ,
`observacoes` VARCHAR( 255 ) DEFAULT NULL,
`soja` VARCHAR( 255 ) NOT NULL ,
`visa_vale` VARCHAR( 255 ) NOT NULL ,
`horario` VARCHAR( 255 ) NOT NULL ,
`preco_refeicao` FLOAT ( 4,2 ) NOT NULL ,
`preco_vale` FLOAT ( 4,2 ) NOT NULL ,
`valor_ref` FLOAT ( 4,2 ) NOT NULL ,
`valor_visa_vale` FLOAT ( 4,2 ) NOT NULL ,
`situacao` VARCHAR ( 8 ) NOT NULL)");

$copia=mysql_query("INSERT INTO tabela_temp_avulsa (id, nome, andar, sala, telefone, tipo_salada, quantidade, observacoes, soja, visa_vale, horario) 	
 			SELECT * FROM tabela_clientes");
mysql_query($copia, $conn);

$dados=$_POST['data_entrada'];
$insere_data_pedido="UPDATE tabela_temp_avulsa SET data_pedido='$dados'";
mysql_query($insere_data_pedido, $conn);

$insere_situacao="UPDATE tabela_temp_avulsa SET situacao='pago'";
mysql_query($insere_situacao, $conn);

$resultado = mysql_query("SELECT * FROM tabela_clientes");
mysql_query($resultado, $conn);
while ($row=mysql_fetch_array($resultado) ) {
	$tipo_pagto=$row["visa_vale"];
	if ($tipo_pagto=="Sim")	{
		$tipo_pagto_resultante=mysql_query("SELECT preco_visa_vale FROM tabela_preco_visa_vale");
		mysql_query($tipo_pagto_resultante, $conn);
		while ($linha=mysql_fetch_array($tipo_pagto_resultante) ) {
			$valor=$linha["preco_visa_vale"];
			$insere_valor="UPDATE tabela_temp_avulsa SET valor_visa_vale='$valor' WHERE visa_vale='Sim'";
			mysql_query($insere_valor, $conn);
		}
	} else {	
		$tipo_pagto_resultante=mysql_query("SELECT preco_ref FROM tabela_preco_refeicao");
		mysql_query($tipo_pagto_resultante, $conn);
		while ($linha=mysql_fetch_array($tipo_pagto_resultante) ) {
			$valor=$linha["preco_ref"];
			$insere_valor="UPDATE tabela_temp_avulsa SET valor_ref='$valor' WHERE visa_vale='Não'";
			mysql_query($insere_valor, $conn);
		}
	}
}
$sql = mysql_query("SELECT * FROM tabela_preco_refeicao");
mysql_query($sql, $conn);
while ($row=mysql_fetch_array($sql) ) {
	$valor=$row["preco_ref"];
	$insere_valor="UPDATE tabela_temp_avulsa SET preco_refeicao='$valor' WHERE data_pedido='$dados'";
	mysql_query($insere_valor, $conn);
}
$sql = mysql_query("SELECT * FROM tabela_preco_visa_vale");
mysql_query($sql, $conn);
while ($row=mysql_fetch_array($sql) ) {
	$valor=$row["preco_visa_vale"];
	$insere_valor="UPDATE tabela_temp_avulsa SET preco_vale='$valor' WHERE data_pedido='$dados'";
	mysql_query($insere_valor, $conn);
}

$query_rs_produtos = "SELECT * FROM tabela_temp_avulsa ORDER BY horario, andar DESC";
$rs_produtos = mysql_query($query_rs_produtos, $conn) or die(mysql_error());
$row_rs_produtos = mysql_fetch_assoc($rs_produtos);
$totalRows_rs_produtos = mysql_num_rows($rs_produtos);
?>
</div>
<form action="excluir_pedido_avulso.php" method="POST">
  <table width="100%" border="1" bgcolor="#cccccc" cellspacing="0" cellpadding="5">
    <tr> 
      <td height="37" align="center" bgcolor="#ffffff" scope="col"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome</font></td>
      <td align="center" bgcolor="#ffffff" scope="col"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Horário</font></td>
      <td align="center" bgcolor="#ffffff" scope="col"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Andar</font></td>
      <td align="center" bgcolor="#ffffff" scope="col"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Sala</font></td>
      <td align="center" bgcolor="#ffffff" scope="col"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Telefone</font></td>
      <td align="center" bgcolor="#ffffff" scope="col"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Sd</font></td>
      <td align="center" bgcolor="#ffffff" scope="col"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Q</font></td>
      <td align="left" bgcolor="#ffffff" scope="col"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Observações/Predileções</font></td>
      <td align="center" bgcolor="#ffffff" scope="col"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Soja</font></td>
      <td align="center" bgcolor="#ffffff" scope="col"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">V 
        Vale</font></td>
      <td align="center" width="5%" bgcolor="#ffffff" scope="col"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Não 
        Pediu</font></td>
    </tr>
    <? do { ?>
    <tr> 
      <td align="left"><? echo $row_rs_produtos['nome']; ?></td>
      <td align="center"><? echo $row_rs_produtos['horario']; ?></td>
      <td align="center"><? echo $row_rs_produtos['andar']; ?></td>
      <td align="center"><? echo $row_rs_produtos['sala']; ?></td>
      <td align="center"><? echo $row_rs_produtos['telefone']; ?></td>
      <td align="center"><? echo $row_rs_produtos['tipo_salada']; ?></td>
      <td align="center"><? echo $row_rs_produtos['quantidade']; ?></td>
      <td align="left"><? echo $row_rs_produtos['observacoes']; ?></td>
      <td align="center"><? echo $row_rs_produtos['soja']; ?></td>
      <td align="center"><? echo $row_rs_produtos['visa_vale']; ?></td>
      <td align="center" bgcolor="#CCCCCC"> <div align="center"> 
          <input name="excluir[]" type="checkbox" id="excluir[]" checked value="<? echo $row_rs_produtos['id']; ?>" />
          <br>
        </div></td>
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
          <input name="gerar_pedidos" type="submit" value="GERAR PEDIDOS AVULSOS" />
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
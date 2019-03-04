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
<title></title>
<body bgcolor="#000000">
<table width="100%" border="0" align="center" bgcolor="#CCCCCC">
  <tr> 
    <td height="22">
<hr align="center"></td>
  </tr>
  <tr> 
    <td class="titulos"><div align="center"><strong><font size="7"><strong><font color="#00CC99" size="5">JOÃO 
        & VAL Refeições Naturais</font></strong></font><br>
        <br>
        <font color="#FFFFFF" size="4" face="Verdana, Arial, Helvetica, sans-serif">Gerar 
        Contas de Clientes por Per&iacute;odo</font><font color="#ffffff" size="3" face="Verdana, Arial, Helvetica, sans-serif"> 
        </font><br>
        </strong></div></td>
  </tr>
  <tr> 
    <td height="22"><hr align="center"></td>
  </tr>
</table>
<div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong><br>
  </strong></font> 
  <?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

/*deleta tabela_temp (se existir) de um processamento anterior */
$deleta_tabela_temp = "DROP TABLE tabela_temp";
mysql_query($deleta_tabela_temp, $conn);

/* Cria tabela temporária (tabela_temp) */
$cria_tabela=mysql_query("CREATE TABLE `tabela_temp` (
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

$copia=mysql_query("INSERT INTO tabela_temp (id, nome, local, andar, sala, telefone, tipo_salada, quantidade, quant_salada, observacoes, soja, visa_vale, horario) 	
 			SELECT * FROM tabela_clientes");
mysql_query($copia, $conn);

$query_rs_produtos = "SELECT * FROM tabela_temp ORDER BY local";
$rs_produtos = mysql_query($query_rs_produtos, $conn) or die(mysql_error());
$row_rs_produtos = mysql_fetch_assoc($rs_produtos);
$totalRows_rs_produtos = mysql_num_rows($rs_produtos);
?>
</div>
<form action="excluir_contas.php" method="POST">
  <table width="400" border="0" align="left">
    <tr> 
      <td width="380"> <table width="95%" border="1" align="left" cellpadding="3" cellspacing="0" bgcolor="#cccccc">
          <tr> 
            <td colspan="3" align="center" bgcolor="#ffffff"><b>Desmarque os Clientes 
              para Gerar as Contas</b></td>
          </tr>
          <? do { ?>
          <tr> 
            <td align="left"><? echo $row_rs_produtos['nome']; ?></td>
            <? $get_local=$row_rs_produtos['local'];
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
	  } ?>
            <td align="center"><? echo $local; ?></td>
            <td align="center" bgcolor="#CCCCCC"> <input name="excluir[]" type="checkbox" id="excluir[]2" checked value="<? echo $row_rs_produtos['id']; ?>" /></td>
          </tr>
          <? } while ($row_rs_produtos = mysql_fetch_assoc($rs_produtos)); ?>
        </table></td>
    </tr>
  </table>
  <table width="100" border="0" align="left">
    <tr>
      <td><input name="gerar_contas" type="submit" value="CONTINUAR" /></td>
    </tr>
  </table>
</form>
<table width="100" border="0" align="left">
    <tr>
      <td><form name="form1" method="get" action="operacoes_pedidos.php">
        <input type="submit" name="Submit" value="SAIR">
      </form></td>
    </tr>
  </table>
</body>
</html>
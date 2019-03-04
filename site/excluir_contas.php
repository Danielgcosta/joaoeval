<STYLE type="text/css">
A {
	COLOR: #000000; FONT-FAMILY: verdana; TEXT-DECORATION: none
}
A:hover {
	COLOR: #ffcf00
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
input { 
font: 10px verdana, arial, helvetica, sans-serif;
color:#000000;
}
</STYLE>
<body bgcolor="#000000">
<script language="JavaScript">
function valida_campo(campo)	{
		if (campo.data_entrada1.selectedIndex==0) {
			alert ("Escolha a Data Início!");
			return false;
		}
		if (campo.data_entrada2.selectedIndex==0) {
			alert ("Escolha a Data Final!");
			return false;
		}
		return true;
}		
</script>

<?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$dados=@$_POST['excluir'];
	for ($i=0;$i<count($dados);$i++)	{
		mysql_query("DELETE FROM tabela_temp WHERE id=$dados[$i]");
	}
mysql_close($conn);

$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);
$query = "SELECT * FROM tabela_temp ORDER BY local";
$resultado = mysql_query($query, $conn) or die(mysql_error());
$total = mysql_num_rows($resultado);
?>
<table width="100%" border="0" align="center" bgcolor="#CCCCCC">
  <tr> 
    <td height="22"> <hr align="center"></td>
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
<br>
<table width=38% border=1 align="left" cellpadding=4 cellspacing=0 bgcolor=#cccccc>
  <tr bgcolor="#FFFFFF"> 
    <td colspan="3" align=center><b>Clientes Selecionados para Geração 
      das Contas</b></td>
</tr>
<?
while ($row=mysql_fetch_array($resultado) ) { ?>
	  <tr>
	  <td width="48%" align=left><? echo $row["nome"]; ?></td>
	  <? $get_local=$row['local'];
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
            <td width="52%" align="center"><? echo $local; ?></td>
      </tr>
<? } ?>
</table>
<?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

/*deleta tabela_temp_pedidos (se existir) de um processamento anterior */
$deleta_tabela_temp_pedidos = "DROP TABLE tabela_temp_pedidos";
mysql_query($deleta_tabela_temp_pedidos, $conn);

/* Cria tabela temporária (tabela_temp_pedidos) */
$cria_tabela=mysql_query("CREATE TABLE `tabela_temp_pedidos` (
`data_pedido` VARCHAR( 10 ) NOT NULL ,
`id` INT( 11 ) NOT NULL ,
`nome` VARCHAR( 255 ) NOT NULL ,
`andar` INT( 11 ) NOT NULL ,
`sala` VARCHAR( 11 ) NOT NULL ,
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
`valor_visa_vale` FLOAT ( 4,2 ) NOT NULL)");

$copia=mysql_query("INSERT INTO tabela_temp_pedidos (data_pedido) SELECT data_pedido FROM tabela_pedidos");
mysql_query($copia, $conn);

$resultado = mysql_query("SELECT data_pedido FROM tabela_temp_pedidos ORDER BY data_pedido");
mysql_query($resultado, $conn);
if (mysql_num_rows($resultado)>0)  {
	while ($linha = mysql_fetch_row($resultado)) {
		$guarda_data=$linha[0];
		$deleta_data=$guarda_data;
		if ($guarda_data==$linha[0])	{
			mysql_query("DELETE FROM tabela_temp_pedidos WHERE data_pedido='$guarda_data'");
			mysql_query("INSERT INTO tabela_temp_pedidos (data_pedido) VALUES ('$guarda_data')");
		}
	}
}
mysql_close($conn);
?>
<table width="379" border="0" align="left">
  <form name="form1" method="post" action="exibe_conta_cliente_periodo_todos.php" onSubmit="return valida_campo(this)"><td width="136"><div align="center"> 
  <tr>
    <td><select name="select2" id="select3">
        <option selected>Selecione Data Início</option>
        <?
			$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
			if (!$conn) die("Não foi possivel conectar"); 
			mysql_select_db("u581370309_dados", $conn);

			$resultado = mysql_query("SELECT data_pedido FROM tabela_temp_pedidos ORDER BY data_pedido");
			if (mysql_num_rows($resultado)>0)  {
				while ($linha = mysql_fetch_row($resultado)) {
					echo "<option value=\"$linha[0]\">$linha[0]\n";
				}
			}
			?>
      </select></td>
    <td width="137"><select name="select" id="select4">
        <option selected>Selecione Data Final</option>
        <?
			$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
			if (!$conn) die("Não foi possivel conectar"); 
			mysql_select_db("u581370309_dados", $conn);

			$resultado = mysql_query("SELECT data_pedido FROM tabela_temp_pedidos ORDER BY data_pedido");
			if (mysql_num_rows($resultado)>0)  {
				while ($linha = mysql_fetch_row($resultado)) {
					echo "<option value=\"$linha[0]\">$linha[0]\n";
				}
			}
			?>
      </select></td>
    <td width="92"><input name="gerar_contas" type=submit value="Gerar Contas"></td>
  </tr>
  <div align="left"> </div>
      </form></tr>
</table>
<table width="55" border="0" align="left">
  <tr>
    <td width="51" height="47" align="center" valign="middle"> 
      <form name="form2" method="get" action="gera_conta_todos.php">
        <div align="left"> 
          <input type="submit" name="Submit" value="Voltar">
        </div>
      </form></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
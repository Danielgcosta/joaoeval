<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script language="JavaScript">
function valida_campo(campo)	{
		if (campo.nome.selectedIndex==0) {
			alert ("Escolha um Cliente!");
			return false;
		}
		if (campo.data_entrada.selectedIndex==0) {
			alert ("Escolha a Data Pedido!");
			return false;
		}
		return true;
}		
</script>

<STYLE type="text/css">
.titulos {
filter:shadow(color=000000,direction=120);
height:5px;
font-family:verdana, arial, helvetica, sans-serif;
font-size:16px;
color:#ffff00;
}
table { 
font: 10px verdana, arial, helvetica, sans-serif;
color:#ffffff;
}
input { 
font: 10px verdana, arial, helvetica, sans-serif;
}
select { 
background-color: #ffffff; 
font: 11px verdana, arial, helvetica, sans-serif;
color:#000000;
border:1px solid #999999;
}
-->
</style>
<body bgcolor="#000000">
<?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("N�o foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

/*deleta tabela_temp_pedidos (se existir) de um processamento anterior */
$deleta_tabela_temp_pedidos = "DROP TABLE tabela_temp_pedidos";
mysql_query($deleta_tabela_temp_pedidos, $conn);

/* Cria tabela tempor�ria (tabela_temp_pedidos) */
$cria_tabela=mysql_query("CREATE TABLE `tabela_temp_pedidos` (
`data_pedido` VARCHAR( 10 ) NOT NULL ,
`id` INT( 11 ) NOT NULL ,
`nome` VARCHAR( 255 ) NOT NULL ,
`andar` INT( 2 ) NOT NULL ,
`sala` INT ( 11 ) NOT NULL ,
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
<br>
<br>
<br>
<table width="80%" bgcolor="#cccccc" border="0" align="center">
  <tr> 
    <td><hr></td>
  </tr>
  <tr> 
    <td class="titulos"><div align="center"><strong><font face="Verdana" size="5" color="#00CC99">JO�O 
        & VAL Refei��es Naturais<br>
        </font></strong> <br>
        <strong><font face="Verdana, Arial, Helvetica, sans-serif" size="4" color="#FFFFFF">Gerar 
        Conta Pagamento Avulso</font></strong><br>
      </div></td>
  </tr>
  <tr> 
    <td><hr align="center"></td>
  </tr>
</table>
<table width="80%" border="0" bgcolor="#CCCCCC" align="center">
  <tr> 
    <td colspan="2"><form name="form1" method="post" action="exibe_conta_cliente_avulso.php" onSubmit="return valida_campo(this)"><div align="center"> 
        <p align="center"><font color="#000000">
          <select name="nome" id="select">
            <option>Selecione um Cliente</option>
            <?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("N�o foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$resultado = mysql_query("SELECT nome FROM tabela_clientes ORDER BY nome");
if (mysql_num_rows($resultado)>0)  {
	while ($linha = mysql_fetch_row($resultado)) {
		echo "<option value=\"$linha[0]\">$linha[0]\n";
	}
}
?>
          </select>
          </font> 
          <select name="data_entrada" id="select2">
            <option>Selecione Data Pedido</option>
			<? $conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
			if (!$conn) die("N�o foi possivel conectar"); 
			mysql_select_db("u581370309_dados", $conn);
			$resultado = mysql_query("SELECT data_pedido FROM tabela_temp_pedidos ORDER BY data_pedido");
			if (mysql_num_rows($resultado)>0)  {
				while ($linha = mysql_fetch_row($resultado)) {
					echo "<option value=\"$linha[0]\">$linha[0]\n";
				}
			} ?>
          </select>
          <input name="submit" type=submit value="ENVIAR">
      </form></tr>
  <tr> 
    <td width="68%" align=center><br> <br> 
    <td width="32%" align=center><form name="form2" method="get" action="operacoes_pedidos.php">
        <div align="center"> </div>
        <div align="left"> 
          <input type="submit" name="Submit3" value="VOLTAR">
        </div>
      </form>
  <tr> 
    <td colspan="2"><div align="center"> 
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      </div></tr>
  <tr> 
    <td height="24" colspan="2"> <hr></td>
  </tr>
</table>
  <br></td>
<td align=center>&nbsp;</td>
	</tr>
  </table>
<br>
<br>
<br><br><br><br>
</body>
</html>
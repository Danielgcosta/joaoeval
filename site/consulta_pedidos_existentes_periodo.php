<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script language="JavaScript">
function valida_campo(campo)	{
		if (campo.data_entrada1.selectedIndex==0) {
			alert ("Escolha um Pedido!");
			return false;
		}
		if (campo.data_entrada2.selectedIndex==0) {
			alert ("Escolha um Pedido!");
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
`andar` VARCHAR( 11 ) NOT NULL ,
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
        <strong><font face="Verdana, Arial, Helvetica, sans-serif" size="4" color="#FFFFFF">Consulta 
        de Pedidos por Per&iacute;odo</font></strong><br>
      </div></td>
  </tr>
  <tr> 
    <td><hr align="center"></td>
  </tr>
</table>
<table width="80%" border="0" bgcolor="#CCCCCC" align="center">
  <tr> 
    <td> <div align="center"> 
        <p>&nbsp;</p>
      </div>
    <td>&nbsp;</tr>
  <tr> 
    <td colspan="2"><form name="form1" method="post" action="exibe_pedidos_periodo.php" onSubmit="return valida_campo(this)"><div align="center"> 
        <p align="center"><font color="#000000">DE </font>
          <select name="data_entrada1" id="select">
            <option selected>Selecione</option>
            <?
			$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
			if (!$conn) die("N�o foi possivel conectar"); 
			mysql_select_db("u581370309_dados", $conn);

			$resultado = mysql_query("SELECT data_pedido FROM tabela_temp_pedidos");
			if (mysql_num_rows($resultado)>0)  {
				while ($linha = mysql_fetch_row($resultado)) {
					echo "<option value=\"$linha[0]\">$linha[0]\n";
				}
			}
			?>
          </select>
          <font color="#000000">A </font> 
          <select name="data_entrada2" id="select3">
            <option selected>Selecione</option>
            <?
			$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
			if (!$conn) die("N�o foi possivel conectar"); 
			mysql_select_db("u581370309_dados", $conn);

			$resultado = mysql_query("SELECT data_pedido FROM tabela_temp_pedidos");
			if (mysql_num_rows($resultado)>0)  {
				while ($linha = mysql_fetch_row($resultado)) {
					echo "<option value=\"$linha[0]\">$linha[0]\n";
				}
			}
			?>
          </select>
          <input name="submit" type=submit value="CONSULTAR">
      </form></tr>
  <tr> 
    <td width="60%" align=center><br> <br> 
    <td width="40%" align=center><form name="form2" method="get" action="operacoes_pedidos.php">
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
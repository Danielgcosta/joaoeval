<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Editar um cliente</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script language="JavaScript">
function valida_campo(campo)	{
		if (campo.nome.selectedIndex==0) {
			alert ("Escolha um Cliente.");
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
<br>
<table width="80%" bgcolor="#cccccc" border="0" align="center">
  <tr> 
    <td><hr></td>
  </tr>
  <tr> 
    <td class="titulos"><div align="center"><strong><font face="Verdana" size="5" color="#00CC99">JOÃO 
        & VAL Refeições Naturais<br>
        </font></strong> <br>
        <strong><font face="Verdana, Arial, Helvetica, sans-serif" size="4" color="#FFFFFF">Editar/Alterar 
        dados de um cliente</font></strong> <br>
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
        <form name="form1" method="post" action="exibe_cliente.php" onSubmit="return valida_campo(this)"><div align="center"> 
          <p> 
            <select name="nome" id="select">
              <option>Selecione um Cliente</option>
              <?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$resultado = mysql_query("SELECT nome FROM tabela_clientes ORDER BY nome");
if (mysql_num_rows($resultado)>0)  {
	while ($linha = mysql_fetch_row($resultado)) {
		echo "<option value=\"$linha[0]\">$linha[0]\n";
	}
}
?>
            </select>
            <input name="submit" type=submit value="EDITAR">
        </form>
      </div></tr>
  <tr> 
    <td align=center><br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
  <tr>
    <td><div align="center"> 
        <form name="form2" method="get" action="menu_cadastro.php">
          <div align="center"> </div>
		  <input type="submit" name="Submit3" value="VOLTAR">
        </form>
        
      </div></tr>
    <tr> 
      <td height="24"> <hr></td>
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
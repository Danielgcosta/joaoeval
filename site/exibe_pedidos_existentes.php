<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD><TITLE></TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</HEAD>

<style type="text/css">
<!--
.titulos {
filter:shadow(color=000000,direction=120);
height:5px;
font-family:verdana, arial, helvetica, sans-serif;
font-size:16px;
color:#ffff00;
}
table { 
background-color: #dfeff;
border:1;
font: 10px verdana, arial, helvetica, sans-serif;
color:#000000;
}
input { 
font: 10px verdana, arial, helvetica, sans-serif;
color:#000000;
}
-->
</style>
<?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$dados=$_POST;
list($nome)=array_values($dados);

$query="SELECT * FROM tabela_clientes WHERE nome LIKE '$nome'";

$result=mysql_query($query, $conn);
$row=mysql_fetch_array($result);
?>

<body bgcolor="#000000" onLoad="document.getElementById('nome').focus()">
<table width="80%" border=0 align="center" bgcolor="#CCCCCC">
  <form name="form1" method="post" action="update_cliente.php" onSubmit="return valida_campo(this)">
    <tr> 
      <td colspan="4"><hr align="center"></td>
    </tr>
    <tr> 
      <td colspan="4" class="titulos"><div align="center"> 
          <p><font color="#00CC99" size="5" face="Verdana, Arial, Helvetica, sans-serif"><strong>JOÃO 
            & VAL Refeições Naturais</strong></font></p>
          <p><strong><font color="#FFFFFF" size="4" face="Verdana, Arial, Helvetica, sans-serif">Pedidos 
            Existentes</font></strong></p>
        </div></td>
    </tr>
    <tr> 
      <td height="28" colspan="4"><hr align="center"></td>
    </tr>
    <tr> 
      <td width="134" height="21"><div align="right">NOME :</div></td>
      <td colspan="3"><input name=nome size="50" maxlength="50" value="<? echo $row['nome']; ?>"> </td>
    </tr>
    <tr> 
      <td height="21"> <div align="right">ANDAR :</div></td>
      <td width="129"><input name=andar size="10" maxlength="50" value="<? echo $row['andar']; ?>"> </td>
      <td width="63"><div align="right">SALA :</div></td>
      <td width="258"><input name=sala size="10" maxlength="50" value="<? echo $row['sala']; ?>"></td>
    </tr>
    <tr> 
      <td height="21"> <div align="right">TELEFONE :</div></td>
      <td colspan="3"><input name=telefone size="25" maxlength="50" value="<? echo $row['telefone']; ?>"> </td>
    </tr>
    <tr> 
      <td height="21"><div align="right">TIPO DE SALADA :</div></td>
      <td colspan="3"><input name=tipo_salada size="70" maxlength="50" value="<? echo $row['tipo_salada']; ?>"></td>
    </tr>
    <tr> 
      <td height="21"><div align="right">QUANTIDADE :</div></td>
      <td colspan="3"><input name=quantidade size="10" maxlength="50" value="<? echo $row['quantidade']; ?>"></td>
    </tr>
    <tr> 
      <td height="21"><div align="right">OBSERVAçõES :</div></td>
      <td colspan="3"><input name=observacoes size="70" maxlength="100" value="<? echo $row['observacoes']; ?>"></td>
    </tr>
    <tr> 
      <td height="21"><div align="right">SOJA :</div></td>
      <td colspan="3"><input name="soja" size="3" maxlength="3" value="<? echo $row['soja']; ?>"></td>
	<tr>
	  <td height="21"><div align="right">VISA VALE :</div></td>
      <td colspan="3"><input name="visa_vale" size="3" maxlength="3" value="<? echo $row['visa_vale']; ?>" ></td>
    </tr>
    <tr> 
      <td height="21"><div align="right">HOR&Aacute;RIO :</div></td>
      <td colspan="2"><input name="horario" size="8" maxlength="8" value="<? echo $row['horario']; ?>"></td>
      <td><div align="center"> 
          <input type="submit" value="GRAVAR";
	document.form1.submit()" name="submit">
        </div></td>
    </tr>
  </form>
</table>
<table width="80%" border="0" align="center" bgcolor="#CCCCCC">
  <tr> 
    <td width="23%">&nbsp; </td>
    <td width="33%">&nbsp;</td>
    <td width="16%">&nbsp;</td>
    <td width="28%"><form name="form2" method="get" action="editar_cliente.php">
        <input type="submit" name="Submit" value="SAIR">
      </form></td>
  </tr>
  <tr> 
    <td colspan="4"><hr></td>
  </tr>
</table>
<br>
<p align="center"><br>
  <font size="2" face="Verdana, Arial, Helvetica, sans-serif"></font></p>
<table width="100%" border="0" bgcolor="#CCCCCC">
  <tr>
    <td><div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"></font></strong></div></td>
  </tr>
</table>
<?
$dados=$_POST;

$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

list($nome)=array_values($dados);

$query="SELECT * FROM tabela_clientes WHERE nome LIKE '$nome'";

$result=mysql_query($query, $conn);

If (mysql_num_rows($result)==0)	{
	/* include("nao_encontrado.htm"); */
	} else {
		 while ($row=mysql_fetch_array($result) ) { 
		}
}
mysql_close($conn);
?>
</p>
</p>
</body>
</html>
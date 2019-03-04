<?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$dados=$_POST; 

list($preco_visa_vale)=array_values($dados);

/*$formata_preco_visa_vale = substr($preco_visa_vale,0,2) . "." .substr($preco_visa_vale,3,2);*/

$query="UPDATE tabela_preco_visa_vale SET preco_visa_vale='$preco_visa_vale'";

mysql_query($query, $conn);

if (mysql_affected_rows($conn)==1) {
	echo "";
	} else {
	include "atualizacao_preco_visa_erro.php";
	die;
}
mysql_close($conn);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML><HEAD><TITLE>Documento sem t&iacute;tulo</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></HEAD>

<style type="text/css">
<!--
A {
	COLOR: #000099; FONT-FAMILY: verdana; TEXT-DECORATION: none; FONT-WEIGHT: bold
}
A:hover {
	COLOR: #ff3300
}
.titulos {
filter:shadow(color=000000,direction=120);
height:5px;
font-family:verdana, arial, helvetica, sans-serif;
font-size:12px;
color:#ffff00;
}
table { 
background-color: #dfeff;
border:1;
font: 11px verdana, arial, helvetica, sans-serif;
color:#000000;
}
input { 
font: 11px verdana, arial, helvetica, sans-serif;
color:#000000;
}
-->
</style>

<body bgcolor="#000000">
<p align="center"><br>
</p>
<p align="center">&nbsp;</p>
  <table width="80%" bgcolor="#cccccc" border="0" align="center">
  <tr>
    <td><hr></td>
  </tr>
  <tr>	
    <td class="titulos"><div align="center"><strong><font color="#00CC99" size="5" face="Verdana">JOÃO & VAL Refeições Naturais</font></strong> </div></td>
  </tr>
</table>
<table width="80%" border="0" bgcolor="#CCCCCC" align="center">
  <tr> 
    <td class="titulos"> <div align="center"><strong><font color="#FFFFFF" size="4" face="Verdana, Arial, Helvetica, sans-serif">Resultado da Alteração do Preço Visa Vale</font></strong> </div>
  </tr>
  <tr>  
	<td><hr></td>
	</tr>
</table>
<?
$dados=$_POST;

$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$result=mysql_query("SELECT * FROM tabela_preco_visa_vale ORDER BY preco_visa_vale", $conn);

$row=mysql_fetch_array($result);

mysql_close($conn);

echo "<table width='80%' bgcolor=#cccccc align='center' border='0'>";
echo "	<tr>";
echo "    <td width=65% align=right><font face=Verdana size=2><b>Novo Preço do Visa Vale (R$): </font></b></td>";?>
<td width="35%" align="left"><font face="Verdana" size="2"><b><? echo number_format($row["preco_visa_vale"], "2", ",", "."); ?></font></td><?
echo "	</tr>";
echo "	<tr>";
echo "	  <td>&nbsp;</td>";
echo "	</tr>";
echo "</table>";
echo "<table width='80%' bgcolor=#cccccc align='center' border='0'>";
echo "	<tr>";
echo "    <td align=center><form name=form2 method=get action=administracao.php><input name=Enviar type=submit value='SAIR'></form></td>";
echo "	</tr>";
echo "	<tr>";
echo "	  <td><hr></td>";
echo "	</tr>";
echo "</table>";
?>
<p>&nbsp;</p>
</BODY>
</HTML>
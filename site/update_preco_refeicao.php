<?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$dados=$_POST; 

list($preco_ref)=array_values($dados);

/*$formata_preco_ref = substr($preco_ref,0,2) . "." .substr($preco_ref,3,2);*/

$query="UPDATE tabela_preco_refeicao SET preco_ref='$preco_ref'";

mysql_query($query, $conn);

if (mysql_affected_rows($conn)==1) {
	echo "";
	} else {
	include "atualizacao_preco_ref_erro.php";
	die;
}
mysql_close($conn);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML><HEAD><TITLE></TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></HEAD>

<style type="text/css">
<!--
A {
	COLOR: #000099; FONT-FAMILY: verdana; TEXT-DECORATION: none; FONT-WEIGHT: bold
}
A:hover {
	COLOR: #ff3300
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
table { 
font: 10px verdana, arial, helvetica, sans-serif;
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
    <td class="titulos"><div align="center"><strong><font face="Verdana" size="5" color="#00CC99">JOÃO & VAL Refeições Naturais</font></strong> </div></td>
  </tr>
</table>
<table width="80%" border="0" bgcolor="#CCCCCC" align="center">
  <tr> 
    <td class="titulos"> <div align="center"><strong><font face="Verdana, Arial, Helvetica, sans-serif" size="4" color="#FFFFFF">Resultado da Alteração do Preço da Refeição</font></strong> </div>
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

$result=mysql_query("SELECT * FROM tabela_preco_refeicao ORDER BY preco_ref", $conn);

$row=mysql_fetch_array($result);

mysql_close($conn);

echo "<table width='80%' bgcolor=#cccccc align='center' border='0'>";
echo "	<tr>";
echo "    <td width=65% align=right><font face=Verdana size=2><b>Novo Preço da Refeição (R$): </font></b></td>"; ?>
<td width="35%" align="left"><font face="Verdana" size="2"><b><? echo number_format($row["preco_ref"], "2", ",", "."); ?></font></td><?
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
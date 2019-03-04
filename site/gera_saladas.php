<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<style type="text/css">
<!--
table { 
background-color: #dfeff;
border:1;
font: 11px verdana, arial, helvetica, sans-serif;
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
font: 11px verdana, arial, helvetica, sans-serif;
}
-->
</style>
<body>
<?
$dados=$_POST["data_entrada"];

$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$query="SELECT * FROM tabela_pedidos WHERE data_pedido LIKE '$dados'";
$resultado=mysql_query($query, $conn);

if (mysql_num_rows($resultado)==0)	{
	include "./saladas_erro.php";
	die;
	} else { ?>
		<table width="100%" border="0" align="center" bgcolor="#CCCCCC">
  <tr> 
    <td width="50%" height="22" colspan="3"> <hr align="center"></td>
  </tr>
  <tr> 
    <td colspan="3" class="titulos"><div align="center"><strong><font size="7"><strong><font color="#00CC99" size="5">JOÃO 
        & VAL Refeições Naturais</font></strong></font><br>
        <br>
        <font color="#FFFFFF" size="4" face="Verdana, Arial, Helvetica, sans-serif"> 
        Consumo de Saladas do Dia : <? echo $dados ?></font><br>
        </strong></div></td>
  </tr>
  <tr> 
    <td height="22" colspan="3"><hr align="center"></td>
  </tr>
  <td width="50%"> 
</table>
<?
	$sql = mysql_query("SELECT * FROM tabela_pedidos WHERE data_pedido LIKE '$dados' AND observacoes LIKE '%SAL%'"); 
	$total = mysql_num_rows($sql);
	mysql_close($conn); ?>

<br>
<table width="50%" border="1" align="left">
  <tr>
    <td width="75%" bgcolor="#CCCCCC"> 
      <div align="right">TOTAL DE SALADAS :</div></td>
    <td align="center" width="25%" bgcolor="#CCCCCC"><? echo "$total"; ?></td>
  </tr>
</table>
<br>
<?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);
$sql = mysql_query("SELECT * FROM tabela_pedidos WHERE data_pedido LIKE '$dados' AND observacoes LIKE '%LEG%'"); 
$total = mysql_num_rows($sql);
mysql_close($conn); ?>
<br>
<table width="50%" border="1"  align="left">
  <tr>
    <td width="75%" bgcolor="#CCCCCC"> 
      <div align="right">TOTAL DE LEGUMES / ALFACE :</div></td>
    <td align="center" width="25%" bgcolor="#CCCCCC"><? echo "$total"; ?></td>
  </tr>
</table>
<br>
<br>
<hr align="center">
<? } 
echo "<table width=100% align=center border=0>";
echo "  <tr>"; 
echo "    <td width=50% align=right><form name=form1><input type=button value=Imprimir Onclick=window.print()></form></td>";
echo "    <td width=50% align=left><form name=form2 method=get action=operacoes_pedidos.php><input type=submit value=Fechar></form></td>";
echo "	</tr>";
echo "</table>";
?></p>
</p> 
<p>&nbsp;</p></body>
</html>
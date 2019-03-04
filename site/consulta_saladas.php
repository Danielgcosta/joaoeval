<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD><TITLE>Consulta Saladas e Legumes</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</HEAD>

<style type="text/css">
<!--
table { 
background-color: #cccccc;
border:1;
font: 11px verdana, arial, helvetica, sans-serif;
color:#000000;
}
input { 
background-color: #ffffff; 
font: 11px verdana, arial, helvetica, sans-serif;
color:#000000;
border:1px solid #999999;
}
-->
</style>
<?
$data_hoje = date("Y-m-d");
$novadata = substr($data_hoje,8,2) . "/" .substr($data_hoje,5,2) . "/" . substr($data_hoje,0,4);
?>
<body bgcolor="#000000">
  
<?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$sql = mysql_query("SELECT * FROM tabela_pedidos WHERE data_pedido LIKE '%$data_hoje%' AND observacoes LIKE '%SAL%'"); 
$total = mysql_num_rows($sql);
mysql_close($conn);

echo "<hr>";
echo "<br>";
echo "<table width=50% align=center>";
echo "  <tr>";
echo "    <td width=50%><b>Total de SAL :</b></td>";
echo "    <td width=50%>$total</td>";
echo "  </tr>";
echo "</table>";

$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$sql = mysql_query("SELECT * FROM tabela_pedidos WHERE data_pedido LIKE '%$data_hoje%' AND observacoes LIKE '%LEG%'"); 

$total = mysql_num_rows($sql);
mysql_close($conn);
echo "<table width=50% align=center>";
echo "  <tr>";
echo "    <td width=50%><b>Total de LEGALF :</b></td>";
echo "    <td width=50%>$total</td>";
echo "  </tr>";
echo "</table>";
echo "<br>";
echo "<hr>";
echo "<p><center><form method=get action=pedidos_clientes.php><input type='submit' value='SAIR'></form></center></p>";
echo "<br>";
?></p>
</body>
</html>
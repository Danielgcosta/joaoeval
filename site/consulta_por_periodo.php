<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD><TITLE>Consulta por Per&iacute;odo</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</HEAD>

<style type="text/css">
<!--
table { 
background-color: #dfeff;
border:1;
font: 11px verdana, arial, helvetica, sans-serif;
color:#000000;
}
input { 
background-color: #cccccc; 
font: 11px verdana, arial, helvetica, sans-serif;
color:#000000;
border:1px solid #999999;
}
-->
</style>
<body bgcolor="#000000">
<table width="100%" bgcolor="#cccccc" border="0" align="center">
  <tr> 
    <td><strong><font size="6">Refeições KOMA-BEM</font></strong></td>
    <td><strong><font color="#000000" size="3" face="Verdana, Arial, Helvetica, sans-serif">Consulta 
      de Pedidos por Per&iacute;odo </font></strong></td>
  </tr>
</table>
<hr align="center">
<br>
<?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$dados=$_POST;

list($data1, $data2)=array_values($dados);

$data_inicio = substr($data1,6,4) . "-" .substr($data1,3,2) . "-" . substr($data1,0,2);
$data_fim = substr($data2,6,4) . "-" .substr($data2,3,2) . "-" . substr($data2,0,2);

$resultado=mysql_query("SELECT * FROM tabela_pedidos WHERE data_pedido BETWEEN '$data_inicio' AND '$data_fim' ORDER BY andar");
mysql_query($resultado, $conn);

If (mysql_num_rows($resultado)==0)	{
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<b><font face=Verdana size=3 color=#ffffff><center>Não existem pedidos para o período solicitado.</b></font></center>";
	echo "<br>";
	echo "<table width=767 border=0>";
    echo "  <tr>";
    echo "<td><form name=form1 method=get action=exibe_pedidos_periodo.php>";
    echo "  <div align=center>";
    echo "<input type=submit name=Submit value=SAIR>";
    echo "    </div>";
    echo "   </form></td>";
    echo "</tr>";
    echo "</table>";
	die;
	} else {
		
		 echo "<b><font color=#000000 size=2 face=Verdana>PERÍODO SOLICITADO : $data1 a $data2</b></font>";
		 echo "<br><br>"; ?>
		 <table width="767" border="0">
  <tr>
    <td width="139">nome</td>
    <td width="33">andar</td>
    <td width="34">sala</td>
    <td width="64">telefone</td>
    <td width="22">SAL</td>
    <td width="41">QUANT</td>
    <td width="302">Observacoes</td>
    <td width="30">Soja</td>
    <td width="44">V Vale</td>
  </tr>
</table><?
		 while ($row=mysql_fetch_array($resultado) ) { 
		 	echo "<hr>";
			echo "<table width='100%' align='center'>";
			echo "  <tr>";
			echo "    <td align=left width=20%>".$row["nome"];"</td>";
			echo "    <td align=center width=5%>".$row["andar"];"</td>";
			echo "    <td align=center width=5%>".$row["sala"];"</td>";
			echo "    <td align=center width=10%>".$row["telefone"];"</td>";
			echo "    <td align=center width=5%>".$row["tipo_salada"];"</td>";
			echo "    <td align=center width=5%>".$row["quantidade"];"</td>";
			echo "    <td align=left width=45%>".$row["observacoes"];"</td>";
			echo "    <td align=center width=5%>".$row["soja"];"</td>";
			echo "    <td align=center width=5%>".$row["visa_vale"];"</td>";
			echo "  </tr>";
			echo "</table>";
		}
}
echo "<hr>";
mysql_close($conn);
?>
<br>
</body>
</html>
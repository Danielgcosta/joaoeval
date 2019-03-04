<?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$dados=$_POST;
list($id, $nome, $andar, $sala, $telefone, $tipo_salada, $quantidade, $observacoes, $soja, $visa_vale)=array_values($dados);
for ($i=0;$i<count($dados);$i++)	{	
	$query="INSERT INTO tabela_temp (id, andar, sala, nome, telefone, tipo_salada, quantidade, 	observacoes, soja, visa_vale) VALUES ('$id', '$andar', '$sala', '$nome', '$telefone', '$tipo_salada', '$quantidade', '$observacoes', '$soja', '$visa_vale')";
}
mysql_query($query, $conn);

// verifica se inseriu corretamente
if (mysql_affected_rows($conn)==1) {
	echo "";
	} else {
	echo "Erro : Pedidos não cadastrados!";
	die;
}
mysql_close($conn);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML><HEAD><TITLE>RESULTADO DO CADASTRO</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></HEAD>

<style type="text/css">
<!--
A {
	COLOR: #000099; FONT-FAMILY: verdana; TEXT-DECORATION: none; FONT-WEIGHT: bold
}
A:hover {
	COLOR: #ff3300
}
table { 
background-color: #dfeff;
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

<BODY bgcolor="#FFFFFF">
<hr>
<table width="100%" border="0">
  <tr> 
    <td width="21%"><div align="left"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nome</font></strong></div></td>
    <td width="6%"><div align="left"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Andar</font></strong></div></td>
    <td width="6%"><div align="left"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Sala</font></strong></div></td>
    <td width="7%"><div align="left"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Salada</font></strong></div></td>
    <td width="7%"><div align="left"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Quant.</font></strong></div></td>
    <td width="35%"><div align="left"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Observações</font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Soja</font></strong></div></td>
    <td><div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Visa 
        Vale</font></strong></div></td>
  </tr>
</table>
<?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$result=mysql_query("SELECT * FROM tabela_temp ORDER BY andar", $conn);

$row=mysql_fetch_array($result);

$date=$row["data_pedido"];
$date[7]="/";
$date[4]="/";

echo "<hr>";
while ($row=mysql_fetch_array($result) )	{
echo "<table width='100%' align='center' border='0'>";
echo "  <tr>";
echo "    <td width=21%>".$row["nome"];"</td>";
echo "    <td width=6% align=center>".$row["andar"];"</td>";
echo "    <td width=6%>".$row["sala"];"</td>";
echo "    <td width=7%>".$row["tipo_salada"];"</td>";
echo "    <td width=7%>".$row["quantidade"];"</td>";
echo "    <td width=40%>".$row["observacoes"];"</td>";
echo "    <td width=7%>".$row["soja"];"</td>";
echo "    <td>".$row["visa_vale"];"</td>";
echo "  </tr>";
echo "</table>";
}
echo "<hr>";
echo "<table width=100% border=0 bgcolor=#CCCCCC>";
echo "  <tr>"; 
echo "    <td align=center><input type='button' value='Imprimir' onClick='window.print()'></td>";
echo "  </tr>";
echo "</table>";
?>
</BODY>
</HTML>
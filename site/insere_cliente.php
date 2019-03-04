<?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$dados=$_POST; 

list($nome, $local, $andar, $sala, $telefone, $tipo_salada, $quantidade, $quant_salada, $observacoes, $soja, $visa_vale, $horario)=array_values($dados);

$query="INSERT INTO	tabela_clientes(nome, local, andar, sala, telefone, tipo_salada, quantidade, quant_salada, observacoes, soja, visa_vale, horario)
		VALUES ('$nome', '$local', '$andar', '$sala', '$telefone', '$tipo_salada', '$quantidade', '$quant_salada', '$observacoes', '$soja', '$visa_vale', '$horario')";

mysql_query($query, $conn);

// verifica se inseriu corretamente
if (mysql_affected_rows($conn)==1) {
	echo "";
	} else {
	echo "Erro : Cliente não cadastrado!";
	die;
}
mysql_close($conn);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML><HEAD><TITLE>Resultado da Inclusão de Cliente</TITLE>
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
}
-->
</style>

<body bgcolor="#000000">
<p align="center"><br>
  <font size="2" face="Verdana, Arial, Helvetica, sans-serif"></font></p>
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
    <td class="titulos"> <div align="center"><strong><font face="Verdana, Arial, Helvetica, sans-serif" size="4" color="#FFFFFF">Resultado da Inclusão do Cliente</font></strong> </div>
  </tr>
  <tr>  
	<td><hr></td>
	</tr>
</table>
<?
$dados=$_POST;

// consultar o registro inserido
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$result=mysql_query("SELECT * FROM tabela_clientes ORDER BY Id DESC", $conn);

$row=mysql_fetch_array($result);

mysql_close($conn);

echo "<table width='80%' bgcolor=#cccccc align='center' border='0'>";
echo "	<tr>";
echo "    <td width=50% align=right><b>Número do Cliente : </b></td>";
echo "    <td width=50% align=left>".$row["Id"];"</td>";
echo "	</tr>";
echo "</table>";
echo "<table width='80%' bgcolor=#cccccc align='center' border='0'>";
echo "  <tr>";
echo "    <td><hr></td>";
echo "  </tr>";
echo "</table>";
echo "<table width='80%' bgcolor=#cccccc align='center' border='0'>";
echo "  <tr>";
echo "    <td width=30% align=right><b>Nome :</b></td>";
echo "    <td width=70%>".$row["nome"];"</td>";
echo "  </tr>";
echo "  <tr>";
echo "    <td align=right><b>Local :</b></td>";
$get_local=$row['local'];
if ($get_local=='1')	{
	 $local='FORUM - 1º horário';
}
if ($get_local=='2')	{
  	 $local='FORUM - 2º horário';
}
if ($get_local=='3')	{
 	 $local='1ª VARA - 1º horário';
}
if ($get_local=='4')	{
 	 $local='2ª VARA - 1º horário';
}
if ($get_local=='5')	{
  	 $local='TRT';
}
if ($get_local=='6')	{
 	 $local='TRTL';
}
if ($get_local=='7')	{
 	 $local='Diversos';
}
if ($get_local=='8')	{
 	 $local='JA';
}
if ($get_local=='9')	{
 	 $local='JB';
}
if ($get_local=='10')	{
 	 $local='J1';
}
if ($get_local=='11')	{
 	 $local='J2';
}
if ($get_local=='12')	{
 	 $local='TA';
}
if ($get_local=='13')	{
 	 $local='AC';
}
echo "<td>$local</td>";
echo "  </tr>";
echo "  <tr>";
echo "    <td align=right><b>Andar :</b></td>";
echo "    <td>".$row["andar"];"</td>";
echo "  </tr>";
echo "  <tr>";
echo "    <td align=right><b>Sala :</b></td>";
echo "    <td>".$row["sala"];"</td>";
echo "  </tr>";
echo "  <tr>";
echo "    <td align=right><b>Telefone :</b></td>";
echo "    <td>".$row["telefone"];"</td>";
echo "  </tr>";
echo "  <tr>";
echo "    <td align=right><b>Tipo de Salada :</b></td>";
echo "    <td>".$row["tipo_salada"];"</td>";
echo "  </tr>";
echo "  <tr>";
echo "    <td align=right><b>Quantidade :</b></td>";
echo "    <td>".$row["quantidade"];"</td>";
echo "  </tr>";
echo "  <tr>";
echo "    <td align=right><b>Quant Sal :</b></td>";
echo "    <td>".$row["quant_salada"];"</td>";
echo "  </tr>";
echo "  <tr>";
echo "    <td align=right><b>Observações :</b></td>";
echo "    <td>".$row["observacoes"];"</td>";
echo "  </tr>";
echo "  <tr>";
echo "    <td align=right><b>Soja :</b></td>";
echo "    <td>".$row["soja"];"</td>";
echo "  </tr>";
echo "  <tr>";
echo "    <td align=right><b>Visa Vale :</b></td>";
echo "    <td>".$row["visa_vale"];"</td>";
echo "  </tr>";
echo "  <tr>";
echo "    <td align=right><b>Horário :</b></td>";
echo "    <td>".$row["horario"];"</td>";
echo "  </tr>";
echo "</table>";
echo "<table width='80%' bgcolor=#cccccc align='center' border='0'>";
echo "  <tr>";
echo "    <td><hr></td>";
echo "  </tr>";
echo "</table>";
echo "<br>";
echo "<table width=80% border=0 align=center>";
echo "  <tr>"; 
echo "    <td width=55% align=right><form name=form2 method=get action=incluir_cliente.php><input name=Enviar type=submit value='INCLUIR OUTRO'></form></td>";
echo "    <td width=45% align=left><form name=form3 method=get action=menu_cadastro.php><input name=Enviar type=submit value='SAIR'></form></td>";
echo "  </tr>";
echo "  </tr>";
echo "</table>";
?>
</BODY>
</HTML>
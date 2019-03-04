<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script language="JavaScript">
function validateField(printAdjustment)	
{
	if (printAdjustment.value==""){
		printAdjustment.value="0";
		reload();
		return true;}
	if (printAdjustment.value>="0"){
		reload();
		return true;}
	if (printAdjustment.value<"0"){
		reload();
		return true;}
	else
	{
		alert ("Valor Inválido!");
		return false;}
	return true;
}	
function printAdjustmentSize(printAdjustment)	
{
	for ($i=0; $i<=printAdjustment; $i++)
	{
		echo "<br>";
	}
	return;
}

</script>
<style type="text/css" >
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;    
}
tr {
	text-align: center; 
}
</style>
<body>
<?
$data_etiquetas=$_POST["data_entrada"];

if($printAdjustment == null)
{
	$printAdjustment = 0;
}

$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$sql = mysql_query("SELECT * FROM tabela_pedidos WHERE data_pedido LIKE '$data_etiquetas' ORDER BY nome");
$total = mysql_num_rows($sql);
?>
<table width="80%" align="center">
  <tr> 
    <td align="center" height="28"><b>Etiquetas de Pedidos do dia : <? echo $data_etiquetas; ?></b></td>
  </tr>
  <tr> 
    <td align="center" height="28"><b>Total: <? echo $total; ?></b></td>
  </tr>
  <tr> 
    <td height="10"><hr align="center"></td>
  </tr>
</table>

<table style="width:710" height=auto align="center" border=0>
  <tr align:center>
	<td width=100></td>
    <td width=100 align:justify><form name=form1><input type=button value=Imprimir  Onclick=window.print()></form></td>
    <td width=100 align:justify><form name=form2 method=get action=operacoes_pedidos.php><input type=submit value=Fechar></form></td>    
	<td width=50></td>
	
    <td width=160 align=justify><font face=Arial size=2><b>Ajuste de impressão: </b></font></td>
    <td width=50 align=justify><input name=printAdjustment size=6 maxlength=6></td>
	<td width=50 align:justify><form name=form3><input type=button value=Ajustar Onclick=ajustarCallback(printAdjustment)></form></td>
	<td width=100></td>

<!--	
  <form name="form1" method="post" action="update_preco_visa_vale.php" onSubmit="return valida_campo(this)">
  
    <tr> 
      <td width=19> 
        <div align="right"></div></td>
      <td width=127><div align="right">PREÇO ATUAL (R$) :</div></td>
      <td width=81><b></b><? #echo number_format($row['preco_visa_vale'], "2", ",", "."); ?></b></td>
      <td width=142><div align="right">NOVO PREÇO (R$) :</div></td>
      <td width=94><input name=preco_ref size="8" maxlength="6"> </td>
      <td width=113><div align="center"> 
          <input type="submit" value="GRAVAR";
	document.form1.submit()" name="submit">
        </div></td>
    </tr>
  -->
  
  </tr>
  </table>
<table width=710 border=1 cellspacing=5 cellpadding=11 align=center>
<?
$colunas = "3";

if ($total>0) { 
	for ($i = 0; $i<$total; $i++) { 
		if (($i%$colunas)==0) { 
			echo "</tr>"; 
			echo "<tr>"; 
		} 
	$dados = mysql_fetch_array($sql);
	$nome = $dados["nome"];
	$andar = $dados["andar"];
	$sala = $dados["sala"];
	$tipo_salada = $dados["tipo_salada"];
	$observacoes = $dados["observacoes"];
	$quantidade = $dados["quantidade"];
	$soja = $dados["soja"];
	echo "<td width=300><font face=Arial size=2><b>$nome</b><br>Andar : $andar<br>Sala : $sala<br>OBS: $observacoes<br></font></td>";
	}
} else {
	include "./etiquetas_erro.php";
	die;
}
?>
</table>
</body>
</html>

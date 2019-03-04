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
$data_etiquetas=$dados;
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$sql = mysql_query("SELECT * FROM tabela_pedidos WHERE data_pedido LIKE '$dados' ORDER BY nome");
$total = mysql_num_rows($sql);
?>
<table width="80%" border=0 align="center" bgcolor="#CCCCCC">
  <tr> 
    <td width="80%"><hr align="center"></td>
  </tr>
  <tr> 
    <td class="titulos"><div align="center"> 
        <p><font color="#00CC99" size="5" face="Verdana, Arial, Helvetica, sans-serif"><strong>JOÃO 
          & VAL Refeições Naturais</strong></font></p>
        <p><strong><font color="#FFFFFF" size="4" face="Verdana, Arial, Helvetica, sans-serif"> 
          Etiquetas de Pedidos do dia : <? echo $data_etiquetas; ?></font></strong></p>
      </div></td>
  </tr>
  <tr> 
    <td align="center" height="28"><b></b></td>
  </tr>
  <tr> 
    <td align="center" height="28"><b>TOTAL DE ETIQUETAS GERADAS : <? echo $total; ?></b></td>
  </tr>
  <tr> 
    <td height="28"><hr align="center"></td>
  </tr>
  </table>
<?
  echo "<br>";
  echo "<table width=100% align=center border=0>";
  echo "  <tr>"; 
  echo "    <td width=50% align=right><form name=form1><input type=button value=Imprimir  Onclick=window.print()></form></td>";
  echo "    <td width=50% align=left><form name=form2 method=get action=operacoes_pedidos.php><input type=submit value=Fechar></form></td>";
  echo "	</tr>";
  echo "</table>";

for ($i=0; $i<=51; $i++)	{
	echo "<br>";
}
echo "<table width=710 border=1 cellspacing=5 cellpadding=11>";
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
</body>
</html>

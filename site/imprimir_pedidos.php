<STYLE type="text/css">
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
input { 
font: 10px verdana, arial, helvetica, sans-serif;
color:#000000;
}
select { 
font: 10px verdana, arial, helvetica, sans-serif;
color:#000000;
}
</STYLE>
<title>Documento sem t&iacute;tulo</title>
<body>
<?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("N�o foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$dados=$_POST;
list($data_entrada)=array_values($dados);

$query="SELECT * FROM tabela_pedidos WHERE data_pedido LIKE '$data_entrada' ORDER BY local, horario, andar DESC, sala";
$result=mysql_query($query, $conn);
$total_clientes=mysql_num_rows($result);

$query_legalf="SELECT * FROM tabela_pedidos WHERE data_pedido LIKE '$data_entrada' AND tipo_salada LIKE 'LG'";
$result_legalf=mysql_query($query_legalf, $conn);
$total_legalf=mysql_num_rows($result_legalf);

$query_saleg="SELECT * FROM tabela_pedidos WHERE data_pedido LIKE '$data_entrada' AND tipo_salada LIKE 'SL'";
$result_saleg=mysql_query($query_saleg, $conn);
$total_saleg=mysql_num_rows($result_saleg);

$query_sal="SELECT * FROM tabela_pedidos WHERE data_pedido LIKE '$data_entrada' AND tipo_salada LIKE 'S'"; 
$result_sal=mysql_query($query_sal, $conn);
$total_sal=mysql_num_rows($result_sal);

$query_leg="SELECT * FROM tabela_pedidos WHERE data_pedido LIKE '$data_entrada' AND tipo_salada LIKE 'L'";
$result_leg=mysql_query($query_leg, $conn);
$total_leg=mysql_num_rows($result_leg);

$query_sleg="SELECT * FROM tabela_pedidos WHERE data_pedido LIKE '$data_entrada' AND tipo_salada AND 'SLEG'"; 
$result_sleg=mysql_query($query_sleg, $conn);
$total_sleg=mysql_num_rows($result_sleg);

$query_c="SELECT * FROM tabela_pedidos WHERE data_pedido LIKE '$data_entrada' AND tipo_salada LIKE 'C'"; 
$result_c=mysql_query($query_c, $conn);
$total_c=mysql_num_rows($result_c);

$query_ml="SELECT * FROM tabela_pedidos WHERE data_pedido LIKE '$data_entrada' AND tipo_salada LIKE 'ML'"; 
$result_ml=mysql_query($query_ml, $conn);
$total_ml=mysql_num_rows($result_ml);

$query_sd="SELECT * FROM tabela_pedidos WHERE data_pedido LIKE '$dados' AND tipo_salada LIKE 'SD'"; 
$result_sd=mysql_query($query_sd, $conn);
$total_sd=mysql_num_rows($result_sd);

$query_vale_sim="SELECT * FROM tabela_pedidos WHERE data_pedido LIKE '$data_entrada' AND visa_vale LIKE 'Sim'"; 
$result_vale_sim=mysql_query($query_vale_sim, $conn);
$total_vale_sim=mysql_num_rows($result_vale_sim);

$query_vale_nao="SELECT * FROM tabela_pedidos WHERE data_pedido LIKE '$data_entrada' AND visa_vale LIKE 'N�o'"; 
$result_vale_nao=mysql_query($query_vale_nao, $conn);
$total_vale_nao=mysql_num_rows($result_vale_nao);

/*if (mysql_num_rows($result)==0)	{
	include "./imprimir_pedido_erro.php";
    die;
} else {*/
	echo "<table width=101% border=0 align=center bgcolor=#CCCCCC>";
	echo "<tr>"; 
	echo "<td width=101% height=22><hr align=center></td>";
	echo "</tr>";
    echo "<tr>"; 
    echo "<td class=titulos><div align=center><strong><font size=7><strong><font color=#00CC99 size=5>JO�O & VAL Refei��es Naturais</font></strong></font><br>";
    echo "<br><font color=#FFFFFF size=4 face=Verdana>Consulta de Pedidos do Dia : $data_entrada</font><br></strong></div></td>";
    echo "</tr>";
    echo "<tr>"; 
    echo "<td height=22></td>";
    echo "</tr>";
    echo "</table>";
	$soma_c=0;
	$soma_l=0;
	$soma_lg=0;
	$soma_ml=0;
	$soma_s=0;
	$soma_sl=0;
	$soma_sleg=0;
	$soma_sd=0;
	$total_refeicao=0;
	$valor_refeicao=0;
	$valor_visa_vale=0;
	$valor_total=0;
	echo "<table width=100% border=1 bgcolor=#cccccc cellspacing=0 cellpadding=4>";
	echo "<tr>"; 
	echo "<td align=center><b>Nome</b></td>";
	/*echo "<td align=center><b>Local</b></td>";*/
	echo "<td align=center><b>Andar</b></td>";
	echo "<td align=center><b>Sala</b></td>";
	echo "<td align=center><b>Telefone</b></td>";
	echo "<td align=center><b>Sal</b></td>";
	echo "<td align=center><b>Qd</b></td>";
    echo "<td align=center><b>Observa��es/Predile��es</b></td>";
	echo "<td align=center><b>Hora</b></td>";
	echo "</tr>";
	while ($row=mysql_fetch_array($result) ) { 
	   $total_refeicao+=$row["quantidade"];	
	   $s=$row["tipo_salada"];
	   if ($s=='S')	{
	   	  $soma_s+=$row["quantidade"];
	   }
	   $sl=$row["tipo_salada"];
	   if ($sl=='SL')	{
	   	  $soma_sl+=$row["quantidade"];
	   }
	   $l=$row["tipo_salada"];
	   if ($l=='L')	{
	   	  $soma_l+=$row["quantidade"];
	   }
	   $lg=$row["tipo_salada"];
	   if ($lg=='LG')	{
	   	  $soma_lg+=$row["quantidade"];
	   }
	   $sleg=$row["tipo_salada"];
	   if ($sleg=='SLEG')	{
	   	  $soma_sleg+=$row["quantidade"];
	   }
	   $c=$row["tipo_salada"];
	   if ($c=='C')	{
	   	  $soma_c+=$row["quantidade"];
	   }
	   $ml=$row["tipo_salada"];
	   if ($ml=='ML')	{
	   	  $soma_ml+=$row["quantidade"];
	   }
	   $sd=$row["tipo_salada"];
	   if ($sd=='SD')	{
	   	  $soma_sd+=$row["quantidade"];
	   }
	$valor_refeicao+=$row["valor_ref"];
   	$valor_visa_vale+=$row["valor_visa_vale"];	   
 	echo "<tr>"; 
   	echo "<td align=left>".$row["nome"];"</td>";
	/*echo "<td align=center>".$row["local"];"</td>";*/
	echo "<td align=center>".$row["andar"];"</td>";
   	echo "<td align=center>".$row["sala"];"</td>";
    echo "<td align=center>".$row["telefone"];"</td>";
   	echo "<td align=center>".$row["tipo_salada"];"</td>";
   	echo "<td align=center>".$row["quantidade"];"></td>";
   	echo "<td align=left>".$row["observacoes"];"</td>";
	echo "<td align=center>".$row["horario"];"</td>"; 
	echo "</tr>";
	}
	echo "</table>";
	$valor_total=$valor_refeicao+$valor_visa_vale;
	mysql_close($conn);
	$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
	if (!$conn) die("N�o foi possivel conectar"); 
	mysql_select_db("u581370309_dados", $conn);
	$query="SELECT * FROM tabela_pedidos WHERE data_pedido='$data_entrada'";
	$resultado=mysql_query($query, $conn);
	while ($row=mysql_fetch_array($resultado) ) { 
		$valor_normal=$row["preco_refeicao"];
	}
	mysql_close($conn);
	$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
	if (!$conn) die("N�o foi possivel conectar"); 
	mysql_select_db("u581370309_dados", $conn);
	$query="SELECT * FROM tabela_pedidos WHERE data_pedido='$data_entrada'";
	$resultado=mysql_query($query, $conn);
	while ($row=mysql_fetch_array($resultado) ) { 
		$valor_vale=$row["preco_vale"];
	}
	mysql_close($conn);
?>
<br>
<hr align="center">
<p>
<table width="100%" border="0" align="left">
  <tr> 
    <td><strong>TOTAL DE CLIENTES :</strong></td>
    <td> <div align="right"><? echo $total_clientes; ?></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td><strong>TOTAL DE REFEI��ES :</strong></td>
    <td><div align="right"><? echo $total_refeicao; ?></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td><strong>PRE�OS DA REFEI��O :</strong></td>
    <td>&nbsp;</td>
    <td><div align="right"></div></td>
  </tr>
  <tr> 
    <td> PARA PAGTO NORMAL (R$) :</td>
    <td><div align="right"><? echo number_format($valor_normal, "2", ",", "."); ?></div></td>
    <td><div align="right"></div></td>
  </tr>
  <tr> 
    <td>PARA PAGTO C/ VISA VALE (R$) :</td>
    <td><div align="right"><? echo number_format($valor_vale, "2", ",", "."); ?></div></td>
    <td><div align="right"></div></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td><strong>TIPOS DE PAGAMENTOS :</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td>TOTAL DE CLIENTES PAGTO NORMAL :</td>
    <td><div align="right"><? echo $total_vale_nao; ?></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td>TOTAL DE CLIENTES PAGTO C/ VISA VALE :</td>
    <td><div align="right"><? echo $total_vale_sim; ?></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td><strong>SALADAS :</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td>TOTAL DE LEGALF (Legumes/Alface) :</td>
    <td><div align="right"><? echo $soma_lg; ?></div></td>
    <td></td>
  </tr>
  <tr> 
    <td>TOTAL DE SALEG (Legumes) :</td>
    <td><div align="right"><? echo $soma_sl; ?></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td>TOTAL DE SAL (Salada) :</td>
    <td><div align="right"><? echo $soma_s; ?></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td height="15">TOTAL DE LEG (Legumes) :</td>
    <td><div align="right"><? echo $soma_l; ?></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td>TOTAL DE SLEG (Super Legumes) :</td>
    <td><div align="right"><? echo $soma_sleg; ?></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td height="15">TOTAL DE C (Salada Comum) :</td>
    <td><div align="right"><? echo $soma_c; ?></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td>TOTAL DE MLEG :</td>
    <td><div align="right"><? echo $soma_ml; ?></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td>TOTAL DE SALDE :</td>
    <td><div align="right"><? echo $soma_sd; ?></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td><strong> VALORES :</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td width="33%">TOTAL REFEI��O NORMAL (R$) : </td>
    <td align="right" width="7%"><? echo number_format($valor_refeicao, "2", ",", "."); ?></td>
    <td align="right" width="60%">&nbsp;</td>
  </tr>
  <tr> 
    <td>TOTAL REFEI��O C/ VISA VALE (R$) : </td>
    <td align="right"><? echo number_format($valor_visa_vale, "2", ",", "."); ?></td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr> 
    <td>TOTAL GERAL (R$) : </td>
    <td align="right"><? echo number_format($valor_total, "2", ",", "."); ?></td>
    <td align="right">&nbsp;</td>
  </tr>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br>
<br>
<br>
<br>
<br>
<hr align="center">
<table width="100%" border="0">
  <tr>
    <td width="48%"><form name="form1" method="" action="">
        <div align="right">
          <input type="button" name="imprimir" value="IMPRIMIR" OnClick="window.print()">
        </div>
      </form></td>
    <td width="52%"><form name="form2" method="get" action="principal.php">
        <input type="submit" name="Submit2" value="FECHAR">
      </form></td>
  </tr>
</table>
</body>
</html>
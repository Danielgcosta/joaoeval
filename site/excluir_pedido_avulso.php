<STYLE type="text/css">
A {
	COLOR: #000000; FONT-FAMILY: verdana; TEXT-DECORATION: none
}
A:hover {
	COLOR: #ffcf00
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
input { 
font: 10px verdana, arial, helvetica, sans-serif;
color:#000000;
}
</STYLE>
<?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

/*require_once('..\www\pedidos_clientes.php');*/

$dados=@$_POST['excluir'];
	for ($i=0;$i<count($dados);$i++)	{
		mysql_query("DELETE FROM tabela_temp_avulsa WHERE id=$dados[$i]");
	}
mysql_close($conn);

$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$copia=mysql_query("INSERT INTO tabela_pedidos_avulsos (data_pedido, id, nome, andar, sala, telefone, tipo_salada, quantidade, observacoes, soja, visa_vale, horario, preco_refeicao, preco_vale, valor_ref, valor_visa_vale, situacao) 	
 			SELECT * FROM tabela_temp_avulsa");
mysql_query($copia, $conn);

$deleta_tabela_temp = "DROP TABLE tabela_temp_avulsa";
mysql_query($deleta_tabela_temp, $conn); 
mysql_close($conn);

$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$dados=$_POST["data_pedido"];

?>
<table width="100%" border="0" align="center" bgcolor="#CCCCCC">
    <tr> 
      <td width="100%" height="22"> <hr align="center"></td>
    </tr>
    <tr> 
      <td class="titulos"><div align="center"><strong><font size="7"><strong><font color="#00CC99" size="5">JOÃO 
          & VAL Refeições Naturais</font></strong></font><br>
          <br>
        <font color="#FFFFFF" size="4" face="Verdana, Arial, Helvetica, sans-serif"> 
        Pedidos Avulsos para o Dia : <? echo $dados ?></font><br>
          </strong></div></td>
    </tr>
    <tr> 
      <td height="22"></td>
    </tr>
</table>
<?
$query="SELECT * FROM tabela_pedidos_avulsos WHERE data_pedido LIKE '$dados' ORDER BY horario, andar DESC";
$result=mysql_query($query, $conn);
$total_clientes=mysql_num_rows($result);

$query_legalf="SELECT * FROM tabela_pedidos_avulsos WHERE data_pedido LIKE '$dados' AND tipo_salada LIKE 'LG'";
$result_legalf=mysql_query($query_legalf, $conn);
$total_legalf=mysql_num_rows($result_legalf);

$query_saleg="SELECT * FROM tabela_pedidos_avulsos WHERE data_pedido LIKE '$dados' AND tipo_salada LIKE 'SL'";
$result_saleg=mysql_query($query_saleg, $conn);
$total_saleg=mysql_num_rows($result_saleg);

$query_sal="SELECT * FROM tabela_pedidos_avulsos WHERE data_pedido LIKE '$dados' AND tipo_salada LIKE 'S'"; 
$result_sal=mysql_query($query_sal, $conn);
$total_sal=mysql_num_rows($result_sal);

$query_leg="SELECT * FROM tabela_pedidos_avulsos WHERE data_pedido LIKE '$dados' AND tipo_salada LIKE 'L'";
$result_leg=mysql_query($query_leg, $conn);
$total_leg=mysql_num_rows($result_leg);

$query_sleg="SELECT * FROM tabela_pedidos_avulsos WHERE data_pedido LIKE '$dados' AND tipo_salada AND 'SLEG'"; 
$result_sleg=mysql_query($query_sleg, $conn);
$total_sleg=mysql_num_rows($result_sleg);

$query_c="SELECT * FROM tabela_pedidos_avulsos WHERE data_pedido LIKE '$dados' AND tipo_salada LIKE 'C'"; 
$result_c=mysql_query($query_c, $conn);
$total_c=mysql_num_rows($result_c);

$query_ml="SELECT * FROM tabela_pedidos_avulsos WHERE data_pedido LIKE '$dados' AND tipo_salada LIKE 'ML'"; 
$result_ml=mysql_query($query_ml, $conn);
$total_ml=mysql_num_rows($result_ml);

$query_sd="SELECT * FROM tabela_pedidos_avulsos WHERE data_pedido LIKE '$dados' AND tipo_salada LIKE 'SD'"; 
$result_sd=mysql_query($query_sd, $conn);
$total_sd=mysql_num_rows($result_sd);

$query_vale_sim="SELECT * FROM tabela_pedidos_avulsos WHERE data_pedido LIKE '$dados' AND visa_vale LIKE 'Sim'"; 
$result_vale_sim=mysql_query($query_vale_sim, $conn);
$total_vale_sim=mysql_num_rows($result_vale_sim);

$query_vale_nao="SELECT * FROM tabela_pedidos_avulsos WHERE data_pedido LIKE '$dados' AND visa_vale LIKE 'Não'"; 
$result_vale_nao=mysql_query($query_vale_nao, $conn);
$total_vale_nao=mysql_num_rows($result_vale_nao);

$valor_refeicao=0;
$valor_visa_vale=0;
$valor_total=0;

if (mysql_num_rows($result)>=1)	{ 
	echo "<table width=100% border=1 bgcolor=#cccccc cellspacing=0 cellpadding=1>";
	echo "<tr>"; 
    echo "<th width=20% height=22% scope=col>Nome</th>";
    echo "<th width=8% scope=col>Horário</th>";
	echo "<th width=5% scope=col>Andar</th>";
    echo "<th width=8% scope=col>Sala</th>";
    echo "<th width=10% scope=col>Telefone</th>";
    echo "<th width=5% scope=col>Sal</th>";
    echo "<th width=5% scope=col>Quant</th>";
    echo "<th width=20% scope=col>Observações/Predileções</th>";
    echo "<th width=5% scope=col>Soja</th>";
    echo "<th width=5% scope=col>V Vale</th>";
    echo "</tr>";
	echo "</table>";
	while ($row=mysql_fetch_array($result) ) { 
	   $valor_refeicao+=$row["valor_ref"];
       $valor_visa_vale+=$row["valor_visa_vale"];	   
	   echo "<table width=100% border=1 bgcolor=#cccccc cellspacing=0 cellpadding=5>";
	   echo "<tr>"; 
       echo "<td width=20% height=22%>".$row["nome"];"</td>";
       echo "<td align=center width=8%>".$row["horario"];"</td>";
	   echo "<td align=center width=5%>".$row["andar"];"</td>";
       echo "<td align=center width=8%>".$row["sala"];"</td>";
       echo "<td align=center width=10%>".$row["telefone"];"></td>";
       echo "<td align=center width=5%>".$row["tipo_salada"];"</td>";
       echo "<td align=center width=5%>".$row["quantidade"];"></td>";
       echo "<td width=20%>".$row["observacoes"];"</td>";
       echo "<td align=center width=5%>".$row["soja"];"</td>";
       echo "<td align=center width=5%>".$row["visa_vale"];"</td>";
       echo "</tr>";
	   echo "</table>";
	 }
}
$valor_total=$valor_refeicao+$valor_visa_vale;

$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);
$query="SELECT * FROM tabela_preco_refeicao";
$resultado=mysql_query($query, $conn);
while ($row=mysql_fetch_array($resultado) ) { 
	$valor_normal=$row["preco_ref"];
}
mysql_close($conn);

$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);
$query="SELECT * FROM tabela_preco_visa_vale";
$resultado=mysql_query($query, $conn);
while ($row=mysql_fetch_array($resultado) ) { 
	$valor_vale=$row["preco_visa_vale"];
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td><strong>PREÇOS DA REFEIçãO :</strong></td>
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
    <td><div align="right"><? echo $total_legalf; ?></div></td>
    <td></td>
  </tr>
  <tr> 
    <td>TOTAL DE SALEG (Legumes) :</td>
    <td><div align="right"><? echo $total_saleg; ?></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td>TOTAL DE SAL (Salada) :</td>
    <td><div align="right"><? echo $total_sal; ?></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td height="15">TOTAL DE LEG (Legumes) :</td>
    <td><div align="right"><? echo $total_leg; ?></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td>TOTAL DE SLEG (Super Legumes) :</td>
    <td><div align="right"><? echo $total_sleg; ?></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td height="15">TOTAL DE C (Salada Comum) :</td>
    <td><div align="right"><? echo $total_c; ?></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td>TOTAL DE MLEG :</td>
    <td><div align="right"><? echo $total_ml; ?></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td>TOTAL DE SALDE :</td>
    <td><div align="right"><? echo $total_sd; ?></div></td>
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
    <td width="33%">TOTAL REFEIçãO NORMAL (R$) : </td>
    <td align="right" width="7%"><? echo number_format($valor_refeicao, "2", ",", "."); ?></td>
    <td align="right" width="60%">&nbsp;</td>
  </tr>
  <tr> 
    <td>TOTAL REFEIçãO C/ VISA VALE (R$) : </td>
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
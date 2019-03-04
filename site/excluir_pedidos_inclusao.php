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
		mysql_query("DELETE FROM tabela_temp_inclusao WHERE id=$dados[$i]");
	}
mysql_close($conn);

$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$copia=mysql_query("INSERT INTO tabela_pedidos (data_pedido, id, nome, local, andar, sala, telefone, tipo_salada, quantidade, quant_salada, observacoes, soja, visa_vale, horario, preco_refeicao, preco_vale, valor_ref, valor_visa_vale) 	
 			SELECT * FROM tabela_temp_inclusao");
mysql_query($copia, $conn);

$mostra_inclusao = mysql_query("SELECT * FROM tabela_temp_inclusao order by local, horario, andar DESC, sala");
mysql_query($mostra_inclusao);

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
        Clientes Inclu&iacute;dos nos Pedidos do Dia : <? echo $dados ?></font><br>
          </strong></div></td>
    </tr>
    <tr> 
      <td height="22"></td>
    </tr>
</table>
<?
/*insere situacao*/
$insere_situacao = "UPDATE tabela_pedidos SET situacao='Pendente' WHERE data_pedido='$dados'";
mysql_query($insere_situacao, $conn);

if (mysql_num_rows($mostra_inclusao)>=1)	{ 
	echo "<table width=100% border=1 bgcolor=#cccccc cellspacing=0 cellpadding=5>";
	echo "<tr>"; 
    echo "<td align=center><b>Nome</b></td>";
	echo "<td align=center><b>Local</b></td>";
    echo "<td align=center><b>Hora</b></td>";
	echo "<td align=center><b>Andar</b></td>";
    echo "<td align=center><b>Sala</b></td>";
    echo "<td align=center><b>Telefone</b></td>";
    echo "<td align=center><b>Sal</b></td>";
    echo "<td align=center><b>Quant</b></td>";
    echo "<td align=center><b>Observações/Predileções</b></td>";
    echo "</tr>";
	while ($row=mysql_fetch_array($mostra_inclusao) ) { 
	   echo "<tr>"; 
       echo "<td align=left>".$row["nome"];"</td>";
	   echo "<td align=center>".$row["local"];"</td>";
       echo "<td align=center>".$row["horario"];"</td>";
	   echo "<td align=center>".$row["andar"];"</td>";
       echo "<td align=center>".$row["sala"];"</td>";
       echo "<td align=center>".$row["telefone"];"></td>";
       echo "<td align=center>".$row["tipo_salada"];"</td>";
       echo "<td align=center>".$row["quantidade"];"></td>";
       echo "<td align=left>".$row["observacoes"];"</td>";
       echo "</tr>";
	 }
	  echo "</table>";
}
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

$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);
$deleta_tabela_temp = "DROP TABLE tabela_temp_inclusao";
mysql_query($deleta_tabela_temp, $conn); 
mysql_close($conn);
?>
<p>
<br>
<hr align="center">
<table width="100%" border="0">
  <tr> 
    <td> <form name="form2" method="get" action="principal.php">
        <div align="center">
          <input type="submit" name="Submit2" value="FECHAR">
        </div>
      </form></td>
  </tr>
</table>
</body>
</html>
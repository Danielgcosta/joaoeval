<STYLE type="text/css">
table { 
font: 10px verdana, arial, helvetica, sans-serif;
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
font: 10px verdana, arial, helvetica, sans-serif;
color:#000000;
}
</STYLE>
<title>Relação de Clientes</title>
<body>
<p>
<?
$data = date("Y-m-d");
$hora = date("H:i:s");
$nova_data = substr($data,8,2) . "/" .substr($data,5,2) . "/" . substr($data,0,4);

$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$query = "SELECT * FROM tabela_clientes ORDER BY nome";
$resultado = mysql_query($query, $conn) or die(mysql_error());
$total = mysql_num_rows($resultado);
?>
</p>
<table width="101%" border="0" align="center" bgcolor="#CCCCCC">
  <tr> 
    <td height="22"><hr align="center"></td>
  </tr>
  <tr> 
    <td class="titulos"><div align="center"><strong><font size="7"><strong><font color="#00CC99" size="5">JOÃO 
        & VAL Refeições Naturais</font></strong></font><br>
        <br>
        <font color="#FFFFFF" size="4" face="Verdana, Arial, Helvetica, sans-serif">Relação 
        de Clientes Ordenada por Nome<br>
        <br>
        </font><font color="#ffffff" size="4" face="Verdana, Arial, Helvetica, sans-serif"><? echo $total;?> 
        Clientes em : </font></strong><strong><font color="#ffffff" size="4" face="Verdana, Arial, Helvetica, sans-serif"><? echo $nova_data." - ".$hora;?></font><br>
        </strong></div></td>
  </tr>
  <tr> 
    <td height="22"><hr align="center"></td>
  </tr>
</table>
<div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong><br>
  </strong></font> 

</div>
<?
echo "<table width=100% border=1 bgcolor=#cccccc cellspacing=0 cellpadding=4>";
	echo "<tr>"; 
    echo "<td align=center><b>Nome</b></td>";
	echo "<td align=center><b>Local</b></td>";
    echo "<td align=center><b>Hora</b></td>";
	echo "<td align=center><b>Andar</b></td>";
    echo "<td align=center><b>Sala</b></td>";
	echo "<td align=center><b>Telefone</b></td>";
    echo "<td align=center><b>Sal</b></td>";
    echo "<td align=center><b>Qd</b></td>";
    echo "<td align=center><b>Observações/Predileções</b></td>";
    echo "</tr>";
	while ($row=mysql_fetch_array($resultado) ) { 
	   echo "<tr>";
	   echo "<td align=left>".$row["nome"];"</td>";
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
	   echo "<td align=center>$local</td>";
       echo "<td align=center>".$row["horario"];"</td>";
	   echo "<td align=center>".$row["andar"];"</td>";
       echo "<td align=center>".$row["sala"];"</td>";
	   echo "<td align=center>".$row["telefone"];"</td>";
       echo "<td align=center>".$row["tipo_salada"];"</td>";
       echo "<td align=center>".$row["quantidade"];"></td>";
	   echo "<td align=left>".$row["observacoes"];"</td>";
       echo "</tr>";
	 }
	 echo "</table>";
?>
<br>
<table width="100%" border="0">
  <tr> 
    <td width="52%"><form name="form1" method="" action="">
        <div align="right"> 
          <input type="button" name="imprimir" value="IMPRIMIR" OnClick="window.print()">
        </div>
      </form></td>
    <td width="48%"><form name="form2" method="get" action="menu_cadastro.php">
        <input type="submit" name="Submit2" value="FECHAR">
      </form></td>
  </tr>
</table>
</body>
</html>
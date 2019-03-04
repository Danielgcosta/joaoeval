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
<title></title>
<body bgcolor="#000000">
<p>
</p>
<p> 
<?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$dados=$_POST;

list($data1)=array_values($dados);

$data_consulta = substr($data1,6,4) . "-" .substr($data1,3,2) . "-" . substr($data1,0,2);

$query="SELECT * FROM tabela_pedidos WHERE data_pedido LIKE '$data1'";

$result=mysql_query($query, $conn);

If (mysql_num_rows($result)==0)	{
	echo "<html><head></head><body>";
	echo "<table width=80% border=0 align=center bgcolor=#CCCCCC cellpadding=5>";
  	echo "<tr>"; 
    echo "	<td height=23><hr align=center></td>";
 	echo "</tr>";
  	echo "<tr>"; 
    echo "<td class=titulos><strong></strong> <p align=center><font color=#00CC99 size=5 face=Verdana><strong>JOÃO & VAL Refeições Naturais</strong></font></p>";
 	echo "<p align=center><strong><font color=#FFFFFF size=4 face=Verdana>Exclusão de Pedido do dia : $data1</font></strong></p></td>";
	echo "</tr>";
  	echo "<tr>"; 
    echo "<td height=23>"; 
    echo "<div align=center>";
	echo "<hr align=center>";
    echo "</div></td>";
  	echo "</tr>";
	echo "</table>";
	echo "</body>";
	echo "</html>";
	echo "<br><br><p><center><font face=Verdana size=3 color=#ffffff><b>Nenhum pedido encontrado para a data especificada!</b></font></center></p>";
	echo "<form name=form1 method=get action=consulta_pedido_exclusao.php><center><input type=submit name=sair value=VOLTAR></form></center>";
	} else {
		include "excluir_pedido_dia.php";
		 /*while ($row=mysql_fetch_array($result) ) {*/ 
}	
?>
  </p>
  <p>&nbsp;</p>
  <p>&nbsp; </p>
</div>
</body>
</html>
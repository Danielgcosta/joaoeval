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
if (!$conn) die("N�o foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

/*require_once('..\www\excluir_pedido_dia.php');*/
$dados=@$_POST['excluir'];
$data_delete=$_POST['data_entrada'];

if ($dados=="")	{
	include "./nao_selecionado_delete_pedido.php";
	die;
	} else {
	for ($i=0;$i<count($dados);$i++)	{
		mysql_query("DELETE FROM tabela_pedidos WHERE Id=$dados[$i] AND data_pedido='$data_delete'");
	}
}
mysql_close($conn);
?>
<body bgcolor="#000000">
<table width="100%" border="0" align="center" bgcolor="#CCCCCC">
  <tr> 
    <td height="22"><hr align="center"></td>
  </tr>
  <tr> 
    <td class="titulos"><div align="center"><strong><font face="Verdana" color="#00CC99" size="5">JO�O 
        & VAL Refei��es Naturais<br><br>
        <font color="#FFFFFF" size="4">Exclus�o de Pedidos</font><br>
        </font></strong></div></td>
  </tr>
  <tr> 
    <td height="22"><hr align="center"></td>
  </tr>
</table>
<p align="center">&nbsp;</p>
<p align="center"><font color="#FFFFFF" size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Pedido(s) 
  Exclu&iacute;do(s) !</strong></font></p>
<form name="form1" method="get" action="administracao.php">
  <div align="center">
    <input type="submit" name="Submit" value="SAIR">
  </div>
</form>
<p align="center"><strong><font color="#FFFFFF" size="3" face="Verdana, Arial, Helvetica, sans-serif"></font></strong></p>
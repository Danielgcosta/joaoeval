<STYLE type="text/css">
A {
	COLOR: #000000; FONT-FAMILY: verdana; TEXT-DECORATION: none
}
A:hover {
	COLOR: #ff3f00
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
<title></title>
<body bgcolor="#000000">
<p> 
  <?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$dados=$_POST;
list($data_entrada)=array_values($dados);

$query_rs_produtos = "SELECT * FROM tabela_pedidos WHERE data_pedido LIKE '$data_entrada' ORDER BY local, horario, andar DESC, sala";

$rs_produtos = mysql_query($query_rs_produtos, $conn) or die(mysql_error());
$row_rs_produtos = mysql_fetch_array($rs_produtos);
if (mysql_affected_rows($conn)==0) {
	include "./exclusao_pedido_erro.php";
	die;
}
?>
</p>
<form action="deletar_pedido.php" method="POST">
  <table width="100%" border="0" align="center" bgcolor="#CCCCCC">
    <tr> 
      <td height="23"><hr align="center"> </td>
    </tr>
    <tr> 
      <td class="titulos"><strong></strong> <p align="center"><font color="#00CC99" size="5" face="Verdana, Arial, Helvetica, sans-serif"><strong>JOÃO 
          & VAL Refeições Naturais</strong></font></p>
        <p align="center"><strong><font color="#FFFFFF" size="4" face="Verdana, Arial, Helvetica, sans-serif">Exclusão 
          de Pedidos do Dia <? echo "$data_entrada" ?></font></strong></p></td>
    </tr>
    <tr> 
      <td height="23"> <div align="center"> 
          <hr align="center">
        </div></td>
    </tr>
    <tr> 
      <td height="23"><div align="center"><font color="#000099" size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Marque 
          os Pedidos para Exclusão</strong></font></div></td>
    </tr>
    <tr> 
      <td height="14">&nbsp;</td>
    </tr>
  </table>
  <table width="100%" border="1" align="center" cellpadding="4" cellspacing="0" bgcolor="#CCCCCC">
    <tr>
	  <td align="left" bgcolor="#FFFFFF"><b>Nome</b></td>
	  <td align="center" bgcolor="#FFFFFF"><b>Local</b></td>
      <td align="center" bgcolor="#FFFFFF"><b>Andar</b></td>
	  <td align="center" bgcolor="#FFFFFF"><b>Sala</b></td>
	  <td align="center" bgcolor="#FFFFFF"><b>Telefone</b></td>
	  <td align="center" bgcolor="#FFFFFF"><b>Excluir</b></td>
    </tr>
    <? do { ?>
    <tr>
	  <td><? echo $row_rs_produtos['nome']; ?></td>
	  <? $get_local=$row_rs_produtos['local'];
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
	  } ?>
	  <td align="center"><? echo $local; ?></td>
      <td align=center><? echo $row_rs_produtos['andar']; ?></td>
	  <td align=center><? echo $row_rs_produtos['sala']; ?></td>
	  <td align=center><? echo $row_rs_produtos['telefone']; ?></td>
	  <td bgcolor="#CCCCCC">
<div align="center"> 
          <input name="excluir[]" type="checkbox" id="excluir[]" value="<? echo $row_rs_produtos['Id']; ?>" />
        <br>
       </div></td>
    </tr>
    <? } while ($row_rs_produtos = mysql_fetch_assoc($rs_produtos)); ?>
  </table>
  <table width="100%" border="0" align="center" bgcolor="#CCCCCC">
    <tr> 
      <td width="87%" height="50"><input name="data_entrada" type="hidden" id="data_entrada" value="<? echo $data_entrada ?>"></td>
      <td width="13%"><input name="excluir_Pedidos" type="submit" value="EXCLUIR" /></td>
    </tr>
  </table>
  </form>
  
<table width="100%" border="0" align="center">
  <form name="form1" method="get" action="administracao.php">
    <tr> 
      <td width="89%">&nbsp;</td>
      <td width="11%"><input type="submit" name="Submit" value="SAIR"></td>
    </tr>
  </form>
</table>
</body>
</html>
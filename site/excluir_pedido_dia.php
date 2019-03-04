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
<title>Exclusão de Cliente</title>
<body bgcolor="#000000">
<p> 
  <?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$dados=$_POST;

list($data1)=array_values($dados);

$data_consulta = substr($data1,6,4) . "-" .substr($data1,3,2) . "-" . substr($data1,0,2);

$query_rs_produtos = "SELECT * FROM tabela_pedidos WHERE data_pedido LIKE '$data_consulta'";

$rs_produtos = mysql_query($query_rs_produtos, $conn) or die(mysql_error());
$row_rs_produtos = mysql_fetch_array($rs_produtos);
?>
</p>
<table width="80%" border="0" align="center" bgcolor="#CCCCCC">
  <tr> 
    <td height="23"><hr align="center"> </td>
  </tr>
  <tr> 
    <td class="titulos"><strong></strong> <p align="center"><font color="#00CC99" size="5" face="Verdana, Arial, Helvetica, sans-serif"><strong>JOÃO 
        & VAL Refeições Naturais</strong></font></p>
      <p align="center"><strong><font color="#FFFFFF" size="4" face="Verdana, Arial, Helvetica, sans-serif">Exclusão 
        de Pedido do dia : <? echo "$data1"; ?></font></strong></p></td>
  </tr>
  <tr> 
    <td height="23"> <div align="center"> 
        <hr align="center">
        <font color="#000099" size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Marque 
        os pedidos para exclusão</strong></font><br>
      </div></td>
  </tr>
  <tr> 
    <td height="14">&nbsp;</td>
  </tr>
</table>
<form action="deletar_pedido.php" method="POST">
  <table width="80%" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#CCCCCC">
    <tr>
	  <th width="7%" bgcolor="#CCCCCC" scope="col">ID</th>
      <th width="47%" bgcolor="#CCCCCC" scope="col"><div align="left">NOME</div></th>
      <th width="10%" bgcolor="#CCCCCC" scope="col">ANDAR</th>
	  <th width="11%" bgcolor="#CCCCCC" scope="col">SALA</th>
	  <th width="14%" bgcolor="#CCCCCC" scope="col">TELEFONE</th>
	  <th width="11%" bgcolor="#cccccc" scope="col">EXCLUIR</th>
    </tr>
    <? do { ?>
    <tr>
	  <td align=center><? echo $row_rs_produtos['Id']; ?></td>
      <td><? echo $row_rs_produtos['nome']; ?></td>
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
  <table width="80%" border="0" align="center" bgcolor="#CCCCCC">
    <tr> 
      <td width="87%" height="50"> <div align="center"><br>
        </div></td>
      <td width="13%"><input name="deletar_Pedidos" type="submit" value="EXCLUIR" /></td>
    </tr>
  </table>
</form>
<table width="80%" border="0" align="center">
  <form name="form1" method="get" action="administracao.php">
    <tr> 
      <td width="89%">&nbsp;</td>
      <td width="11%"><input type="submit" name="Submit" value="SAIR"></td>
    </tr>
  </form>
</table>
</body>
</html>
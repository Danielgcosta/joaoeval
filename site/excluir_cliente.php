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
<?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$query_rs_produtos = "SELECT * FROM tabela_clientes ORDER BY nome, andar";

$rs_produtos = mysql_query($query_rs_produtos, $conn) or die(mysql_error());
$row_rs_produtos = mysql_fetch_array($rs_produtos);
/*$row_rs_produtos = mysql_fetch_assoc($rs_produtos);*/
/*$totalRows_rs_produtos = mysql_num_rows($rs_produtos);*/
?>
<form action="deletar_cliente.php" method="POST">
<table width="100%" border="0" align="center" bgcolor="#CCCCCC">
  <tr> 
    <td height="23"><hr align="center"> </td>
  </tr>
  <tr> 
    <td class="titulos"><strong></strong> <p align="center"><font color="#00CC99" size="5" face="Verdana, Arial, Helvetica, sans-serif"><strong>JOÃO 
        & VAL Refeições Naturais</strong></font></p>
      <p align="center"><strong><font color="#FFFFFF" size="4" face="Verdana, Arial, Helvetica, sans-serif">Exclusão 
        de Clientes</font></strong></p></td>
  </tr>
  <tr> 
    <td height="23"> <div align="center"> 
        <hr align="center">
      </div></td>
  </tr>
  <tr> 
    <td height="23"><div align="center"><font color="#000099" size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Marque 
        os Clientes para Exclusão</strong></font></div></td>
  </tr>
  <tr> 
    <td height="14">&nbsp;</td>
  </tr>
</table>
  <table width="100%" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#CCCCCC">
    <tr>
	  <td align="center" bgcolor="#ffffff"><b>ID</b></td>
      <td align="center" bgcolor="#ffffff"><b>Nome</b></td>
	  <td align="center" bgcolor="#ffffff"><b>Local</b></td>
      <td align="center" bgcolor="#ffffff"><b>Andar</b></td>
	  <td align="center" bgcolor="#ffffff"><b>Sala</b></td>
	  <td align="center" bgcolor="#ffffff"><b>Telefone</b></td>
	  <td align="center" bgcolor="#ffffff"><b>Excluir</b></td>
    </tr>
    <? do { ?>
    <tr>
	  <td align=center><? echo $row_rs_produtos['Id']; ?></td>
      <td><? echo $row_rs_produtos['nome']; ?></td>
	  <td align=center><? echo $row_rs_produtos['local']; ?></td>
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
      <td width="87%" height="50">&nbsp;</td>
      <td width="13%"><input name="Gerar_Pedidos" type="submit" value="EXCLUIR" /></td>
    </tr>
  </table>
  </form>
  
<table width="100%" border="0" align="center">
  <form name="form1" method="get" action="menu_cadastro.php">
    <tr> 
      <td width="89%">&nbsp;</td>
      <td width="11%"><input type="submit" name="Submit" value="SAIR"></td>
    </tr>
  </form>
</table>
</body>
</html>
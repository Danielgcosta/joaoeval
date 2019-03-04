<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD><TITLE></TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</HEAD>

<style type="text/css">
<!--
table { 
background-color: #dfeff;
border:1;
font: 11px verdana, arial, helvetica, sans-serif;
color:#000000;
}
input { 
background-color: #cccccc; 
font: 11px verdana, arial, helvetica, sans-serif;
color:#000000;
border:1px solid #999999;
}
-->
</style>
<body bgcolor="#000000">
<table width="100%" bgcolor="#cccccc" border="0" align="center">
  <tr> 
    <td><strong><font size="6">Refeições KOMA-BEM</font></strong></td>
    <td><strong><font color="#000000" size="3" face="Verdana, Arial, Helvetica, sans-serif">Exclusão de Pedidos</font></strong></td>
  </tr>
</table>
<hr align="center">
<br>
<?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$dados=$_POST;

list($data_pedido)=array_values($dados);

$data_exclusao = substr($data_pedido,6,4) . "-" .substr($data_pedido,3,2) . "-" . substr($data_pedido,0,2);

/*$consulta=mysql_query("SELECT * FROM tabela_pedidos WHERE data_pedido LIKE 'data_exclusao'");
mysql_query($consulta, $conn);*/

$deleta=mysql_query("DELETE FROM tabela_pedidos WHERE data_pedido LIKE '$data_exclusao'");
mysql_query($deleta, $conn);
echo "<p><center><b><font color=#ffffff size=2 face=Verdana>PEDIDOS EXCLUÍDOS!</b></font></center></p>";
mysql_close($conn);
?>
<br>
<table width="767" border="0">
  <tr>
    <td><form name="form1" method="get" action="excluir_pedido_dia.php">
        <div align="center">
          <input type="submit" name="Submit" value="SAIR">
        </div>
      </form></td>
  </tr>
</table>
</body>
</html>
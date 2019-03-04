<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<STYLE type="text/css">
A {
	COLOR: #000099; FONT-FAMILY: verdana; TEXT-DECORATION: none
}
A:hover {
	COLOR: #ff3f00
}
BODY {
	MARGIN: 0px
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
.style1 {
	font-size: 12px;
	font-weight: bold;
}
</STYLE>
<? $data = date("Y-m-d");
$novadata = substr($data,8,2) . "/" .substr($data,5,2) . "/" . substr($data,0,4);
?>
<body bgcolor="#000000">
<br><br><br>
<div align="center">
  <table width="80%" border="0" align="center" bgcolor="#CCCCCC">
    <tr> 
      <td height="22" colspan="3"> <hr align="center"></td>
    </tr>
    <tr> 
      <td colspan="3" class="titulos"><div align="center"><strong><font size="7"><strong><font color="#00CC99" size="5">JOÃO 
          & VAL Refeições Naturais</font></strong></font><br>
          <br>
          <font color="#FFFFFF" size="4" face="Verdana, Arial, Helvetica, sans-serif">Opções 
          Pedidos</font><font color="#ffffff" size="3" face="Verdana, Arial, Helvetica, sans-serif"> 
          </font><br>
          </strong></div></td>
    </tr>
    <tr> 
      <td height="22" colspan="3"><hr align="center"></td>
    </tr>
    <tr> 
      <td height="22">&nbsp;</td>
      <td colspan="2"><font color="#CCCCCC" size="2"><a href="pedidos_clientes.php"><strong>GERAR 
        PEDIDOS</strong></a></font></td>
    </tr>
    <tr> 
      <td width="32%" height="22"><div align="center"><font color="#CCCCCC" size="2"><a href="pedidos_clientes.php"></a></font></div></td>
      <td colspan="2"><font color="#CCCCCC" size="2"><a href="consulta_pedidos_existentes.php"><strong>CONSULTAR 
        PEDIDOS</strong></a></font></td>
    </tr>
    <tr> 
      <td height="22">&nbsp;</td>
      <td height="22" colspan="2"><font color="#CCCCCC" size="2"><a href="gera_conta_cliente_avulso.php"><strong>GERAR 
        CONTA PAGAMENTO AVULSO</strong></a></font></td>
    </tr>
    <tr> 
      <td height="22">&nbsp;</td>
      <td height="22" colspan="2"><font color="#CCCCCC" size="2"><a href="gera_conta_todos.php"><strong>GERAR 
        CONTAS DE TODOS OS CLIENTES POR PER&Iacute;ODO</strong></a></font></td>
    </tr>
    <tr> 
      <td height="22"><div align="center"></div></td>
      <td height="22" colspan="2"><font color="#CCCCCC" size="2"><a href="consulta_conta_cliente_periodo.php"><strong>GERAR 
        CONTA DO CLIENTE POR PER&Iacute;ODO</strong></a></font></td>
    </tr>
    <tr> 
      <td height="22">&nbsp;</td>
      <td height="22" colspan="2"><a href="consulta_pedidos_existentes_periodo.php" class="style1">GERAR 
        TOTAL DE CONTAS POR PER&Iacute;ODO</a></td>
    </tr>
    <tr> 
      <td height="22"><div align="center"><font color="#CCCCCC" size="2"><a href="consulta_etiquetas_existentes.php"></a></font></div></td>
      <td width="65%" height="22"><font color="#CCCCCC" size="2"><a href="consulta_etiquetas_existentes.php"><strong>GERAR 
        ETIQUETAS</strong></a></font></td>
      <td width="3%"><font color="#CCCCCC" size="2"><a href="consulta_etiquetas_extras_existentes.php"></a></font></td>
    </tr>
    <tr> 
      <td height="22">&nbsp;</td>
      <td height="22" colspan="2"><font color="#CCCCCC" size="2"><a href="consulta_etiquetas_extras_existentes.php"><strong>ETIQUETAS 
        EXTRAS </strong></a></font></td>
    </tr>
    <tr> 
      <td height="22"><div align="center"><font color="#CCCCCC" size="2"><a href="consulta_saladas_existentes.php"></a></font></div></td>
      <td height="22" colspan="2"><font color="#CCCCCC" size="2"><a href="principal.php"><strong>SAIR</strong></a></font></td>
    </tr>
    <tr> 
      <td height="22" colspan="3"><hr align="center"></td>
    </tr>
  </table>
</div>
</body>
</html>
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
<title></title>
<body bgcolor="#000000" onLoad="document.getElementById('data_entrada').focus()">
<p>&nbsp;</p>
<table width="75%" border="0" align="center" bgcolor="#CCCCCC">
  <form method="post" action="gera_saladas.php">
    <tr> 
      <td height="22" colspan="3"> <hr align="center"></td>
    </tr>
    <tr> 
      <td colspan="3" class="titulos"><div align="center"><strong><font size="7"><strong><font color="#00CC99" size="5">JOÃO 
          & VAL Refeições Naturais</font></strong></font><br>
          <br>
          <font color="#FFFFFF" size="4" face="Verdana, Arial, Helvetica, sans-serif"> 
          Consumo de Saladas</font><br>
          </strong></div></td>
    </tr>
    <tr> 
      <td height="22" colspan="3"><hr align="center"></td>
    </tr>
    <tr> 
      <td height="22">&nbsp;</td>
      <td height="22">DD/MM/AAAA</td>
      <td height="22">&nbsp;</td>
    </tr>
    <tr> 
      <td width="50%" height="22"> <div align="right">DIGITE A DATA DO PEDIDO 
          :</div></td>
      <td width="11%"><input name="data_entrada" type="text" id="data_entrada" size="12" maxlength="10"></td>
      <td width="39%"><input type="submit" name="Submit2" value="ENVIAR"> </td>
    </tr>
    <tr> 
      <td height="14">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </form>
</table>
<table width="75%" border="0" align="center" bgcolor="#CCCCCC">
  <tr> 
    <td width="63%" height="22">&nbsp;</td>
    <td width="37%"><form name="form2" method="get" action="operacoes_pedidos.php">
        <input type="submit" name="Submit3" value="SAIR">
      </form></td>
  </tr>
  <tr> 
    <td height="14">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td height="22" colspan="2"><hr align="center"></td>
  </tr>
</table>
<div align="center"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong> 
  </strong></font></div>
<br>
</body>
</html>
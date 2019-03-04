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
<script language="JavaScript">
function valida_campo(campo)	{
		if (campo.data1.value=="") {
			alert ("Data em branco. Digite uma data!");
			return false;
		}
		return true;
}		
</script>
<title></title>
<body bgcolor="#000000" onLoad="document.getElementById('data1').focus()">
<br><br><br>
<table width="60%" border="0" align="center" bgcolor="#CCCCCC">
  <tr> 
    <td height="22"> 
      <hr align="center"></td>
  </tr>
  <tr> 
    <td height="131" class="titulos"> <div align="center"> 
        <p><strong><font size="7"><strong><font color="#00CC99" size="5">JOÃO 
          & VAL Refeições Naturais</font></strong></font></strong></p>
        <p><strong><font color="#FFFFFF" size="4" face="Verdana, Arial, Helvetica, sans-serif">Exclusão 
          de Pedidos por Data</font></strong></p>
      </div></td>
  </tr>
  <tr> 
    <td height="22"> 
      <hr align="center"></td>
  </tr>
</table>
<table width="60%" border="0" align="center" bgcolor="#CCCCCC">
<form name="form" method="post" action="excluir_pedido_data.php" onSubmit="return valida_campo(this)">
      <tr> 
        <td width="58%" height="31" align="center"><div align="right">DD/MM/AAAA</div></td>
        </tr>
      <tr> 
        <td width="58%" height="31"> <div align="right">DATA DO PEDIDO A EXCLUIR 
            : 
            <input name="data1" type="text" id="data1" size="12" maxlength="10">
          </div></td>
        <td width="25%"> <div align="center"> 
            <input type="submit" name="Submit" value="ENVIAR">
          </div></td>
      </tr>
      <tr> 
        
      <td width="58%" height="8"></td>
        
      <td width="17%" height="8"></td>
      </tr>
</form>	  
    </table>
  
<table width="60%" border="0" align="center" bgcolor="#CCCCCC">
  <tr> 
    <td width="67%">&nbsp;</td>
    <td width="33%"> <form name="form1" method="get" action="administracao.php">
        <div align="center"> 
          <input type="submit" name="Submit2" value="SAIR">
        </div>
      </form></td>
  </tr>
  <tr> 
    <td height="22" colspan="2">
<hr align="center"></td>
  </tr>
</table>
</div>
</body>
</html>
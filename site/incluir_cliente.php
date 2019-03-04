<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD><TITLE>Inclusão de Clientes</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<script language="JavaScript">
function valida_campo(campo)	{
		if (campo.nome.value=="") {
			alert ("Preencha o nome do Cliente.");
			return false;
		}
		if (campo.local.selectedIndex==0) {
			alert ("Selecione o Local.");
			return false;
		}
		if (campo.andar.value=="") {
			alert ("Preencha o Andar do Cliente.");
			return false;
		}
		if (campo.sala.value=="") {
			alert ("Preencha a Sala do Cliente.");
			return false;
		}
		if (campo.telefone.value=="") {
			alert ("Preencha o Telefone do Cliente.");
			return false;
		}
		if (campo.tipo_salada.value=="") {
			alert ("Selecione o Tipo de Salada");
			return false;
		}
		if (campo.quantidade.value=="") {
			alert ("Preencha a Quantidade.");
			return false;
		}
		if (campo.quant_salada.value=="") {
			alert ("Preencha a Quantidade de Salada.");
			return false;
		}
		if (campo.observacoes.value=="") {
			alert ("Preencha Observações.");
			return false;
		}
		return true;
}		
</script>
</head>

<style type="text/css">
<!--
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
input { 
font: 10px verdana, arial, helvetica, sans-serif;
color:#000000;
}
table { 
font: 10px verdana, arial, helvetica, sans-serif;
color:#000000;
}
select { 
font: 10px verdana, arial, helvetica, sans-serif;
color:#000000;
}
-->
</style> 
</HEAD>

<body bgcolor="#000000" onLoad="document.getElementById('nome').focus()">
  
<table width="85%" border=0 align="center" bgcolor="#CCCCCC">
  <form name="form1" method="post" action="insere_cliente.php" onSubmit="return valida_campo(this)">
    <tr> 
      <td colspan="4"><hr align="center"></td>
    </tr>
    <tr> 
      <td colspan="4" class="titulos"><div align="center"> 
          <p><font color="#00CC99" size="5" face="Verdana, Arial, Helvetica, sans-serif"><strong>JOÃO 
            & VAL Refeições Naturais</strong></font></p>
          <p><strong><font color="#FFFFFF" size="4" face="Verdana, Arial, Helvetica, sans-serif">Inclusão 
            de Clientes</font></strong></p>
        </div></td>
    </tr>
    <tr> 
      <td height="22" colspan="4"><hr align="center"></td>
    </tr>
    <tr> 
      <td width="196" height="22"><div align="right">NOME :</div></td>
      <td width="159" height="22"><div align="left"> 
          <input name=nome size="30" maxlength="20">
        </div></td>
      <td width="107" height="22"><div align="right">LOCAL :</div></td>
      <td width="163" height="22"><div align="left"> 
          <select name="local">
            <option>Selecione</option>
            <option value="1">FORUM - 1&ordm; Hor&aacute;rio</option>
            <option value="2">FORUM - 2&ordm; Hor&aacute;rio</option>
            <option value="3">1&ordf; VARA - 1&ordm; Hor&aacute;rio</option>
            <option value="4">2&ordf; VARA - 1&ordm; Hor&aacute;rio</option>
            <option value="5">TRT</option>
            <option value="6">TRTL</option>
            <option value="7">Diversos</option>
	    <option value="8">JA</option>
	    <option value="9">JB</option>
	    <option value="10">J1</option>
	    <option value="11">J2</option>
       	    <option value="12">TA</option>
	    <option value="13">AC</option>
          </select>
        </div></td>
    </tr>
    <tr> 
      <td height="22"><div align="right">ANDAR :</div></td>
      <td height="22"><div align="left"> 
          <input name=andar size="13" maxlength="3">
        </div></td>
      <td height="22"><div align="right">SALA :</div></td>
      <td height="22"><div align="left"> 
          <input name=sala size="15" maxlength="5">
        </div></td>
    </tr>
    <tr> 
      <td height="22"><div align="right">TELEFONE:</div></td>
      <td height="22"><input name=telefone size="13" maxlength="9"></td>
      <td height="22"><div align="right">TIPO DE SALADA :</div></td>
      <td height="22"><select name="tipo_salada" id="tipo_salada">
          <option>Selecione</option>
          <option value="C">C</option>
          <option value="L">L</option>
          <option value="LG">LG</option>
          <option value="ML">ML</option>
          <option value="S">S</option>
          <option value="SD">SD</option>
          <option value="SL">SL</option>
          <option value="SLEG">SLEG</option>
        </select></td>
    </tr>
    <tr> 
      <td height="22"><div align="right">QUANTIDADE :</div></td>
      <td height="22"><div align="left"> 
          <input name=quantidade size="8" maxlength="2">
        </div></td>
      <td height="22"><div align="right">QUANT. SALADA:</div></td>
      <td height="22"><div align="left">
          <input name=quant_salada size="8" maxlength="2">
        </div></td>
    </tr>
    <tr> 
      <td height="22"><div align="right">OBSERVAçõES/PREDILEçõES 
          : </div></td>
      <td height="22" colspan="3"><input name=observacoes size="66" maxlength="50"></td>
    </tr>
    <tr> 
      <td height="22"><div align="right">SOJA :</div></td>
      <td height="22"><input type="radio" name="soja" value="Sim">
        SIM 
        <input name="soja" type="radio" value="Não" checked>
        NãO </td>
      <td height="22"><div align="right"></div></td>
      <td height="22">&nbsp;</td>
    </tr>
    <tr> 
      <td height="22"><div align="right">VISA VALE :</div></td>
      <td height="22"><input type="radio" name="visa_vale" value="Sim">
        SIM 
        <input name="visa_vale" type="radio" value="Não" checked>
        NãO </td>
      <td height="22">&nbsp;</td>
      <td height="22">&nbsp;</td>
    </tr>
    <tr> 
      <td height="22"><div align="right">HOR&Aacute;RIO :</div></td>
      <td height="22"><input name="horario" type="radio" value="1" checked>
        1 
        <input type="radio" name="horario" value="2">
        2</td>
      <td height="22">&nbsp;</td>
      <td height="22">&nbsp;</td>
    </tr>
    <tr> 
      <td height="22">&nbsp;</td>
      <td height="22">&nbsp;</td>
      <td height="22">&nbsp;</td>
      <td height="22"><input type="submit" value="GRAVAR";
	document.form1.submit()" name="submit"></td>
    </tr>
  </form>
</table>
 
<table width="85%" border="0" align="center" bgcolor="#CCCCCC">
  <tr> 
    <td width="17%" height="22">&nbsp;</td>
    <td width="62%" height="22">&nbsp;</td>
    <td width="9%"><form name="form2" method="get" action="menu_cadastro.php">
        <input type="submit" name="Submit" value="SAIR">
      </form></td>
    <td width="12%" height="22">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="4"> 
      <hr align="center"></td>
  </tr>
</table>
</BODY>
</HTML>
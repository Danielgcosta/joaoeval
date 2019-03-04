<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD><TITLE>Formul&aacute;rio para cadastro</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<script language="JavaScript">
function valida_campo(campo)	{
		if (campo.nome.value=="") {
			alert ("Preencha o nome do Cliente.");
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
		if (campo.observacoes.value=="") {
			alert ("Preencha o campo Observações.");
			return false;
		}
		return true;
}		
</script>
</head>

<style type="text/css">
<!--
input { 
font: 10px verdana, arial, helvetica, sans-serif;
color:#000000;
}
table { 
background-color: #ffffff;
font: 10px verdana, arial, helvetica, sans-serif;
color:#000000;
}
-->
</style> 
</HEAD>

<BODY bgcolor="#FFFFFF" onLoad="document.getElementById('nome').focus()">
<table width="767" border="0">
  <tr>
    <td><div align="center"><strong><font size="7">LOGO</font></strong> </div></td>
    <td><div align="center"><font size="3"><strong>Cadastro de Clientes<br>
        <br>
        Inclusão de Novo Cliente<br>
        </strong></font></div></td>
  </tr>
</table>
<br>

<form name="form1" method="post" action="insere_cliente.php" onSubmit="return valida_campo(this)">
  <div align="center"><img src="BARRA.GIF" width="767" height="23"> </div>
  <table width=767 border=0 align="center">
    <tr> 
      <td width=130> <div align=right>NOME :</div></td>
      <td width=432><input name=nome size="50" maxlength="50"> </td>
      <td width=191>&nbsp;</td>
    </tr>
    <tr> 
      <td width="130"> <div align=right>ANDAR :</div></td>
      <td width="432"><input name=andar size="10" maxlength="50"> </td>
      <td width="191">&nbsp;</td>
    </tr>
    <tr> 
      <td width="130" height="21"> <div align=right>SALA :</div></td>
      <td width="432"><input name=sala size="10" maxlength="50"> </td>
      <td width="191">&nbsp;</td>
    </tr>
    <tr> 
      <td height="21"><div align="right">TELEFONE :</div></td>
      <td><input name=telefone size="25" maxlength="50"></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td height="21"><div align="right">TIPO DE SALADA :</div></td>
      <td><input name=tipo_salada size="70" maxlength="50"></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td height="21"><div align="right">QUANTIDADE :</div></td>
      <td><input name=quantidade size="10" maxlength="50"></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td height="21"><div align="right">OBSERVAçõES :</div></td>
      <td><input name=observacoes size="70" maxlength="50"></td>
      <td>&nbsp; </td>
    </tr>
    <tr> 
      <td height="21"><div align="right">SOJA :</div></td>
      <td> <input type="radio" name="soja" value="Sim">
        SIM 
        <input name="soja" type="radio" value="Não" checked>
        NãO </td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td height="21"><div align="right">VISA VALE :</div></td>
      <td><input type="radio" name="visa_vale" value="Sim">
        SIM 
        <input name="visa_vale" type="radio" value="Não" checked>
        NãO </td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <div align="center"><img src="BARRA.GIF" width="767" height="23"><br>
    <br>
  </div>
  <table width=100% border=0 align="center" bgcolor="#000099">
    <tr> 
        <td scope=col> <div align="center">
            
          <input type="submit" value="GRAVAR";
	document.form1.submit()" name="submit">
          </div></td>
    </tr>
  </table>
</form>
</BODY>
</HTML>
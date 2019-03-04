<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD><TITLE></TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</HEAD>
<script language="JavaScript">
function valida_campo(campo)	{
		if (campo.nome.value=="") {
			alert ("Preencha o nome do Cliente.");
			return false;
		}
		if (campo.local.selectedIndex==0) {
			alert ("Escolha um Local.");
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
			alert ("Preencha o Tipo de Salada");
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
		if (campo.observacoes=="") {
			alert ("Preencha Observações.");
			return false;
		}
		return true;
}		
</script>

<style type="text/css">
<!--
.titulos {
filter:shadow(color=000000,direction=120);
height:5px;
font-family:verdana, arial, helvetica, sans-serif;
font-size:16px;
color:#ffff00;
}
table { 
background-color: #dfeff;
border:1;
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
-->
</style>
<?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$dados=$_POST;
list($nome)=array_values($dados);

$query="SELECT * FROM tabela_clientes WHERE nome LIKE '$nome'";

$result=mysql_query($query, $conn);
$row=mysql_fetch_array($result);
?>

<BODY bgcolor="#000000" onLoad="document.getElementById('local').focus()">
<table width="85%" border=0 align="center" bgcolor="#CCCCCC">
  <form name="form1" method="post" action="update_cliente.php" onSubmit="return valida_campo(this)">
    <tr> 
      <td colspan="4"><hr align="center"></td>
    </tr>
    <tr> 
      <td colspan="4" class="titulos"><div align="center"> 
          <p><font color="#00CC99" size="5" face="Verdana, Arial, Helvetica, sans-serif"><strong>JOÃO 
            & VAL Refeições Naturais</strong></font></p>
          <p><strong><font color="#FFFFFF" size="4" face="Verdana, Arial, Helvetica, sans-serif">Edição 
            do Cliente</font></strong></p>
        </div></td>
    </tr>
    <tr> 
      <td height="28" colspan="4"><hr align="center"></td>
    </tr>
    <tr> 
      <td height="21" align="right">NOME :</td>
      <td colspan="3"><input name=nome size="30" maxlength="20" value="<? echo $row['nome']; ?>">
        </b></td>
    </tr>
    <tr> 
      <td height="21" align="right">LOCAL ATUAL :</td>
      <? $get_local=$row['local'];
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
		}
		if ($get_local=='8')	{
 	 		$local='JA';
		}
		if ($get_local=='9')	{
 			 $local='JB';
		}
		if ($get_local=='10')	{
 			 $local='J1';
		}
		if ($get_local=='11')	{
 			 $local='J2';
		}
		if ($get_local=='12')	{
 			 $local='TA';
		}
		if ($get_local=='13')	{
 			 $local='AC';
		}
		?>

      <td colspan="3"><? echo $local; ?> </td>
    </tr>
    <tr> 
      <td height="21" align="right">NOVO LOCAL : </td>
      <td><select name="local">
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
	    <option selected><? echo $local; ?></option>
        </select></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td height="21"> <div align="right">ANDAR :</div></td>
      <td width="205"><input name=andar size="6" maxlength="3" value="<? echo $row['andar']; ?>">
        SALA : <input name=sala size="6" maxlength="5" value="<? echo $row['sala']; ?>"></td>
      <td width="64"><div align="right"></div></td>
      <td width="174">&nbsp;</td>
    </tr>
    <tr> 
      <td height="21"> <div align="right">TELEFONE :</div></td>
      <td colspan="3"><input name=telefone size="13" maxlength="9" value="<? echo $row['telefone']; ?>"> 
      </td>
    </tr>
    <tr> 
      <td height="21"><div align="right">TIPO SALADA ATUAL :</div></td>
      <td colspan="3"><? echo $row['tipo_salada']; ?></td>
    </tr>
    <tr> 
      <td height="21"><div align="right">NOVO TIPO DE SALADA :</div></td>
      <td colspan="3"> <select name="tipo_salada" id="select">
          <option>Selecione</option>
          <option value="C">C</option>
          <option value="L">L</option>
          <option value="LG">LG</option>
          <option value="ML">ML</option>
          <option value="S">S</option>
          <option value="SD">SD</option>
          <option value="SL">SL</option>
          <option value="SLEG">SLEG</option>
		  <option selected><? echo $row['tipo_salada']; ?></option>
        </select>
        <br>
      </td>
    </tr>
    <tr> 
      <td height="21"> <div align="right">QUANTIDADE :</div></td>
      <td width="205"><input name=quantidade size="4" maxlength="2" value="<? echo $row['quantidade']; ?>">
        QUANT. SALADA : 
        <input name=quant_salada size="4" maxlength="2" value="<? echo $row['quant_salada']; ?>"></td>
      <td width="64"><div align="right">. </div></td>
      <td width="174">&nbsp;</td>
    </tr>
    <tr> 
      <td height="21"><div align="right">OBSERVAçõES :</div></td>
      <td colspan="3"><input name=observacoes size="65" maxlength="50" value="<? echo $row['observacoes']; ?>"></td>
    </tr>
    <tr> 
      <td height="21"><div align="right">SOJA :</div></td>
      <td colspan="3"><input name="soja" size="3" maxlength="3" value="<? echo $row['soja']; ?>">
        Sim / Não</td>
    <tr> 
      <td height="21"><div align="right">VISA VALE :</div></td>
      <td colspan="3"><input name="visa_vale" size="3" maxlength="3" value="<? echo $row['visa_vale']; ?>">
        Sim / Não</td>
    </tr>
    <tr> 
      <td height="21"><div align="right">HOR&Aacute;RIO :</div></td>
      <td colspan="2"><input name="horario" size="3" maxlength="1" value="<? echo $row['horario']; ?>">
        1 / 2</td>
      <td><div align="center"> 
          <input type="submit" value="GRAVAR";
	document.form1.submit()" name="submit">
        </div></td>
    </tr>
  </form>
</table>
<table width="85%" border="0" align="center" bgcolor="#CCCCCC">
  <tr> 
    <td width="23%">&nbsp; </td>
    <td width="33%">&nbsp;</td>
    <td width="26%">&nbsp;</td>
    <td width="18%"><form name="form2" method="get" action="editar_cliente.php">
        <input type="submit" name="Submit" value="SAIR">
      </form></td>
  </tr>
  <tr> 
    <td colspan="4"><hr align="center"></td>
  </tr>
</table>
<?
$dados=$_POST;

$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

list($nome)=array_values($dados);

$query="SELECT * FROM tabela_clientes WHERE nome LIKE '$nome'";

$result=mysql_query($query, $conn);

If (mysql_num_rows($result)==0)	{
	/* include("nao_encontrado.htm"); */
	} else {
		 while ($row=mysql_fetch_array($result) ) { 
		}
}
mysql_close($conn);
?>
</p>
</p>
</body>
</html>
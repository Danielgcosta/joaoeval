<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD><TITLE>Atualização do Preço da Refeição</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>
<script language="JavaScript">
function valida_campo(campo)	{
		if (campo.preco_ref.value=="") {
			alert ("Valor Inválido!");
			return false;
		}
		if (campo.preco_ref.value=="0,00") {
			alert ("Valor Inválido!");
			return false;
		}
		if (campo.preco_ref.value=="0.00") {
			alert ("Valor Inválido!");
			return false;
		}
		return true;
}		
</script>
<style type="text/css">
<!--
A {
	COLOR: #000000; FONT-FAMILY: verdana; TEXT-DECORATION: none
}
A:hover {
	COLOR: #ff3f00
}
input { 
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
table { 
font: 10px verdana, arial, helvetica, sans-serif;
color:#000000;
}
-->
</style> 
</HEAD>

<body bgcolor="#000000" onLoad="document.getElementById('preco_ref').focus()">

  <div align="center"> 
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
<?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$query="SELECT * FROM tabela_preco_refeicao";
$result=mysql_query($query, $conn);
$row=mysql_fetch_array($result);
?>  
<table width="80%" border=0 align="center" bgcolor="#CCCCCC">
  <form name="form1" method="post" action="update_preco_refeicao.php" onSubmit="return valida_campo(this)">
    <tr> 
      <td colspan="6"><hr align="center"></td>
    </tr>
    <tr> 
      <td class="titulos" colspan="6"><div align="center"> 
          <p><font color="#00CC99" size="5" face="Verdana, Arial, Helvetica, sans-serif"><strong>JOÃO 
            & VAL Refeições Naturais</strong></font></p>
          <p><strong><font color="#FFFFFF" size="4" face="Verdana, Arial, Helvetica, sans-serif">Atualização 
            do Preço da Refeição</font></strong></p>
        </div></td>
    </tr>
    <tr> 
      <td height="28" colspan="6"><hr align="center"></td>
    </tr>
    <tr> 
      <td colspan="4">&nbsp;</td>
      <td colspan="2"><strong>(formato : 0.00)</strong></td>
    </tr>
    <tr> 
      <td width=19> 
        <div align="right"></div></td>
      <td width=127><div align="right">PREÇO ATUAL (R$) :</div></td>
      <td width=81><b></b><? echo number_format($row['preco_ref'], "2", ",", "."); ?></b></td>
      <td width=142><div align="right">NOVO PREÇO (R$) :</div></td>
      <td width=94><input name=preco_ref size="8" maxlength="6"> </td>
      <td width=113><div align="center"> 
          <input type="submit" value="GRAVAR";
	document.form1.submit()" name="submit">
        </div></td>
    </tr>
  </form>
</table>
<table width="80%" border="0" align="center" bgcolor="#CCCCCC">
  <tr> 
    <td width="43%">&nbsp;</td>
    <td width="41%">&nbsp;</td>
    <td width="16%"><form name="form2" method="get" action="administracao.php">
        <div align="left">
          <input type="submit" name="Submit" value="SAIR">
        </div>
      </form></td>
  </tr>
  <tr> 
    <td colspan="3"><hr align="center"></td>
  </tr>
</table>
<br>
  <div align="center"> </div>
  </BODY>
</HTML>
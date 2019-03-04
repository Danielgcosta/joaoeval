<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD><TITLE>Administração</TITLE>
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
.style1 {
	FONT-SIZE: 12px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif
}
.style2 {
	FONT-WEIGHT: bold; COLOR: #ffff00; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif
}
.style3 {
	FONT-WEIGHT: bold; FONT-SIZE: 10px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif
}
.style4 {
	FONT-SIZE: 10px; COLOR: #ffffff
}
.style5 {
	FONT-WEIGHT: normal; FONT-SIZE: 12px; COLOR: #ffffff; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif
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

<?
$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$query="SELECT * FROM tabela_preco_refeicao";
$result=mysql_query($query, $conn);
?>  

<body bgcolor="#000000">

  <div align="center"> 
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
  
<table width="80%" border=0 align="center" bgcolor="#CCCCCC">
    <tr> 
      <td colspan="6"><hr align="center"></td>
    </tr>
	<tr> 
      <td class="titulos" colspan="6"><div align="center"> 
          <p><font color="#00CC99" size="5" face="Verdana, Arial, Helvetica, sans-serif"><strong>JOÃO 
            & VAL Refeições Naturais</strong></font></p>
          <p><strong><font color="#FFFFFF" size="4" face="Verdana, Arial, Helvetica, sans-serif">Administração</font></b></p>
      </div></td>
  </tr>
  <tr> 
    <td height="28"><hr align="center"></td>
  </tr>
  <tr> 
    <td height="28"><div align="center"><a href="consulta_pedidos_existentes_inclusao.php"><font size="2"><strong>INCLUSÃO 
        DE CLIENTES NO PEDIDO</strong></font></a></div></td>
  </tr>
  <tr> 
    <td height="28"><div align="center"><a href="consulta_pedidos_existentes_exclusao.php"><font size="2"><strong>EXCLUSãO 
        DE CLIENTES NO PEDIDO</strong></font></a></div></td>
  </tr>
  <tr> 
    <td height="28"><div align="center"><a href="atualiza_preco_refeicao.php"><font size="2"><strong>ATUALIZAR 
        PREÇO DA REFEIÇãO</strong></font></a></div></td>
  </tr>
  <tr> 
    <td height="28"><div align="center"><a href="atualiza_preco_visa_vale.php"><strong><font size="2">ATUALIZAR 
        PREÇO DO VISA VALE</font></strong></a></div></td>
  </tr>
  <tr> 
    <td height="28"><div align="center"><a href="principal.php"><strong><font size="2">SAIR</font></strong></a></div></td>
  </tr>
  <tr> 
    <td height="28"><hr align="center"></td>
  </tr>
</table>
  <br>
  <div align="center"> </div>
  
</BODY>
</HTML>
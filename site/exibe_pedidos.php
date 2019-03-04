<STYLE type="text/css">
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
/* Tamanho do papel formato A4 */
$largura = 595;
$altura = 842;

/* Margens */ 
$margem_vertical = 30;
$margem_horizontal = 30;

/* Tamanho das fontes */
$tamanho_fonte = 8;
$tamanho_fonte_titulo = 9;

/* Títulos */
$titulo1 = "REFEIÇÕES KOMA-BEM";
$titulo2 = "RELAÇÃO DE PEDIDOS PARA O DIA :";

$data_hoje = date("Y-m-d");

$query_rs_produtos = "SELECT * FROM tabela_pedidos WHERE data_pedido LIKE '%$data_hoje%' ORDER BY andar, nome";

$colunas_resultantes = array ("nome", "andar", "sala", "telefone", "tipo_salada", "quantidade", "observacoes");

$texto_colunas = array ("Nome", "Andar", "Sala", "Telefone", "Salada", "Quant.", "Observações");
$largura_coluna = array (120, 40, 40, 60, 40, 40, 40);

$conn=mysql_connect("mysql.hostinger.com.br","u581370309_admin","8Cv5hXr0O4Ndp4y2wO");
if (!$conn) die("Não foi possivel conectar"); 
mysql_select_db("u581370309_dados", $conn);

$result = mysql_query($query_rs_produtos);

$total = mysql_numrows($result);
if ($total==0)	{
	mysql_close($conn);
	echo "O Relatório não foi gerado porque a consulta não retornou registros!";
	exit;
}
$rs_produtos = mysql_query($query_rs_produtos, $conn) or die(mysql_error());
$row_rs_produtos = mysql_fetch_assoc($rs_produtos);
$totalRows_rs_produtos = mysql_num_rows($rs_produtos);

$novadata = substr($data_hoje,8,2) . "/" .substr($data_hoje,5,2) . "/" . substr($data_hoje,0,4);

$p = pdf_new();
$relatorio = './mapa_do_dia.pdf';
pdf_open_file($p, "$relatorio");

$altura_celula = $tamanho_fonte+3;
$altura_titulo = $tamanho_fonte_titulo+3;
$altura_tabela = $altura - 2*$margem_vertical;
$linhas_por_pagina = intval (($altura_tabela-$altura_titulo)/$altura_celula)-1;
$num_paginas = ceil($total/$linhas_por_pagina);
$linha_atual = 0;

for($i=0; $i<$num_paginas; $i++)	{
	pdf_begin_page($p,$largura,$altura);
	$font = pdf_findfont($p,"Helvetica-Bold","winansi",0);
	pdf_setfont($p, $font, $tamanho_fonte_titulo);
	$posy = $altura - $margem_vertical;
	$posx = $margem_horizontal;
	$pag_atual = $i+1;
	
	pdf_show_xy($p, $titulo1, $posx, $posy);
	$font = pdf_findfont($p,"Helvetica-Bold","winansi",0);
	pdf_setfont($p,$font,$tamanho_fonte_titulo);
	$posy -= $altura_titulo;
	$posx = $margem_horizontal;
	
	pdf_show_xy($p, $titulo2." $novadata                                                                                                                       Pág. $pag_atual", $posx, $posy);
	$font = pdf_findfont($p,"Helvetica-Bold","winansi",0);
	pdf_setfont($p,$font,$tamanho_fonte_titulo);
	$posy -= $altura_titulo;
	$posx = $margem_horizontal;
	$posy -= $altura_titulo;
	$posx = $margem_horizontal;
	
	pdf_moveto($p, $posx, $posy-3); 
	pdf_lineto($p, $largura-$margem_horizontal, $posy-3);
	pdf_stroke($p);
	
	for ($k=0; $k<sizeof($texto_colunas); $k++)	{
	pdf_show_xy($p, $texto_colunas[$k], $posx, $posy);
	$posx += $largura_coluna[$k];
	}
	$font = pdf_findfont($p,"Helvetica","winansi",0);
	pdf_setfont($p,$font,$tamanho_fonte);
	
	$inicio = $linha_atual;
	$fim = $linha_atual + $linhas_por_pagina;
	if ($fim > $total)
		$fim = $total;
		
	for ($j=$inicio; $j<$fim; $j++)	{
		$linha_atual = $j;
		$posx = $margem_horizontal;
		$posy -= $altura_celula;
		
		for ($k=0; $k<sizeof($colunas_resultantes); $k++)	{
			$valor = mysql_result($result, $linha_atual, $colunas_resultantes[$k]);
			pdf_show_xy($p, $valor, $posx, $posy);
			$posx += $largura_coluna[$k];
		}
		$linha_atual++;
	}
	pdf_end_page($p);
}
mysql_close($conn);
pdf_set_parameter($p, "openaction", "fitpage");
pdf_close($p);
pdf_delete($p);
?>
<body bgcolor="#000000">
<table width="100%" border="0" align="center" bgcolor="#CCCCCC">
  <tr> 
    <td><div align="center"><strong><font size="6">Refeições KOMA-BEM<br>
        <font size="3">Gerar mapa de pedidos do dia</font></font></strong></div></td>
    <td><p>&nbsp;</p>
      </td>
  </tr>
</table>
<hr align="center">
<div align="center">
  <p>&nbsp;</p>
  <p><strong><font color="#FFFFFF" size="3" face="Verdana, Arial, Helvetica, sans-serif">Mapa 
    de Pedidos do </font></strong><font color="#FFFFFF"><strong><font size="3" face="Verdana, Arial, Helvetica, sans-serif"> 
    Dia : <? echo $novadata; ?> criado.</font></strong></font></p>
  <p><br>
    <?
echo "<br>";
echo "<table width=100% align=center border=0>";
echo "<tr>";
echo "<td width=55% align=right><form name=form1 method=get action=mapa_do_dia.pdf><input type=submit value='Imprimir o Mapa'></form></td>";
echo "<td width=50% align=left><form name=form2 method=get action=pedidos_clientes.php><input type=submit value='Voltar'></form></td>";
echo "</tr>";
echo "</table>";
echo "<br>";
?>
  </p>
</div>
</body>
</html>
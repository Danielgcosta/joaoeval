<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Controle do Movimento</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<STYLE type="text/css">
</STYLE>
<? $data = date("Y-m-d");
$novadata = substr($data,8,2) . "/" .substr($data,5,2) . "/" . substr($data,0,4);
$diasemana = date('w'); 
   switch ($diasemana)    { 
      case '0': $diasemana = 'Domingo'; break; 
      case '1': $diasemana = 'Segunda-feira'; break; 
      case '2': $diasemana = 'Terça-feira'; break; 
      case '3': $diasemana = 'Quarta-feira'; break; 
      case '4': $diasemana = 'Quinta-feira'; break; 
      case '5': $diasemana = 'Sexta-feira'; break; 
      case '6': $diasemana = 'Sábado'; break; 
   } 
   $mes = date('n'); 
   switch ($mes)    { 
      case '1': $mes = 'Janeiro'; break; 
      case '2': $mes = 'Fevereiro'; break; 
      case '3': $mes = 'Março'; break; 
      case '4': $mes = 'Abril'; break; 
      case '5': $mes = 'Maio'; break; 
      case '6': $mes = 'Junho'; break; 
      case '7': $mes = 'Julho'; break; 
      case '8': $mes = 'Agosto'; break; 
      case '9': $mes = 'Setembro'; break; 
      case '10': $mes = 'Outubro'; break; 
      case '11': $mes = 'Novembro'; break; 
      case '12': $mes = 'Dezembro'; break; 
   }                
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
          <p><strong><font color="#FFFFFF" size="4" face="Verdana, Arial, Helvetica, sans-serif">Controle do Movimento</font></b></p>
          <p><b><font color="#000099" size="2"><? echo $diasemana.', '.date("j").' de '.$mes.' de '.date('Y'); ?></font></b></p>
        </div></td>
    </tr>
    <tr> 
      <td height="28"><hr align="center"></td>
    </tr>
    <tr> 
      <td height="28"> <div align="center"> 
          <blockquote> 
            <blockquote> 
              <blockquote> 
                <blockquote> <font size="2"><strong><a href="menu_cadastro.php">CADASTRO</a></strong></font></blockquote>
              </blockquote>
            </blockquote>
          </blockquote>
        </div></td>
    </tr>
    <tr> 
      <td height="28"> <div align="center"> 
          <blockquote> 
            <blockquote> 
              <blockquote> 
                <blockquote> <font size="2"><strong><a href="administracao.php">ADMINISTRAçãO</a></strong></font></blockquote>
              </blockquote>
            </blockquote>
          </blockquote>
        </div></td>
    </tr>
    <tr> 
      <td height="28"> <div align="center"> 
          <blockquote> 
            <blockquote> 
              <blockquote> 
                <blockquote> <font size="2"><strong><a href="operacoes_pedidos.php">PEDIDOS</a></strong></font></blockquote>
              </blockquote>
            </blockquote>
          </blockquote>
        </div></td>
    </tr>
    <tr> 
      <td height="28"><hr align="center"></td>
    </tr>
  </table>
  
</div>
</body>
</html>
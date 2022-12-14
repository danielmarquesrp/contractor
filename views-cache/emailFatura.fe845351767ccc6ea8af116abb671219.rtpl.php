<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="color-scheme" content="light">
  <meta name="supported-color-schemes" content="light">
  <title></title>
  <style type="text/css">
.ReadMsgBody { width: 100%; background-color: #ffffff; }
.ExternalClass { width: 100%; background-color: #ffffff; }
.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
html { width: 100%; }
body { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }
table { border-spacing: 0; table-layout: auto; margin: 0 auto; }
.yshortcuts a { border-bottom: none !important; }
img:hover { opacity: 0.9 !important; }
a { color: #3cb2d0; text-decoration: none; }
.textbutton a { font-family: 'open sans', arial, sans-serif !important; }
.btn-link a { color: #FFFFFF !important; }

.btn-danger  a{ color: #FFFFFF !important; }
.btn-danger  { background-color: #af0707 !important; }

@media only screen and (max-width: 479px) {
body { width: auto !important; font-family: 'Open Sans', Arial, Sans-serif !important;}
.table-inner{ width: 90% !important; text-align: center !important;}
.table-full { width: 100%!important; max-width: 100%!important; text-align: center !important;}
/*gmail*/
u + .body .full { width:100% !important; width:100vw !important;}
}
</style>
</head>
<body class="body">
  <table class="full" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td  bgcolor="#22317c" valign="top" style="background-size: cover; background-position: center;">
        <table class="table-inner" align="center" width="600" style="max-width: 600px;" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="40"></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF" style="border-top-left-radius: 4px;border-top-right-radius: 4px;" align="center">
              <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="50"></td>
                </tr>
                <!-- logo -->
                <tr>
                  <td align="center" style="line-height: 0px;"><img style="display:block; line-height:0px; font-size:0px; border:0px;" width="100%" height="250px" src="https://i.ibb.co/gFpC5GS/Whats-App-Image-2022-06-06-at-19-39-10.jpg" alt="logo" /></td>
                </tr>
                <!-- end logo -->
                <tr>
                  <td height="15"></td>
                </tr>
                <!-- slogan -->
                <tr>
                  <td align="center" style="font-family: 'Open Sans', Arial, sans-serif; font-size:12px; color:#3b3b3b; text-transform:uppercase; letter-spacing:2px; font-weight: normal;"><?php echo htmlspecialchars( $nome, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                </tr>
                <!-- end slogan -->
                <tr>
                  <td height="40"></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td align="center" bgcolor="#f3f3f3">
              <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="50"></td>
                </tr>
                <!-- title -->
                <tr>
                  <td align="center" style="font-family: 'Open Sans', Arial, sans-serif; font-size:36px; color:#3b3b3b; font-weight: bold; letter-spacing:4px;">Nota de Cobran??a de Loca????o</td>
                </tr>
                <!-- end title -->
                <tr>
                  <td align="center">
                    <table width="25" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="15" style="border-bottom:2px solid #3cb2d0;"></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td height="20"></td>
                </tr>
                <!-- content -->
                <tr>
                  <td align="center" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#7f8c8d; line-height:29px;">Prezado cliente, <br> Obrigado por escolher o Grupo ETARP. <br> Segue abaixo o link de sua nota. <br> Nota de Cobran??a: <?php echo htmlspecialchars( $numero_nota, ENT_COMPAT, 'UTF-8', FALSE ); ?> <br> Vencimento: <?php echo htmlspecialchars( $data_vencimento, ENT_COMPAT, 'UTF-8', FALSE ); ?> </td>
                </tr>
                <!-- end content -->
                <tr>
                  <td height="50"></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF" style="border-bottom-left-radius: 4px;border-bottom-right-radius: 4px;" align="center">
              <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="40"></td>
                </tr>
                <!-- button -->
                <tr>
                  <td align="center">
                    <table class="textbutton" align="center" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                       <td class="btn-danger" bgcolor="#3cb2d0" height="55" align="center" style="font-family: 'Open Sans', Arial, sans-serif; font-size:16px; color:#FFFFFF;font-weight: bold;padding-left: 25px;padding-right: 25px;border-radius:4px;"> <a href="<?php echo htmlspecialchars( $boleto_url, ENT_COMPAT, 'UTF-8', FALSE ); ?>"> Visualizar Boleto</a></td>
                      </tr>
                    
                  
                    </table>
               
                  </td>
                </tr>
                <tr>
                  <td height="10"></td>
                </tr>
                <tr>
                  <td align="center">
                    <table class="textbutton" align="center" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td class="btn-link" bgcolor="#3cb2d0" height="55" align="center" style="font-family: 'Open Sans', Arial, sans-serif; font-size:16px; color:#FFFFFF;font-weight: bold;padding-left: 25px;padding-right: 25px;border-radius:4px;"><a href="<?php echo htmlspecialchars( $contrato_url, ENT_COMPAT, 'UTF-8', FALSE ); ?>">Visualizar Nota</a></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <!-- end button -->
                <tr>
                  <td height="25"></td>
                </tr>
                <!-- preference -->
                <tr>
                  <td align="center" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#7f8c8d; line-height:29px;">Em caso de d??vidas, entre em contato com um dos nossos canais de atendimento: <br>Central de Atendimento: (16) 3289-5501 <br>Cordialmente,<br>Grupo ETARP - Financeiro<br>contabilidade@etarp.com.br </td>
                </tr>
                <!-- end preference -->
                <tr>
                  <td height="30"></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td height="25"></td>
          </tr>
          <!-- copyright -->
          <tr>
            <td align="center" style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#ffffff;"> ?? 2021 Etarp  - Todos os direitos reservados. </td>
          </tr>
          <!-- end copyright -->
          <tr>
            <td height="25"></td>
          </tr>
          <!-- social -->
          <tr>
            <td align="center">
              <table align="center" border="0" cellspacing="0" cellpadding="0">
                <!-- <tr>
                  <td align="center" style="line-height:0xp;">
                    <a href="#"> <img style="display:block; line-height:0px; font-size:0px; border:0px;" src="images/fb.png" alt="img" /> </a>
                  </td>
                  <td width="20"></td>
                  <td align="center" style="line-height:0xp;">
                    <a href="#"> <img style="display:block; line-height:0px; font-size:0px; border:0px;" src="images/tw.png" alt="img" /> </a>
                  </td>
                  <td width="20"></td>
                  <td align="center" style="line-height:0xp;">
                    <a href="#"> <img style="display:block; line-height:0px; font-size:0px; border:0px;" src="images/gg.png" alt="img" /> </a>
                  </td>
                  <td width="20"></td>
                  <td align="center" style="line-height:0xp;">
                    <a href="#"> <img style="display:block; line-height:0px; font-size:0px; border:0px;" src="images/in.png" alt="img" /> </a>
                  </td>
                  <td width="20"></td>
                  <td align="center" style="line-height:0xp;">
                    <a href="#"> <img style="display:block; line-height:0px; font-size:0px; border:0px;" src="images/bh.png" alt="img" /> </a>
                  </td>
                  <td width="20"></td>
                  <td align="center" style="line-height:0xp;">
                    <a href="#"> <img style="display:block; line-height:0px; font-size:0px; border:0px;" src="images/db.png" alt="img" /> </a>
                  </td>
                </tr> -->
              </table>
            </td>
          </tr>
          <!-- end social -->
          <tr>
            <td height="45"></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>

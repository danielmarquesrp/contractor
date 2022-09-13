<?php


namespace Main;


use Main\Page;

use Mpdf\Mpdf;



class Gerador_PDF{



  public function CreatePDF_Relatorio_And_Save($args)
  {
    $ID_RELATORIO = $args['ID_RELATORIO'];
    $DATA_HORA_ATUAL = $args['DATA_HORA_ATUAL'];
    
    $ETARP_ENDERECO = $args['ETARP_ENDERECO'];
    $ETARP_INSCRICAO_MUNICIPAL = $args['ETARP_INSCRICAO_MUNICIPAL'];
    $ETARP_INSCRICAO_ESTADUAL = $args['ETARP_INSCRICAO_ESTADUAL'];
    $ETARP_CNPJ = $args['ETARP_CNPJ'];
    $NOME_DA_FILIAL = $args['NOME_DA_FILIAL'];
    
    $DESTINATARIO_NOME_COMPLETO = $args['DESTINATARIO_NOME_COMPLETO'];
    $DESTINATARIO_CPF_CNPJ = $args['DESTINATARIO_CPF_CNPJ'];
    $DESTINATARIO_INSCRICAO_ESTADUAL = $args['DESTINATARIO_INSCRICAO_ESTADUAL'];
    $DESTINATARIO_ENDERECO = $args['DESTINATARIO_ENDERECO'];
    $DESTINATARIO_MUNICIPIO = $args['DESTINATARIO_MUNICIPIO'];
    $DESTINATARIO_ESTADO = $args['DESTINATARIO_ESTADO'];
    $DESTINATARIO_BAIRRO = $args['DESTINATARIO_BAIRRO'];
    $DESTINATARIO_TELEFONE = $args['DESTINATARIO_TELEFONE'];
    $DESTINATARIO_CEP = $args['DESTINATARIO_CEP'];


    $CONTEUDO_DOS_PRODUTOS = '';
    $DESCONTO_DOS_PRODUTOS = $args['DESCONTO_DOS_PRODUTOS'];
    $DESPESAS_DOS_PRODUTOS = $args['DESPESAS_DOS_PRODUTOS'];
    $VALOR_BRUTO_DOS_PRODUTOS = 00.00;

    $DESTINATARIO_PRODUTOS = $args['DESTINATARIO_PRODUTOS'];

    $NUMERO_DA_PARCELA = $args['NUMERO_DA_PARCELA'];

    
    $DATA_INICIAL = $args['DATA_INICIAL'];
    $NOME_DO_CONTRATO = $args['NOME_DO_CONTRATO'];

    $DESCRICAO_FATURAMENTO = $args['DESCRICAO_FATURAMENTO'];

    $ARRAY_DESCRICAO_FATURAMENTO = explode("{ESPACO}", $DESCRICAO_FATURAMENTO);


    $PARCELA_SOLICITADA = $args['PARCELA_SOLICITADA'];
    $DATA_REF =  date('m/y', strtotime( $DATA_INICIAL . ' + '.  ($PARCELA_SOLICITADA - 1) .' month'));

    for($i = 1; $i <= count($DESTINATARIO_PRODUTOS) ; $i++){
      
      $CONTEUDO_DOS_PRODUTOS .= 
      '
      <tr >
      <td colspan="3" class="text-left" style="width:70%; font-weight: bold; ">' . $DESTINATARIO_PRODUTOS[$i - 1][3]['desdescription'].' - '.$DESTINATARIO_PRODUTOS[$i - 1][3]['desname']. ' - Qtd:: '. $DESTINATARIO_PRODUTOS[$i - 1][1] . ' - '. 'Ref: '. $DATA_REF .' </td>
      
      <td class="text-left" style="font-weight: bold; ">
         R$'. FormatPrice( $DESTINATARIO_PRODUTOS[$i - 1][2] *  $DESTINATARIO_PRODUTOS[$i - 1][1] ). '</td>
      </tr>
     
      ';
      $VALOR_BRUTO_DOS_PRODUTOS += ($DESTINATARIO_PRODUTOS[$i - 1][2] * $DESTINATARIO_PRODUTOS[$i - 1][1]);
    }

    
     $VALOR_FINAL_PRODUTOS =  ($VALOR_BRUTO_DOS_PRODUTOS + $DESPESAS_DOS_PRODUTOS) - $DESCONTO_DOS_PRODUTOS ;

     
     if($VALOR_FINAL_PRODUTOS < 0)
     {
      $VALOR_FINAL_PRODUTOS = "00.00";
     }
     
     $TOTAL_PARCELAS = $args['TOTAL_PARCELAS'];
     

     $DATA_LIMITE_PAGAMENTO_BOLETO =  date('d-m-Y', strtotime( $DATA_INICIAL . ' + '.  ($PARCELA_SOLICITADA - 1) .' month'));
 
     $mpdf = new Mpdf();

     $mpdf->SetMargins(0, 0, 10);

     $dir =  'views/pdf_files/';
     $stylesheet = file_get_contents($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.$dir.DIRECTORY_SEPARATOR.'relatorio.css'); // external css



    ob_start();
    include($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.$dir.DIRECTORY_SEPARATOR.'relatorio.php');
    $html = ob_get_contents();
    ob_end_clean();
  
    
    $mpdf->WriteHTML($stylesheet,1);
    $mpdf->SetProtection(array('print'));
    $mpdf->SetTitle("UOB Receipt");
    $mpdf->SetAuthor("One Trade Group.");

   
  
     $mpdf->autoScriptToLang = true;
     $mpdf->autoLangToFont = true;

     
     $mpdf->WriteHTML($html);

    //  $directory_ = $directory . '/' ;

     $filename = $ID_RELATORIO . '.pdf';

     $directory_ = 'pdf-files'. '/' ;
     $final_url = $directory_ .'NCL-'. $filename;

     $mpdf->Output($final_url,'F'); 
   
     return array(
      
      'final_url' => $final_url,
      'filename' => $filename,
      'directory' => $directory_
    
    );
  }






  public function CreatePDF_Relatorio($args)
  { 
    $ID_RELATORIO = $args['ID_RELATORIO'];
    $DATA_HORA_ATUAL = $args['DATA_HORA_ATUAL'];
    
    $ETARP_ENDERECO = $args['ETARP_ENDERECO'];
    $ETARP_INSCRICAO_MUNICIPAL = $args['ETARP_INSCRICAO_MUNICIPAL'];
    $ETARP_INSCRICAO_ESTADUAL = $args['ETARP_INSCRICAO_ESTADUAL'];
    $ETARP_CNPJ = $args['ETARP_CNPJ'];
    $NOME_DA_FILIAL = $args['NOME_DA_FILIAL'];
    
    $DESTINATARIO_NOME_COMPLETO = $args['DESTINATARIO_NOME_COMPLETO'];
    $DESTINATARIO_CPF_CNPJ = $args['DESTINATARIO_CPF_CNPJ'];
    $DESTINATARIO_INSCRICAO_ESTADUAL = $args['DESTINATARIO_INSCRICAO_ESTADUAL'];
    $DESTINATARIO_ENDERECO = $args['DESTINATARIO_ENDERECO'];
    $DESTINATARIO_MUNICIPIO = $args['DESTINATARIO_MUNICIPIO'];
    $DESTINATARIO_ESTADO = $args['DESTINATARIO_ESTADO'];
    $DESTINATARIO_BAIRRO = $args['DESTINATARIO_BAIRRO'];
    $DESTINATARIO_TELEFONE = $args['DESTINATARIO_TELEFONE'];
    $DESTINATARIO_CEP = $args['DESTINATARIO_CEP'];


    $CONTEUDO_DOS_PRODUTOS = '';
    $DESCONTO_DOS_PRODUTOS = $args['DESCONTO_DOS_PRODUTOS'];
    $DESPESAS_DOS_PRODUTOS = $args['DESPESAS_DOS_PRODUTOS'];
    $VALOR_BRUTO_DOS_PRODUTOS = 00.00;

    
    $DESTINATARIO_PRODUTOS = $args['DESTINATARIO_PRODUTOS'];

    $NUMERO_DA_PARCELA = $args['NUMERO_DA_PARCELA'];
    $DATA_INICIAL = $args['DATA_INICIAL'];
    $NOME_DO_CONTRATO = $args['NOME_DO_CONTRATO'];




    $DESCRICAO_FATURAMENTO = $args['DESCRICAO_FATURAMENTO'];

    $ARRAY_DESCRICAO_FATURAMENTO = explode("{ESPACO}", $DESCRICAO_FATURAMENTO);

   
    for($i = 1; $i <= count($DESTINATARIO_PRODUTOS) ; $i++){
      
      $CONTEUDO_DOS_PRODUTOS .= 
      '
      <tr >
      <td colspan="3" class="text-left" style="width:70%; font-weight: bold; ">' . $DESTINATARIO_PRODUTOS[$i - 1][3]['desdescription'].' - '.$DESTINATARIO_PRODUTOS[$i - 1][3]['desname']. ' - '.$DESTINATARIO_PRODUTOS[$i - 1][1] . 'x UNIDADE(S) - '. 'Ref: '.date('m/y').' </td>
      
      <td class="text-left" style="font-weight: bold; ">
         R$'. FormatPrice( $DESTINATARIO_PRODUTOS[$i - 1][2] *  $DESTINATARIO_PRODUTOS[$i - 1][1] ). '</td>
      </tr>
     
      ';
      $VALOR_BRUTO_DOS_PRODUTOS += ($DESTINATARIO_PRODUTOS[$i - 1][2] * $DESTINATARIO_PRODUTOS[$i - 1][1]);
    }

    
     $VALOR_FINAL_PRODUTOS =  ($VALOR_BRUTO_DOS_PRODUTOS + $DESPESAS_DOS_PRODUTOS) - $DESCONTO_DOS_PRODUTOS ;

     
     if($VALOR_FINAL_PRODUTOS < 0)
     {
      $VALOR_FINAL_PRODUTOS = "00.00";
     }
     
    

     $TOTAL_PARCELAS = $args['TOTAL_PARCELAS'];

     $DATA_LIMITE_PAGAMENTO_BOLETO =  date('d-m-Y', strtotime( $DATA_INICIAL . ' + '.($NUMERO_DA_PARCELA - 1).' month'));
 
     $mpdf = new Mpdf();

     $mpdf->SetMargins(0, 0, 10);

     $dir =  'views/pdf_files/';
     $stylesheet = file_get_contents($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.$dir.DIRECTORY_SEPARATOR.'relatorio.css'); // external css



    ob_start();
    include($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.$dir.DIRECTORY_SEPARATOR.'relatorio.php');
    $html = ob_get_contents();
    ob_end_clean();
  
    
    $mpdf->WriteHTML($stylesheet,1);
    $mpdf->SetProtection(array('print'));
    $mpdf->SetTitle("Etarp Receipt");
    $mpdf->SetAuthor("One Trade Group.");

 
     $mpdf->WriteHTML($html);
     $mpdf->Output();

}//end function





    }//end Class

 


  
  
      

  
  


?>
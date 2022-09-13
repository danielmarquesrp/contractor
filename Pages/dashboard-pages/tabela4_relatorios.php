<?php
use Main\Mailer;
use Main\Rule;
use Main\DB\Sql;
use Main\Model\User;
use \Main\PageDashboard;
use Main\Model\Relatorio;




$app->get('/pegar-url', function($request, $response, $name){                             


    $sql = new Sql();

    $query = "SELECT * FROM tb_relatorios WHERE idrelatorio = :idrelatorio";

 
    $results = $sql->select($query,[':idrelatorio' => $_GET['relatorio'] ] )[0] ;
   
    if(!json_decode($results['desparcelas'])[ (int)$_GET['coluna'] - 1]->desboleto )
    {
     header('HTTP/1.1 500 Internal Server Error');
     exit(1);
    }


    $DECODED = json_decode($results['desparcelas'])[ (int)$_GET['coluna'] - 1];

    $query = "SELECT desemail, desname FROM tb_clientes WHERE idcliente  = :idcliente";

    $resultado = $sql->select($query, [':idcliente' => $results['idcliente'] ] )[0];

    $data_ = array(
        'nome' => $resultado['desname'],
        'boleto_url' => $DECODED->desboleto,
        'contrato_url' => $DECODED->descontrato,
        'email' => $resultado['desemail'],
        'boleto_directory' => str_replace(array(Rule::get_root_url(),'/'), '', $DECODED->desboleto),
        'pdf_directory' => str_replace(array(Rule::get_root_url(),'/'), '', $DECODED->descontrato)
    );



       $mailer = new Mailer( 
                                        
                Rule::EMAIL_FATURA_ENVIADA,

                "emailFatura",
            
                $data_,

                $data_['email'],
                $data_['nome']
        );

        $mailer ->send();
 

    echo $DECODED->desboleto;
    exit(1);


});                       






$app->post('/capturar-contratos-descricao', function($request, $response, $name){                             


    $sql = new Sql();

    $query = "SELECT desdescription FROM tb_relatorios WHERE idrelatorio = :idrelatorio";

   
   $results = $sql->select($query,[':idrelatorio' => $_POST['idrelatorio'] ] )[0] ;
   

    echo $results['desdescription'] ;
    die;

return $response;
});                       





$app->post('/capturar-valores-produtos', function($request, $response, $name){                             


    $sql = new Sql();

    $query = "SELECT desprodutcts_array_values FROM tb_relatorios WHERE idrelatorio = :idrelatorio";

   
   $results = $sql->select($query,[':idrelatorio' => $_POST['idrelatorio'] ] )[0] ;
   
   

    echo $results['desprodutcts_array_values'] ;
    die;

return $response;
});                       



$app->post('/capturar-filiais', function($request, $response, $name){                             


    $sql = new Sql();

    $query = "SELECT idfilial,desnomefilial FROM tb_filiais";

   
   $results = $sql->select($query);

    echo json_encode($results);
    die;

return $response;
});                       










$app->post('/visualizar-relatorio', function($request, $response, $name){                             

    $sql = new Sql();

    $query = "SELECT * FROM tb_relatorios WHERE idrelatorio = :idrelatorio"; 
    
    $results = $sql -> select($query,[':idrelatorio' => $_POST['idrelatorio'] ]);


 
    echo json_encode( $results ) ;
    die;
    return $response;

});                       














$app->post('/capturar-funcionarios', function($request, $response, $name){                             


        $sql = new Sql();

        $query = "SELECT idcliente,desname FROM tb_clientes";

       
       $results = $sql->select($query);
 
        echo json_encode($results);
        die;
    return $response;
});                       


















$app->post('/deletar-relatorio-ajax', function($request, $response, $name){                             


    $sql = new Sql();
  
    $query = "UPDATE
    tb_relatorios 
    SET STATUS_CONTRATO = 'CANCELADO'
    WHERE idrelatorio = :idrelatorio
    "; 
    
    try
    {
        $sql -> QuerySQL($query,[ ':idrelatorio' => $_POST['idrelatorio'] ]);

        $welcomeMessage = "Relatório CANCELADO com sucesso!";
        $Description = "Obrigado por utilizar os nossos serviços é sempre um prazer poder ajudar!";
        $response_array = array('wellcomeMSG' => $welcomeMessage,'DescriptionMSG' => $Description);   
        header('Content-Type: application/json; charset=UTF-8');      
        echo json_encode($response_array);
        exit;
    }

    catch( \Exception $e)
    {
        $response_array = array('errorMSG' => Rule::ERROR_EMAIL,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;
    }
   
 
    return $response;
});                       









  

$app->get('/relatorios-testes', function($request, $response, $name){               


    $data_inicial = "18-07-2021";

    $qtd_parcelas = "10";
    $valor_cada_parcela = "5";

    $Quantidade_dias_final = ( $qtd_parcelas * $valor_cada_parcela );


    $dt_final = Add_Days_Simple($data_inicial, $Quantidade_dias_final);


    return $response;

});                       




$app->get('/relatorios-ajax-data', function($request, $response, $name){                             

    $sql = new Sql();
    date_default_timezone_set ("America/Sao_Paulo"); 

  
    $query = "SELECT * FROM tb_relatorios a JOIN tb_clientes b ON a.idcliente = b.idcliente"; 

    
    $results = $sql -> select($query);

    // echo "<pre>";
    // print_r($results);
    // echo "</pre>";
    // exit;

    foreach($results as $key => &$val)
    {
       
        //? ESSA FUNÇÃO É IMPORTANTE ARRUMAR
        //PEGA A DATA DE PAGAMENTO DA PRÓXIMA PARCELA
        $NextPayamentDate = Add_Days(  $val['dt_vencimento'], $val['periodo_vencimento'],  $val['desnumero_parcela'] );

        //PEGAR OS DIAS RESTANTES ATÉ O PAGAMENTO DA PRÓXIMA PARCELA 
        $DaysLeftToPaymentValidation = GetDaysDiference(str_replace('/','-', $NextPayamentDate), date('d-m-Y') );




        //! ====================================================================
        if($val['has_to_pay_today'] == "1")
        {                     
                // TEXTO QUE É MOSTRADO PARA A DATA DA PRÓXIMA PARCELA
                $val['days_left'] = $NextPayamentDate . ' <b>[Faltam ' . $DaysLeftToPaymentValidation . ' Dias]</b>';
        }
        else
        { 
                // TEXTO QUE É MOSTRADO PARA A DATA DA PRÓXIMA PARCELA
                $val['days_left']  =  FormatDate( date('d-m-Y') )  . ' <b class="text-info">[Vence Hoje]</b>'; 
        }
        //! ====================================================================





        //? ESSA FUNÇÃO É IMPORTANTE ARRUMAR
        //PEGAR A DIFERENÇA DE DIAS NO TOTAL (DO PRIMEIRO DIA ATÉ O ÚLTIMO) 
        // $TotalDiferenceDays = GetDaysDiference($val['dt_final'],$val['dt_vencimento'] );
        $TotalDiferenceDays = GetDaysDiference(str_replace('/','-', $val['dt_final']), date('d-m-Y') );
        // TEXTO QUE É MOSTRADO PARA A DATA DA ÚLTIMA PARCELA
        $val['days_total_left'] = FormatDate($val['dt_final']) . ' <b>[Faltam ' . $TotalDiferenceDays . ' Dias]</b>';  

       


        if($DaysLeftToPaymentValidation < 0)
        {
            $val['days_left']  =  $NextPayamentDate  . ' <b class="text-danger">[Contrato Vencido]</b>'; 
        } 
            


        if($DaysLeftToPaymentValidation == 0)
        {
            $val['days_left']  =  $NextPayamentDate  . ' <b class="text-info">[Vence Hoje]</b>'; 
        }
        

        if($val['STATUS_CONTRATO'] != "PENDENTE" && $val['STATUS_CONTRATO'] != "CANCELADO")
        {
            $val['days_left']  =  FormatDate($val['dt_final'] )  . '<b class="text-success"> [Tudo Pago] </b>'; 
            $val['days_total_left'] = FormatDate($val['dt_final']) . '<b class="text-success"> [Tudo Pago] </b>';  
        }
        else if ($val['STATUS_CONTRATO'] != "PENDENTE" && $val['STATUS_CONTRATO'] == "CANCELADO") {
            $val['days_left']  =    '<b class="text-danger"> [CANCELADO] </b>'; 
            $val['days_total_left'] = '<b class="text-danger"> [CANCELADO] </b>';  
        }
      
        
    }
    // var_dump($DaysLeftToPaymentValidation);
    // echo "<pre>";

    // exit;
  
    echo json_encode( array('data' => $results) );
    die;
    return $response;

});                       











// $app->post('/atualizar-relatorio', function($request, $response, $name){      
//     /salvar-relatorio       
// });  




$app->post('/atualizar-relatorio', function($request, $response, $name){                             
  



    if( !isset($_POST['desrelatorio']) || $_POST['desrelatorio'] == '' ){

        $response_array = array('errorMSG' => 'INFORME O NOME DO RELATÓRIO','message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }


    if( !isset($_POST['desfilial_id']) || $_POST['desfilial_id'] == '' ){

        $response_array = array('errorMSG' => 'INFORME O NOME DA FILIAL','message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }


    if( !isset($_POST['descliente_id']) || $_POST['descliente_id'] == '' ){

        $response_array = array('errorMSG' => 'INFORME O NOME DO CLIENTE','message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }
    
    
    
    if( !isset($_POST['desprodutcts_array']) || $_POST['desprodutcts_array'] == '' ){

        $response_array = array('errorMSG' => 'INFORME OS PRODUTOS','message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }
    
   




    if( !isset($_POST['idrelatorio']) || $_POST['idrelatorio'] == '' ){

        $response_array = array('errorMSG' => 'ID DO RELATÓRIO NÃO ENCONTRADO'. 'Z' ,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }


   
    if( !isset($_POST['desproducts_values']) ||  ( $products_values = $_POST['desproducts_values'] ) == '' ){

        $response_array = array('errorMSG' => 'INSIRA O VALOR DOS PRODUTOS','message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }


    if( !isset($_POST['desdescription']) ||  ( $desdescription_ = $_POST['desdescription'] ) == '' ){

        $response_array = array('errorMSG' => 'INSIRA A DESCRIÇÃO DO RELATÓRIO','message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }

    /*
    if( !isset($_POST['periodo_vencimento']) ||  ( $periodo_vencimento_ = $_POST['periodo_vencimento'] ) == '' ){

        $response_array = array('errorMSG' => Rule::ERROR_DESCRIPTION,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }



    if( !isset($_POST['quantidade_parcelas']) ||  ( $quantidade_parcelas_ = $_POST['quantidade_parcelas'] ) == '' ){

        $response_array = array('errorMSG' => 'Erro, campo incorreto','message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }*/






    
    for($i = 0; $i < count( (array)$_POST['desproducts_values'] ); $i++)
    {

       $updated_product_values[$i] = str_replace("key_", "" , $products_values[$i]  );

    }




    
  
    $sql = new Sql();

    $descliente_nome__ = "SELECT desname FROM tb_clientes WHERE idcliente = :idcliente";

    $desfilial_nome__ = "SELECT desnomefilial FROM tb_filiais WHERE idfilial = :idfilial";


    $descliente_nome = $sql->select($descliente_nome__,[':idcliente' => $_POST['descliente_id']]);
    $desfilial_nome = $sql->select($desfilial_nome__,[':idfilial' => $_POST['desfilial_id']]);


  
  
  
    // periodo_vencimento = :pperiodo_vencimento,
    // quantidade_parcelas = :pquantidade_parcelas,    
          
    // ':pperiodo_vencimento' => $_POST['periodo_vencimento'],
    // ':pquantidade_parcelas' => $_POST['quantidade_parcelas'],
  
    $sql = new Sql();

    $query = "
    

    UPDATE tb_relatorios 
    SET 
      idfilial = :pidfilial,
      idcliente = :pidcliente,
      desrelatorio = :pdesrelatorio,
      desdescription = :pdesdescription,
      desprodutcts_array = :pdesprodutcts_array,
      desprodutcts_array_values = :pdesprodutcts_array_values,
      desfilial_nome = :pdesfilial_nome,
      descliente_nome = :pdescliente_nome,
      parcelas_pagas = :select_parcelas
    WHERE idrelatorio = :pidrelatorio
    
    ";


    $sql->QuerySQL($query,[
       
    ':pidfilial' => $_POST['desfilial_id'],
    ':pidcliente' => $_POST['descliente_id'],
    ':pdesrelatorio' => $_POST['desrelatorio'],
    ':pdesdescription' => $_POST['desdescription'],
    ':pdesprodutcts_array' => $_POST['desprodutcts_array'],
    ':pdesprodutcts_array_values' => json_encode($updated_product_values),
    ':pdesfilial_nome' => $desfilial_nome[0]['desnomefilial'],
    ':pdescliente_nome' => $descliente_nome[0]['desname'],
    ':select_parcelas' => $_POST['select_parcelas'],


    ':pidrelatorio' => $_POST['idrelatorio']

    ]);


  


    $welcomeMessage = "Contrato atualizado com sucesso! " ;
    $Description = "Obrigado por utilizar os nossos serviços é sempre um prazer poder ajudar!";
    $response_array = array('wellcomeMSG' => $welcomeMessage ,'DescriptionMSG' => $Description);   
    header('Content-Type: application/json; charset=UTF-8');      
    echo json_encode( $response_array  );
    exit;

    return $response;
});                       














$app->get('/cadastrar-relatori2o2', function($request, $response, $name){   


   
   
    $Relatorio = new Relatorio();

  
    // $sql = new sql();


    // $query = "SELECT * FROM
    

    // ;";
    $Relatorio->setData([
        
        'idrelatorio' => 'idrelatorio',
        'idfilial' =>2,
        'idcliente' => 1, 
        'desrelatorio' => 'desrelatorio',
        'desdescription' => 'desdescription',
        'desprodutcts_array' => 'desprodutcts_array',
        'desprodutcts_array_values' => 'desprodutcts_array_values',
        'desfilial_nome' =>'desfilial_nome',
        'descliente_nome' =>'descliente_nome',
        'periodo_vencimento' => 1,
        'quantidade_parcelas' => 6,
        'has_to_pay_today' => 7,
        'dt_inicial' => 'dt_inicial',
        'dt_final' => 'dt_final',
        'desnumero_parcela' => 22

    ]);
    $Relatorio->update();
    echo "<pre>";
    var_dump($Relatorio);

    return $response;
});                       







$app->post('/cadastrar-relatorio', function($request, $response, $name){                             
  
    User::verifyLogin(false);
    


    if( !isset($_POST['desrelatorio']) || $_POST['desrelatorio'] == '' ){

        $response_array = array('errorMSG' => 'INFORME O NOME DO RELATÓRIO','message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }


    if( !isset($_POST['desfilial_id']) || $_POST['desfilial_id'] == '' ){

        $response_array = array('errorMSG' => 'INFORME O NOME DA FILIAL','message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }


    if( !isset($_POST['descliente_id']) || $_POST['descliente_id'] == '' ){

        $response_array = array('errorMSG' => 'INFORME ALGUM NOME','message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }
    
    
    if( !isset($_POST['desprodutcts_array']) || $_POST['desprodutcts_array'] == '' ){

        $response_array = array('errorMSG' => 'ADICIONE ALGUM PRODUTO','message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }
    






    if( !isset($_POST['dt_inicial']) || $_POST['dt_inicial'] == '' ){

        $response_array = array('errorMSG' => 'INFORME A DATA INICIAL','message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }



    if( !isset($_POST['dt_final']) || $_POST['dt_final'] == '' ){

        $response_array = array('errorMSG' => 'INFORME A DATA FINAL','message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }




 
    if( !isset($_POST['totalparcelas']) || $_POST['totalparcelas'] == '' ){

        $response_array = array('errorMSG' => 'INFORME O NÚMERO TOTAL DE PARCELAS','message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }
    

     
    if( !isset($_POST['desproducts_values']) ||  ( $products_values = $_POST['desproducts_values'] ) == '' ){

        $response_array = array('errorMSG' => 'INFORME O VALOR DOS PRODUTOS','message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }



    if( !isset($_POST['desdescription']) ||  ( $desdescription = $_POST['desdescription'] ) == '' ){

        $response_array = array('errorMSG' => 'INFORME A DESCRIÇÃO DO RELATORIO','message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }



    
    if( !isset($_POST['periodo_vencimento']) ||  ( $periodo_vencimento_ = $_POST['periodo_vencimento'] ) == '' ){

        $response_array = array('errorMSG' =>'INFORME O PERIODO DE VENCIMENTO','message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }

    

    
   
    if( !isset($_POST['has_to_pay_today']) ||  ( $has_to_pay_today_ = $_POST['has_to_pay_today'] ) == '' ){

        $response_array = array('errorMSG' => 'INFORME SE O PAGAMENTO DEVE SER FEITO HOJE','message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }

    
    if( !isset($_POST['VALOR_DESCONTO']) ||  ( $VALOR_DESCONTO_ = $_POST['VALOR_DESCONTO'] ) == '' ){

        $response_array = array('errorMSG' => 'INSIRA O VALOR DO DESCONTO','message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }

        
    if( !isset($_POST['VALOR_DESPESAS']) ||  ( $VALOR_DESPESAS = $_POST['VALOR_DESPESAS'] ) == '' ){

        $response_array = array('errorMSG' => 'INSIRA O VALOR DAS DESPESAS','message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }

        
    if( !isset( $_POST['dt_vencimento']) ||  ( $VALOR_DESPESAS =  $_POST['dt_vencimento'] ) == '' && !empty($_POST['dt_vencimento']) ){

        $response_array = array('errorMSG' => 'INFORME O DIA DO VENCIMENTO','message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }

   
    
    for($i = 0; $i < count( (array)$_POST['desproducts_values'] ); $i++)
    {
       $updated_product_values[$i] = str_replace("key_", "" , $products_values[$i]  );

    }

    //change day of dt_inicial
    $dt_inicial_ = $_POST['dt_inicial'];
    // $dt_inicial_ = $_POST['dt_vencimento']  . "-" . $dt_inicial_[1] . "-" . $dt_inicial_[0];
    //Data de Vencimento
    // $dt_vencimento = ;
    $dt_vencimento = date('d-m-Y', strtotime($_POST['dt_vencimento']));
    // $Quantidade_dias_final = ( $_POST['quantidade_parcelas'] * $_POST['periodo_vencimento'] );
    $data_final = Add_Days_Simple($dt_vencimento, $_POST['quantidade_parcelas']);



    $sql = new Sql();

    $descliente_nome__ = "SELECT desname FROM tb_clientes WHERE idcliente = :idcliente";

    $desfilial_nome__ = "SELECT desnomefilial FROM tb_filiais WHERE idfilial = :idfilial";


    $descliente_nome = $sql->select($descliente_nome__,[':idcliente' => $_POST['descliente_id']]);
    $desfilial_nome = $sql->select($desfilial_nome__,[':idfilial' => $_POST['desfilial_id']]);


           //? $_POST['periodo_vencimento'] VENCE DE X EM X DIAS
          //? $_POST['totalparcelas'] NUMERO DA PARCELA ATUAL (PADRAO = 1)
         //? =  $_POST['quantidade_parcelas'] NUMERO TOTAL DE PARCELAS
        //? data_final = DATA FINAL

        $sql = new Sql();

    $desparcelas = array();
    for($i = 0; $i <= $_POST['quantidade_parcelas']; $i++)
    {


        array_push($desparcelas,            
     
            array(
            
                'num_parcela' => $i,       
                'desboleto' => null,
                'descontrato' => null

            )
    
        );
  
        
    }

   
        

    $Relatorio = new Relatorio();

    $Relatorio->setData([
        
        'idrelatorio' => 0,
        'idcliente' => $_POST['descliente_id'],
        'idfilial' => $_POST['desfilial_id'],
        'desrelatorio' => $desfilial_nome[0]['desnomefilial'],
        'desdescription' => $_POST['desdescription'],
        'desprodutcts_array' => (string)$_POST['desprodutcts_array'],
        'desprodutcts_array_values' => json_encode($updated_product_values),
        'desfilial_nome' => $desfilial_nome[0]['desnomefilial'],
        'descliente_nome' => $descliente_nome[0]['desname'] ,
        'periodo_vencimento' => $_POST['periodo_vencimento'], 
        'quantidade_parcelas' => $_POST['quantidade_parcelas'],
        'has_to_pay_today' => $_POST['has_to_pay_today'],  
        'dt_inicial' => $dt_inicial_,
        'dt_vencimento' => $dt_vencimento,
        'dt_final' => $data_final,
        'desnumero_parcela' => $_POST['totalparcelas'],
        'parcelas_pagas' => null,
        'desparcelas' =>  json_encode($desparcelas),
        'ANEXAR_CONTRATO' => $_POST['ANEXAR_CONTRATO'],
        'NUMERO_REF' => $_POST['NUMERO_REF'],
        'VALOR_DESCONTO' => $_POST['VALOR_DESCONTO'],
        'VALOR_DESPESAS' => $_POST['VALOR_DESPESAS']
    ]);
    $Relatorio->update();

    $welcomeMessage = "Relatorio criado com sucesso!";
    $Description = "Obrigado por utilizar os nossos serviços é sempre um prazer poder ajudar!";
    $response_array = array('wellcomeMSG' => $welcomeMessage,'DescriptionMSG' => $Description);   
    header('Content-Type: application/json; charset=UTF-8');      
    echo json_encode($response_array);
    exit;

    return $response;
});                       






























$app->get('/gerenciar-relatorios', function($request, $response, $name){                             
  
    User::verifyLogin(false);
    
    $page = new PageDashboard();     
    
   

    $page -> setTpl("tabela4_relatorios",[

 
    ]);    

    return $response;
});                       









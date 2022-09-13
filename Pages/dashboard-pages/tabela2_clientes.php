<?php

use Main\Rule;
use Main\DB\Sql;
use Main\Model\User;
use Main\Model\Cliente;
use \Main\PageDashboard;















$app->post('/visualizar-cliente', function($request, $response, $name){                             


    $sql = new Sql();

    $query = "SELECT * FROM tb_clientes a
    INNER JOIN tb_address b
    ON a.idcliente = b.idreference
    WHERE a.idcliente = :idcliente"; 
    
    $results = $sql -> select($query,[':idcliente' => $_POST['idcliente'] ]);
 
    echo json_encode( $results) ;
    die;

    return $response;
});                       






$app->post('/deletar-cliente-ajax', function($request, $response, $name){                             


    $sql = new Sql();
  
    $query = "DELETE a,b
    FROM tb_clientes a
    INNER JOIN tb_address b
    ON a.idcliente = b.idreference
    WHERE a.idcliente = :idcliente";
    
    
  
    
    try
    {
        $sql -> QuerySQL($query,[ ':idcliente' => $_POST['idcliente'] ]);

        $welcomeMessage = "Cliente deletado com sucesso!";
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









$app->get('/clientes-ajax-data', function($request, $response, $name){                             


    $sql = new Sql();

    $query = "SELECT * FROM tb_clientes "; 
    
    $results = $sql -> select($query);
 
    echo json_encode( array('data' => $results) );
    die;
    return $response;
});                       
















$app->post('/atualizar-cliente', function($request, $response, $name){                             
  
    User::verifyLogin(false);


    if( !isset($_POST['pdesclient_type']) || $_POST['pdesclient_type'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_CLIENT_TYPE,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }


    if( !isset($_POST['pIE_Indicator']) || $_POST['pIE_Indicator'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_IE_INDICATOR,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }


    if( !isset($_POST['pIE_cod']) || $_POST['pIE_cod'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_IE,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }



    if( !isset($_POST['pdesname']) || $_POST['pdesname'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_NAME,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }


    if( !isset($_POST['pdesdocument_type']) || $_POST['pdesdocument_type'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_DOCUMENT,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }

    if( !isset($_POST['pdesdocument']) || $_POST['pdesdocument'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_DOCUMENT,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }


    if( !isset($_POST['pdesnumber']) || $_POST['pdesnumber'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_NUMBER,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }


    if( !isset($_POST['pdescep']) || $_POST['pdescep'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_DESCEP,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }
    
    
   if( !isset($_POST['pdesaddress']) || $_POST['pdesaddress'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_DESADDRESS,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }
    

    if( !isset($_POST['pdescomplemento']) || $_POST['pdescomplemento'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_DESCOMPLEMENTO,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }
    

    if( !isset($_POST['pbairro']) || $_POST['pbairro'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_DESBAIRRO,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }


    if( !isset($_POST['pdesstate']) || $_POST['pdesstate'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_DESSTATE,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }

    
    if( !isset($_POST['pdescity']) || $_POST['pdescity'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_DESCITY,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }


    if( !isset($_POST['pidcliente']) || $_POST['pidcliente'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_DESCITY,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }


    if( !isset($_POST['pdesemail']) || $_POST['pdesemail'] == '' ){

        $response_array = array('errorMSG' => 'INFORME O E-MAIL','message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }

    $sql = new Sql();
    $query = "UPDATE tb_clientes SET 
    desclient_type = :pdesclient_type,
    IE_Indicator = :pIE_Indicator,
    IE_cod = :pIE_cod,
    desname = :pdesname,
    desemail = :pdesemail,
    desemailsec = :pdesemailsec,
    desdocument_type = :pdesdocument_type,
    desdocument = :pdesdocument,
    desnumber = :pdesnumber
    WHERE idcliente = :pidcliente";

    $sql->QuerySQL($query,[
        'pdesclient_type' => $_POST['pdesclient_type'],
        'pIE_Indicator' => $_POST['pIE_Indicator'],
        'pIE_cod' => $_POST['pIE_cod'],
        'pdesname' => $_POST['pdesname'],
        'pdesemail' => $_POST['pdesemail'],
        'pdesemailsec' => $_POST['pdesemailsec'],
        'pdesdocument_type' => $_POST['pdesdocument_type'],
        'pdesdocument' => $_POST['pdesdocument'],
        'pdesnumber' => $_POST['pdesnumber'],
        'pidcliente' => $_POST['pidcliente']
    ]);


    $queryAddress = "UPDATE tb_address SET
    addresstype = :paddresstype,
    descep = :pdescep,
    desendereco = :pdesaddress,
    descomplemento = :pdescomplemento,
    desbairro = :pbairro,
    desestado = :pdesstate,
    descidade = :pdescity
    WHERE idreference = :pidreference";

    $sql->QuerySQL($queryAddress, [
        'paddresstype' => '0',
        'pdescep' => $_POST['pdescep'],
        'pdesaddress' => $_POST['pdesaddress'],
        'pdescomplemento' => $_POST['pdescomplemento'],
        'pbairro' => $_POST['pbairro'],
        'pdesstate' => $_POST['pdesstate'],
        'pdescity' => $_POST['pdescity'],
        'pidreference' => $_POST['pidcliente']
    ]);

  

    $welcomeMessage = "Cliente atualizado com sucesso!";
    $Description = "Obrigado por utilizar os nossos serviços é sempre um prazer poder ajudar!";
    $response_array = array('wellcomeMSG' => $welcomeMessage,'DescriptionMSG' => $Description);   
    header('Content-Type: application/json; charset=UTF-8');      
    echo json_encode($response_array);
    exit;
 
    return $response;
});                       























$app->post('/cadastrar-cliente', function($request, $response, $name){                             
  
    User::verifyLogin(false);


    if( !isset($_POST['pdesclient_type']) || $_POST['pdesclient_type'] == '' ){
        $response_array = array('errorMSG' => Rule::EMPTY_CLIENT_TYPE,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;
    }


    if( !isset($_POST['pIE_Indicator']) || $_POST['pIE_Indicator'] == '' ){
        $response_array = array('errorMSG' => Rule::EMPTY_IE_INDICATOR,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;
    }


    if( !isset($_POST['pIE_cod']) || $_POST['pIE_cod'] == '' ){
        $response_array = array('errorMSG' => Rule::EMPTY_IE,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;
    }



    if( !isset($_POST['pdesname']) || $_POST['pdesname'] == '' ){
        $response_array = array('errorMSG' => Rule::EMPTY_NAME,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;
    }


    if( !isset($_POST['pdesdocument_type']) || $_POST['pdesdocument_type'] == '' ){
        $response_array = array('errorMSG' => Rule::EMPTY_DOCUMENT,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;
    }

    if( !isset($_POST['pdesdocument']) || $_POST['pdesdocument'] == '' ){
        $response_array = array('errorMSG' => Rule::EMPTY_DOCUMENT,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;
    }


    if( !isset($_POST['pdesnumber']) || $_POST['pdesnumber'] == '' ){
        $response_array = array('errorMSG' => Rule::EMPTY_NUMBER,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;
    }


    if( !isset($_POST['pdescep']) || $_POST['pdescep'] == '' ){
        $response_array = array('errorMSG' => Rule::EMPTY_DESCEP,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;
    }
    
    
   if( !isset($_POST['pdesaddress']) || $_POST['pdesaddress'] == '' ){
        $response_array = array('errorMSG' => Rule::EMPTY_DESADDRESS,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;
    }
    

    if( !isset($_POST['pdescomplemento']) || $_POST['pdescomplemento'] == '' ){
        $response_array = array('errorMSG' => Rule::EMPTY_DESCOMPLEMENTO,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;
    }
    

    if( !isset($_POST['pbairro']) || $_POST['pbairro'] == '' ){
        $response_array = array('errorMSG' => Rule::EMPTY_DESBAIRRO,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;
    }


    if( !isset($_POST['pdesstate']) || $_POST['pdesstate'] == '' ){
        $response_array = array('errorMSG' => Rule::EMPTY_DESSTATE,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;
    }

    
    if( !isset($_POST['pdescity']) || $_POST['pdescity'] == '' ){
        $response_array = array('errorMSG' => Rule::EMPTY_DESCITY,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;
    }

    if( !isset($_POST['pdesemail']) || $_POST['pdesemail'] == '' ){
        $response_array = array('errorMSG' => 'Não deixe o campo "e-mail" em branco','message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;
    }

    
    $sql = new Sql();

    $databaseName = $sql::DBNAME;
    $GetAutoIncrement = "SHOW TABLE STATUS FROM `$databaseName` WHERE `name` LIKE 'tb_clientes' ;
    ";

    $autoIncrement =  $sql->select($GetAutoIncrement)[0]['Auto_increment'];

    $cliente = new Cliente();

  
    $cliente->setData([
        
            'idcliente' => 0,
            'desclient_type' => $_POST['pdesclient_type'],
            'IE_Indicator' => $_POST['pIE_Indicator'],
            'IE_cod' => $_POST['pIE_cod'],
            'desname' => $_POST['pdesname'],
            'desdocument_type' => $_POST['pdesdocument_type'],
            'desdocument' => $_POST['pdesdocument'],
            'desnumber' => $_POST['pdesnumber'],
    
            'idreference' => $autoIncrement,
            'addresstype'=> '0',
            'descep'=> $_POST['pdescep'],
            'desendereco'=> $_POST['pdesaddress'],
            'descomplemento'=> $_POST['pdescomplemento'],
            'desbairro'=> $_POST['pbairro'],
            'desestado'=> $_POST['pdesstate'],
            'descidade' => $_POST['pdescity'],
            'desemail' => $_POST['pdesemail'], 
            'desemailsec' => !empty($_POST['pdesemailsec']) ? $_POST['pdesemailsec'] : '',
            
    ]);
    $cliente->update();
  
    










    $welcomeMessage = "Cliente criado com sucesso!";
    $Description = "Obrigado por utilizar os nossos serviços é sempre um prazer poder ajudar!";
    $response_array = array('wellcomeMSG' => $welcomeMessage,'DescriptionMSG' => $Description);   
    header('Content-Type: application/json; charset=UTF-8');      
    echo json_encode($response_array);
    exit;

    return $response;
});                       







$app->get('/gerenciar-clientes', function($request, $response, $name){                             
  
    User::verifyLogin(false);
    
    $page = new PageDashboard();     
    


    $page -> setTpl("tabela2_clientes",[

 
    ]);    

    return $response;
});                       









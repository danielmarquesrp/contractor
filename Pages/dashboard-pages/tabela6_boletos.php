<?php
use Main\Rule;
use Main\DB\Sql;
use Main\Model\User;
use Main\Model\Boleto;
use \Main\PageDashboard;
use PhpParser\Node\Stmt\Echo_;



$app->post('/deletar-boleto-ajax', function($request, $response, $name){                             


    $sql = new Sql();
  
    $query = "DELETE FROM
    tb_boletos
    WHERE idboleto = :idboleto
    "; 
    
    try
    {
        $sql -> QuerySQL($query,[ ':idboleto' => $_POST['idboleto'] ]);

        $welcomeMessage = "Boleto deletado com sucesso!";
        $Description = "Obrigado por utilizar os nossos se/gerenciar-boletosrviços é sempre um prazer poder ajudar!";
        $URL = "/gerenciar-boletos";
        $response_array = array('wellcomeMSG' => $welcomeMessage,'DescriptionMSG' => $Description, 'WEBSITEURL' => $URL);   
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



$app->post('/boletos-ajax-data', function($request, $response, $name){                             


    $sql = new Sql();

    $query = "SELECT * FROM tb_boletos "; 
    
    $results = $sql -> select($query);
 
  


    echo json_encode( array('data' => $results) );


    die;
    return $response;
});                       








$app->post('/cadastrar-boleto', function($request, $response, $name){                             
  
    User::verifyLogin(false);
    


    if( !isset($_POST['desfilial']) || $_POST['desfilial'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_NAME,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }


    if( !isset($_POST['desdestinatario']) || $_POST['desdestinatario'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_DOCUMENT,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }



    $Boleto = new Boleto();


    $Boleto->setData([
        
        'idboleto' => 0,
        'desfilial' => $_POST['desfilial'],
        'desdestinatario' => $_POST['desdestinatario']         
        
    ]);
    $Boleto->update();

    $welcomeMessage = "Boleto criado com sucesso!";
    $Description = "Obrigado por utilizar os nossos serviços é sempre um prazer poder ajudar!";
    $URL = "/gerenciar-boletos";
    $response_array = array('wellcomeMSG' => $welcomeMessage,'DescriptionMSG' => $Description, 'WEBSITEURL' => $URL);   
    header('Content-Type: application/json; charset=UTF-8');      
    echo json_encode($response_array);
    exit;

    return $response;
});                       




$app->get('/gerenciar-boletos', function($request, $response, $name){                             
  
    User::verifyLogin(false);
    
    $page = new PageDashboard();       
    
   

    $page -> setTpl("tabela6_boletos",[

        

 
    ]);    

    return $response;
});                       






<?php
use Main\Rule;
use Main\DB\Sql;
use Main\Model\User;
use Main\Model\Produto;
use \Main\PageDashboard;





$app->post('/capturar-produtos', function($request, $response, $name){                             


    $sql = new Sql();

    $query = "SELECT idproduto,desname FROM tb_produtos";

   
   $results = $sql->select($query);

    echo json_encode($results);
    die;

return $response;
});                       






$app->post('/atualizar-servico', function($request, $response, $name){                             
  
    User::verifyLogin(false);
    

    if( !isset($_POST['desname']) || $_POST['desname'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_NAME,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }

    if( !isset($_POST['desdescription']) || $_POST['desdescription'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_DESCRIPTION,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }

    if( !isset($_POST['destype']) || $_POST['destype'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_PRICE,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }



    $produto = new Produto();

    $produto->setData([
        
        'idproduto' => $_POST['idproduto'],
        'desname' => $_POST['desname'],
        'desdescription' => $_POST['desdescription'],
        'destype' => $_POST['destype']
        
    ]);
    $produto->update();

    $welcomeMessage = "Serviço/Produto atualizado com sucesso!";
    $Description = "Obrigado por utilizar os nossos serviços é sempre um prazer poder ajudar!";
    $response_array = array('wellcomeMSG' => $welcomeMessage,'DescriptionMSG' => $Description);   
    header('Content-Type: application/json; charset=UTF-8');      
    echo json_encode($response_array);
    exit;

    return $response;
});                














$app->post('/visualizar-servico', function($request, $response, $name){                             

    $sql = new Sql();

    $query = "SELECT * FROM tb_produtos WHERE idproduto = :idproduto"; 
    
    $results = $sql -> select($query,[':idproduto' => $_POST['idproduto'] ]);


 
    echo json_encode( $results ) ;
    die;
    return $response;

});                       



$app->post('/deletar-servico-ajax', function($request, $response, $name){                             


    $sql = new Sql();
  
    $query = "DELETE FROM
    tb_produtos 
    WHERE idproduto = :idproduto
    "; 
    
    try
    {
        $sql -> QuerySQL($query,[ ':idproduto' => $_POST['idproduto'] ]);

        $welcomeMessage = "Serviço deletado com sucesso!";
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






$app->get('/servico-ajax-data', function($request, $response, $name){                             


    $sql = new Sql();

    $query = "SELECT * FROM tb_produtos "; 
    
    $results = $sql -> select($query);
 
    echo json_encode( array('data' => $results) );
    die;
    return $response;
});                       





$app->post('/cadastrar-servico', function($request, $response, $name){                             
  
    User::verifyLogin(false);
    

    if( !isset($_POST['desname']) || $_POST['desname'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_NAME,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }

    if( !isset($_POST['desdescription']) || $_POST['desdescription'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_DESCRIPTION,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }

    if( !isset($_POST['destype']) || $_POST['destype'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_PRICE,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }



    $produto = new Produto();

    $produto->setData([
        
        'idproduto' => 0,
        'desname' => $_POST['desname'],
        'desdescription' => $_POST['desdescription'],
        'destype' => $_POST['destype']
        
    ]);
    $produto->update();

    $welcomeMessage = "Serviço/Produto criado com sucesso!";
    $Description = "Obrigado por utilizar os nossos serviços é sempre um prazer poder ajudar!";
    $response_array = array('wellcomeMSG' => $welcomeMessage,'DescriptionMSG' => $Description);   
    header('Content-Type: application/json; charset=UTF-8');      
    echo json_encode($response_array);
    exit;

    return $response;
});                




$app->get('/gerenciar-servicos', function($request, $response, $name){                             
    
    
    User::verifyLogin(false);

    $page = new PageDashboard();      
    


    $page -> setTpl("tabela1_servicos",[

 
    ]);    

    return $response;
});                       









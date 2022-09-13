<?php
use Main\Rule;
use Main\DB\Sql;
use Main\Model\User;
use Main\Model\Filial;
use \Main\PageDashboard;













$app->post('/atualizar-filial', function($request, $response, $name){                             
  
    User::verifyLogin(false);


    if( !isset($_POST['desrazaosocial']) || $_POST['desrazaosocial'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_RAZAOSOCIAL,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }

    
    if( !isset($_POST['desnomefilial']) || $_POST['desnomefilial'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_NAME,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }


    
    if( !isset($_POST['destelefonefilial']) || $_POST['destelefonefilial'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_NUMBER,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }


    
    if( !isset($_POST['desemailfilial']) || $_POST['desemailfilial'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_EMAIL,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }


    if( !isset($_POST['descnpjfilial']) || $_POST['descnpjfilial'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_DOCUMENT,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }

    // if( !isset($_POST['desincricaomunicipal']) || $_POST['desincricaomunicipal'] == '' ){

    //     $response_array = array('errorMSG' => Rule::EMPTY_INCRICAO_MUNICIPAL,'message' => 'ERROR', 'code' => 1337);   
    //     header('HTTP/1.1 500 Internal Server Booboo');
    //     header('Content-Type: application/json; charset=UTF-8');
    //     echo json_encode($response_array);
    //     exit;

    // }

    if( !isset($_POST['desinscricaoestadual']) || $_POST['desinscricaoestadual'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_INCRICAO_ESTADUAL,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }



    if( !isset($_POST['descnae']) || $_POST['descnae'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_DESCNAE,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }


    if( !isset($_POST['desendereco']) || $_POST['desendereco'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_NAME,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }

    if( !isset($_POST['descep']) || $_POST['descep'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_NAME,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }

    if( !isset($_POST['desestado']) || $_POST['desestado'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_NAME,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }

    if( !isset($_POST['descidade']) || $_POST['descidade'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_NAME,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }

    if( !isset($_POST['desbairro']) || $_POST['desbairro'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_NAME,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }


    // if( !isset($_POST['descomplemento']) || $_POST['descomplemento'] == '' ){

    //     $response_array = array('errorMSG' => Rule::EMPTY_NAME,'message' => 'ERROR', 'code' => 1337);   
    //     header('HTTP/1.1 500 Internal Server Booboo');
    //     header('Content-Type: application/json; charset=UTF-8');
    //     echo json_encode($response_array);
    //     exit;

    // }

 

    if( !isset($_POST['idfilial']) || $_POST['idfilial'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_NAME,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }




    $Filial = new Filial();

    $Filial->setData([




        'idfilial' => $_POST['idfilial'],
        'desrazaosocial'  => $_POST['desrazaosocial'], 
        'desnomefilial'  => $_POST['desnomefilial'],
        'destelefonefilial' => $_POST['destelefonefilial'],
        'desemailfilial'  => $_POST['desemailfilial'],
        'descnpjfilial' => $_POST['descnpjfilial'],
        'desincricaomunicipal' => $_POST['desincricaomunicipal'],
        'desinscricaoestadual' => $_POST['desinscricaoestadual'],
        'descnae'  => $_POST['descnae'],
        
    
        'idreference' => $_POST['idfilial'],
        'addresstype'=> '1',
        'descep'  => $_POST['descep'],
        'desendereco'  => $_POST['desendereco'],
        'descomplemento'  => $_POST['descomplemento'],
        'desbairro'  => $_POST['desbairro'],
        'desestado'  => $_POST['desestado'],
        'descidade'  => $_POST['descidade']
        
    ]);
    $Filial->update();

    $welcomeMessage = "Filial registrada com sucesso!";
    $Description = "Obrigado por utilizar os nossos serviços é sempre um prazer poder ajudar!";
    $response_array = array('wellcomeMSG' => $welcomeMessage,'DescriptionMSG' => $Description);   
    header('Content-Type: application/json; charset=UTF-8');      
    echo json_encode($response_array);
    exit;

    return $response;
});                       



















$app->post('/visualizar-filial', function($request, $response, $name){                             


    $sql = new Sql();

    $query = "SELECT * FROM tb_filiais a
    INNER JOIN tb_address b
    ON a.idfilial = b.idreference
    WHERE a.idfilial = :idfilial"; 
    
    $results = $sql -> select($query,[':idfilial' => $_POST['idfilial'] ]);
 
    echo json_encode( $results) ;
    die;

    return $response;
});                       










$app->post('/deletar-filial-ajax', function($request, $response, $name){                             


    $sql = new Sql();
  
    $query = "DELETE a,b
    FROM tb_filiais a
    INNER JOIN tb_address b
    ON a.idfilial = b.idreference
    WHERE a.idfilial = :idfilial"; 
    
    try
    {
        $sql -> QuerySQL($query,[ ':idfilial' => $_POST['idfilial'] ]);

        $welcomeMessage = "Filial deletada com sucesso!";
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









$app->get('/filiais-ajax-data', function($request, $response, $name){                             

   

    $sql = new Sql();

    $query = "SELECT * FROM tb_filiais"; 
    
    
    $results = $sql -> select($query);
 
    echo json_encode( array('data' => $results) );
    die;
    return $response;
});                       










$app->post('/cadastrar-filial', function($request, $response, $name){                             
  
    User::verifyLogin(false);


    if( !isset($_POST['desrazaosocial']) || $_POST['desrazaosocial'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_RAZAOSOCIAL,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }

    
    if( !isset($_POST['desnomefilial']) || $_POST['desnomefilial'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_NAME,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }


    
    if( !isset($_POST['destelefonefilial']) || $_POST['destelefonefilial'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_NUMBER,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }


    
    if( !isset($_POST['desemailfilial']) || $_POST['desemailfilial'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_EMAIL,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }


    if( !isset($_POST['descnpjfilial']) || $_POST['descnpjfilial'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_DOCUMENT,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }

    // if( !isset($_POST['desincricaomunicipal']) || $_POST['desincricaomunicipal'] == '' ){

    //     $response_array = array('errorMSG' => Rule::EMPTY_INCRICAO_MUNICIPAL,'message' => 'ERROR', 'code' => 1337);   
    //     header('HTTP/1.1 500 Internal Server Booboo');
    //     header('Content-Type: application/json; charset=UTF-8');
    //     echo json_encode($response_array);
    //     exit;

    // }

    if( !isset($_POST['desinscricaoestadual']) || $_POST['desinscricaoestadual'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_INCRICAO_ESTADUAL,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }



    if( !isset($_POST['descnae']) || $_POST['descnae'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_DESCNAE,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }


    if( !isset($_POST['desendereco']) || $_POST['desendereco'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_NAME,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }

    if( !isset($_POST['descep']) || $_POST['descep'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_NAME,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }

    if( !isset($_POST['desestado']) || $_POST['desestado'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_NAME,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }

    if( !isset($_POST['descidade']) || $_POST['descidade'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_NAME,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }

    if( !isset($_POST['desbairro']) || $_POST['desbairro'] == '' ){

        $response_array = array('errorMSG' => Rule::EMPTY_NAME,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }


    // if( !isset($_POST['descomplemento']) || $_POST['descomplemento'] == '' ){

    //     $response_array = array('errorMSG' => Rule::EMPTY_NAME,'message' => 'ERROR', 'code' => 1337);   
    //     header('HTTP/1.1 500 Internal Server Booboo');
    //     header('Content-Type: application/json; charset=UTF-8');
    //     echo json_encode($response_array);
    //     exit;

    // }



    $sql = new Sql();
    $databaseName = $sql::DBNAME;
    $GetAutoIncrement = 
    "
    SHOW TABLE STATUS FROM `$databaseName` WHERE `name` LIKE 'tb_filiais' ;
    ";

    $autoIncrement =  $sql->select($GetAutoIncrement)[0]['Auto_increment'];
   


    $Filial = new Filial();

    $Filial->setData([

        'desrazaosocial'  => $_POST['desrazaosocial'], 
        'desnomefilial'  => $_POST['desnomefilial'],
        'destelefonefilial' => $_POST['destelefonefilial'],
        'desemailfilial'  => $_POST['desemailfilial'],
        'descnpjfilial' => $_POST['descnpjfilial'],
        'desincricaomunicipal' => $_POST['desincricaomunicipal'],
        'desinscricaoestadual' => $_POST['desinscricaoestadual'],
        'descnae'  => $_POST['descnae'],
        
    


        'idreference' => $autoIncrement,
        'addresstype'=> '1',
        'descep'  => $_POST['descep'],
        'desendereco'  => $_POST['desendereco'],
        'descomplemento'  => $_POST['descomplemento'],
        'desbairro'  => $_POST['desbairro'],
        'desestado'  => $_POST['desestado'],
        'descidade'  => $_POST['descidade']
        
    ]);
    $Filial->update();

    $welcomeMessage = "Filial atualizada com sucesso!";
    $Description = "Obrigado por utilizar os nossos serviços é sempre um prazer poder ajudar!";
    $response_array = array('wellcomeMSG' => $welcomeMessage,'DescriptionMSG' => $Description);   
    header('Content-Type: application/json; charset=UTF-8');      
    echo json_encode($response_array);
    exit;

    return $response;
});                       














$app->get('/gerenciar-filiais', function($request, $response, $name){                             
  
    User::verifyLogin(false);

    
    $page = new PageDashboard();       
    

    $page -> setTpl("tabela0_filiais",[

        

 
    ]);    

    return $response;
});                       






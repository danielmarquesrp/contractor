<?php

use Main\DB\Sql;
use Main\Validate;
use Main\Rule;
use Main\Model\User;
use \Main\PageDashboard;








$app->post('/atualizar-funcionario', function($request, $response, $name){                             
  
    User::verifyLogin(false);
  


    if( !isset($_POST['deslogin']) || $_POST['deslogin'] == '' ){

        $response_array = array('errorMSG' => Rule::ERROR_EMAIL,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;
      

    }
 
    if( Validate::ValidateEmail($_POST['deslogin'] ) === false){
      
        $response_array = array('errorMSG' => Rule::VALIDATE_EMAIL,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;
     
    }


    
    if(  (  $despassword = $_POST['despassword'] ) != '' )
    {

        if(  Validate::validatePassword($_POST['despassword'] )  === false){
    
            $response_array = array('errorMSG' => Rule::VALIDATE_PASSWORD,'message' => 'ERROR', 'code' => 1337);   
            header('HTTP/1.1 500 Internal Server Booboo');
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode($response_array);
            exit;
       
        }

        $despassword = User::setPasswordHashing($_POST['despassword']);
    
    }
    else
    {
        $despassword = $_POST['oldHash'];
    }




    if( !isset($_POST['desname']) || $_POST['desname'] == '' ){

        $response_array = array('errorMSG' => Rule::ERROR_EMAIL,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }





    $user = new User();
  
    $user->setData([
      
        'iduser' => $_POST['iduser'], 
        'deslogin' => $_POST['deslogin'],
        'despassword' => $despassword,
        'inadmin' => RULE::DEFAULT_INADMIN,
        'desperson' => $_POST['desname']
   

    ]);

    $user->update();


            $welcomeMessage = "Funcionário atualizado com sucesso!";
            $Description = "Obrigado por utilizar os nossos serviços é sempre um prazer poder ajudar!";
            $response_array = array('wellcomeMSG' => $welcomeMessage,'DescriptionMSG' => $Description);   
            header('Content-Type: application/json; charset=UTF-8');      
            echo json_encode($response_array);
            exit;
       
  
    return $response;
});                      


















$app->post('/visualizar-funcionario', function($request, $response, $name){                             

    $sql = new Sql();

    $query = "SELECT * FROM tb_users a JOIN tb_persons b WHERE a.iduser = b.idperson AND a.iduser = :iduser"; 
    
    $results = $sql -> select($query,[':iduser' => $_POST['iduser'] ]);


 
    echo json_encode( $results ) ;
    die;
    return $response;

});                       






$app->get('/funcionarios-ajax-data', function($request, $response, $name){                             


    $sql = new Sql();

    $query = "SELECT * FROM tb_users a JOIN tb_persons b WHERE a.iduser = b.idperson"; 
    
    $results = $sql -> select($query);
 
    echo json_encode( array('data' => $results) );
    die;
    return $response;
});                       









$app->post('/deletar-funcionario-ajax', function($request, $response, $name){                             


    $sql = new Sql();
  
    $query = "DELETE a,b
    FROM tb_users a
    JOIN tb_persons b
    ON b.idperson = a.iduser
    WHERE b.idperson = :iduser
    "; 
    
    try
    {
        $sql -> QuerySQL($query,[ ':iduser' => $_POST['iduser'] ]);

        $welcomeMessage = "Funcionário deletado com sucesso!";
        $Description = "Obrigado por utilizar os nossos serviços é sempre um prazer poder ajudar!";
        $response_array = array('wellcomeMSG' => $welcomeMessage,'DescriptionMSG' => $Description);   
        header('Content-Type: application/json; charset=UTF-8');      
        echo json_encode($response_array);
        exit;
    }

    catch( \Exception $e)
    {
        $response_array = array('errorMSG' =>'Erro desconhecido','message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;
    }
   
 
    return $response;
});                       











$app->post('/cadastar-funcionario', function($request, $response, $name){                             
  
    User::verifyLogin(false);
  


    if( !isset($_POST['deslogin']) || $_POST['deslogin'] == '' ){

        $response_array = array('errorMSG' => Rule::ERROR_EMAIL,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;
      

    }
 
    if( Validate::ValidateEmail($_POST['deslogin'] ) === false){
      
        $response_array = array('errorMSG' => Rule::VALIDATE_EMAIL,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;
     
    }


    
    if( !isset($_POST['deslogin']) || $_POST['deslogin'] == '' ){

        $response_array = array('errorMSG' => Rule::ERROR_EMAIL,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;
 

    }

    if(  Validate::validatePassword($_POST['despassword'] )  === false){
    
        $response_array = array('errorMSG' => Rule::VALIDATE_PASSWORD,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;
   
    }


    
    if( !isset($_POST['desname']) || $_POST['desname'] == '' ){

        $response_array = array('errorMSG' => Rule::ERROR_EMAIL,'message' => 'ERROR', 'code' => 1337);   
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response_array);
        exit;

    }





    $user = new User();
  
    $user->setData([
      
        'deslogin' => $_POST['deslogin'],
        'despassword' => User::setPasswordHashing($_POST['despassword']),
        'inadmin' => RULE::DEFAULT_INADMIN,
        'desperson' => $_POST['desname']
   

    ]);

    $user->update();


             $welcomeMessage = "Funcionário criado com sucesso!";
            $Description = "Obrigado por utilizar os nossos serviços é sempre um prazer poder ajudar!";
            $response_array = array('wellcomeMSG' => $welcomeMessage,'DescriptionMSG' => $Description);   
            header('Content-Type: application/json; charset=UTF-8');      
            echo json_encode($response_array);
            exit;
       
  
    return $response;
});                       








$app->get('/gerenciar-funcionarios', function($request, $response, $name){                             
  
    User::verifyLogin(false);
    
    $page = new PageDashboard();     
    
   

    $page -> setTpl("tabela3_funcionarios",[

        


    ]);    

    return $response;
});                       









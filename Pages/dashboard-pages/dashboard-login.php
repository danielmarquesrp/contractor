<?php
use Main\Validate;
use Main\Rule;
use Main\Model\User;
use \Main\PageDashboard;
use \Main\DB\Sql; 




$app->get('/logout', function($request, $response, $name){     //Adicionar Hashcode no endereço (ex = 5152151251Admin/Login) para evitar ataques SQL INJECT                         
                
    User::logout();
    header("Location: /");
    exit;

    return $response;
});//end            






$app->post('/conectar-se', function($request, $response, $name){                             

          
            if( !isset($_POST['deslogin']) || $_POST['deslogin'] == '' ){
         
                $response_array = array('errorMSG' => Rule::ERROR_EMAIL,'message' => 'ERROR', 'code' => 1337);  
                header('HTTP/1.1 500 Internal Server Booboo');
                header('Content-Type: application/json; charset=UTF-8');
                echo json_encode($response_array);
                exit;

            }

            if( ( $deslogin = Validate::ValidateEmail($_POST['deslogin'] ) ) === false){

                    $response_array = array('errorMSG' => Rule::VALIDATE_EMAIL,'message' => 'ERROR', 'code' => 1337);  
                   
                    header('HTTP/1.1 500 Internal Server Booboo');
                    header('Content-Type: application/json; charset=UTF-8');
                    echo json_encode($response_array);
                    exit;

            }


            if( !isset($_POST['despassword']) || $_POST['despassword'] == '' ){

                $response_array = array('errorMSG' => Rule::ERROR_PASSWORD,'message' => 'ERROR', 'code' => 1337);  
              
                header('HTTP/1.1 500 Internal Server Booboo');
                header('Content-Type: application/json; charset=UTF-8'); 
                echo json_encode($response_array);
                exit;
            }

            if( ( $despassword = Validate::validatePassword($_POST['despassword'] ) ) === false){
            
                $response_array = array('errorMSG' => Rule::VALIDATE_PASSWORD,'message' => 'ERROR', 'code' => 1337);  
             
                header('HTTP/1.1 500 Internal Server Booboo');
                header('Content-Type: application/json; charset=UTF-8');
                echo json_encode($response_array);
                exit;
            }


            try{   
                User::login( $deslogin, $despassword ) ;
              
                if( ($user = User::getFromSession()) != Null ) 
                {          
                   $welcomeMessage =  'Olá! Bem-vindo (a), '. $user->getdesperson() ;           
                   $URL = '/gerenciar-relatorios' ;
           

                    $response_array = array('wellcomeMSG' => $welcomeMessage,'WEBSITEURL' => $URL);   
                    header('Content-Type: application/json; charset=UTF-8');      
                    echo json_encode($response_array);
                    exit;
                }
            }//EndTry
            catch( \Exception $e)
            {
                $response_array = array('errorMSG' => $e->getMessage(),'message' => 'ERROR', 'code' => 1337);   
                header('HTTP/1.1 400 Internal Server Booboo');
                header('Content-Type: application/json; charset=UTF-8');
                echo json_encode($response_array);
                exit;
            }//EndTry

            return $response;
});         




$app->get('/conectar-se', function($request, $response, $name){                             
  
    CheckLogin();

    $page = new PageDashboard(['header' => false, 'footer'=>false]);   

   
    $page -> setTpl("login",[

 
    ]);    

    return $response;
});         








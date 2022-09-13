<?php
use Main\Rule;
use Main\Validate;
use Main\Model\User;
use Main\PageDashboard;







    $app->get('/recuperar-erro', function($request, $response, $name){                       
    
     
        $page = new PageDashboard(['header' => false, 'footer' => false]);   
        $page -> setTpl("recover-erro",[
            
            'erro' => User::getError()
     
        ]);    

        return $response;
    });  //end        




































    $app->post('/recuperar-senha/redefinir', function($request, $response, $name){     //Adicionar Hashcode no endereço (ex = 5152151251Admin/Login) para evitar ataques SQL INJECT                         
          
    

        if( !isset($_POST['codigo']) || $_POST['codigo'] == '' ){
    
            $response_array = array('errorMSG' => Rule::ERROR_SET_RECOVERY,'message' => 'ERROR', 'code' => 1337);  
            header('HTTP/1.1 500 Internal Server Booboo');
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode($response_array);
            exit;     
     
      
          }
    
    
        try
        {
       
            $recovery = User::getRecovery($_POST['codigo']);     
    
        }
        catch(\Exception $e)
        {
    
            $response_array = array('errorMSG' => $e->getMessage(),'message' => 'ERROR', 'code' => 1337);  
            header('HTTP/1.1 500 Internal Server Booboo');
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode($response_array);
            exit;     

        }
        
    
    
    
    
    
          if( !isset($_POST['newpass']) || $_POST['newpass'] == '' ){
     
            $response_array = array('errorMSG' => Rule::ERROR_CURRENT_PASS_CLIENTE,'message' => 'ERROR', 'code' => 1337);  
            header('HTTP/1.1 500 Internal Server Booboo');
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode($response_array);
            exit;     
     
             }
    
          if( ( $new_pass = Validate::validatePassword($_POST['newpass'] ) ) === false){     
              
            $response_array = array('errorMSG' => Rule::VALIDATE_PASSWORD,'message' => 'ERROR', 'code' => 1337);  
            header('HTTP/1.1 500 Internal Server Booboo');
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode($response_array);
            exit;   
        
           }
    
    
    
    
            if( !isset($_POST['newpass_confirm']) || $_POST['newpass_confirm'] == '' ){
         
                $response_array = array('errorMSG' => Rule::ERROR_PASSWORD,'message' => 'ERROR', 'code' => 1337);  
                header('HTTP/1.1 500 Internal Server Booboo');
                header('Content-Type: application/json; charset=UTF-8');
                echo json_encode($response_array);
                exit;   
      
            }
    
    
    
            if( $_POST['newpass'] !== $_POST['newpass_confirm'] ){
              
                $response_array = array('errorMSG' => Rule::INCORRECT_CONFIRM,'message' => 'ERROR', 'code' => 1337);  
                header('HTTP/1.1 500 Internal Server Booboo');
                header('Content-Type: application/json; charset=UTF-8');
                echo json_encode($response_array);
                exit;   
   
            }
         

    
    
            $user = new User();
    
            $user -> get( (int)$recovery['iduser']  );
    
            $user->setdespassword( User::setPasswordHashing($new_pass) );
    
            $user->update();
    
            User::setDateRecovery( (int)$recovery['idrecovery'] );

            $user->setToSession();
            
            
     
    
            $welcomeMessage = "Sua senha foi modificada!";
            $Description = "Obrigado por utilizar os nossos serviços, conecte-se ao sistema, te redirecionaremos em breve.";
            $URL = "/dashboard";
            $response_array = array('wellcomeMSG' => $welcomeMessage,'DescriptionMSG' => $Description, 'WEBSITEURL' => $URL);   
            header('Content-Type: application/json; charset=UTF-8');      
            echo json_encode($response_array);
            exit;
       
    
            
    
      
    
      
      
            return $response;
    });  //end        
    
    
    
    







    $app->get('/recuperar-senha/redefinir', function($request, $response, $name){        


        if( !isset($_GET['codigo']) || $_GET['codigo'] == '' )
        {
        User::setError(Rule::ERROR_SET_RECOVERY);
        header("Location: /recuperar-erro");
        exit;
        }

        try
        {
        $recovery = User::getRecovery($_GET['codigo']);     
        }
        catch(\Exception $e)
        {
            user::setError($e->getMessage());
            header("Location: /recuperar-erro");
            exit;
        }
        
        $page = new PageDashboard(['header' => false, 'footer' => false]);      

        $page -> setTpl("recover-etapa1",[

            'recovery'=>$recovery,
            'code'=>$_GET['codigo'],
            'error' => User::getError()

        ]);    
    
            return $response;
    });  //end        




























    $app->post('/recuperar-senha', function($request, $response, $name){                             

        $_SESSION[User::RECOVER_VALUES] = $_POST;

        if( !isset($_POST['deslogin']) || $_POST['deslogin'] == '' )
        {
        
            $response_array = array('errorMSG' => Rule::ERROR_EMAIL,'message' => 'ERROR', 'code' => 1337);  
            header('HTTP/1.1 500 Internal Server Booboo');
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode($response_array);
            exit;
    
        }
    
        
            
        if( ( $deslogin = Validate::validateEmail( $_POST['deslogin'] ) ) === false)
        {
    
            $response_array = array('errorMSG' => Rule::VALIDATE_EMAIL,'message' => 'ERROR', 'code' => 1337);  
            header('HTTP/1.1 500 Internal Server Booboo');
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode($response_array);
            exit;
        }



        if( !isset($_POST['deslogin_confirm']) || $_POST['deslogin_confirm'] == '' ){
    
            $response_array = array('errorMSG' => Rule::ERROR_EMAIL_CONFIRM,'message' => 'ERROR', 'code' => 1337);  
            header('HTTP/1.1 500 Internal Server Booboo');
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode($response_array);
            exit;

        }
                
        if( ( $deslogin_confirm = Validate::ValidateEmail($_POST['deslogin_confirm'] ) ) === false){  
            $response_array = array('errorMSG' => Rule::VALIDATE_EMAIL_CONFIRM,'message' => 'ERROR', 'code' => 1337);  
            header('HTTP/1.1 500 Internal Server Booboo');
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode($response_array);
            exit;
        
        }

        if( $deslogin !== $deslogin_confirm ){

            $response_array = array('errorMSG' => Rule::VALIDATE_EMAIL_CONFIRM,'message' => 'ERROR', 'code' => 1337);  
            header('HTTP/1.1 500 Internal Server Booboo');
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode($response_array);
            exit;     

        }



        if ( isset ( $_SESSION[User::RECOVER_VALUES] ) ) unset( $_SESSION[User::RECOVER_VALUES] ); 

        try{

            User::setRecovery($deslogin,false);
            $welcomeMessage = "Recuperação de senha enviada com sucesso!";   
            $descriptionMessage = "Foi enviado um link para a recuperação de senha para o seu e-mail : " . $deslogin;
            $response_array = array('wellcomeMSG' => $welcomeMessage, 'DescriptionMSG' => $descriptionMessage);   
            header('Content-Type: application/json; charset=UTF-8');      
            echo json_encode($response_array);
            exit;

        }catch(\Exception $e){

            $response_array = array('errorMSG' => $e->getMessage(),'message' => 'ERROR', 'code' => 1337);  
            header('HTTP/1.1 500 Internal Server Booboo');
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode($response_array);
            exit;   

        }
    
       



        return $response;
    });         







    $app->get('/recuperar-senha', function($request, $response, $name){                             


        $page = new PageDashboard(['header' => false, 'footer' => false]);   
        $page -> setTpl("recover-etapa0",[

            "recover_values" => (isset ( $_SESSION [User::RECOVER_VALUES] ) )  ?  $_SESSION [User::RECOVER_VALUES]  : [
            
                'deslogin' => '',
                'deslogin_confirm' => ''
            
            ]
    
        ]);    

        return $response;
    });         



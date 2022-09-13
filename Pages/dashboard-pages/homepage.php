<?php
use Main\Rule;
use Main\DB\Sql;
use \Main\Model\User;
use \Main\PageDashboard;




$app->get('/dashboard', function($request, $response, $name){                             
  
    User::verifyLogin(false);
    


    header("Location: /gerenciar-relatorios");
    exit;
    
 

    return $response;
});         








$app->get('/view-pdf', function($request, $response, $name){                             
  
       
    $page = new PageDashboard(['header' => false, 'footer' => false]);   

    
    $page -> setTpl("pdf_file",[

 
    ]);    

    return $response;
});        












$app->get('/', function($request, $response, $name){                             
  
    
    header("Location: /dashboard");
    exit;

    return $response;
});        







<?php
    session_start();
    //ob_start();
    require_once("vendor/autoload.php");   
    use Slim\Factory\AppFactory;
      
        $app = AppFactory::create();

        require_once('functions.php');
     
        require_once('Pages/pdf-pages/gerar-boleto.php'); 
        require_once('Pages/pdf-pages/create-pdf.php');
    
       require_once('Pages/dashboard-pages/dashboard-recover.php');
       require_once('Pages/dashboard-pages/dashboard-login.php'); 
        require_once('Pages/dashboard-pages/homepage.php'); 
        require_once('Pages/dashboard-pages/tabela0_filiais.php'); 
        require_once('Pages/dashboard-pages/tabela1_servicos.php'); 
        require_once('Pages/dashboard-pages/tabela2_clientes.php'); 
        require_once('Pages/dashboard-pages/tabela3_funcionarios.php'); 
        require_once('Pages/dashboard-pages/tabela4_relatorios.php');
        require_once('Pages/dashboard-pages/tabela6_boletos.php'); 
        require_once('Pages/dashboard-pages/tabela7_parcelas.php'); 
        
        $app -> run();  

?>


<?php

        namespace Main;
    
        use \Rain\Tpl;
      
    
    
        class PageDashboard{
    
    
     
           
            private $tpl;
            public $Getconfig;
    
            private $options = [];
            private $defaults = [
    
    
                    'header' => true,
                    'footer' => true,
                    'data'=>[]
    
    
            ];
    
         
       
            public function setData($data = array()){
                foreach($data as $key => $value){
                    $this ->tpl->assign($key, $value);
                    
                }
    
            }
            
            
    
    //--------------
    //HEADER
    //--------------

      
    
            public function __construct($opts = array(), $tpl_Dir = 'views'.DIRECTORY_SEPARATOR."dashboard" )
            {
                date_default_timezone_set("America/Sao_Paulo");
                $this ->options = array_merge($this->defaults, $opts);
            
                $config = array(
                    "tpl_dir" => $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.$tpl_Dir.DIRECTORY_SEPARATOR,
                    "cache_dir" => $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."views-cache".DIRECTORY_SEPARATOR);
                
                    
                 
                    Tpl::configure( $config );
                  
                
                    $this -> tpl = new Tpl;
                   
         
    
                    $this ->setData($this ->options['data']);
                   
                   if($this -> options['header'] === true){
             
              

                    $this->setData( 


                        array (


                            'date' => date('Y-m-d'),
                            'daylast' => date("t")


                        )


                    );

                        $this -> tpl ->draw("header");                       
                    
                   } 
            }  

    
    
    
    
            public function setTpl($name, $data = array(), $returnHTML = false)
            {
              
                $this ->setData($data);
    
    
                return $this ->tpl->draw($name, $returnHTML);
    
            }
    
    
    //--------------
    //Footer
    //--------------
    
            public function __destruct()
            {
                   
                if($this -> options['footer'] === true){
                    $this -> tpl ->draw("footer");
                   } 
               
            }
    //--------------
    //Footer
    //--------------
      
      }
      
        
    
    
?>


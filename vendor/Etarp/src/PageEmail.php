<?php

namespace Main;


        class PageEmail extends PageDashboard{


            public function __construct( $opts = array(), $tpl_Dir = 'views'.DIRECTORY_SEPARATOR."email")
            {
                
                parent::__construct( $opts, $tpl_Dir ); //Chama a montagem Principal

            }




        }

      
        

?>
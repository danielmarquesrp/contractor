<?php

namespace Main\Model;
use \Main\Model;
use \Main\DB\Sql;
use Main\Rule;

class Boleto extends Model
    {


        public function update()
        {
            $sql = new Sql();           
            $query = "
            CALL sp_boletos_update
            (
             :idboleto,
             :desfilial,
             :desdestinatario
            );";

           $results = $sql->select($query, [

                ':idboleto'=>$this->getidboleto(),
                ':desfilial'=>$this->getdesfilial(),
                ':desdestinatario'=>$this->getdesdestinatario()       
               
            ]);  

  

            if( count($results) > 0 ){

                $this -> setData( $results[0] );

            }//endif
            
        }//endmethod










    

            


    }//END CLASS



?>
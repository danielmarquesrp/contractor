<?php

namespace Main\Model;
use \Main\Model;
use \Main\DB\Sql;
use Main\Rule;

class Produto extends Model
    {


        public function update()
        {
            $sql = new Sql();           
            $query = "
            CALL sp_products_update
            (
             :idproduto,
             :desname,
             :desdescription,
             :destype
            );";

           $results = $sql->select($query, [

                ':idproduto'=>$this->getidproduto(),
                ':desname'=>$this->getdesname(),
                ':desdescription'=>$this->getdesdescription(),
                ':destype' => $this->getdestype()
               
            ]);  


          

            if( count($results) > 0 ){

                $this -> setData( $results[0] );

            }//endif
            
        }//endmethod










    

            


    }//END CLASS



?>
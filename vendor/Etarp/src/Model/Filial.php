<?php

namespace Main\Model;
use \Main\Model;
use \Main\DB\Sql;
use Main\Rule;

class Filial extends Model
    {


        public function update()
        {
            $sql = new Sql();           
            $query = "
            CALL sp_filiais_update
            (
  
                :idfilial,
                :desrazaosocial,
                :desnomefilial,
                :destelefonefilial,
                :desemailfilial,
                :descnpjfilial,
                :desincricaomunicipal,
                :desinscricaoestadual,
                :descnae,
  
                :idreference,
                :addresstype,
                :descep,
                :desendereco,
                :descomplemento,
                :desbairro,
                :desestado,
                :descidade

            );";

 

           $results = $sql->select($query, [
       
        
        
                ':idfilial'=>$this->getidfilial(),
                ':desrazaosocial'=>$this->getdesrazaosocial(),
                ':desnomefilial'=>$this->getdesnomefilial(),
                ':destelefonefilial' => $this->getdestelefonefilial(),
                ':desemailfilial' => $this->getdesemailfilial(),
                ':descnpjfilial' => $this->getdescnpjfilial(),
                ':desincricaomunicipal' => $this->getdesincricaomunicipal(),
                ':desinscricaoestadual' => $this->getdesinscricaoestadual(),
                ':descnae' => $this->getdescnae(),
              
              
                ':idreference' => $this->getidreference(),
                ':addresstype'=> $this->getaddresstype(),  
                ':descep'=> $this->getdescep(),
                ':desendereco'=> $this->getdesendereco(),
                ':descomplemento'=> $this->getdescomplemento(),
                ':desbairro'=> $this->getdesbairro(),
                ':desestado'=> $this->getdesestado(),
                ':descidade' => $this->getdescidade()
            
            ]);  

  

            if( count($results) > 0 ){

                $this -> setData( $results[0] );

            }//endif
            
        }//endmethod










    

            


    }//END CLASS



?>
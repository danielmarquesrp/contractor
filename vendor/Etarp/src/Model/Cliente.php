<?php

namespace Main\Model;
use \Main\Model;
use \Main\DB\Sql;
use Main\Rule;

class Cliente extends Model
    {
        public function update()
        {
            $sql = new Sql();           
            $query = "
            CALL sp_clients_update
            (
             :idcliente,
             :desclient_type,
             :IE_Indicator,
             :IE_cod,
             :desname,
             :desdocument_type,
             :desdocument,
             :desnumber, 

             :idreference,
             :addresstype,
             :descep,
             :desendereco,
             :descomplemento,
             :desbairro,
             :desestado,
             :descidade,
             :desemail,
             :desemailsec
            );";

           $results = $sql->select($query, [
                ':idcliente'=>$this->getidcliente(),
                ':desclient_type' => $this->getdesclient_type(),
                ':IE_Indicator' => $this->getIE_Indicator(),
                ':IE_cod' => $this->getIE_cod(),
                ':desname' => $this->getdesname(),
                ':desdocument_type' => $this->getdesdocument_type(),
                ':desdocument' => $this->getdesdocument(),
                ':desnumber' => $this->getdesnumber(),
                
                ':idreference' => $this->getidreference(),
                ':addresstype' => $this->getaddresstype(),
                ':descep' => $this->getdescep(),
                ':desendereco' => $this->getdesendereco(),
                ':descomplemento' => $this->getdescomplemento(),
                ':desbairro' => $this->getdesbairro(),
                ':desestado' => $this->getdesestado(),
                ':descidade'=> $this->getdescidade(),
                ':desemail' => $this->getdesemail(),
                ':desemailsec' => $this->getdesemailsec()
            ]);  
            
            if( count($results) > 0 ){
                $this -> setData( $results[0] );
            }//endif
        }//endmethod

    }//END CLASS

?>
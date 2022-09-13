<?php

namespace Main\Model;
use \Main\Model;
use \Main\DB\Sql;
use Main\Rule;

class Relatorio extends Model
    {
       










               

        public function update()
        {
            $sql = new Sql();           
            $query = "
            CALL sp_relatorios_update
            (
             :idrelatorio,
             :idcliente,
             :idfilial,
             :desrelatorio,
             :desdescription,
             :desprodutcts_array,
             :desprodutcts_array_values,
             :desfilial_nome,
             :descliente_nome,
             :periodo_vencimento, 
             :quantidade_parcelas,
             :has_to_pay_today,
             :dt_inicial,
             :dt_vencimento,
             :dt_final,
             :desnumero_parcela,
             :parcelas_pagas,
             :desparcelas,
             :ANEXAR_CONTRATO,
             :NUMERO_REF,
             :VALOR_DESCONTO,
             :VALOR_DESPESAS,
             :STATUS_CONTRATO
            );";



           $results = $sql->select($query, [

                ':idrelatorio'=>$this->getidrelatorio(),        
                ':idcliente' =>$this->getidcliente(),    
                ':idfilial' =>$this->getidfilial(),                 
                ':desrelatorio' => $this->getdesrelatorio(),
                ':desdescription' => $this->getdesdescription(), 
                ':desprodutcts_array' => $this->getdesprodutcts_array(),
                ':desprodutcts_array_values' => $this->getdesprodutcts_array_values(),
                ':desfilial_nome'=> $this->getdesfilial_nome(),
                ':descliente_nome'=> $this->getdescliente_nome(),
                ':periodo_vencimento' => $this->getperiodo_vencimento(),
                ':quantidade_parcelas' => $this->getquantidade_parcelas(),
                ':has_to_pay_today' => $this->gethas_to_pay_today(),
                ':dt_inicial' => $this->getdt_inicial(),
                ':dt_vencimento' => $this->getdt_vencimento(),
                ':dt_final' => $this->getdt_final(),
                ':desnumero_parcela' => $this->getdesnumero_parcela(), 
                ':parcelas_pagas' => $this->getparcelas_pagas(),
                ':desparcelas' => $this->getdesparcelas(),
                ':ANEXAR_CONTRATO' => $this->getANEXAR_CONTRATO(),
                ':NUMERO_REF' => $this->getNUMERO_REF(),
                ':VALOR_DESCONTO' => $this->getVALOR_DESCONTO(),
                ':VALOR_DESPESAS' => $this->getVALOR_DESPESAS(),
                ':STATUS_CONTRATO' => 'PENDENTE'
               
            ]);  

      
            if( count($results) > 0 ){

                $this -> setData( $results[0] );

            }//endif
            
        }//endmethod










    

            


    }//END CLASS



?>
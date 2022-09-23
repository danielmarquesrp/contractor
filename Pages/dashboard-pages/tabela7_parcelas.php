<?php
use Main\Rule;
use Main\DB\Sql;
use Main\Model\User;

use \Main\PageDashboard;







function FormatDate2($date){

    return date('d/m/Y', strtotime($date));

}



$app->get('/tabela-parcelas', function($request, $response, $name){                             
  
    User::verifyLogin(false);
    
    $page = new PageDashboard();       
    
    if($_GET['id'])
    {
        $idrelatorio = $_GET['id'];
    }
    else
    {
        $idrelatorio = 0;
    }
   

    $page -> setTpl("tabela7_parcelas",[

        
        'idrelatorio' =>  $idrelatorio
 
    ]);    

    return $response;
});                       


function getParcela($numParcela, $ParcelaAtual, $parcelas_pagas)
{
    $parcelas_pagas = json_decode($parcelas_pagas);
    if(!is_array($parcelas_pagas))
    {
        $parcelas_pagas = array($parcelas_pagas);
    }
    //verifica se $ParcelaAtual existe dentro do array $parcelas_pagas
    if(in_array($numParcela, $parcelas_pagas)){
        return "PARCELA PAGA COM SUCESSO";
    }
    else
    { 
        return "PARCELA PENDENTE DE PAGAMENTO";
    }
}

$app->get('/parcelas-ajax-data', function($request, $response, $name){                             


    $sql = new Sql();

    $query = "SELECT * FROM tb_relatorios WHERE idrelatorio = :idrelatorio"; 
    
    
    $results = $sql -> select($query, [':idrelatorio' => $_GET['id']])[0];
 


    $desparcelas = json_decode($results['desparcelas']);
    

    $resposta = array();


    //quantidade_parcelas = 12;
    //periodo_vencimento = 30;

   


    for($i = 0; $i <= $results['quantidade_parcelas']; $i++)
    {
        // $qtdDias = $i *  $results['periodo_vencimento'];
        $str =' + '. $i. ' month';

        
        if($results['STATUS_CONTRATO'] == "CANCELADO"){
            
            $parcelaSit = getParcela($desparcelas[$i]->num_parcela  + 1, $results['desnumero_parcela'], $results['parcelas_pagas']);
          
            if($parcelaSit == 'PARCELA PAGA COM SUCESSO'){
                $steve =   array(
                    'desnumero_parcela' => ($desparcelas[$i]->num_parcela  + 1). ' ° Parcela' ,
                    'cleannumber' => ($desparcelas[$i]->num_parcela  + 1),
                    'idrelatorio' => $_GET['id'],
                    'situacao' => getParcela($desparcelas[$i]->num_parcela  + 1, $results['desnumero_parcela'], $results['parcelas_pagas']),
                    'dt_final' => FormatDate(date('d-m-Y', strtotime($results['dt_vencimento'] . $str)))  . ' 00:00:00'   ,
                );
                array_push($resposta, $steve);
            }
        }else{
            $steve =   array(
                'desnumero_parcela' => ($desparcelas[$i]->num_parcela  + 1). ' ° Parcela' ,
                'cleannumber' => ($desparcelas[$i]->num_parcela  + 1),
                'idrelatorio' => $_GET['id'],
                'situacao' => getParcela($desparcelas[$i]->num_parcela  + 1, $results['desnumero_parcela'], $results['parcelas_pagas']),
                'dt_final' => FormatDate(date('d-m-Y', strtotime($results['dt_vencimento'] . $str)))  . ' 00:00:00'   ,
            );
            array_push($resposta, $steve);
        }

        
    }



    echo json_encode( array('data' => $resposta) );
    die;

    return $response;
});                       




<?php
use Main\Rule;
use Mpdf\Mpdf;
use Main\DB\Sql;
use CnabPHP\Remessa;


use Main\Gerador_PDF;

use OpenBoleto\Agente;

use Main\Model\MercadoPago;
use Main\Model\gerador_boleto;
use OpenBoleto\Banco\Bradesco;


function OpenSQL($query, $id) 
{
    $sql = new Sql(); 
    return $sql->select($query,[':id' => $id])[0];
}




//? FUNCTIONS



$app->get('/criar-boleto', function($request, $response, $name)
{              

    if(empty($_GET['id']))
    {
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        exit;
    }
    if(empty($_GET['parcela']))
    {
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        exit;
    }
  
    
    $relatorios = OpenSQL('SELECT * FROM tb_relatorios WHERE idrelatorio = :id', $_GET['id']);

    $cliente = OpenSQL('SELECT * FROM tb_clientes a INNER JOIN tb_address b ON a.idcliente = b.idreference WHERE idcliente = :id', $relatorios['idcliente']);
    $filial = OpenSQL('SELECT * FROM tb_filiais a INNER JOIN tb_address b ON a.idfilial = b.idreference WHERE idfilial = :id', $relatorios['idfilial']);
 

    $sacado = new Agente($cliente['desname'], $cliente['desdocument'],$cliente['desendereco'], $cliente['descep'], $cliente['desestado'], $cliente['descidade']);
    $cedente = new Agente($filial['desrazaosocial'], $filial['descnpjfilial'], $filial['descomplemento'], $filial['descep'], $filial['desestado'], $filial['descidade']);
   
    $getProduto = "SELECT * FROM tb_produtos WHERE idproduto = :idproduto";

    //? ESSA FUNÇÃO É IMPORTANTE ARRUMAR
    //PEGA A DATA DE PAGAMENTO DA PRÓXIMA PARCELA
    $NextPayamentDate = Add_Days(  $relatorios['dt_vencimento'], $relatorios['periodo_vencimento'],  $relatorios['desnumero_parcela'] );

    //? ESSA FUNÇÃO É IMPORTANTE ARRUMAR
    //PEGA A DATA DE PAGAMENTO DA PRÓXIMA PARCELA
    $products_Array = array();
   
    foreach (json_decode($relatorios['desprodutcts_array_values']) as $key)
    {
     $produto = OpenSQL('SELECT * FROM tb_produtos WHERE idproduto = :id',$key[0] );
     array_push($key, $produto);
     array_push($products_Array, $key );
    }

    //? DEFINE A VARIÁVEL
    $VALOR_BRUTO_DOS_PRODUTOS = 00.00;

    //? VAI PERCORRER O ARRAY DOS PRODUTOS IR ADICIONANDO O VALOR TOTAL DE CADA UM (MULTIPLICADO PELA QUANTIDADE) NO ARRAY DE PRODUTOS
    for($i = 1; $i <= count($products_Array) ; $i++){    $VALOR_BRUTO_DOS_PRODUTOS += ($products_Array[$i - 1][2] * $products_Array[$i - 1][1]);    }

    //? VAI PEGAR O VALOR DE TODOS OS PRODUTOS ADICIONADOS SOMAR COM O VALOR DAS DESPESAS E SUBTRAIR DO VALOR DO DESCONTO
    $VALOR_FINAL_PRODUTOS =  ($VALOR_BRUTO_DOS_PRODUTOS + $relatorios['VALOR_DESPESAS'] ) - $relatorios['VALOR_DESCONTO'] ;

    //? VAI PEGAR O VALOR FINAL E DEFINIR ELE COMO ZERO, CASO ELE SEJA MENOR DO QUE 1
    if($VALOR_FINAL_PRODUTOS < 0){ $VALOR_FINAL_PRODUTOS = "00.00"; }
   

    //? VAI PEGAR O VALOR FINAL E ADICIONAR AS CASAS DECIMAIS, CASO ELE NÃO TENHA.
    $Valor_Boleto = $VALOR_FINAL_PRODUTOS;


    //? VAI DAR UM EXPLODE NA DESCRIÇÃO E PEGAR OS CAMPOS NECESSÁRIOS
    $ARRAY_DESCRICAO_FATURAMENTO = explode("{ESPACO}", $relatorios['desdescription']);

    $data = [
            'pagamento' => array(
                'titulo' => $relatorios['descliente_nome'],
                'valor' => $Valor_Boleto
            ),
            // '$cliente["desdocument"]'
            'parcela_solicitada' => $_GET['parcela'],
            'idreceipt' =>  $_GET['id'],  
            'desparcelas' => json_decode($relatorios['desparcelas']),
            'parcela_atual' => $relatorios['desnumero_parcela'],
         
            'numero_nota' => $relatorios['idrelatorio'],
            'data_vencimento' => $relatorios['dt_vencimento'],

            'pagador' => array(

                    array(
                        "email" => $cliente['desemail'],
                        'desemailsec' => !empty($cliente['desemailsec']) ? $cliente['desemailsec'] : null,
                        "first_name" => $relatorios['descliente_nome'],
                        "last_name" => '',
                        "identification" => array(
                            "type" => "CNPJ",
                            "number" => '22945706000169' 
                       ),
                    "address"=>  array(
                            "zip_code" => $cliente['descep'],
                            "street_name" => $cliente['desendereco'],
                            "street_number" => "0",
                            "neighborhood" => $cliente['desbairro'],
                            "city" => $cliente['descidade'],
                            "federal_unit" => $cliente['desestado']
                     )
                    )
            )
        ];

    $MP_Boleto = new MercadoPago();
    // nfse
    if( !isset($_GET['checagem']) ){

       if(isset($_GET['boleto'])){
            echo $MP_Boleto->doPayament($data, true, false, false) ;
       }
       elseif (isset($_GET['fatura'])) {
           echo $MP_Boleto->doPayament($data, false, true, false);
       }
       elseif(isset($_GET['nfse'])){
           echo $MP_Boleto->doPayament($data, false, false, true);
       }
       else{
           echo $MP_Boleto->doPayament($data, false, false, false);
       }

    }else{

        if( $relatorios['ANEXAR_CONTRATO'] == 1 ){
            echo $MP_Boleto->doPayament($data, true, false, false) ;
       }
       elseif ( $relatorios['ANEXAR_CONTRATO'] == 2 ) {
           echo $MP_Boleto->doPayament($data, false, true, false);
       }
       else{
           echo $MP_Boleto->doPayament($data, false, false, false);
       }

    }



    return $response;
}); 












$app->post('/gerar-boleto', function($request, $response, $name){              



    $boleto = new gerador_boleto();
   


    if($_POST == null)
    {
      
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
 
        exit;
    }

    echo json_encode($_POST);


    return $response;


});                       


















$app->post('/adiantar-parcelas', function($request, $response, $name){              



    // $boleto = new gerador_boleto();
    
    // $boleto->GenerateBoleto();


    if($_POST == null)
    {
    
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        echo "Por favor, selecione algum contrato" ;
        exit;
    }
    else
    {
        $sql = new Sql();

        foreach($_POST as $key )
        {
            foreach ($key as $idrelatorio)
            {

           
                if($idrelatorio['quantidade_parcelas'] > $idrelatorio['desnumero_parcela'])
                {

                    $query = "UPDATE tb_relatorios
                    SET desnumero_parcela = desnumero_parcela + 1 
                    WHERE idrelatorio = :idrelatorio";

                    $sql->QuerySQL($query, ['idrelatorio' => $idrelatorio['idrelatorio'] ]);
                }
                else if($idrelatorio['quantidade_parcelas'] == $idrelatorio['desnumero_parcela'])
                {

                    $query = "UPDATE tb_relatorios
                    SET STATUS_CONTRATO = 'TUDO PAGO'
                    WHERE idrelatorio = :idrelatorio";

                    $sql->QuerySQL($query, ['idrelatorio' => $idrelatorio['idrelatorio'] ]);

                }
                else if($idrelatorio['quantidade_parcelas'] < $idrelatorio['desnumero_parcela'])
                {

                    $query = "UPDATE tb_relatorios
                    SET desnumero_parcela = desnumero_parcela + 1 
                    WHERE idrelatorio = :idrelatorio";

                    $sql->QuerySQL($query, ['idrelatorio' => $idrelatorio['idrelatorio'] ]);


                    
                }
                else
                {
                    header('HTTP/1.1 500 Internal Server Booboo');
                    header('Content-Type: application/json; charset=UTF-8');
                    echo "Ocorreu um erro ao alterar o ID : " . $idrelatorio['idrelatorio'] ;
                    exit;
                }
           

             


            }
           

        }
       
    }



// echo json_encode($_POST);
    

return $response;


});                       

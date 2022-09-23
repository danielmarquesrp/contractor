<?php
use Main\Rule;
use Main\DB\Sql;
use Main\Gerador_PDF;



$app->post('/gerar-relatorio', function($request, $response, $name){                             
  
    $mPDF = new Gerador_PDF();

    $sql = new Sql();
    
    $query = "SELECT * FROM tb_relatorios WHERE idrelatorio = :idrelatorio";
    $relatorios = $sql->select($query,[':idrelatorio' => $_POST['ID_RELATORIO']])[0];
    
    $produtos = json_decode($relatorios['desprodutcts_array_values']);
   


    $getProduto = "SELECT * FROM tb_produtos WHERE idproduto = :idproduto";

    $getCliente = "SELECT * FROM tb_clientes a JOIN tb_address b WHERE b.idreference = a.idcliente AND idcliente = :idcliente ";

    $getFilial = "SELECT * FROM tb_filiais a JOIN tb_address b WHERE b.idreference = a.idfilial AND idfilial = :idfilial ";

    $Cliente = $sql->select($getCliente,[':idcliente' => $relatorios['idcliente'] ])[0];

    $Filial = $sql->select($getFilial, [':idfilial' => $relatorios['idfilial']])[0];


    // for($i = 0; $i < count($produtos); $i++){
    //     array_push($produtosArray, $sql->select($getProduto, [':idproduto' => $produtos[$i]])[0] );
    // }
 

    $products_Array = array();
   
    foreach ($produtos as $key){
     array_push($key, $sql->select($getProduto, [':idproduto' => $key[0]])[0]);
     array_push($products_Array, $key );
    }



    $args = array(
        'ID_RELATORIO' => $_POST['ID_RELATORIO'],
        'NOME_DO_CONTRATO' => $relatorios['desrelatorio'],
        'NUMERO_DA_PARCELA' => $relatorios['desnumero_parcela'],
        'TOTAL_PARCELAS' => $relatorios['quantidade_parcelas'],
        'DATA_INICIAL' => $relatorios['dt_vencimento'],
        'DATA_HORA_ATUAL' => date('d/m/Y H:i:s'),
            
        'NOME_DA_FILIAL' => $Filial['desrazaosocial'],
        'ETARP_ENDERECO' => $Filial['desendereco'],
        'ETARP_CIDADE' => $Filial['descidade'],
        'ETARP_ESTADO' => $Filial['desestado'],
        'ETARP_CEP' => $Filial['descep'],
        'ETARP_INSCRICAO_MUNICIPAL' => $Filial['desincricaomunicipal'],
        'ETARP_INSCRICAO_ESTADUAL' => $Filial['desinscricaoestadual'],
        'ETARP_CNPJ' => $Filial['descnpjfilial'],
    
        'DESTINATARIO_NOME_COMPLETO' => $Cliente['desname'],
        'DESTINATARIO_CPF_CNPJ' => $Cliente['desdocument'],
        'DESTINATARIO_INSCRICAO_ESTADUAL' => $Cliente['IE_cod'],
        'DESTINATARIO_ENDERECO' => $Cliente['desendereco'],
        'DESTINATARIO_MUNICIPIO' => $Cliente['descidade'],
        'DESTINATARIO_ESTADO' => $Cliente['desestado'],
        'DESTINATARIO_BAIRRO' => $Cliente['desbairro'],
        'DESTINATARIO_TELEFONE' => $Cliente['desnumber'],
        'DESTINATARIO_CEP' => $Cliente['descep'],
        
        'DESCRICAO_FATURAMENTO' => $relatorios['desdescription'], 

        'DESTINATARIO_PRODUTOS' => $products_Array,
        'DESCONTO_DOS_PRODUTOS' => $relatorios['VALOR_DESCONTO'],
        'DESPESAS_DOS_PRODUTOS' => $relatorios['VALOR_DESPESAS'],
        'VALOR_FINAL_PRODUTOS' => 00.00
        
    );


  
        $mPDF->CreatePDF_Relatorio($args);     
    
   

       
   
   

    return $response;
});         








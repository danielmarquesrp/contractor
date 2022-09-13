<?php


namespace Main\Model;

use Main\Gerador_PDF;



     use Main\Rule;
     use Main\DB\Sql;
     use \Main\Model\User;
     use Main\Model\Address;
     use \Main\Model\Dependentes;
     use \Main\Mailer;

        class MercadoPago  {


            public function CreateDesConstsConnection()
            {
            //=====================
            $sql = new Sql();
            $query = "SELECT * FROM tb_consts";
            return $sql->select($query);
            //=====================
            }
    
            public function CreateConnection()
            {
                $connection = $this->CreateDesConstsConnection() ;
                $AcessToken = getConstValues($connection, 'desmercadopagotoken');     
                \MercadoPago\SDK::setAccessToken($AcessToken);      
            }
          
                public function sendMail($data, $isboleto = false, $isfatura, $isnsfe)
                {
                        if($isboleto == true){
                            $template = "emailSemFatura";
                        }
                        elseif($isfatura == true){
                            $template = "emailComFatura";
                        }
                        elseif($isnsfe == true){
                            $template = "emailNfse";
                        }
                        else{
                            $template = "emailFatura";
                        }

                            if( !empty($data['desemailsec'])){
                                $mailer = new Mailer( 
                                    Rule::EMAIL_FATURA_ENVIADA,

                                    $template,
                                
                                    $data,

                                    $data['email'],
                                    $data['nome']
                                );
                                $mailer ->send();

                                $mailer = new Mailer( 
                                    
                                    Rule::EMAIL_FATURA_ENVIADA,

                                    $template,
                                
                                    $data,

                                    $data['desemailsec'],
                                    $data['nome']
                                );
                                $mailer ->send();
                                
                            }else{
                                $mailer = new Mailer( 
                                    
                                    Rule::EMAIL_FATURA_ENVIADA,

                                    $template,
                                
                                    $data,

                                    $data['email'],
                                    $data['nome']
                                );
                                $mailer ->send();
                            }
                           
                }

                public function doPdf($directory, $filename, $url)
                {

                    $url  = $url;
                    $filename = 'boleto-'.$filename;
                    $path = $directory.'/'.$filename;

                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_REFERER, $url);

                    $data = curl_exec($ch);

                    curl_close($ch);

                    file_put_contents($path, $data);

                    return $path;
                }










                public function doRequest($ID_RELATORIO, $data = [])
                {
                    $mPDF = new Gerador_PDF();

                    $sql = new Sql();
                    
                    $query = "SELECT * FROM tb_relatorios WHERE idrelatorio = :idrelatorio";
                    $relatorios = $sql->select($query,[':idrelatorio' => $ID_RELATORIO])[0];
                    
                    $produtos = json_decode($relatorios['desprodutcts_array_values']);
                

                    $getProduto = "SELECT * FROM tb_produtos WHERE idproduto = :idproduto";

                    $getCliente = "SELECT * FROM tb_clientes a JOIN tb_address b WHERE b.idreference = a.idcliente AND idcliente = :idcliente ";

                    $getFilial = "SELECT * FROM tb_filiais a JOIN tb_address b WHERE b.idreference = a.idfilial AND idfilial = :idfilial ";

                    $Cliente = $sql->select($getCliente,[':idcliente' => $relatorios['idcliente'] ])[0];

                    $Filial = $sql->select($getFilial, [':idfilial' => $relatorios['idfilial']])[0];


                    $products_Array = array();
                
                    foreach ($produtos as $key)
                    {
                    array_push($key, $sql->select($getProduto, [':idproduto' => $key[0]])[0]);
                    array_push($products_Array, $key );
                    }

                    
            

                    $args = array(
                        'ID_RELATORIO' => $ID_RELATORIO,
                        'NOME_DO_CONTRATO' => $relatorios['desrelatorio'],

                        'PARCELA_SOLICITADA' => !empty($data['parcela_solicitada']) ? $data['parcela_solicitada'] : 1,
                        'NUMERO_DA_PARCELA' => $relatorios['desnumero_parcela'],
                        'DATA_INICIAL' => $relatorios['dt_vencimento'],
                        'DATA_HORA_ATUAL' => date('d/m/Y H:i:s'),
                                 
                        'NOME_DA_FILIAL' => $Filial['desrazaosocial'],
                        'ETARP_ENDERECO' => $Filial['desendereco'],
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
                    
                    $results = $mPDF->CreatePDF_Relatorio_And_Save($args);
           
                    return array(
                        'final_url' => $results['final_url'],
                        'filename' => $results['filename'],
                        'directory' => $results['directory']
                    );
                   
                }







                public function doPayament($data, $isboleto = false, $isfatura = false, $isnsfe = false)
                {
            
                    $this->CreateConnection();

                    $payment = new \MercadoPago\Payment();
                    $payment->transaction_amount = $data['pagamento']['valor'];
                    $payment->description = $data['pagamento']['titulo'];
                    $payment->payment_method_id = "bolbradesco";
                    $payment->payer = $data['pagador'][0];         
                    $payment->save();

                    $directory = $this->doRequest($data['idreceipt'], $data);

                    $boleto = $this->doPdf($directory['directory'], $directory['filename'], $payment->transaction_details->external_resource_url);
                
                    $boletoDir = $isfatura == false ? $boleto : null;
                    $pdf_dir =  $isboleto == false ? $directory['final_url'] : null;
                    
                    if($isnsfe){
                        $pdf_dir = null;
                        $boletoDir = null;
                    }
                
                    $DATA_VENCIMENTO = date('d-m-Y');
                    if(!empty($data['parcela_solicitada'])){
                        $DATA_VENCIMENTO = date('d/m/Y', strtotime( $data['data_vencimento'] . ' + '.  ($data['parcela_solicitada'] - 1) .' month'));
                    }else{
                        $DATA_VENCIMENTO = !empty($data['data_vencimento']) ? $data['data_vencimento'] : 'N/A';
                    }


                    $data_ = array(
                        'nome' => $data['pagador'][0]['first_name'],
                        'boleto_url' => Rule::get_root_url().'/'.$boleto,
                        'contrato_url' => Rule::get_root_url().'/'.$directory['final_url'],
                        'email' => $data['pagador'][0]['email'],
                        'desemailsec' => $data['pagador'][0]['desemailsec'],
                        'numero_nota' => !empty($data['numero_nota']) ? $data['numero_nota'] : 'N/A',
                        'data_vencimento' => $DATA_VENCIMENTO,
                        'boleto_directory' => $boletoDir,
                        'pdf_directory' => $pdf_dir
                    );

                    $new = array();
                    foreach($data['desparcelas'] as $key => $value) {
                        if( ($value->num_parcela + 1) == $data['parcela_atual'])
                        {
                            array_push($new,  
                            array(
                                'num_parcela' => $value->num_parcela,
                                'desboleto'	 =>	$data_['boleto_url'],
                                'descontrato'  =>  $data_['contrato_url']
                            )
                          );
                        }
                        else
                        {
                            array_push($new,  
                                array(
            
                                    'num_parcela' => $value->num_parcela,
                                    'desboleto'	 =>	$value->desboleto,
                                    'descontrato'  =>   $value->descontrato,
                                )
                            );
                        }
                    }
                    $sql = new Sql();
                    $query = "UPDATE tb_relatorios SET desparcelas = :desparcelas  WHERE idrelatorio = :idrelatorio";
                    $sql->QuerySQL($query,[':desparcelas' => json_encode($new), ':idrelatorio' => $data['idreceipt'] ] );
                    

                    $this->sendMail($data_, $isboleto, $isfatura, $isnsfe);  
                    

                    return Rule::get_root_url().'/'.$boleto;
                    exit;
                
                }


}

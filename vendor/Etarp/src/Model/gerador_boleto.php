<?php


namespace Main\Model;

use BradescoApi\Http\Api;
use BradescoApi\BankSlip;

use \BradescoApi\Exceptions\BradescoApiException;
use \BradescoApi\Exceptions\BradescoRequestException;


    class gerador_boleto
    {

                public function GenerateBoleto()
                 {
                                error_reporting(E_ALL);
                                ini_set('display_errors', 1);

                            
                                putenv('BRADESCO_SANDBOX=true');
                                putenv('BRADESCO_TIMEOUT=20');

                                
                                putenv('BRADESCO_CERT_PATH=test.pfx');
                                putenv('BRADESCO_CERT_PASSWORD=myPassword');

                         
                                $data = [
                                "nuCPFCNPJ" => "123456789",
                                "filialCPFCNPJ" => "0001",
                                "ctrlCPFCNPJ" => "39",
                                "idProduto" => "09",
                                "nuNegociacao" => "123400000001234567",
                                "nuCliente" => "123456",
                                "dtEmissaoTitulo" => "25/05/2017",
                                "dtVencimentoTitulo" => "2017-06-20",
                                "vlNominalTitulo" => 100.00,
                                "cdEspecieTitulo" => "04",
                                "nomePagador" => "Cliente Teste",
                                "logradouroPagador" => "Rua Teste",
                                "nuLogradouroPagador" => "90",
                                "complementoLogradouroPagador" => null,
                                "cepPagador" => "12345",
                                "complementoCepPagador" => "500",
                                "bairroPagador" => "Bairro Teste",
                                "municipioPagador" => "Cidade Teste",
                                "ufPagador" => "SP",
                                "nuCpfcnpjPagador" => "549.435.260-98",
                                ];

                                try {
                                    $bankSlip = \BradescoApi\BankSlip::create($data);
                                    print_r($bankSlip);
                                } catch (BradescoApiException $e) { // erros retornados pela API Bradesco
                                    echo $e->getErrorCode() == 69 // este é o único código de erro que não exige tratativa
                                        ? "API Bradesco indica que boleto já foi registrado"
                                        : sprintf("%s (%s)", $e->getMessage(), $e->getErrorCode());
                                } catch (BradescoRequestException $e) { // erros não tratados (erros HTTP 4xx e 5xx)
                                    echo sprintf("%s (%s)", $e->getMessage(), $e->getErrorCode());
                                } catch (\Exception $e) { // demais erros
                                    echo $e->getMessage();
                                }

                }


    }
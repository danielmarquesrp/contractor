<?php if(!class_exists('Rain\Tpl')){exit;}?>		<style>
        .Form-Color
        {
            background-color: rgb(233, 233, 233) !important; 
            color: black !important;
        }
        </style>
     
     















               <!-- Modal relatório -->
               <div class="modal fade" id="ATUALIZAR_RELATORIO">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content modal-content-demo rounded">
                        <div class="modal-header" style="background-color: rgb(247, 247, 247) !important;">
                            <h6 class="modal-title">Modal - Atualizar Relatório</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body" style="background-color: rgb(240, 240, 240);">
    




                            
                            <form id="form-de-atualizar-relatorios" >
    
                               
                                    <div class="form-group  mt-3 mg-b-0">
                                        <label for="deslogin" class="form-label mb-0">Nome do contrato <span class="tx-danger">*</span></label>
                                        <input class="form-control "style="color: #303030;" placeholder="Informe o Nome do contrato " id="NOME_RELATORIO" name="NOME_RELATORIO"  type="text">                              
                                    </div>



                          

                                    <div class="form-group  mt-3 mg-b-0">  
                                        <label for="destype" class="form-label mb-0">Escolha uma filial <span class="tx-danger">*</span></label>
                        
                            
                                            <select class="form-control select2" style="color: #303030;" name="FILIAL_NOME" id="select_filiais_" >  </select>
                            
                                        </select>
                                    </div>



                                    <div class="form-group  mt-3 mg-b-0">  
                                        <label for="destype" class="form-label mb-0">Escolha um cliente<span class="tx-danger">*</span></label>
                                                                  
                                        <select class="form-control select2" style="color: #303030;" name="CLIENTE_NOME" id="select_clientes_" >  </select>
                                                                                                                                                                                    
                                      
                                    </div>
                                  

                                    <div class="form-group  mt-3 mg-b-0">                                                                                                                                  
                                        <label for="deslogin" class="form-label mb-0">Descrição do contrato <span class="tx-danger">*</span></label>
                                        <textarea class="form-control "style="color: #303030;" placeholder="Informe o Nome do contrato " name="desdescription_" id="desdescription_" > </textarea>        

                                                                                                      
                                    </div>


                               

                                          
                                    <div class="form-group  mt-3 mg-b-0">  
                                        <label for="destype" class="form-label mb-0">Escolha os produtos<span class="tx-danger">*</span></label>
                                                                  
                                                              
                                        <select class="form-control select2 Books_Illustrations" id="select_products_" name="PRODUTOS_NOME" multiple="multiple"  >

                                            
                                        </select>
                                                                                                      
                                    </div>

                                    <div class="form-group  mt-3 mg-b-0">  
                                        <label for="destype" class="form-label mb-0">Selecione as parcelas pagas<span class="tx-danger">*</span></label>
                                                                  
                                                              
                                        <select class="form-control select2 Books_Illustrations" id="select_parcelas_" name="PARCELAS_PAGAS" multiple="multiple"  >


                                               

                                        </select>
                                                                                                      
                                    </div>


                                    


<!--                                            
             
                                    
                                    <div class="form-group  mt-3 mg-b-0">  
                                        <label for="deslogin" class="form-label mb-0">Data de início do contrato <span class="tx-danger">*</span></label>
                                        <input class="form-control "style="color: #303030;" placeholder="Informe o Nome do contrato"  value='<?php echo htmlspecialchars( $date, ENT_COMPAT, 'UTF-8', FALSE ); ?>' name="DATA_INICIAL_" id="DATA_INICIAL_"  type="date">                                                                
                                    </div>




                       <div class="form-group  mt-3 mg-b-0">  
                                        <label for="deslogin" class="form-label mb-0">Quantidade total de parcelas <span class="tx-danger">*</span></label>
                                        <select class="form-control select2" style="color: #303030;" name="QUANTIDADE_PARCELAS_" id="QUANTIDADE_PARCELAS_" > </select> 
                                    </div>



                                    <div class="form-group  mt-3 mg-b-0">                                                                                                                                  
                                        <label for="deslogin" class="form-label mb-0">Duração de cada parcela <b>(EM DIAS)</b>  <span class="tx-danger">*</span></label>
                                        <select class="form-control select2" style="color: #303030;" name="periodo_vencimento_" id="periodo_vencimento_" > </select>                                                                                                                                                                                                 
                                    </div>



 -->




                              


                                    <input type="hidden"  id="idclient_" name="idclient" >


                                    <input type="hidden"  id="idfilial_" name="idfilial" >


                                    <input type="hidden"  id="idrelatorio" name="idrelatorio"  >
                                    

                         
                                   
                                                                                      
                                </div>

                             


                                <div class="modal-footer" style="background-color: rgb(247, 247, 247) !important;">
                                    <button class="btn ripple btn-success ml-auto font-weight-bold" id="connect-text"  >Atualizar Contrato </button>          
                                    <a class="btn ripple btn-info font-weight-bold text-white" href="" id="tabela-parcelas"  >Tabela de Parcelas</a>                    
                                    <button class="btn ripple btn-danger mr-auto font-weight-bold" data-dismiss="modal" type="button">Fechar Janela</button>
                                </div>

                          </form>
                    </div>
                </div>
            </div>
            <!-- End Modal relatório-->























  <!-- Modal relatório -->
  <div class="modal" id="modaldemo4">
    <div class="modal-dialog modal-dialog-centered modal-lg" >
        <div class="modal-content modal-content-demo rounded">
            <div class="modal-header" style="background-color: rgb(247, 247, 247) !important;">
                <h6 class="modal-title">Modal - Cadastrar Contrato</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" style="background-color: rgb(240, 240, 240);">

                <form id="form-de-relatorios" >

                    <div class="row row-sm">
                                     
                        

                        <div class="col-lg-12">
                        
                          

                        </div> 
              
                        <div class="col-lg-6">
                     
                     
                            <div class="form-group  mt-3 mg-b-0">  
                                <label for="destype" class="form-label mb-0">Escolha uma filial <span class="tx-danger">*</span></label>
                
                    
                                    <select class="form-control select2" style="color: #303030;" name="select_filiais" id="select_filiais" >  </select>
                    
                                </select>
                            </div>
                     
                        </div>
                     
                        <div class="col-lg-6">
                            <div class="form-group  mt-3 mg-b-0">  
                                <label for="destype" class="form-label mb-0">Escolha um cliente<span class="tx-danger">*</span></label>
                                                          
                                <select class="form-control select2" style="color: #303030;" name="select_clientes" id="select_clientes" >  </select>                                                                                                                                                                                                               
                            </div>
                        </div> 
                     
                     
                     
                     
                        <div class="col-lg-12">

                            <div class="form-group  mt-3 mg-b-0">                                                                                                                                  
                                <label for="deslogin" class="form-label mb-0">Descrição do contrato <span class="tx-danger">*</span></label>
                                <textarea class="form-control "style="color: #303030;" placeholder="Informe o Nome do contrato " name="desdescription" id="desdescription" > </textarea>        

                                                                                              
                            </div>
                        </div> 
                   
                   
                        
                        <div class="col-lg-12">

                            <div class="form-group  mt-3 mg-b-0">  
                                <label for="destype" class="form-label mb-0">Escolha os produtos<span class="tx-danger">*</span></label>
                                                                                                                      
                                <select class="form-control select2" id="select_products"  name="desprodutos" multiple="multiple"  >
                                
                                
                                
                                </select>
                                                                                              
                            </div>

                            
                        </div> 
                   
                        
                     
                        <div class="col-lg-12">
                            <div class="form-group  mt-3 mg-b-0">  
                                <label for="deslogin" class="form-label mb-0">Data de início do contrato <span class="tx-danger">*</span></label>
                                <input class="form-control "style="color: #303030;" placeholder="Informe o Nome do contrato" value='<?php echo htmlspecialchars( $date, ENT_COMPAT, 'UTF-8', FALSE ); ?>' name="DATA_INICIAL" id="DATA_INICIAL"  type="date">                                                                                                                                                                           
                            </div>
                        </div> 

        
                        <div class="col-lg-6">
                            <div class="form-group  mt-3 mg-b-0">  
                                <label for="CACVA" class="form-label mb-0">Dia do vencimento do contrato  <span class="tx-danger">*</span></label>
                                <!-- placeholder="Máximo deste mês(<?php echo htmlspecialchars( $daylast, ENT_COMPAT, 'UTF-8', FALSE ); ?>)" -->
                                <input class="form-control "style="color: #303030;" name="DATA_VENCIMENTO" id="DATA_VENCIMENTO" value="<?php echo htmlspecialchars( $date, ENT_COMPAT, 'UTF-8', FALSE ); ?>" type="date" max="<?php echo htmlspecialchars( $daylast, ENT_COMPAT, 'UTF-8', FALSE ); ?>">                                                                                                                                                                           
                            </div>
                        </div> 
                   
                        
                        <div class="col-lg-6">
                            <div class="form-group  mt-3 mg-b-0">  
                                <label for="deslogin" class="form-label mb-0">Quantidade total de Parcelas   <span class="tx-danger">*</span></label>
                                <select class="form-control select2" style="color: #303030;" name="QUANTIDADE_PARCELAS" id="QUANTIDADE_PARCELAS" > </select> 
                            </div>
                        </div> 

                     
                        <div class="col-lg-4">                
                            <input type="hidden" name="periodo_vencimento" id="periodo_vencimento" value="30">
                        </div> 


                   

                        <div class="col-lg-12">
                         
                         
                                   
                            <div class="form-group  mt-3 mg-b-0">                                                                                                                                  
                                <label for="deslogin" class="form-label mb-0">A primeira parcela será paga hoje?</b> <span class="tx-danger">*</span></label>                                    
                            
                                <select class="form-control select2" style="color: #303030;" name="has_to_pay_today" id="has_to_pay_today" > 
                                <option value="0" >Sim, a primeira parcela deverá ser paga hoje.</option>
                                <option value="1" selected>Não, será paga baseada nas informações passadas.</option>   
                                </select>

                            </div>


                            
                        </div> 

                        
                        <div class="col-lg-6">
                         
                         
                            <div class="form-group  mt-3 mg-b-0">  
                                <label for="deslogin" class="form-label mb-0">Valor do desconto<span class="tx-danger">*</span></label>
                                <input class="form-control "style="color: #303030;" placeholder="Informe o Nome do contrato" value='00.00' name="VALOR_DESCONTO" id="VALOR_DESCONTO" min="00.00" step="any" type="number">                                                                                                                                                                           

                            </div>

                            
                        </div> 

                        
                        <div class="col-lg-6">
                         
                         
                            <div class="form-group  mt-3 mg-b-0">  
                                <label for="deslogin" class="form-label mb-0">Valor de outras despesas<span class="tx-danger">*</span></label>
                                <input class="form-control "style="color: #303030;" placeholder="Informe o Nome do contrato" value='00.00' name="VALOR_DESPESAS" id="VALOR_DESPESAS" min="00.00" step="any" type="number">                                                                                                                                                                           

                            </div>

                            
                        </div> 
                        

                        <div class="col-lg-6">
                         
                         
                            <div class="form-group  mt-3 mg-b-0">  
                                <label for="deslogin" class="form-label mb-0">Número de referência<span class="tx-danger">*</span></label>
                                <input class="form-control "style="color: #303030;" placeholder="Informe o número de referência" value='00' name="numero_referencia_" id="numero_referencia_" min="00" step="any" type="number">                                                                                                                                                                           

                            </div>

                            
                        </div> 

                        <div class="col-lg-6">
                         
                         
                            <div class="form-group  mt-3 mg-b-0">                                                                                                                                  
                                <label for="deslogin" class="form-label mb-0">Anexos ao enviar automaticamente</b> <span class="tx-danger">*</span></label>                                    
                                <select class="form-control select2" style="color: #303030;" name="anexar_contrato_" id="anexar_contrato_" > 
                                    <option value="0" selected>Anexar Boleto + Fatura</option>
                                    <option value="1" >Anexar apenas Boleto.</option>   
                                    <option value="2" >Anexar apenas Fatura.</option>   
                                    <option value="3" >Anexar apenas NFS-E</option>   
                                </select>
                            </div>


                            
                        </div> 
                


                        <input type="hidden"  id="idclient" name="idclient" >



                        <input type="hidden"  id="idfilial" name="idfilial" >



                    </div>

                                                                          
                    </div>

                 


                    <div class="modal-footer" style="background-color: rgb(247, 247, 247) !important;">
                        <button class="btn ripple btn-success ml-auto font-weight-bold" id="connect-text"  >Cadastrar Contrato </button>                             
                        <button class="btn ripple btn-danger mr-auto font-weight-bold" data-dismiss="modal" type="button">Fechar Janela</button>
                    </div>
              </form>
        </div>
    </div>
</div>
<!-- End Modal relatório-->

















































            <!-- Modal Produto -->
            <div class="modal fade" id="ATUALIZAR_SERVICO">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content modal-content-demo rounded">
                        <div class="modal-header" style="background-color: rgb(247, 247, 247) !important;">
                            <h6 class="modal-title">Modal - Cadastrar Produto/Serviço</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
    
                            <form id="form-de-atualizar-produtos" >  
                                    <div class="form-group  mg-b-0">
                                        <label for="desname" class="form-label mb-0">Nome do Produto/Serviço <span class="tx-danger">*</span></label>
                                        <input class="form-control Form-Color" placeholder="Informe o nome " id="NOME_PRODUTO" name="desname"  type="text">                              
                                    </div>
                                    <div class="form-group  mt-3 mg-b-0">
                                        <label for="deslogin" class="form-label mb-0">Descrição do Produto/Serviço <span class="tx-danger">*</span></label>
                                        <input class="form-control Form-Color" placeholder="Informe a descrição" id="DESCRICAO_PRODUTO" name="desproduct"  type="text">                              
                                    </div>

                                    <div class="form-group   mt-3 mg-b-0">
                                        <label for="destype" class="form-label mb-0">Tipo do Produto/Serviço <span class="tx-danger">*</span></label>
                                        <select class="form-control Form-Color"  style="color: #303030;" name="SELECT_PRODUTOS_" id="SELECT_PRODUTOS_" >  
                                            <option value="0">Este é um Produto</option>
                                            <option value="1">Este é um Serviço</option>
                                        </select>
                                    </div>

                                    <input type="hidden" id="ID_PRODUTO" name="ID_PRODUTO">
                                    
                                </div>
                                <div class="modal-footer" style="background-color: rgb(247, 247, 247) !important;">
                                    <button class="btn ripple btn-success ml-auto font-weight-bold" id="connect-text" >Atualizar Produto/Serviço </button>  
                                    <button class="btn ripple btn-danger mr-auto font-weight-bold" data-dismiss="modal" type="button">Fechar Janela</button>
                                </div>
                          </form>
                    </div>
                </div>
            </div>
            <!-- End Modal Produto-->














     
     <!-- Modal Funcionários -->

     <div class="modal fade" id="Funcionario_Atualizar">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo rounded">
                <div class="modal-header" style="background-color: rgb(247, 247, 247) !important;">
                    <h6 class="modal-title">Modal - Cadastrar Funcionário</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <form id="form-de-atualizar-funcionarios" >

                            <div class="form-group  mg-b-0">
                                <label for="desname" class="form-label mb-0">Nome do Funcionário <span class="tx-danger">*</span></label>
                                <input class="form-control Form-Color" placeholder="Informe o nome " name="desname" id="NOME_FUNCIONARIO" type="text">                              
                            </div>
                            
                            <div class="form-group  mt-3 mg-b-0">
                                <label for="deslogin" class="form-label mb-0">E-mail do Funcionário <span class="tx-danger">*</span></label>
                                <input class="form-control Form-Color" placeholder="Informe o login (e-mail)" name="deslogin" id="EMAIL_FUNCIONARIO" type="email">                              
                            </div>
                            <div class="form-group  mt-3 mg-b-0">
                                <label for="despassword" class="form-label mb-0">Senha do Funcionário <span class="tx-danger">*</span></label>
                                <input class="form-control Form-Color" placeholder="Se não for alterar, deixe em branco!" name="despassword" id="SENHA_FUNCIONARIO" type="password" >                              
                            </div>

                            <input type="hidden" id="OLD_HASH" name="OLD_HASH">
                            <input type="hidden" id="ID_USER" name="ID_USER">
                            
                        
                        </div>

                        
                        <div class="modal-footer" style="background-color: rgb(247, 247, 247) !important;">
                            <button class="btn ripple btn-success ml-auto font-weight-bold" id="connect-text" >Atualizar Funcionário </button>                             
                            <button class="btn ripple btn-danger mr-auto font-weight-bold" data-dismiss="modal" type="button">Fechar Janela</button>
                        </div>
                  </form>
            </div>
        </div>
    </div>
    <!-- End Modal Funcionários-->













  <!-- Modal Filial -->
  <div class="modal fade" id="Filial_Atualizar">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content modal-content-demo rounded">
            <div class="modal-header" style="background-color: rgb(247, 247, 247) !important;">
                <h6 class="modal-title">Modal - Atualizar Filial</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form id="form-de-atualizar-filiais" >

                    <div class="row row-sm">
                                     
                        

                        <div class="col-lg-12">
                        

                            <div class="form-group mt-3  mg-b-0">
                                <label for="deslogin" class="form-label mb-0">Razão Social <span class="tx-danger">*</span></label>
                                <input class="form-control Form-Color" placeholder="Informe a razão social" id="RAZAO_SOCIAL" name="desrazaosocial"  type="text">                              
                            </div>
                                
                            
                        </div>


                        <div class="col-lg-6">
                                                                                   
                            <div class="form-group mt-3  mg-b-0">
                                <label for="deslogin" class="form-label mb-0">Nome da Filial <span class="tx-danger">*</span></label>
                                <input class="form-control Form-Color" placeholder="Informe o nome da filial" id="NOME_FILIAL" name="desnomefilial"  type="text">                              
                            </div>

                            <div class="form-group mt-3  mg-b-0">
                                <label for="deslogin" class="form-label mb-0">Telefone da Filial <span class="tx-danger">*</span></label>
                                <input class="form-control Form-Color" placeholder="Informe o telefone da filial" id="TELEFONE_FILIAL"  name="destelefonefilial"  type="text">                              
                            </div>

                            <div class="form-group mt-3  mg-b-0">
                                <label for="deslogin" class="form-label mb-0">E-mail da Filial <span class="tx-danger">*</span></label>
                                <input class="form-control Form-Color" placeholder="Informe o e-mail da filial" id="EMAIL_FILIAL" name="desemailfilial"  type="text">                              
                            </div>

                            <div class="form-group mt-3  mg-b-0">
                                <label for="deslogin" class="form-label mb-0">CNPJ da Filial <span class="tx-danger">*</span></label>
                                <input class="form-control Form-Color" placeholder="Informe o cnpj da filial" id="CNPJ_FILIAL" name="descnpjfilial"  type="text">                              
                            </div>

                            <div class="form-group mt-3  mg-b-0">
                                <label for="deslogin" class="form-label mb-0">Incrição Municipal da Filial <span class="tx-danger">(Opcional)</span></label>
                                <input class="form-control Form-Color" placeholder="Informe a Inscrição Municipal da filial" id="IM_DA_FILIAL" name="desincricaomunicipal"  type="text">                              
                            </div>

                            <div class="form-group mt-3  mg-b-0">
                                <label for="deslogin" class="form-label mb-0">Incrição Estadual da Filial <span class="tx-danger">*</span></label>
                                <input class="form-control Form-Color" placeholder="Informe a Inscrição Estadual da filial" id="IE_DA_FILIAL" name="desincricaoestadual"  type="text">                              
                            </div>

                        </div>

          

                        <div class="col-lg-6">
                                                                                   
                            <div class="form-group mt-3  mg-b-0">
                                <label for="deslogin" class="form-label mb-0">Endereço da Filial <span class="tx-danger">*</span></label>
                                <input class="form-control Form-Color" placeholder="Informe o endereço" name="desaddress" id="ENDERECO_FILIAL"  type="text">                              
                            </div>

                            <div class="form-group mt-3  mg-b-0">
                                <label for="deslogin" class="form-label mb-0">CEP da Filial <span class="tx-danger">*</span></label>
                                <input class="form-control Form-Color" placeholder="Informe o cep" name="descep" id="CEP_FILIAL"  type="text">                              
                            </div>

                            <div class="form-group mt-3  mg-b-0">
                                <label for="deslogin" class="form-label mb-0">Estado da Filial <span class="tx-danger">*</span></label>
                                <input class="form-control Form-Color" placeholder="Informe o estado" name="desstate" id="ESTADO_FILIAL"  type="text">                              
                            </div>

                            <div class="form-group mt-3  mg-b-0">
                                <label for="deslogin" class="form-label mb-0">Cidade da Filial <span class="tx-danger">*</span></label>
                                <input class="form-control Form-Color" placeholder="Informe a cidade" name="descity" id="CIDADE_FILIAL" type="text">                              
                            </div>


                            <div class="form-group mt-3  mg-b-0">
                                <label for="deslogin" class="form-label mb-0">Bairro da Filial <span class="tx-danger">*</span></label>
                                <input class="form-control Form-Color" placeholder="Informe o bairro" name="desbairro" id="BAIRRO_FILIAL" type="text">                              
                            </div>

                            
                            <div class="form-group mt-3  mg-b-0">
                                <label for="deslogin" class="form-label mb-0">Complemento da Filial <span class="tx-danger">(Opcional)</span></label>
                                <input class="form-control Form-Color" placeholder="Informe o complemento" name="descomplemento" id="COMPLEMENTO_FILIAL"  type="text">                              
                            </div>
                            

                        </div>



                        <div class="col-lg-12">
                        

                       
                            <div class="form-group mt-3  mg-b-0">
                                <label for="deslogin" class="form-label mb-0">CNAE <span class="tx-danger">*</span></label>
                                <input class="form-control Form-Color" placeholder="Informe o CNAE da filial" name="descnae" id="CNAE_DA_FILIAL"  type="text">                              
                            </div>

                            
                        </div>

                        <input type="hidden" id="ID_FILIAL" name="UserID" >

                    </div>
                        
            </div>
                    <div class="modal-footer" style="background-color: rgb(247, 247, 247) !important;">
                        <button class="btn ripple btn-success ml-auto font-weight-bold" id="connect-text"  >Atualizar Informações </button>                             
                        <button class="btn ripple btn-danger mr-auto font-weight-bold" data-dismiss="modal" type="button">Fechar Janela</button>
                    </div>
              </form>
        </div>
    </div>
</div>
<!-- End Modal Filial-->

















     
     <!-- Modal Funcionários -->



















        <!-- Modal Clientes -->
        <div class="modal fade" id="Clientes_Info">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content modal-content-demo rounded">
                    <div class="modal-header" style="background-color: rgb(247, 247, 247) !important;">
                        <h6 class="modal-title">Modal - Atualizar Cliente</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">

                        <form id="form-de-atualizar-clientes" >
                          
                            <div class="row row-sm">

                                <div class="col-lg-12">
                                    <div class="form-group mb-3 mg-b-0">
                                        <label for="despassword" class="form-label mb-0">Tipo de Cliente <span class="tx-danger">*</span></label>                                         
                                        <select class="form-control Form-Color" name="destype" id="OPT_TIPO_CLIENTE">
                                            <option label="Escolha um tipo" selected  value="">
                                            </option>
                                            <option value="Cliente">
                                            Cliente - Normal
                                            </option>
                                            <option value="Fornecedor">
                                            Cliente - Fornecedor
                                            </option>
                                            <option value="Parceiro">
                                            Cliente - Parceiro
                                            </option>                                     
                                        </select>      
                                    </div>
                                </div>

                                <div class="col-lg-6">
                              
                                    <div class="form-group mb-3 mg-b-0">
                                        <label for="despassword" class="form-label mb-0">Indicador da IE <span class="tx-danger">*</span></label>                                        
                                        <select class="form-control Form-Color" name="IE_INDICATOR" id="OPT_IE_INDICATOR">
                                            <option label="Escolha um Indicador" selected  value="">
                                            </option>
                                            <option value="OPÇÃO 1">
                                                CONTRIBUINTE
                                            </option>
                                            <option value="OPÇÃO 2">
                                                NÃO CONTRIBUINTE
                                            </option>
                                            <option value="OPÇÃO 3">
                                                CONTRIBUINTE ISENTO
                                            </option>                                     
                                        </select>    
                                    </div>
                               
                                    <div class="form-group mt-3  mg-b-0">
                                        <label for="deslogin" class="form-label mb-0">Inscrição Estadual <span class="tx-danger">*</span></label>
                                        <input class="form-control Form-Color" placeholder="Informe a Inscrição Estadual (IE)" id="INSCRICAO_ESTADUAL" name="IEINSCRIP"  type="text">                              
                                    </div>
                                  
                                    <div class="form-group mt-3 mg-b-0">
                                        <label for="desname" class="form-label mb-0">Nome do Cliente <span class="tx-danger">*</span></label>
                                        <input class="form-control Form-Color" placeholder="Informe o nome do cliente " name="desname" id="NOME_CLIENTE"  type="text">                              
                                    </div>

                                    <div class="form-group mt-3 mb-3 mg-b-0">            
                                        <label for="despassword" class="form-label mb-0">Pessoa Física / Júridica<span class="tx-danger">*</span></label>                                   
                                        <select class="form-control Form-Color" name="desclienttype" id="OPT_FIS_JURIDICO">
                                            <option label="Escolha uma opção" selected  value="" >
                                            </option>
                                            <option value="PESSOA FÍSICA">
                                            PESSOA FÍSICA
                                            </option>
                                            <option value="PESSOA JURÍDICA">
                                            PESSOA JURÍDICA
                                            </option>
                                                                         
                                        </select>
                                    </div>

                                    <div class="form-group  mt-3 mg-b-0">
                                        <label for="deslogin" class="form-label mb-0">CPF/CNPJ do Cliente <span class="tx-danger">*</span></label>
                                        <input class="form-control Form-Color" placeholder="Informe o documento" id="CPF_CNPJ" name="desdocument"  type="text">                              
                                    </div>


                                    <div class="form-group  mt-3 mg-b-0">
                                        <label for="deslogin" class="form-label mb-0">Telefone do Cliente <span class="tx-danger">*</span></label>
                                        <input class="form-control Form-Color" placeholder="Informe o telefone " id="TELEFONE_CLIENTE" name="desnumber"  type="text">                              
                                    </div>
                                                        
                                </div>
                              
                              
                                <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                    <div class="form-group   mg-b-0">
                                        <label for="deslogin" class="form-label mb-0">CEP  <span class="tx-danger">*</span></label>
                                        <input class="form-control Form-Color" placeholder="Informe o cep" id="CEP_CLIENTE" name="descep"  type="text">                              
                                    </div>


                                    <div class="form-group  mt-3 mg-b-0">
                                        <label for="deslogin" class="form-label mb-0">Endereço  <span class="tx-danger">*</span></label>
                                        <input class="form-control Form-Color" placeholder="Informe o endereço" id="ENDERECO" name="desaddress"  type="text">                              
                                    </div>
    

                                    <div class="form-group  mt-3 mg-b-0">
                                        <label for="deslogin" class="form-label mb-0">Complemento  <span class="tx-danger">*</span></label>
                                        <input class="form-control Form-Color" placeholder="Informe o complemento" id="COMPLEMENTO" name="descomp"  type="text">                              
                                    </div>


                                    <div class="form-group  mt-3 mg-b-0">
                                        <label for="deslogin" class="form-label mb-0">Bairro  <span class="tx-danger">*</span></label>
                                        <input class="form-control Form-Color" placeholder="Informe o bairro" id="BAIRRO" name="desbairro"  type="text">                              
                                    </div>

                                    <div class="form-group  mt-3 mg-b-0">
                                        <label for="deslogin" class="form-label mb-0">Estado  <span class="tx-danger">*</span></label>
                                        <input class="form-control Form-Color" placeholder="Informe o estado" id="ESTADO" name="desstate"  type="text">                              
                                    </div>

                                    <div class="form-group  mt-3 mg-b-0">
                                        <label for="deslogin" class="form-label mb-0">Cidade  <span class="tx-danger">*</span></label>
                                        <input class="form-control Form-Color" placeholder="Informe a cidade" id="CIDADE" name="descity"  type="text">                              
                                    </div>

                                    <input type="hidden" id="ID_CLIENTE" name="UserID"> 

                                </div>


                                <div class="col-lg-12 mg-t-20 mg-lg-t-0">
                                    <div class="form-group  mt-3 mg-b-0">
                                        <label for="desemail" class="form-label mb-0">E-mail (Vai ser utilizado para enviar os contratos/boletos)  <span class="tx-danger">*</span></label>
                                        <input class="form-control Form-Color" placeholder="Informe a cidade" id="desemail__" name="desemail__"  type="email">                              
                                     </div>
                                </div>
                            
                                <div class="col-lg-12 mg-t-20 mg-lg-t-0">
                                    <div class="form-group  mt-3 mg-b-0">
                                        <label for="desemailsec__" class="form-label mb-0">E-mail Secundário (Opcional)  <span class="tx-danger">*</span></label>
                                        <input class="form-control Form-Color" placeholder="Informe o e-mail" id="desemailsec__" name="desemailsec__"  type="email">                              
                                     </div>
                                </div>
                            </div>
                            
                    </div>
                            <div class="modal-footer" style="background-color: rgb(247, 247, 247) !important;">
                                <button class="btn ripple btn-success ml-auto font-weight-bold" id="connect-text"  >Atualizar Informações </button>                             
                                <button class="btn ripple btn-danger mr-auto font-weight-bold" data-dismiss="modal" type="button">Fechar Janela</button>
                            </div>
                      </form>
                </div>
            </div>
        </div>



     <!-- ======================== -->   
     <!-- ======================== -->
     <!-- INFORMAÇÕES DOS CLIENTES -->
     <!-- ======================== -->
     <!-- ======================== -->  






















































     
     <!-- Modal Funcionários -->

         <div class="modal" id="modaldemo8">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo rounded">
                    <div class="modal-header" style="background-color: rgb(247, 247, 247) !important;">
                        <h6 class="modal-title">Modal - Cadastrar Funcionário</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">

                        <form id="form-de-funcionarios" >

                                <div class="form-group  mg-b-0">
                                    <label for="desname" class="form-label mb-0">Nome do Funcionário <span class="tx-danger">*</span></label>
                                    <input class="form-control Form-Color" placeholder="Informe o nome " name="desname"  type="text">                              
                                </div>
                                <div class="form-group  mt-3 mg-b-0">
                                    <label for="deslogin" class="form-label mb-0">E-mail do Funcionário <span class="tx-danger">*</span></label>
                                    <input class="form-control Form-Color" placeholder="Informe o login (e-mail)" name="deslogin"  type="email">                              
                                </div>
                                <div class="form-group  mt-3 mg-b-0">
                                    <label for="despassword" class="form-label mb-0">Senha do Funcionário <span class="tx-danger">*</span></label>
                                    <input class="form-control Form-Color" placeholder="Informe a senha" name="despassword"  type="password" >                              
                                </div>

                           
                                
                            </div>
                            <div class="modal-footer" style="background-color: rgb(247, 247, 247) !important;">
                                <button class="btn ripple btn-success ml-auto font-weight-bold" id="connect-text" >Cadastrar Funcionário </button>                             
                                <button class="btn ripple btn-danger mr-auto font-weight-bold" data-dismiss="modal" type="button">Fechar Janela</button>
                            </div>
                      </form>
                </div>
            </div>
        </div>
        <!-- End Modal Funcionários-->




        
       

























            <!-- Modal Clientes -->
            <div class="modal" id="modaldemo7">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content modal-content-demo rounded">
                        <div class="modal-header" style="background-color: rgb(247, 247, 247) !important;">
                            <h6 class="modal-title">Modal - Cadastrar Cliente</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
    
                            <form id="form-de-clientes" >
                              
                                <div class="row row-sm">

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3 mg-b-0">
                                            <label for="despassword" class="form-label mb-0">Tipo de Cliente <span class="tx-danger">*</span></label>                                         
                                            <select class="form-control Form-Color" name="destype">
                                                <option label="Escolha um tipo" selected  value="">
                                                </option>
                                                <option value="Cliente">
                                                Cliente - Normal
                                                </option>
                                                <option value="Fornecedor">
                                                Cliente - Fornecedor
                                                </option>
                                                <option value="Parceiro">
                                                Cliente - Parceiro
                                                </option>                                     
                                            </select>      
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                  
                                        <div class="form-group mb-3 mg-b-0">
                                            <label for="despassword" class="form-label mb-0">Indicador da IE <span class="tx-danger">*</span></label>                                        
                                            <select class="form-control Form-Color" name="IE_INDICATOR">
                                                <option label="Escolha um Indicador" selected  value="">
                                                </option>
                                                <option value="OPÇÃO 1">
                                                    CONTRIBUINTE
                                                </option>
                                                <option value="OPÇÃO 2">
                                                    NÃO CONTRIBUINTE
                                                </option>
                                                <option value="OPÇÃO 3">
                                                    CONTRIBUINTE ISENTO
                                                </option>                                      
                                            </select>    
                                        </div>

                                        <div class="form-group mt-3  mg-b-0">
                                            <label for="deslogin" class="form-label mb-0">Inscrição Estadual <span class="tx-danger">*</span></label>
                                            <input class="form-control Form-Color" placeholder="Informe a Inscrição Estadual (IE) " name="IEINSCRIP"  type="text">                              
                                        </div>
                                        
                                        <div class="form-group mt-3 mg-b-0">
                                            <label for="desname" class="form-label mb-0">Nome do Cliente <span class="tx-danger">*</span></label>
                                            <input class="form-control Form-Color" placeholder="Informe o nome do cliente " name="desname"  type="text">                              
                                        </div>

                                        <div class="form-group mt-3 mb-3 mg-b-0">            
                                            <label for="despassword" class="form-label mb-0">Pessoa Física / Júridica<span class="tx-danger">*</span></label>                                   
                                            <select class="form-control Form-Color" name="desclienttype">
                                                <option label="Escolha uma opção" selected  value="">
                                                </option>
                                                <option value="Cliente">
                                                Cliente - CNPJ
                                                </option>
                                                <option value="Fornecedor">
                                                Cliente - CPF
                                                </option>
                                                                             
                                            </select>
                                        </div>

                                        <div class="form-group  mt-3 mg-b-0">
                                            <label for="deslogin" class="form-label mb-0">CPF/CNPJ do Cliente <span class="tx-danger">*</span></label>
                                            <input class="form-control Form-Color" placeholder="Informe o documento " name="desdocument"  type="text">                              
                                        </div>

                                        <div class="form-group  mt-3 mg-b-0">
                                            <label for="deslogin" class="form-label mb-0">Telefone do Cliente <span class="tx-danger">*</span></label>
                                            <input class="form-control Form-Color" placeholder="Informe o telefone " name="desnumber"  type="text">                              
                                        </div>
                                                            
                                    </div>
                                  
                                  
                                    <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                      
                                        <div class="form-group   mg-b-0">
                                            <label for="deslogin" class="form-label mb-0">CEP  <span class="tx-danger">*</span></label>
                                            <input class="form-control Form-Color" placeholder="Informe o cep" name="descep"  type="text">                              
                                        </div>

                                        <div class="form-group  mt-3 mg-b-0">
                                            <label for="deslogin" class="form-label mb-0">Endereço  <span class="tx-danger">*</span></label>
                                            <input class="form-control Form-Color" placeholder="Informe o endereço" name="desaddress"  type="text">                              
                                        </div>

                                        <div class="form-group  mt-3 mg-b-0">
                                            <label for="deslogin" class="form-label mb-0">Complemento  <span class="tx-danger">*</span></label>
                                            <input class="form-control Form-Color" placeholder="Informe o complemento" name="descomp"  type="text">                              
                                        </div>

                                        <div class="form-group  mt-3 mg-b-0">
                                            <label for="deslogin" class="form-label mb-0">Bairro  <span class="tx-danger">*</span></label>
                                            <input class="form-control Form-Color" placeholder="Informe o bairro" name="desbairro"  type="text">                              
                                        </div>

                                        <div class="form-group  mt-3 mg-b-0">
                                            <label for="deslogin" class="form-label mb-0">Estado  <span class="tx-danger">*</span></label>
                                            <input class="form-control Form-Color" placeholder="Informe o estado" name="desstate"  type="text">                              
                                        </div>

                                        <div class="form-group  mt-3 mg-b-0">
                                            <label for="deslogin" class="form-label mb-0">Cidade  <span class="tx-danger">*</span></label>
                                            <input class="form-control Form-Color" placeholder="Informe a cidade" name="descity"  type="text">                              
                                        </div>

                                    </div>

                                    <div class="col-lg-12 mg-t-20 mg-lg-t-0">
                                        <div class="form-group  mt-3 mg-b-0">
                                            <label for="desemail" class="form-label mb-0">E-mail (Vai ser utilizado para enviar os contratos/boletos)  <span class="tx-danger">*</span></label>
                                            <input class="form-control Form-Color" placeholder="Informe o e-mail" id="desemail" name="desemail"  type="email">                              
                                         </div>
                                    </div>

                                    <div class="col-lg-12 mg-t-20 mg-lg-t-0">
                                        <div class="form-group  mt-3 mg-b-0">
                                            <label for="desemailsec" class="form-label mb-0">E-mail Secundário (Opcional)  <span class="tx-danger">*</span></label>
                                            <input class="form-control Form-Color" placeholder="Informe o e-mail" id="desemailsec" name="desemailsec"  type="email">                              
                                         </div>
                                    </div>

                                </div>
                                
                        </div>
                                <div class="modal-footer" style="background-color: rgb(247, 247, 247) !important;">
                                    <button class="btn ripple btn-success ml-auto font-weight-bold" id="connect-text"  >Cadastrar Cliente </button>                             
                                    <button class="btn ripple btn-danger mr-auto font-weight-bold" data-dismiss="modal" type="button">Fechar Janela</button>
                                </div>
                          </form>
                    </div>
                </div>
            </div>
            <!-- End Modal Clientes-->
    
    
            
           
        
        


















  
            <!-- Modal Produto -->
            <div class="modal" id="modaldemo6">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content modal-content-demo rounded">
                        <div class="modal-header" style="background-color: rgb(247, 247, 247) !important;">
                            <h6 class="modal-title">Modal - Cadastrar Produto/Serviço</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
    
                            <form id="form-de-produtos" >
    
                                    <div class="form-group  mg-b-0">
                                        <label for="desname" class="form-label mb-0">Nome do Produto/Serviço <span class="tx-danger">*</span></label>
                                        <input class="form-control Form-Color" placeholder="Informe o nome " name="desname"  type="text">                              
                                    </div>
                                    <div class="form-group  mt-3 mg-b-0">
                                        <label for="deslogin" class="form-label mb-0">Descrição do Produto/Serviço <span class="tx-danger">*</span></label>
                                        <input class="form-control Form-Color" placeholder="Informe o login (e-mail)" name="desproduct"  type="text">                              
                                    </div>

                                    <div class="form-group   mt-3 mg-b-0">
                                        <label for="destype" class="form-label mb-0">Tipo do Produto/Serviço <span class="tx-danger">*</span></label>
                                        <select class="form-control Form-Color"  style="color: #303030;" name="select_produtos" id="select_produtos_tipo" >  
                                            <option value="0">Este é um Produto</option>
                                            <option value="1">Este é um Serviço</option>
                                        </select>
                                    </div>

                                    
                              
                             
                        
                    </div>
                    <div class="modal-footer" style="background-color: rgb(247, 247, 247) !important;">
                        <button class="btn ripple btn-success ml-auto font-weight-bold" id="connect-text"  >Cadastrar Funcionário </button>                             
                        <button class="btn ripple btn-danger mr-auto font-weight-bold" data-dismiss="modal" type="button">Fechar Janela</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
            <!-- End Modal Produto-->
    

    







            















            
            <!-- Modal Filial -->
            <div class="modal" id="modaldemo5">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content modal-content-demo rounded">
                        <div class="modal-header" style="background-color: rgb(247, 247, 247) !important;">
                            <h6 class="modal-title">Modal - Cadastrar Filial</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
    
                            <form id="form-de-filiais" >
    
                                <div class="row row-sm">
                                                 
                                    

                                    <div class="col-lg-12">
                                    

                                        <div class="form-group mt-3  mg-b-0">
                                            <label for="deslogin" class="form-label mb-0">Razão Social <span class="tx-danger">*</span></label>
                                            <input class="form-control Form-Color" placeholder="Informe a razão social" name="desrazaosocial"  type="text">                              
                                        </div>
                                            
                                        
                                    </div>


                                    <div class="col-lg-6">
                                                                                               
                                        <div class="form-group mt-3  mg-b-0">
                                            <label for="deslogin" class="form-label mb-0">Nome da Filial <span class="tx-danger">*</span></label>
                                            <input class="form-control Form-Color" placeholder="Informe o nome da filial" name="desnomefilial"  type="text">                              
                                        </div>

                                        <div class="form-group mt-3  mg-b-0">
                                            <label for="deslogin" class="form-label mb-0">Telefone da Filial <span class="tx-danger">*</span></label>
                                            <input class="form-control Form-Color" placeholder="Informe o telefone da filial" name="destelefonefilial"  type="text">                              
                                        </div>

                                        <div class="form-group mt-3  mg-b-0">
                                            <label for="deslogin" class="form-label mb-0">E-mail da Filial <span class="tx-danger">*</span></label>
                                            <input class="form-control Form-Color" placeholder="Informe o e-mail da filial" name="desemailfilial"  type="text">                              
                                        </div>

                                        <div class="form-group mt-3  mg-b-0">
                                            <label for="deslogin" class="form-label mb-0">CNPJ da Filial <span class="tx-danger">*</span></label>
                                            <input class="form-control Form-Color" placeholder="Informe o cnpj da filial" name="descnpjfilial"  type="text">                              
                                        </div>

                                        <div class="form-group mt-3  mg-b-0">
                                            <label for="deslogin" class="form-label mb-0">Incrição Municipal da Filial <span class="tx-danger">(Opcional)</span></label>
                                            <input class="form-control Form-Color" placeholder="Informe a Inscrição Municipal da filial" name="desincricaomunicipal"  type="text">                              
                                        </div>

                                        <div class="form-group mt-3  mg-b-0">
                                            <label for="deslogin" class="form-label mb-0">Incrição Estadual da Filial <span class="tx-danger">*</span></label>
                                            <input class="form-control Form-Color" placeholder="Informe a Inscrição Estadual da filial" name="desincricaoestadual"  type="text">                              
                                        </div>


                                    </div>

                                    <div class="col-lg-6">
                                                                                               
                                        <div class="form-group mt-3  mg-b-0">
                                            <label for="deslogin" class="form-label mb-0">Endereço da Filial <span class="tx-danger">*</span></label>
                                            <input class="form-control Form-Color" placeholder="Informe o endereço" name="desaddress"  type="text">                              
                                        </div>

                                        <div class="form-group mt-3  mg-b-0">
                                            <label for="deslogin" class="form-label mb-0">CEP da Filial <span class="tx-danger">*</span></label>
                                            <input class="form-control Form-Color" placeholder="Informe o cep" name="descep"  type="text">                              
                                        </div>

                                        <div class="form-group mt-3  mg-b-0">
                                            <label for="deslogin" class="form-label mb-0">Estado da Filial <span class="tx-danger">*</span></label>
                                            <input class="form-control Form-Color" placeholder="Informe o estado" name="desstate"  type="text">                              
                                        </div>

                                        <div class="form-group mt-3  mg-b-0">
                                            <label for="deslogin" class="form-label mb-0">Cidade da Filial <span class="tx-danger">*</span></label>
                                            <input class="form-control Form-Color" placeholder="Informe a cidade" name="descity"  type="text">                              
                                        </div>



                                        <div class="form-group mt-3  mg-b-0">
                                            <label for="deslogin" class="form-label mb-0">Bairro da Filial <span class="tx-danger">*</span></label>
                                            <input class="form-control Form-Color" placeholder="Informe o bairro" name="desbairro"  type="text">                              
                                        </div>

                                        
                                        <div class="form-group mt-3  mg-b-0">
                                            <label for="deslogin" class="form-label mb-0">Complemento da Filial <span class="tx-danger">(Opcional)</span></label>
                                            <input class="form-control Form-Color" placeholder="Informe o complemento" name="descomplemento"  type="text">                              
                                        </div>


                                    </div>

                                    <div class="col-lg-12">
                                    <div class="form-group mt-3  mg-b-0">
                                        <label for="deslogin" class="form-label mb-0">CNAE <span class="tx-danger">*</span></label>
                                        <input class="form-control Form-Color" placeholder="Informe o CNAE da filial" name="descnae"  type="text">                              
                                    </div>
                                </div>

                                </div>
                                    
                        </div>
                                <div class="modal-footer" style="background-color: rgb(247, 247, 247) !important;">
                                    <button class="btn ripple btn-success ml-auto font-weight-bold" id="connect-text"  >Cadastrar Filial </button>                             
                                    <button class="btn ripple btn-danger mr-auto font-weight-bold" data-dismiss="modal" type="button">Fechar Janela</button>
                                </div>
                          </form>
                    </div>
                </div>
            </div>
            <!-- End Modal Filial-->
















































             






























        <!-- Modal Boleto -->
        <div class="modal" id="modaldemo3">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo rounded">
                    <div class="modal-header" style="background-color: rgb(247, 247, 247) !important;">
                        <h6 class="modal-title">Modal - Cadastrar Boleto</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">

                        <form id="form-de-boletos" >

                           
                                <div class="form-group  mt-3 mg-b-0">
                                    <label for="deslogin" class="form-label mb-0">Nome do Boleto <span class="tx-danger">*</span></label>
                                    <input class="form-control Form-Color" placeholder="Informe o Nome do contrato " name="desdocument"  type="text">                              
                                </div>


                                <div class="form-group  mt-3 mg-b-0">  
                                    <select class="form-control Form-Color"  name="destype">
                                        <option label="Escolha um usuário"  selected disabled >
                                        </option>
                                        <option value="Cliente">
                                        Cliente - Normal
                                        </option>
                                        <option value="Fornecedor">
                                        Cliente - Fornecedor
                                        </option>
                                        <option value="Parceiro">
                                        Cliente - Parceiro
                                        </option>                                     
                                    </select>
                                </div>
                                          
                           
                              
                                
                            </div>
                            <div class="modal-footer" style="background-color: rgb(247, 247, 247) !important;">
                                <button class="btn ripple btn-success ml-auto font-weight-bold" id="connect-text"  >Cadastrar Filial </button>                             
                                <button class="btn ripple btn-danger mr-auto font-weight-bold" data-dismiss="modal" type="button">Fechar Janela</button>
                            </div>
                      </form>
                </div>
            </div>
        </div>
        <!-- End Modal Boleto-->

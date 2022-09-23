




 function Indisponivel_Momento()
{
        
    swal(
        {
            title: 'TEMPORARIAMENTE INDISPONÍVEL',
            type: 'error',
            closeOnClickOutside: true,
            allowOutsideClick: true,
            allowEscapeKey: true,
            closeOnEsc: true,
            confirmButtonColor: "#fff",
            text: 'Vou te redirecionar para o site em breve..',
            timer: 2000,
        }
    )
}






 function Table_Show_PDF(ID_RELATORIO)
 {
    //abrir uma nova guia via POST
    var form = document.createElement("form");
    form.target = "_blank";
    form.method = "POST";
    form.action = "/gerar-relatorio";
    form.style.display = "none";
    form.innerHTML = `<input type="hidden" name="ID_RELATORIO" value="${ID_RELATORIO}">`;
    document.body.appendChild(form);
    form.submit();
    // window.open(`/gerar-relatorio?ID_RELATORIO=${ID_RELATORIO}`, '_blank');
    
 }
 



//_______________________ADICIONAR AJAX NOS SELECTS DOS MODAIS________________________//
      



function capture_relatorios_atualizar(desproducts,descliente,desfilial,DataID)
{


   $.ajax({
       url : "/capturar-funcionarios",
       type:'post',
       dataType: 'json',
       success: function(response) {
        
   
           $.each(response,function(key, value)
           {

                var selected_ = "";
                var finalID = `[${value.idcliente}] - ${value.desname}`
                   
                if(descliente == finalID)
                {
                    selected_ = "selected";        
                }                                          
            

               $("#select_clientes_").append(`<option value= "${value.idcliente}" ${selected_}>  ID - [ ${value.idcliente} ] - ${value.desname} </option>`);
          
            
               $("#idclient_").val(value.idcliente);
           });
       }
   });        
     
   $.ajax({
       url : "/capturar-filiais",
       type:'post',
       dataType: 'json',
       success: function(response) {
        
        
        
           $.each(response,function(key, value)
           {    
                   
            var selected__ = "";
            var finalID_ = `[${value.idfilial}] - ${value.desnomefilial}`;
            if(desfilial == finalID_)
            {
                selected__ = "selected";        
            }                                          
    
              
               $("#select_filiais_").append(`<option value= "${value.idfilial}" ${selected__}>  ID - [ ${value.idfilial} ] - ${value.desnomefilial} </option>`);
          
               $("#idfilial_").val(value.idfilial);

           });

                
       }
   });  


   $.ajax({
       url : "/capturar-produtos",
       type:'post',
       dataType: 'json',
       success: function(response) {
               
           
           $.each(response,function(key, value)
           {    
           
       
                var selected = false;
                for(var i = 0; i < desproducts.length; i++)
                {                              
                    if(desproducts[i] == value.idproduto)
                    {
                        selected = true;
                    }                                          
                }     
               var newOption = new Option(value.desname , value.idproduto, selected, selected);       
               $('#select_products_').append(newOption);
           
           });
       }
   });  
   
  
  

    $.ajax({
        url : "/capturar-valores-produtos",
        type:'post',
        data: {idrelatorio :DataID },
     
        success: function(response) {

           var allValues = $.parseJSON(response);


            $.each(allValues,function(key, value)
            {    
                   
                    $("#form-de-atualizar-relatorios").append(`
                     
                    <div class="col-lg-12"> 
                        <div class="product_values row row-sm"  id="key_${value[0]}" style='display:none;'>     
                            <hr>
                            <div class="col-lg-6">
                                <div class="form-group  mt-3 mg-b-0">  
                                    <label for="deslogin" class="form-label mb-0">Quantidade ("${value[0]}") <span class="tx-danger">*</span></label>
                                    <input required class="form-control "style="color: #303030;" placeholder="Informe a quantidade do produto"  name="QUANTIDADE_key_${value[0]}" value="${value[1]}" id="QUANTIDADE_key_${value[0]}" min="1"   type="number">                                                                
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group  mt-3 mg-b-0">  
                                    <label for="deslogin" class="form-label mb-0">Valor Unitário ("${value[0]}")   <span class="tx-danger">*</span></label>
                                    <input required class="form-control "style="color: #303030;" placeholder="Informe o Nome do contrato"  name="VALOR_key_${value[0]}" id="VALOR_key_${value[0]}" value="${value[2]}"  step="any" type="number">                                                                
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
              
                `);
        
                $(`#key_${value[0]}`).show('slow');
                    
               

            
            });
        }
        
    });  





}


//_______________________ADICIONAR AJAX NOS SELECTS DOS MODAIS________________________//


function marcar_como_pago()
{



    var table = $('#table-relatorios-ajax').DataTable();

    var ids = $.map(table.rows('.selected').data(), function (item) {
        return item
    });
    
    var colums = { colunas: ids };
    
    $.ajax()
    {

        swal({
            title: "Você tem certeza?",
            text: "Você não vai poder voltar atrás!",
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Não, cancelar!",
            confirmButtonText: "Sim, confirmar pagamentos!",
            closeOnConfirm: false,
            showLoaderOnConfirm: true
          },

          function(){
  
                  $.ajax({
                      url : '/adiantar-parcelas',
                      type : 'post',
                      data : colums
                    
               })
               .done(function(msg){
              
                setTimeout(function () {
                 
                    swal(
                        {
                            title: 'Parcelas atualizadas com sucesso!',
                            type: 'success',
                            closeOnClickOutside: true,
                            closeOnEsc: true,
                            confirmButtonColor: "#fff",
                            text: 'Vou fechar automaticamente em breve..',
                            timer: 2000,
                        }
                    )

           

                }, 1);
                     
              })
              .fail(function(data){

                swal(
                    {
                        title: data['responseText'],
                        type: 'error',
                        closeOnClickOutside: true,
                        closeOnEsc: true,
                        confirmButtonColor: "#fff",
                        text: 'Vou fechar automaticamente em breve..',
                        timer: 2000,
                    }
                )
              });
  
          });
  
        
    }

}


function gerar_boleto_fatura(coluna,relatorio, parcela) 
{
   parcela = parcela.replace('° Parcela','');
   swal({
      title: "Confirmação de Emissão",
      text: "É necessário fazer esta confirmação para podermos fazer uma solicitação ao banco de dados",
      type: "warning",
      showCancelButton: true,
      cancelButtonText: "Não, fechar!",
      confirmButtonText: "Sim, emitir boleto + fatura!",
      closeOnConfirm: false,
      showLoaderOnConfirm: true
    },
    function(){
                  $.ajax({
                           url : `/pegar-url?coluna=${coluna}&relatorio=${relatorio}`,
                           type : 'get',                              
                   })
                   .done(function(response){
                       window.open (response);
                       swal(
                        {
                            title: 'BOLETO/FATURA JÁ EMITIDOS/ENVIADOS!',
                            type: 'success',
                            closeOnClickOutside: true,
                            closeOnEsc: true,
                            confirmButtonColor: "#fff",
                            text: 'Vou fechar automaticamente em breve..',
                            timer: 2000,
                        }
                    )
                   })           
                   .fail(function(data){
                        swal({
                                title: 'Não encontramos um boleto/fatura salva.',
                                type: 'info',
                                closeOnClickOutside: true,
                                closeOnEsc: true,
                                confirmButtonColor: "#fff",
                                showCancelButton: true,
                                closeOnConfirm: false,
                                showLoaderOnConfirm: true,
                                cancelButtonText: 'Ok, apenas fechar',
                                confirmButtonText: 'Enviar Boleto + Fatura',                            
                                text: 'Tente gerar uma nova parcela e enviar ela por e-mail ou apenas deixe para mais tarde',
                        },
                        function(){
                                            $.ajax({
                                                     url : `/criar-boleto?id=${relatorio}&parcela=${parcela}`,
                                                     type : 'get',                              
                                             })
                                             .done(function(response){
                              
                                                 swal(
                                                     {
                                                         title: 'BOLETOS/FATURAS ENVIADAS - SUCESSO!',
                                                         type: 'success',
                                                         closeOnClickOutside: true,
                                                         closeOnEsc: true,
                                                         confirmButtonColor: "#fff",
                                                         text: 'Vou fechar automaticamente em breve..',
                                                         timer: 2000,
                                                     }
                                                 )
                                             })                
                        });
                 });      
     });

}









function gerar_apenas_boleto(coluna,relatorio, parcela) 
{
    parcela = parcela.replace('° Parcela','');
   swal({
      title: "Confirmação de Emissão",
      text: "É necessário fazer esta confirmação para podermos fazer uma solicitação ao banco de dados",
      type: "warning",
      showCancelButton: true,
      cancelButtonText: "Não, fechar!",
      confirmButtonText: "Sim, emitir APENAS boleto!",
      closeOnConfirm: false,
      showLoaderOnConfirm: true
    },
    function(){
        $.ajax({
                url : `/criar-boleto?id=${relatorio}&boleto=0&parcela=${parcela}`,
                type : 'get',                              
        })
        .done(function(response){
            swal(
                {
                    title: 'BOLETO ENVIADO - SUCESSO!',
                    type: 'success',
                    closeOnClickOutside: true,
                    closeOnEsc: true,
                    confirmButtonColor: "#fff",
                    text: 'Vou fechar automaticamente em breve..',
                    timer: 2000,
                }
            )
        })                
    });   

}


function gerar_apenas_nfse(coluna,relatorio, parcela) 
{       
    parcela = parcela.replace('° Parcela','');
    swal({
        title: "Confirmação de Emissão",
        text: "É necessário fazer esta confirmação para podermos fazer uma solicitação ao banco de dados",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "Não, fechar!",
        confirmButtonText: "Sim, emitir APENAS NFSE!",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
        },
        function(){
            $.ajax({
                    url : `/criar-boleto?id=${relatorio}&nfse=0&parcela=${parcela}`,
                    type : 'get',                              
            })
            .done(function(response){
                swal.close();
            })                
        });   

}


function alterar_situacao(coluna,relatorio,parcela){
    swal({
        title: "Alterar Situação",
        text: "Selecione a nova situação",
        type: "info",
        showCancelButton: true,
        cancelButtonText: "Pago",
        confirmButtonText: "Não Pago",
        closeOnClickOutside: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true
        },
        function(data){
               if(data){
                $.ajax({
                    url : `/alterar-situacao?id=${relatorio}&parcela=${parcela}&sit=0`,
                    type : 'get',
                })
                .done(function(response){
                swal({
                        title: 'Situação Alterada - SUCESSO!',
                        type: 'success',
                        closeOnClickOutside: true,
                        closeOnEsc: true,
                })})
                swal.close();
                //atualiza a pagina
                location.reload();
               }else{
                $.ajax({
                    url : `/alterar-situacao?id=${relatorio}&parcela=${parcela}&sit=1`,
                    type : 'get',
                })
                .done(function(response){
                swal({
                        title: 'Situação Alterada - SUCESSO!',
                        type: 'success',
                        closeOnClickOutside: true,
                        closeOnEsc: true,
                })})
                swal.close();
                //atualiza a pagina
                location.reload();
               }
        });   
}

function gerar_apenas_fatura(coluna,relatorio, parcela) 
{       
    parcela = parcela.replace('° Parcela','');
    swal({
        title: "Confirmação de Emissão",
        text: "É necessário fazer esta confirmação para podermos fazer uma solicitação ao banco de dados",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "Não, fechar!",
        confirmButtonText: "Sim, emitir APENAS fatura!",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
        },
        function(){
            $.ajax({
                    url : `/criar-boleto?id=${relatorio}&fatura=0&parcela=${parcela}`,
                    type : 'get',                              
            })
            .done(function(response){
                console.log(response)
             
                swal.close();
                //swal(                  
                    // {
                    //     title: 'FATURA ENVIADA - SUCESSO!',
                    //     type: 'success',
                    //     closeOnClickOutside: true,
                    //     closeOnEsc: true,
                    //     confirmButtonColor: "#fff",
                    //     text: 'Vou fechar automaticamente em breve..',
                    //     timer: 2000,
                    // }
               // )
            })                
        });   

}
























































function gerar_boleto_($id__)
{


   swal({
      title: "VOCÊ TEM CERTEZA?",
      text: "É necessário fazer esta confirmação para não gerar um contrato sem querer.",
      type: "warning",
      showCancelButton: true,
      cancelButtonText: "Não, cancelar!",
      confirmButtonText: "Sim, enviar contratos!",
      closeOnConfirm: false,
      showLoaderOnConfirm: true
    },

    function(){
                  $.ajax({
                           url : `/criar-boleto?id=${id__}`,
                           type : 'get',                              
                   })
                   .done(function(response){
    
                 
                       swal(
                           {
                               title: 'FATURAS ENVIADAS - SUCESSO!',
                               type: 'success',
                               closeOnClickOutside: true,
                               closeOnEsc: true,
                               confirmButtonColor: "#fff",
                               text: 'Vou fechar automaticamente em breve..',
                               timer: 2000,
                           }
                       )
                   
                       
                   })                
    });



  }






function gerar_boletos()
{
    
    var table = $('#table-relatorios-ajax').DataTable();

    var ids = $.map(table.rows('.selected').data(), function (item) {
        return item['idrelatorio']
    });

 
    var colums = { colunas: ids };
    
    swal({
        title: "Você tem certeza?",
        text: "É necessário fazer esta confirmação para não gerar um contrato sem querer.",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "Não, cancelar!",
        confirmButtonText: "Sim, enviar contratos!",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
      },
      function(){
            if(colums['colunas'].length == 0)
            {
                swal(
                    {
                        title: 'Por favor, selecione algum contrato',
                        type: 'error',
                        closeOnClickOutside: true,
                        closeOnEsc: true,
                        confirmButtonColor: "#fff",
                        text: 'Vou fechar automaticamente em breve..',
                        timer: 2000,
                    }
                )
            }
            else
            {
                $.each(colums['colunas'], function(index, value) {
                    $.ajax({
                             url : `/criar-boleto?id=${value}&checagem=1&parcela=1`,
                             type : 'get',                              
                     })
                     .fail(function(data){
                             swal(
                                 {
                                     title: 'Por favor, selecione algum contrato',
                                     type: 'error',
                                     closeOnClickOutside: true,
                                     closeOnEsc: true,
                                     confirmButtonColor: "#fff",
                                     text: 'Vou fechar automaticamente em breve..',
                                     timer: 2000,
                                 }
                             )
                     });   
                 });
                 swal(
                    {
                        title: 'Os E-mails estão sendo enviados!',
                        type: 'success',
                        closeOnClickOutside: true,
                        closeOnEsc: true,
                        confirmButtonColor: "#fff",
                        text: 'Vou fechar automaticamente em breve..',
                        timer: 2000,
                    }
                )
            };
      });
}


//_______________________ADICIONAR AJAX NOS SELECTS DOS MODAIS________________________//
      



 function capture_relatorios()
 {


    $.ajax({
        url : "/capturar-funcionarios",
        type:'post',
        dataType: 'json',
        success: function(response) {
         

           $("#select_clientes").append(`<option label='Selecione um cliente' selected disabled value=''>  </option>`);
       
       
            $.each(response,function(key, value)
            {
                $("#select_clientes").append(`<option value= "${value.idcliente}" >  ID - [ ${value.idcliente} ] - ${value.desname} </option>`);
            
                $("#idclient").val(value.idcliente);
            });
        }
    });       
    
    

      
    $.ajax({
        url : "/capturar-filiais",
        type:'post',
        dataType: 'json',
        success: function(response) {
         
            $("#select_filiais").append(`<option label='Selecione uma filial' selected disabled value=''>  </option>`);
         
            $.each(response,function(key, value)
            {    
                $("#select_filiais").append(`<option value= "${value.idfilial}">  ID - [ ${value.idfilial} ] - ${value.desnomefilial} </option>`);
                // $("#select_filiais").append(`<option value= "[${value.idfilial}] - ${value.desnomefilial}">  ID - [ ${value.idfilial} ] - ${value.desnomefilial} </option>`);
                $("#idfilial").val(value.idfilial);
            });
        }
    });  


    $.ajax({
        url : "/capturar-produtos",
        type:'post',
        dataType: 'json',
        success: function(response) {
         
             
            $.each(response,function(key, value)
            {    
                var newOption = new Option(value.desname , value.idproduto, false, false);
                $('#select_products').append(newOption).trigger('change');
            });
        }
    });  
    
   
 
}


 //_______________________ADICIONAR AJAX NOS SELECTS DOS MODAIS________________________//
 




 function Table_Show_Relatorios(DataID,AJAXURL,ATRIBUTE_NAME)
 {
   
     var AbsoluteID = { [ATRIBUTE_NAME]: DataID};



     $.ajax({
         url : AJAXURL,
         type : 'post',
         data : AbsoluteID
         // beforeSend : function(){
         //    $("#change-text-['+Login+']").text("Carregando...");
         // }
    })
    .done(function(msg){
   
           
    
             $('#ATUALIZAR_RELATORIO').modal('show'); 
             var result = JSON.parse(msg)[0];
           
             $('#tabela-parcelas').attr("href", `/tabela-parcelas?id=${result['idrelatorio']}`);

             $('#NOME_RELATORIO').val(result['desrelatorio']);
             $('#TOTAL_PARCELAS').val(result['desnumero_parcela']);
              
            desproducts = result['desprodutcts_array'].split(',');
            desclientes = result['descliente_nome'];
            desfilial = result['desfilial_nome'];


             //ATUALIZA 'select_products'
             capture_relatorios_atualizar(desproducts,desclientes,desfilial,DataID);
         






             function addDays(date, days) {
                var result = new Date(date);
                result.setDate( (result.getDate() + days) + 1 );
                return result;
              }

            function formatDate(date) {
                return date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
            }
   

            for(var i = 1; i <= result['quantidade_parcelas']; i++) 
            {
               
                    $proximaParcela = addDays(result['dt_vencimento'], ( i *  result['periodo_vencimento'] ) );
           
                    $('#select_parcelas_').append(new Option(`${i} Parcela ${(formatDate($proximaParcela))}`,i) ); 
                

            }

            var  parcelas_pagas = result['parcelas_pagas'];

            if(parcelas_pagas != null)
            {     
              
                $("#select_parcelas_").val((  parcelas_pagas.split(",") ));
            }
       
           
         






              
             $('#idclient_').val(result['idcliente']);
             $('#idfilial_').val(result['idfilial']);
             $('#desdescription_').val(result['desdescription']);

            //  $('#periodo_vencimento_').val(result['periodo_vencimento']);
            //  $('#QUANTIDADE_PARCELAS_').val(result['quantidade_parcelas']);

             $('#DATA_INICIAL_').val(result['dt_vencimento']);
             $('#DATA_FINAL_').val(result['dt_final']);
  
             $('#idrelatorio').val(result['idrelatorio']);
          
            
            
             
   })

 
 
 
 }
 










function Table_Show_Servico(DataID,AJAXURL,ATRIBUTE_NAME)
{
  
    var AbsoluteID = { [ATRIBUTE_NAME]: DataID};
    console.log(AbsoluteID);


    $.ajax({
        url : AJAXURL,
        type : 'post',
        data : AbsoluteID
        // beforeSend : function(){
        //    $("#change-text-['+Login+']").text("Carregando...");
        // }
   })
   .done(function(msg){
  
          
   
            $('#ATUALIZAR_SERVICO').modal('show'); 
            var result = JSON.parse(msg)[0];
          
      



      
            $('#NOME_PRODUTO').val(result['desname']);
            $('#DESCRICAO_PRODUTO').val(result['desdescription']);
            $('#SELECT_PRODUTOS_').val(result['destype']);
            $('#ID_PRODUTO').val(result['idproduto']);
            
            
         
           

            $('#ID_USER').val(result['idperson']);
  })




}




function Table_Show_Funcionarios(DataID,AJAXURL,ATRIBUTE_NAME)
{
  
    var AbsoluteID = { [ATRIBUTE_NAME]: DataID};
    console.log(AbsoluteID);


    $.ajax({
        url : AJAXURL,
        type : 'post',
        data : AbsoluteID
        // beforeSend : function(){
        //    $("#change-text-['+Login+']").text("Carregando...");
        // }
   })
   .done(function(msg){
  
          
   
            $('#Funcionario_Atualizar').modal('show'); 
            var result = JSON.parse(msg)[0];
          
      
      
            $('#NOME_FUNCIONARIO').val(result['desperson']);
            $('#EMAIL_FUNCIONARIO').val(result['deslogin']);
            $('#OLD_HASH').val(result['despassword']);
            
         
           

            $('#ID_USER').val(result['idperson']);
  })




}


















function Table_Show_Filiais(DataID,AJAXURL,ATRIBUTE_NAME)
{
  
    var AbsoluteID = { [ATRIBUTE_NAME]: DataID};
    

  

    $.ajax({
        url : AJAXURL,
        type : 'post',
        data : AbsoluteID
        // beforeSend : function(){
        //    $("#change-text-['+Login+']").text("Carregando...");
        // }
   })
   .done(function(msg){
  
         
            $('#Filial_Atualizar').modal('show'); 
            var result = JSON.parse(msg)[0];
       
       
          
   

            $('#RAZAO_SOCIAL').val(result['desrazaosocial']);
            $('#NOME_FILIAL').val(result['desnomefilial']);
            $('#TELEFONE_FILIAL').val(result['destelefonefilial']);
         
            

            $('#EMAIL_FILIAL').val(result['desemailfilial']);
            $('#CNPJ_FILIAL').val(result['descnpjfilial']);
            $('#IM_DA_FILIAL').val(result['desincricaomunicipal']);
            $('#IE_DA_FILIAL').val(result['desinscricaoestadual']);
            $('#CNAE_DA_FILIAL').val(result['descnae']);
      
            $('#ENDERECO_FILIAL').val(result['desendereco']);
            $('#CEP_FILIAL').val(result['descep']);
            $('#ESTADO_FILIAL').val(result['desestado']);
            $('#CIDADE_FILIAL').val(result['descidade']);
            $('#BAIRRO_FILIAL').val(result['desbairro']);
            $('#COMPLEMENTO_FILIAL').val(result['descomplemento']);
       

            $('#ID_FILIAL').val(result['idfilial']);
  })




}













function Table_Show_Clientes(DataID,AJAXURL,ATRIBUTE_NAME)
{
  
    var AbsoluteID = { [ATRIBUTE_NAME]: DataID};



    $.ajax({
        url : AJAXURL,
        type : 'post',
        data : AbsoluteID
        // beforeSend : function(){
        //    $("#change-text-['+Login+']").text("Carregando...");
        // }
   })
   .done(function(msg){
  
 
        var result = JSON.parse(msg)[0];

            $('#Clientes_Info').modal('show'); 
          

            $('#OPT_TIPO_CLIENTE').val(result['desclient_type']);
            $('#OPT_IE_INDICATOR').val(result['IE_Indicator']);

            $('#OPT_FIS_JURIDICO').val(result['desdocument_type']);
         

        
            $('#CPF_CNPJ').val(result['desdocument']);
            $('#INSCRICAO_ESTADUAL').val(result['IE_cod']);
            $('#NOME_CLIENTE').val(result['desname']);
            $('#TELEFONE_CLIENTE').val(result['desnumber']);
            $('#desemail__').val(result['desemail']);
            $('#desemailsec__').val(result['desemailsec']);
      
            

            $('#CEP_CLIENTE').val(result['descep']);
            $('#ENDERECO').val(result['desendereco']);
            $('#COMPLEMENTO').val(result['descomplemento']);
            $('#BAIRRO').val(result['desbairro']);
            $('#ESTADO').val(result['desestado']);
            $('#CIDADE').val(result['descidade']);
            
            $('#ID_CLIENTE').val(result['idcliente']);
  })




}
































































function Deletar_Registro_Boleto(DataID,AJAXURL,ATRIBUTE_NAME)
{
  
    var AbsoluteID = { [ATRIBUTE_NAME]: DataID};

    $.ajax({
        url : AJAXURL,
        type : 'post',
        data : AbsoluteID
        // beforeSend : function(){
        //    $("#change-text-['+Login+']").text("Carregando...");
        // }
   })
   .done(function(msg){
  

    swal(
        {
            title: msg['wellcomeMSG'],
            type: 'success',
            closeOnClickOutside: true,
            closeOnEsc: true,
            confirmButtonColor: "#fff",
            text: 'Vou te redirecionar para o site em breve..',
            timer: 2000,
        }
    )
    var counter = 0;
    setInterval(function () {
        window.location = msg['WEBSITEURL'];
        ++counter;
      }, 1000);


 
  })




}

function Deletar_Registro_Relatorio(DataID,AJAXURL,ATRIBUTE_NAME)
{
    var AbsoluteID = { [ATRIBUTE_NAME]: DataID};
    	//Warning Message
		swal({
		  title: "Você tem certeza?",
		  text: "Ao cancelar um contrato todas as parcelas pendentes serão removidas!",
		  type: "warning",
		  showCancelButton: true,
          cancelButtonText: "Não, cancelar!",
		  confirmButtonText: "Sim, Cancelar Contrato!",
		  closeOnConfirm: false
		},
		function(){
            $.ajax({
                    url : AJAXURL,
                    type : 'post',
                    data : AbsoluteID
                    // beforeSend : function(){
                    //    $("#change-text-['+Login+']").text("Carregando...");
                    // }
            })
            .done(function(msg){
                swal(
                    {
                        title: msg['wellcomeMSG'],
                        type: 'success',
                        closeOnClickOutside: true,
                        closeOnEsc: true,
                        confirmButtonColor: "#fff",
                        text: 'Vou te redirecionar para o site em breve..',
                        timer: 2000,
                    }
                )
            })
		});
}




function Deletar_Registro(DataID,AJAXURL,ATRIBUTE_NAME)
{
  
    var AbsoluteID = { [ATRIBUTE_NAME]: DataID};


    	//Warning Message

		swal({
		  title: "Você tem certeza?",
		  text: "Você não vai poder recuperar esses dados!",
		  type: "warning",
		  showCancelButton: true,
          cancelButtonText: "Não, cancelar!",
		  confirmButtonText: "Sim, Deletar!",
		  closeOnConfirm: false
		},
		function(){

                $.ajax({
                    url : AJAXURL,
                    type : 'post',
                    data : AbsoluteID
                    // beforeSend : function(){
                    //    $("#change-text-['+Login+']").text("Carregando...");
                    // }
            })
            .done(function(msg){
            
            
                swal(
                    {
                        title: msg['wellcomeMSG'],
                        type: 'success',
                        closeOnClickOutside: true,
                        closeOnEsc: true,
                        confirmButtonColor: "#fff",
                        text: 'Vou te redirecionar para o site em breve..',
                        timer: 2000,
                    }
                )
            
            
            })

		});
}

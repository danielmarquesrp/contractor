







$('#modaldemo8').on('hidden.bs.modal', function(e) {
    $(this).find('#form-de-funcionarios')[0].reset();
  });

$('#modaldemo7').on('hidden.bs.modal', function(e) {
    $(this).find('#form-de-clientes')[0].reset();
});

$('#modaldemo6').on('hidden.bs.modal', function(e) {
    $(this).find('#form-de-produtos')[0].reset();
});

$('#modaldemo5').on('hidden.bs.modal', function(e) {
    $(this).find('#form-de-filiais')[0].reset();
});


$('#modaldemo4').on('hidden.bs.modal', function(e) {
   

    $('#select_filiais').empty(); 
    $('#select_clientes').empty(); 
    $('#select_products').empty(); 

    
    
    $('#desdescription').val('');
 
    $('#numero_referencia_').val('00');
    $('#VALOR_DESPESAS').val('00.00');
    $('#VALOR_DESCONTO').val('00.00');

    
    $.each( $('.product_values'),function(key, value)
    {    
   
      $(`#${ $(this).attr('id') }`).remove()
       
    });     

});


$('#ATUALIZAR_RELATORIO').on('hidden.bs.modal', function(e) {
   

    $('#select_filiais_').empty(); 

    $('#select_clientes_').empty(); 

    $('#select_products_').empty(); 

    $('#select_parcelas_').empty(); 

    $('#desdescription_').val('');

    $.each( $('.product_values'),function(key, value)
    {    
   
      $(`#${ $(this).attr('id') }`).remove()
       
    });     




});

// $('#ATUALIZAR_RELATORIO').on('shown.bs.modal', function (e) {
   
   
//     // do something...


// })


$('#modaldemo3').on('hidden.bs.modal', function(e) {
    $(this).find('#form-de-boletos')[0].reset();
});













$('#form-de-atualizar-produtos').on('submit', function(e) {

    e.preventDefault();
    var formValues = $(this).serializeArray();

    var desname = formValues[0]['value'];
    var desproduct = formValues[1]['value'];
    var destype = formValues[2]['value'];
    var idproduto = formValues[3]['value'];
   

 

        $.ajax({
            url : "/atualizar-servico",
            type : 'post',
            data : {
                desname : desname,
                desdescription : desproduct,
                destype : destype,
                idproduto : idproduto
            },     
            beforeSend : function(){
               $('#conect-text').text("Carregando...");
            }
       })
       .done(function(msg){
        
        $('#ATUALIZAR_SERVICO').modal('hide');

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
  
        $('#conect-text').text("Cadastrar Produto"); 
      })
       .fail(function(msg){
            
            swal(
                {
                    title: 'Epa! Ocorreu um erro..',
                    type: 'error',
                    closeOnClickOutside: true,
                    closeOnEsc: true,
                    confirmButtonColor: "#fff",
                    text: msg['responseJSON']['errorMSG'],
                }
            )

            $('#conect-text').text("Cadastrar Produto");
       });

      

    
});
























$('#form-de-atualizar-funcionarios').on('submit', function(e) {

    e.preventDefault();


    var formValues = $(this).serializeArray();
    var nome = formValues[0]['value'];
    var email = formValues[1]['value'];
    var senha = formValues[2]['value'];
    var oldHash =formValues[3]['value'];
    var iduser =formValues[4]['value'];

        $.ajax({
            url : "/atualizar-funcionario",
            type : 'post',
            data : {
                deslogin : email,
                despassword : senha,
                desname : nome,
                iduser : iduser,
                oldHash : oldHash
            },     
            beforeSend : function(){
               $('#conect-text').text("Carregando...");
            }
       })
       .done(function(msg){
        
        $('#Funcionario_Atualizar').modal('hide');

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
  
        $('#conect-text').text("Cadastrar Funcionário"); 
      })
       .fail(function(msg){
            
            swal(
                {
                    title: 'Epa! Ocorreu um erro..',
                    type: 'error',
                    closeOnClickOutside: true,
                    closeOnEsc: true,
                    confirmButtonColor: "#fff",
                    text: msg['responseJSON']['errorMSG'],
                }
            )

            $('#conect-text').text("Cadastrar Funcionário");
       });

      

    
});

















$('#form-de-atualizar-filiais').on('submit', function(e) {

    e.preventDefault();
    var formValues = $(this).serializeArray();
    

    var desrazaosocial = formValues[0]['value'];
    var desnomefilial = formValues[1]['value'];
    var destelefonefilial = formValues[2]['value'];
    var desemailfilial = formValues[3]['value'];
    var descnpjfilial = formValues[4]['value'];
    var desincricaomunicipal = formValues[5]['value'];
    var desincricaoestadual = formValues[6]['value'];
 
    var desaddress = formValues[7]['value'];
    var descep = formValues[8]['value'];
    var desstate = formValues[9]['value'];
    var descity = formValues[10]['value'];
    var desbairro = formValues[11]['value'];
    var descomplemento = formValues[12]['value'];

    var descnae = formValues[13]['value'];

    console.log(formValues[14]['value']);
    var pidfilial = formValues[14]['value'];
1

        $.ajax({
            url : "/atualizar-filial",
            type : 'post',
            data : {


                desrazaosocial : desrazaosocial,       
                desnomefilial : desnomefilial, 
                destelefonefilial : destelefonefilial, 
                desemailfilial : desemailfilial, 
                descnpjfilial : descnpjfilial, 
                desincricaomunicipal: desincricaomunicipal, 
                desinscricaoestadual : desincricaoestadual,
                descnae : descnae,
                


                desendereco : desaddress, 
                descep : descep, 
                desestado : desstate, 
                descidade : descity, 
                desbairro : desbairro, 
          
                descomplemento : descomplemento,
                idfilial : pidfilial       
            },     
            beforeSend : function(){
               $('#conect-text').text("Carregando...");
            }
       })
       .done(function(msg){
        
        $('#Filial_Atualizar').modal('hide');

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
  

        $('#conect-text').text("Cadastrar Filial"); 
      })
       .fail(function(msg){
            
            swal(
                {
                    title: 'Epa! Ocorreu um erro..',
                    type: 'error',
                    closeOnClickOutside: true,
                    closeOnEsc: true,
                    confirmButtonColor: "#fff",
                    text: msg['responseJSON']['errorMSG'],
                }
            )

            $('#conect-text').text("Cadastrar Filial");
       });

      

    
});








$('#form-de-atualizar-clientes').on('submit', function(e) {

    e.preventDefault();
    var formValues = $(this).serializeArray();

 
    var pIE_Indicator ;
    var pdesclient_type ;
    var pIE_cod = $('#INSCRICAO_ESTADUAL').val();
    var pdesname = $('#NOME_CLIENTE').val();
    var pdesdocument_type;
    var pdesdocument = $('#CPF_CNPJ').val();
    var pdesnumber = $('#TELEFONE_CLIENTE').val();
    var pdescep = $('#CEP_CLIENTE').val();
    var pdesaddress = $('#ENDERECO').val();
    var pdescomplemento =  $('#COMPLEMENTO').val();


    var pbairro = $('#BAIRRO').val();
    var pdesstate = $('#ESTADO').val();
    var pdescity = $('#CIDADE').val();
    var pidcliente = $('#ID_CLIENTE').val();


    if( $('#OPT_TIPO_CLIENTE').val() != null)
    {
        pdesclient_type = $('#OPT_TIPO_CLIENTE').val();
    }else{  pdesclient_type = ""; }


    if($('#OPT_IE_INDICATOR').val() != null)
    {
        pIE_Indicator = $('#OPT_IE_INDICATOR').val();
    }else{  pIE_Indicator = ""; }



    if( $('#OPT_FIS_JURIDICO').val() != null)
    {
        pdesdocument_type = $('#OPT_FIS_JURIDICO').val();
    }else{  pdesdocument_type = ""; }
   

    if( $("#desemail__").val() != null)
    {
        pdesemail = $("#desemail__").val();    
    }
    else
    {  pdesemail = ""; }
 
    if( $("#desemailsec__").val() != null)
    {
        pdesemailsec = $("#desemailsec__").val();    
    }
    else
    {  pdesemailsec = ""; }
    

    $.ajax({
            url : "/atualizar-cliente",
            type : 'post',
            data : {
                pidcliente : $("#ID_CLIENTE").val(),
                pdesclient_type : pdesclient_type,
                pIE_Indicator : pIE_Indicator,
                pIE_cod : pIE_cod,
                pdesname :  pdesname,
                pdesdocument_type : pdesdocument_type,
                pdesdocument : pdesdocument,
                pdesnumber : pdesnumber,

                pdescep : pdescep,
                pdesaddress : pdesaddress,
                pdescomplemento : pdescomplemento,
                pbairro : pbairro,
                pdesstate: pdesstate,
                pdescity : pdescity,
                pdesemail : pdesemail,
                pdesemailsec : pdesemailsec
            },     
            beforeSend : function(){
               $('#conect-text').text("Carregando...");
            }
       })
       .done(function(msg){
        
        $('#Clientes_Info').modal('hide');

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
  

   
        $('#conect-text').text("Cadastrar Cliente"); 
      })
       .fail(function(msg){
            
            swal(
                {
                    title: 'Epa! Ocorreu um erro..',
                    type: 'error',
                    closeOnClickOutside: true,
                    closeOnEsc: true,
                    confirmButtonColor: "#fff",
                    text: msg['responseJSON']['errorMSG'],
                }
            )

            $('#conect-text').text("Cadastrar Cliente");
       });

      

    
});


// ===================
// FORMS DE ATUALIZAÇÃO
// ===================

// ==================
// FORM DE ATUALIZACAO
// ===================

















$('#form-de-boletos').on('submit', function(e) {

    e.preventDefault();
    var formValues = $(this).serializeArray();

    var desfilial = formValues[0]['value'];


    var desdestinatario ;
    if( formValues[1] != null)
    {
        desdestinatario = formValues[1]['value'];
    }else{  desdestinatario = ""; }
   

        $.ajax({
            url : "/cadastrar-boleto",
            type : 'post',
            data : {
                desfilial : desfilial,
                desdestinatario : desdestinatario              
            },     
            beforeSend : function(){
               $('#conect-text').text("Carregando...");
            }
       })
       .done(function(msg){
        
        $('#modaldemo3').modal('hide');

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
        // var counter = 0;
        // setInterval(function () {
        //     window.location = msg['WEBSITEURL'];
        //     ++counter;
        //   }, 1000);


        $('#conect-text').text("Cadastrar Filial"); 
      })
       .fail(function(msg){
            
            swal(
                {
                    title: 'Epa! Ocorreu um erro..',
                    type: 'error',
                    closeOnClickOutside: true,
                    closeOnEsc: true,
                    confirmButtonColor: "#fff",
                    text: msg['responseJSON']['errorMSG'],
                }
            )

            $('#conect-text').text("Cadastrar Filial");
       });

      

    
});









$('#form-de-atualizar-relatorios').on('submit', function(e) {

    e.preventDefault();
    var formValues = $(this).serializeArray();

    var desrelatorio = formValues[0]['value'];
  
  
  
    

    if( $("#select_filiais_").val().toString() != null)
    {
        desfilial_nome = $("#select_filiais_").val().toString();    
    }
    else
    {  desfilial_nome = ""; }
   
    

    
    if( $("#select_clientes_").val().toString() != null)
    {
        descliente_nome = $("#select_clientes_").val().toString();
        
    }
    else
    {  descliente_nome = ""; }




  
    if( $("#select_products_").val().toString() != null )
    {
        desproducts = $("#select_products_").val().toString();    
    }
    else
    {  desproducts = ""; }
   

   






    if( $("#idrelatorio").val() != null )
    {
        idrelatorio = $("#idrelatorio").val();
    }
    else
    {  idrelatorio = ""; }
  


    if( $("#select_parcelas_").val().toString() != null )
    {
        select_parcelas_ = $("#select_parcelas_").val().toString();    
    }
    else
    {  select_parcelas_ = ""; }



 


    var desproducts_values_ = [];

    $.each( $('.product_values'),function()
    {    
            var ID_ =   $(this).attr('id') ;
            var quantidade_ = $(`#QUANTIDADE_${ $(this).attr('id') }`).val();
            var valor_ = $(`#VALOR_${ $(this).attr('id') }`).val() ;

            desproducts_values_.push([ID_, quantidade_, valor_]);
     });     


 
    if( $("#desdescription_").val() != null )
     {
         desdescription_ = $("#desdescription_").val();
     }
     else
     {  desdescription_ = ""; }



 



 
   
        $.ajax({
            url : "/atualizar-relatorio",
            type : 'post',
            data : 
            {
                desrelatorio : desrelatorio,
                desfilial_id : desfilial_nome,
                descliente_id : descliente_nome,
                desdescription : desdescription_,
                desprodutcts_array: desproducts,
                desproducts_values : desproducts_values_,
                select_parcelas: select_parcelas_,        
                idrelatorio : idrelatorio
            },     
            beforeSend : function(){
               $('#conect-text').text("Carregando...");
            }
       })
       .done(function(msg){
        
        $('#ATUALIZAR_RELATORIO').modal('hide');
            
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

        $('#conect-text').text("Cadastrar Filial"); 
      })
   
         .fail(function(msg){
            
            swal(
                {
                    title: 'Epa! Ocorreu um erro..',
                    type: 'error',
                    closeOnClickOutside: true,
                    closeOnEsc: true,
                    confirmButtonColor: "#fff",
                    text: msg['responseJSON']['errorMSG'],
                }
            )

            $('#conect-text').text("Cadastrar Filial");
       });

    
});















$('#select_products_').on("select2:unselect", function (e) 
{
    var data = e.params.data;
  
       
        $(`#key_${data['id']}`).remove();
        
     
});





$('#select_products_').on("select2:select", function (e) 
{
    var data = e.params.data;
 
    var allValues =  $('#select_products_').select2().val();


    $.each(allValues,function(key, value)
    {    
       
        if( $.inArray(value, allValues) == 0 )
        {
        
            $("#form-de-atualizar-relatorios").append(`
             
             <div class="col-lg-12">
                <div class="product_values row row-sm" id="key_${data['id']}" style='display:none;'>     
                    <hr>

                    <div class="col-lg-6">
                        <div class="form-group  mt-3 mg-b-0">  
                            <label for="deslogin" class="form-label mb-0">Quantidade ("${data['text']}") <span class="tx-danger">*</span></label>
                            <input required class="form-control "style="color: #303030;" placeholder="Informe a quantidade do produto"  name="QUANTIDADE_key_${data['id']}" id="QUANTIDADE_key_${data['id']}" min="1"   type="text">                                                                
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group  mt-3 mg-b-0">  
                            <label for="deslogin" class="form-label mb-0">Valor Unitário ("${data['text']}")   <span class="tx-danger">*</span></label>
                            <input required class="form-control "style="color: #303030;" placeholder="Informe o Nome do contrato"  name="VALOR_key_${data['id']}" id="VALOR_key_${data['id']}"  step="any" type="number" >                                                                
                        </div>
                    </div

                    <hr>
                </div>
                </div>
           
        `);

        $(`#key_${data['id']}`).show('slow');
            
        }
   

       
    });


});


























$('#select_products').on("select2:unselect", function (e) 
{
    var data = e.params.data;
  
    
    
        $(`#key_${data['id']}`).remove();
        
     
  

});





$('#select_products').on("select2:select", function (e) 
{
    var data = e.params.data;
 
    var allValues =  $('#select_products').select2().val();


    $.each(allValues,function(key, value)
    {    
       
        if( $.inArray(value, allValues) == 0 )
        {
        
            $("#form-de-relatorios").append(`
            <div class="product_values row row-sm " id="key_${data['id']}" style='display:none;'>     
                <hr>
                <div class="col-lg-6">
                    <div class="form-group  mt-3 mg-b-0">  
                        <label for="deslogin" class="form-label mb-0">Quantidade ("${data['text']}") <span class="tx-danger">*</span></label>
                        <input required class="form-control "style="color: #303030;" placeholder="Informe a quantidade do produto"  name="QUANTIDADE_key_${data['id']}" id="QUANTIDADE_key_${data['id']}" min="1"   type="number">                                                                
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group  mt-3 mg-b-0">  
                        <label for="deslogin" class="form-label mb-0">Valor Unitário ("${data['text']}")   <span class="tx-danger">*</span></label>
                        <input required class="form-control "style="color: #303030;" placeholder="Informe o Nome do contrato"  name="VALOR_key_${data['id']}" id="VALOR_key_${data['id']}"  step="any" type="number">                                                                
                    </div>
                </div>

                <hr>
            </div>
            </div>`);

        $(`#key_${data['id']}`).show('slow');
            
        }
   

       
    });


});



























$('#form-de-relatorios').on('submit', function(e) {

    e.preventDefault();
    var formValues = $(this).serializeArray();


    
    var desrelatorio = formValues[0]['value'];
  
 
    


    if( $("#select_filiais").val() != null)
    {
        desfilial_nome = $("#select_filiais").val().toString();    
    }
    else
    {  desfilial_nome = ""; }
   
    

    
    if( $("#select_clientes").val() != null)
    {
        descliente_nome = $("#select_clientes").val().toString();
        
    }
    else
    {  descliente_nome = ""; }




  
    if( $("#select_products").val() != null )
    {
        desproducts = $("#select_products").val().toString();    
    }
    else
    {  desproducts = ""; }
   

   






    if( $("#DATA_INICIAL").val() != null )
    {
        data_inicial = $("#DATA_INICIAL").val();
    }
    else
    {  data_inicial = ""; }

    if( $("#DATA_VENCIMENTO").val() != null )
    {
        data_vencimento = $("#DATA_VENCIMENTO").val();
    }
    else
    {  data_vencimento = ""; }

    


    if( $("#QUANTIDADE_PARCELAS").val() != null )
    {
        QUANTIDADE_PARCELAS = $("#QUANTIDADE_PARCELAS").val();
    }
    else
    {  QUANTIDADE_PARCELAS = ""; }


   

    if( $("#TOTAL_PARCELAS").val() != null )
    {
        totalparcelas = 1;
    }
    else
    {  totalparcelas = "1"; }

  
  
  
  
  
  
    if( $("#desdescription").val() != null )
    {
        desdescription = $("#desdescription").val();
    }
    else
    {  desdescription = ""; }

    

    var desproducts_values = [];

    $.each( $('.product_values'),function()
    {    
            var ID =   $(this).attr('id') ;
            var quantidade = $(`#QUANTIDADE_${ $(this).attr('id') }`).val();
            var valor = $(`#VALOR_${ $(this).attr('id') }`).val() ;

            desproducts_values.push([ID, quantidade, valor]);
     });     

     
   
     

          
     if( $("#has_to_pay_today").val() != null )
     {
         has_to_pay_today = $("#has_to_pay_today").val();
     }
     else
     {  has_to_pay_today = ""; }


     if( $("#periodo_vencimento").val() != null )
     {
         periodo_vencimento = $("#periodo_vencimento").val();
     }
     else
     {  periodo_vencimento = ""; }

 



     if( $("#anexar_contrato_").val() != null )
     {
        anexar_contrato_ = $("#anexar_contrato_").val();
     }
     else
     {  anexar_contrato_ = ""; }



     if( $("#numero_referencia_").val() != null )
     {
        numero_referencia_ = $("#numero_referencia_").val();
     }
     else
     {  numero_referencia_ = ""; }





     if( $("#VALOR_DESCONTO").val() != null )
     {
        VALOR_DESCONTO_ = $("#VALOR_DESCONTO").val();
     }
     else
     {  VALOR_DESCONTO_ = ""; }



     if( $("#VALOR_DESPESAS").val() != null )
     {
        VALOR_DESPESAS_ = $("#VALOR_DESPESAS").val();
     }
     else
     {  VALOR_DESPESAS_ = ""; }
   

        $.ajax({
            url : "/cadastrar-relatorio",
            type : 'post',
            data : {
                desrelatorio : desrelatorio,
                desfilial_id : desfilial_nome,
                descliente_id : descliente_nome,
                desdescription : desdescription,
                desprodutcts_array: desproducts,
                periodo_vencimento : periodo_vencimento,
                has_to_pay_today : has_to_pay_today,
                dt_inicial:  data_inicial,
                dt_vencimento: data_vencimento,

                quantidade_parcelas: (QUANTIDADE_PARCELAS - 1),
                dt_final: QUANTIDADE_PARCELAS,

                totalparcelas : totalparcelas,
                desproducts_values : desproducts_values,
             
                
                ANEXAR_CONTRATO : anexar_contrato_,
                NUMERO_REF : numero_referencia_,
                VALOR_DESCONTO : VALOR_DESCONTO_,
                VALOR_DESPESAS : VALOR_DESPESAS_
                  
            },     
            beforeSend : function(){
               $('#conect-text').text("Carregando...");
            }
       })
       .done(function(msg){
        
        $('#modaldemo4').modal('hide');

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

        $('#conect-text').text("Cadastrar Filial"); 
      })
       .fail(function(msg){
            
            swal(
                {
                    title: 'Epa! Ocorreu um erro..',
                    type: 'error',
                    closeOnClickOutside: true,
                    closeOnEsc: true,
                    confirmButtonColor: "#fff",
                    text: msg['responseJSON']['errorMSG'],
                }
            )

            $('#conect-text').text("Cadastrar Filial");
       });

      

    
});










$('#form-de-filiais').on('submit', function(e) {

    e.preventDefault();
    var formValues = $(this).serializeArray();


    var desrazaosocial = formValues[0]['value'];
    var desnomefilial = formValues[1]['value'];
    var destelefonefilial = formValues[2]['value'];
    var desemailfilial = formValues[3]['value'];
    var descnpjfilial = formValues[4]['value'];
    var desincricaomunicipal = formValues[5]['value'];
    var desincricaoestadual = formValues[6]['value'];
 
    var desaddress = formValues[7]['value'];
    var descep = formValues[8]['value'];
    var desstate = formValues[9]['value'];
    var descity = formValues[10]['value'];
    var desbairro = formValues[11]['value'];
    var descomplemento = formValues[12]['value'];

    var descnae = formValues[13]['value'];


 

        $.ajax({
            url : "/cadastrar-filial",
            type : 'post',
            data : {



                desrazaosocial : desrazaosocial,       
                desnomefilial : desnomefilial, 
                destelefonefilial : destelefonefilial, 
                desemailfilial : desemailfilial, 
                descnpjfilial : descnpjfilial, 
                desincricaomunicipal: desincricaomunicipal, 
                desinscricaoestadual : desincricaoestadual,
                descnae : descnae,
                


                desendereco : desaddress, 
                descep : descep, 
                desestado : desstate, 
                descidade : descity, 
                desbairro : desbairro, 
        
                descomplemento : descomplemento                      
            },     
            beforeSend : function(){
               $('#conect-text').text("Carregando...");
            }
       })
       .done(function(msg){
        
        $('#modaldemo5').modal('hide');

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
  

        $('#conect-text').text("Cadastrar Filial"); 
      })
       .fail(function(msg){
            
            swal(
                {
                    title: 'Epa! Ocorreu um erro..',
                    type: 'error',
                    closeOnClickOutside: true,
                    closeOnEsc: true,
                    confirmButtonColor: "#fff",
                    text: msg['responseJSON']['errorMSG'],
                }
            )

            $('#conect-text').text("Cadastrar Filial");
       });

      

    
});




















$('#form-de-produtos').on('submit', function(e) {

    e.preventDefault();
    var formValues = $(this).serializeArray();

    var desname = formValues[0]['value'];
    var desproduct = formValues[1]['value'];

    if( $("#select_produtos_tipo").val() != null )
    {
        destype = $("#select_produtos_tipo").val();
    }
    else
    {  destype = ""; }
  



 

        $.ajax({
            url : "/cadastrar-servico",
            type : 'post',
            data : {
                desname : desname,
                desdescription : desproduct,
                destype : destype
            },     
            beforeSend : function(){
               $('#conect-text').text("Carregando...");
            }
       })
       .done(function(msg){
        
        $('#modaldemo6').modal('hide');

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
  
        $('#conect-text').text("Cadastrar Produto"); 
      })
       .fail(function(msg){
            
            swal(
                {
                    title: 'Epa! Ocorreu um erro..',
                    type: 'error',
                    closeOnClickOutside: true,
                    closeOnEsc: true,
                    confirmButtonColor: "#fff",
                    text: msg['responseJSON']['errorMSG'],
                }
            )

            $('#conect-text').text("Cadastrar Produto");
       });

      

    
});













$('#form-de-clientes').on('submit', function(e) {

    e.preventDefault();
    var formValues = $(this).serializeArray();

 
    var pIE_Indicator ;
    var pdesclient_type ;
    var pIE_cod = formValues[2]['value'];
    var pdesname = formValues[3]['value'];
    var pdesdocument_type;
    var pdesdocument = formValues[5]['value'];;
    var pdesnumber = formValues[6]['value'];
    var pdescep = formValues[7]['value'];
    var pdesaddress = formValues[8]['value'];
    var pdescomplemento = formValues[9]['value'];


    var pbairro = formValues[10]['value'];
    var pdesstate = formValues[11]['value'];
    var pdescity = formValues[12]['value'];

  
  
    if( $("#desemail").val() != null )
    {
        pdesemail = $("#desemail").val();
    }
    else
    {  pdesemail = ""; }

    if( $("#desemailsec").val() != null )
    {
        pdesemailsec = $("#desemailsec").val();
    }
    else
    {  pdesemailsec = ""; }
    

    if( formValues[0] != null)
    {
        pdesclient_type = formValues[0]['value'];
    }else{  pdesclient_type = ""; }

    if( formValues[1] != null)
    {
        pIE_Indicator = formValues[1]['value'];
    }else{  pIE_Indicator = ""; }

    if( formValues[4] != null)
    {
        pdesdocument_type = formValues[4]['value']
    }else{  pdesdocument_type = ""; }

        $.ajax({
            url : "/cadastrar-cliente",
            type : 'post',
            data : {

                pdesclient_type : pdesclient_type,
                pIE_Indicator : pIE_Indicator,
                pIE_cod : pIE_cod,
                pdesname :  pdesname,
                pdesdocument_type : pdesdocument_type,
                pdesdocument : pdesdocument,
                pdesnumber : pdesnumber,

                pdescep : pdescep,
                pdesaddress : pdesaddress,
                pdescomplemento : pdescomplemento,
                pbairro : pbairro,
                pdesstate: pdesstate,
                pdescity : pdescity,
                pdesemail: pdesemail,
                pdesemailsec: pdesemailsec
           
            },     
            beforeSend : function(){
               $('#conect-text').text("Carregando...");
            }
       })
       .done(function(msg){
        

        console.log(msg)
        $('#modaldemo7').modal('hide');

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
  

    
        $('#conect-text').text("Cadastrar Cliente"); 
      })
       .fail(function(msg){
        console.log(msg)
            swal(
                {
                    title: 'Epa! Ocorreu um erro..',
                    type: 'error',
                    closeOnClickOutside: true,
                    closeOnEsc: true,
                    confirmButtonColor: "#fff",
                    text: msg['responseJSON']['errorMSG'],
                }
            )

            $('#conect-text').text("Cadastrar Cliente");
       });

      

    
});






$('#form-de-funcionarios').on('submit', function(e) {

    e.preventDefault();
    var formValues = $(this).serializeArray();

    var nome = formValues[0]['value'];
    var email = formValues[1]['value'];
    var senha = formValues[2]['value'];

        $.ajax({
            url : "/cadastar-funcionario",
            type : 'post',
            data : {
                deslogin : email,
                despassword : senha,
                desname : nome
            },     
            beforeSend : function(){
               $('#conect-text').text("Carregando...");
            }
       })
       .done(function(msg){
        
        $('#modaldemo8').modal('hide');

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
  
        $('#conect-text').text("Cadastrar Funcionário"); 
      })
       .fail(function(msg){
            
            swal(
                {
                    title: 'Epa! Ocorreu um erro..',
                    type: 'error',
                    closeOnClickOutside: true,
                    closeOnEsc: true,
                    confirmButtonColor: "#fff",
                    text: msg['responseJSON']['errorMSG'],
                }
            )

            $('#conect-text').text("Cadastrar Funcionário");
       });

      

    
});

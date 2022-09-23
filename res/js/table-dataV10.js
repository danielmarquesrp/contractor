$(function() {
	'use strict'
	




	var tableBoletos = $('#table-boletos-ajax').DataTable({
		responsive: true,
      order: [[ 1, 'desc' ]],
      ajax:{
         url: "/boletos-ajax-data",
         method: 'post',
         dataSrc: 'data',
         contentType: "application/json"  
     },
     deferRender: true,
      columns: [
         { data: 'idboleto' },
         { data: 'idboleto' },
         { data: 'desfilial' },
         { data: 'desdestinatario' }
      
     ],  
     rowId: 'idboleto',
      columnDefs : [
  
         { targets : [4],
            render : function(data, type, row) {
               return '<a href="/deletar-funcionario" class="btn ripple btn-success w-100 font-weight-bold ">EDITAR ITEM</a> '
              }, 
         },
         { targets : [5],
            render : function(data, type, row) {
               return '<a type="button" o`<a type="button" href="/criar-boleto?id=${rpw}" class="btn ripple btn-danger w-100 font-weight-bold text-white" id="change-text-['+row['idrelatorio']+']">DELETAR ITEM</a> ` class="btn ripple btn-danger w-100 font-weight-bold text-white" id="change-text-['+row['idcliente']+']">DELETAR ITEM</a> '
              },   
         },
         { targets : [0],
            'checkboxes': {
               'selectRow': true
            } 
         },   
       
      ],
      select: true,
      select: { 
       style: 'multi'
      },
		language: {
			searchPlaceholder: 'Procurar...',
			sSearch: '',
			lengthMenu: '_MENU_ items/page',
		},
      initComplete: function(){
               
         (function worker() {
            var speed = 1000,
            t = setInterval(reloadData,speed);
            function reloadData() {
             // console.log("loaded");
             tableBoletos.ajax.reload(null,false);
          
            // tableBoletos.ajax.reload( function ( json ) {
            //    console.log(json);
            //  } );

               speed = 1000;
               clearInterval(t);
               t = setInterval(reloadData, speed);
               
            }

         })();


     }

	});




   $('#frm-boletos').on('submit', function(e){
      var form = this;
     
      e.preventDefault();
     
      var rows_selected = tableBoletos.column(0).checkboxes.selected();

      // Iterate over all selected checkboxes
      if(rows_selected.length == 0)
      {
         alert('Selecione uma opção, nada foi selecionado');
      }


      $.each(rows_selected, function(index, rowId){
       
         // Create a hidden element
   
         alert(rowId);
     
      //    $(form).append(
      //       $('<input>')
      //          .attr('type', 'hidden')
      //          .attr('name', 'id[]')
      //          .val(rowId)
      //   );

      });

     

   });











   
	var tableRelatorios = $('#table-relatorios-ajax').DataTable({
		responsive: true, 
      order: [[ 3, 'ASC' ]],
      ajax:{
         url: "/relatorios-ajax-data",
         dataSrc: 'data',
         contentType: "application/json"  
     },
      columns: [
         { data: 'idrelatorio' },
         { data: 'descliente_nome' },
   
         { data: 'desemail' },
        
         { data: 'days_left' },  
         { data: 'days_total_left' }     
     ], 
     rowId: 'idrelatorio',
     deferRender: true,
      columnDefs : [
 
         { targets : [5],
            render : function(data, type, row) 
              {
               return '<a  type="button" onclick="Table_Show_PDF('+ row['idrelatorio'] + ')" class="btn ripple btn-success w-100 font-weight-bold text-white" id="change-text-['+row['idcliente']+']"><i class="fas fa-file-pdf"></i> PDF</a> '
              },   
         },
         { targets : [6],
            render : function(data, type, row) 
              {
               return `<a  href="/tabela-parcelas?id=${row['idrelatorio']}"  class="btn ripple btn-info w-100 font-weight-bold text-white" ><i class="fas fa-edit"></i> </a> `
              },   
         },
         { targets : [7],
            render : function(data, type, row) 
            {
               return '<button type="button" onclick="Deletar_Registro_Relatorio('+row['idrelatorio']+  "," + "'/deletar-relatorio-ajax'"+ "," + "'idrelatorio'" + ')" class="btn ripple btn-danger w-100 font-weight-bold text-white" id="change-text-['+row['idcliente']+']"><i class="fas fa-trash-alt"></i> </button> '
            },   
         },
         { targets : [0],
            'checkboxes': {
               'selectRow': true
            } 
         },  

                
      ],
      select: true,
      select: { 
       style: 'multi'
      },
		language: {
			searchPlaceholder: 'Procurar...',
			sSearch: '',
			lengthMenu: '_MENU_ items/page',
		},

      initComplete: function(){
               
         (function worker() {
            var speed = 3500,
            t = setInterval(reloadData,speed);
            function reloadData() {
             // console.log("loaded");
             tableRelatorios.ajax.reload(null,false);
               speed = 3500;
               clearInterval(t);
               t = setInterval(reloadData, speed);
            }

         })();

       
         for(var i = 1; i <= 480; i++) 
         {
            if(i == 1)
            {
                  $('#periodo_vencimento').append(new Option(`${i} Dia`,i) );
            }
            else{  $('#periodo_vencimento').append(new Option(`${i} Dias`,i) ); }    
         }
         

         
         
         for(var i = 1; i <= 480; i++) 
         {
            if(i == 1)
            {
                  $('#QUANTIDADE_PARCELAS').append(new Option(`${i} Parcela`,i) );
            }
            else{  $('#QUANTIDADE_PARCELAS').append(new Option(`${i} Parcelas`,i) ); }    
         }



     }

	});





   var tableFiliais = $('#table-filiais-ajax').DataTable({
		responsive: true, 
      order: [[ 0, 'desc' ]],
      ajax:{
         url: "/filiais-ajax-data",
         dataSrc: 'data',
         contentType: "application/json"  
     },
      columns: [
         { data: 'idfilial' },
         { data: 'desnomefilial' },
         { data: 'desincricaomunicipal' },
    
         { data: 'descnpjfilial' },
    
     ], 
      columnDefs : [
         { targets : [5],
         render : function(data, type, row) {
            return '<button type="button" onclick="Deletar_Registro('+row['idfilial']+  "," + "'/deletar-filial-ajax'"+ "," + "'idfilial'" + ')" class="btn ripple btn-danger w-100 font-weight-bold text-white" id="change-text-['+row['idcliente']+']"> <i class="fas fa-trash-alt"></i> </button> '
           },   
         },
         { targets : [4],
            render : function(data, type, row) {
               return '<button type="button" onclick="Table_Show_Filiais('+row['idfilial']+  "," + "'/visualizar-filial'"+ "," + "'idfilial'" + ')" class="btn ripple btn-info w-100 font-weight-bold text-white" id="change-text-['+row['idcliente']+']"><i class="fas fa-edit"></i> </button> '
              },   
            }          
      ],

		language: {
			searchPlaceholder: 'Procurar...',
			sSearch: '',
			lengthMenu: '_MENU_ items/page',
		},

      initComplete: function(){
               
         (function worker() {
            var speed = 1000,
            t = setInterval(reloadData,speed);
            function reloadData() {
             // console.log("loaded");
             tableFiliais.ajax.reload(null,false);
               speed = 1000;
               clearInterval(t);
               t = setInterval(reloadData, speed);
            }

         })();



         





     }

	});





















   


	var tableServicos = $('#table-servicos-ajax').DataTable({
		responsive: true, 
      order: [[ 0, 'desc' ]],
      ajax:{
         url: "/servico-ajax-data",
         dataSrc: 'data',
         contentType: "application/json"  
     },
      columns: [
         { data: 'idproduto' },
         { data: 'desdescription' },
         { data: 'desname' }

     ], 
      columnDefs : [
         { targets : [3],
            render : function(data, type, row) {

               if(row['destype'] == 0)
               {
                  return 'Este é um <b>Produto</b>'
               }
               else
               {
                  return 'Este é um <b>Serviço</b>';
               }
         
              },   
         },
         { targets : [5],
         render : function(data, type, row) {
            return '<button type="button" onclick="Deletar_Registro('+row['idproduto']+  "," + "'/deletar-servico-ajax'"+ "," + "'idproduto'" + ')" class="btn ripple btn-danger w-100 font-weight-bold text-white" id="change-text-['+row['idproduto']+']"><i class="fas fa-trash-alt"></i></button> '
           },   
         },
         { targets : [4],
            render : function(data, type, row) {
               return '<button type="button" onclick="Table_Show_Servico('+row['idproduto']+  "," + "'/visualizar-servico'"+ "," + "'idproduto'" + ')" class="btn ripple btn-info w-100 font-weight-bold text-white" id="change-text-['+row['idproduto']+']"><i class="fas fa-edit"></i></button> '
              },   
            }          
      ],

      

		language: {
			searchPlaceholder: 'Procurar...',
			sSearch: '',
			lengthMenu: '_MENU_ items/page',
		},

      initComplete: function(){
               
         (function worker() {
            var speed = 1000,
            t = setInterval(reloadData,speed);
            function reloadData() {
             // console.log("loaded");
             tableServicos.ajax.reload(null,false);
               speed = 1000;
               clearInterval(t);
               t = setInterval(reloadData, speed);
            }

         })();


     }

	});

















	var tableClientes = $('#table-clientes-ajax').DataTable({
		responsive: true, 
      order: [[ 0, 'desc' ]],
      ajax:{
         url: "/clientes-ajax-data",
         dataSrc: 'data',
         contentType: "application/json"  
     },
      columns: [
         { data: 'idcliente' },
         { data: 'desname' },
         { data: 'desclient_type' },
   
         { data: 'desnumber' },
         { data: 'desdocument' },
     ], 
      columnDefs : [
         { targets : [6],
         render : function(data, type, row) {
            return '<button type="button" onclick="Deletar_Registro('+row['idcliente']+  "," + "'/deletar-cliente-ajax'"+ "," + "'idcliente'" + ')" class="btn ripple btn-danger w-100 font-weight-bold text-white" id="change-text-['+row['idcliente']+']"><i class="fas fa-trash-alt"></i></button> '
           },   
         },
         { targets : [5],
            render : function(data, type, row) {
               return '<button type="button" onclick="Table_Show_Clientes('+row['idcliente']+  "," + "'/visualizar-cliente'"+ "," + "'idcliente'" + ')" class="btn ripple btn-info w-100 font-weight-bold text-white" id="change-text-['+row['idcliente']+']"><i class="fas fa-edit"></i></button> '
              },   
            }          
      ],

		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_ items/page',
		},

  

      initComplete: function(){
        
   
         (function worker() {
            var speed = 1000,
            t = setInterval(reloadData,speed);
            function reloadData() {
             // console.log("loaded");
             tableClientes.ajax.reload(null,false);
               speed = 1000;
               clearInterval(t);
               t = setInterval(reloadData, speed);
            }

         })();


     }

	});




   
















	 var tableFunctionaries = $('#table-funcionarios-ajax').DataTable({
		responsive: true, 
      order: [[ 0, 'desc' ]],
      ajax:{
         url: "/funcionarios-ajax-data",
         dataSrc: 'data',
         contentType: "application/json"  
     },
      columns: [
         { data: 'iduser' },
         { data: 'desperson' },
         { data: 'deslogin' }
     ], 
      columnDefs : [
         { targets : [4],
         render : function(data, type, row) {
            return '<button type="button" onclick="Deletar_Registro('+ row['iduser'] +  "," + "'/deletar-funcionario-ajax'"+ "," + "'iduser'" +  ')" class="btn ripple btn-danger w-100 font-weight-bold text-white" id="change-text-['+row['iduser']+']"><i class="fas fa-trash-alt"></i></button> '
           },   
         },
         { targets : [3],
            render : function(data, type, row) {
               return '<button type="button" onclick="Table_Show_Funcionarios('+row['iduser']+  "," + "'/visualizar-funcionario'"+ "," + "'iduser'" + ')" class="btn ripple btn-info w-100 font-weight-bold text-white" id="change-text-['+row['idcliente']+']"><i class="fas fa-edit"></i></button> '
              },   
            }          
      ],

		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_ items/page',
		},

      initComplete: function(){
               
         (function worker() {
            var speed = 1000,
            t = setInterval(reloadData,speed);
            function reloadData() {
             // console.log("loaded");
               tableFunctionaries.ajax.reload(null,false);
               speed = 1000;
               clearInterval(t);
               t = setInterval(reloadData, speed);
            }

         })();


     }

	});

  


   var tableFunctionaries = $('#table-parcelas-ajax').DataTable({
		responsive: true, 
      order: [[ 3, 'asc' ]],
      ajax:{
         url: `/parcelas-ajax-data?id=${document.querySelector('#tabela_parcelas_').getAttribute('valor')}`,
         dataSrc: 'data',
         contentType: "application/json"  
     },
      columns: [
     
         { data: 'desnumero_parcela' },
         { data: 'situacao' },
         { data: 'dt_final' },
         { data: "cleannumber", visible: false},
     ], 
      columnDefs : [

         { targets : [1],
            render : function(data, type, row) {
               let situation = row['situacao']
               let color = row['situacao'] == "PARCELA PAGA COM SUCESSO" ? "success" : "warning";
               return `<b class="text-${color}"  > ${  situation  }</b>` 
              },   
         },
         
         { targets : [4],
            render : function(data, type, row) {
               return `<button type="button" onclick="alterar_situacao('${row['cleannumber']}' ,'${row['idrelatorio']}', '${row['desnumero_parcela']}' )" class="btn ripple btn-primary w-100 font-weight-bold text-white" >Alterar Situação</button>` 
              },  
         },
         { targets : [5],
            render : function(data, type, row) {
               return `<button type="button" onclick="gerar_apenas_fatura('${row['cleannumber']}' ,'${row['idrelatorio']}', '${row['desnumero_parcela']}' )" class="btn ripple btn-info w-100 font-weight-bold text-white" >ENVIAR FATURA</button>` 
              },  
         },    
         { targets : [6],
            render : function(data, type, row) {
               return `<button type="button" onclick="gerar_apenas_boleto('${row['cleannumber']}' ,'${row['idrelatorio']}', '${row['desnumero_parcela']}')" class="btn ripple btn-warning w-100 font-weight-bold text-white" >ENVIAR BOLETO</button>` 
              },    
         }    ,
         { targets : [7],
            render : function(data, type, row) {
               return `<button type="button" onclick="gerar_boleto_fatura('${row['cleannumber']}' ,'${row['idrelatorio']}', '${row['desnumero_parcela']}')" class="btn ripple btn-success w-100 font-weight-bold text-white" > ENVIAR FATURA/BOLETO</button>` 
              },   
         }    
         
         

      ],

		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_ items/page',
		},

      initComplete: function(){
               
         
         // (function worker() {
         //    var speed = 1000,
         //    t = setInterval(reloadData,speed);
         //    function reloadData() {
         //     // console.log("loaded");
         //       tableFunctionaries.ajax.reload(null,false);
         //       speed = 1000;
         //       clearInterval(t);
         //       t = setInterval(reloadData, speed);
         //    }

         // })();


     }

	});








  
	
});
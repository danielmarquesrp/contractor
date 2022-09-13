<!DOCTYPE html>
<html>
<head>
<title>RELATÓRIO</title>

</head>
<body>

<style>
    tr.noBorder td {
  border: 0;
}
tr.noBorder td:first-child {
  border-right: 1px solid;
}
</style>

    <table width="100%">
      

   <!--====================    
    SEPARAÇÃO DE COLUNAS
    ====================-->
    <tr  class="noBorder">
            <td class="noBorder">
                <img src="https://etarpv2.elisyumcorp.com/res/ETARP-LOGO.jpg" style="width:30%;" alt="">    
            </td>

            <td class="text-left" style="font-weight: bold; font-size: 17px;  " colspan="2">
                <?= $NOME_DA_FILIAL ?>
            <br >
                CNPJ: <?= $ETARP_CNPJ ?>
            <br>
            I.M: <?= $ETARP_INSCRICAO_MUNICIPAL ?> / I.E: <?= $ETARP_INSCRICAO_ESTADUAL ?>
        
            <br>
            <?= $ETARP_ENDERECO ?>
            <br>
            <a>
            www.grupoetarp.com.br
            </a>
            

            </td>



            <td style="font-weight: bold; font-size: 15px;" border="0">
            NOTA DE COBRANÇA DE LOCAÇÃO
            <br>  <br>
            NÚMERO DE CONTROLE:  <?= $ID_RELATORIO ?>
            </td>
    </tr>

    <!--====================    
    SEPARAÇÃO DE COLUNAS
    ====================-->
        <tr>
            <td colspan="4" style="width:70%; font-weight: bold;">
     
         </tr>
  
        <tr>
            <td colspan="2" class="black_blackground text-left" style=" font-weight: bold;"> NATUREZA DA OPERAÇÃO: LOCAÇÃO</td>
             <td colspan="2" class="black_blackground text-left"  style="font-weight: bold;"> DATA E HORA : <?= $DATA_HORA_ATUAL ?> </td>
         </tr>
    <!--====================    
    SEPARAÇÃO DE COLUNAS
    ====================-->

    <tr>
        <td colspan="4" style="width:70%; font-weight: bold;">
       
     </tr>

     <!--====================    
    SEPARAÇÃO DE COLUNAS
    ====================-->

    <tr>
        <th colspan="4" class="black_blackground text-left" style="width:70%;  font-weight: bold; ">
            DESTINATÁRIO</td>
    </tr>

    <!--====================    
    SEPARAÇÃO DE COLUNAS
    ====================-->
    <tr>
        <th class="grey_blackground text-left"  scope="row"  colspan="2"  >NOME/RAZÃO SOCIAL</th>
        <th class="grey_blackground text-left"  scope="row" >CNPJ </th>
        <th class="grey_blackground text-left"  scope="row" >INSCRIÇÃO ESTADUAL</th>    
    </tr>
    <tr >
        <td  colspan="2" class="text-left" ><?= $DESTINATARIO_NOME_COMPLETO ?></td>
        <td class="text-left" ><?= $DESTINATARIO_CPF_CNPJ ?></td>
        <td class="text-left" ><?= $DESTINATARIO_INSCRICAO_ESTADUAL ?></td>
    </tr>



    <!--====================    
    SEPARAÇÃO DE COLUNAS
    ====================-->

    <tr>
        <th class="grey_blackground text-left"  scope="row"  colspan="2"  >ENDEREÇO</th>
        <th class="grey_blackground text-left"  scope="row" >MUNICÍPIO </th>
        <th class="grey_blackground text-left"  scope="row" >ESTADO</th>    
    </tr>
    <tr >
        <td  colspan="2" class="text-left" ><?= $DESTINATARIO_ENDERECO ?></td>
        <td class="text-left" ><?= $DESTINATARIO_MUNICIPIO ?></td>
        <td class="text-left" ><?= $DESTINATARIO_ESTADO ?></td>
    </tr>
    
     <!--====================    
    SEPARAÇÃO DE COLUNAS
    ====================-->

    <tr >
        <th class="grey_blackground text-left"  scope="row"  colspan="2"  >BAIRRO</th>
        <th class="grey_blackground text-left"  scope="row" >CEP</th>
        <th class="grey_blackground text-left"  scope="row" >TELEFONE</th>    
    </tr>
    <tr >
        <td  colspan="2" class="text-left" ><?= $DESTINATARIO_BAIRRO ?></td>
        <td class="text-left" ><?= $DESTINATARIO_CEP ?></td>
        <td class="text-left" ><?= $DESTINATARIO_TELEFONE ?></td>
    </tr>
    

     <!--====================    
    SEPARAÇÃO DE COLUNAS
    ====================-->



    <!--====================    
    SEPARAÇÃO DE COLUNAS
    ====================-->

    <tr>
        <td colspan="3" class="text-left black_blackground" style="width:70%; font-weight: bold; ">
            DESCRIÇÃO</td>
        <td class="text-left black_blackground" style="font-weight: bold; ">
            TOTAL</td>
    </tr>

    <!--====================    
    SEPARAÇÃO DE COLUNAS
    ====================-->

    <!-- ARRAY DOS PRODUTOS -->
    <?= $CONTEUDO_DOS_PRODUTOS ?>
    <!-- ARRAY DOS PRODUTOS -->
 
    <!--====================    
    SEPARAÇÃO DE COLUNAS
    ====================-->

       
    <!--====================    
    SEPARAÇÃO DE COLUNAS
    ====================-->


        <tr>
            <td colspan="3" class="grey_blackground" style="width:70%; text-align: right; font-weight: bold; ">
                DESCONTO</td>
                <td class="text-left grey_blackground" style=" font-weight: bold; ">
                    R$ <?= number_format($DESCONTO_DOS_PRODUTOS, 2); ?></td>
        </tr>


        <!--====================
        SEPARAÇÃO DE COLUNAS
        ====================-->      

        <tr>
            <td colspan="3" class="grey_blackground " style="width:70%; text-align: right; font-weight: bold; ">
                OUTRAS DESPESAS</td>
                <td class="text-left grey_blackground" style="font-weight: bold; ">
                R$ <?= number_format($DESPESAS_DOS_PRODUTOS, 2);  ?></td>
        </tr>


        <!--====================
        SEPARAÇÃO DE COLUNAS
        ====================--> 

        
        <tr>
            <td colspan="3" class="grey_blackground" style="width:70%; text-align: right; font-weight: bold; ">
               VALOR TOTAL:</td>
               <td class="text-left grey_blackground" style="font-weight: bold; ">
                R$ <?= FormatPrice(number_format($VALOR_FINAL_PRODUTOS, 2));  ?></td>
        </tr>

        <!--====================
        SEPARAÇÃO DE COLUNAS
        ====================-->


        <tr>
            <th colspan="4" class="black_blackground" style="width:70%; text-align: left; font-weight: bold; ">
                FATURAMENTO</td>
        </tr>

        <!--====================
        SEPARAÇÃO DE COLUNAS
        ====================-->

            <tr>
            <td colspan="4" style="width:70%; font-weight: bold; text-align: left;">
                Recebimento em Boleto: R$ <?= FormatPrice(number_format($VALOR_FINAL_PRODUTOS, 2));  ?>, vencimento em : <?= FormatDate($DATA_LIMITE_PAGAMENTO_BOLETO);  ?>
                <br>
                <br>
                <br>

                <br>
                <br>  
                <?php for($i = 0; $i < count($ARRAY_DESCRICAO_FATURAMENTO);  $i++ ){ echo $ARRAY_DESCRICAO_FATURAMENTO[$i]; echo "<br>"; }    ?> 
                <br>
                <br>
                <br>
            </td>
           
           </tr>

        <!--====================
        SEPARAÇÃO DE COLUNAS
        ====================-->

        <tr>
            <td colspan="4" class="black_blackground" style="width:70%; text-align: left; font-weight: bold; ">
                INFORMAÇÕES COMPLEMENTARES</td>
        </tr>

        <!--====================
        SEPARAÇÃO DE COLUNAS
        ====================-->

        <tr>
         <td colspan="4" style="width:70%; font-weight: bold;">Não Incidencia de ISS conf. LC 116/0, nao incidencia de ICMS conf. Artigo 7º, inc IX do RICMS/2000, IPI nao incidência conf.Artigo 37, inc II a do
            RIPI/02</td>
        </tr>

        <!--====================
        SEPARAÇÃO DE COLUNAS
        ====================-->

        <tr>
            <td colspan="4" style="width:70%; font-weight: bold;">
         ..........................................................................................................................................................................
         </tr>


        <!--====================
        SEPARAÇÃO DE COLUNAS
        ====================-->

        <tr>
        <td colspan="3" class="black_blackground" style="width:70%; font-weight: bold;">Atestamos que os dados e valores acima, conferem com os bens ou serviços prestados pela empresa.</td>

         <td  class="black_blackground">NOTA DE COBRAÇA DE LOCAÇÃO</td>
        </tr>
       
   
        <!--====================
        SEPARAÇÃO DE COLUNAS
        ====================-->
        <tr>
            <th scope="row">Data de recebimento</th>
            <th scope="row">Documento</th>
            <th scope="row">Nome legível</th>
            <th scope="row">Número de controle</th>
        </tr>
        <tr>
            <td ></td>
            <td ></td>
            <td ></td>
            <td > <?= $ID_RELATORIO ?></td>
        </tr>






       </table>

</body>
</html>
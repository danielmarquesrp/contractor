<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Main Content-->
<div class="main-content side-content pt-0">

    <div class="container-fluid">
        <div class="inner-body">

            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5" id="tabela_parcelas_" valor="<?php echo htmlspecialchars( $idrelatorio, ENT_COMPAT, 'UTF-8', FALSE ); ?>">Tabela de Parcelas </h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Início</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gerenciar-Filial</li>
                    </ol>
                </div>
                <div class="d-flex">
                    <div class="justify-content-center">
                    
                        <a    href="/gerenciar-relatorios"  class="btn  btn-success my-2 btn-icon-text">
                          <texto style="font-weight: bold;" > CLIQUE PARA RETORNAR A TABELA DE CONTRATOS</texto>
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

                    <!-- Row -->
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-body">
                                 
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-nowrap" id="table-parcelas-ajax">
                                       
                                       
                                            <thead>
                                                <tr>
                                                    <th class="wd-20p">Número da Parcela</th>
                                                    <th class="wd-20p">Situação</th>
                                                    <th class="wd-25p">Data da Parcela</th>                                              
                                                    <th ></th>
                                                    <th ></th>
                                                    <th ></th>
                                                    <th ></th>
                                                    <th class="wd-20p" ></th>
                                                </tr>
                                            </thead>
                                      
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->

         </div>
    </div>
</div>



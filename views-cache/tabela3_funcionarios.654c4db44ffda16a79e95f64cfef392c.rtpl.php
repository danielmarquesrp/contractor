<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Main Content-->
<div class="main-content side-content pt-0">

    <div class="container-fluid">
        <div class="inner-body">

            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Tabela de Funcionários</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Início</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gerenciar-Filial</li>
                    </ol>
                </div>
                <div class="d-flex">
                    <div class="justify-content-center">
                    
                        <a  data-effect="effect-super-scaled" data-toggle="modal" href="#modaldemo8" class="btn modal-effect  btn-success my-2 btn-icon-text">
                          <texto style="font-weight: bold;" > CLIQUE PARA CADASTRAR UM NOVO CLIENTE</texto>
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
                                        <table class="table table-bordered text-nowrap" id="table-funcionarios-ajax">
                                       
                                       
                                            <thead>
                                                <tr>
                                                    <th class="wd-10p" >ID</th>
                                                    <th class="wd-10p">Nome</th>
                                                    <th class="wd-10p">E-mail</th>
                                                    <th class="wd-10p"></th>
                                                    <th class="wd-10p" ></th>
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



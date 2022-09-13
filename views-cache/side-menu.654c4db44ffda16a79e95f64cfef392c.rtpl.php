<?php if(!class_exists('Rain\Tpl')){exit;}?>


		<!-- Page -->
		<div class="page">

			<!-- Sidemenu -->
			<div class="main-sidebar main-sidebar-sticky side-menu">
				<div class="sidemenu-logo">
					<a class="main-logo" href="/">
						<img src="res/img/brand/logo-light.png" class="header-brand-img desktop-logo" alt="logo">
						<img src="res/img/brand/icon-light.png" class="header-brand-img icon-logo" alt="logo">
						<img src="res/img/brand/logo.png" class="header-brand-img desktop-logo theme-logo" alt="logo">
						<img src="res/img/brand/icon.png" class="header-brand-img icon-logo theme-logo" alt="logo">
					</a>
				</div>
				<div class="main-sidebar-body">
					<ul class="nav">
					
					
<!-- 					
						<li class="nav-header " ><span class="nav-label">Dashboard</span></li>
				

						<li class='nav-item '>
							<a class="nav-link" href="/dashboard"><span class="shape1"></span><span class="shape2"></span><i class="ti-home sidemenu-icon"></i><span class="sidemenu-label">Dashboard</span></a>
						</li>
						 -->


						<li class="nav-header"><span class="nav-label">Gerenciamento de Contratos</span></li>
				









						
				

							<!-- CRUD DE RELATORIOS -->
							<li class='nav-item '>
								<a class="nav-link" href="/gerenciar-relatorios"><span class="shape1"></span><span class="shape2"></span><i class="fas fa-store sidemenu-icon"></i><span class="sidemenu-label">Cadastro de Contratos		</span></a>

						
							
							
							</li>
							<!-- FIM DO CRUD DE RELATORIOS -->

			




						<li class="nav-header"><span class="nav-label">Gerenciamento De Cadastros</span></li>
				
				


						




						<!-- CRUD DE FILIAIS -->
						<li class='nav-item '>
							<a class="nav-link" href="/gerenciar-filiais"><span class="shape1"></span><span class="shape2"></span><i class="fas fa-store sidemenu-icon"></i><span class="sidemenu-label">Cadastro de Filiais</span></a>
				
						</li>
						<!-- FIM DO CRUD DE FILIAIS -->


			
					

						
						<!-- CRUD DE SERVIÇOS/PRODUTOS -->
						<li class="nav-item">
							<a class="nav-link " href="/gerenciar-servicos"><span class="shape1"></span><span class="shape2"></span><i class="fas fa-store sidemenu-icon"></i><span class="sidemenu-label">Cadastro de Serviços</span></a>
						
						</li>
						<!-- FIM DO CRUD DE SERVIÇOS/PRODUTOS -->
				





				    	<!-- CRUD DE CLIENTES -->
						<li class="nav-item">
							<a class="nav-link " href="/gerenciar-clientes"><span class="shape1"></span><span class="shape2"></span><i class="fas fa-users sidemenu-icon"></i><span class="sidemenu-label">Cadastro de Clientes</span></a>
					
						</li>
						<!-- FIM DO CRUD DE CLIENTES -->
						


						<!-- CRUD DE FUNCIONÁRIOS -->
						<li class="nav-item">
							<a class="nav-link " href="/gerenciar-funcionarios"><span class="shape1"></span><span class="shape2"></span><i class="fas fa-users sidemenu-icon"></i><span class="sidemenu-label">Cadastro de Contas</span></a>
						
						</li>
						<!-- FIM DO CRUD DE CLIENTES -->
			








	



						<li class="nav-header"><span class="nav-label">Gerenciamento de sessão</span></li>
		


						<!-- CRUD DE CLIENTES -->
						<li class="nav-item">
							<a class="nav-link " href="/logout"><span class="shape1"></span><span class="shape2"></span><i class="fas fa-sign-out-alt sidemenu-icon"></i><span class="sidemenu-label">Desconectar do Sistema</span></a>
							
						</li>
						<!-- FIM DO CRUD DE CLIENTES -->
	

			

					</ul>
				</div>
			</div>
			<!-- End Sidemenu -->


            <?php require $this->checkTemplate("main-header");?>


       
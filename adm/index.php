<?php 
  include_once('../config/url.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="<?= BASE_URL?>/adm/assets/css/style.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
	<title>AdminHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	
<section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">AdminHub</span>
    </a>
    <ul class="side-menu top">
        <li class="active">
            <a href="#" data-target="dashboard-content">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="#" data-target="meu-site-content">
                <i class='bx bxs-shopping-bag-alt'></i>
                <span class="text">Meu Site</span>
            </a>
        </li>
        <li>
            <a href="#" data-target="analise-content">
                <i class='bx bxs-doughnut-chart'></i>
                <span class="text">Análise</span>
            </a>
        </li>
        <!-- <li> -->
            <!-- <a href="#" data-target="mensagens-content"> -->
                <!-- <i class='bx bxs-message-dots'></i> -->
                <!-- <span class="text">Mensagens</span> -->
            <!-- </a> -->
        <!-- </li> -->
        <li>
            <a href="#" data-target="equipe-content">
                <i class='bx bxs-group'></i>
                <span class="text">Equipe</span>
            </a>
        </li>
    </ul>

		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Configurações</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Sair</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

<!-- CONTEÚDO PRINCIPAL -->


	<!-- CONTENT -->
	<section id="content">
		
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu'></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Pesquisar...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell'></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="<?= BASE_URL?>/adm/img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->
		

		<!-- MAIN -->
		<main >
			<div id="dashboard-content" class="content-section">
				<div class="head-title">
					<div class="left">
						<h1>Dashboard</h1>
						<ul class="breadcrumb">
							<li>
								<a href="#">Dashboard</a>
							</li>
							<li><i class='bx bx-chevron-right' ></i></li>
							<li>
								<a class="active" href="#">Home</a>
							</li>
						</ul>
					</div>
					<a href="#" class="btn-download">
						<i class='bx bxs-cloud-download' ></i>
						<span class="text">Download PDF</span>
					</a>
				</div>
				<ul class="box-info">
					<li>
						<i class='bx bxs-calendar-check' ></i>
						<span class="text">
							<h3>1020</h3>
							<p>Clientes</p>
						</span>
					</li>
					<li>
						<i class='bx bxs-group' ></i>
						<span class="text">
							<h3>2834</h3>
							<p>Visitantes</p>
						</span>
					</li>
					<li>
						<i class='bx bxs-dollar-circle' ></i>
						<span class="text">
							<h3>$2543</h3>
							<p>Saldo total</p>
						</span>
					</li>
				</ul>
				<div class="table-data">
					<div class="order">
						<div class="head">
							<h3>Clientes Agendados</h3>
							<i class='bx bx-search' id="search-icon"></i>
										<i class='bx bx-filter' id="filter-icon"></i>
						</div>
						<!-- Modal para filtro -->
					  <div id="filter-modal" class="filter-modal">
					 <div class="modal-content">
						<span class="close" id="close-modal">&times;</span>
						<h2>Filtrar Clientes</h2>
						<form id="filter-form">
							<label for="filter-date">Data:</label>
							<input type="date" id="filter-date" name="date">
				
							<label for="filter-service">Serviço:</label>
							<input type="text" id="filter-service" name="service" placeholder="Digite o serviço">
				
							<button type="button" id="apply-filter">Aplicar Filtro</button>
						</form>
					  </div>
					 </div>
						<table id="client-table">
							<thead>
								<tr>
									<th>Cliente</th>
									<th>Data</th>
									<th>Serviço</th>
									<th>Horário</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody id="client-table-body">
								<tr>
									<td>
										<img src="<?= BASE_URL?>/adm/img/people.png" alt="Foto do cliente">
										<p>John Doe</p>
									</td>
									<td>01-10-2024</td>
									<td>Corte de Cabelo</td>
									<td>10:00 AM</td>
									<td><span class="status completed">Completed</span></td>
								</tr>
								<tr>
									<td>
										<img src="<?= BASE_URL?>/adm/img/people.png" alt="Foto do cliente">
										<p>Jane Smith</p>
									</td>
									<td>01-10-2024</td>
									<td>Barba e Cabelo</td>
									<td>11:00 AM</td>
									<td><span class="status pending">Pending</span></td>
								</tr>
								<tr>
									<td>
										<img src="<?= BASE_URL?>/adm/img/people.png" alt="Foto do cliente">
										<p>Robert Brown</p>
									</td>
									<td>02-10-2024</td>
									<td>Sombrancelha</td>
									<td>02:00 PM</td>
									<td><span class="status process">In Process</span></td>
								</tr>
								<tr>
									<td>
										<img src="<?= BASE_URL?>/adm/img/people.png" alt="Foto do cliente">
										<p>Emily Davis</p>
									</td>
									<td>02-10-2024</td>
									<td>Corte de Cabelo</td>
									<td>03:30 PM</td>
									<td><span class="status pending">Pending</span></td>
								</tr>
								<tr>
									<td>
										<img src="<?= BASE_URL?>/adm/img/people.png" alt="Foto do cliente">
										<p>Chris Wilson</p>
									</td>
									<td>03-10-2024</td>
									<td>Tratamento Capilar</td>
									<td>05:00 PM</td>
									<td><span class="status completed">Completed</span></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				
					 </head>
					
						<div class="todo">
				<div class="head">
					<h3>Lista de Tarefas</h3>
					<i class='bx bx-plus' id="add-task" title="Adicionar Tarefa"></i>
				</div>
				<ul class="todo-list" id="todo-list">
					<!-- As tarefas serão inseridas aqui dinamicamente -->
				</ul>
						</div>
			</div>
            
			<!-- Meu site aqui -->
			<div id="meu-site-content" class="content-section" style="display: none;">
				<h1>Meu Site</h1>
				<p class="info">Aqui estão as informações sobre o seu site.</p>
				
                <div class="meios">Meios de contato e endereços:</div>
                <div class="contact-info">
               
                <div>
                    <label>Telefone</label>
                    <input type="text" value="+123-456-7890"/>
                </div>
                <div>
                    <label>E-Mail</label>
                    <input type="text" value="hello@reallygreatsite.com"/>
                </div>
                <div>
                    <label>Website</label>
                    <input type="text" value="www.reallygreatsite.com"/>
                </div>
                <div>
                    <label>Endereço</label>
                    <input type="text" value="123 Anywhere St., Any City"/>
                </div>
            </div>
            <button class="save-button">Salvar</button>

            <div class="services-prices">
                <h2>Serviços & preços:</h2>
                <div class="categories">
            
                    <!-- Categoria: Cortes -->
               <div class="category">
                 <h3>Cortes:</h3>
                 <div class="service">
                     <label for="classic-cut">Serviço:</label>
                     <input type="text" id="classic-cut" value="Corte Clássico" />
                     
                     <label for="classic-price">Preço:</label>
                     <input type="text" id="classic-price" value="R$ 40,00" />
                 </div>
                 <div class="service">
                     <label for="kids-cut">Serviço:</label>
                     <input type="text" id="kids-cut" value="Corte Infantil" />
                     
                     <label for="kids-price">Preço:</label>
                     <input type="text" id="kids-price" value="R$ 40,00" />
                 </div>
                 <div class="service">
                     <label for="fade-cut">Serviço:</label>
                     <input type="text" id="fade-cut" value="Corte Degradê" />
                     
                     <label for="fade-price">Preço:</label>
                     <input type="text" id="fade-price" value="R$ 30,00" />
                 </div>
                 <button class="add-service">+ Adicionar mais serviços</button>
               </div>

                   
            
                    <!-- Categoria: Barba -->
                    <div class="category">
                        <h3>Barba:</h3>
                        <div class="service">
							<label for="fade-cut">Serviço:</label>
                            <input type="text" value="Barba e Bigode" />
							<label for="fade-price">Preço:</label>
                            <input type="text" value="R$ 25,00" />
                        </div>
                        <div class="service">
							<label for="fade-cut">Serviço:</label>
                            <input type="text" value="Barba Completa" />
							<label for="fade-price">Preço:</label>
                            <input type="text" value="R$ 20,00" />
                        </div>
                        <button class="add-service">+ Adicionar mais serviços</button>
                    </div>
            
                    <!-- Categoria: Outros -->
                    <div class="category">
                        <h3>Outros:</h3>
                        <div class="service">
							<label for="fade-cut">Serviço:</label>
                            <input type="text" value="Sobrancelha" />
							<label for="fade-price">Preço:</label>
                            <input type="text" value="R$ 15,00" />
                        </div>
                        <div class="service">
							<label for="fade-cut">Serviço:</label>
                            <input type="text" value="Máquina" />
							<label for="fade-price">Preço:</label>
                            <input type="text" value="R$ 32,00" />
                        </div>
                        <button class="add-service">+ Adicionar mais serviços</button>
                    </div>
            
                </div>
                <button class="save-button-1">Salvar</button>
            </div>
			</div>
	
			<!-- Análise -->
			<div id="analise-content" class="content-section" style="display: none;">
				<h1>Análise</h1>
				<p>Relatórios e gráficos sobre o desempenho do site.</p>
			</div>
	
			<!-- Mensagens -->
			<!-- <div id="mensagens-content" class="content-section" style="display: none;"> -->
				<!-- <h1>Mensagens</h1> -->
				<!-- <p>Caixa de entrada para mensagens e notificações.</p> -->
			<!-- </div> -->
	
			<!-- Equipe -->
			<div id="equipe-content" class="content-section" style="display: none;">
				
				<p>Lista de membros e informações sobre a equipe.</p>

				<div class="barber-section">
					<h2>Adicione as imagens dos barbeiros junto com seus nomes</h2>
					<div class="barber-cards">
			
						<div class="barber-card">
							<img alt="Barber 1" height="150" src="<?= BASE_URL?>/adm/img/Captura de tela 2024-12-15 012952.png" width="150"/>
							<div class="edit-icon">
								<i class="fas fa-edit"></i>
							</div>
							<div class="name">
								Nome: <input type="text" value="BARBEIRO 1" />
							</div>
						</div>
						<div class="barber-card">
							<img alt="Barber 2" height="150" src="<?= BASE_URL?>/adm/img/Captura de tela 2024-12-15 012952.png" width="150"/>
							<div class="edit-icon">
								<i class="fas fa-edit"></i>
							</div>
							<div class="name">
								Nome: <input type="text" value="BARBEIRO 2" />
							</div>
						</div>
						<div class="barber-card">
							<img alt="Barber 3" height="150" src="<?= BASE_URL?>/adm/img/Captura de tela 2024-12-15 012952.png" width="150"/>
							<div class="edit-icon">
								<i class="fas fa-edit"></i>
							</div>
							<div class="name">
								Nome: <input type="text" value="BARBEIRO 3" />
							</div>
						</div>
						<div class="barber-card">
							<img alt="Barber 4" height="150" src="<?= BASE_URL?>/adm/img/Captura de tela 2024-12-15 012952.png" width="150"/>
							<div class="edit-icon">
								<i class="fas fa-edit"></i>
							</div>
							<div class="name">
								Nome: <input type="text" value="BARBEIRO 4" />
							</div>
						</div>
						<div class="barber-card">
							<img alt="Barber 4" height="150" src="<?= BASE_URL?>/adm/img/Captura de tela 2024-12-15 012952.png" width="150"/>
							<div class="edit-icon">
								<i class="fas fa-edit"></i>
							</div>
							<div class="name">
								Nome: <input type="text" value="BARBEIRO 5" />
							</div>
						</div>
						<div class="barber-card">
							<img alt="Barber 4" height="150" src="<?= BASE_URL?>/adm/img/Captura de tela 2024-12-15 012952.png" width="150"/>
							<div class="edit-icon">
								<i class="fas fa-edit"></i>
							</div>
							<div class="name">
								Nome: <input type="text" value="BARBEIRO 6" />
							</div>
						</div>
						
					</div>
	                <button class="button-barber">Salvar</button>
				</div>
			</div>

			</div>
		
			
		
			

	 <script src="<?= BASE_URL?>/adm/assets/script/script.js"></script>
	 <script src="<?= BASE_URL?>/adm/assets/script/menuhub.js"> </script>
	 <script src="<?= BASE_URL?>/adm/assets/script/filtro.js"> </script>

	

		
</main>
</section>
</body>
</html>
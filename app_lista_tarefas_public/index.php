<?php
	$acao = 'pendentes';
	require('tarefa_controller.php');
		
?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	
		<script>
			function editar_remover_marcar(id_tarefa, acao){
				if (acao == 'editar'){
					var nova_tarefa = prompt('Digite o nome da tabela');

					if (nova_tarefa != ''){	
						window.location.href = 'tarefa_controller.php?acao=editar&origem=tarefas_pendentes&id=' + id_tarefa + '&nova_tarefa=' + nova_tarefa;
					}
				}else{
					window.location.href = 'tarefa_controller.php?acao='+ acao +'&origem=tarefas_pendentes&id=' + id_tarefa;
				}
			}
		</script>
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item active"><a href="#">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Tarefas pendentes</h4>
								<hr />
								<? foreach($tarefas_pendentes as $tarefa){?>
									<?  $status = $tarefa['id_status'] == 1 ? 'pendente' : 'realizado'; ?>
									<div class="row mb-3 d-flex align-items-center tarefa">
										<div class="col-sm-9"><?= $tarefa['tarefa']?></div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
											<i class="fas fa-trash-alt fa-lg text-danger" onclick="editar_remover_marcar(<?= $tarefa[0] ?>, 'remover')"></i>
											<i class="fas fa-edit fa-lg text-info" onclick="editar_remover_marcar(<?= $tarefa[0] ?>, 'editar')"></i>
											<i class="fas fa-check-square fa-lg text-success" onclick="editar_remover_marcar(<?= $tarefa[0] ?>, 'concluido')"></i>
										</div>
									</div>
								<? } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
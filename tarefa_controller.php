<?php
    require_once('conexao.php');
    require_once('tarefa_model.php');
    require_once('tarefa_service.php');

    // define a variavel acao
    if (isset($_GET['acao']) && $_GET['acao'] == 'inserir'){
        $acao = 'inserir';
    }
    else if (isset($_GET['acao']) && $_GET['acao'] == 'recuperar'){
        $acao = 'recuperar';
    }
    else if (isset($_GET['acao']) && $_GET['acao'] == 'remover'){
        $acao = 'remover';
    }
    else if (isset($_GET['acao']) && $_GET['acao'] == 'concluido'){
        $acao = 'concluido';
    }
    else if (isset($_GET['acao']) && $_GET['acao'] == 'editar'){
        $acao = 'editar';
    }
    // executa a instrução de acordo com o valor da variavel acao
    if($acao == 'inserir'){
        // cria conexão com o banco de dados
        $conexao = new Conexao();
        $sql = $conexao->conectar();

        //cria uma nova tarefa
        $tarefa = new Tarefa();
        $tarefa->__set('tarefa', $_POST['tarefa']);

        // envia a tarefa para o banco de dados
        $tarefa_service = new TarefaService();
        $adicionada = $tarefa_service->inserir($tarefa, $sql);
    }
    if($acao == 'recuperar'){
        // cria conexão com o banco de dados
        $conexao = new Conexao();
        $sql = $conexao->conectar();

        // recuperar os dados no banco de dados
        $tarefa_service = new TarefaService();
        $tarefas = $tarefa_service->recuperar($sql);
    }
    if($acao == 'remover'){
        // cria conexão com o banco de dados
        $conexao = new Conexao();
        $sql = $conexao->conectar();

        // recebe o id da tarefa e a origem
        $id = $_GET['id'];
        $origem = $_GET['origem'];
        

        // remove os dados do banco de dados
        $tarefa_service = new TarefaService();
        $tarefa_service->remover($sql, $id, $origem);
    }
    if($acao == 'concluido'){
        // cria conexão com o banco de dados
        $conexao = new Conexao();
        $sql = $conexao->conectar();

         // recebe o id da tarefa
        $id = $_GET['id'];
        $origem = $_GET['origem'];

        // marca a tarefa como comcluido
        $tarefa_service = new TarefaService();
        $tarefa_service->concluir($sql, $id, $origem);
    }
    if($acao == 'editar'){
        // cria conexão com o banco de dados
        $conexao = new Conexao();
        $sql = $conexao->conectar();

        // recebe o id  e o nome da nova tarefa
        $id = $_GET['id'];
        $nova_tarefa = $_GET['nova_tarefa'];
        $origem = $_GET['origem'];
        

        // marca a tarefa como comcluido
        $tarefa_service = new TarefaService();
        $tarefa_service->editar($sql, $id, $nova_tarefa, $origem);
    }
    if($acao == 'pendentes'){
        // cria conexão com o banco de dados
        $conexao = new Conexao();
        $sql = $conexao->conectar();

        // marca a tarefa como comcluido
        $tarefa_service = new TarefaService();
        $tarefas_pendentes = $tarefa_service->mostrarPendentes($sql);
    }
?>
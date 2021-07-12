<?php
    class TarefaService{
        public function inserir(Tarefa $tarefa, PDO $sql){
            $query = "insert into tb_tarefas (tarefa) values ('{$tarefa->__get('tarefa')}')"; // PODStatement (query a ser executada)
            $stmt = $sql->query($query); // monta a query
            $stmt->fetch();

            header('location: http://localhost/APP_LISTA_TAREFAS/app_lista_tarefas_public/nova_tarefa.php?tarefa_criada=sim');
        }
        public function recuperar(PDO $sql){
            $query = 'select * from tb_tarefas;';
            $stmt = $sql->query($query);
            return $stmt->fetchAll();
        }
        public function remover(PDO $sql, $id, $origem){
            $query = "DELETE FROM `tb_tarefas` WHERE id = '{$id}';";
            $stmt = $sql->query($query);
            $stmt->fetch();

            if ($origem == 'todas_tarefas'){
                header('location: http://localhost/APP_LISTA_TAREFAS/app_lista_tarefas_public/todas_tarefas.php');
            } else if($origem == 'tarefas_pendentes'){
                header('location: http://localhost/APP_LISTA_TAREFAS/app_lista_tarefas_public/index.php');
            }
        }
        public function concluir(PDO $sql, $id, $origem){ 
            // verifica qual o status da tarefa
            $query = "select * from tb_tarefas where id = {$id}";
            $stmt = $sql->query($query);
            $tarefa = $stmt->fetch();

            // inverte o status da tarefa
            $tarefa['id_status'] = $tarefa['id_status'] == 1 ? 2 : 1; 
          
            // atualiza o status da tarefa
            $query = "update tb_tarefas set id_status = {$tarefa['id_status']} where id = {$id}";
            $stmt = $sql->query($query);
            $stmt->fetch();

            if($origem == 'todas_tarefas'){
                header('location: http://localhost/APP_LISTA_TAREFAS/app_lista_tarefas_public/todas_tarefas.php');
            } else if($origem == 'tarefas_pendentes'){
                header('location: http://localhost/APP_LISTA_TAREFAS/app_lista_tarefas_public/index.php');
            }
        }
        public function editar(PDO $sql, $id, $nova_tarefa, $origem){
            // seleciona a tarefa a ser editada
           // $query = "select * from tb_tarefas where id = {$id}";
           // $stmt = $sql->query($query);
           // $tarefa = $stmt->fetch();

            // atualiza o status da tarefa
            $query = "update tb_tarefas set tarefa = '{$nova_tarefa}' where id = {$id}";
            $stmt = $sql->query($query);
            $stmt->fetch();
            
            if ($origem == 'todas_tarefas'){
                header('location: http://localhost/APP_LISTA_TAREFAS/app_lista_tarefas_public/todas_tarefas.php');
            }else if ($origem == 'tarefas_pendentes'){
                header('location: http://localhost/APP_LISTA_TAREFAS/app_lista_tarefas_public/index.php');
            }
            
        }
        public function mostrarPendentes(PDO $sql){
            $query = 'select * from tb_tarefas where id_status = 1';
            $stmt = $sql->query($query);
            return $stmt->fetchAll();
        }

    }
?>
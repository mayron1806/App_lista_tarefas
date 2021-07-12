<?php
    class Conexao{
        private $host = 'localhost';
        private $dbname = 'app_lista_tarefas';
        private $user = 'root';
        private $pass = '';
        protected $sdb ='mysql:host=localhost;dbname=app_lista_tarefas';

        public function conectar(){
            $sql = new PDO($this->sdb, $this->user, $this->pass);
            return $sql;
        }
    }
?>
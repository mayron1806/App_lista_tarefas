<?php
    class Tarefa{
        private $id;
        private $id_status;
        private $tarefa;
        private $data_cadastro;

        

        public function __get($attr){
            return $this->$attr;
        }
        public function __set($attr, $valor){
            $this->$attr = $valor;
        }
    }
?>

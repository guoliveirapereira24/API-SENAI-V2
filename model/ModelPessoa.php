<?php
    

    class ModelPessoa{

        private $_conn;

        public function __construct($conn){

            $this->_conn = $conn;

        }
        public function findAll(){

            //MONTA A INSTRUÇÃO SQL
            $sql = "SELECT * FROM tbl_pessoa";
            
            //PREPARA UM PROCESSO DE EXECUÇÃO DE INSTRUÇÃO SQL
            $statment = $this->_conn->prepare($sql);
            
            //EXECUTA A INSTRUÇÃO SQL
            $statment->execute();

            //DEVOLVE OS VALORES DA SELECT PARA SEREM UTILIZADOS
            return $statment->fetchAll();
        }


    }


?>
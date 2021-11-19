<?php
    

    class ModelPessoa{

        private $_conn;

        private $_codPessoa;
        private $_nome;
        private $_sobrenome;
        private $_email;
        private $_celular;
        private $_fotografia;

    
        public function __construct($conn){

            //PERMITE RECEBER DADOS JSON ATRAVÉS DA REQUISIÇÃO
            //IRÁ RECEBER DE QUALQUER ENTRADA 
            $json = file_get_contents("php://input");

            $dadosPessoa = json_decode($json);

            
            //echo $dadosPessoa;exit;

            //Irá receber o codPessoa do POSTMAN que tem 
            //um atributo com esse nome e irá guardar em _codPessoa

            //RECEBIMENTO DOS DADOS DO POSTMAN
            $this->_codPessoa = $dadosPessoa->cod_pessoa ?? null;
            $this->_nome = $dadosPessoa->nome ?? null;
            $this->_sobrenome = $dadosPessoa->sobrenome ?? null;
            $this->_email = $dadosPessoa->email ?? null;
            $this->_celular = $dadosPessoa->celular ?? null;
            $this->_fotografia = $dadosPessoa->fotografia ?? null;

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
            return $statment->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function findById(){

            $sql = "SELECT * FROM tbl_pessoa WHERE cod_pessoa = ?";

            $statment = $this->_conn->prepare($sql);
            $statment->bindValue(1, $this->_codPessoa);

            $statment->execute();

            return $statment->fetchAll(\PDO::FETCH_ASSOC);


        }
        public function create(){

            $sql = "INSERT INTO tbl_pessoa (nome, sobrenome, email, celular, fotografia)
            VALUES (?, ?, ?, ?, ?)";

            $statment = $this->_conn->prepare($sql);

            $statment->bindValue(1, $this->_nome);
            $statment->bindValue(2, $this->_sobrenome);
            $statment->bindValue(3, $this->_email);
            $statment->bindValue(4, $this->_celular);
            $statment->bindValue(5, $this->_fotografia);
            


            if ($statment->execute()) {
                return "Success";            
               }
               else{
                   return "Error";
               }


        }

    }


?>
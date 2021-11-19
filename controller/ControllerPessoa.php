<?php

//Criando uma classe
    class ControllerPessoa{

        private $_method;
        private $_modelPessoa;
        private $_codPessoa;
        
        public function __construct($model){

            $this->_modelPessoa = $model;
            $this->_method = $_SERVER['REQUEST_METHOD'];

            //PERMITE RECEBER DADOS JSON ATRAVÉS DA REQUISIÇÃO
            $json = file_get_contents("php://input");

            //echo $json;exit;
            $dadosPessoa = json_decode($json);

            //SE TIVER UM codPessoa ELE ENVIA O codPessoa,
            //SE NÃO ELE ENVIA NULO
            $this->_codPessoa = $dadosPessoa->cod_pessoa ?? null;

        }

        public function router(){

            switch ($this->_method) {
                case 'GET':

                // echo $this->_codPessoa;exit;
                    
                    if (isset($this->_codPessoa)) {

                        //SEMPRE QUE RODAR UM return ELE NÃO IRÁ LER O RESTO
                        return $this->_modelPessoa->findById();                   

                    }

                    return $this->_modelPessoa->findAll();

                    break;
                
                case 'POST':
                    
                    return $this->_modelPessoa->create();
                    break;
                    
                    break;
                case 'PUT':
                    # code...
                    break;
                case 'DELETE':
                    # code...
                break;


                default:
                    # code...
                    break;
            }
        }

    }



?>
<?php

//Criando uma classe
    class controllerPessoa{

        private $_method;
        private $_modelPessoa;
        
        public function __construct($model){

            $this->_modelPessoa = $model;
            $this->_method = $_SERVER['REQUEST_METHOD'];

        }

    }



?>
<?php

class Connection{
    private $_dbHostname = "127.0.0.1";
    private $_dbName = "cadastro";
    private $_userName = "root";
    private $_dbPassword = "bcd127";
    private $_conn;

    //Método construtor
    public function __construct(){


        try{
            $this->_conn = new PDO("mysql:host=$this->_dbHostname;dbname=$this->_dbName;", 
            $this->_userName, 
            $this->_dbPassword);
            //O PDO está pegando qual o nome do banco e qual tabela ele quer acessar
            //E qual usuário e senha ele vai usar para entrar 

            $this->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
            //PDO::ATTR_ERRMODE = PDO é de onde ele vai pegar e o ATTR_ERRMODE é o que ele vai fazer.
        }catch(PDOException $error){

            echo "Connection error: " . $error->getMessage();
            //getMessage() é um método do PDO
        }

    }

    public function returnConnection(){

        return $this->_conn;
        
    }

}

?>
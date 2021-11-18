<?php

    include('./Connection.php');
    include('./model/ModelPessoa.php');

    //Chama a classe de Connection que através de um método cria uma conexão com o SQL e retorna ela
    $conn = new Connection();
    
    //Chama a classe de ModelPessoa que cria uma conexão SQL com o método construtor
    //e retorna elam enquanto pede uma conexão passada pelo $conn 
    $modelPessoa = new ModelPessoa($conn->returnConnection());

    $dados = $modelPessoa->findAll();



    echo '<pre>';
    var_dump($dados);
    echo '</pre>';

/*    echo '<pre>';
    var_dump($conn->returnConnection());
    echo '</pre>';
*/
?>
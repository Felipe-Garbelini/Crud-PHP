<?php
    # Config de conexão com o MySQL
    require '../config/database.php';

    #Pegando os valores dadas pelo metodo GET e colocando em uma variavel.
    $id = filter_input(INPUT_GET, 'id');

    #Se existir id
    if($id){
        #Cria uma variavel ($sql) que chama a conexão com o banco ($database_connection) e usa o metodo (prepare), coloca sua query, para passar os valores na linha de baixo
        $sql = $database_connection->prepare("DELETE FROM usuario WHERE id = :id");

        #Passa o parametro id para a o (prepare) da linha de cima
        $sql->bindValue(':id', $id);

        #executa efetivamente 
        $sql->execute();

    }
    #Volte para o index
    header("Location: ../index.php");

?>
<?php
    # Config de conexão com o MySQL
    require '../config/database.php';

    #Pegando os valores dadas pelo metodo GET e colocando em variáveis.
    $id = filter_input(INPUT_GET, 'id');

    #Pegando os valores dadas pelo metodo POST e colocando em variáveis.
    $nome = filter_input(INPUT_POST, 'nome');
    $email = filter_input(INPUT_POST, 'email',FILTER_VALIDATE_EMAIL);
    $celular = filter_input(INPUT_POST,'celular');
    $grupo = filter_input(INPUT_POST,'grupo');
    $idade = filter_input(INPUT_POST,'idade');

    
    if($id && $nome && $email && $celular && $grupo && $idade){

        #Cria uma variavel ($sql) que chama a conexão com o banco ($database_connection) e usa o metodo (prepare), coloca sua query, para passar os valores na linha de baixo
        $sql = $database_connection->prepare("UPDATE usuario SET nome = :nome, email = :email, celular = :celular, grupo = :grupo, data_nasc = :idade WHERE id = :id");

        #Passa os parametros nome, email e id para a o (prepare) da linha de cima
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':celular', $celular);
        $sql->bindValue(':grupo', $grupo);
        $sql->bindValue(':idade', $idade);
        $sql->bindValue(':id', $id);
        

        #executa efetivamente 
        $sql->execute();

        #volta para o index
        header("Location: ../index.php");
        exit;
        
    } else{
        #volta para o index
        header("Location: index.php");
        exit;
        
    }

?>
<a href="editar.php?id=<?=$usuario['id'];?>">Voltar</a>
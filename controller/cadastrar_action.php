<?php
    # Config de conexão com o MySQL
    require "../config/database.php";
    
    #Pegando os valores dadas pelo metodo POST e colocando em variáveis.
    $nome = filter_input(INPUT_POST,'nome');
    $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
    $celular = filter_input(INPUT_POST,'celular');
    $grupo = filter_input(INPUT_POST,'grupo');
    $idade = filter_input(INPUT_POST,'idade');


    # se existir nome e email continue
    if($nome && $email && $celular && $grupo && $idade) {
        
        #Cria uma variavel ($usuarios_result) que chama a conexão com o banco ($database_connection) e usa o metodo (prepare), coloca sua query, para passar os valores na linha de baixo
        $usuarios_result = $database_connection->prepare("SELECT * FROM usuario WHERE email = :email");
        
        #Passa o parametro email para a o (prepare) da linha de cima
        $usuarios_result->bindValue(':email',$email);
        
        #executa efetivamente 
        $usuarios_result->execute();

        #se o email não estiver cadastrado continue 
        if($usuarios_result->rowCount() === 0) {
            
            #Cria uma variavel ($insert) que chama a conexão com o banco ($database_connection) e usa o metodo (prepare), coloca sua query, para passar os valores na linha de baixo
            $insert = $database_connection->prepare("INSERT INTO usuario (nome,email,celular,grupo,data_nasc) VALUES (:nome, :email, :celular, :grupo , :idade)");

            #Passa os parametro nome e email para a o (prepare) da linha de cima
            $insert->bindValue(':nome',$nome);
            $insert->bindValue(':email',$email);
            $insert->bindValue(':celular',$celular);
            $insert->bindValue(':grupo',$grupo);
            $insert->bindValue(':idade',$idade);
            
            #executa efetivamente 
            $insert->execute();

            #se inseriu volte para o index
            if ($insert) {
                header("Location: ../index.php");
                exit;

            } else {
                #Continue em cadastrar.php
                header("Location: ../view/cadastrar.php");
            }

        } else {
            #Continue em cadastrar.php
            header("Location: ../view/cadastrar.php");
        }

    } else{
        #Continue em cadastrar.php
        header("Location: ../view/cadastrar.php");
        exit;
    }

?>
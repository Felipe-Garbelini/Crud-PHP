<?php
    # Config de conexão com o MySQL
    require '../config/database.php';

    $usuario = [];

    #Pegando o valor dado pelo metodo GET e colocando em uma variavel.
    $id = filter_input(INPUT_GET, 'id');

    #Se existir id continue
    if($id) {

        #Cria uma variavel ($usuarios_result) que chama a conexão com o banco ($database_connection) e usa o metodo (prepare), coloca sua query, para passar os valores na linha de baixo
        $usuario = $database_connection->prepare("SELECT * FROM usuario WHERE id = :id ");

        #Passa o parametro id para a o (prepare) da linha de cima
        $usuario->bindValue(':id', $id);

        #executa efetivamente 
        $usuario->execute();

        #Se existir o id continue 
        if($usuario->rowCount() > 0) {
            #
            $usuario = $usuario->fetch(PDO::FETCH_ASSOC);
        } else {
            #volte para o index
            header("Location: index.php");
            exit;
        }

    } else {
        #volte para o index
        header("Location: index.php");
    }
?>

<link rel="stylesheet" type="text/css" href="../styles/style2.css">

<div id='corpo_editar'>

<h1>Editar Usuário</h1>

<form action="../controller/editar_action.php?id=<?=$usuario['id'];?>" method="POST">

    <label for="">
        <input type="text" name="nome" id="B_nome" placeholder='Nome' value="<?=$usuario['nome'];?>">
    </label>

    <label for="">
        <input type="text" name="email" id="B_email" placeholder='Email' value="<?=$usuario['email'];?>">
    </label>

    <label for="">
        <input type="tel" name="celular" id="B_celular" placeholder='Celular' value="<?=$usuario['celular'];?>">
    </label>
    
    <select name="grupo">
        <option value="bronze">Bronze</option>
        <option value="prata" selected>Prata</option>
        <option value="ouro">Ouro</option>
        <option value="diamante">Diamante</option>
    </select>

    <input type="submit" id='B_salvar' value="Atualizar">
</form>

</div>
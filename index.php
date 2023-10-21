<!-- Estilo -->
<link rel="stylesheet" type="text/css" href="styles/style.css">

<!-- Fontes -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@100&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Gabarito&family=Young+Serif&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=AR+One+Sans&display=swap" rel="stylesheet">

<?php
    # Config de conexão com o MySQL
    require './config/database.php';

    $lista = [];

    #Cria uma variavel ($usuarios_retorno) que chama a conexão com o banco ($database_connection) e usa o metodo (query), coloca sua query
    $usuario_retorno = $database_connection->query("SELECT * FROM usuario");

    #Se tiver algum registro continue
    if($usuario_retorno->rowCount()> 0) {

        #Mostre na tela como lista
        $lista = $usuario_retorno->fetchALL(PDO::FETCH_ASSOC);
    }

?>


<div id='corpo'>

<div class="header_index">
    <a id='Botao_Cadastrar' href="view/cadastrar.php">Cadastrar Usuário</a>
</div>

<!-- Criando a tabela -->
<table >
    <tr >
        <th class='firstline_id'>ID</th>
        <th class='firstline'>Nome</th>
        <th class='firstline'>Email</th>
        <th class='firstline'>Celular</th>
        <th class='firstline'>Grupo</th>
        <th class='firstline'>Idade</th>
        <th class='firstline_ação'>Ações</th>
    </tr>
    
    <?php foreach($lista as $usuario): ?>
        <tr>
            <td class='contentline_id'><?=$usuario['id'];?></td>
            <td class='contentline'><?=$usuario['nome'];?></td>
            <td class='contentline'><?=$usuario['email'];?></td>
            <td class='contentline'><?=$usuario['celular'];?></td>
            <td class='contentline'><?=$usuario['grupo'];?></td>
            <td class='contentline'><?= implode('/', array_reverse(explode('-',  $usuario['data_nasc'])));?></td>
            
            <td class='contentline_ação'>
                <div id='editar_div'>
                    <a id='editar' href="view/editar.php?id=<?=$usuario['id'];?>">Editar</a>
                </div>

                <div id='excluir_div'>
                    <a id='excluir' href="controller/excluir_action.php?id=<?=$usuario['id'];?>" onclick="return confirm('Tem certeza que deseja Excluir este registro?')">Excluir</a>
                </div>
            </td>
        </tr>
    <?php endforeach ?>

</table>

</div>
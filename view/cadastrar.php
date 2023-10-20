<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Gabarito&family=Young+Serif&display=swap" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="../styles/style1.css">

<div id='corpo_cadastrar'>

<h1>Cadastrar Usuário</h1>

<form action="../controller/cadastrar_action.php" method="POST">

<label for="">
        <input type="text" name="nome" id="B_nome" placeholder='Nome' >
</label>
<label for="">
        <input type="email" name="email" id="B_email" placeholder='Email'>
</label>
<label for="">
        <input type="date" name="ano" id="B_data" placeholder='Data'>
</label>

<input type="submit" id='B_salvar' value="Cadastrar">

</form>

</div>
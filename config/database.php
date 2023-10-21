<?php
    #Nome da database
    $db_name = 'test1';
    #Nome do localhost
    $db_host = 'localhost';
    #Nome do usuario
    $db_user = 'felipe';
    #Senha do usuario
    $db_password = '111368';


    #Conecta o MySQL com o PHP
    $database_connection = new PDO("mysql:dbname=".$db_name.";host=".$db_host,$db_user,$db_password);

?>
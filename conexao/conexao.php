<?php
//  file_put_contents('tt.txt','fucionou',FILE_APPEND);

date_default_timezone_set('America/Sao_Paulo');


$servidor = 'localhost';
$bancoDados = 'sistemacovid';
$usuario = 'root';
$senha = '';

//Cria uma conexão com o banco de Dados
try{
    $pdo = new PDO ("mysql:host=$servidor;dbname=$bancoDados",$usuario,$senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(PDOException $erro){
    echo 'Erro ao conectar ao banco de dados: ' . $erro->getMessage();
}

<?php
date_default_timezone_set('America/Sao_Paulo');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receba os dados enviados
    $paisSelecionado = $_POST["paisSelecionado"];
    $horaConsultaFormatada = $_POST["horaConsultaFormatada"];

    // Faça o que você precisa fazer com os dados recebidos
    echo "Pais Selecionado: " . $paisSelecionado . "<br>";
    echo "Hora da Consulta: " . $horaConsultaFormatada;
}




$erros = array();

if (empty($dataHora)) {
    array_push($erros, 'O campo nome nao pode ficar em branco!');
}


if (count($erros) == 0) {
    //código de salvar os dados
    try {
        require_once '../conexao/conexao.php';

        $insert = $pdo->prepare('INSERT INTO paises (pais_selecionado, dataHora) VALUES (:pais_selecionado, :dataHora)');
        $insert->bindValue(':pais_selecionado', $paisSelecionado);
        $insert->bindValue(':dataHora', $dataHora);
        $insert->execute();

        
    } catch (PDOException $e) {
        //$e recebe os erros se ocorrerem e guarda nessa variavel.
        array_push($erros, );
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir</title>
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f5f5f5;
        }

        main {
            width: 340px;
            height: 200px;
            background-color: lightslategrey;
            margin-left: 7%;
        }

        main h1 {
            margin-left: 39%;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 26px;

        }

        main p {
            margin-left: 5%;
            margin-bottom: 15px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
        }

        main a {
            display: inline;
            text-align: center;
            background-color: lightgray;
            width: 100px;
            padding: 10px 20px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            color: black;
            border-radius: 10px;
            margin-left: 37%;
        }

        main a:hover {
            background-color: blue;
            color: aqua;
        }
    </style>

</head>

<body>

    <main>
        <h1>Erros</h1>
        <?php foreach ($erros as $e) { ?>
            <p>
                <?php echo $e; ?>
            </p>
        <?php } ?>
        <a href="javascript:history.back();">Voltar</a>
        <!--Serve para usar como voltar no navegador, mas sem perder os dados inseridos na tela. -->
    </main>
</body>

</html>

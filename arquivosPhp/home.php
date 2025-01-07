<?php 

// Conexão com o Banco de Dados
require_once '../conexao/conexao.php';

// Puxa os dados do último acesso
$select = $pdo->prepare('SELECT * FROM paises ORDER BY id DESC LIMIT 1');
$select->execute();
$result = $select->fetchAll();

?> 

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="icon" href="../imagens/Covid19.png" type="image/png">
    <title>Home</title>
</head>

<body>

    <!--Cabeçalho da pagina-->
    <header>

        <!--Menu de navegação ou navbar-->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">

                <!--Aqui guarda o valor de uma figura a ser exibida na pagina-->
                <figure>
                    <img src="../imagens/logo1.png" alt="Logo" id="imgLogo">

                    <!--Nome que vai ser colocado na figura-->
                    <figcaption hidden>Logo Paises</figcaption>
                </figure>

                <!--Caso a tela seja menor que 1200px adiciona esse botão como menu-->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!--Aqui guarda os valores desse botão-->
                <div class="collapse navbar-collapse" id="navbarText">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">

                            <!--Link para acessar outras paginas ou percorrer pela mesma-->
                            <a class="nav-link active" aria-current="page" href="home.php" id="a">

                                <!--Icon de arrow, vindo do bootstrap-->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                                </svg></a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

    </header>

    <!--Corpo da pagina-->
    <main class="container" id="corpoPrincipal">


        <!--Div que contem os dados da pagina-->
        <div class="card mt-4">
            <div class="card-body">

                <!--Sub-Titúlo da pagina-->
                <div> <img src="../imagens/logo1.png" alt="" id="imgTitulo"></div>

                
                <!--Aqui contem a tag select, usada para armazenar os países expecíficos-->
                <div class="container-fluid" id="select">
                        
                    <form action="formulario.php" method="post" id="form1">
                        <select class="form-select" id="pais" name="pais">
                            <option>Selecione o País</option>
                            <option value="Brazil" name="pais">Brasil</option>
                            <option value="Canada" name="pais">Canadá</option>
                            <option value="Australia" name="pais">Austrália</option>
                        </select>

                        <!--Input do tipo button, usando a função de click assim que escolhe o país-->
                        <input type="submit" value=" Buscar &#10227;" id="btn1">

                    </form>

                        
                </div>

                <!--Div onde vai mostrar os resultados totais apenas do país-->
                <div id="divResult"></div>

                <table class="table table-striped" >
  

                    <!--Cabeçalho da tabela-->
                    <thead>
                        <tr>
                            <th scope="col">País</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Casos Confirmados no Estado</th>
                            <th scope="col">Mortes no Estado</th>
                        </tr>
                    </thead>

    
                    <tbody id="tabela-corpo">
                        <!-- Aqui as linhas vão ser preenchidas dinâmicamente -->
                    </tbody>

                </table>

            </div>
        </div>


        <!--Aqui no footer é recibido os valores do país e a hora, assim que e feita a consulta-->
        <footer id="rodape">
            <?php foreach($result as $res) { ?>
                <p id="paraRodape">Ultimo acesso: <?php echo $res->pais_selecionado;?> <?php echo $res->dataHora; ?></p>
            <?php }?>
        </footer>
         
    </main>

</body>


<!--Script de interação da pagina-->
<script src="../arquivosJS/home.js"></script>

<!--script onde e feito a linkagem com o bootstrap, podendo acessar suas funções e ferramentas-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>
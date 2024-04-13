<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="icon" href="../imagens/logo.png" type="image/png">
    <title>Home</title>
</head>

<body>

    <!--Cabeçalho da pagina-->
    <header>

        <!--Menu de navegação ou navbar-->
        <nav class="navbar navbar-expand-lg bg-body-secondary">
            <div class="container-fluid">

                <!--Aqui guarda o valor de uma figura a ser exibida na pagina-->
                <figure>
                    <img src="../imagens/logo.png" alt="Logo" style="width: 35px; height: 35px; margin-top:6px">

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
                            <a class="nav-link active" aria-current="page" href="home.php" id="a">Atualizar Pagina

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
    <main class="container">


        <!--Div criada como class row, para agrupar outras divs-->
        <div class="row d-flex justify-content-center mt-5">

            <!--div class col, aqui determina o lugar dos elementos na tela-->
            <div class="col-sm-6 col-md-8 col-lg-7">

                <!--Div que contem os dados da pagina-->
                <div id="corpoPagina" class="container-fluid">

                    <!--Sub-Titúlo da pagina-->
                    <h2 id="h2">MORTES POR COVID-19 </h2>

                    <!--Parágrafo indicando como consultar o país-->
                    <p id="p">Selecione o País desejado</p>


                    <!--Aqui contem a tag select, usada para armazenar os países expecíficos-->
                    <div id="select1">
                        <select class="form-select" id="pais" name="pais">
                            <option>Selecione o País</option>
                            <option value="Brazil" name="pais">Brasil</option>
                            <option value="Canada" name="pais">Canadá</option>
                            <option value="Australia" name="pais">Austrália</option>
                        </select>

                        <!--Input do tipo button, usando a função de click assim que escolhe o país-->
                        <input type="submit" value=" Buscar &#10227;" id="btn1">
                        
                    </div>

                    <br>

                    <!--Div onde contem o select de estados selecionados a partir do país-->
                    <div id="divEstado">
                        <p id="paraEstado">Selecione o Estado <select name="" id="estadoSelect"></select></p>
                        <input type="hidden" value="Acessar" id="btt">
                    </div>

                    <!--Fomulário para armazenar a hora e o país no banco de dados, assim que e feita a consulta através do click -->
                    <form action="formulario.php" method="post" id="meuFormulario">
                        <input type="hidden" name="paisSelecionado" id="paisSelecionado">
                        <input type="hidden" name="horaConsultaFormatada" id="horaConsultaFormatada">
                        <!-- Outros campos do formulário -->
                    </form>



                    <!--Div que armazena os valores vindos do estado selecionado-->
                    <div id="resultado"></div>

                </div>

            </div>

        </div>
    </main>


    <!--Aqui no footer e recibido os valores do país e a hora assim que e feita a consulta-->
    <footer id="rodape">
        <p id="paraRodape"></p>
    </footer>

</body>


<!--Script de interação da pagina-->
<script src="../arquivosJS/home.js"></script>

<!--script onde e feito a linkagem com o bootstrap, podendo acessar suas funções e ferramentas-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>
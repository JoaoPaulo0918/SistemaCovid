//Variáveis de título e paragrafo.
let h2 = document.getElementById('h2');


//Variáveis do campo select
let select = document.getElementById('pais');

//Variáveis onde vai mostrar os dados 
let result = document.getElementById('resultado');
let paraEstado = document.getElementById('paraEstado');
var input = document.getElementById('estado');


var selectedOption = '';
//evento para selecionar o pais. 

let horaConsulta;

function formatarDataHora(dataHora) {
    const options = {
        year: 'numeric',
        month: '2-digit',
        day: '2-digit',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        hour12: false,
        timeZone: 'America/Sao_Paulo'
    };
    return new Date(dataHora).toLocaleString('en-US', options);
}


//Função com evento de click, para toda dinâmica da pagina
// Definindo a função de busca
async function buscar() {
    let btn = document.getElementById('btn1');
    btn.style.display = 'none';
    p.style.display = 'none';

    let selectPais = document.getElementById('pais').value;
    // Normalizaa o valor do país para corresponder ao formato esperado pela API
    let paisFormatado = selectPais.toLowerCase(); // Converte para minúsculas

    // Substituir espaços por traços, se necessário
    paisFormatado = paisFormatado.replace(/\s+/g, '-');

    let url = '';

    //Condição feita para receber tanto a api diretamente com o país expecífico, ou recebendo da variável.
    if (paisFormatado === 'Brazil') {
        url = 'https://dev.kidopilabs.com.br/exercicio/covid.php?pais=Brazil';
    } else {
        url = 'https://dev.kidopilabs.com.br/exercicio/covid.php?pais=' + paisFormatado;
    }

    try {

        //Usa o comando fetch para acessar a api
        const resposta = await fetch(url);
        const dados = await resposta.json();

        //É feito um console para verificar se os dados chegaram corretamente.
        console.log('Dados recebidos:', dados);

        //Variáveis para acessar valores expecíficos
        let paisSelecionado = selectPais;


        //Condição feita para verificar se o resultado existe ou seja se e igual 200.
        if (resposta.status === 200) {
            let selectEstado = document.getElementById('estadoSelect');

            horaConsulta = new Date();
            // Formata a data e hora da consulta
            let horaConsultaFormatada = formatarDataHora(horaConsulta);

            //Looping para percorrer todos os dados expecíficos desejados para mostrar ao clinete
            for (let chave in dados) {
                if (dados.hasOwnProperty(chave)) {
                    let estado = dados[chave];

                    // Cria um novo elemento <option>
                    let option = document.createElement('option');

                    // Defini o valor e o texto do <option> com base nos valores do estado
                    option.value = estado.ProvinciaEstado;
                    option.textContent = estado.ProvinciaEstado;

                    // Adiciona o <option> ao <select>
                    selectEstado.appendChild(option);

                    //Segundo botão para executar o segundo comando, buscar os resultados do estado escolhido.
                    let btt = document.getElementById('btt');
                    btt.setAttribute('type', 'button');


                }
                btt.addEventListener('click', () => {

                    // Adiciona um ouvinte de evento de clique ao botão

                    result.innerHTML = ''; // Limpa os resultados anteriores

                    // Aqui cria elementos HTML para os valores a serem exibidos
                    let para = document.getElementById('paraEstado');
                    let div = document.createElement('div');
                    div.textContent = 'País selecionado: ' + paisSelecionado;

                    // Aqui inicializa as variáveis para armazenar os totais
                    let totalMortes = 0;
                    let totalConfirmados = 0;

                    // Obtém o valor selecionado do <select> de estados
                    let estadoSelecionado = selectEstado.value;

                    // Aqui vai interagir sobre as chaves do objeto de dados
                    for (let chave in dados) {
                        if (dados.hasOwnProperty(chave)) {
                            let estado = dados[chave];
                            totalMortes += estado.Mortos;
                            totalConfirmados += estado.Confirmados;

                            // Condição para verificar se o estado atual corresponde ao estado selecionado, sendo assim vai exibir suas informações
                            if (estado.ProvinciaEstado === estadoSelecionado) {

                                //Aqui cria uma variável com valor tag div, para armazenar apenas o valor da variável 
                                let estadoPais = document.createElement('div');
                                //Vai adicionar um valor texto antes do valor da variável.
                                estadoPais.textContent = 'Estado Selecionado: ' + estado.ProvinciaEstado;

                                let estadoConfirmados = document.createElement('div');
                                estadoConfirmados.textContent = 'Casos confirmados no Estado: ' + estado.Confirmados;

                                let estadoMortos = document.createElement('div');
                                estadoMortos.textContent = 'Mortes confirmadas no Estado: ' + estado.Mortos;

                                // Adiciona os elementos à lista de resultados
                                result.appendChild(div);
                                result.appendChild(estadoPais);
                                result.appendChild(estadoConfirmados);
                                result.appendChild(estadoMortos);
                                estadoPais.style.color = '#3b3b3b';
                                estadoConfirmados.style.color = '#3b3b3b';
                                estadoMortos.style.color = '#3b3b3b';
                            }
                        }
                    }

                    //Aqui nessa parte vai adicionar o valor do pais selecionado no rodape da pagina, sempre que for feito a busca.
                    let rodape = document.getElementById('rodape');
                    let paraRodape = document.getElementById('paraRodape');
                    paraRodape.innerHTML = `Ultimo país visitado foi o: ${paisSelecionado} <br> Data e Hora da consulta: ${horaConsultaFormatada}`;
                    rodape.appendChild(paraRodape);

                    // você tem os dados que deseja enviar em variáveis JavaScript
                    let paisRecebido = paisSelecionado;
                    let horaRecebida = horaConsulta;
                    // Defina os valores dos campos do formulário com os dados
                    document.getElementById("paisSelecionado").value = paisRecebido;
                    document.getElementById("horaConsultaFormatada").value = horaRecebida;
                    // Envie o formulário
                    document.getElementById("meuFormulario").submit();


                    //Esse mesmo codigo aqui dessa vez vai receber o valor geral de mortes e confimados no pais.
                    let liMortes = document.createElement('div');
                    liMortes.textContent = 'Mortes no país: ' + totalMortes;

                    let liConfirmados = document.createElement('div');
                    liConfirmados.textContent = 'Casos confirmados no país: ' + totalConfirmados;

                    // Adiciona novamente os elementos à lista de resultados
                    result.appendChild(div);
                    result.appendChild(liMortes);
                    result.appendChild(liConfirmados);


                    //Comandos para interagir na pagina durante as buscas
                    h2.textContent = 'Resultados';
                    pais.style.display = 'none';
                    selectEstado.style.display = 'none';
                    btt.style.display = 'none';

                    para.textContent = 'Resultados do Estado:';
                    para.style.marginLeft = '8vw';
                    para.style.fontSize = '20px';




                });


            }
        }

        else {
            //Se não for verdadeira a consulta a api gera erro 404, e mostra essa mensagem no console do navegador.
            console.error('Erro ao obter dados da API');
        }
    } catch (error) {
        //Exibe qualquer tipo de erro que tenha na página.
        console.error('Erro:', error);
    }
}

//Evento de click do primeiro botão, onde e responsavél por toda interação da pagina.
document.getElementById('btn1').addEventListener('click', buscar);





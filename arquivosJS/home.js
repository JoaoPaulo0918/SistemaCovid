//Variáveis do campo select
let select = document.getElementById('pais');

var selectedOption = '';
//evento para selecionar o pais. 

let horaConsulta;

//função para fazer a formatação da data e hora
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


// Definindo a função de busca.
async function buscar() {
    let selectPais = document.getElementById('pais').value;
    let paisFormatado = selectPais.toLowerCase().replace(/\s+/g, '-');
    let url = 'https://dev.kidopilabs.com.br/exercicio/covid.php?pais=' + paisFormatado;

    try {
        const resposta = await fetch(url);
        const dados = await resposta.json();

        if (resposta.status === 200) {
            let totalMortes = 0;
            let totalConfirmados = 0;
            let tabelaCorpo = document.getElementById('tabela-corpo');
            tabelaCorpo.innerHTML = ''; 
            

            for (let chave in dados) {
                if (dados.hasOwnProperty(chave)) {
                    let estado = dados[chave];

                    // Atualiza os valores totais
                    totalMortes += estado.Mortos;
                    totalConfirmados += estado.Confirmados;

                    
                    // Cria uma nova linha na tabela
                    let linha = document.createElement('tr');

                    // Cria as células para exibir na tabela
                    let colunaPais = document.createElement('th');
                    colunaPais.textContent = selectPais;

                    let colunaEstado = document.createElement('td');
                    colunaEstado.textContent = estado.ProvinciaEstado;

                    let colunaCasosEstado = document.createElement('td');
                    colunaCasosEstado.textContent = estado.Confirmados;

                    let colunaMortesEstado = document.createElement('td');
                    colunaMortesEstado.textContent = estado.Mortos;

                    // Adiciona as células à linha
                    linha.appendChild(colunaPais);
                    linha.appendChild(colunaEstado);
                    linha.appendChild(colunaCasosEstado);
                    linha.appendChild(colunaMortesEstado);
                    
                    
                    // Adiciona a linha à tabela
                    tabelaCorpo.appendChild(linha);
                    
                }
            }
 
            //Aqui cria as variáveis que serão exibidas no espaço result
            let result = document.getElementById('divResult');
            result.innerHTML = '';

            //Criando o primeiro parágrafo
            let p1 = document.createElement('p');
            p1.innerHTML = `<b>País:</b> ${selectPais}`;
            
            let p2 = document.createElement('p');
            p2.innerHTML = `<b>Total de casos confirmados no país:</b> ${totalConfirmados}`;

            let p3 = document.createElement('p');
            p3.innerHTML = `<b>Total de mortes no país:</b> ${totalMortes}`;
            
            //Adicionando os valores de cada parágrafo dentro do campo result
            result.appendChild(p1);
            result.appendChild(p2);
            result.appendChild(p3);
 
        } else {
            //Caso tenha algum erro ao buscar os dados 
            console.error('Erro ao obter dados da API');
        }
    } catch (error) {
        console.error('Erro:', error);
    }
}


//Evento de click do primeiro botão, onde e responsavél por toda interação da pagina.
document.getElementById('btn1').addEventListener('click', buscar);





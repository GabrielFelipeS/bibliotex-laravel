const banner = document.querySelectorAll('.buttonarea1');
banner.forEach( (botao1, indice) => {
    botao1.addEventListener('click', () => {


        SelecionarBotaobanner_1(botao1);

    })
})
function SelecionarBotaobanner_1(botao1) {
    const teste = document.querySelector('.banner');
    teste.classList.add('margem-negativa');
}



const banner_2 = document.querySelectorAll('.buttonarea2');

banner_2.forEach( (botao2, indice) => {
    botao2.addEventListener('click', () => {

        

        Selecionarbanner_2(botao2);

    })
})

function Selecionarbanner_2(botao2) {
    const teste2 = document.querySelector('.banner');
    teste2.classList.remove('margem-negativa');
}

function alerta () {
    alert("Sua sugestão foi enviada!");
}

function clickMenu() {
    if (nav.style.display == 'block'){
        nav.style.display = 'none';
        
    } else {
        nav.style.display = 'block';
    }
}
window.addEventListener('load', (event) => {
    const comprimento = document.querySelector('#comprimento');
    const largura = document.querySelector('#largura');
    const area = document.querySelector('#area');

    let valorComprimento = comprimento.value;
    let valorLargura = largura.value;
    let valorArea = valorComprimento*valorLargura;

    comprimento.addEventListener('keyup', event => {
        valorComprimento = comprimento.value;
        calcularArea(valorComprimento, valorLargura);
    });

    largura.addEventListener('keyup', event => {
        valorLargura = largura.value;
        calcularArea(valorComprimento, valorLargura);
    });

    calcularArea = (valorComprimento, valorLargura) => {
        valorArea = (valorComprimento*valorLargura)/1000000;
        area.value = valorArea;
    }
});


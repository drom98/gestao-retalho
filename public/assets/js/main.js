window.addEventListener('load', (event) => {
    const comprimento = document.querySelector('#comprimento');
    const largura = document.querySelector('#largura');
    const area = document.querySelector('#area');

    let valorComprimento = comprimento.value;
    let valorLargura = largura.value;
    let valorArea = area.value = (valorComprimento*valorLargura)/1000000;

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

$(document).ready(function() {
    $('.tipoVidroSelect').select2({theme: 'bootstrap4'});
    $('.localizacaoSelect').select2({theme: 'bootstrap4'});
});


const getCSFR = () => document.querySelector('input[name=_token]').value;

const fecthDelete = (id, url, method) => {

    const headers = new Headers({
        'X-CSRF-TOKEN': getCSFR()
    })

    if (confirm('Confirmar?')) {

        return fetch(url + id, {
            method: `${method}`,
            headers
        }).then(function () {
            window.location = url
        })

    }
}


function getRetalho(id) {
    $('.modal-title').text('Usar retalho nº' + id);
    $('#id_retalho').val(id);
    $.ajax({
        url: "/retalho/usar/get/" + id,
        type: "get",
        dataType: "json",
        success: function (res) {
            insertData(res);
        }
    });
}

function insertData(res) {
    $('#btnConfirmarUsar').attr('data-id', res.id);
    $('#comprimento').val(res.comprimento);
    $('#comprimento').attr('max', res.comprimento);
    $('#largura').val(res.largura);
    $('#largura').attr('max', res.largura);
}


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Etiqueta-{{ $retalho->num_lote }}</title>
    @inject('helper', 'App\Helpers\Helper')
    @inject('carbon', 'Carbon\Carbon')
</head>
<body>
    <p>Tipo de vidro: {{ $retalho->tipoVidro->nome }}</p>
    <p>Comprimento: {{ $retalho->comprimento }}</p>
    <p>Largura: {{ $retalho->largura }}</p>
    <p>Area: {{ $retalho->area }}</p>
    <p>Lote: {{ $retalho->num_lote }}</p>
    <p>Data arrumação: {{ $helper->getLocalizedDate($retalho) }}</p>
    <p>Local arrumação: {{ $retalho->localizacao->nome }}</p>
    <hr>
    <p>Gerado em: {{ $carbon->parse(now())->locale('pt_PT')->timezone('Europe/Lisbon')->isoFormat('LLL') }}</p>
</body>
</html>

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

    <style>
        body {
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    <p><strong>Tipo de vidro:</strong> {{ $retalho->tipoVidro->nome }}</p>
    <p><strong>Comprimento:</strong> {{ $retalho->comprimento }}</p>
    <p><strong>Largura:</strong> {{ $retalho->largura }}</p>
    <p><strong>Area:</strong> {{ $retalho->area }}</p>
    <p><strong>Lote:</strong> {{ $retalho->num_lote }}</p>
    <p><strong>Data arrumação:</strong> {{ $helper->getLocalizedDate($retalho) }}</p>
    <p><strong>Local arrumação:</strong> {{ $retalho->localizacao->nome }}</p>
    <hr>
    <small>Etiqueta gerada: {{ $carbon->parse(now())->locale('pt_PT')->timezone('Europe/Lisbon')->isoFormat('LLL') }}</small>
</body>
</html>

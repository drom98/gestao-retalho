<form class="user" method="POST" action="/retalho">
    @csrf
    <div class="form-group">
        <label for="comprimento">Lote:</label>
        <input name="lote" id="lote" step="1" type="number" class="form-control" placeholder="Lote">
    </div>
    <div class="form-group">
        <label for="comprimento">Comprimento(mm):</label>
        <input name="comprimento" id="comprimento" step="1" type="number" class="form-control" placeholder="Comprimento(mm)">
    </div>
    <div class="form-group">
        <label for="largura">Largura(mm):</label>
        <input name="largura" id="largura" step="1" type="number" class="form-control" placeholder="Largura(mm)">
    </div>
    <div class="form-group">
        <label for="largura">Tipo vidro:</label>
        <select class="custom-select tipoVidroSelect" name="tipoVidro">
            @foreach($tiposVidro as $tipoVidro)
                <option value="{{ $tipoVidro->id }}">{{ $tipoVidro->nome }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="largura">Localizaçao:</label>
        <select class="custom-select localizacaoSelect" name="localizacao">
            @foreach($localizacoes as $localizacao)
                <option value="{{ $localizacao->id }}">{{ $localizacao->nome }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="area">Área(m2):</label>
        <input type="number" step="0.01" name="area" id="area" class="form-control" readonly>
    </div>
    <button type="submit" class="btn btn-primary">Adicionar</button>
</form>

@push('select-search')
    <script !src="">
        $(document).ready(function() {
            $('.tipoVidroSelect').select2({theme: 'bootstrap4'});
            $('.localizacaoSelect').select2({theme: 'bootstrap4'});
        });
    </script>
@endpush

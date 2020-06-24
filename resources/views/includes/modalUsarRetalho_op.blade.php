<div class="modal fade" id="modalUsarRetalho" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('usado.store') }}" method="POST" name="usarRetalho">
                    @csrf
                    <input type="hidden" name="id_retalho" id="id_retalho">
                    <div class="form-group">
                        <label for="num_of">Número OF:</label>
                        <input name="num_of" id="num_of" type="text" class="form-control" placeholder="Número OF" value="{{ old('num_of') }}">
                    </div>
                    <div class="form-group">
                        <label for="ref_obra">Referência de obra:</label>
                        <input name="ref_obra" id="ref_obra" step="1" type="number" class="form-control" placeholder="Referência de obra" value="{{ old('ref_obra') }}">
                    </div>
                    <div class="form-group">
                        <label for="comprimento">Comprimento:</label>
                        <input name="comprimento" id="comprimento" step="1" type="number" class="form-control" placeholder="Comprimento" value="{{ old('comprimento') }}">
                    </div>
                    <div class="form-group">
                        <label for="largura">Largura:</label>
                        <input name="largura" id="largura" step="1" type="number" class="form-control" placeholder="largura" value="{{ old('largura') }}">
                    </div>
                    <div class="form-group">
                        <label for="area">Área(m2):</label>
                        <input type="number" step="0.01" name="area" id="area" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="seccao">Secção:</label>
                        <select class="custom-select seccaoSelect" name="seccao">
                            @foreach($seccoes as $seccao)
                                <option value="{{ $seccao->id }}">{{ $seccao->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="obs">Justificação de requisição:</label>
                        <textarea class="form-control" id="obs" name="obs" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button id="btnConfirmarUsar" type="submit" class="btn btn-success">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="d-flex">
    <select class="form-select me-2 type" aria-label="Selecciona una opción">
        <option selected>Selecciona una opción</option>
        <option value="BUY">BUY</option>
        <option value="SHELL">SHELL</option>
    </select>

    <button class="btn btn-primary operacion" data-moneda="{{ $moneda }}" data-valor="{{ $valor }}" data-sl="{{ $sl }}" >Enviar</button>
</div>

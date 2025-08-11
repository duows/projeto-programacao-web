<div>
    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input placeholder="Insira o nome Completo"
            class="form-control @error('name') is-invalid @enderror"
            type="text" name="name" id="name"
            value="{{ $registro->name ?? old('name') }}">
        @error('name')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Descrição</label>
        <input placeholder="Insira a descrição"
            class="form-control @error('description') is-invalid @enderror"
            type="text" name="description" id="description"
            value="{{ $registro->description ?? old('description') }}">
        @error('description')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Data Inicial</label>
        <input placeholder="Insira a data inicial"
            class="form-control @error('dt_start') is-invalid @enderror"
            type="date" name="dt_start" id="dt_start"
            value="{{ $registro->dt_start ?? old('dt_start') }}">
        @error('dt_start')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label" for="ativo">Ativo</label>
        <input class="form-control @error('ativo') is-invalid @enderror"
               type="checkbox" name="ativo" id="ativo"
               value="1" {{ ($registro->ativo ?? old('ativo')) ? 'checked' : '' }}>
        @error('ativo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

@extends('layouts.app')
@section('content')

<div>
    <x-local-sistema titulo="Alteração de Autores" descricao="Alterar registro de autores" url="{{route('autor.index')}}" nomeUrl="Voltar para a listagem de autores" />
    @include('layouts.alert')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tile">
                    <div class="tile-body">
                        <form action="{{route('autor.update', $registro->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @include('autor.__form')
                            <button class="btn btn-primary btn-lg" type="submit">
                                Salvar Alteração do Autor
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
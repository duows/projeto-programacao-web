@extends('layouts.app')
@section('content')

<x-local-sistema titulo="Inclusão de Projeto" descricao="Cadastrar novos projetos" url="{{route('project.index')}}" nomeUrl="Voltar para a listagem de projetos" />
<div class="container">
    @include('layouts.alert')
    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="tile">
                <div class="tile-body">
                    <div>
                        <form action="{{route('autor.store') }}" method="POST">
                            @csrf
                            @include('autor.__form')

                            <button type="submit" class="btn btn-secondary btn-lg">
                                Salvar Cadastro do Autor
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

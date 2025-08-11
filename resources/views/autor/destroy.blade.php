@extends('layouts.app')
@section('content')
<div>
    <x-local-sistema titulo="Exclusão de Autores" descricao="Excluir registro de autores" url="{{route('autor.index')}}" nomeUrl="Voltar para a listagem de autores" />
    <div class="container">
        @include('layouts.alert')
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- <form action="{{route('autor.destroy', $registro->id) }}" method="POST"> -->
                <!-- @csrf
                    @method('DELETE') -->
                <form>
                    @include('autor.__form')
                    <button type="button" class="btn btn-danger btn-lg" data-bs-toggle="modal" data-bs-target="#myModal">
                        Excluir Registro
                    </button>
                </form>
            </div>
            <x-modal-sistema mensagem="Deseja excluir o registro?" url="autor.destroy" id='{{$registro->id}}' metodo="DELETE"/>
        </div>
    </div>
</div>
@endsection
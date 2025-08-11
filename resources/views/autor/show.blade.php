@extends('layouts.app')
@section('content')
<div>
    <x-local-sistema titulo="Consulta de Autores" descricao="Consultar registro de autores" url="{{route('autor.index')}}" nomeUrl="Voltar para a listagem de autores" />
    <div class="container">
    @include('layouts.alert')
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form>
                    @include('autor.__form')
                    <a href="{{ route('autor.index') }}">
                        Cancelar
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
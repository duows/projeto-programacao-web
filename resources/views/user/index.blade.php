@extends('layouts.app')
@section('content')
<div>
    <x-local-sistema titulo="Listagem de Usuários" descricao="Listagem de Usuários cadastrados" url="{{route('dashboard')}}" nomeUrl="Página principal" />
    <div class="container">
        @include('layouts.alert')
        <div class="tile">
            <div class="tile-body">
                <form class="row g-3 align-items-center" action="{('autor.index')}}" method="POST">
                    @csrf
                    <div class="col-6">
                        <div class="input-group">
                            <!-- <div class="input-group-text">@</div> -->
                            <input type="text" class="form-control" id="pesquisar" name="pesquisar" placeholder="Pesquisa" value="{{ isset($filter['pesquisar']) ? isset($filter['pesquisar']) : ''}}">
                        </div>
                    </div>

                    <div class="col-2">
                        <select class="form-select" id="inlineFormSelectPref" name="qtdPorPag">
                            @foreach($pages as $qtdPorPag)
                            <option value="{{$qtdPorPag}}" @if($item==$qtdPorPag) selected @endif>
                                {{$qtdPorPag}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary">
                            Pesquisar
                            <i class="bi bi-search fs-6"></i></button>

                        <a type="button" class="btn btn-warning" href="{{ route('autor.index')}}">
                            Limpar Pesquisa
                            <i class="bi bi-x-circle fs-6"></i>
                        </a>
                    </div>
                </form>

                <br>
                <table class="table table-stripped table-bordered table-hover">
                    <tr class="cabecalho">
                        <th>Nome</th>
                        <!-- <th>Apelido</th>
                        <th>Cidade</th>
                        <th>Bairro</th>
                        <th>CEP</th> -->
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                    <tbody>
                        @foreach($registros as $registro)
                        <tr>
                            <td>{{ $registro->nome }}</td>
                            <td>{{ $registro->email }}</td>
                            <td>{{ $registro->telefone }}</td>
                            <td class="centralizado">
                                <!--rotina para exclusao, edicao e delecao-->
                                <a type="button" class="btn btn-secondary btn-sm" href="{{ route('autor.edit', $registro->id) }}">
                                    <i class="bi bi-pencil-square fs-5"></i>
                                </a>
                                <a type="button" class="btn btn-danger btn-sm" href="{{ route('autor.delete', $registro->id) }}">
                                    <i class="bi bi-trash-fill fs-5"> </i>
                                </a>
                                <a type="button" class="btn btn-info btn-sm" href="{{ route('autor.show', $registro->id) }}">
                                    <i class="bi bi-search fs-5"> </i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div>
                    <!-- class="pagination justify-content-end" -->
                    @if(isset($filter))
                    {!! $registros->appends([
                    'filter' => $filter,
                    'qtdPorPag' => $item
                    ])->links() !!}
                    @else
                    {!! $registros->appends([
                    'qtdPorPag'=> $item
                    ])->links() !!}
                    @endif
                </div>

                <a type="button" class="btn btn-primary btn-lg" href="{{ route('autor.create')}}">Inclusão de novos autores
                    <i class="bi bi-person-add fs-4"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

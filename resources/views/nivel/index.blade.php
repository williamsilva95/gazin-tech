@extends('main')

@section('content')
    <div class="container mt-4">
        <br/>
        <div class="card">
            <div class="card-header text-right">
                <button onClick="inserir();" class="btn btn-primary btn-sm" role="button" data-toggle="modal">Adicionar</button>
            </div>
            <div class="card-body">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <table class="table col-md-12">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">Nível</th>
                            <th scope="col" class="text-center">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($result as $value)
                            <tr>
                                <th scope="row" class="text-center">{{$value->id}}</th>
                                <td class="text-center">{{$value->niveis}}</td>
                                <td class="text-center">
                                    <button onClick="visualizar({{$value->id}})" class="btn btn-success btn-sm mr-3" role="button">Vizualizar</button>
                                    <button onClick="editar({{$value->id}})" class="btn btn-primary btn-sm mr-3" role="button">Editar</button>
                                    <button onClick="deletar('{{ $value->id }}', '{{$value->niveis}}')" class="btn btn-danger btn-sm " role="button">Deletar</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-9 skin-pattern">
                            {!! $result->render(); !!}
                        </div>
                        <div class="col-md-3" style="text-align: right;">
                            <br/>
                            Mostrando {!! $result->firstItem() !!} a {!! $result->lastItem() !!}
                            de {!! $result->total() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts-footer')
    <script type="text/javascript" src="{{ asset('js/app/nivel.js') }}"></script>
@endsection

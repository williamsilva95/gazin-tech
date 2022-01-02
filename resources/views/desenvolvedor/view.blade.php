@extends('main')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 mt-3">
                <div class="card text-center ml-2 mb-5 h-100">
                    <div class="card-header text-uppercase">
                        {{$desenvolvedor->nome}}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Nível: {{$desenvolvedor->nivel}}</h5>
                        <p class="card-text">Data Nascimento: {{date("d-m-Y", strtotime($desenvolvedor->data_nascimento))}}</p>
                        <p class="card-text">Idade: {{$desenvolvedor->idade}}</p>
                        <p class="card-text">Sexo: {{$desenvolvedor->sexo}}</p>
                        <p class="card-text">Hobby: {{$desenvolvedor->hobby}}</p>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <small class="text-muted text-right mr-2">Total Vizualização: {{$desenvolvedor->total_visualizacao}}</small>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{url('/desenvolvedor')}}" type="button" class="btn btn-primary btn-flat btn-sm">Voltar </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts-footer')
    <script type="text/javascript" src="{{ asset('js/app/desenvolvedor.js') }}"></script>
@endsection

@extends('main')

@section('content')
    <div class="container mt-4">
        <br/>
        <div class="card">
            <div class="card-header text-right">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <a href="{{url('/desenvolvedor')}}" class="btn btn-primary btn-sm" role="button">Voltar</a>
                        <button onClick="inserir();" class="btn btn-success btn-sm" role="button" data-toggle="modal">Adicionar</button>
                    </div>
                    <div class="col-md-6">
                        <form class="form-inline my-lg-0 d-flex justify-content-end" action="{{url('pesquisar')}}" method="post">
                            {{csrf_field()}}
                            <input class="form-control mr-sm-2 form-control-sm" type="search" placeholder="Search" aria-label="Search" name="texto">
                            <button class="btn btn-success btn-sm" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($desenvolvedor as $value)
                        <div class="col-md-4 mb-3">
                            <div class="card text-center ml-2 mb-5 h-100">
                                <div class="card-header text-uppercase">
                                    {{$value->nome}}
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Nível: {{$value->nivel}}</h5>
                                    <p class="card-text">Data Nascimento: {{date("d-m-Y", strtotime($value->data_nascimento))}}</p>
                                    <p class="card-text">Hobby: {{$value->hobby}}</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        <small class="text-muted text-left ml-2">{{$value->sexo}}</small>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <small class="text-muted text-right mr-2">{{$value->idade}} Anos</small>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="{{url('desenvolvedor/show/'.$value->id)}}" class="btn btn-success btn-sm mr-3" role="button">Vizualizar</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts-footer')
    <script type="text/javascript" src="{{ asset('js/app/desenvolvedor.js') }}"></script>
@endsection

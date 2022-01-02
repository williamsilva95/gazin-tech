@extends('main')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 mt-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <h4 class="card-title text-center">Nível</h4>
                        <p class="card-text text-center">
                            {{$nivel->nivel}}
                        </p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{url('/nivel')}}" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

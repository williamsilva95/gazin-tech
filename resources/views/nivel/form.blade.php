@extends('main')

@section('content')
    <br><br>
    <div class="mt-5 row d-flex justify-content-center">
        <div class="col-md-5">
        <br/>
        <div class="card">
            <div class="card-header text-center">
                <h5> {{ (isset($nivel)) ? 'Editar' : 'Adicionar' }} Nível</h5>
            </div>
            @if(isset($nivel))
                {!! Form::model($nivel, ['action' => ('NivelController@store'), 'id' => 'form-nivel']) !!}
            @else
                {!! Form::open(['action' => ('NivelController@store'), 'id' => 'form-nivel']) !!}
            @endif
            @if(session('erro'))
                <div class="alert alert-danger">
                    {{session('erro')}}
                </div>
            @endif
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                {!! Form::hidden('id', null) !!}
                <div class="row d-flex justify-content-center">
                    <div class="col-md-10">
                        {!! Form::label('nivel', 'Nível', ['class' => 'required']) !!}
                        {!! Form::text('nivel', isset($nivel) ? $nivel->nivel : null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <br>
                <div class="row d-flex justify-content-center">
                    <a href="{{url('/nivel')}}" type="button" class="btn btn-primary btn-flat btn-sm mr-3">Cancelar </a>
                    <button type="submit" class="sendDisabled btn btn-success btn-sm btn-flat">Salvar</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
        </div>
    </div>
@endsection

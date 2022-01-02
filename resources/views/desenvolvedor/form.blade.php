@extends('main')

@section('content')
    <br><br>
    <div class="mt-5 row d-flex justify-content-center">
        <div class="col-md-5">
            <br/>
            <div class="card">
                <div class="card-header text-center">
                    <h5> {{ (isset($desenvolvedor)) ? 'Editar' : 'Adicionar' }} Desenvolvedor</h5>
                </div>
                @if(isset($desenvolvedor))
                    {!! Form::model($desenvolvedor, ['action' => ('DesenvolvedorController@store'), 'id' => 'form-desenvolvedor']) !!}
                @else
                    {!! Form::open(['action' => ('DesenvolvedorController@store'), 'id' => 'form-desenvolvedor']) !!}
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
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::label('nome', 'Nome', ['class' => 'required']) !!}
                            {!! Form::text('nome', isset($desenvolvedor) ? $desenvolvedor->nome : null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('data_nascimento', 'Data Nascimento', ['class' => 'required']) !!}
                            {!! Form::date('data_nascimento', isset($desenvolvedor) ? $desenvolvedor->data_nascimento : null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('idade', 'Idade', ['class' => 'required']) !!}
                            {!! Form::text('idade', isset($desenvolvedor) ? $desenvolvedor->idade : null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('nivel_id', 'Nível', ['class' => 'required']) !!}
                            {!! Form::select('nivel_id', $nivel, null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('sexo', 'Sexo', ['class' => 'required']) !!}
                            {!! Form::select('sexo', ['Masculino' => 'Masculino', 'Feminino' => 'Feminino', 'Prefiro Não Responder' => 'Prefiro Não Responder'],isset($desenvolvedor) ? $desenvolvedor->sexo : null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::label('hobby', 'Hobby', ['class' => 'required']) !!}
                            {!! Form::text('hobby', isset($desenvolvedor) ? $desenvolvedor->hobby : null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <br>
                    <div class="row d-flex justify-content-center">
                        <a href="{{url('/desenvolvedor')}}" type="button" class="btn btn-primary btn-flat btn-sm mr-3">Cancelar </a>
                        <button type="submit" class="sendDisabled btn btn-success btn-sm btn-flat">Salvar</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

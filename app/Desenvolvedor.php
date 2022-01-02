<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desenvolvedor extends Model
{
    protected $table = 'desenvolvedores';

    protected $fillable = ['nome', 'sexo', 'data_nascimento', 'idade', 'hobby', 'nivel_id'];

    public function rules() {

        return [

            'nome'  => 'required',
            'sexo'=>'required',
            'data_nascimento' => 'required',
            'idade' => 'required',
            'nivel_id' => 'required|not_in:0',
            'hobby' => 'required',


        ];
    }

    public $mensages = [

        'nome.required' => 'Nome não informado.',
        'sexo.required' => 'Sexo não informado.',
        'data_nascimento.required' => 'Data de Nascimento é obrigatório.',
        'idade.required' => 'Idade é obrigatório.',
        'hobby.required' => 'Hobby é obrigatório.',
        'nivel_id.required' => 'Nível não informado.',
        'nivel_id.not_in' => 'Nível não selecionado.',

    ];

    public static function getAllForIndex(){
        return self::leftJoin('niveis','niveis.id','=','desenvolvedores.nivel_id')
            ->select('desenvolvedores.*', 'niveis.nivel')->orderBy('id');
    }
}

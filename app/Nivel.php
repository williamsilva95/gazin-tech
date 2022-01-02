<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
   protected $table = 'niveis';

    protected $fillable = ['nivel'];

    public function rules() {

        return [

            'nivel'  => 'required'


        ];
    }

    public $mensages = [

        'nivel.required' => 'Nível não informado.'

    ];

    public static function getAllForIndex(){
        return self::select('id', 'nivel as niveis')->orderBy('id');
    }
}

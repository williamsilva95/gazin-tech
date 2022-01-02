<?php

namespace App\Http\Controllers;

use App\Nivel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class NivelController extends Controller
{
    function __construct()
    {
        // obriga estar logado;
        $this->middleware('auth');
    }

    public function index(Request $request){
        $nivel = Nivel::getAllForIndex();

        $result = $nivel->paginate('10')->setPath('')->appends($request->query());

        return view('nivel.index', compact('result'));
    }

    public function create(){
        return view('nivel.form');
    }

    public function store(Request $request){
        try {
            $result = DB::transaction(function () use ($request){

                $id = $request->input('id');

                $nivel = Nivel::find($id);

                if (!$nivel){
                    $nivel = new Nivel();
                }

                $validate = validator($request->all(), $nivel->rules(), $nivel->mensages);

                if($validate->fails()){
                    return back()->withErrors($validate);
                }

                $nivel->fill($request->all());

                $nivel->nivel = $request->input('nivel');

                $nivel->save();

                return redirect('/nivel');
            });

            DB::commit();
            return $result;
        }catch (\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function edit(Nivel $nivel){
        return view('nivel.form', compact('nivel'));
    }

    public function show($id)
    {
        $nivel = Nivel::find($id);

        return view('nivel.view', compact('nivel'));
    }

    public function destroy(Request $request){
        try {
            $id = $request->input('id');

            $delete = \DB::table('niveis')->where('id', $id)->delete();

            if ($delete){
                return response()->json(['success' => true, 'msg'=> 'Nível excluído com sucesso.']);
            } else {
                return response()->json(['success' => false, 'msg' => 'Erro ao excluir Nível.']);
            }
        }catch(\Exception $e){
            if ($e->getCode() == 23503){
                return response()->json(['success' => false, 'msg' => 'Não é permitida à exclusão de Nível em uso.']);
            }else {
                return response()->json(['success' => false, 'msg' => 'Não é permitida à exclusão de Nível em uso.']);
            }
        }
    }
}

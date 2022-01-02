<?php

namespace App\Http\Controllers;

use App\Desenvolvedor;
use App\Exports\DesenvolvedoresExport;
use App\Nivel;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DesenvolvedorController extends Controller
{
    function __construct()
    {
        // obriga estar logado;
        $this->middleware('auth');
    }

    public function index(Request $request){
        $desenvolvedor = Desenvolvedor::getAllForIndex();

        $result = $desenvolvedor->paginate('3')->setPath('')->appends($request->query());

        return view('desenvolvedor.index', compact('result'));
    }

    public function create(){

        $nivel = arrayToSelect(Nivel::select('id','nivel')
            ->get()
            ->toArray(), 'id', 'nivel');

        return view('desenvolvedor.form',compact('nivel'));
    }

    public function store(Request $request){
        try {
            $result = DB::transaction(function () use ($request){

                $id = $request->input('id');

                $desenvolvedor = Desenvolvedor::find($id);

                if (!$desenvolvedor){
                    $desenvolvedor = new Desenvolvedor();
                }

                $validate = validator($request->all(), $desenvolvedor->rules(), $desenvolvedor->mensages);

                if($validate->fails()){
                    return back()->withErrors($validate);
                }

                $desenvolvedor->fill($request->all());

                $desenvolvedor->nome = $request->input('nome');
                $desenvolvedor->sexo = $request->input('sexo');
                $desenvolvedor->data_nascimento = $request->input('data_nascimento');
                $desenvolvedor->idade = $request->input('idade');
                $desenvolvedor->hobby = $request->input('hobby');
                $desenvolvedor->nivel_id = $request->input('nivel_id');

                $desenvolvedor->save();

                return redirect('/desenvolvedor');
            });

            DB::commit();
            return $result;
        }catch (\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function edit(Desenvolvedor $desenvolvedor){

        $nivel = arrayToSelect(Nivel::select('id','nivel')
            ->get()
            ->toArray(), 'id', 'nivel');

        return view('desenvolvedor.form', compact('desenvolvedor','nivel'));
    }

    public function show($id)
    {
       $desenvolvedor = Desenvolvedor::leftJoin('niveis','niveis.id','=','desenvolvedores.nivel_id')
        ->where('desenvolvedores.id','=', $id)
           ->select('desenvolvedores.*','niveis.nivel')->first();

        if(Cache::has($id) == false)
        {
            Cache::add($id, 'contador', 0.30);
            $desenvolvedor->total_visualizacao+=1;
            $desenvolvedor->save();
        }

        return view('desenvolvedor.view', compact('desenvolvedor'));
    }

    public function destroy(Request $request){
        try {
            $id = $request->input('id');

            $delete = \DB::table('desenvolvedores')->where('id', $id)->delete();

            if ($delete){
                return response()->json(['success' => true, 'msg'=> 'Desenvolvedor excluído com sucesso.']);
            } else {
                return response()->json(['success' => false, 'msg' => 'Erro ao excluir Desenvolvedor.']);
            }
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function pesquisar(Request $request){
        if($request->input('texto') == false){
            return redirect('/');
        }
        $desenvolvedor = Desenvolvedor::leftJoin('niveis','niveis.id','=','desenvolvedores.nivel_id')
            ->where('nome','like','%'.$request->input('texto').'%')
            ->orWhere('sexo','like','%'.$request->input('texto').'%')
            ->orWhere('data_nascimento','like','%'.$request->input('texto').'%')
            ->orWhere('idade','like','%'.$request->input('texto').'%')
            ->orWhere('hobby','like','%'.$request->input('texto').'%')->get();

        return view('pesquisa',compact('desenvolvedor'));
    }

    public function exportar(Request $request)
    {
        try {
            return $this->exportarExcel($request->all());
        } catch(Exception $exception) {
            return redirect()->back()->with(['alert' => 'danger', 'message' => 'Erro ao exportar planilha']);
        }
    }

    public function exportarExcel()
    {
        // Obtem consulta
        $desenvolvedor = $this->gerarConsultaExportacao()->get();

        // Retorna o resultado da consulta da planilha
        return Excel::download(new DesenvolvedoresExport($desenvolvedor), 'desenvolvedores.xlsx');
    }

    public function gerarConsultaExportacao()
    {
        $query = Desenvolvedor::query()
            ->leftJoin('niveis','niveis.id','=','desenvolvedores.nivel_id')
            ->select([
                'desenvolvedores.id',
                'desenvolvedores.nome',
                'desenvolvedores.sexo',
                'desenvolvedores.idade',
                'desenvolvedores.data_nascimento',
                'desenvolvedores.hobby',
                'desenvolvedores.total_visualizacao',
                'desenvolvedores.created_at',
                'niveis.nivel',
            ]);

        return $query;
    }
}

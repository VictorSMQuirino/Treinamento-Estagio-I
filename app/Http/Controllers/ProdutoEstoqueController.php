<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestProdutoEstoque;

use Illuminate\Http\Request;

use App\ProdutoEstoque;

use Redirect;

// use Illuminate\Support\Facades\Session;
use Session;


class ProdutoEstoqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$produto_estoque = ProdutoEstoque::get();
        //, compact('produto_estoque'))
        return view('ProdutoEstoque.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ProdutoEstoque.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $produto_estoque = new ProdutoEstoque();
            $produto_estoque->titulo = $request->titulo_produto;
            $produto_estoque->valor = $request->valor_produto;
            $produto_estoque->volume = $request->volume_tipo;
            $produto_estoque->descricao = $request->descricao_produto;

            DB::transaction(function() use ($produto_estoque) {
                $produto_estoque->save();
            });

            Session::flash('mensagem','Produto criado!');
            return Redirect::to('/produto-estoque');
        } catch(\Exception $error){
            Sesion::flash('mensagem', 'ih nem deu, tenta de novo mais tarde');
            return back()->withInput(); //Retorna a tela com os valores nos inputs
        }
        /*dd($request->titulo);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto_estoque = ProdutoEstoque::get();
        return Datatables::of($produto_estoque) 
        ->editColumn('acao', function ($produto_estoque) {  
            return '
                    <div class="btn-group btn-group-sm">
                        <a href="/produto-estoque/'.$produto_estoque->id.'/edit"
                            class="btn btn-info"
                            title="Editar" data-toggle="tooltip">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="#"
                            class="btn btn-danger btnExcluir"
                            data-id="'.$produto_estoque->id.'"
                            title="Excluir" data-toggle="tooltip">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>';
          })
          ->editColumn('estoque', function ($produto_estoque) {
                return $produto_estoque->valor_estoque();
            })
          ->escapeColumns([0])
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto_estoque = ProdutoEstoque::find($id);
        return view('ProdutoEstoque.edit', compact('produto_estoque'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto_estoque = ProdutoEstoque::find($id);
        $produto_estoque->titulo = $request->titulo_produto;
        $produto_estoque->valor = $request->valor_produto;
        $produto_estoque->volume = $request->volume_produto;
        $produto_estoque->descricao = $request->descricao_produto;

        $produto_estoque->save();

        return Redirect::to('/produto-estoque');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $produto_estoque = ProdutoEstoque::find($id);
            $produto_estoque->delete();
            return response()->json(array('status' => "OK"));
        } catch(\Exception $erro){
            return reponse()->json(array('erro'=>"ERRO"));
        }

        //return Redirect::to('/produto-estoque');
    }
}

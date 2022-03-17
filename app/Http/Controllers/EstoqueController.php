<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProdutoEstoque;
use App\Estoque;
use Redirect;

class EstoqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estoque = Estoque::get();
        return view('Estoque.index', compact('estoque'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produto_estoque = ProdutoEstoque::get();
        return view('Estoque.create', compact('produto_estoque'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estoque = new Estoque();
        $estoque->fk_produto_estoque = $request->produto;
        $estoque->quantidade = $request->quantidade;
        $estoque->flag = $request->tipo;
        
        $estoque->save();

        //return $request->tipo." cadastrada com sucesso.";

        return Redirect::to('/estoque');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estoque = Estoque::find($id);
        $produto_estoque = ProdutoEstoque::get();
        return view('Estoque.edit', compact('produto_estoque','estoque'));
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
        $estoque = Estoque::find($id);
        $estoque->fk_produto_estoque = $request->produto;
        $estoque->quantidade = $request->quantidade;
        $estoque->flag = $request->tipo;

        $estoque->save();

        return Redirect::to('/estoque/'.$estoque->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estoque = Estoque::find($id);
        $estoque->delete();

        return Redirect::to('/estoque');
    }
}

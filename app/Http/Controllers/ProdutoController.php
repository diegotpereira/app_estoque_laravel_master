<?php

namespace App\Http\Controllers;

use App\Models\Produto;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class ProdutoController extends Controller
{
    //
    public function pesquisar()
    {
        $descricao = Input::get('descricao');

        $produtos = Produto::where('descricao', 'like', '%'.$descricao.'%')->get();

        return view('produto.pesquisar')->with('produtos', $produtos);
    }
    // metodo inserir na tabela
    public function mostrar_inserir()
    {
        return view('produto.inserir');
    }
    // função inserir produto
    public function inserir(Request $request)
    {
        $produto = new Produto();

        $produto->descricao = Input::get('descricao');
        $produto->quantidade = Input::get('quantidade');
        $produto->valor = Input::get('valor');
        $produto->data_vencimento = Input::get('data_vencimento');

        $produto->save();

        $mensagem = "Produto inserido com sucesso";

        return view('produto.inserir')->with('mensagem', $mensagem);
    }
}

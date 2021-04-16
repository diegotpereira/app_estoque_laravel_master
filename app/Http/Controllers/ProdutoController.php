<?php

namespace App\Http\Controllers;

use App\Models\Produto;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpKernel\Event\ViewEvent;

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
    // função para chamada de template de alteração
    public function mostrar_alterar($id)
    {
        $produto = Produto::find($id);

        return view('produto.alterar')->with('produto', $produto);
    }
    public function alterar()
    {
        $id = Input::get('id');
        $p = Produto::find($id);

        $p->descricao = Input::get('descricao');
        $p->quantidade = Input::get('quantidade');
        $p->valor = Input::get('valor');
        $p->data_vencimento = Input::get('data_vencimento');

        $p->save();

        $mensagem = "Produto alterado com sucesso!.";
        $produtos = Produto::all();

        return view('produto.pesquisar')->with('mensagem', '$mensagem')->with('produtos', $produtos);
    }
    public function excluir($id)
    {
        $produto = Produto::find($id);

        $produto->delete();

        $mensagem = "Produto excluído com sucesso!.";

        $produtos = Produto::all();

        return view('produto.pesquisar')->with('mensagem', $mensagem)->with('produtos', $produtos);
    }
}

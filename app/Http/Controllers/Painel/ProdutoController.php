<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Painel\ProductFormRequest;
use Illuminate\Http\Request;
use App\Models\Painel\Product;

class ProdutoController extends Controller
{
    private $product;
    private $totalPage = 3;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $title = 'Listagem dos produtos';

        // $products = $this->product->all();
        $products = $this->product->paginate($this->totalPage);

        return view('painel.products.index', compact('products', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar Novo Produto';
        $categorys = ['eletronicos', 'moveis', 'limpeza', 'banho'];

        return view('painel.products.create-edit', compact('title', 'categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        // dd($request->all());
        // dd serve para a gente ver o que a request tá retornando e debugar a aplicação
        // dd($request->only(['name', 'number']));
        // dd($request->except(['name', 'number']));
        // dd($request->input('name'));

        // pega todos os dados que vem do formulário
        $dataForm = $request->all();

        $dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1;

        // valida os dados
        // $this->validate($request, $this->product->rules);

        /*
        $messages = [
            'name.required' => 'O campo nome é de preenchimento obrigatório',
            'name.min' => 'O número mínimo de caracteres do campo nome é 3',
            'name.max' => 'O número máximo de caracteres do campo nome é 100',
            'number.numeric' => 'O campo número só aceita números',
            'number.required' => 'O campo número é de preenchimento obrigatório',
            'category.required' => 'O campo de categoria é de preenchimento obrigatório',
            'description.required' => 'O campo nome é de preenchimento obrigatório',
            'description.min' => 'O número mínimo de caracteres do campo descrição é 3',
            'description.max' => 'O número máximo de caracteres do campo descrição é 1000',
        ];

        $validate = validator($dataForm, $this->product->rules, $messages);
        if($validate->fails()) {
            return redirect()->back()
            ->withErrors($validate)
            ->withInput();
        }
        */

        // faz o cadastro
        $insert = $this->product->create($dataForm);

        if ($insert)
            return redirect()->route('listaProdutos');
        else
            return redirect()->back();

        return 'Cadastrando...';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product->find($id);

        $title = "Produuto: {$product->name}";

        return view('painel.products.show', compact('product', 'title'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Recupera o produto pelo seu id
        $product = $this->product->find($id);

        $title = "Editar Produto: {$product->name}";

        $categorys = ['eletronicos', 'moveis', 'limpeza', 'banho'];

        return view('painel.products.create-edit', compact('title', 'categorys', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id)
    {
        // recupera todos os dados do formulário
        $dataForm = $request->all();

        // recupera o item para editar
        $product = $this->product->find($id);

        // verifica se o produto está ativado
        $dataForm['active'] = (!isset($dataForm['active'])) ? 0 :  1;

        // altera os itens
        $update = $product->update($dataForm);

        // verifica se realmente editou
        if($update)
            return redirect()->route('listaProdutos');
        else
            return redirect()->back()->with(['errors' => 'Falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->find($id);

        $delete = $product->delete();

        if($delete)
            return redirect()->route('listaProdutos');
        else
            return redirect()->route('listaProduto', $id)->with(['errors' => 'Falha ao deleter']);
    }

    public function tests()
    {
        /*
        CREATE
        $prod = $this->product;
        $prod->name = 'Nome do produto';
        $prod->number = 123456;
        $prod->active = true;
        $prod->category = 'eletronicos';
        $prod->description = 'Descrição do produto aqui';
        $insert = $prod->save();

        if ($insert)
            return 'Inserido com sucesso';
        else
            return 'Falha ao inserir';
        */

        /*
        $insert = $this->product->create([
            'name' => 'Shampoo',
            'number' => 789123,
            'active' => true,
            'category' => 'banho',
            'description' => 'Shampoo top',
        ]);
        if ($insert)
            return "Inserido com sucesso, ID: {$insert->id}";
        else
            return 'Falha ao inserir';
        */

        /*
        UPDATE
        $prod = $this->product->find(8);
        $prod->name = 'Produto Atualizado';
        $prod->number = 987654;
        $prod->active = true;
        $prod->category = 'eletronicos';
        $prod->description = 'Desc update';
        $update = $prod->save();

        if( $update )
           return 'Alterado com sucesso!';
        else
            return 'Falha ao alterar!';
        */

        /*
        UPDATE MELHORADO
        $prod =$this->product->find(9);
        $update = $prod->update([
            'name' => 'Update test',
            'number' => 852963,
            'active' => false,
        ]);

        if( $update )
            return 'Alterado com sucesso!';
        else
            return 'Falha ao alterar!';
        */

        /*
        UPADTE PELO NUMERO
        $prod =$this->product->where('number', 852963);
        $update = $prod->update([
            'name' => 'atualizando pelo numero',
            'number' => 456456,
            'active' => true,
        ]);

        if( $update )
            return 'Alterado com sucesso pelo numero!';
        else
            return 'Falha ao alterar!';
        */

        /*
        DELETE
        $prod = $this->product->find(2);
        $delete = $prod->delete();

        if($delete)
            return 'Deletado com sucesso!';
        else
            return 'Falha ao deletar!';
        */

        /*
        DELETE PELO NUMERO COM WHERE
        $delete = $this->product->where('number', 456456)->delete();

        if($delete)
            return 'Deletado com sucesso pelo numero!';
        else
            return 'Falha ao deletar!';
        */
    }
}

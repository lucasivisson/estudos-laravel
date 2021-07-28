@extends('painel.templates.template')

@section('content')

<h1 class="title-pg">Listagem dos produtos</h1>

<a href="{{route('criacaoDeProdutos')}}" class="btn btn-primary btn-add">
    <i class="fas fa-plus"></i>
    Cadastrar
</a>

<table class="table table-striped">
    <tr>
        <td>Nome</td>
        <td>Descrição</td>
        <td width="100px">Ações</td>
    </tr>
    @foreach($products as $product)
    <tr>
        <td>{{$product->name}}</td>
        <td>{{$product->description}}</td>
        <td>
            <a href="{{route('editaProdutos', $product->id)}}" class="edit actions">
                <i class="fas fa-pencil-alt"></i>
            </a>
            <a href="{{route('listaProduto', $product->id)}}" class="delete actions">
                <i class="fas fa-eye"></i>
            </a>
        </td>
    </tr>
    @endforeach
</table>

{!! $products->links() !!}

@endsection()

@extends('painel.templates.template')

@section('content')

<h1 class="title-pg">
    <a href="{{route('listaProdutos')}}">
        <i class="fas fa-arrow-left"></i>
    </a>
    Produto: <b>{{$product->name}}</b>
</h1>
<p><b>Ativo:</b> {{$product->active}}</p>
<p><b>Número:</b> {{$product->number}}</p>
<p><b>Categoria:</b> {{$product->category}}</p>
<p><b>Descrição:</b> {{$product->description}}</p>

@if( isset($errors) && count($errors) > 0 )
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    </div>
@endif

<form class="form" method="POST" action="{{route('deletaProduto', $product->id)}}">
    {!! csrf_field() !!}
    {!!method_field('DELETE')!!}
    <div class="form-group">
        <input type="submit" value="Excluir Produto" class="btn btn-danger"></button>
    </div>

@endsection

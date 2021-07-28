@extends('painel.templates.template')

@section('content')

<h1 class="title-pg">
    <a href="{{route('listaProdutos')}}">
        <i class="fas fa-arrow-left"></i>
    </a>
    Gestão produto: <b>{{$product->name ?? 'Novo'}}</b>
</h1>

<!-- quando a aplicação tem algum erro no formulário enviado, é retornado uma variável
chamada errors, por isso estamos coletando ela logo abaixo -->
@if( isset($errors) && count($errors) > 0 )
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    </div>
@endif

@if(isset($product))
    <form class="form" method="post" action="{{route('atualizaProdutos', $product->id)}}">
    {!!method_field('PUT')!!}
@else
    <form class="form" method="post" action="{{route('envioFormProdutos')}}">
@endif
    <!-- Esse token serve para validar que o form é u form seguro enviado realmente por um
    usuário normal para proteger o sistema do ataqu csrf
    <input type="hidden" name="token" value="{{csrf_token()}}"> ou -->
    {!! csrf_field() !!}
    <div class="form-group">
        <input type="text" name="name" placeholder="Nome:" class="form-control" value="{{$product->name ?? old('name')}}">
    </div>
    <div class="form-group">
        <label>
            <input type="checkbox" name="active" value="1"
            @if(isset($product) && $product->active == '1')
                checked
            @endif>
            Ativo?
        </label>
    </div>
    <div class="form-group">
        <input type="text" name="number" placeholder="Número:" class="form-control" value="{{$product->number ?? old('number')}}">
    </div>
    <div class="form-group">
        <select name="category" class="form-control">
            <option disabled selected style="display: none">Selecione uma categoria</option>
            @foreach($categorys as $category)
            <option value="{{$category}}"
            @if(isset($product) && $product->category == $category)
                selected
            @endif
            >{{$category}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <textarea name="description" placeholder="Descrição" class="form-control" >{{$product->description ?? old('description')}}</textarea>
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Enviar</button>
    </div>
</form>

@endsection

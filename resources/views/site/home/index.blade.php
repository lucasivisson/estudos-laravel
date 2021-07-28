@extends('site.templates.template1')

@section('content')
<h1>Home Page do Site</h1>
{{ $xss }}

@if ( $var1 == '1234' )
    <p>é igual</p>
@else
    <p>é diferente</p>
@endif

@unless ( $var1 == 1234 )
    <p>não é igual</p>

@endunless

@for ($i = 0; $i < 10; $i++ )
    <p>Valor: {{$i}}</p>
@endfor

{{--
@if (count($arrayData) > 0)
    @foreach($arrayData as $array)
        <p>Foreach: {{$array}}</p>
    @endforeach
@else
    <p>Não existe itens para serem impressos</p>
@endif
--}}

@forelse($arrayData as $array)
    <p>Forelse: {{$array}}</p>
@empty
    <p>Não existe itens para ser impresso</p>
@endforelse

@include('site.includes.sidebar', compact('var1'))

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endpush

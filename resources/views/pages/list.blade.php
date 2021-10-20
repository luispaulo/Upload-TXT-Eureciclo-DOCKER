@extends('layouts.layout')

@section('content')

    {{--    SUCESS FILE --}}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    {{--    ERRORS FILE --}}
    @isset($errors)
        @if ($errors->has('file'))
            @foreach($errors->get('file') as $erro)
                <div class="alert alert-danger">
                    {{ $erro }}
                </div>
            @endforeach
        @endif
        @if ($errors->has('error'))
            <div class="alert alert-danger">
                {{ $errors->get('error')[0] }}
            </div>
        @endif
    @endisset


    <h1 align="center">UPLOAD DE ARQUIVOS DA SUA VENDA</h1>

    <form class="form-upload" action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <input class="form-control" type="file" name="file" id="file" required accept="">
            <label for="file" class="form-label">Escolha um arquivo TXT ou CSV:</label>
        </div>

        <input class="btn btn-outline-primary submit" type="submit" value="Enviar">
    </form>
    @if ($vendas)
        <table class="table">
            <thead>
            <tr>
                <th>Comprador</th>
                <th>Descrição</th>
                <th>Preço Unitário</th>
                <th>Quantidade</th>
                <th>Endereço</th>
                <th>Fornecedor</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($vendas as $venda)
                <tr>
                    <td>{{$venda->comprador}}</td>
                    <td>{{$venda->descricao}}</td>
                    <td>{{$venda->preco_unitario}}</td>
                    <td>{{$venda->qtd}}</td>
                    <td>{{$venda->endereco}}</td>
                    <td>{{$venda->fornecedor}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection


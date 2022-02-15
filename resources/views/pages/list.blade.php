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


    <h1 align="center">UPLOAD YOUR SALE FILES</h1>

    <form class="form-upload" action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <input class="form-control" type="file" name="file" id="file" required accept="">
            <label for="file" class="form-label">Choose a TXT or CSV file:</label>
        </div>

        <input class="btn btn-outline-primary submit" type="submit" value="Send">
    </form>
    @if ($sales)
        <table class="table">
            <thead>
            <tr>
                <th>Buyer</th>
                <th>Description</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Address</th>
                <th>Supplier</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{$sale->buyer}}</td>
                    <td>{{$sale->duescription}}</td>
                    <td>{{$sale->unit_price}}</td>
                    <td>{{$sale->quantity}}</td>
                    <td>{{$sale->address}}</td>
                    <td>{{$sale->supplier}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection

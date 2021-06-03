@extends('app')

@section('content')
    <form method="POST" action="/special-price">
    @csrf

        <div class="mb-4">

            <label for="nip">NIP</label>
            <select name="NIP_number">
                @foreach($contractor as $contr_nip)
                    <option name="{{$contr_nip->NIP}}" value="{{$contr_nip->NIP}}">{{$contr_nip->NIP}}, {{$contr_nip->name_company}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="name">Nazwa produktu</label>
            <select name="id_products">
                @foreach($products as $prod)
                    <option value="{{$prod->id}}" name="{{$prod->id}}">{{$prod->name}}</option>
                @endforeach
            </select>

        </div>

        <div class="mb-4">
            <label for="net_price">Cena netto</label>
            <input name="net_price">
        </div>

        <div class="mb-4">
            <label for="quantity">Ilość</label>
            <input name="quantity">
        </div>


        <div class="mb-4">
            <a class="btn btn-primary" href="/special-price">
                Powrót
            </a>&nbsp;
            <button class="btn btn-primary">Dodaj cenę do kontrahenta</button>

        </div>
    </form>
@endsection

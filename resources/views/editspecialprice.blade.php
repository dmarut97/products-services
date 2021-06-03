@extends('app')

@section('content')
    <form method="POST" action="/special-price/{{$special_price->id_special_price}}">
        @method('PUT')
        @csrf
        <input name="NIP_number" value="{{$special_price->NIP_number}}" hidden>
        <div class="mb-4">
            <label for="name_company">Nazwa firmy</label>
            @foreach($special_price->contractor as $contr)
                <input name="name_company" value="{{$contr->name_company}}" disabled>
            @endforeach
        </div>
        <div class="mb-4">
            <label for="name">Nazwa produktu</label>
            <select name="id_products">
                @foreach($products as $prod)
                    <option value="{{$prod->id}}" name="{{$prod->id}}"{{$prod->id == $special_price->id_products ? 'selected':''}}>{{$prod->name}}</option>
                @endforeach
            </select>

        </div>

        <div class="mb-4">
            <label for="net_price">Cena netto</label>
            <input name="net_price" value="{{$special_price->net_price}}">
        </div>

        <div class="mb-4">
            <label for="quantity">Ilość</label>
            <input name="quantity" value="{{$special_price->quantity}}">
        </div>


        <div class="mb-4">
            <a class="btn btn-primary" href="/special-price">
                Powrót
            </a>&nbsp;
            <button class="btn btn-primary">Edytuj</button>

        </div>
    </form>


@endsection

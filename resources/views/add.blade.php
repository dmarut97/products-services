@extends('app')

@section('content')
    <form action="/products" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nazwa">Nazwa</label>
            <input name="name">
        </div>

        <div class="mb-4">
            <label for="category">Kategoria</label>
            <select name="category">
                @foreach($category as $categories)
                    <option value="{{$categories->id_category}}" name="{{$categories->id_category}}">{{$categories->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="producer">Producent</label>
            <select name="producer">
                @foreach($producer as $producers)
                    <option value="{{$producers->id_producer}}" name="{{$producers->id_producer}}">{{$producers->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="gross_price">Cena brutto</label>
            <input name="gross_price">
        </div>

        <div class="mb-4">
            <label for="percent_VAT">Procent VAT</label>
            <input name="percent_VAT">
        </div>

        <div class="mb-4">
            <label for="quantity">Ilość</label>
            <input name="quantity">
        </div>

        <div class="mb-4">
            <label for="description">Opis</label>
            <textarea name="description"></textarea>
        </div>


        <div class="mb-4">
            <a class="btn btn-primary" href="/products">
                Powrót
            </a>&nbsp;
            <button class="btn btn-primary">Dodaj</button>

        </div>

    </form>
@endsection

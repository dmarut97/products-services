@extends('app')

@section('content')
    <form method="POST" action="/products/{{$products->id}}">
        @method('PUT')
        @csrf
        <div class="mb-4">
            <label for="nazwa">Nazwa</label>
            <input name="name" value="{{$products->name}}">
        </div>

        <div class="mb-4">
            <label for="category">Kategoria</label>
            <select name="category">
                @foreach($category as $categories)
                    <option value="{{$categories->id_category}}" name="{{$categories->id_category}}"{{$categories->id_category == $products->id_category ? 'selected':''}}>{{$categories->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="producer">Producent</label>
            <select name="producer">
                @foreach($producer as $producers)
                    <option value="{{$producers->id_producer}}" name="{{$producers->id_producer}}"{{$producers->id_producer == $products->id_producer ? 'selected':''}}>{{$producers->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="gross_price">Cena brutto</label>
            <input name="gross_price" value="{{$products->gross_price}}">
        </div>

        <div class="mb-4">
            <label for="percent_VAT">Procent VAT</label>
            <input name="percent_VAT" value="{{$products->percent_VAT}}">
        </div>

        <div class="mb-4">
            <label for="quantity">Ilość</label>
            <input name="quantity" value="{{$products->quantity}}">
        </div>

        <div class="mb-4">
            <label for="description">Opis</label>
            <textarea name="description">{{$products->description}}</textarea>
        </div>


        <div class="mb-4">
            <a class="btn btn-primary" href="/products">
                Powrót
            </a>&nbsp;
            <button class="btn btn-primary">Edytuj</button>

        </div>
    </form>


@endsection

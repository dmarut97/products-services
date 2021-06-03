@extends('app')

@section('content')
    <div class="add">
        <a class="btn btn-primary" href="/products/add">Dodaj produkt</a>
        <a class="btn btn-primary" href="/special-price">Ceny specjalne</a>
        <a class="btn btn-primary" href="/services">Usługi</a>
        <a class="btn btn-primary" href="/reservation">Rezerwacje</a>
        
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif
    <table class="products-table">
        <tbody>
        <tr>
            <th>
                Nazwa produktu
            </th>
            <th>
                Kategoria
            </th>
            <th>
                Producent
            </th>
            <th>
                Cena netto
            </th>
            <th>
                Cena brutto
            </th>
            <th>
                Procent VAT
            </th>
            <th>
                Ilość
            </th>
            <th>
                Opis
            </th>
            <th>
                Akcja
            </th>
            </tr>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category_name }}</td>
                    <td>{{ $product->producer_name }}</td>
                    <td>{{ $product->net_price }}</td>
                    <td>{{ $product->gross_price }}</td>
                    <td>{{ $product->percent_VAT }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->description }}</td>
                    <td><a href="/products/{{$product->id}}/edit">Edytuj</a>
                        <a href="/products/{{$product->id}}/delete">Usuń</a></td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>
                    Nazwa produktu
                </th>
                <th>
                    Kategoria
                </th>
                <th>
                    Producent
                </th>
                <th>
                    Cena netto
                </th>
                <th>
                    Cena brutto
                </th>
                <th>
                    Procent VAT
                </th>
                <th>
                    Ilość
                </th>
                <th>
                    Opis
                </th>
                <th>
                    Akcja
                </th>
            </tr>
        </tfoot>
    </table>


@endsection

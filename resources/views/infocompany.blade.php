@extends('app')

@section('content')

    <a class="btn btn-primary" href="/special-price">Powrót</a>

    <br><br>
    Informacje o fimie<br/><br/>
    <table class="info-table">
        <tbody>
        <tr>
            <th>
                NIP
            </th>
            <th>
                Nazwa firmy
            </th>
            <th>
                Imię
            </th>
            <th>
                Nazwisko
            </th>
            <th>
                Adres
            </th>
        </tr>
        <tbody>
        <tr>
            <td>{{$info->NIP}}</td>
            <td>{{$info->name_company}}</td>
            <td>{{$info->name}}</td>
            <td>{{$info->surname}}</td>
            <td>{{$info->adress}}</td>
        </tr>



        </tbody>
        <tfoot>
        <tr>
            <th>
                NIP
            </th>
            <th>
                Nazwa firmy
            </th>
            <th>
                Imię
            </th>
            <th>
                Nazwisko
            </th>
            <th>
                Adres
            </th>
        </tr>
        </tfoot>
    </table><br><br>


    Informacje o specjalnych cenach kontrahenta<br/><br/>
    <table class="special-price-table">
        <tbody>
        <tr>

            <th>
                Nazwa produktu
            </th>
            <th>
                Cena netto
            </th>
            <th>
                Ilość
            </th>
        </tr>
        <tbody>

        @foreach($products as $special)
            <tr>

                <td>@foreach($special->products as $prod)
                        {{$prod->name}}
                    @endforeach
                </td>
                <td>{{$special->net_price}}</td>
                <td>{{$special->quantity}}</td>

            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>

            <th>
                Nazwa produktu
            </th>
            <th>
                Cena netto
            </th>
            <th>
                Ilość
            </th>
        </tr>
        </tfoot>
    </table>
@endsection

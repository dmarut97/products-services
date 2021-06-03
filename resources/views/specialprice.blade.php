@extends('app')

@section('content')
    <div class="add">
        <a class="btn btn-primary" href="/products">Powrót</a>
        <a class="btn btn-primary" href="/special-price/add">Dodaj specjalną cenę</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{$message}}</p>
        </div>
    @endif

    <div class="info-company">

        <form action="/special-price/info-company" method="POST" role="form">
            @csrf
            Wyszukaj informacje o firmie:
            <select name="NIP_number">
                @foreach($contractor as $contr_nip)
                    <option name="{{$contr_nip->NIP}}" value="{{$contr_nip->NIP}}">{{$contr_nip->NIP}}, {{$contr_nip->name_company}}</option>
                @endforeach
            </select>
            <button class="btn btn-primary">Szukaj</button>
        </form>
    </div>
    <table class="special-price-table">
        <tbody>
        <tr>
            <th>
                Numer NIP
            </th>
            <th>
                Nazwa firmy
            </th>
            <th>
                Nazwa produktu
            </th>
            <th>
                Cena netto
            </th>
            <th>
                Ilość
            </th>
            <th>
                Akcja
            </th>
        </tr>
        <tbody>
        @foreach($special_price as $special)
            <tr>
                <td>{{$special->NIP_number}}</td>
                <td>@foreach($special->contractor as $contr)
                        {{$contr->name_company}}
                    @endforeach
                </td>
                <td>@foreach($special->products as $prod)
                        {{$prod->name}}
                    @endforeach
                </td>
                <td>{{$special->net_price}}</td>
                <td>{{$special->quantity}}</td>

                <td><a href="/special-price/{{$special->id_special_price}}/edit">Edytuj</a>
                    <a href="/special-price/{{$special->id_special_price}}/delete">Usuń</a></td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>
                Numer NIP
            </th>
            <th>
                Nazwa firmy
            </th>
            <th>
                Nazwa produktu
            </th>
            <th>
                Cena netto
            </th>
            <th>
                Ilość
            </th>
            <th>
                Akcja
            </th>
        </tr>
        </tfoot>
    </table>

@endsection

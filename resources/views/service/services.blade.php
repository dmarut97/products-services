@extends('app')

@section('content')
    <div class="add">
        <a class="btn btn-primary" href="/products">Powrót</a>
        <a class="btn btn-primary" href="/services/add">Dodaj nową usługę</a>
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

    <table class="special-price-table">
        <tbody>
        <tr>
            <th>
                Nazwa usługi
            </th>
            <th>
                Cena netto
            </th>
            <th>
                Procent VAT
            </th>
            <th>
                Opis
            </th>
            <th>
                Akcja
            </th>
        </tr>
        <tbody>
        @foreach($services as $service)
            <tr>
                <td>{{$service->name}}</td>
                <td>{{$service->net_price}}
                </td>
                <td>{{$service->percent_VAT}}
                </td>
                <td>{{$service->description}}</td>

                <td>
                    <a href="/services/{{$service->id_services}}/reservation">Rezerwuj</a>
                    <a href="/services/{{$service->id_services}}/edit">Edytuj</a>
                    <a href="/services/{{$service->id_services}}/delete">Usuń</a></td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>
                Nazwa usługi
            </th>
            <th>
                Cena netto
            </th>
            <th>
                Procent VAT
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

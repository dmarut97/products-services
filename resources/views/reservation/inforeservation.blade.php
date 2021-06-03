@extends('app')

@section('content')

    <a class="btn btn-primary" href="/products">Powrót</a>

    <br><br>
    Informacje o rezerwacji<br/><br/>
    <table class="info-table">
        <tbody>
        <tr>
            <th>
                Nazwa usługi
            </th>
            <th>
                Imię
            </th>
            <th>
                Numer telefonu
            </th>
            <th>
                Data rezerwacji
            </th>
            <th>
                Godzina rezerwacji
            </th>
            <th>
                Akcja
            </th>
        </tr>
        <tbody>
        @foreach($info as $inf)
        <tr>
        
            @foreach($products as $prod )
            @if($prod->id_services == $inf->id_services)
              <td>{{ $prod->name}}</td>
              @endif
            @endforeach

            <td>{{$inf->name}}</td>
            <td>{{$inf->phone_number}}</td>
            <td>{{$inf->date_reservation}}</td>
            <td>{{$inf->time_reservation}}</td>
            <td><a href="/reservation/{{$inf->id_reservation}}/delete">Usuń</a></td>
          
            
        </tr>
        @endforeach


        </tbody>
        <tfoot>
        <tr>
            <th>
                Nazwa usługi
            </th>
            <th>
                Imię
            </th>
            <th>
                Numer telefonu
            </th>
            <th>
                Data rezerwacji
            </th>
            <th>
                Godzina rezerwacji
            </th>
            <th>
                Akcja
            </th>
        </tr>
        </tfoot>
    </table><br><br>


@endsection

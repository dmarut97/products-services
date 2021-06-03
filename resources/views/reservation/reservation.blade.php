@extends('app')

@section('content')
    <form method="POST" action="/reservations">
    @csrf

        <input name="id_services" value="{{$id}}" hidden>
        <div class="mb-4">
          <label for="names">Nazwa usługi</label>
          <input name="names" value="{{$services->name}}" disabled>
        </div>

        <div class="mb-4">
            <label for="name">Imię</label>
            <input name="name">
        </div>

        <div class="mb-4">
            <label for="phone_number">Numer telefonu</label>
            <input name="phone_number">
        </div>

        <div class="mb-4">
            <label for="date_reservation">Data rezerwacji</label>
            <input type="date" name="date_reservation">
        </div>

        <div class="mb-4">
            <label for="time_reservation">Godzina rezerwacji</label>
            <input type="time" name="time_reservation">
        </div>

        <div class="mb-4">
            <a class="btn btn-primary" href="/services">
                Powrót
            </a>&nbsp;
            <button class="btn btn-primary">Dodaj rezerwacje</button>

        </div>
    </form>
@endsection

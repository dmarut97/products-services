@extends('app')

@section('content')
    <div class="add">
        <a class="btn btn-primary" href="/products">Powrót</a>
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

        <form action="/reservations/info" method="POST" role="form">
            @csrf
           
            Podaj numer telefonu: <input type="text" name="phone_number">
            
            <button class="btn btn-primary">Szukaj</button>
        </form>
    </div>
    

@endsection

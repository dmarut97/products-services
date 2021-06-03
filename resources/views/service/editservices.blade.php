@extends('app')

@section('content')
    <form method="POST" action="/services/{{$services->id_services}}">
        @method('PUT')
        @csrf
        <input name="id_services" value="{{$services->id_services}}" hidden>
        <div class="mb-4">
            <label for="name">Nazwa usługi</label>
            <input name="name" value="{{$services->name}}" disabled>
            
        </div>
        
        <div class="mb-4">
            <label for="net_price">Cena netto</label>
            <input name="net_price" value="{{$services->net_price}}">
        </div>

        <div class="mb-4">
            <label for="percent_VAT">Procent VAT</label>
            <input name="percent_VAT" value="{{$services->percent_VAT}}">
        </div>

        <div class="mb-4">
            <label for="description">Description</label>
            <input name="description" value="{{$services->description}}">
        </div>



        <div class="mb-4">
            <a class="btn btn-primary" href="/services">
                Powrót
            </a>&nbsp;
            <button class="btn btn-primary">Edytuj</button>

        </div>
    </form>


@endsection

@extends('app')

@section('content')
    <form method="POST" action="/services">
    @csrf

        <div class="mb-4">
            <label for="name">Nazwa usługi</label>
            <input name="name">
            
        </div>
        
        <div class="mb-4">
            <label for="net_price">Cena netto</label>
            <input name="net_price">
        </div>

        <div class="mb-4">
            <label for="percent_VAT">Procent VAT</label>
            <input name="percent_VAT">
        </div>

        <div class="mb-4">
            <label for="description">Opis</label>
            <input name="description">
        </div>



        <div class="mb-4">
            <a class="btn btn-primary" href="/services">
                Powrót
            </a>&nbsp;
            <button class="btn btn-primary">Dodaj usługę</button>

        </div>
    </form>
@endsection

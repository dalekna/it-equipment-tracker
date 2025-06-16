@extends('layouts.custom')

@section('content')
<div style="
        display: flex;
        justify-content: flex-end;
        align-items: center;
    ">
        <a href="{{ route('rent.my') }}" style="
            background-color: #FAED26;
            color: black;
            font-weight: bold;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
        ">
            🗂 Peržiūrėti užsakymus
        </a>
    </div>

    <h1>Galimos nuomai prekės</h1>

    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
  @foreach ($vienetai as $vienetas)
    <div style="border: 1px solid #ccc; padding: 10px; width: 250px;">
        <h3>{{ $vienetas->dalis->pavadinimas }}</h3>
        <p><strong>Kategorija:</strong> {{ $vienetas->dalis->kategorija->pavadinimas }}</p>
        <p><strong>Gamintojas:</strong> {{ $vienetas->dalis->gamintojas->pavadinimas }}</p>
        <p><strong>Kaina:</strong> {{ $vienetas->kaina }} €/dienai</p>
        <p><strong>Serijinis nr.:</strong> {{ $vienetas->sm }}</p>

       <!-- Inline nuomos forma -->
<form method="POST" action="{{ route('rent.store', $vienetas->id) }}">
    @csrf
    
    <label for="pradzia">Nuo:</label>
    <input type="date" name="pradzia" required>

    <label for="pabaiga">Iki:</label>
    <input type="date" name="pabaiga" required>

    <button type="submit">Tvirtinti nuomą</button>
</form>


    </div>
@endforeach

    </div>
@endsection

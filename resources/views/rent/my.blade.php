@extends('layouts.custom')

@section('content')
    <h1>Mano nuomos</h1>

    @if($nuomos->isEmpty())
        <p>Šiuo metu neturite aktyvių nuomų.</p>
    @else
        <div style="display: flex; flex-wrap: wrap; gap: 20px;">
            @foreach ($nuomos as $nuoma)
                <div style="border: 1px solid #ccc; padding: 10px; width: 300px;">
                    <h3>{{ $nuoma->vienetas->dalis->pavadinimas }}</h3>
                    <p><strong>Kategorija:</strong> {{ $nuoma->vienetas->dalis->kategorija->pavadinimas }}</p>
                    <p><strong>Gamintojas:</strong> {{ $nuoma->vienetas->dalis->gamintojas->pavadinimas }}</p>
                    <p><strong>Serijinis nr.:</strong> {{ $nuoma->vienetas->sm }}</p>
                    <p><strong>Pradžia:</strong> {{ $nuoma->pradzia }}</p>
                    <p><strong>Pabaiga:</strong> {{ $nuoma->pabaiga }}</p>
                    <p><strong>Statusas:</strong> {{ $nuoma->statusas->pavadinimas }}</p>
                </div>
            @endforeach
        </div>
    @endif
@endsection

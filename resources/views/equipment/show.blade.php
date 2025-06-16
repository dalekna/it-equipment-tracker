
@extends('layouts.app')

@section('content')
    <h1>Įrangos informacija</h1>

    <p><strong>Pavadinimas:</strong> {{ $equipment->pavadinimas }}</p>
    <p><strong>Kaina:</strong> {{ $equipment->kaina }} €</p>

    <a href="{{ route('equipment.index') }}">Atgal į sąrašą</a>
@endsection

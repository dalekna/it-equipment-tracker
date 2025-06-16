@extends('layouts.custom')

@section('content')
    <h2 style="text-align:center;">Redaguoti įrangą</h2>

    <form method="POST" action="{{ route('equipment.update', $vienetas->id) }}">
        @csrf
        @method('PATCH')

        <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: 20px;">
            <!-- Tipas -->
            <div style="flex: 1; min-width: 200px;">
                <label for="tipas">Tipas</label>
                <input type="text" name="tipas" id="tipas" value="{{ $vienetas->dalis->kategorija->tipas->pavadinimas }}" required>
            </div>

            <!-- Kategorija -->
            <div style="flex: 1; min-width: 200px;">
                <label for="kategorija">Kategorija</label>
                <input type="text" name="kategorija" id="kategorija" value="{{ $vienetas->dalis->kategorija->pavadinimas }}" required>
            </div>

            <!-- Gamintojas -->
            <div style="flex: 1; min-width: 200px;">
                <label for="gamintojas">Gamintojas</label>
                <input type="text" name="gamintojas" id="gamintojas" value="{{ $vienetas->dalis->gamintojas->pavadinimas }}" required>
            </div>

            <!-- Modelis -->
            <div style="flex: 1; min-width: 200px;">
                <label for="modelis">Modelis</label>
                <input type="text" name="modelis" id="modelis" value="{{ $vienetas->dalis->pavadinimas }}" required>
            </div>

            <!-- Serijinis numeris -->
            <div style="flex: 1; min-width: 200px;">
                <label for="sm">Serijinis numeris</label>
                <input type="text" name="sm" id="sm" value="{{ $vienetas->sm }}" required>
            </div>

            <!-- Kaina -->
            <div style="flex: 1; min-width: 200px;">
                <label for="kaina">Kaina (EUR)</label>
                <input type="number" step="0.01" name="kaina" value="{{ $vienetas->kaina }}" required>
            </div>

            <!-- Pastaba -->
            <div style="flex: 1 1 100%;">
                <label for="pastaba">Pastaba</label>
                <textarea name="pastaba" id="pastaba" style="width: 100%; height: 60px;">{{ $vienetas->dalis->pastaba }}</textarea>
            </div>
        </div>

        <button type="submit" class="btn" style="margin-top: 20px;">Atnaujinti</button>
    </form>
@endsection

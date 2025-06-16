@extends('layouts.custom')

@section('content')
    <h2 style="text-align:center;">Pridėti naują įrangą</h2>

    @if ($errors->any())
    <div style="color: red; margin-bottom: 20px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <form method="POST" action="{{ route('equipment.store') }}">
        @csrf

        <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: 20px;">

            <!-- Tipas -->
            <div style="flex: 1; min-width: 200px;">
                <label for="tipas">Tipas</label>
                <select name="tipas" id="tipas" required>
                    <option disabled selected>Pasirinkite tipą</option>
                    @foreach($tipai as $tipas)
                        <option value="{{ $tipas->id }}">{{ $tipas->pavadinimas }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Kategorija -->
            <div style="flex: 1; min-width: 200px;">
                <label for="kategorija">Kategorija</label>
                <select name="kategorija" id="kategorija" required>
                    <option disabled selected>Pasirinkite kategoriją</option>
                </select>
            </div>

            <!-- Gamintojas -->
            <div style="flex: 1; min-width: 200px;">
                <label for="gamintojas">Gamintojas</label>
                <input type="text" name="gamintojas" id="gamintojas" list="gamintojai" required>
                <datalist id="gamintojai">
                    @foreach($gamintojai as $gamintojas)
                        <option value="{{ $gamintojas->pavadinimas }}">
                    @endforeach
                </datalist>
            </div>

            <!-- Modelis -->
            <div style="flex: 1; min-width: 200px;">
                <label for="modelis">Modelis</label>
                <input type="text" name="modelis" id="modelis" required>
            </div>

            <!-- Serijinis numeris -->
            <div style="flex: 1; min-width: 200px;">
                <label for="sm">Serijinis numeris</label>
                <input type="text" name="sm" id="sm" required>
            </div>

            <!-- Kaina -->
            <div style="flex: 1; min-width: 200px;">
                <label for="kaina">Kaina (EUR)</label>
                <input type="number" step="0.01" name="kaina" required>
            </div>

            <!-- Pastaba -->
            <div style="flex: 1 1 100%;">
                <label for="pastaba">Pastaba</label>
                <textarea name="pastaba" id="pastaba" style="width: 100%; height: 60px;"></textarea>
            </div>

        </div>

        <button type="submit" class="btn" style="margin-top: 20px;">Pridėti</button>
        <!-- Būsena -->
<div style="flex: 1; min-width: 200px;">
    <label for="statusasid">Būsena</label>
    <select name="statusasid" id="statusasid" required>
        @foreach ($statusai as $statusas)
            <option value="{{ $statusas->id }}">{{ $statusas->pavadinimas }}</option>
        @endforeach
    </select>
</div>

    </form>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const tipasSelect = document.getElementById('tipas');
        const kategorijaSelect = document.getElementById('kategorija');

        tipasSelect.addEventListener('change', function () {
            const tipasId = tipasSelect.value;

            fetch(`/kategorijos-by-tipas?tipas_id=${encodeURIComponent(tipasId)}`)
                .then(response => response.json())
                .then(data => {
                    kategorijaSelect.innerHTML = '<option disabled selected>Pasirinkite kategoriją</option>';

                    data.forEach(kategorija => {
                        const option = document.createElement('option');
                        option.value = kategorija.pavadinimas;
                        option.textContent = kategorija.pavadinimas;
                        kategorijaSelect.appendChild(option);
                    });
                });
        });
    });
</script>


@endsection

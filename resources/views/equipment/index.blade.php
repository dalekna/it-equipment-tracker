@extends('layouts.custom')

@section('content')
    <h1>Įrangos sąrašas</h1>
    <a class="btn" href="{{ route('equipment.create') }}">+ Pridėti įrangą</a>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipas</th>
                <th>Kategorija</th>
                <th>Pavadinimas</th>
                <th>Gamintojas</th>
                <th>Kaina</th>
                <th>Veiksmai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipment as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->dalis->kategorija->tipas->pavadinimas ?? 'Nenurodyta' }}</td>
                    <td>{{ $item->dalis->kategorija->pavadinimas ?? 'Nenurodyta' }}</td>
                    <td>{{ $item->dalis->pavadinimas ?? 'Nenurodyta' }}</td>
                    <td>{{ $item->dalis->gamintojas->pavadinimas ?? 'Nenurodyta' }}</td>
                    <td>{{ $item->kaina }} €</td>
                    <td>
                        <a href="{{ route('equipment.edit', $item->id) }}">Redaguoti</a> |
                        <form action="{{ route('equipment.destroy', $item->id) }}" method="POST" style="display: inline;">

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger">Ištrinti</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

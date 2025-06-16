<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipas;
use App\Models\Kategorija;
use App\Models\Gamintojas;
use App\Models\VienetasStatusas;
use App\Models\Dalis;
use App\Models\Vienetas;
use Illuminate\Support\Facades\Auth;
use App\Models\Logas;


class EquipmentController extends Controller
{

    public function index()
{
    $equipment = Vienetas::with('dalis.kategorija.tipas', 'dalis.gamintojas')->get();
    return view('equipment.index', compact('equipment'));
}


    public function create()
    {
        $tipai = Tipas::all();
        $kategorijos = Kategorija::all();
        $gamintojai = Gamintojas::all();
        $statusai = VienetasStatusas::all();

        return view('equipment.create', compact('tipai', 'kategorijos', 'gamintojai', 'statusai'));
    }

public function store(Request $request)
{
    $request->validate([
        'tipas' => 'required|string|max:255',
        'kategorija' => 'required|string|max:255',
        'gamintojas' => 'required|string|max:255',
        'modelis' => 'required|string|max:255',
        'pastaba' => 'nullable|string|max:1000',
        'sm' => 'required|string|unique:vienetas,sm',
        'kaina' => 'required|numeric',
        'statusasid' => 'required|exists:vienetas_statusas,id',
    ]);

    $tipas = Tipas::firstOrCreate(['pavadinimas' => $request->tipas]);
    $kategorija = Kategorija::firstOrCreate([
        'pavadinimas' => $request->kategorija,
        'tipasid' => $tipas->id,
    ]);
    $gamintojas = Gamintojas::firstOrCreate(['pavadinimas' => $request->gamintojas]);

    $dalis = Dalis::create([
        'pavadinimas' => $request->modelis,
        'kategorijaid' => $kategorija->id,
        'gamintojasid' => $gamintojas->id,
        'pastaba' => $request->pastaba,
    ]);

    $vienetas = Vienetas::create([
        'dalisid' => $dalis->id,
        'sm' => $request->sm,
        'kaina' => $request->kaina,
        'statusasid' => $request->statusasid,
    ]);

    // Registruojam logą
    Logas::create([
        'user_id' => Auth::id(),
        'lentele' => 'vienetas',
        'iraso_id' => $vienetas->id,
        'laukas' => 'sukurta',
        'senas' => null,
        'naujas' => json_encode($vienetas->toArray())
    ]);

    return redirect()->route('equipment.index')->with('success', 'Įranga sėkmingai pridėta!');
}

    public function edit($id)
{
    $vienetas = Vienetas::with(['dalis.kategorija.tipas', 'dalis.gamintojas'])->findOrFail($id);
    return view('equipment.edit', compact('vienetas'));
}


    public function update(Request $request, $id)
{
    $request->validate([
        'tipas' => 'required|string|max:255',
        'kategorija' => 'required|string|max:255',
        'gamintojas' => 'required|string|max:255',
        'modelis' => 'required|string|max:255',
        'pastaba' => 'nullable|string|max:1000',
        'sm' => 'required|string',
        'kaina' => 'required|numeric',
    ]);

    $vienetas = Vienetas::findOrFail($id);

    $tipas = Tipas::firstOrCreate(['pavadinimas' => $request->tipas]);
    $kategorija = Kategorija::firstOrCreate([
        'pavadinimas' => $request->kategorija,
        'tipasid' => $tipas->id,
    ]);
    $gamintojas = Gamintojas::firstOrCreate(['pavadinimas' => $request->gamintojas]);

    $dalis = $vienetas->dalis;
    $dalis->update([
        'pavadinimas' => $request->modelis,
        'kategorijaid' => $kategorija->id,
        'gamintojasid' => $gamintojas->id,
        'pastaba' => $request->pastaba,
    ]);

    $vienetas->update([
        'sm' => $request->sm,
        'kaina' => $request->kaina,
    ]);

    return redirect()->route('equipment.index')->with('success', 'Įranga atnaujinta!');
}


    public function destroy($id)
{
    $vienetas = Vienetas::findOrFail($id);
    $vienetas->delete();

    return redirect()->route('equipment.index')->with('success', 'Įranga ištrinta.');
}


    public function getKategorijosByTipas(Request $request)
{
    $tipasId = $request->query('tipas_id');

    if (!$tipasId) {
        return response()->json([]);
    }

    $kategorijos = Kategorija::where('tipasid', $tipasId)->get(['pavadinimas']);
    return response()->json($kategorijos);
}

}

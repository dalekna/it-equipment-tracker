<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vienetas;
use App\Models\Nuoma;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RentController extends Controller
{
    // Rodo visas nuomai galimas prekes
    public function index()
    {
        // Tik laisvos prekės (statusas_id = 1 – Laisva)
        $vienetai = Vienetas::with(['dalis.kategorija', 'dalis.gamintojas'])
            ->where('statusasid', 1)
            ->get();

        return view('rent.index', compact('vienetai'));
    }

    public function myRentals()
{
    $nuomos = Nuoma::with(['vienetas.dalis.kategorija', 'vienetas.dalis.gamintojas', 'statusas'])
        ->where('user_id', Auth::id())
        ->get();

    return view('rent.my', compact('nuomos'));
}


    // Patvirtina nuomą
    public function store(Request $request, $id)
    {
        $request->validate([
            'pradzia' => 'required|date',
            'pabaiga' => 'required|date|after_or_equal:pradzia',
        ]);

        // Apskaičiuojam dienas ir bendrą kainą
        $dienos = Carbon::parse($request->pradzia)->diffInDays(Carbon::parse($request->pabaiga)) + 1;
        $vienetas = Vienetas::findOrFail($id);
        $bendraKaina = $vienetas->kaina * $dienos;

        // Sukuriam nuomos įrašą
        Nuoma::create([
            'user_id'     => Auth::id(),
            'vienetasid'  => $vienetas->id,
            'pradzia'     => $request->pradzia,
            'pabaiga'     => $request->pabaiga,
            'statusasid'  => 1, // Pvz., aktyvi nuoma
            // 'kaina'     => $bendraKaina, // jei turi kaina stulpelį nuoma lentelėje
        ]);

        // Atnaujinam įrangos statusą (nebėra laisva)
        $vienetas->update(['statusasid' => 2]); // Pvz. 2 = Išnuomota

        return redirect()->route('rent.index')->with('success', "Sėkmingai išnuomota! Kaina: $bendraKaina €");
    }
}

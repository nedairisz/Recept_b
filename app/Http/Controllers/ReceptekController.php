<?php

namespace App\Http\Controllers;

use App\Models\Recept;
use Illuminate\Http\Request;

class ReceptController extends Controller
{

    public function index()
    {      
        $receptek = Recept::with('kategoria')->get();       
        $formatted = $receptek->map(function ($recept) {
            return [
                'id' => $recept->id,
                'nev' => $recept->nev,
                'kategoria' => $recept->kategoria->nev ?? null,
                'kep_eleresi_ut' => $recept->kep_eleresi_ut,
                'leiras' => $recept->leiras,
                'created_at' => $recept->created_at,
            ];
        });

        return response()->json($formatted);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nev' => 'required|string|max:255',
            'kat_id' => 'required|exists:kollekcios,kat_id', 
            'kep_eleresi_ut' => 'required|string|max:255',
            'leiras' => 'required|string',
        ]);
        $recept = Recept::create($validated);
        return response()->json(['message' => 'Recept sikeresen létrehozva!', 'recept' => $recept], 201);
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nev' => 'required|string|max:255',
            'kat_id' => 'required|exists:kollekcios,kat_id',
            'kep_eleresi_ut' => 'required|string|max:255',
            'leiras' => 'required|string',
        ]);
        $recept = Recept::findOrFail($id);
        $recept->update($validated);
        return response()->json(['message' => 'Recept sikeresen frissítve!', 'recept' => $recept]);
    }

   
    public function destroy($id)
    {
        $recept = Recept::findOrFail($id);
        $recept->delete();
        return response()->json(['message' => 'Recept sikeresen törölve!']);
    }
}

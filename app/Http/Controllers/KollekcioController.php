<?php

namespace App\Http\Controllers;

use App\Models\Kollekcio;
use Illuminate\Http\Request;

class KollekcioController extends Controller
{

    public function index()
    {
        $kategoriak = Kollekcio::all();  
        return response()->json($kategoriak);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nev' => 'required|string|max:255',
        ]);

        $kategoria = Kollekcio::create([
            'nev' => $validated['nev'],
        ]);

        return response()->json(['message' => 'Kategória sikeresen létrehozva!', 'kategoria' => $kategoria], 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nev' => 'required|string|max:255',
        ]);

        $kategoria = Kollekcio::findOrFail($id);
        $kategoria->update([
            'nev' => $validated['nev'],
        ]);

        return response()->json(['message' => 'Kategória sikeresen frissítve!', 'kategoria' => $kategoria]);
    }

    public function destroy($id)
    {
        $kategoria = Kollekcio::findOrFail($id);
        $kategoria->delete();

        return response()->json(['message' => 'Kategória sikeresen törölve!']);
    }
}

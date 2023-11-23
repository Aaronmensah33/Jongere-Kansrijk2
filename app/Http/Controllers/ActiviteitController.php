<?php

namespace App\Http\Controllers;

use App\Models\activiteit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActiviteitController extends Controller
{

    public function index()
    {
        $activiteiten = activiteit::all();
        return view('activiteiten.index', compact('activiteiten'));
    }

    public function destroy($id)
    {
        DB::delete('delete from activiteiten where id = ?', [$id]);
        return redirect()->route('activiteiten.index');
    }

    public function edit($id)
    {
        $activiteiten = activiteit::find($id);
        return view('activiteiten.edit', compact('activiteiten'));
    }

    public function update(Request $request, $id)
    {
        $activiteiten = activiteit::find($id);
        $activiteiten->naam = $request->naam;
        $activiteiten->beschrijving = $request->beschrijving;
        $activiteiten->locatie = $request->locatie;
        $activiteiten->save();
        return redirect()->route('activiteiten.index');
    }

    public function create()
    {
        return view('activiteiten.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'beschrijving' => 'required|string|max:255',
            'locatie' => 'required|string|max:255',

        ]);

        Activiteit::create([
            'naam' => $request->naam,
            'beschrijving' => $request->beschrijving,
            'locatie' => $request->locatie,
        ]);
        return redirect()->route('activiteiten.index');
    }
}

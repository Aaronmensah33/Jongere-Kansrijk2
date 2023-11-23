<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activiteit;
use App\Models\Instituut;
use App\Models\Jongere;
use Illuminate\Support\Facades\DB;

class JongereController extends Controller
{

    public function index()
    {
        $jongeren = Jongere::all();
        return view('jongeren.index', ['jongeren' => $jongeren]);
    }

    public function create()
    {
        // Fetch the list of activiteiten from the database
        $activiteiten = Activiteit::all();
        $instituten = Instituut::all(); // Fetch all instituten

        // Pass the list of activiteiten to the view
        return view('jongeren.create', compact('activiteiten', 'instituten'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'voornaam' => 'required|string|max:255',
            'achternaam' => 'required|string|max:255|unique:jongeren,achternaam',
            'geboortejaar' => 'required|integer',

        ]);

        if (empty($request->instituut)) {
            $instituut = 0;
        } else {
            $instituut = $request->instituut;
        }

        if (empty($request->activiteit)) {
            $activiteit = 0;
        } else {
            $activiteit = $request->activiteit;
        }

        Jongere::create([
                'voornaam' => $request->voornaam,
                'achternaam' => $request->achternaam,
                'geboortejaar' => $request->geboortejaar,
                'activiteit_id' => $activiteit,
                'instituut_id' => $instituut,
            ]);
            // $newJongere = Jongere::create($data);
            return redirect()->route('jongeren.index');
            
    }



    public function destroy($id)
    {
        DB::delete('delete from jongeren where id = ?', [$id]);
        return redirect('jongeren.index');
    }

    public function edit($id)
    {
        $jongere = Jongere::find($id);
        $activiteiten = Activiteit::all();
        $instituten = Instituut::all();
        return view('jongeren.edit', compact('jongere', 'activiteiten', 'instituten'));
    }

    public function update(Request $request, $id)
    {
        $jongere = Jongere::find($id);
        $jongere->voornaam = $request->voornaam;
        $jongere->achternaam = $request->achternaam;
        $jongere->geboortejaar = $request->geboortejaar;
        $jongere->activiteit_id = $request->activiteit;
        $jongere->instituut_id = $request->instituut;
        $jongere->save();
        return redirect()->route('jongeren.index');
    }

}

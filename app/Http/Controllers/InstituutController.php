<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instituut;
use Illuminate\Support\Facades\DB;

class InstituutController extends Controller
{
    
    
    public function index()
    {
        $instituten = instituut::all();
        return view('instituten.index', compact('instituten'));
    }

    public function destroy($id)
    {
        DB::delete('delete from instituten where id = ?', [$id]);
        return redirect()->route('instituten.index');
    }

    public function create()
    {
        return view('instituten.create');
    }

    public function edit($id)
    {
        $instituten = Instituut::find($id);
        return view('instituten.edit', compact('instituten'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
        ]);

        Instituut::create([
            'naam' => $request->naam,
        ]);
        // $newJongere = Jongere::create($data);
        return redirect()->route('instituten.index');
    }

    public function update(Request $request, $id)
    {
        $instituten = Instituut::find($id);
        $instituten->naam = $request->naam;
        $instituten->save();
        return redirect()->route('instituten.index');
    }
}

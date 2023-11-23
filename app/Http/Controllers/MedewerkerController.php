<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class MedewerkerController extends Controller
{

    public function show(){
        $users = User::all();
        return view('dashboard', ['users' => $users]);
    }
    

    public function create()
    {
        return view('medewerkers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $newUser = User::create($data);

        return redirect()->route('dashboard');
    }


    public function destroy($id)
    {
        DB::delete('delete from users where id = ?', [$id]);
        return redirect('dashboard');
    }

}

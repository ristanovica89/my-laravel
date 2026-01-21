<?php

namespace App\Http\Controllers;

use App\Models\Ocena;
use App\Models\User;
use Illuminate\Http\Request;

class OcenaController extends Controller
{
    public function index(Request $request){

        $ocene = Ocena::all();

        return view('ocene', compact('ocene'));
    }

    public function dodajOcenu(Request $request){

        $validated = $request->validate([
            'predmet' => 'required|string|min:5',
            'ocena' => 'required|integer|min:1|max:5',
            'profesor' => 'required|string|min:5',
            'user_id' => 'required|integer'
        ]);

        Ocena::create($validated);

        return redirect('/ocene')->with('success','Ocena dodata uspesno!');
    }

    public function sveOceneUcenika(Request $request){

        $ime = $request->name;
        $user = User::where('name',$ime)->first();

        if(!$user){
            return 'Korisnik sa imenom ' . $ime . ', ne postoji!';
        }

        $ocene = Ocena::where('user_id',$user->id)->get();

        return view('ocene-ucenik', compact('ocene', 'user'));
    }
}

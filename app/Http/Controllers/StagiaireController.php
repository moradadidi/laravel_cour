<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Stagiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StagiaireController extends Controller
{
    public function index() {
        $stagiaires = Stagiaire::with('groupes')->get();
        return view('stagiaires.index', compact('stagiaires'));
    }
    public function show($id) {
        $stagiaire = Stagiaire::findOrFail($id);
        return view('stagiaires.show', compact('stagiaire'));
    }
    public function create() {
        return view('stagiaires.create');
    }
    public function store(Request $request) {
        $stagiaire = $request->validate([
            'nom' => 'required ',
                'prenom' => 'required',
                'email' => 'required',
                'telephone' => 'required',
                'adresse' => 'required',
        ]);
        Stagiaire::create($stagiaire);
        return redirect()->route('stagiaires.index');
    }
    public function edit($id) {
        $stagiaire = Stagiaire::findOrFail($id);
        return view('stagiaires.edit', compact('stagiaire'));
    }
    public function update(Request $request, $id) {
        $stagiaire = Stagiaire::findOrFail($id);
        $stagiaire->name = $request->name;
        $stagiaire->email = $request->email;
        $stagiaire->telephone = $request->telephone;
        $stagiaire->adresse = $request->adresse;
        $stagiaire->save();
        return redirect()->route('stagiaires.index');
    }
    public function destroy($id) {
        $stagiaire = Stagiaire::findOrFail($id);
        $stagiaire->delete();
        return redirect()->route('stagiaires.index');
    }


}

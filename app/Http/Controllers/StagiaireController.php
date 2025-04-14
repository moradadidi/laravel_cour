<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StagiaireController extends Controller
{
    public function index()
    {
        $stagiaires = DB::table('stagiaires')->get();
        return view('stagiaires.index', compact('stagiaires'));
    }

    public function show ($id){
        // $stagaire = DB::select('select * from stagiaires where id = ?', [
        //     $id
        // ]);
        $stagaire = DB::table('stagiaires')->where('id', $id)->first();
        dd($stagaire);
    }

    public function create()
    {
        return  view('stagiaires.create');
    }

    public function store(Request $request)
    {
        $stagaire = $request->validate(
            [
                'nom' => 'required ',
                'prenom' => 'required',
                'email' => 'required',
                'telephone' => 'required',
                'adresse' => 'required',
            ]
        );

        // Db::insert('insert into stagiaires (nom , prenom , email , telephone , adresse) values (? ,? , ? ,? ,?)', [
        //     $stagaire['nom'],
        //     $stagaire['prenom'],
        //     $stagaire['email'],
        //     $stagaire['telephone'],
        //     $stagaire['adresse'],

        // ]);
        DB::table('stagiaires')->insert($stagaire);

        return redirect()->route('stagiaires.index');

    }

    public function edit ($id){
        $stagaire = DB::select('select * from stagiaires where id = ?', [
            $id
        ]);

        dd($stagaire);
        return view('stagiaires.edit' , compact('stagaire'));

    }

    public function update (Request $request , $id){
         $request->validate(
            [
                'nom' => 'sometimes ',
                'prenom' => 'sometimes',
                'email' => 'sometimes',
                'telephone' => 'sometimes',
                'adresse' => 'sometimes',
            ]
        );
        // DB::update('update stagiaires set (nom = ? , prenom = ? ,email = ? ,telephone  = ? ,adresse = ? ) where id = ?' , [
        //     $request->nom , 
        //     $request->prenom , 
        //     $request->email , 
        //     $request->telephone , 
        //     $request->adresse , 
        //     $id  
        // ]);

        DB::table('stagiaires')->where('id', $id)->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
        ]);

        return redirect()->route('posts.index');
    }

    public function destroy ($id){
        // DB::delete('delete from stagiaires where id = ?' , [
        //     $id
        // ]);
        DB::table('stagiaires')->where('id', $id)->delete();
        return redirect()->route('stagiaires.index');
    }

}

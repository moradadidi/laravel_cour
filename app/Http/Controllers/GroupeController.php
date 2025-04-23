<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groupes = Groupe::with('owner')->get();
        dd($groupes->toArray());
        return view('groupes.index', compact('groupes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('groupes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'owner_id' => 'required'
            
        ]);

        $groupe = Groupe::create($request->all());
        dd($groupe);
        return redirect()->route('groupes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Groupe $groupe)
    {
        $groupe->load('owner');
        dd($groupe->toArray());
        return view('groupes.show', compact('groupe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Groupe $groupe)
    {
        dd($groupe);
        return view('groupes.edit', compact('groupe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Groupe $groupe)
    {
        $request->validate([
            'nom' => 'sometimes',
            'description' => 'sometimes',
            'owner_id' => 'sometimes'
        ]);

        $groupe->update($request->all());
        dd($groupe);
        return redirect()->route('groupes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Groupe $groupe)
    {
        $groupe->delete();
        return redirect()->route('groupes.index');
    }
}

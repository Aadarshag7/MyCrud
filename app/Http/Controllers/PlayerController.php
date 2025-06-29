<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $player=Player::get();
        return view('player.index',compact('player'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('player.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        Player::create([
            'name'=>$request->name,
            'age'=>$request->age,
            'photo'=>$request->photo? $request->photo->store('Player','public'):null
            ]);
             
        
        return redirect()->route('player');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $player=Player::find($id);
        return view('player.edit',compact('player'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $player=Player::find($id);
        $player->update($request->all());
        return redirect()->route('player');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $player=Player::find($id);
        $player->delete();
        return redirect()->route('player');
    }
}

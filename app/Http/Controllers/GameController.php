<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Player;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $game=Game::with('player')->get();
        return view('game.index',compact('game'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $player=Player::get();
        return view('game.create',compact('player'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $game= Game::create([
            'title'=>$request->title
        ]);

        $game->player()->attach($request->player_id);

        return redirect()->route('game');
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
        $game= Game::find($id);
        return view('game.edit',compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $game=Game::find($id);
    
        $game->update($request->all());
        return redirect()->route('game');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $game=Game::find($id);
        $game->delete();
        return redirect()->route('game');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Kategori;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $game = Game::all();
        return view('layouts.game.index', compact('game'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = Kategori::all();
        return view('layouts.game.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        DB::beginTransaction();
        try {
            $gm = new Game();
            $gm->name_game = $request->input('name_game');
            $gm->description = $request->input('description');
            $gm->stock = $request->input('stock');
            $gm->harga = $request->input('harga');
            $gm->kategori_id = $request->input('kategori_id');
            DB::commit();
            if ($gm->save()) {
                return redirect()->route('game.index');
            } else {
                return redirect()->back();
            }
        } catch (\Exception $e) {
            DB::rollback();
        }
    }
    public function micro(){

        $response = Http::post("http://localhost:3030")->json([
            'title' => 'title',
            'description' =>  'descriptions'
        ]);
        return json_decode($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kategori = Kategori::all();
        $game = Game::find($id);
        return view('layouts.game.edit',compact('kategori','game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

            $gm = Game::find($id);
            $gm->name_game = $request->input('name_game');
            $gm->description = $request->input('description');
            $gm->stock = $request->input('stock');
            $gm->harga = $request->input('harga');
            $gm->kategori_id = $request->input('kategori_id');
            if ($gm->save()) {
                return redirect()->route('game.index');
            } else {
                return redirect()->back();
            }
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $g = Game::find($id);
        $g->delete();
        return redirect()->route('game.index');
    }
}
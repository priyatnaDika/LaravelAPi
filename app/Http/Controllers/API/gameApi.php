<?php

namespace App\Http\Controllers\API;

use App\Models\Game;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class gameApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Game = Game::getDetail()->paginate(10);
        return response()->json($Game);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi=$request->validate([
            'name_game' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'harga' => 'required',
            'kategori_id' => 'required',
         ]);
         try{
             $response = Game::create($validasi);
             return response()->json([
                 'success' => true,
                 'message' => 'success',
                 'data' => $response
             ]);
         } catch(\Throwable $e){
             return response()->json([
                 'message' => 'Err',
                 'errors' => $e->getMessage()
             ],422);
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasi=$request->validate([
            'name_game' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'harga' => 'required',
            'kategori_id' => 'required',
         ]);
        try{
            $response = Game::find($id);
            $response->update($validasi);
            return response()->json([
                'success' => true,
                'message' => 'success',
                'data' => $response
            ]);
        } catch(\Throwable $e){
            return response()->json([
                'message' => 'Err',
                'errors' => $e->getMessage()
            ],422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $Kategori = Game::find($id);
            $Kategori->delete();
            return response()->json([
            'success'=>true,
            'message'=>'Success'
            ]);
        } catch(\Throwable $e){
            return response()->json([
                'message' => 'Err',
                'errors' => $e->getMessage()
            ],422);
        }
    }
    
}
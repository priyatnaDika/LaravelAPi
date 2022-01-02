<?php

namespace App\Http\Controllers\API;

use App\Models\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class kategoriApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Kategori = Kategori::paginate(10);
        return response()->json($Kategori);
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
           'name_kategori' => 'required'
        ]);
        try{
            $response = Kategori::create($validasi);
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
            'name_kategori' => 'required'
         ]);
        try{
            $response = Kategori::find($id);
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
            $Kategori = Kategori::find($id);
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
<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('layouts.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('layouts.kategori.create');
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
            $d = new Kategori();
            $d->name_kategori = $request->input('name_kategori');
            $d->save();
            $notification = Http::withHeaders([
                'Accept' => 'application/json',
            ])->post('http://localhost:3030/',[
                'title' => "title:".$request->title,
                'description' =>  "description:".$request->description
            ])->json();
            
            DB::commit();
            return redirect()->route('kategori.index');
        }catch (\Exception $e) {
            DB::rollback();
        }

    }

    public function micro(){

        $notification = Http::withHeaders([
            'Accept' => 'application/json',
        ])->post('http://localhost:3030/',[
            'title' => "title:"."asal",
            'description' =>  "description:"."asal"
        ]);
        return response()->json();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kategori = Kategori::find($id);
        return view('layouts.kategori.edit',compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $kategori = Kategori::find($id);
        $kategori->name_kategori = $request->input('name_kategori');
        $kategori->save();
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $d = Kategori::find($id);
        $d->delete();
        return redirect()->route('kategori.index');

    }
}
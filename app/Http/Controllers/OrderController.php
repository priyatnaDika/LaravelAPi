<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
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
        
        $cart = Order::where('user_id', Auth::user()->id)->where('status', '0')->get();

        return view('layouts.order.index', compact('game','cart'));
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
        //
        if($request->game_id == 0){
            return redirect()->route('order.index')->with('pesan','Anda Belum Memilih game');
        }
        //melakukan pengecekan table order
        $product_check = Order::where('id', $request->game_id)->where('status','0')->first();
        //ambil harga dari table game
        $harga = Game::where('id', $request->game_id)->first();
        //Kondisi pengecekan
        if($product_check == null){
            $order = new Order;
            $order->game_id = $request->game_id;
            $order->jumlah = $request->jumlah;
        } else {
            $order = Order::where('game_id', $request->game_id)->where('status','0')->first();
            $order->game_id = $request->game_id;
            $order->jumlah += $request->jumlah;
        }
        $order->sub_total = $harga->harga * $request->jumlah;
        $order->user_id = Auth::user()->id;
        // return view('layouts.order.index');
        $order->save;

        return redirect()->route('order.index');
        // dd($order);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $g['kategories'] = Kategori::count();
        $g['game'] = Game::count();
        $g['user'] = User::count();
        return view('home',$g );
    }
    public function adminPage()
    {
        return view('layout.adminHome');
    }
}
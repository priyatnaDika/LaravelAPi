<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Game extends Model
{
    use HasFactory;
    protected $table='games';
    protected $fillable=['name_game', 'description', 'stock', 'harga', 'kategori_id'];
    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, "kategori_id");
    }

    static function getDetail(){
        $return = DB::table('games')
        ->join('kategoris', 'games.kategori_id', '=', 'kategoris.id');
        return $return;
    }
}
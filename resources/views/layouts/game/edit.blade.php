@extends('master')

@section('title')
<title>Page Edit Game</title>
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Create Game </h1>
        <div class="section-header breadcrumb">
            <div class="breadcrumb-item"><a href="#"></a></div>
        </div>
    </div>
    <div class="col-12 col-md-15">
        <div class="card card-primary">
            <div class="card-header">
                <h2>Halaman Edit Data Game</h2>
            </div>
            <div class="card-body">
                <form action="{{route('game.update', $game->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <table class="table table-bordered">
                        <tr>
                            <td>Nama Game</td>
                            <td><input type="text" value="{{$game->name_game}}" name="name_game" class="form-control"
                                    id=""></td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td><input type="text" value="{{$game->description}}" name="description"
                                    class="form-control" id=""></td>
                        </tr>
                        <tr>
                            <td>Stock</td>
                            <td><input type="text" value="{{$game->stock}}" name="stock" class="form-control" id="">
                            </td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td><input type="text" value="{{$game->harga}}" name="harga" class="form-control" id="">
                            </td>
                        </tr>
                        <tr>
                            <td>Kategori Game</td>
                            <td>
                                <select name="kategori_id" id="" class="form-control">
                                    <option value="0">-Pilih Data-</option>
                                    @foreach ($kategori as $k)
                                    @if($game->kategori_id == $k->id)
                                    <option value="{{$k->id}}" selected>{{$k->name_kategori}}</option>
                                    @else
                                    <option value="{{$k->id}}">{{$k->name_kategori}}</option>
                                    @endif

                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><button type="submit" class="btn btn-primary">Save</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

    </div>
</section>
@endsection
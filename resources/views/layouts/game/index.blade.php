@extends('master')

@section('title')
<title>Page Game</title>
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>game page</h1>
        <div class="section-header breadcrumb">
            <div class="breadcrumb-item"><a href="#"></a></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <a href="{{route('game.create')}}" class="btn btn-primary">Tambah Game</a>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>No</th>
                                <th>Nama Game</th>
                                <th>Deskripsi</th>
                                <th>Stock</th>
                                <th>Harga</th>
                                <th>Kategori Game</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($game as $gm)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$gm->name_game}}</td>
                                    <td>{{$gm->description}}</td>
                                    <td>{{$gm->stock}}</td>
                                    <td>{{$gm->harga}}</td>
                                    <td>{{ $gm->kategori->name_kategori }}</td>
                                    <td>
                                        <a href="{{route('game.edit',$gm->id)}}" class="btn btn-outline-warning"><i
                                                class="fas fa-edit"></i></a>
                                        <form action="{{route('game.destroy',$gm->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Belum Ada Data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
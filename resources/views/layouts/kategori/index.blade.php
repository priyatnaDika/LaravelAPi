@extends('master')

@section('title')
<title>Page Kategori</title>
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Kategori page</h1>
        <div class="section-header breadcrumb">
            <div class="breadcrumb-item"><a href="#"></a></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <a href="{{route('kategori.create')}}" class="btn btn-primary">Tambah Kategori</a>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($kategori as $kat)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$kat->name_kategori}}</td>
                                    <td>
                                        <a href="{{route('kategori.edit',$kat->id)}}" class="btn btn-outline-warning"><i
                                                class="fas fa-edit"></i></a>
                                        <form action="{{route('kategori.destroy',$kat->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center">Belum Ada Data</td>
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
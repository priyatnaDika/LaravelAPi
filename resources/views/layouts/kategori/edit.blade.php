@extends('master')

@section('title')
<title>Page Edit Kategori</title>
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit kategori </h1>
        <div class="section-header breadcrumb">
            <div class="breadcrumb-item"><a href="#"></a></div>
        </div>
    </div>
    <div class="col-12 col-md-15">
        <div class="card card-primary">
            <div class="card-header">
                <h2>Halaman Edit Data Kategori</h2>
            </div>
            <div class="card-body">
                <form action="{{route('kategori.update', $kategori->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <table class="table table-bordered">
                        <tr>
                            <td>Nama Kategori</td>
                            <td><input type="text" value="{{$kategori->name_kategori}}" name="name_kategori"
                                    class="form-control" id=""></td>
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
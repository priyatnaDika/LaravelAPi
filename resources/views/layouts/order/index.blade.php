@extends('master')

@section('title')
<title>Order Page</title>
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Cart</h1>
    </div>
    @if ($message = Session::get('pesan'))
    <div class="alert alert-primary">
        <button class="close">
            <span>&times;</span>
            <strong>{{ $message }}</strong>
        </button>
    </div>
    @endif
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card card-primary">
                <form action="{{ route('order.store')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card-header">
                        <h4>Pilih Game</h4>
                    </div>
                    <div class="card-body">
                        <label for="">Nama Game</label>
                        <select name="game_id" id="" class="form-control">
                            <option value="0">-Pilih Game</option>
                            @foreach($game as $gm)
                            <option value="{{$gm->id}}">{{ $gm->name_game }} - Rp. {{ $gm->harga }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            form nama game harus di isi
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <div class="row">
                            <div class="col-12 ">
                                <input type="number" class="form-control" name="jumlah" required>
                            </div>
                        </div>
                        <button class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Card Order</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Game</th>
                                    <th>Jumlah</th>
                                    <th colspan="2">Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $c)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $c->product_id }}</td>
                                    <td>{{ $c->jumlah }}</td>
                                    <td>{{ $c->sub_total }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="text-right">
                        <p class="h5">
                            Total Harga : IDR
                        </p>
                    </div>
                    <hr>
                </div>
                <div class="card-footer text-right">

                    <a href="" class="btn btn-primary">
                        <i class="fas fa-shopping-cart">Checkout</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
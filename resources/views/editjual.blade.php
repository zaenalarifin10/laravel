@extends('layouts.app')
@section('style')
<style>
    .container {
        max-width: 600px; /* Lebar maksimum kontainer */
    }
    .form-group.row {
        margin-bottom: 20px; /* Jarak antar baris form */
    }
    .btn-primary, .btn-warning {
        width: 100px; /* Lebar tombol */
    }
    /* Stylize input fields if needed */
    .form-control {
        /* Misalnya, menambahkan border-radius */
        border-radius: 5px;
    }
    h1{
        text-align: center;
        margin-bottom: 25px;
    }
</style>
@endsection
@section('content')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                    <!-- Page Heading -->
                    <div class="container mt-4">
                        <form action="{{ Route('updetejual.barang', ['barang' => $barangjual->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <h1>EDIT BARANG</h1>
                            <div class="form-group row">
                                <label for="kode" class="col-sm-3 col-form-label">id Barang:</label>
                                <div class="col-sm-9">
                                   <select name="id_barang" id="id_barang"class="form-control">
                                    @foreach ($barangs as $barang)
                                        <option value="{{$barang->id}}" @if ($barang->id == $barangjual->id) selected @endif >{{$barang->barang}}</option>
                                    @endforeach
                                   </select>
                                    @error('id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                               <label for="nama" class="col-sm-3 col-form-label">jumlah Barang:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{ $jumlah }}">
                                    @error('jumlah')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a class="btn btn-warning ml-2" href="/tables">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
@endsection

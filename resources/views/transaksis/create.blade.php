@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Transaksi</h1>
        <form action="{{ route('transaksis.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="menu_id" class="form-label">Menu</label>
                <select class="form-select" id="menu_id" name="menu_id" required>
                    @foreach ($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection

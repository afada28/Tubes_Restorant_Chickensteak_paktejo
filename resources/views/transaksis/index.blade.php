@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Transaksi</h1>
        <a href="{{ route('transaksis.create') }}" class="btn btn-primary">Tambah Transaksi</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Menu</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksis as $transaksi)
                    <tr>
                        <td>{{ $transaksi->menu->nama }}</td>
                        <td>{{ $transaksi->jumlah }}</td>
                        <td>{{ $transaksi->total_harga }}</td>
                        <td>
                            <a href="{{ route('transaksis.edit', $transaksi->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('transaksis.destroy', $transaksi->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


@extends('layouts.app')  
  
@section('content')  
<div class="container">  
    <h1>Menu</h1>  
    <a href="{{ route('menus.create') }}" class="btn btn-primary">Tambah Menu</a>  
    @if (session('success'))  
        <div class="alert alert-success">{{ session('success') }}</div>  
    @endif  
    <table class="table">  
        <thead>  
            <tr>  
                <th>Nama</th>  
                <th>Harga</th>  
                <th>Aksi</th>  
            </tr>  
        </thead>  
        <tbody>  
            @foreach ($menus as $menu)  
            <tr>  
                <td>{{ $menu->nama }}</td>  
                <td>{{ $menu->harga }}</td>  
                <td>  
                    <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning">Edit</a>  
                    <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:inline;">  
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
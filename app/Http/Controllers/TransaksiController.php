<?php

namespace App\Http\Controllers;  
  
use App\Models\Transaksi;  
use App\Models\Menu;  
use Illuminate\Http\Request;  
  
class TransaksiController extends Controller  
{  
    public function index()  
    {  
        $transaksis = Transaksi::with('menu')->get();  
        return view('transaksis.index', compact('transaksis'));  
    }  
  
    public function create()  
    {  
        $menus = Menu::all();  
        return view('transaksis.create', compact('menus'));  
    }  
  
    public function store(Request $request)  
    {  
        $request->validate([  
            'menu_id' => 'required|exists:menus,id',  
            'jumlah' => 'required|integer',  
        ]);  
  
        $menu = Menu::find($request->menu_id);  
        $total_harga = $menu->harga * $request->jumlah;  
  
        Transaksi::create([  
            'menu_id' => $request->menu_id,  
            'jumlah' => $request->jumlah,  
            'total_harga' => $total_harga,  
        ]);  
  
        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil ditambahkan.');  
    }  
  
    public function edit(Transaksi $transaksi)  
    {  
        $menus = Menu::all();  
        return view('transaksis.edit', compact('transaksi', 'menus'));  
    }  
  
    public function update(Request $request, Transaksi $transaksi)  
    {  
        $request->validate([  
            'menu_id' => 'required|exists:menus,id',  
            'jumlah' => 'required|integer',  
        ]);  
  
        $menu = Menu::find($request->menu_id);  
        $total_harga = $menu->harga * $request->jumlah;  
  
        $transaksi->update([  
            'menu_id' => $request->menu_id,  
            'jumlah' => $request->jumlah,  
            'total_harga' => $total_harga,  
        ]);  
  
        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil diperbarui.');  
    }  
  
    public function destroy(Transaksi $transaksi)  
    {  
        $transaksi->delete();  
        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil dihapus.');  
    }  
}  

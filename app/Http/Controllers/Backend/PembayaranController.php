<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;


class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayaran = Pembayaran::all();

        $title = 'hapus data!';
        $text  = "apakah anda yakin?";
        confirmDelete($title, $text);

    return view('backend.pembayaran.index', compact('pembayaran'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pembayaran.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
       
        'tanggal' => 'required|unique:pembayarans,tanggal',
        

    ]);

    if (\Carbon\Carbon::parse($request->tanggal)->day != 1) {
        return back()->withErrors(['tanggal' => 'Pembayaran hanya bisa pada tanggal 1 setiap bulan.'])->withInput();
    }
    
    $pembayaran = new Pembayaran();
    $pembayaran->keamanan   = 101120;  // nilai tetap
    $pembayaran->kebersihan = 40000;   // nilai tetap
    $pembayaran->tanggal    = $request->tanggal;
    $pembayaran->total      = $pembayaran->keamanan + $pembayaran->kebersihan; 
    $pembayaran->status = 'belum terbayar';
    $pembayaran->save();

    toast('Data berhasil disimpan', 'success');
    return redirect()->route('backend.pembayaran.index');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        return view('backend.pembayaran.edit', compact('pembayaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|unique:pembayarans,tanggal,' . $id, // unique kecuali data ini
        ]);

        $pembayaran             = Pembayaran::findOrFail($id);
        $pembayaran->keamanan   = 101120; // tetap
        $pembayaran->kebersihan = 40000;  // tetap
        $pembayaran->tanggal    = $request->tanggal;
        $pembayaran->total      = $pembayaran->keamanan + $pembayaran->kebersihan;
        $pembayaran->status     = $request->status ?? $pembayaran->status;
        $pembayaran->save();

        toast('Data berhasil diperbarui', 'success');
        return redirect()->route('backend.pembayaran.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $pembayaran->delete();
        toast('Data berhasil dihapus', 'success');
        return redirect()->route('backend.pembayaran.index');
    }

    public function setLunas(Pembayaran $pembayaran)
    {
        $pembayaran->status = 'pembayaran berhasil';
        $pembayaran->save();

        toast('Status berhasil diubah menjadi Lunas', 'success');
        return redirect()->route('backend.pembayaran.index');
    }
}

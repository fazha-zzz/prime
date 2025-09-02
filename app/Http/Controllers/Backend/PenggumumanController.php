<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penggumuman;
use Carbon\Carbon;


class PenggumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penggumuman = Penggumuman::all();

        $title = 'hapus data!';
        $text  = "apakah anda yakin?";
        confirmDelete($title, $text);

        return view('backend.penggumuman.index', compact('penggumuman'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.penggumuman.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
       'deskripsi' => 'required',
        
    ]);

    $penggumuman = new Penggumuman();
    $penggumuman->deskripsi = $request->deskripsi;
    $penggumuman->tanggal    = Carbon::now()->toDateString();;
    $penggumuman->save();

    toast('Data berhasil disimpan', 'success');
    return redirect()->route('backend.penggumuman.index');
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
        $penggumuman = Penggumuman::findOrFail($id);
        return view('backend.penggumuman.edit', compact('penggumuman'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validated = $request->validate([
        'deskripsi' => 'required|string|max:255',
        
    ]);

    $pengumuman = Pengumuman::findOrFail($id);
    $pengumuman->update($validated);

    toast('Pengumuman berhasil diperbarui', 'success');
    return redirect()->route('backend.pengumuman.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      
    }

     
}

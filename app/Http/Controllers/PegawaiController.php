<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawais = Pegawai::all()->sortByDesc('created_at');
        return view('dashboard.pegawai.index', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
        ]);

        try {
            Pegawai::create($request->all());
            return redirect()->back()->with('success', 'Data Berhasil ditambah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('gagal', 'Data Gagal ditambah');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
        ]);
        try {
            $pegawai->update($request->all());
            return redirect()->back()->with('success', 'Data Berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('gagal', 'Data Gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        try {
            $pegawai->delete();
            return redirect()->back()->with('success', 'Data Berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('gagal', 'Data Gagal dihapus');
        }
    }
}

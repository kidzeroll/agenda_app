<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agendas = Agenda::orderBy('created_at', 'DESC')->get();

        return view('dashboard.agenda.index', compact('agendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //untuk nomor otomatis
        $cek = Agenda::count();
        if ($cek == 0) {
            $nomor = 'APD-00001';
        } else {
            $ambil = Agenda::all()->last();
            $urut = (int)substr($ambil->nomor_agenda, -5) + 1;
            $nomor = 'APD-' . str_pad($urut, 5, 0, STR_PAD_LEFT);
        }

        $pegawais = Pegawai::all();
        return view('dashboard.agenda.create', compact('pegawais', 'nomor'));
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
            'nama_obrik' => 'required',
            'nama_tim' => 'required',
            'nomor_surat' => 'required',
            'nomor_st' => 'required',
            'tanggal_surat' => 'required',
            'tanggal_st' => 'required',
            'jumlah_hari' => 'required',
            'dari_tanggal' => 'required',
            'sampai_tanggal' => 'required',
        ]);

        try {
            $agenda = new Agenda();
            $agenda->nomor_agenda = $request->nomor_agenda;
            $agenda->nama_obrik = $request->nama_obrik;
            $agenda->jumlah_hari = $request->jumlah_hari;
            $agenda->tanggal_surat = $request->tanggal_surat;
            $agenda->tanggal_st = $request->tanggal_st;
            $agenda->nomor_surat = $request->nomor_surat;
            $agenda->nomor_st = $request->nomor_st;
            $agenda->dari_tanggal = $request->dari_tanggal;
            $agenda->sampai_tanggal = $request->sampai_tanggal;
            $agenda->save();
            $agenda->pegawai()->attach($request->nama_tim);

            return redirect()->back()->with('success', 'Data Berhasil ditambah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('gagal', 'Data Gagal ditambah');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        return view('dashboard.agenda.show', compact('agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        $pegawais = Pegawai::all();
        return view('dashboard.agenda.edit', compact('agenda', 'pegawais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        $validated = $request->validate([
            'nama_obrik' => 'required',
            'jumlah_hari' => 'required',
            'nama_tim' => 'required',
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required',
            'nomor_st' => 'required',
            'tanggal_st' => 'required',
            'dari_tanggal' => 'required',
            'sampai_tanggal' => 'required',
            'scan_surat_st' => 'mimes:pdf',
            'scan_kulit_laporan' => 'mimes:pdf',
            'scan_laporan' => 'mimes:pdf',
        ]);

        try {

            if ($request->file('scan_kulit_laporan')) {
                $file = $request->file('scan_kulit_laporan');
                $filename = $agenda->nomor_agenda . '_KULIT_' . time() . '_' . $request->file('scan_kulit_laporan')->extension();
                $filepath = public_path() . '/files/kulit_laporan/';
                $file->move($filepath, $filename);
                $agenda->scan_kulit_laporan = $filename;
            }

            if ($request->file('scan_surat_st')) {
                $file = $request->file('scan_surat_st');
                $filename = $agenda->nomor_agenda . '_SURAT-ST_' . time() . '_' . $request->file('scan_surat_st')->extension();
                $filepath = public_path() . '/files/surat_st/';
                $file->move($filepath, $filename);
                $agenda->scan_surat_st = $filename;
            }

            if ($request->file('scan_laporan')) {
                $file = $request->file('scan_laporan');
                $filename = $agenda->nomor_agenda . '_LAPORAN_' . time() . '_' . $request->file('scan_laporan')->extension();
                $filepath = public_path() . '/files/laporan/';
                $file->move($filepath, $filename);
                $agenda->scan_laporan = $filename;
            }

            $agenda->nama_obrik = $request->nama_obrik;
            $agenda->jumlah_hari = $request->jumlah_hari;
            $agenda->nomor_surat = $request->nomor_surat;
            $agenda->tanggal_surat = $request->tanggal_surat;
            $agenda->nomor_st = $request->nomor_st;
            $agenda->tanggal_st = $request->tanggal_st;
            $agenda->dari_tanggal = $request->dari_tanggal;
            $agenda->sampai_tanggal = $request->sampai_tanggal;
            $agenda->dl_1 = $request->dl_1;
            $agenda->dl_2 = $request->dl_2;
            $agenda->dl_3 = $request->dl_3;
            $agenda->tdt_kaper = $request->tdt_kaper;
            $agenda->no_laporan = $request->no_laporan;
            $agenda->tanggal_laporan = $request->tanggal_laporan;
            $agenda->copy_jilid = $request->copy_jilid;
            $agenda->kembali_dari_jilid = $request->kembali_dari_jilid;
            $agenda->kirim_obrik_deputi = $request->kirim_obrik_deputi;
            $agenda->arsip_kka = $request->arsip_kka;
            $agenda->keterangan = $request->keterangan;
            $agenda->status = $request->status;
            $agenda->save();
            $agenda->pegawai()->sync($request->nama_tim);
            return redirect()->back()->with('success', 'Data Berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('gagal', 'Data Gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        try {
            $agenda->delete();
            return redirect()->back()->with('success', 'Data Berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('gagal', 'Data Gagal dihapus');
        }
    }
}

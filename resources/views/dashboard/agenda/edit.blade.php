@extends('layouts.dashboard')
@section('header', 'Agenda Edit')
@section('title', 'Edit Agenda')
@section('content')

    <form action="{{ route('agenda.update', ['agenda' => $agenda]) }}" method="POST" enctype="multipart/form-data">
        <div class="card shadow mb-4 card-primary">
            <div class="py-3 px-3">
                @csrf
                @method('PATCH')
                <div class="row justify-content-center">
                    <div class="col-6">
                        <div class="form-group text-center text-bold">
                            <label for="nomor_agenda">-- NOMOR AGENDA --</label>
                            <input type="text" class="form-control text-center" name="nomor_agenda"
                                value="{{ $agenda->nomor_agenda }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4 card-primary">
            <div class="py-3 px-3">
                <!--nama obrik-->
                <div class="form-group">
                    <label for="nama_obrik">Nama Obrik</label>
                    <textarea name="nama_obrik" rows="10"
                        class="form-control @error('nama_obrik') is-invalid @enderror">{{ old('nama_obrik', $agenda->nama_obrik) }}</textarea>
                    @error('nama_obrik')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!--nama_tim-->
                <div class="form-group">
                    <label for="nama_tim">Nama Tim</label>
                    <select name="nama_tim[]" class="form-control select2" multiple>
                        @foreach ($pegawais as $pegawai)
                            <option value="{{ $pegawai->id }}"
                                {{ isset($agenda) &&
in_array(
    $pegawai->id,
    $agenda->pegawai()->pluck('id')->toArray(),
)
    ? 'selected'
    : '' }}>
                                {{ $pegawai->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!--jumlah hari-->
                <div class="form-group">
                    <label for="jumlah_hari">Jumlah Hari</label>
                    <input type="text" class="form-control @error('jumlah_hari') is-invalid @enderror" name="jumlah_hari"
                        value="{{ old('jumlah_hari', $agenda->jumlah_hari) }}">
                    @error('jumlah_hari')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="card shadow mb-4 card-primary">
                    <div class="py-3 px-3">
                        <!--nomor surat-->
                        <div class="form-group">
                            <label for="nomor_surat">Nomor Surat</label>
                            <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror"
                                name="nomor_surat" value="{{ old('nomor_surat', $agenda->nomor_surat) }}">
                            @error('nomor_surat')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!--tanggal surat-->
                        <div class="form-group">
                            <label for="tanggal_surat">Tanggal Surat</label>
                            <input type="date" class="form-control @error('tanggal_surat') is-invalid @enderror"
                                name="tanggal_surat"
                                value="{{ old('tanggal_surat', date('Y-m-d', strtotime($agenda->tanggal_surat))) }}">
                            @error('tanggal_surat')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!--dari tanggal-->
                        <div class="form-group">
                            <label for="dari_tanggal">Dari Tanggal</label>
                            <input type="date" class="form-control @error('dari_tanggal') is-invalid @enderror"
                                name="dari_tanggal"
                                value="{{ old('dari_tanggal', date('Y-m-d', strtotime($agenda->dari_tanggal))) }}">
                            @error('dari_tanggal')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card shadow mb-4 card-primary">
                    <div class="py-3 px-3">
                        <!--nomor st-->
                        <div class="form-group">
                            <label for="nomor_st">Nomor ST</label>
                            <input type="text" class="form-control @error('nomor_st') is-invalid @enderror" name="nomor_st"
                                value="{{ old('nomor_st', $agenda->nomor_st) }}">
                            @error('nomor_st')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!--tanggal st-->
                        <div class="form-group">
                            <label for="tanggal_st">Tanggal ST</label>
                            <input type="date" class="form-control @error('tanggal_st') is-invalid @enderror"
                                name="tanggal_st"
                                value="{{ old('tanggal_st', date('Y-m-d', strtotime($agenda->tanggal_st))) }}">
                            @error('tanggal_st')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!--sampai tanggal-->
                        <div class="form-group">
                            <label for="sampai_tanggal">Sampai Tanggal</label>
                            <input type="date" class="form-control @error('sampai_tanggal') is-invalid @enderror"
                                name="sampai_tanggal"
                                value="{{ old('sampai_tanggal', date('Y-m-d', strtotime($agenda->sampai_tanggal))) }}">
                            @error('sampai_tanggal')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="card shadow mb-4 card-primary">
                    <div class="py-3 px-3">
                        <!--nomor laporan-->
                        <div class="form-group">
                            <label for="no_laporan">Nomor Laporan</label>
                            <input type="text" class="form-control @error('no_laporan') is-invalid @enderror"
                                name="no_laporan" value="{{ old('no_laporan', $agenda->no_laporan) }}">
                            @error('no_laporan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!--dl_1-->
                        <div class="form-group">
                            <label for="dl_1">DL 1</label>
                            <input type="date" class="form-control @error('dl_1') is-invalid @enderror" name="dl_1"
                                value="{{ $agenda->dl_1 == null ? old('dl_1') : date('Y-m-d', strtotime($agenda->dl_1)) }}">

                            @error('dl_1') <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!--dl_3-->
                        <div class="form-group">
                            <label for="dl_3">DL 3</label>
                            <input type="date" class="form-control @error('dl_3') is-invalid @enderror" name="dl_3"
                                value="{{ $agenda->dl_3 == null ? old('dl_3') : date('Y-m-d', strtotime($agenda->dl_3)) }}">

                            @error('dl_3') <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card shadow mb-4 card-primary">
                    <div class="py-3 px-3">
                        <!--tanggal laporan-->
                        <div class="form-group">
                            <label for="tanggal_laporan">Tanggal Laporan</label>
                            <input type="date" class="form-control @error('tanggal_laporan') is-invalid @enderror"
                                name="tanggal_laporan"
                                value="{{ $agenda->tanggal_laporan == null ? old('tanggal_laporan') : date('Y-m-d', strtotime($agenda->tanggal_laporan)) }}">

                            @error('tanggal_laporan') <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!--dl_2-->
                        <div class="form-group">
                            <label for="dl_2">DL 2</label>
                            <input type="date" class="form-control @error('dl_2') is-invalid @enderror" name="dl_2"
                                value="{{ $agenda->dl_2 == null ? old('dl_2') : date('Y-m-d', strtotime($agenda->dl_2)) }}">

                            @error('dl_2') <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!--tdt_kaper-->
                        <div class="form-group">
                            <label for="tdt_kaper">Tdt Kaper</label>
                            <input type="date" class="form-control @error('tdt_kaper') is-invalid @enderror"
                                name="tdt_kaper"
                                value="{{ $agenda->tdt_kaper == null ? old('tdt_kaper') : date('Y-m-d', strtotime($agenda->tdt_kaper)) }}">

                            @error('tdt_kaper') <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="card shadow mb-4 card-primary">
                    <div class="py-3 px-3">
                        <!--copy jilid-->
                        <div class="form-group">
                            <label for="copy_jilid">Copy Jilid</label>
                            <input type="text" class="form-control @error('copy_jilid') is-invalid @enderror"
                                name="copy_jilid" value="{{ old('copy_jilid', $agenda->copy_jilid) }}">
                            @error('copy_jilid')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!--kirim obrik deputi-->
                        <div class="form-group">
                            <label for="kirim_obrik_deputi">Kirim Obrik Deputi</label>
                            <input type="text" class="form-control @error('kirim_obrik_deputi') is-invalid @enderror"
                                name="kirim_obrik_deputi"
                                value="{{ old('kirim_obrik_deputi', $agenda->kirim_obrik_deputi) }}">
                            @error('kirim_obrik_deputi')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card shadow mb-4 card-primary">
                    <div class="py-3 px-3">
                        <!--kembali dari jilid-->
                        <div class="form-group">
                            <label for="kembali_dari_jilid">Kembali dari Jilid</label>
                            <input type="date" class="form-control @error('kembali_dari_jilid') is-invalid @enderror"
                                name="kembali_dari_jilid"
                                value="{{ $agenda->kembali_dari_jilid == null ? old('kembali_dari_jilid') : date('Y-m-d', strtotime($agenda->kembali_dari_jilid)) }}">

                            @error('kembali_dari_jilid') <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!--arsip kka-->
                        <div class="form-group">
                            <label for="arsip_kka">Arsip KKA</label>
                            <input type="text" class="form-control @error('arsip_kka') is-invalid @enderror"
                                name="arsip_kka" value="{{ old('arsip_kka', $agenda->arsip_kka) }}">
                            @error('arsip_kka')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4 card-primary">
                    <div class="py-3 px-3">
                        <!--keterangan-->
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" rows="10"
                                class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan', $agenda->keterangan) }}</textarea>
                            @error('keterangan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control selectric">
                                <option value="Dalam Proses" {{ $agenda->status == 'Dalam Proses' ? 'selected' : '' }}>
                                    Dalam
                                    Proses</option>
                                <option value="Selesai" {{ $agenda->status == 'Selesai' ? 'selected' : '' }}>Selesai
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="card shadow mb-4 card-primary">
                    <div class="py-3 px-3">
                        <div class="form-group">
                            <label for="scan_kulit_laporan">Scan Kulit Laporan</label>
                            <input type="file" class="form-control" name="scan_kulit_laporan">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card shadow mb-4 card-primary">
                    <div class="py-3 px-3">
                        <div class="form-group">
                            <label for="scan_surat_st">Scan Surat St</label>
                            <input type="file" class="form-control" name="scan_surat_st">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card shadow mb-4 card-primary">
                    <div class="py-3 px-3">
                        <div class="form-group">
                            <label for="scan_laporan">Scan Laporan</label>
                            <input type="file" class="form-control" name="scan_laporan">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group d-flex flex-row-reverse">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('agenda.index') }}" class="btn btn-danger mr-1">Kembali</a>
        </div>
    </form>
@endsection

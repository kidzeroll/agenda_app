@extends('layouts.dashboard')
@section('header', 'Tambah Agenda')
@section('title', 'Tambah Agenda')
@section('content')
    <form action="{{ route('agenda.store') }}" method="POST">
        @csrf
        <div class="card shadow mb-4 card-primary">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-6">
                        <div class="form-group text-center text-bold">
                            <label for="nomor_agenda">-- NOMOR AGENDA --</label>
                            <input type="text" class="form-control text-center" name="nomor_agenda"
                                value="{{ $nomor }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4 card-primary">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_obrik">Nama Obrik</label>
                    <textarea name="nama_obrik" rows="10"
                        class="form-control @error('nama_obrik') is-invalid @enderror">{{ old('nama_obrik') }}</textarea>
                    @error('nama_obrik')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama_tim">Nama Tim</label>
                    <select name="nama_tim[]" class="form-control select2" multiple>
                        @foreach ($pegawais as $pegawai)
                            <option value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="card shadow mb-4 card-primary">
                    <div class="card-body">

                        <!--nomor surat-->
                        <div class="form-group">
                            <label for="nomor_surat">Nomor Surat</label>
                            <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror"
                                name="nomor_surat" value="{{ old('nomor_surat') }}">
                            @error('nomor_surat')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!--tanggal surat-->
                        <div class="form-group">
                            <label for="tanggal_surat">Tanggal Surat</label>
                            <input type="date" class="form-control @error('tanggal_surat') is-invalid @enderror"
                                name="tanggal_surat" value="{{ old('tanggal_surat') }}">
                            @error('tanggal_surat')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!--dari tanggal-->
                        <div class="form-group">
                            <label for="dari_tanggal">Dari Tanggal</label>
                            <input type="date" class="form-control @error('dari_tanggal') is-invalid @enderror"
                                name="dari_tanggal" value="{{ old('dari_tanggal') }}">
                            @error('dari_tanggal')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card shadow mb-4 card-primary">
                    <div class="card-body">

                        <!--nomor st-->
                        <div class="form-group">
                            <label for="nomor_st">Nomor ST</label>
                            <input type="text" class="form-control @error('nomor_st') is-invalid @enderror" name="nomor_st"
                                value="{{ old('nomor_st') }}">
                            @error('nomor_st')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!--tanggal st-->
                        <div class="form-group">
                            <label for="tanggal_st">Tanggal ST</label>
                            <input type="date" class="form-control @error('tanggal_st') is-invalid @enderror"
                                name="tanggal_st" value="{{ old('tanggal_st') }}">
                            @error('tanggal_st')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!--sampai tanggal-->
                        <div class="form-group">
                            <label for="sampai_tanggal">Sampai Tanggal</label>
                            <input type="date" class="form-control @error('sampai_tanggal') is-invalid @enderror"
                                name="sampai_tanggal" value="{{ old('sampai_tanggal') }}">
                            @error('sampai_tanggal')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>
        </div>




        <div class="card shadow mb-4 card-primary">
            <div class="card-body">
                <div class="form-group">
                    <label for="jumlah_hari">Jumlah Hari</label>
                    <input type="text" class="form-control @error('jumlah_hari') is-invalid @enderror" name="jumlah_hari"
                        value="{{ old('jumlah_hari') }}">
                    @error('jumlah_hari')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group d-flex flex-row-reverse">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('agenda.index') }}" class="btn btn-danger mr-1">Kembali</a>
                </div>
            </div>
        </div>
    </form>
@endsection

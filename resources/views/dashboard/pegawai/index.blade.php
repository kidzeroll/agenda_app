@extends('layouts.dashboard')
@section('header', 'Pegawai')
@section('title', 'Pegawai')
@section('content')
    <div class="card shadow mb-4 card-primary">
        <div class="card-header py-3">

            <!--btn tambah-->
            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-store">
                <i class="fas fa-plus-circle"></i>
                <span>Tambah Pegawai</span>
            </button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable">
                    <thead>
                        <tr class="text-center">
                            <th class="align-middle col-1">No</th>
                            <th class="align-middle">Nama Pegawai</th>
                            <th class="align-middle">NIP</th>
                            <th class="align-middle">Jabatan</th>
                            <th class="align-middle col-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawais as $pegawai)
                            <tr>
                                <td class="align-middle text-center">{{ $loop->iteration }}</td>
                                <td class="align-middle text-center">{{ $pegawai->nama }}</td>
                                <td class="align-middle text-center">{{ $pegawai->nip }}</td>
                                <td class="align-middle text-center">{{ $pegawai->jabatan }}</td>
                                <td class="align-middle text-center">

                                    <!--btn show-->
                                    <button class="btn btn-sm btn-warning" data-toggle="modal"
                                        data-target="#modal-show-{{ $pegawai->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    <!-- btn edit -->
                                    <button class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#modal-edit-{{ $pegawai->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <form action="{{ route('pegawai.destroy', ['pegawai' => $pegawai]) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <!-- btn delete -->
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-sm btn-danger show-confirm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('modal')

    <!--store modal-->
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-store">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <!--modal header-->
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!--modal body-->
                <form action="{{ route('pegawai.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                value="{{ old('nama') }}">
                            @error('nama')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip"
                                value="{{ old('nip') }}">
                            @error('nip')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan"
                                value="{{ old('jabatan') }}">
                            @error('jabatan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!--modal button-->
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="fas fa-arrow-left"></i>
                            <span>Kembali</span>
                        </button>
                        <button type="submit" class="btn btn-primary btn-simpan" data-id="id-simpan">
                            <i class="fas fa-save"></i>
                            <span>Simpan</span>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!--end store modal-->

    <!--edit modal-->
    @foreach ($pegawais as $pegawai)
        <div class="modal fade" tabindex="-1" role="dialog" id="modal-edit-{{ $pegawai->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <!--modal header-->
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Pegawai</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <!--modal body-->
                    <form action="{{ route('pegawai.update', ['pegawai' => $pegawai]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                    value="{{ old('nama', $pegawai->nama) }}">
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip"
                                    value="{{ old('nip', $pegawai->nip) }}">
                                @error('nip')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                    name="jabatan" value="{{ old('jabatan', $pegawai->jabatan) }}">
                                @error('jabatan')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                    value="{{ old('alamat', $pegawai->alamat) }}">
                                @error('alamat')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email', $pegawai->email) }}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="hp">No HP</label>
                                <input type="text" class="form-control @error('hp') is-invalid @enderror" name="hp"
                                    value="{{ old('hp', $pegawai->hp) }}">
                                @error('hp')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!--modal button-->
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <i class="fas fa-arrow-left"></i>
                                <span>Kembali</span>
                            </button>
                            <button type="submit" class="btn btn-primary btn-simpan" data-id="id-update">
                                <i class="fas fa-save"></i>
                                <span>Update</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <!--end edit modal-->

    <!--show modal-->
    @foreach ($pegawais as $pegawai)
        <div class="modal fade" tabindex="-1" role="dialog" id="modal-show-{{ $pegawai->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <!--modal header-->
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Pegawai</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <!--modal body-->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ $pegawai->nama }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" name="nip" value="{{ $pegawai->nip }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" value="{{ $pegawai->jabatan }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{ $pegawai->alamat }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ $pegawai->email }}"
                                readonly>
                        </div>

                        <div class="form-group">
                            <label for="hp">No Hp</label>
                            <input type="text" class="form-control" name="hp" value="{{ $pegawai->hp }}" readonly>
                        </div>
                    </div>

                    <!--modal button-->
                    <div class="modal-footer bg-whitesmoke br d-flex flex-row-reverse">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="fas fa-arrow-left"></i>
                            <span>Kembali</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!--end show modal-->

@endsection

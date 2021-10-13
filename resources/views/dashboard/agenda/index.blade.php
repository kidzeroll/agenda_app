@extends('layouts.dashboard')
@section('header', 'Agenda')
@section('title', 'Agenda')
@section('content')
    <div class="card shadow mb-4 card-primary">
        <div class="card-header py-3">

            <!--btn tambah-->
            <a href="{{ route('agenda.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i>
                <span>Tambah Agenda</span>
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable">
                    <thead>
                        <tr class="text-center">
                            <th class="align-middle">No</th>
                            <th class="align-middle">Nomor Agenda</th>
                            <th class="align-middle col-2">Nama Obrik</th>
                            <th class="align-middle col-2">Nama Tim</th>
                            <th class="align-middle">Nomor Surat</th>
                            <th class="align-middle">Nomor ST</th>
                            <th class="align-middle">Jumlah Hari</th>
                            <th class="align-middle">Status</th>
                            <th class="align-middle col-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agendas as $agenda)
                            <tr>
                                <td class="align-middle text-center">{{ $loop->iteration }}</td>
                                <td class="align-middle text-center">{{ $agenda->nomor_agenda }}</td>
                                <td class="align-middle">{{ $agenda->nama_obrik }}</td>
                                <td class="align-middle">
                                    @foreach ($agenda->pegawai as $pegawai)
                                        - {{ $pegawai->nama }}<br>
                                    @endforeach
                                </td>
                                <td class="align-middle text-center">{{ $agenda->nomor_surat }}</td>
                                <td class="align-middle text-center">{{ $agenda->nomor_st }}</td>
                                <td class="align-middle text-center">{{ $agenda->jumlah_hari }}</td>
                                <td class="align-middle text-center">
                                    <span
                                        class="badge {{ $agenda->status == 'Dalam Proses' ? 'badge-warning' : 'badge-success' }}">{{ $agenda->status }}
                                    </span>
                                </td>
                                <td class="align-middle text-center">

                                    <!--btn show-->
                                    <a href="{{ route('agenda.show', ['agenda' => $agenda]) }}"
                                        class="btn btn-sm btn-warning">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <!-- btn edit -->
                                    <a href="{{ route('agenda.edit', ['agenda' => $agenda]) }}"
                                        class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('agenda.destroy', ['agenda' => $agenda]) }}" method="post"
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

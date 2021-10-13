@extends('layouts.dashboard')
@section('header', 'Agenda Detail')
@section('title', 'Detail Agenda')
@section('content')

    <!--baris 1-->
    <div class="row">
        <div class="col-3">
            <div class="card card-statistic-1 card-primary">
                <div class="card-icon bg-primary">
                    <i class="far fa-dot-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Nomor Agenda</h4>
                    </div>
                    <div class="card-body">
                        <h6>{{ $agenda->nomor_agenda }}</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card card-statistic-1 card-primary">
                <div class="card-icon bg-warning">
                    <i class="far fa-envelope"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Nomor Surat</h4>
                    </div>
                    <div class="card-body">
                        <h6>{{ $agenda->nomor_surat }}</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card card-statistic-1 card-primary">
                <div class="card-icon bg-success">
                    <i class="far fa-envelope-open"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Nomor ST</h4>
                    </div>
                    <div class="card-body">
                        <h6>{{ $agenda->nomor_st }}</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card card-statistic-1 card-primary">
                <div class="card-icon bg-danger">
                    <i class="far fa-clipboard"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Nomor Laporan</h4>
                    </div>
                    <div class="card-body">
                        <h6>{{ $agenda->no_laporan == null ? '-' : $agenda->no_laporan }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--baris 2-->
    <div class="row">
        <div class="col-6">
            <div class="card shadow card-warning">
                <div class="card-header">
                    <h6 class="text-primary"><b>Nama Obrik</b></h6>
                </div>
                <div class="card-body">
                    <p> {{ $agenda->nama_obrik }}</p>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card shadow card-warning">
                <div class="card-header">
                    <h6 class="text-primary"><b>Nama Tim</b></h6>
                </div>
                <div class="card-body">
                    <p>
                        @foreach ($agenda->pegawai as $pegawai)
                            - {{ $pegawai->nama }} <br>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>


    </div>

    <!--baris 3-->
    <div class="row">
        <div class="col-3">
            <div class="card shadow card-info">
                <div class="card-header text-primary">
                    <h6><b>Tanggal Surat</b></h6>
                </div>
                <div class="card-body">
                    {{ $agenda->tanggal_surat->format('d-M-Y') }}
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card shadow card-info">
                <div class="card-header text-primary">
                    <h6><b>Tanggal ST</b></h6>
                </div>
                <div class="card-body">
                    {{ $agenda->tanggal_st->format('d-M-Y') }}
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card shadow card-info">
                <div class="card-header text-primary">
                    <h6><b>Dari Tanggal</b></h6>
                </div>
                <div class="card-body">
                    {{ $agenda->dari_tanggal->format('d-M-Y') }}
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow card-info">
                <div class="card-header text-primary">
                    <h6><b>Sampai Tanggal</b></h6>
                </div>
                <div class="card-body">
                    {{ $agenda->sampai_tanggal->format('d-M-Y') }}
                </div>
            </div>
        </div>
    </div>

    <!--baris 4-->
    <div class="row">
        <div class="col-3">
            <div class="card shadow card-success">
                <div class="card-header text-primary">
                    <h6><b>DL 1</b></h6>
                </div>
                <div class="card-body">
                    {{ $agenda->dl_1 == null ? '-' : $agenda->dl_1->format('d-M-Y') }}
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card shadow card-success">
                <div class="card-header text-primary">
                    <h6><b>DL 2</b></h6>
                </div>
                <div class="card-body">
                    {{ $agenda->dl_2 == null ? '-' : $agenda->dl_2->format('d-M-Y') }}
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow card-success">
                <div class="card-header text-primary">
                    <h6><b>DL 3</b></h6>
                </div>
                <div class="card-body">
                    {{ $agenda->dl_3 == null ? '-' : $agenda->dl_3->format('d-M-Y') }}
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow card-success">
                <div class="card-header text-primary">
                    <h6><b>Tdt Kaper</b></h6>
                </div>
                <div class="card-body">
                    {{ $agenda->tdt_kaper == null ? '-' : $agenda->tdt_kaper->format('d-M-Y') }}
                </div>
            </div>
        </div>
    </div>

    <!--baris 5-->
    <div class="row">
        <div class="col-3">
            <div class="card shadow card-dark">
                <div class="card-header text-primary">
                    <h6><b>Jumlah Hari</b></h6>
                </div>
                <div class="card-body">
                    {{ $agenda->jumlah_hari }}
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card shadow card-dark">
                <div class="card-header text-primary">
                    <h6><b>Tanggal Laporan</b></h6>
                </div>
                <div class="card-body">
                    {{ $agenda->tanggal_laporan == null ? '-' : $agenda->tanggal_laporan->format('d-M-Y') }}
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card shadow card-dark">
                <div class="card-header text-primary">
                    <h6><b>Copy/Jilid</b></h6>
                </div>
                <div class="card-body">
                    {{ $agenda->copy_jilid == null ? '-' : $agenda->copy_jilid }}
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card shadow card-dark">
                <div class="card-header text-primary">
                    <h6><b>Kembali Dari Jilid</b></h6>
                </div>
                <div class="card-body">
                    {{ $agenda->kembali_dari_jilid == null ? '-' : $agenda->kembali_dari_jilid->format('d-M-Y') }}
                </div>
            </div>
        </div>

    </div>

    <!--baris 6-->
    <div class="row">
        <div class="col-4">
            <div class="card shadow card-secondary">
                <div class="card-header">
                    <h6 class="text-primary"><b>Kirim Obrik Deputi</b></h6>
                </div>
                <div class="card-body">
                    {{ $agenda->kirim_obrik_deputi == null ? '-' : $agenda->kirim_obrik_deputi }}
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card shadow card-secondary">
                <div class="card-header">
                    <h6 class="text-primary"><b>Arsip KKA</b></h6>
                </div>
                <div class="card-body">
                    {{ $agenda->arsip_kka == null ? '-' : $agenda->arsip_kka }}
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card shadow card-secondary">
                <div class="card-header">
                    <h6 class="text-primary"><b>Keterangan</b></h6>
                </div>
                <div class="card-body">
                    {{ $agenda->keterangan == null ? '-' : $agenda->keterangan }}
                </div>
            </div>
        </div>
    </div>

    <!--baris 7 -->
    <div class="row">
        <div class="col-4">
            <div class="card shadow card-danger">
                <div class="card-header">
                    <h6 class="text-primary"><b>Scan Kulit Laporan</b></h6>
                </div>
                <div class="card-body">

                    @if ($agenda->scan_kulit_laporan == null)
                        -
                    @else
                        <a href="{{ asset('files/kulit_laporan/' . $agenda->scan_kulit_laporan) }}"
                            target="_blank">{{ $agenda->scan_kulit_laporan }}</a>
                    @endif

                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card shadow card-danger">
                <div class="card-header">
                    <h6 class="text-primary"><b>Scan Surat/ST</b></h6>
                </div>
                <div class="card-body">
                    @if ($agenda->scan_surat_st == null)
                        -
                    @else
                        <a href="{{ asset('files/surat_st/' . $agenda->scan_surat_st) }}"
                            target="_blank">{{ $agenda->scan_surat_st }}</a>
                    @endif

                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card shadow card-danger">
                <div class="card-header">
                    <h6 class="text-primary"><b>Scan Laporan</b></h6>
                </div>
                <div class="card-body">
                    @if ($agenda->scan_laporan == null)
                        -
                    @else

                        <a href="{{ asset('files/laporan/' . $agenda->scan_laporan) }}"
                            target="_blank">{{ $agenda->scan_laporan }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!--baris 8-->
    <div class="card shadow mb-4 card-primary">
        <div class="card-body">
            <div class="text-center">
                <h6>Status</h6>
                <h2 class="{{ $agenda->status == 'Dalam Proses' ? 'text-warning' : 'text-primary' }}">
                    {{ $agenda->status }}
                </h2>
            </div>
        </div>
    </div>

    <!--baris 9-->
    <div class="row">
        <div class="col-12">
            <div class="form-group d-flex flex-row-reverse">
                <a href="{{ route('agenda.index') }}" class="btn btn-danger mr-1">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali</span>
                </a>
            </div>
        </div>
    </div>

@endsection

@extends('layouts.dashboard')
@section('header', 'Dashboard')
@section('title', 'Dashboard')
@section('content')
    <div class="row">

        <div class="col-3">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Agenda Hari ini</h4>
                    </div>
                    <div class="card-body">
                        {{ $today }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Status Selesai</h4>
                    </div>
                    <div class="card-body">
                        {{ $selesai }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Agenda</h4>
                    </div>
                    <div class="card-body">
                        {{ $total }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-calendar-day"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Tanggal</h4>
                    </div>
                    <div class="card-body">
                        <p>{{ date('d-M-Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

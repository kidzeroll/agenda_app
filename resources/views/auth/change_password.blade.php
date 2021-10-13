@extends('layouts.auth')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                    <h3 class="text-primary">Ganti Password</h3>
                </div>

                <div class="card card-primary">
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            @method("PATCH")

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password Sebelumnya</label>
                                </div>
                                <input id="current_password" type="password"
                                    class="form-control @error('current_password') is-invalid @enderror"
                                    name="current_password" tabindex="1" autofocus required
                                    value="{{ old('current_password') }}">
                                @error('current_password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password Baru</label>
                                </div>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    tabindex="2" required>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password-confirm" class="control-label">Konfirmasi Password Baru</label>
                                </div>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" autocomplete="new-password" tabindex="3" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Ganti Password
                                </button>
                                <a href="{{ route('dashboard') }}" class="btn btn-danger btn-lg btn-block">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="simple-footer">
                    Copyright &copy; Muhammad Haykal 2021
                </div>
            </div>
        </div>
    </div>
@endsection

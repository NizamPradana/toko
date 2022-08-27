@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-md-8 col-sm-10">
        <div class="card my-3 shadow">
            <div class="card-body">
                <h1 class="text-center">DAFTAR</h1>
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="row p-2">
                        <div class="col-md-6 mb-1 ">
                            <div class="form-floating">
                                <input type="text" name="nama" id="nama" class="form-control shadow @error('nama') is-invalid @enderror" required placeholder="Masukan Nama Lengkap..." value="{{ old('nama') }}">
                                <label for="nama">Nama Lengkap</label>
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-1 ">
                            <div class="form-floating">
                                <input type="email" name="email" id="email" class="form-control shadow @error('email') is-invalid @enderror" required placeholder="Masukan Email..." value="{{ old('email') }}">
                                <label for="email">Email</label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row p-2">
                        <div class="col-md-6 mb-1 ">
                            <div class="form-floating">
                                <input type="number" name="no_telp" id="telp" class="form-control shadow @error('no_telp') is-invalid @enderror" required placeholder="Masukan No Telp ..." value="{{ old('no_telp') }}">
                                <label for="no_telp">No Telp </label>
                                @error('no_telp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-1 ">
                            <div class="form-floating">
                                <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control shadow @error('tgl_lahir') is-invalid @enderror" required placeholder="Masukan Tanggal Lahir..." value="{{ old('tgl_lahir') }}">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                @error('tgl_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row p-2">
                        <div class="col-md-6 mb-1 ">
                            <div class="form-floating">
                                <input type="text" name="password" id="password" class="form-control shadow @error('password') is-invalid @enderror" required placeholder="Masukan Password ...">
                                <label for="password">Password </label>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-1 ">
                            <div class="form-floating">
                                <input type="text" id="conf_pass" class="form-control shadow" required onchange="confPass()">
                                <label for="conf_pass">Confirmasi Password</label>
                            </div>
                        </div>
                    </div>

                    <div class="row p-2 mb-1 ">
                        <div class="form-floating">
                            <textarea name="alamat" id="alamat"  class="form-control shadow @error('alamat') is-invalid @enderror" required placeholder="Alamat Lengkap.." value="{{ old('alamat') }}"></textarea>
                            <label for="alamat" class="text-center">Alamat Lengkap</label>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- <input type="hidden" name="role" value="user"> --}}

                    <div class="p-2">
                        <input type="submit" value="DAFTAR" class="btn btn-primary w-100">
                    </div>

                </form>
                <hr>
                <p class="text-center">Sudah punya akun? <a class="text-decoration-none" href="{{ route('viewLogin') }}">Login</a></p>
            </div>
        </div>
    </div>
</div>

<script>
    function confPass()
    {
        var pass = document.getElementById('password').value;
        var conf = document.getElementById('conf_pass').value;
        if(pass != conf)
        {
            alert('Password tidak sama');
            document.getElementById('conf_pass').value = '';
        }
    }



</script>

@endsection
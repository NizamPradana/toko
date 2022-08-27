@extends('dashboard.layouts.dashboard')

@section('content-wrapper')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Toko Kita</h1>
              @if (session()->has('success'))
                    <div class="alert alert-success " role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger " role="alert">
                        {{ session('error') }}
                @endif
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-8">
              <div class="card">
                <div class="card-header bg-primary">
                  <div class="">Tambah user baru.</div>
                </div>
                <div class="card-body">
                  <form action="/register" method="post">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Nama</label>
                          <input type="text" name="nama" class="form-control" placeholder="Masukan Nama User.." required />
                        </div>
                      </div>
                      <!-- ./col   -->
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">No Telp</label>
                          <input type="number" name="no_telp" class="form-control" placeholder="Masukan No Telp.." required />
                        </div>
                      </div>
                      <!-- ./col -->
                    </div>
                    <!-- ./row -->
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Email</label>
                          <input type="email" name="email" class="form-control" placeholder="Masukan Email..." required />
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Tanggal Lahir</label>
                          <input type="date" name="tgl_lahir" class="form-control" required />
                        </div>
                      </div>
                      <!-- ./col -->
                    </div>
                    <!-- ./row -->
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Password</label>
                          <input type="text" name="password" class="form-control" placeholder="Masukan Password..." required />
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Role</label>
                          <select name="role" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                          </select>
                        </div>
                      </div>
                      <!-- ./col -->
                    </div>
                    <!-- ./row -->
                    <div class="row">
                      <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" class="form-control" cols="100" rows="4"></textarea>
                      </div>
                    </div>
                    <!-- ./row -->
                    <input type="submit" value="Tambahkan" class="btn btn-primary" />
                  </form>
                </div>
              </div>
            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
@endsection
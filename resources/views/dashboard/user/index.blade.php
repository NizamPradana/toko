@extends('dashboard.layouts.dashboard')

@section('content-wrapper')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Toko Kita</h1>
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
            <div class="col-lg-11">
              <div class="card">
                <div class="card-header bg-primary">
                  <div class="">Daftar user terdaftar.</div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>No Telp</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Tanggal Lahir</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->no_telp }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ Str::upper($row->role) }}</td>
                                <td>{{ date('d M Y', strtotime($row->tgl_lahir)) }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>

                    <!-- Modal change status -->
                    <div class="modal fade" id="changeStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header bg-primary">
                            <h5 class="modal-title" id="exampleModalLabel">Tampilkan di Shop</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="#" method="post">
                              <div class="form-group">
                                <label for="">Pajang</label>
                                <select name="status_pajang" class="form-control">
                                  <option value="">- Pilih -</option>
                                  <option value="1">Pajang</option>
                                  <option value="0">Jangan Pajang</option>
                                </select>
                              </div>
                              <input type="submit" value="Ubah" class="btn btn-primary" />
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- modal   -->
                  </div>
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
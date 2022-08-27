@extends('dashboard.layouts.dashboard')

@section('content-wrapper')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Toko Kita</h1>
              <p class="text-muted small">*Klik pada status pajang barang untuk merubahnya.</p>

              @if (session()->has('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>              
              </div>    
              @elseif(session()->has('error'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>  
              </div>    
              @endif

              <button class="btn btn-primary " data-toggle="modal" data-target="#modalTambah">
                <i class="fas fa-plus"></i>
                Tambah Barang
              </button>

              <!-- Modal tambah barang -->
              <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        @csrf
                        <div class="form-group">
                          <label for="">Nama Barang</label>
                          <input type="text" name="nama_barang" class="form-control" placeholder="Masukan Nama Barang.." required>
                        </div>
                        <div class="form-group">
                          <label for="">Merek Barang</label>
                          <input type="text" name="merek" class="form-control" placeholder="Masukan Merek Barang.." required>
                        </div>
                        <div class="form-group">
                            <label for="">Harga Barang</label>
                            <input type="number" name="harga_satuan" class="form-control" placeholder="Masukan Harga Barang..." required>
                        </div>
                        <div class="form-group">
                            <label for="">Stok Barang</label>
                            <input type="number" name="stok" class="form-control" placeholder="Masukan Stok Barang..." required>
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi Barang</label>
                            <textarea name="deskripsi" class="form-control" required cols="20" rows="7"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Foto Barang <small>*soon</small></label>
                            <input type="file" disabled name="gambar" class="form-control" >
                        </div>
                        <input type="submit" value="Tambah" class="btn btn-primary" />
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- modal   -->
              
            </div>
          </div>
            
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
                  <div class="">Daftar Barang.</div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Barang</th>
                          <th>Merek</th>
                          <th>Harga</th>
                          <th>Stok</th>
                          <th>Status</th>
                          <th>Dipajang</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($barang as $row)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $row->nama_barang }}</td>
                          <td>{{ $row->merek }}</td>
                          <td>Rp. {{ $row->harga_satuan }}</td>
                          <td>{{ $row->stok }}</td>
                          <td>
                            @if ($row->stok <= 0)
                                <span class="badge  bg-danger">Tidak Tersedia</span>                            
                            @else
                                <span class="badge  bg-success">Tersedia</span>
                            @endif
                          </td>
                          <td>
                            @if ($row->status_dipajang == 1)
                                <span class="badge bg-info" style="cursor: pointer" data-toggle="modal" data-target="#changeStatus{{ $row->id }}">DiPajang</span>
                            @else
                                <span class="badge bg-danger" style="cursor: pointer" data-toggle="modal" data-target="#changeStatus{{ $row->id }}">Tidak Dipajang</span>
                            @endif
                          </td>
                          <td>
                            <a href="#" class="btn btn-primary btn-sm">
                              <i class="fas fa-eye"></i>
                            </a>
                          </td>
                        </tr>
                        <!-- Modal change status -->
                        <div class="modal fade" id="changeStatus{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header bg-primary">
                                <h5 class="modal-title" id="exampleModalLabel">Tampilkan di Shop</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="{{ route('updateStatusBarang') }}" method="post">
                                    @csrf
                                  <div class="form-group">
                                    <label for="">Pajang</label>
                                    <select name="status_dipajang" class="form-control">
                                      <option selected value="{{ $row->status_dipajang }}">{{ $row->status_dipajang == 1 ? 'Dipajang' : 'Tidak Dipajang' }}</option>
                                      <option value="">- Pilih -</option>
                                      <option value="1">Dipajang</option>
                                      <option value="0">Tidak Pajang</option>
                                    </select>
                                    <input type="hidden" name="id" value="{{ $row->id }}">
                                  </div>
                                  <input type="submit" value="Ubah" class="btn btn-primary" />
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- modal   -->
                        @endforeach
                      </tbody>
                    </table>

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
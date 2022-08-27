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
                  <div class="">Riwayat Pembayaran.</div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>ID Pesanan</th>
                          <th>Nama Pengirim</th>
                          <th>Tanggal Pembayaran</th>
                          <th>Nominal</th>
                          <th>Via</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>2004220001</td>
                          <td>Gunawan Dwi</td>
                          <td>20 April 2022</td>
                          <td>Rp. 250.000</td>
                          <td>BCA</td>
                          <td>
                            <a href="detailPesanan.html" class="btn btn-primary btn-sm">
                              <i class="fas fa-eye"></i>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>2304220002</td>
                          <td>Bagas Aji</td>
                          <td>23 April 2022</td>
                          <td>Rp. 307.000</td>
                          <td>BCA</td>
                          <td>
                            <a href="#" class="btn btn-primary btn-sm">
                              <i class="fas fa-eye"></i>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>1304220003</td>
                          <td>Nurmawar</td>
                          <td>13 April 2022</td>
                          <td>Rp. 125.000</td>
                          <td>Gopay</td>
                          <td>
                            <a href="#" class="btn btn-primary btn-sm">
                              <i class="fas fa-eye"></i>
                            </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>

                    <!-- Modal change status -->
                    <div class="modal fade" id="changeStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header bg-primary">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Status Pesanan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="#" method="post">
                              <div class="form-group">
                                <label for="">Status Pesanan</label>
                                <select name="status_pesanan" class="form-control">
                                  <option value="">- Pilih -</option>
                                  <option value="Baru">Baru</option>
                                  <option value="Proses">Proses</option>
                                  <option value="Dikirim">Dikirim</option>
                                  <option value="Selesai">Selesai</option>
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
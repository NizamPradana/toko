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
                  <div class="">Detail Pesanan.</div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <!-- pemesan -->
                    <div class="col-md-6">
                      <h3 class="lead">Detail Pemesan :</h3>
                      <div class="responsive">
                        <table class="table table-bordered text-center">
                          <tr>
                            <td>Nama</td>
                            <td>Nizam Pradana</td>
                          </tr>
                          <tr>
                            <td>No Telp</td>
                            <td>089607905512</td>
                          </tr>
                          <tr>
                            <td>Email</td>
                            <td>nijamyoi@gmail.com</td>
                          </tr>
                          <tr>
                            <td>Alamat</td>
                            <td>Jl. Gatot Subroto no. 32 Dukuhsalam</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    <!-- ./pemesan -->
                    <!-- info pesanan -->
                    <div class="col-md-6">
                      <h3 class="lead">Informasi Pesanan :</h3>
                      <div class="responsive">
                        <table class="table table-bordered text-center">
                          <tr>
                            <td>Tanggal Pesan</td>
                            <td>28 Juni 2021</td>
                          </tr>
                          <tr>
                            <td>Status Pesanan</td>
                            <td>Baru</td>
                          </tr>
                          <tr>
                            <td>Status Pembayaran</td>
                            <td>Success</td>
                          </tr>
                          <tr>
                            <td>Subtotal Barang</td>
                            <td>Rp. 300.000</td>
                          </tr>
                          <tr>
                            <td>Ongkir</td>
                            <td>Rp. 7.000</td>
                          </tr>
                          <tr class="bg-info">
                            <td>Total Tagihan</td>
                            <td>Rp. 307.000</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    <!-- ./info pesanan -->
                  </div>
                  <!-- ./row -->
                  <hr />
                  <div class="row">
                    <div class="col-md-10">
                      <h3 class="lead">Barang Dipesan :</h3>
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead class="table-info">
                            <tr>
                              <th>No</th>
                              <th>Nama Barang</th>
                              <th>Harga</th>
                              <th>Jumlah</th>
                              <th>Subtotal</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>Baju</td>
                              <td>Rp. 100.000</td>
                              <td>1</td>
                              <td>Rp. 100.000</td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>Celana</td>
                              <td>Rp. 100.000</td>
                              <td>1</td>
                              <td>Rp. 100.000</td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>Sepatu</td>
                              <td>Rp. 100.000</td>
                              <td>1</td>
                              <td>Rp. 100.000</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <!-- ./row -->
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
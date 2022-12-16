@extends('mainPage.layouts.main')

@section('container')

    <!-- cart -->
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <h2>Detail Pesanan</h2>
          <div class="row">
            <div class="col-lg-8 col-md-12">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                {{-- items list --}}
              <div class="cart-table-wrap">
                <table class="cart-table">
                  <thead class="cart-table-head">
                    <tr class="table-head-row">
                      {{-- <th class="product-image">Product Image</th> --}}
                      <th class="product-name">Nama</th>
                      <th class="product-price">Harga</th>
                      <th class="product-quantity">Quantity</th>
                      <th class="product-total">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>Mouse</td>
                        <td>35000</td>
                        <td>2</td>
                        <td>70000</td>
                    </tr>
                    <tr>
                        <td>Keyboard</td>
                        <td>150000</td>
                        <td>1</td>
                        <td>300000</td>
                    </tr>
                  </tbody>
                </table>
              </div>

              {{-- user identity --}}
              <div class="total-section mt-4">
                <table class="total-table">
                  <thead class="total-table-head">
                    <tr class="table-total-row">
                      <th colspan="2" class="text-center">Penerima</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="total-data">
                      <td><strong>Nama  </strong></td>
                      <td>Nizam Pradana</td>
                    </tr>
                    <tr class="total-data">
                      <td><strong>Alamat </strong></td>
                      <td>Jl. Gatot Subroto rt. 04/02 Dukuhsalam, Kec. Slawi</td>
                    </tr>
                    <tr class="total-data">
                      <td><strong>No Telp </strong></td>
                      <td>08999999999</td>
                    </tr>
                    <tr class="total-data">
                      <td><strong>Email </strong></td>
                      <td>nizam@gmail.com</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="col-lg-4">
                {{-- total section --}}
              <div class="total-section">
                <table class="total-table">
                  <thead class="total-table-head">
                    <tr class="table-total-row">
                      <th colspan="2" class="text-center">Rincian Pesanan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="total-data">
                      <td><strong>Tanggal Pesan: </strong></td>
                      <td> 22 Jan 2020</td>
                    </tr>
                    <tr class="total-data">
                      <td><strong>Subtotal: </strong></td>
                      <td> Rp. 370.000</td>
                    </tr>
                    <tr class="total-data">
                      <td><strong>Items Total: </strong></td>
                      <td>3</td>
                    </tr>
                    <tr class="total-data">
                      <td><strong>Status Pembayaran: </strong></td>
                      <td>
                        <span class="badge bg-success">Success</span>
                      </td>
                    </tr>
                    <tr class="total-data">
                      <td><strong>Status Pesanan: </strong></td>
                      <td>
                        <span class="badge bg-info">Diproses</span>
                      </td>
                    </tr>
                    {{-- <tr class="total-data">
                      <td><strong>Status Pengiriman: </strong></td>
                      <td></td>
                    </tr> --}}
                  </tbody>
                </table>

                <div class="cart-buttons">
                    <a href="#" class="boxed-btn black">Kembali</a>
                </div>
                <div class="cart-buttons">
                    <a href="#" class="boxed-btn black">Cek Status Pembayaran</a>
                </div>

              </div>

            </div>
          </div>
        </div>
      </div>
      <!-- end cart -->


@endsection

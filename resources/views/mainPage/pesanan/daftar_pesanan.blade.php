@extends('mainPage.layouts.main')

@section('container')
    <!-- cart -->
    <div class="cart-section mt-100 mb-150">
        <div class="container">
            <h2>Daftar Pesanan</h2>
          <div class="row">
            <div class="col-lg-10 col-md-12">
                {{-- @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif --}}
              <div class="cart-table-wrap table-responsive">
                <table class="cart-table">
                  <thead class="cart-table-head">
                    <tr class="table-head-row">
                      <th class="product-number">No</th>
                      {{-- <th class="product-image">Product Image</th> --}}
                      <th class="product-name">Tanggal Pesanan</th>
                      <th class="product-total">Total</th>
                      <th class="product-price">Status Pesanan</th>
                      <th class="product-quantity">Status Pembayaran</th>
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($datas as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ date('d M y H:i', strtotime($row->created_at)) }}</td>
                            <td> @rupiah($row->subtotal) </td>
                            <td>
                                <span class="badge bg-success">Success </span>
                            </td>
                            <td>
                                <span class="badge bg-success">Success </span>
                            </td>
                            <td>
                                <span class="badge bg-info">
                                    <a href="{{ route('detail-pesanan-user', ['userId' => $row->user_id , 'pesananId' => $row->id]) }}" class="text-white">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-danger">
                                    <a href="" class="text-white">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div>
      </div>
      <!-- end cart -->


@endsection

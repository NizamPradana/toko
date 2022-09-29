@extends('mainPage.layouts.main')

@section('container')

    <!-- cart -->
    <div class="cart-section mt-150 mb-150">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-12">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
              <div class="cart-table-wrap">
                <table class="cart-table">
                  <thead class="cart-table-head">
                    <tr class="table-head-row">
                      <th class="product-remove"></th>
                      {{-- <th class="product-image">Product Image</th> --}}
                      <th class="product-name">Nama</th>
                      <th class="product-price">Harga</th>
                      <th class="product-quantity">Quantity</th>
                      <th class="product-total">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($items)
                        @foreach ($items as $item)
                            <tr class="table-body-row">
                                <td class="product-remove">
                                    <form action="{{ route('keranjang.destroy', $item->rowId) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-transparent border-0"><i class="far fa-window-close"></i></button>
                                    </form>
                                </td>
                                {{-- <td class="product-image"><img src="assets/img/products/product-img-1.jpg" alt="" /></td> --}}
                                <td class="product-name">{{ $item->name }}</td>
                                <td class="product-price"> @rupiah($item->price) </td>
                                <td class="product-quantity">
                                    <form id="updateForm" action="{{ route('keranjang.update', $item->rowId) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" id="qty" name="kuantitas" placeholder="0" value="{{ $item->qty }}" />
                                        <button type="submit" id="btnUpdate" class=" bg-transparent border-0"><i class="fas fa-check"></i></button>

                                    </form>
                                </td>
                                <td class="product-total"> @rupiah($item->subtotal) </td>
                            </tr>
                        @endforeach
                    {{-- @else
                        <tr>
                            <th colspan="5" class="text-center align-middle p-4"> {{ $items->count() }} Tidak Ada Items Di Keranjang!</th>
                        </tr> --}}
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
  
            <div class="col-lg-4">
              <div class="total-section">
                <table class="total-table">
                  <thead class="total-table-head">
                    <tr class="table-total-row">
                      <th>Total</th>
                      <th>Harga</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="total-data">
                      <td><strong>Subtotal: </strong></td>
                      <td> Rp. {{ Cart::subtotal(0,1,'.') }}</td>
                    </tr>
                    <tr class="total-data">
                      <td><strong>Items Total: </strong></td>
                      <td>{{ Cart::count() }}</td>
                    </tr>
                  </tbody>
                </table>

                @if (Cart::count() >= 1)
                  <div class="cart-buttons">
                    <a href="/checkout/alamat" class="boxed-btn black">Check Out</a>
                  </div>
                @endif

              </div>
  
              <div class="coupon-section">
                <h3>Apply Coupon</h3>
                <div class="coupon-form-wrap">
                  <form action="index.html">
                    <p><input type="text" placeholder="Coupon * COMING SOON *" disabled /></p>
                    <p><input type="submit" value="Apply" /></p>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end cart -->


@endsection
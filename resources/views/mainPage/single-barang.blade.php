@extends('mainPage.layouts.main')

@section('container')

    <!-- single product -->
    <div class="single-product mt-150 mb-150">
        <div class="container">
          <div class="row">
            <div class="col-md-5">
              <div class="single-product-img">
                <img src="assets/img/products/product-img-5.jpg" alt="" />
              </div>
            </div>
            <div class="col-md-7">
              <div class="single-product-content">
                <h3>{{ $barang->nama_barang }}</h3>
                <p class="single-product-pricing"><span>{{ $barang->merek }}</span> @rupiah($barang->harga_satuan)</p>
                <p>
                  {{ $barang->deskripsi }}
                </p>
                <div class="single-product-form">
                  <form action="{{ route('keranjang.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="nama_barang" value="{{ $barang->nama_barang }}">
                    <input type="hidden" name="barang_id" value="{{ $barang->id }}">
                    <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                    <input type="hidden" name="harga" value="{{ $barang->harga_satuan }}">
                    <input type="number" min="0" placeholder="" id="qty" max="{{ $barang->stok }}" value="1" name="kuantitas"/>
                    <a type="submit" class="cart-btn">
                      <button type="submit" class="bg-transparent border-0"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                    </a>
                  </form>
                  {{-- <p><strong>Categories: </strong>Fruits, Organic</p> --}}
                </div>
                <h4>Share:</h4>
                <ul class="product-share">
                  <li>
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li>
                    <a href=""><i class="fab fa-twitter"></i></a>
                  </li>
                  <li>
                    <a href=""><i class="fab fa-google-plus-g"></i></a>
                  </li>
                  <li>
                    <a href=""><i class="fab fa-linkedin"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end single product -->

      

@endsection
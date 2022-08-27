@extends('mainPage.layouts.main')

@section('container')
    <!-- products -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="product-filters">
                <ul>
                  <li class="active" data-filter="*">All</li>
                  <li data-filter=".keyboard">Keyboard</li>
                  <li data-filter=".mouse">Mouse</li>
                  <li data-filter=".speaker">Speaker</li>
                </ul>
              </div>
            </div>
          </div>
  
          <div class="row product-lists"> 
            {{-- looping --}}
            @foreach ($barang as $item)
            <div class="col-lg-4 col-md-6 text-center keyboard">
                <div class="single-product-item">
                  <div class="product-image">
                    {{-- <a href="single-product.html"><img src="assets/img/barang/keyboard.jpg" alt="" /></a> --}}
                  </div>
                  <h3>{{ $item->nama_barang }}</h3>
                  <p class="product-price"><span>{{ $item->merek }}</span> @rupiah($item->harga_satuan)</p>
                  <a href="{{ route('singleBarang', $item->id) }}" class="cart-btn">Detail</a>
                </div>
              </div>
              @endforeach
              {{-- ned looping --}}
          </div>
  
          <div class="d-flex justify-content-center">
              {!! $barang->links() !!}
          </div>
        </div>
      </div>
      <!-- end products -->
@endsection
@extends('mainPage.layouts.main')

@section('container')


    <div class="cart-section mt-80 mb-150">
        <div class="container">
          <div class="row">
            <div class="col-md-6 my-3">

                <h3 class="text-center">Konfirmasi Alamat Anda</h3>
                <p class="text-center mt-0 text-muted">Pastikan alamat yang anda masukan benar!</p>

                <form action="/checkout/alamat" id="formAlamat" method="post">
                    @csrf

                    <div class="row ">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" value="{{ auth()->user()->nama }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">No Telepon Penerima</label>
                                <input type="number" name="no_telp" class="form-control w-100" value="{{ auth()->user()->no_telp }}" required>
                            </div>
                        </div>
                    </div>
                    {{--  --}}

                    <div class="row px-3">
                        <label for="">Alamat Lengkap</label>
                        <textarea name="alamat" cols="20" rows="10" class="form-control">{{ auth()->user()->alamat }}</textarea>
                    </div>
                    {{--  --}}

                    <input type="hidden" name="id" value="{{ auth()->user()->id }}">
{{--
                    <input type="submit" value="Konfirmasi" class="my-3 btn btn-warning" onclick="confirm('Jika OK Maka Pesanan Akan Langsung Dibuat!')">
                    <p class="text-muted small">*Jika klik KONFIRMASI Maka Pesanan Akan Langsung Dibuat!</p> --}}

                </form>

            </div>
            <div class="col-md-6 my-3">
                <h3 class="text-center">Detai Item</h3>
                <p class="text-center mt-0 text-muted">Detail Item Dipilih</p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Item</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>

                        @foreach ($orderItems as $item)
                            <tbody>
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td> Rp. {{ $item->subtotal(0,1,'.') }}</td>
                                </tr>
                            </tbody>
                        @endforeach
                            <tfoot>
                                <tr>
                                    <th >Total</th>
                                    <th>{{ Cart::count() }}</th>
                                    <th>Rp. {{ Cart::subtotal(0,1,'.') }}</th>
                                </tr>
                            </tfoot>
                    </table>
                </div>

                <hr>
                <h3 class="text-center my-3">Pembayaran</h3>
                <p class="text-muted">Pembayaran melalui <b>Gopay</b></p>
                <div class="text-center">
                    <button class="btn btn-info w-100 " onclick="updateAlamat()"> Bayar</button>
                </div>

            </div>
          </div>
          {{-- end row --}}



        </div>
      </div>

      <script>
        function updateAlamat(){
            if(confirm('Yakin ingin melanjutkan?')){
                document.getElementById('formAlamat').submit();
            }
        }
      </script>



@endsection

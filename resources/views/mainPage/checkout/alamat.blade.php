@extends('mainPage.layouts.main')

@section('container')

    <!-- cart -->
    <div class="cart-section mt-80 mb-150">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

                <h3 class="text-center">Konfirmasi Alamat Anda</h3>
                <p class="text-center mt-0 text-muted">Pastikan alamat yang anda masukan benar!</p>

                <form action="" method="post">
                    @csrf

                    <div class="row ">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control"  required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">No Telepon Penerima</label>
                                <input type="number" name="no_telp" class="form-control w-100" required>
                            </div>
                        </div>
                    </div>
                    {{--  --}}

                    <div class="row px-3">
                        <label for="">Alamat Lengkap</label>
                        <textarea name="alamat" cols="20" rows="10" class="form-control"></textarea>
                    </div>
                    {{--  --}}

                    <input type="submit" value="Konfirmasi" class="my-3 btn btn-warning">

                </form>

            </div>
          </div>
        </div>
      </div>
      <!-- end cart -->


@endsection
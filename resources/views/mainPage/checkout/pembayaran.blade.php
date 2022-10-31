@extends('mainPage.layouts.main')

@section('container')


    <div class="cart-section mt-80 mb-150">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h3 class="text-center">Proses Pembayaran</h3>
                    <small class="text-muted ">Scan or Click Redirect button to <b>PAY</b></small><br>
                    <a href="{{ $data->redirect_link }}" target="_blank" class="my-2">
                        <button class="btn btn-primary">
                            Redirect Link
                        </button>
                    </a>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <img src="{{ $data->qr_code_mt }}"  alt="Qr Code Payment" width="300" >
                    </div>
                </div>

            </div>
          </div>
        </div>
      </div>


@endsection

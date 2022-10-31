<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('subtotal');
            $table->text('transaction_id_mt');
            $table->text('alamat');
            $table->string('status_pesanan')->default('Invalid');
            $table->string('status_pengiriman')->nullable();
            $table->string('status_pembayaran')->nullable();
            $table->text('qr_code_mt');
            $table->text('redirect_link');
            $table->text('url_check_status');
            $table->text('url_cancel_payment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
};

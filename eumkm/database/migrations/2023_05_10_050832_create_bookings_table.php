<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {


        //     'tipe' => $request->tipe,
        //     'nomor_peta' => $request->nomor_peta,
        //     'proof_payment' => $request->proof_payment,

        Schema::create('bookings', function (Blueprint $table) {


            $table->id();
            $table->unsignedBigInteger('umkm_id');
            $table->foreign('umkm_id')->references('id')->on('u_m_k_m_s')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('tipe');
            $table->string('nomor_peta');
            $table->string('proof_payment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

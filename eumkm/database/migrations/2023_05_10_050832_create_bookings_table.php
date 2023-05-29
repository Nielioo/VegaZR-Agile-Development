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
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('type');
            $table->string('status');
            $table->string('map_number');
            $table->string('proof_payment');
            $table->string('umkm_name');
            $table->string('umkm_manager');
            $table->string('umkm_phone');
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

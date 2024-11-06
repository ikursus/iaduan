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
        Schema::create('aduan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jenis_aduan_id')->unsigned();
            $table->string('tajuk', 100); // varchar 100
            $table->longText('kandungan');
            $table->string('lampiran')->nullable();
            $table->string('status', 20)->default('pending');
            $table->timestamps();

            $table->foreign('jenis_aduan_id')->references('id')->on('jenis_aduan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aduan');
    }
};

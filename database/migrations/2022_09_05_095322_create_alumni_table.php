<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumni', function (Blueprint $table) {
            $table->id();
            $table->string('nisn')->nullable();
            $table->string('name')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('gender')->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('th_lulus')->nullable();
            $table->string('status_kerja')->nullable();
            $table->string('tempat_kerja')->nullable();
            $table->string('status_kuliah')->nullable();
            $table->string('tempat_kuliah')->nullable();
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
        Schema::dropIfExists('alumni');
    }
}

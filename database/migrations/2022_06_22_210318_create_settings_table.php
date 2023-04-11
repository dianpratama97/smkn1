<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('text_pembuka');
            $table->string('foto_kepsek');
            $table->string('nama_kepsek');
            $table->integer('status_kelulusan');
            $table->string('nip');
            $table->text('kata_sambutan');
            $table->string('no_telp');
            $table->string('email');
            $table->string('alamat');
            $table->string('fb');
            $table->string('yt');
            $table->string('cap');
            $table->string('ttd');
            $table->string('link_1');
            $table->string('link_2');
            $table->string('link_3');
            $table->string('link_4');
            $table->text('visi');
            $table->text('misi');
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
        Schema::dropIfExists('settings');
    }
}

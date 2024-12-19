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
        Schema::create('recepteks', function (Blueprint $table) {
            $table->id();
            $table->string('nev');
            $table->unsignedBigInteger('kat_id')->references('kat_id')->on('kollekcios');
            //$table->unsignedBigInteger('kat_id');
            $table->string('kep_eleresi_ut');
            $table->string('leiras');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP')); 
            //$table->timestamps();

            //$table->foreign('kat_id')->references('id')->on('kategoriak')->onDelete('cascade');
        });

        DB::table('recepteks')->insert([
            ['nev' => 'Rántott hús', 'kat_id' => 1, 'kep_eleresi_ut' => 'kepek/rantott_hus.jpg', 'leiras' => 'Klasszikus rántott hús.'],
            ['nev' => 'Gulyásleves', 'kat_id' => 2, 'kep_eleresi_ut' => 'kepek/gulyas.jpg', 'leiras' => 'Hagyományos gulyásleves.'],
            ['nev' => 'Somlói galuska', 'kat_id' => 3, 'kep_eleresi_ut' => 'kepek/somloi.jpg', 'leiras' => 'Isteni somlói galuska.'],
            ['nev' => 'Caesar saláta', 'kat_id' => 4, 'kep_eleresi_ut' => 'kepek/caesar.jpg', 'leiras' => 'Friss Caesar saláta.'],
            ['nev' => 'Omelette', 'kat_id' => 5, 'kep_eleresi_ut' => 'kepek/omlett.jpg', 'leiras' => 'Gyors reggeli omlett.'],
            ['nev' => 'Carbonara', 'kat_id' => 6, 'kep_eleresi_ut' => 'kepek/carbonara.jpg', 'leiras' => 'Krémes Carbonara tészta.'],
            ['nev' => 'Rántott ponty', 'kat_id' => 7, 'kep_eleresi_ut' => 'kepek/rantott_ponty.jpg', 'leiras' => 'Finom rántott ponty.'],
            ['nev' => 'Limonádé', 'kat_id' => 8, 'kep_eleresi_ut' => 'kepek/limonade.jpg', 'leiras' => 'Frissítő limonádé.'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recepteks');
    }
};
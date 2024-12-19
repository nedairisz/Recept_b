
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
        Schema::create('kollekcios', function (Blueprint $table) {
            $table->id('kat_id');
            $table->string('nev');
            $table->timestamps();
        });

        DB::table('kollekcios')->insert([
            ['nev' => 'főétel'],
            ['nev' => 'leves'],
            ['nev' => 'édesség'],
            ['nev' => 'saláta'],
            ['nev' => 'reggeli'],
            ['nev' => 'tészta'],
            ['nev' => 'halétel'],
            ['nev' => 'ital'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kollekcios');
    }
};
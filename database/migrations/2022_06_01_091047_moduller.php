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
        Schema::create('moduller', function (Blueprint $table) {
            $table->id();
            $table->string('baslık');
            $table->string('selflink');
            $table->enum('durum',[1,2])->default(1);      /*1 aktıf 2 pasıf*/
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
        Schema::dropIfExists('moduller');
    }
};

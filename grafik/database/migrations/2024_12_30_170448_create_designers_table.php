<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('designers', function (Blueprint $table) {
            $table->id();
            $table->string('İsim');
            $table->string('İletisim');
            $table->string('Deneyim');
            $table->integer('Alan_id');
            $table->string('imgurl')->nullable();
           
        });
    }

    public function down()
    {
        Schema::dropIfExists('designers');
    }
};
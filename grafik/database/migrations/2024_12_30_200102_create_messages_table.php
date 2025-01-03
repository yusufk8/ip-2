<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('receiver_id');
            $table->text('content');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
            
            // Foreign key'leri NO ACTION olarak değiştirdik
            $table->foreign('sender_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('no action');
                  
            $table->foreign('receiver_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('no action');
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
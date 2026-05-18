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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');
            
            // Оценка от 1 до 5
            $table->unsignedTinyInteger('rating')
                  ->comment('Оценка от 1 до 5')
                  ->check('rating BETWEEN 1 AND 5'); // Проверка в БД
            
            // Комментарий (может быть пустым)
            $table->text('comment')
                  ->nullable();
            $table->timestamps();
            $table->index(['user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

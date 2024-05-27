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
        Schema::Create('book', function(Blueprint $table){

            $table->uuid('book_id')->primary();
            $table->string('book_title')->unique();
            $table->string('author');
            $table->double('price');
            $table->longText('description');
            $table->string('genre');
            $table->foreignUuid('user_id_fk')
                    ->references('user_id')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schemma::dropIfExists('book');
    }
};

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
        Schema::Create('image', function (Blueprint $table) {

            $table->uuid('image_id')->primary();
            $table->string('image_name');
            $table->string('image_path');
            $table->foreignUuid('book_id_fk')
                    ->references('book_id')
                    ->on('book')
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
        Schema::dropIfExists('image');
    }
};

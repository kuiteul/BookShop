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
        Schema::Create('sales', function (Blueprint $table){
            $table->uuid('sales_id')->primary();
            $table->foreignUuid('book_id_fk')
                    ->references('book_id')
                    ->on('book')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreignUuid('order_id_fk')
                    ->references('order_id')
                    ->on('orders')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreignUuid('user_id_fk')
                    ->references('user_id')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->integer('quantity');
            $table->double('unitCost');
            $table->double('tva');
            $table->double('totalCost');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->double('price', 15, 2);
            $table->string('status', 50)->default('pending');
            $table->timestamp('sale_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('client_id');

            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
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
        Schema::dropIfExists('sales');
    }
}

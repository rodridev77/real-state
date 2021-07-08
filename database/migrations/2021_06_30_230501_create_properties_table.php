<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10);
            $table->integer('area');
            $table->integer('bedroom');
            $table->integer('suite');
            $table->integer('bathroom');
            $table->integer('garage');
            $table->double('price', 15, 2);
            $table->string('type', 50);
            $table->text('description');
            $table->string('status', 50)->default("available");
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
        Schema::dropIfExists('properties');
    }
}

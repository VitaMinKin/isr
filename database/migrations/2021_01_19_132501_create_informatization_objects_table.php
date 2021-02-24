<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformatizationObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informatization_objects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->smallInteger('category');
            $table->integer('headquarter_id');
            $table->foreign('headquarter_id')->references('id')->on('headquarters')->onDelete('cascade')->onUpdate('cascade');
            $table->smallInteger('type');
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
        Schema::dropIfExists('informatization_objects');
    }
}

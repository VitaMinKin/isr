<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjectDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object_documents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('informatization_object_id');
            $table->foreign('informatization_object_id')->references('id')->on('informatization_objects')->onDelete('cascade')->onUpdate('cascade');
            $table->smallInteger('documents_list_id');
            $table->foreign('documents_list_id')->references('id')->on('documents_list')->onDelete('cascade')->onUpdate('cascade');
            $table->string('preliminary_accounting')->nullable();
            $table->string('number_type')->nullable();
            $table->string('number')->nullable();
            $table->string('number_mil_unit')->nullable();
            $table->date('date')->nullable();
            $table->date('validity')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_path')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('object_documents');
    }
}

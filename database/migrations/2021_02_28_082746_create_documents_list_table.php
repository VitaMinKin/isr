<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents_list', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->smallInteger("limit_1_c")->nullable();
            $table->smallInteger("limit_2_c")->nullable();
            $table->smallInteger("limit_3_c")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents_list');
    }
}

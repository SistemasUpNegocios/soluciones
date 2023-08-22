<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general', function (Blueprint $table) {
            $table->id();
            $table->double('balance');
            $table->double('equity');
            $table->double('margin');
            $table->double('risk');
            $table->double('profit');
            $table->double('ratio');
            $table->timestamp('fecha');
            $table->unsignedBigInteger('trader_id');
            $table->foreign('trader_id')->references('id')->on('traders')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general');
    }
}

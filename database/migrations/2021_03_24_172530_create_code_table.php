<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code', function (Blueprint $table) {
            $table->unsignedBigInteger('codeset_id');
            $table->string('codeid');
            $table->string('description');
            $table->dateTime('valid_from', $precision = 0);
            $table->dateTime('valid_to', $precision = 0);
            $table->timestamps();
            $table->primary(['codeset_id','codeid']);
            $table->foreign('codeset_id')
                ->references('id')
                ->on('codeset')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('code');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodesetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codeset', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->bigInteger('typeCodeSetId')->nullable();
            $table->string('typeCodeId')->nullable();
            $table->string('name')->unique()->notNullable();
            $table->string('description');
            $table->softDeletesTz($column = 'deleted_at', $precision = 0);
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
        Schema::dropIfExists('codeset');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('good_id');
            $table->timestamps();

            $table->foreign('good_id')->references('id')->on('goods')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('quotes');
    }
};

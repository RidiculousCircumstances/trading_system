<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->float('cash_position');
            $table->float('portfolio_value');
            $table->float('blocking');
            $table->float('capital_adequacy');
            $table->float('capital_adequacy_based_on_blocking');
            $table->float('cash_liability');
            $table->float('asset_liability_in_cash');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('portfolios');
    }
};

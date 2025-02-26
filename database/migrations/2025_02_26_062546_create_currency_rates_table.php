<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('currency_rates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('rate', 10, 4);
            $table->string('symbol');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('currency_rates');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('simple_models', function (Blueprint $table) {
            $table->id();

            $table->date('from');
            $table->date('to');
            $table->date('exact_date');

            $table->boolean('something_toggle');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('simple_models');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('datepicker_bug_models', function (Blueprint $table) {
            $table->id();

            $table->date('date');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('datepicker_bug_models');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration {
    public function up() {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('idStudent');
            $table->string('firstName');
            $table->string('lastName');
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('students');
    }
}

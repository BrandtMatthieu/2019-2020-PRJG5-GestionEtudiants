<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration {
    public function up() {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('idCourse');
            $table->string('courseLabel');
            $table->string('courseDescription');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('courses');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration {
    public function up() {
        Schema::create('logs', function (Blueprint $table) {
            $table->bigIncrements('idLog');
            $table->integer('idUser')->references('idUser')->on('users');
            $table->integer('timestamp');
            $table->integer('idAction')->unsigned();
            /*
             * 0. Add student
             * 1. Delete student
             * 2. Edit student's id
             * 3. Edit student's first name
             * 4. Edit student's last name
             * 5. Subscribe student
             * 6. Unsubscribe student
             */
            $table->integer('idStudent');
            $table->string('value')->nullable();
            /*
             * 2 => new idStudent
             * 3 => new first name
             * 4 => new last name
             * 5, 6 => idCourse
             */
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('logs');
    }
}

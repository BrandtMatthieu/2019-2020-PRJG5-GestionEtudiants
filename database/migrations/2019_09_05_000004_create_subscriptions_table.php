<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration {
    public function up() {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->integer('idStudent', false, true)->references('idStudent')->on('students');
            $table->integer('idCourse', false, true)->references('idCourse')->on('courses');
            $table->primary(['idStudent', 'idCourse']);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('subscriptions');
    }
}

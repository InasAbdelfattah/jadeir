<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->string('action_code')->nullable();
            $table->tinyInteger('is_suspend')->default(0);
            $table->tinyInteger('is_user')->default(1);
            $table->tinyInteger('is_teacher');
            $table->tinyInteger('gender');
            $table->integer('city_id');
            $table->integer('district_id');
            $table->string('nationality')->nullable();
            $table->longText('certificates')->nullable();
            $table->string('subjects')->nullable();
            $table->tinyInteger('teacher_place_type');
            $table->string('teacher_bank_account')->nullable();
            $table->string('avg_hour_price')->nullable();
            $table->tinyInteger('is_available')->default(1);
            $table->string('code')->nullable();
            $table->string('api_token')->nullable();
            $table->string('remember_token')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('users');
    }
}

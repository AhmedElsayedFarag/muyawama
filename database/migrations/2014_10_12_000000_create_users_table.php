<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name')->unique();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone');
            $table->boolean('phone_verified')->default(0);
            $table->boolean('admin_verified')->default(0);
            $table->string('birth_date')->nullable();
            $table->string('gender')->nullable();
            $table->string('language')->nullable();
            $table->string('invitation_code')->nullable();
            $table->string('experience_years')->nullable();
            $table->string('national_id')->nullable();
            $table->string('image')->nullable();
            $table->string('coins')->default(0);
            $table->string('device_token')->nullable();
            $table->rememberToken();
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

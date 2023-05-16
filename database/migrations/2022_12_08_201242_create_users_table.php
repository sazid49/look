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
        if (!Schema::hasTable('as_users')) {
            Schema::create('as_users', function (Blueprint $table) {
                $table->id();
                $table->integer('role_id')->default('2');
                $table->enum('type',['admin','user'])->default('user');
                $table->string('name',191);
                $table->string('email',191);
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password',191);
                $table->timestamp('password_changed_at')->nullable();
                $table->string('avatar',191)->nullable();
                $table->boolean('active')->default('1');
                $table->string('timezone',191)->nullable();
                $table->timestamp('last_login_at')->nullable();
                $table->string('last_login_ip',191)->nullable();
                $table->boolean('to_be_logged_out')->default('0');
                $table->string('provider',191)->nullable();
                $table->string('provider_id',191)->nullable();
                $table->string('remember_token',100)->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('as_users');
    }
}

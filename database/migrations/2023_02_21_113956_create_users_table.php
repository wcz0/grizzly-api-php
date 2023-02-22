<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigInteger('id')->unique()->primary();
            $table->string('username', 255)->unique()->default('');
            $table->string('password', 255)->nullable();
            $table->tinyInteger('gender')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->string('phone', 255)->nullable();
            $table->string('nickname', 255)->nullable();
            $table->date('birthday')->nullable();
            $table->string('signature', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->tinyInteger('email_status')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->string('name', 255)->nullable();
            $table->unsignedBigInteger('mc_id')->unique()->default(new \Illuminate\Database\Query\Expression('0'));
            $table->tinyInteger('mc_id_status')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->string('mc_id_name', 255)->nullable();
            $table->string('qq', 255)->nullable();
            $table->string('qq_id', 255)->unique()->nullable();
            $table->string('last_ip', 255)->nullable();
            $table->dateTime('last_time')->nullable();
            $table->string('avatar', 255)->default('default("http://localhost/avatar/deault")');
            $table->decimal('mc_points')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->decimal('balance')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->timestamps();
            $table->softDeletes();
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
};

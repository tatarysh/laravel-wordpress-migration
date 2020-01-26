<?php

use TataRysh\LaravelWordpressMigration\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordpressUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::connection($this->connection())->create('users', static function (Blueprint $table) {
            $table->bigInteger('ID', true)->unsigned();
            $table->string('user_login', 60)->default('')->index('user_login_key');
            $table->string('user_pass', 64)->default('');
            $table->string('user_nicename', 50)->default('')->index('user_nicename');
            $table->string('user_email', 100)->default('');
            $table->string('user_url', 100)->default('');
            $table->dateTime('user_registered')->default('0000-00-00 00:00:00');
            $table->string('user_activation_key', 60)->default('');
            $table->integer('user_status')->default(0);
            $table->string('display_name', 250)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::connection($this->connection())->drop('users');
    }
}

<?php

use TataRysh\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordpressOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::connection($this->connection())->create('options', static function (Blueprint $table) {
            $table->bigInteger('option_id', true)->unsigned();
            $table->string('option_name', 64)->default('')->unique();
            $table->text('option_value');
            $table->string('autoload', 20)->default('yes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::connection($this->connection())->drop('options');
    }
}

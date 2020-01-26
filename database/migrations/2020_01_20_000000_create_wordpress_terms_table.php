<?php

use TataRysh\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordpressTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::connection($this->connection())->create('terms', static function (Blueprint $table) {
            $table->bigInteger('term_id', true)->unsigned();
            $table->string('name', 200)->default('')->index('name');
            $table->string('slug', 200)->default('')->index('slug');
            $table->bigInteger('term_group')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::connection($this->connection())->drop('terms');
    }
}

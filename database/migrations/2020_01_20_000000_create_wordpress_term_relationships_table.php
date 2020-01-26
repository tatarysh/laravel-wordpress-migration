<?php

use TataRysh\LaravelWordpressMigration\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordpressTermRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::connection($this->connection())->create('term_relationships', static function (Blueprint $table) {
            $table->bigInteger('object_id')->unsigned()->default(0);
            $table->bigInteger('term_taxonomy_id')->unsigned()->default(0)->index('term_taxonomy_id');
            $table->integer('term_order')->default(0);
            $table->primary(['object_id','term_taxonomy_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::connection($this->connection())->drop('term_relationships');
    }
}

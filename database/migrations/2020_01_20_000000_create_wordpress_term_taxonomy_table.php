<?php

use TataRysh\LaravelWordpressMigration\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordpressTermTaxonomyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::connection($this->connection())->create('term_taxonomy', static function (Blueprint $table) {
            $table->bigInteger('term_taxonomy_id', true)->unsigned();
            $table->bigInteger('term_id')->unsigned()->default(0);
            $table->string('taxonomy', 32)->default('')->index('taxonomy');
            $table->text('description');
            $table->bigInteger('parent')->unsigned()->default(0);
            $table->bigInteger('count')->default(0);
            $table->unique(['term_id','taxonomy'], 'term_id_taxonomy');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::connection($this->connection())->drop('term_taxonomy');
    }
}

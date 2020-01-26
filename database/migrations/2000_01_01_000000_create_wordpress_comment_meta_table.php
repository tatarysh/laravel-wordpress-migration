<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use TataRysh\LaravelWordpressMigration\Database\Migrations\Migration;

class CreateWordpressCommentMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::connection($this->connection())->create('commentmeta', static function (Blueprint $table) {
            $table->bigInteger('meta_id', true)->unsigned();
            $table->bigInteger('comment_id')->unsigned()->default(0)->index('comment_id');
            $table->string('meta_key')->nullable()->index('meta_key');
            $table->text('meta_value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::connection($this->connection())->drop('commentmeta');
    }
}

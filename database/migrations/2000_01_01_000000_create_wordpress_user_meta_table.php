<?php

use TataRysh\LaravelWordpressMigration\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordpressUserMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::connection($this->connection())->create('usermeta', static function (Blueprint $table) {
            $table->bigInteger('umeta_id', true)->unsigned();
            $table->bigInteger('user_id')->unsigned()->default(0)->index('user_id');
            $table->string('meta_key')->nullable()->index('meta_key_usermeta');
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
        Schema::connection($this->connection())->drop('usermeta');
    }
}

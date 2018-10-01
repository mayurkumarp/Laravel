<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name',  Config::get('constant.authort_name'));
            $table->timestamp('created_at');
            $table->timestamp('updated_at')
                    ->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        DB::unprepared("ALTER TABLE category MODIFY user_id INT(10) UNSIGNED NOT NULL,"
                . "ADD INDEX (user_id), "
                . "ADD FOREIGN KEY (user_id) REFERENCES users(id)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('category');
    }
}

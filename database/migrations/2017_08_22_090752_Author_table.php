<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AuthorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name',  Config::get('constant.authort_name'));
            $table->string('city',  Config::get('constant.city_size'))->nullable();
            $table->string('about', Config::get('constant.author_about'));
            $table->timestamp('created_at');
            $table->timestamp('updated_at')
                    ->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        DB::unprepared("ALTER TABLE books MODIFY user_id INT(10) UNSIGNED NOT NULL,"
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
        Schema::drop('authors');
    }
}

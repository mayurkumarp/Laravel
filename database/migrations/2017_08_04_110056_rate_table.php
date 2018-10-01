<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('book_id');
            $table->unsignedInteger('rate');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')
                    ->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        DB::unprepared("ALTER TABLE rates MODIFY user_id INT(10) UNSIGNED NOT NULL,"
                . "ADD INDEX (user_id), "
                . "ADD FOREIGN KEY (user_id) REFERENCES users(id)");
        DB::unprepared("ALTER TABLE rates MODIFY book_id INT(10) UNSIGNED NOT NULL,"
                . "ADD INDEX (book_id), "
                . "ADD FOREIGN KEY (book_id) REFERENCES books(id)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rates');
    }
}
